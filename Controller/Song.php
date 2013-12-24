<?php

class Controller_Song extends Core_Controller {


    // /song/search?s={0}   POST with token=xxx&r=xxx
    public function searchAction($param){
        if (!isset($param['s'])){
            echo json_encode(array('status' => 'FAILED', 'message' => "Missing keyword"));
            return;
        }

        $token = Lib_Utility::get_post_var('token');

        if (!isset($token)){
            echo json_encode(array('status' => 'FAILED', 'message' => "Missing token"));
            return;
        }else {
            $username = Model_User::checkAuthenticatedToken($token);
            if (!isset($username)){
                echo json_encode(array('status' => 'FAILED', 'message' => "Invalid token"));
                return;
            }
        }

        $songName = $param['s'];
        $songName = str_replace('%20','+', $songName  );

        $t = new Lib_LanguageDetector_LanguageDetector();
        $tmp = str_replace('+', ' ', $songName);
        $lang = $t->predict($tmp);

        $songAssitant = null;
        $result = null;

        if ($lang == 'vi'){
            $songAssitant = Model_SongFactory::getAssistant(Model_SongConstants::$ZING_PREFIX);
            $result = $songAssitant->searchByName($songName);
        }
        else {

            $songAssitant = Model_SongFactory::getAssistant(Model_SongConstants::$LUCKYVOICE_PREFIX);
            $result = $songAssitant->searchByName($songName);
        }

        //$result = array_merge($result2, $result);


        Model_Song::saveSearchHistory($songName, $username);

        //$result = (new Model_ZingSong())->searchByName($songName);
        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        echo json_encode(array('status' => 'OK', 'query' => $songName ,'song_list' => $result));
    }

    // /song/hotkaraoke?lang=xxx POST: token
    public function hotkaraokeAction($param){

        $token = Lib_Utility::get_post_var('token');

        if (!isset($token)){
            echo json_encode(array('status' => 'FAILED', 'message' => "Missing token"));
            return;
        }else {
            $username = Model_User::checkAuthenticatedToken($token);
            if (!isset($username)){
                echo json_encode(array('status' => 'FAILED', 'message' => "Invalid token"));
                return;
            }
        }

        $lang = 'en';
        $songAssistant = null;
        if (isset($param['lang'])){
            $lang = $param['lang'];
        }

        if ($lang == 'vi'){
            $songAssistant = Model_SongFactory::getAssistant(Model_SongConstants::$ZING_PREFIX);

        }
        else {
            $songAssistant = Model_SongFactory::getAssistant(Model_SongConstants::$LUCKYVOICE_PREFIX);
        }

        $result = $songAssistant->getHotKaraoke();
        //$result = Model_Song::getHotKaraoke();
        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');
        echo json_encode(array('status' => 'OK', 'song_list' => $result));
    }

    // /song/getInfo?id=xxxx    POST: token=xxx&r=yyyy
    public function getInfoAction($param){

        if (!isset($param['id'])){
            echo json_encode(array('status' => 'FAILED', 'message' => "Missing song ID"));
            return;
        }

        $token = Lib_Utility::get_post_var('token');

        if (!isset($token)){
            echo json_encode(array('status' => 'FAILED', 'message' => "Missing token"));
            return;
        }else {
            $username = Model_User::checkAuthenticatedToken($token);
            if (!isset($username)){
                echo json_encode(array('status' => 'FAILED', 'message' => "Invalid token"));
                return;
            }
        }

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        $id = $param['id'];
        $song = Model_Song::getSongByID($id);


        // Find in our database first
        if (isset($song)){

            //$song = new Model_Song("Title", "Singer", "Author");
            echo json_encode(array('status' => 'OK' , 'song' => $song));
            return;
        }

        if (isset($param['id'])){


            // Get the first character of id, this is the prefix of zing song or lucky voice song
            $songAssistant = Model_SongFactory::getAssistant($id[0]);

            $id = substr($id, 1);
            $result = $songAssistant->getInfo($id);
            if (isset($result))
                echo json_encode(array('status' => 'OK' , 'song'=> $result));
            else
                echo json_encode(array('status' => 'FAILED' , 'message'=> 'Invalid song ID'));
        }
    }

    // /song/suggest?s=xxxx    POST: token=xxx&r=yyyy
    public function suggestAction($param){

        if (!isset($param['s'])){
            echo json_encode(array('status' => 'FAILED', 'message' => "Missing keyword"));
            return;
        }

        $token = Lib_Utility::get_post_var('token');

        if (!isset($token)){
            echo json_encode(array('status' => 'FAILED', 'message' => "Missing token"));
            return;
        }else {
            $username = Model_User::checkAuthenticatedToken($token);
            if (!isset($username)){
                echo json_encode(array('status' => 'FAILED', 'message' => "Invalid token"));
                return;
            }
        }

        $s = str_replace('%20', ' ' , $param['s']);
        if (strlen($s) <3){
            return json_encode(array('status' => 'OK', 'results' => array()));
        }


        $t = new Lib_LanguageDetector_LanguageDetector();
        $lang = $t->predict($s);
        $songAssistant = null;
        if ($lang == 'vi'){
            $songAssistant = new Model_ZingAssistant();
        }else{
            $songAssistant = new Model_LuckyVoiceAssistant();
        }

        $result = $songAssistant->getSuggestionByKeyword($s);

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        if (isset($result))
            echo json_encode(array('status' => 'OK' , 'songs'=>$result));
        else
            echo json_encode(array('status' => 'OK' , 'songs'=> array()));
    }

    // /song/fixlink?link=xxxx&id=yyyy    POST: token=xxx&r=yyyy
    public function fixlinkAction($param){
        $link = $param['link'];
        $id = null;
        if (isset($param['id']))
            $id = $param['id'];
        else
            $id = "";

        if (!isset($param['link'])){
            echo json_encode(array('status' => 'FAILED', 'message' => "Missing broken link"));
            return;
        }

        $token = Lib_Utility::get_post_var('token');

        if (!isset($token)){
            echo json_encode(array('status' => 'FAILED', 'message' => "Missing token"));
            return;
        }else {
            $username = Model_User::checkAuthenticatedToken($token);
            if (!isset($username)){
                echo json_encode(array('status' => 'FAILED', 'message' => "Invalid token"));
                return;
            }
        }


        /*
        $link = Lib_Utility::get_post_var('link');
        */
        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        $zingAss = Model_SongFactory::getAssistant(Model_SongConstants::$ZING_PREFIX);

        if (isset($link)){
            $link = str_replace('|','/', $link);

            echo json_encode(array('status' => 'OK', 'message' => 'Fix link successfully', 'link' => $zingAss->fixlinkAction($link,$id)));
        }
        else {
            echo json_encode(array('status' => 'FAIL', 'message' => 'Missing parameter:link', 'link' => $zingAss->fixlinkAction($link, $id)));
        }
    }

    public function cacheAction(){

        echo "CACHING SONGS!" . "<br/>";
        $cacheConfig = simplexml_load_file(SERVER_ROOT . '/Config/' . 'Configuration.xml');

        $lastSongID = intval($cacheConfig->cache->lastsongid);
        echo "Last song ID:" . $lastSongID . "<br/>";

        $songs = Model_Song::getNewerSong($lastSongID);

        if (isset($songs)){
            foreach($songs as $song){
                echo "Cache song " . $song['customID'] . "<br/>";
                try{
                    Model_Song::cacheSong($song['customID'], $song['lyricURL'], $song['beatURL']);
                    $lastSongID = intval($song['id']);
                    echo "Save song " . $song['customID'] . "<br/>";
                }
                catch (Exception $e){
                    echo $e->getMessage();
                }
            }
        }
        echo "Caching songs finish!" . "<br/>";
        $cacheConfig->cache->lastsongid = $lastSongID;
        $cacheConfig->asXml(SERVER_ROOT . '/Config/' . 'Configuration.xml');
    }



}
