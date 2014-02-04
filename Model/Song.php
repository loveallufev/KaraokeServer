<?php



require_once SERVER_ROOT . '/Lib/' . 'XmlHelper.php';


class Model_Song extends Model_BasicSong{
    public $lyric;
    public $otherInfo;
    public $beatURL;
    public $lyricURL;
    public $linkToSong;
    // this field will contain information of lyric (starting time, ending time...)
    public $karaoke;

    public function __construct($title, $singer, $author, $lyric=null, $category=null){
        $this->title = $title;
        $this->singer = $singer;
        $this->author = $author;
        $this->lyric = $lyric;
        $this->category = $category;
    }

    public static function getNewerSong($DBID){
        $model = new Core_Model();
        $model->getDB()->connect();

        $query = sprintf("SELECT * FROM song WHERE id > %s", $DBID);

        $model->getDB()->prepare($query);
        if (!$model->getDB()->query()){
            return array('status' => 'FAIL', 'message'=>$model->getDB()->connection->error);
        }

        $qresult = $model->getDB()->fetch('array');

        return $qresult;
    }

    // get song with ID >= $DBID, ID is the ID of song in database, not CustomID (L3323...)

    public static function getSongByID($id){
        $model = new Core_Model();
        $model->getDB()->connect();

        $query = sprintf("SELECT * FROM song WHERE customID = '%s'", mysql_real_escape_string($id));

        $model->getDB()->prepare($query);
        if (!$model->getDB()->query()){
            return array('status' => 'FAIL', 'message'=>$model->getDB()->connection->error);
        }

        $qresult = $model->getDB()->fetch();

        if ($qresult == null){
            return null;
        }

        $song = new Model_Song($qresult->title, $qresult->singer, $qresult->author, $qresult->lyric, $qresult->category);
        $song->lyricURL = $qresult->lyricURL;
        $song->beatURL = $qresult->beatURL;
        $song->karaoke = $qresult->karaoke;
        $song->ID = $qresult->customID;

        return $song;
    }

    public  static function isCached($ID){
        $filename = $ID . '.mp3';
        $path = SERVER_ROOT . DS . 'songs/' . $ID . DS . $filename ;
        return file_exists($path);
    }

    public static function getCachePathOfSong($ID){
        $filename = $ID . '.mp3';
        return 'songs/' . $ID . DS . $filename ;

    }

    public static function cacheSong($ID, $beatURL){

        if (!file_exists('songs')) {
            mkdir('songs', 0777, true);
        }
        /* SAVE BEAT */

        $path = SERVER_ROOT . DS . Model_Song::getCachePathOfSong($ID);

        $folder = dirname($path);
        if (!is_dir($folder))
        {
            $oldmask = umask(0);
            mkdir($folder, 0777, true);
            umask($oldmask);
        }else {
            if (!is_writable($folder)){
                umask(0);
                chmod($folder, 0777);
            }
        }
        try {
            if (!file_exists($path)){
                $ch = curl_init($beatURL);
                $fp = fopen($path, 'wb');
                curl_setopt($ch, CURLOPT_FILE, $fp);
                curl_setopt($ch, CURLOPT_HEADER, 0);
                curl_exec($ch);
                curl_close($ch);
                fclose($fp);
                // save ok
                return 1;
            }
            else {
                // file exist
                return 0;
            }
        }catch (Exception $e){
            return -1;
        }



        /* END OF SAVING BEAT */


        /* SAVE LYRIC
        $filename = $ID . '.sub';

        $path = SERVER_ROOT . DS . 'songs/' . $ID . DS . $filename ;

        $ch = curl_init($lyricURL);
        $fp = fopen($path, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        END OF SAVING LYRIC */

    }

    public static function saveRecord($file, $username, $songid, $isMixed) {
        echo "Begin function";
        $originalName = $file['name'];
        $newName = time() . $originalName;
        $songid = mysql_real_escape_string($songid);
        $username = mysql_real_escape_string($username);
        $path = 'upload' .  DS . $username . DS . $newName;
        $folder = dirname($path);
        echo "end of preparing";

        if (!file_exists($folder)) {
            mkdir($folder, 0777, true);
        }

        echo "end of create folder";

        // if this is a zip file, extract it and copy to our directory
        if ($file['type'] == 'application/zip'){
            echo "ZIP file";
            $zip = new ZipArchive;
            $res = $zip->open($file["tmp_name"]);
            if ($res === TRUE) {
                $stat = $zip->statIndex( 0 );
                $originalName = basename( $stat['name']);
                $newName = time() . $originalName;
                $path = 'upload' .  DS . $username . DS . $newName;
                $zip->extractTo('temps/');
                $zip->close();
                rename('temps/'. $originalName, $path );
            }
        }

        else{   // if this is an audio file, copy it from temporary directory to our directory
            // save file
            echo "WAV file";
            if (file_exists($path)) // check everything, believe no one and nothing
            {
                return array('status' => 'OK', 'code' => CODE_ERROR_FAILED, 'message' => $file["name"] . " already exists. ");
            }
            else
            {
                move_uploaded_file($file["tmp_name"], $path);
            }
        }

        echo "begin check sox:" . Lib_Utility::command_exist("sox") ;
        // if tool SOX is exist , merge vocal file and beat file
        $mixedfile = $path;
        if (Lib_Utility::command_exist("sox")){
            // if we didn't cache is song, cache it !
            if (!Model_Song::isCached($songid)) {
                echo "cache song";
                $song = Model_Song::getSongByID($songid);
                echo "get song OK";
                $song->catcheThisSong();
                echo "end of cache song";
            }

            //echo 'Have sox' . '<br/>';


            $mixedfile = $folder . DS . time() . '.mp3';
            $command = sprintf("./mix.sh %s %s %s", $path , Model_Song::getCachePathOfSong($songid), $mixedfile);
            $output = shell_exec($command);

            //echo "output of mixer: " . $output . "*<br/>";
            // if error happened
            if(!empty($output)){
                $mixedfile = $path;
            } else {
                $converted = true;
            }
        }

        // insert into database
        $model = new Core_Model();
        $model->getDB()->connect();

        $query = sprintf("INSERT INTO record (username, url, songid, ismixed)" .
            " VALUES ('%s' , '%s', '%s' , %d)",
            $username, BASE_URL . DS . $mixedfile, $songid, $isMixed
        );

        $model->getDB()->prepare($query);
        if (!$model->getDB()->query()){
            if ($model->getDB()->connection->errno == 1062 /*DUPLICATE ENTRY ERROR*/){
                return array('message' => "Duplicate record" , 'status' => "FAILED", 'code' => CODE_ERROR_DUPLICATE);
            }else{
                return  array('status' => 'FAILED', 'code' => CODE_ERROR_FAILED ,'message' => $model->getDB()->connection->error);
            }
        }

        // check again
        if (file_exists($mixedfile))
            return  array(
                'status' => 'OK', 'code' => CODE_SUCCESS,
                'message' => "Save record successfully",
                'link' => BASE_URL . DS . $mixedfile
            );
        else
            return  array('status' => 'FAILED', 'code' => CODE_ERROR_FAILED ,
                'message' => 'can not create new file');
    }

    public static function fixlinkAction($link, $id=""){

        if (!file_exists('temps')) {
            mkdir('temps', 0777, true);
        }

        if ($id != ""){
            // /home/../songs/L1923/L1923.mp3
            if (file_exists(SERVER_ROOT . DS . 'songs/' . $id . DS . $id . ".mp3")){
                return BASE_URL . DS . 'songs/' . $id . DS . $id . ".mp3";
            }
        }

        $filename =  basename($link);
        $pos = strrpos($filename, '.');
        if ($pos){
            $filename = substr($filename,0, $pos );
        }
        $filename = $filename . '.mp3';

        $path = SERVER_ROOT . DS . 'temps/' . $filename ;
        $folder = dirname($path);
        if (!is_dir($folder))
        {
            mkdir($folder, 0777, true);
        }

        if (file_exists($path)){
            return BASE_URL . DS . 'temps/' . $filename;
        }

        $ch = curl_init($link);
        $fp = fopen($path, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
        chmod(SERVER_ROOT . DS . 'temps/' . $filename, 0755);

        return BASE_URL . DS . 'temps/' . $filename;
    }

    public static function saveSearchHistory($keyword, $username){
        $model = new Core_Model();
        $model->getDB()->connect();

        $query = sprintf("INSERT INTO history(username, keyword) VALUES('%s', '%s')", $username, mysql_real_escape_string($keyword));

        $model->getDB()->prepare($query);
        if (!$model->getDB()->query()){
            return array('status' => 'FAILED', 'message'=>$model->getDB()->connection->error);
        }
    }

    public function insertThisIntoDatabase(){
        /* WRITE INFORMATION OF THIS SONG TO DATABASE */

        $words = preg_split("/\s+/", $this->title);
        $alias = '';
        foreach ($words as $w) {
            $alias .= $w[0];
        }
        $model = new Core_Model();
        $model->getDB()->connect();
        $model->getDB()->connection->query("SET NAMES utf8");

        $query = sprintf("INSERT INTO song (customID, title, singer, author, category, beatURL, lyricURL, lyric, alias, karaoke ) VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')",
            $this->ID, Lib_Utility::escapeCharacter($this->title), Lib_Utility::escapeCharacter($this->singer), Lib_Utility::escapeCharacter($this->author), Lib_Utility::escapeCharacter($this->category), Lib_Utility::escapeCharacter($this->beatURL), Lib_Utility::escapeCharacter($this->lyricURL), Lib_Utility::escapeCharacter($this->lyric), $alias , Lib_Utility::escapeCharacter(($this->karaoke)));

        $model->getDB()->prepare($query);
        if (!$model->getDB()->query()){
            if ($model->getDB()->connection->errno == 1062 /*DUPLICATE ENTRY ERROR*/){

            }else{
                    echo $model->getDB()->connection->error . "<br/>";
            }
        }

        /* END WRITING */
    }

    public function catcheThisSong(){

        if (!file_exists('songs')) {
            mkdir('songs', 0777, true);
        }
        /* SAVE BEAT */

        $path = SERVER_ROOT . DS . Model_Song::getCachePathOfSong($this->ID) ;

        $folder = dirname($path);
        if (!is_dir($folder))
        {
            mkdir($folder, 0777, true);
        }

        $ch = curl_init($this->beatURL);
        $fp = fopen($path, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        /* END OF SAVING BEAT */


    }
}