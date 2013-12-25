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


        $result = null;

        $songAssistant = Model_SongAssistantManager::getSongAssistantByLanguage($lang);


        //$result = (new Model_ZingSong())->searchByName($songName);
        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        if (isset($songAssistant)){
            $result = $songAssistant->searchByName($songName);
            echo json_encode(array('status' => 'OK', 'query' => $songName ,'song_list' => $result));
            Model_Song::saveSearchHistory($songName, $username);
            return;
        }


        echo json_encode(array('status' => 'FAILED', 'message' => 'Can not get song assistant'));
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

        $songAssistant = Model_SongAssistantManager::getSongAssistantByLanguage($lang);

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
            $songAssistant = Model_SongAssistantManager::getSongAssistantByPrefix($id[0]);

            $id = substr($id, 1);
            if (isset($songAssistant)){
                $result = $songAssistant->getInfo($id);
                if (isset($result))
                    echo json_encode(array('status' => 'OK' , 'song'=> $result));
                else
                    echo json_encode(array('status' => 'FAILED' , 'message'=> 'Invalid song ID'));

                return;
            }

            echo json_encode(array('status' => 'FAILED' , 'message'=> 'Something wrong in server'));
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

        $songAssistant = Model_SongAssistantManager::getSongAssistantByLanguage($lang);

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        if (isset($songAssistant)){
            $result = $songAssistant->getSuggestionByKeyword($s);

            if (isset($result))
                echo json_encode(array('status' => 'OK' , 'songs'=>$result));
            else
                echo json_encode(array('status' => 'OK' , 'songs'=> array()));
        }else{
            echo json_encode(array('status' => 'FAILED' , 'message'=> 'Can not get song assistant'));
        }
    }

    // /song/fixlink?link=xxxx&id=yyyy    POST: token=xxx&r=yyyy
    public function fixlinkAction($param){
        $link = $param['link'];
        $id = null;
        if (isset($param['id']))
            $id = $param['id'];
        else
            $id = "";

        $link = Lib_Utility::get_post_var("link");
        if (!isset($link)){
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

        //$zingAss = Model_SongFactory::getAssistant(Model_SongConstants::$ZING_PREFIX);

        if (isset($link)){
            //$link = str_replace('|','/', $link);
            //$link = str_replace('%7C', '/', $link);

            echo json_encode(array('status' => 'OK', 'message' => 'Fix link successfully', 'link' => Model_Song::fixlinkAction($link,$id)));
        }
        else {
            echo json_encode(array('status' => 'FAIL', 'message' => 'Missing parameter:link', 'link' => $link));
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
        echo "Lastsong ID: " . $lastSongID . "<br/>";
        $cacheConfig->cache->lastsongid = $lastSongID;
        $cacheConfig->asXml(SERVER_ROOT . '/Config/' . 'Configuration.xml');
        echo "Write to database OK";
    }



}
