<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 12/23/13
 * Time: 5:36 AM
 */

require_once SERVER_ROOT . '/Config/' . 'LuckyVoiceSetting.php';

class Model_LuckyVoiceAssistant extends  Model_AbstractAssistant {

    // SEARCH SONG BY NAME
    public function searchByName($songName){
        $songName = strtolower($songName);

        if (!Model_LuckyVoiceAssistant::checkValidToken())
            $this->getLuckyToken();

        $header = array(
            'Origin: http://www.luckyvoice.com',
            'Accept-Encoding: gzip, deflate',
            'Cookie: __utma=168234556.1276105559.1387395470.1387395470.1387395470.1; __utmb=168234556.4.10.1387395470; __utmc=168234556; __utmz=168234556.1387395470.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); sessionid=' . LuckyVoiceSetting::$config->api_token->sessionid,
            'Connection: Close',
            'Accept: application/json, text/javascript, */*; q=0.01',
            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.73.11 (KHTML, like Gecko) Version/7.0.1 Safari/537.73.11',
            'Authorization: Bearer ' . LuckyVoiceSetting::$config->api_token->token,
            'Accept-Language: en-us'
        );

        $url = 'http://api.luckyvoice.com/song/search?' . 'q=' . $songName . '&max_results=30' ;

        $response = Lib_Utility::post_request($url, $header, array(), 'GET');

        $songList = array();

        if ($response['code'] == '200'){
            $result = json_decode($response['content'], true);

            // if we found songs

            if (isset($result['results'])){
                foreach ($result['results'] as $r){
                    $title = $r['title'];
                    $singer = $r['artist_name'];
                    $id = $r['id'];
                    /*
                    $song = new Model_Song($title, $singer, "");
                    $song->ID = Model_SongConstants::$LUCKYVOICE_PREFIX . $id;
                    */
                    $song = new Model_BasicSong();
                    $song->title = $title;
                    $song->ID = $this->prefix . $id;
                    $song->singer = $singer;
                    array_push($songList, $song);
                }
            }
        }

        return $songList;
    }

    public function getSuggestionByKeyword($songName){
        $songName = strtolower($songName);
        if (!Model_LuckyVoiceAssistant::checkValidToken())
            $this->getLuckyToken();


        $header = array(
            'Host: api.luckyvoice.com',
            'Origin: http://www.luckyvoice.com',
            'Accept-Encoding: gzip, deflate',
            'Cookie: __utma=168234556.1276105559.1387395470.1387395470.1387395470.1; __utmb=168234556.4.10.1387395470; __utmc=168234556; __utmz=168234556.1387395470.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); sessionid=' . LuckyVoiceSetting::$config->api_token->sessionid,
            'Connection: Close',
            'Accept: application/json, text/javascript, */*; q=0.01',
            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.73.11 (KHTML, like Gecko) Version/7.0.1 Safari/537.73.11',
            'Authorization: Bearer ' . LuckyVoiceSetting::$config->api_token->token,
            'Referer: http://www.luckyvoice.com/',
            'Accept-Language: en-us'
        );


        $url = 'http://api.luckyvoice.com/song/search/suggest?' . 'q=' . $songName . '&max_results=5' ;

        //$response = Lib_Utility::SendRequest($url, 'GET', array(), $header2);
        $response = Lib_Utility::post_request($url, $header, array(), 'GET');

        if ($response['code'] = 200){
            $content = json_decode($response['content'], true);
            return $content['results'];
        }

        return null;
    }

    public  function getHotKaraoke(){

        if (!Model_LuckyVoiceAssistant::checkValidToken())
            $this->getLuckyToken();

        $url = 'http://api.luckyvoice.com/user/me/playlists?include_featured=true&per_page=50';

        $header = array(
            'Host: api.luckyvoice.com',
            'Connection: Close',
            'Accept: application/json, text/javascript, */*; q=0.01',
            'Origin: http://www.luckyvoice.com',
            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/31.0.1650.63 Safari/537.36',
            'Authorization: Bearer ' . LuckyVoiceSetting::$config->api_token->token,
            'DNT: 1',
            'Accept-Encoding: gzip,deflate,sdch',
            'Accept-Language: en-US,en;q=0.8,vi;q=0.6',
            'Cookie: user_segment=Prospect; sessionid=' . LuckyVoiceSetting::$config->api_token->sessionid .'; __utma=168234556.758997994.1387388633.1387837193.1387899197.5; __utmb=168234556.2.10.1387899197; __utmc=168234556; __utmz=168234556.1387388633.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none)'
        );

        $response = Lib_Utility::post_request($url, $header, array(), "GET");
        $count = 0;
        if ($response['code'] == 200){
            $songList = array();
            $result = json_decode($response['content'], true);
            foreach($result['playlists'] as $playlist){
                foreach ($playlist['songs'] as $song){
                    // Only get 50 first songs
                    $count += 1;
                    if ($count > 100)
                        break;

                    $title = $song['title'];
                    $singer = $song['artist_name'];
                    $id = $song['id'];

                    $song = new Model_BasicSong();
                    $song->title = $title;
                    $song->ID = $this->prefix . $id;
                    $song->singer = $singer;
                    array_push($songList, $song);
                }
            }

            return $songList;
        }

        return null;
    }



    public function getInfo($id){
        $song = null;

        if (!Model_LuckyVoiceAssistant::checkValidToken())
            $this->getLuckyToken();

        //song_id=5752&medium=lyrics&is_broadcastable=true&resolution%3Ax=1264&resolution%3Ay=806

        $header = array(
            'Accept: application/json, text/javascript, */*; q=0.01',
            'Authorization: Bearer ' . LuckyVoiceSetting::$config->api_token->token,
            'Accept-Encoding: gzip, deflate',
            'Accept-Language: en-us',
            'Content-Type: application/x-www-form-urlencoded; charset=UTF-8',
            'Origin: http://www.luckyvoice.com',
            'Connection: Close',
            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.73.11 (KHTML, like Gecko) Version/7.0.1 Safari/537.73.11',
            'Cookie: __utma=168234556.1276105559.1387395470.1387395470.1387395470.1; __utmb=168234556.5.10.1387395470; __utmc=168234556; __utmz=168234556.1387395470.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); sessionid=f5tdh5yxunnmsx1lwxxzueneh1bluojl'
        );

        $url = 'http://api.luckyvoice.com/play' ;

        $data = array(
            'song_id' => $id,
            'medium' => 'lyrics',
            'is_broadcastable' => 'true',
            'resolution%3Ax' => '1264',
            'resolution%3Ay' => '806'
        );

        $response = Lib_Utility::post_request($url, $header, $data);

        if ($response['code'] == '201'){

            $result = json_decode($response['content'], true);
            $id = $this->prefix . $result['play']['song']['id'];
            $title = $result['play']['song']['title'];
            $singer = $result['play']['song']['artist_name'];
            $beatURL = $result['play']['media']['audio:full'];
            $song = new Model_Song($title, $singer, "", "", "");
            $song->beatURL = $beatURL;
            $song->ID = $id;

            // Process lyric and transform it to xml
            $karaoke = new Model_LyricKaraoke();


            foreach($result['play']['media']['lyrics'] as $para){

                foreach ($para as $s){
                    $sentence = new Model_Sentence();

                    foreach ($s as $w){
                        $obj = new Model_Word();
                        $obj->content = $w['0'];
                        $obj->start = $w['1'];
                        $obj->end = $w['2'];
                        $obj->gender = $w['3'];
                        array_push($sentence->words, $obj);
                    }
                    array_push($karaoke->sentences, $sentence);
                }
            }

            // put it into string
            $song->karaoke = json_encode($karaoke);
        }
        else {
            return null;
        }


        /* WRITE INFORMATION OF THIS SONG TO DATABASE */
        $song->insertThisIntoDatabase();
        /* END WRITING */

        /* SAVE THIS SONG  */
        //$song->catcheThisSong();

        return $song;
    }


    private static function checkValidToken(){
        $expires_token = new DateTime(LuckyVoiceSetting::$config->api_token->expires);
        $expires_token->setTimezone(new DateTimeZone('UTC'));
        $expires_token = strtotime($expires_token->format('Y-m-d H:i:s'));

        $now = new DateTime();
        $now->setTimezone(new DateTimeZone('UTC'));
        $now = strtotime($now->format('Y-m-d H:i:s'));
        $delta = ($expires_token - $now)/60;

        if ($delta < 60){
            return false;
        }

        return true;
    }

    /***************  LOGIN AND GET TOKEN   ****************/


    private function loginLuckyAction(){

        $url = "http://www.luckyvoice.com/login?next=http%3A%2F%2Fwww.luckyvoice.com%2F";
        $header = array(
            'Host: www.luckyvoice.com',
            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.73.11 (KHTML, like Gecko) Version/7.0.1 Safari/537.73.11',
            'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
            'Accept-Language: en-US,en;q=0.5',
            'Origin: http://www.luckyvoice.com/login',
            //'Connection' => 'keep-alive',
            'Connection: Close',
            'Content-Type: application/x-www-form-urlencoded',
            'Cookie: __utma=168234556.1276105559.1387395470.1387395470.1387395470.1; __utmb=168234556.2.10.1387395470; __utmc=168234556; __utmz=168234556.1387395470.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); sessionid=euuz7mg3ua0i9bo1uu74dldiv2tyvyh9',
            'Referer: http://www.luckyvoice.com/login',
            'Accept-Encoding: gzip, deflate',

        );

        $data = array(
            'email' => $this->config['email'],
            'password' => $this->config['password']
        );

        $response = Lib_Utility::post_request('http://www.luckyvoice.com/login', $header, $data);

        $result = $response;

        if ($result['code'] == '200'){
            echo "Wrong username or password of luckyvoice";
            return;
        }

        else if ($result['code'] == '302'){
            $start = strpos($result['header'], 'sessionid', 0) + strlen('sessionid') + 1;
            $end = strpos($result['header'], ';', $start);
            $sessionid = substr($result['header'], $start  , $end - $start );

            $start = strpos($result['header'], 'expires', $end) + strlen('expires') + 1;
            $end = strpos($result['header'], ';', $start);
            $expiredDate = substr($result['header'], $start  , $end - $start );

            LuckyVoiceSetting::$config->login->sessionid = $sessionid;
            LuckyVoiceSetting::$config->login->expires = $expiredDate;
            LuckyVoiceSetting::updateConfig();

            $this->getLuckyToken();
        }

    }

    private function getLuckyToken(){

        $expires_login = new DateTime(LuckyVoiceSetting::$config->login->expires);
        $expires_login->setTimezone(new DateTimeZone('UTC'));
        $now = gmdate("Y-m-d\TH:i:s\Z");
        if ($now >= $expires_login){
            echo "Expired ! Need to login again ! ";
            $this->loginLuckyAction();
        }

        /* GET TOKEN */
        $header = array(
            'Host: www.luckyvoice.com',
            'Origin: http://www.luckyvoice.com',
            'Cookie: __utma=168234556.1276105559.1387395470.1387395470.1387395470.1; __utmb=168234556.4.10.1387395470; __utmc=168234556; __utmz=168234556.1387395470.1.1.utmcsr=(direct)|utmccn=(direct)|utmcmd=(none); sessionid=' . LuckyVoiceSetting::$config->login->sessionid ,

            'Content-Length: 0',
            'Connection: Close',
            'Accept: */*',
            'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.73.11 (KHTML, like Gecko) Version/7.0.1 Safari/537.73.11',
            'Referer: http://www.luckyvoice.com/',
            'Accept-Language: en-us',
            'X-Requested-With: XMLHttpRequest'
        );

        $response = Lib_Utility::post_request('http://www.luckyvoice.com/--api-token', $header, array());
        $result = $response;
        $pos = strpos($result['header'], 'sessionid', 0);
        if (!$pos){
            $this->loginLuckyAction();
            return;
        }
        $start = $pos + strlen('sessionid') + 1;

        $end = strpos($result['header'], ';', $start);
        $sessionid = substr($result['header'], $start  , $end - $start );

        //$start = strpos($result['header'], 'expires', $end) + strlen('expires') + 1;
        //$end = strpos($result['header'], ';', $start);
        //$expiredDate = substr($result['header'], $start  , $end - $start );

        $json = json_decode($result['content'], true);
        LuckyVoiceSetting::$config->api_token->sessionid = $sessionid;
        LuckyVoiceSetting::$config->api_token->expires = $json['expiration'];
        LuckyVoiceSetting::$config->api_token->token = $json['token'];
        LuckyVoiceSetting::updateConfig();

    }

    /***************  END OF LOGIN AND GET TOKEN  ***********/
} 