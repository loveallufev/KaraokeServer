<?php



require_once SERVER_ROOT . '/Lib/' . 'XmlHelper.php';


class Model_Song{
    public $title;
    public $singer;
    public $category;
    public $author;
    public $lyric;
    public $otherInfo;
    public $beatURL;
    public $lyricURL;
    public $ID;
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
            $this->ID, mysql_real_escape_string($this->title), $this->singer, $this->author, $this->category, $this->beatURL, $this->lyricURL, mysql_real_escape_string($this->lyric), $alias , mysql_real_escape_string(json_encode($this->karaoke)));
        $model->getDB()->prepare($query);
        if (!$model->getDB()->query()){
            if ($model->getDB()->connection->errno == 1062 /*DUPLICATE ENTRY ERROR*/){

            }else{
                    echo $model->getDB()->connection->error . "<br/>";
            }
        }

        /* END WRITING */
    }

    // get song with ID >= $DBID, ID is the ID of song in database, not CustomID (L3323...)
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

    public static function getSongByID($id){
        $model = new Core_Model();
        $model->getDB()->connect();

        $query = sprintf("SELECT * FROM song WHERE customID = '%s'", $id);

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

    public function catcheThisSong(){

        /* SAVE BEAT */
        $filename = $this->ID . '.mp3';

        $path = SERVER_ROOT . DS . 'songs/' . $this->ID . DS . $filename ;

        $folder = dirname($path);
        if (!is_dir($folder))
        {
            mkdir($folder, 0755, true);
        }

        $ch = curl_init($this->beatURL);
        $fp = fopen($path, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        /* END OF SAVING BEAT */


        /* SAVE LYRIC */
        $filename = $this->ID . '.sub';

        $path = SERVER_ROOT . DS . 'songs/' . $this->ID . DS . $filename ;

        $ch = curl_init($this->lyricURL);
        $fp = fopen($path, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        /* END OF SAVING LYRIC */

    }

    public static function cacheSong($ID, $beatURL, $lyricURL){

        /* SAVE BEAT */
        $filename = $ID . '.mp3';

        $path = SERVER_ROOT . DS . 'songs/' . $ID . DS . $filename ;

        $folder = dirname($path);
        if (!is_dir($folder))
        {
            mkdir($folder, 0755, true);
        }

        $ch = curl_init($beatURL);
        $fp = fopen($path, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        /* END OF SAVING BEAT */


        /* SAVE LYRIC */
        $filename = $ID . '.sub';

        $path = SERVER_ROOT . DS . 'songs/' . $ID . DS . $filename ;

        $ch = curl_init($lyricURL);
        $fp = fopen($path, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);

        /* END OF SAVING LYRIC */

    }

    public static function fixlinkAction($link, $id=""){

        if ($id != ""){
            // /home/../songs/L1923/L1923.mp3
            if (file_exists(SERVER_ROOT . DS . 'songs/' . $id . DS . $id . ".mp3")){
                return BASE_URL . DS . 'songs/' . $id . DS . $id . ".mp3";
            }
        }

        // use prefix 'z' for zing's songs
        $filename = Model_SongConstants::$ZING_PREFIX . basename($link);
        $pos = strrpos($filename, '.');
        if ($pos){
            $filename = substr($filename,0, $pos );
        }
        $filename = $filename . '.mp3';

        $path = SERVER_ROOT . DS . 'temps/' . $filename ;
        $folder = dirname($path);
        if (!is_dir($folder))
        {
            mkdir($folder, 0755, true);
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

        return BASE_URL . DS . 'temps/' . $filename;
    }

    public static function saveSearchHistory($keyword, $username){
        $model = new Core_Model();
        $model->getDB()->connect();

        $query = sprintf("INSERT INTO history(username, keyword) VALUES('%s', '%s')", $username, $keyword);

        $model->getDB()->prepare($query);
        if (!$model->getDB()->query()){
            return array('status' => 'FAIL', 'message'=>$model->getDB()->connection->error);
        }
    }
}