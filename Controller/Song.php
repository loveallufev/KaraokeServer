<?php

class Controller_Song extends Core_Controller {


    // /song/search?s={0}   POST with token=xxx&r=xxx
    public function searchAction($param){

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        if (!isset($param['s'])){
            echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_MISSING, 'message' => "Missing keyword"));
            return;
        }

        $randomNumber = Lib_Utility::get_post_var('r');
        if (!Lib_Utility::checkRandomNumber($randomNumber)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Invalid random number',
                'code' => CODE_ERROR_INVALID
            ));
            return;
        }

        $token = Lib_Utility::get_post_var('token');

        if (!isset($token)){
            echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_MISSING, 'message' => "Missing token"));
            return;
        }else {
            $username = Model_User::checkAuthenticatedToken($token);
            if (!isset($username)){
                echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_INVALID , 'message' => "Invalid token"));
                return;
            }
        }

        $songName = $param['s'];
        //$tmp = urldecode($songName);
        //$songName = str_replace('%20','+', $songName  );
        $songName =urldecode($songName);
        /*
        $t = new Lib_LanguageDetector_LanguageDetector();

        $lang = $t->predict($tmp);

        $result = null;


        $songAssistant = Model_SongAssistantManager::getSongAssistantByLanguage($lang);
        */
        $songAssistant = new Model_MySongAssistant();

        if (isset($songAssistant)){
            $result = $songAssistant->searchByName($songName);
            /*
            if ($lang == "en" && sizeof($result) == 0){
                $songAssistant = Model_SongAssistantManager::getSongAssistantByLanguage("vi");
                $result = $songAssistant->searchByName($songName);
            }
            */
            echo json_encode(array('status' => 'OK', 'code' => CODE_SUCCESS, 'query' => $songName ,'song_list' => $result));
            Model_Song::saveSearchHistory($songName, $username);
            return;
        }


        echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_FAILED ,'message' => 'Can not get song assistant'));
    }

    // /song/hotkaraoke?lang=xxx POST: token
    public function hotkaraokeAction($param){

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        $token = Lib_Utility::get_post_var('token');

        $randomNumber = Lib_Utility::get_post_var('r');
        if (!Lib_Utility::checkRandomNumber($randomNumber)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Invalid random number',
                'code' => CODE_ERROR_INVALID
            ));
            return;
        }

        if (!isset($token)){
            echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_MISSING, 'message' => "Missing token"));
            return;
        }else {
            $username = Model_User::checkAuthenticatedToken($token);
            if (!isset($username)){
                echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_INVALID , 'message' => "Invalid token"));
                return;
            }
        }

        $lang = 'en';
        $songAssistant = null;
        if (isset($param['lang'])){
            $lang = $param['lang'];
        }

        //$songAssistant = Model_SongAssistantManager::getSongAssistantByLanguage($lang);

        //$result = $songAssistant->getHotKaraoke();

        $songAssistant = new Model_MySongAssistant();
        $result = $songAssistant->getHotKaraoke($lang);

        //$result = Model_Song::getHotKaraoke();
        echo json_encode(array('status' => 'OK', 'code' => CODE_SUCCESS, 'song_list' => $result));
    }

    // /song/getInfo?id=xxxx    POST: token=xxx&r=yyyy
    public function getInfoAction($param){

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        if (!isset($param['id'])){
            echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_MISSING , 'message' => "Missing song ID"));
            return;
        }

        $randomNumber = Lib_Utility::get_post_var('r');
        if (!Lib_Utility::checkRandomNumber($randomNumber)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Invalid random number',
                'code' => CODE_ERROR_INVALID
            ));
            return;
        }

        $token = Lib_Utility::get_post_var('token');
        $username = '';

        if (!isset($token)){
            echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_MISSING , 'message' => "Missing token"));
            return;
        }else {
            $username = Model_User::checkAuthenticatedToken($token);
            if (!isset($username)){
                echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_INVALID ,'message' => "Invalid token"));
                return;
            }
        }

        $id = $param['id'];
        $song = Model_Song::getSongByID($id);


        // Logging class initialization
        $log = new Lib_Logging();

        // set path and name of log file (optional)
        $log->lfile(SERVER_ROOT. DS . 'logs/user_song.log');

        // write message to the log file
        $log->lwrite(sprintf('%s sing the song ID=%s', $username, $id));
        // close log file
        $log->lclose();

        // Find in our database first
        if (isset($song)){
            Model_Song::updateCounterTo($song, $song->count + 1);



            //$song = new Model_Song("Title", "Singer", "Author");
            echo json_encode(array('status' => 'OK' , 'code' => CODE_SUCCESS, 'song' => $song));
            return;
        }

        if (isset($param['id'])){


            // Get the first character of id, this is the prefix of zing song or lucky voice song
            $i = 0;
            $number = array('0','1','2','3','4','5','6','7','8','9');
            $prefix = '';
            while (($i < strlen($id)) && (!in_array($id[$i], $number))){
                $prefix .= $id[$i];
                $i = $i +1;
            }

            $songAssistant = Model_SongAssistantManager::getSongAssistantByPrefix($prefix);

            $id = substr($id, 1);
            if (isset($songAssistant)){
                $result = $songAssistant->getInfo($id);
                $song = $result;
                if (isset($result))
                    echo json_encode(array('status' => 'OK' , 'code' => CODE_SUCCESS, 'song'=> $result));
                else
                    echo json_encode(array('status' => 'FAILED' , 'code' => CODE_ERROR_INVALID, 'message'=> 'Invalid song ID'));

                return;
            }

            echo json_encode(array('status' => 'FAILED' , 'code' => CODE_ERROR_FAILED,'message'=> 'Something wrong in server'));
        }
    }

    // /song/suggest?s=xxxx    POST: token=xxx&r=yyyy
    public function suggestAction($param){

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        if (!isset($param['s'])){
            echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_MISSING, 'message' => "Missing keyword"));
            return;
        }

        $randomNumber = Lib_Utility::get_post_var('r');
        if (!Lib_Utility::checkRandomNumber($randomNumber)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Invalid random number',
                'code' => CODE_ERROR_INVALID
            ));
            return;
        }

        $token = Lib_Utility::get_post_var('token');

        if (!isset($token)){
            echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_MISSING , 'message' => "Missing token"));
            return;
        }else {
            $username = Model_User::checkAuthenticatedToken($token);
            if (!isset($username)){
                echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_INVALID ,'message' => "Invalid token"));
                return;
            }
        }

        $s = str_replace('%20', ' ' , $param['s']);
        if (strlen($s) <2){
            echo json_encode(array('status' => 'OK', 'code' => CODE_SUCCESS, 'results' => array()));
        }


        $t = new Lib_LanguageDetector_LanguageDetector();
        $lang = $t->predict($s);

        $songAssistant = Model_SongAssistantManager::getSongAssistantByLanguage($lang);



        if (isset($songAssistant)){
            $result = $songAssistant->getSuggestionByKeyword($s);

            if (isset($result))
                echo json_encode(array('status' => 'OK' , 'code' => CODE_SUCCESS, 'songs'=>$result));
            else
                echo json_encode(array('status' => 'OK' , 'code' => CODE_SUCCESS, 'songs'=> array()));
        }else{
            echo json_encode(array('status' => 'FAILED' , 'code' => CODE_ERROR_FAILED ,'message'=> 'Can not get song assistant'));
        }
    }

    public function saverecordAction($param){

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        $randomNumber = Lib_Utility::get_post_var('r');
        if (!Lib_Utility::checkRandomNumber($randomNumber)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Invalid random number',
                'code' => CODE_ERROR_INVALID
            ));
            return;
        }

        $token = Lib_Utility::get_post_var('token');
        if (!isset($token)){
            echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_MISSING , 'message' => "Missing token"));
            return;
        }else {
            $username = Model_User::checkAuthenticatedToken($token);
            if (!isset($username)){
                echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_INVALID ,'message' => "Invalid token"));
                return;
            }
        }

        // check random number here


        $allowedExts = array("wav", "mp3", "zip");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);

        if (in_array($extension, $allowedExts)
            && ($_FILES["file"]["type"] == "audio/wav" || $_FILES["file"]["type"] == "audio/mp3"
                || $_FILES["file"]["type"] == "application/zip"
            )
        )
        {
            if ($_FILES["file"]["error"] > 0)
            {
                echo json_encode(array(
                    'status' => 'FAILED',
                    'code' => CODE_ERROR_FAILED,
                    'message' =>  $_FILES["file"]["error"]
                ));
            }
            else
            {
                $isMixed = Lib_Utility::get_post_var('ismixed');
                $songid = Lib_Utility::get_post_var("songid");
                echo json_encode(Model_Song::saveRecord($_FILES["file"], $username, $songid, $isMixed));
            }
        }
        else
        {
            echo json_encode(array(
                'status' => 'FAILED',
                'code' => CODE_ERROR_INVALID,
                'message' =>  'Invalid file type. Your file type is ' . $_FILES["file"]["type"] . '. Require audio format'
            ));
        }
    }

    // /song/fixlink?link=xxxx&id=yyyy    POST: token=xxx&r=yyyy
    public function fixlinkAction($param){

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        $randomNumber = Lib_Utility::get_post_var('r');
        if (!Lib_Utility::checkRandomNumber($randomNumber)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Invalid random number',
                'code' => CODE_ERROR_INVALID
            ));
            return;
        }

        $link = $param['link'];
        $id = null;
        if (isset($param['id']))
            $id = $param['id'];
        else
            $id = "";

        $link = Lib_Utility::get_post_var("link");
        if (!isset($link)){
            echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_MISSING ,'message' => "Missing broken link"));
            return;
        }

        $token = Lib_Utility::get_post_var('token');

        if (!isset($token)){
            echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_MISSING ,'message' => "Missing token"));
            return;
        }else {
            $username = Model_User::checkAuthenticatedToken($token);
            if (!isset($username)){
                echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_INVALID , 'message' => "Invalid token"));
                return;
            }
        }


        /*
        $link = Lib_Utility::get_post_var('link');
        */


        //$zingAss = Model_SongFactory::getAssistant(Model_SongConstants::$ZING_PREFIX);

        if (isset($link)){
            //$link = str_replace('|','/', $link);
            //$link = str_replace('%7C', '/', $link);

            echo json_encode(array(
                'status' => 'OK',
                'code' => CODE_SUCCESS ,
                'message' => 'Fix link successfully',
                'link' => Model_Song::fixlinkAction($link,$id)
            ));
        }
        else {
            echo json_encode(array(
                'status' => 'FAILED',
                'code' => CODE_ERROR_MISSING ,
                'message' => 'Missing parameter:link',
                'link' => $link
            ));
        }
    }

    public function cacheAction($param){

        $lastSongID = null;



        $path = SERVER_ROOT . '/logs/cache';
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
        $fp = fopen($path, 'a') or die("can't open file");
        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('UTC'));


        $configFile = SERVER_ROOT . '/Config/' . 'Configuration.xml';

        $cacheConfig = simplexml_load_file($configFile);

        if (isset($param['id'])){
            try{
                $lastSongID = intval($param['id']);
            }
            catch (Exception $e){
                echo "Wrong ID";
                die;
            }
        } else {
            $lastSongID = intval($cacheConfig->cache->lastsongid);
        }

        echo $now->format('Y-m-d H:i:s') . "<br/>";
        echo "Last song ID:" . $lastSongID . "<br/>";


        fwrite($fp,$now->format('Y-m-d H:i:s') . "\n");

        $songs = Model_Song::getNewerSong($lastSongID);

        if (isset($songs)){
            foreach($songs as $song){
                echo "Cache song " . $song['customID'] . "<br/>";
                try{
                    $lastSongID = intval($song['id']);
                    $result = Model_Song::cacheSong($song['customID'], $song['beatURL']);
                    if ($result == 1){
                        $log =  "Save song " . $song['customID'] . ' - Title: ' . $song['title'] . "\n";
                        fwrite($fp, $log);
                    }
                    else {
                        if ($result == 0){
                            fwrite($fp, "Song " . $song['customID'] . ' - Title: ' . $song['title'] . " has been cached \n");
                        }
                        else
                            fwrite($fp, "Song " . $song['customID'] . ' - Title: ' . $song['title'] . "couldn't be cached!\n");
                    }
                }
                catch (Exception $e){
                    echo $e->getMessage();
                    fwrite($fp, "Error: " . $e->getMessage());
                }
            }
        }
        echo "Caching songs finish!" . "<br/>";
        echo "Lastsong ID: " . $lastSongID . "<br/>";
        $cacheConfig->cache->lastsongid = $lastSongID;
        if(!$cacheConfig->asXml($configFile))
        {
            // Logging class initialization
            $log = new Lib_Logging();

            // set path and name of log file (optional)
            $log->lfile(SERVER_ROOT. DS . 'logs/logs.log');

            // write message to the log file
            $log->lwrite("Error when update config for Caching (" . substr(sprintf('%o', fileperms($configFile)), -4) .")");
            // close log file
            $log->lclose();
        }
        echo "Write to database OK";
        fwrite($fp, "Finish with lastsongid=" . $lastSongID . "\n\n");
        fclose($fp);
    }



}
