<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 2/17/14
 * Time: 4:59 AM
 */
class VideoInfo{
    public $name;
    public $url;
}

class Controller_Helper {

    public function uploadAction($param){

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        /*
        $randomNumber = Lib_Utility::get_post_var('r');
        if (!Lib_Utility::checkRandomNumber($randomNumber)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Invalid random number',
                'code' => CODE_ERROR_INVALID
            ));
            return;
        }
        */

        $title = Lib_Utility::get_post_var("title");
        $singer = Lib_Utility::get_post_var("singer");
        $author = Lib_Utility::get_post_var("author");
        $category = Lib_Utility::get_post_var("category");
        $karaoke = Lib_Utility::get_post_var("karaoke");

        $language =  Lib_Utility::get_post_var("language");
        $username = Lib_Utility::get_post_var("username");

        if (isset($language))
            $language = strtoupper($language);
        else
            $language = "VI";

        $allowedExts = array("wav", "mp3", "zip");
        $temp = explode(".", $_FILES["file"]["name"]);
        $extension = end($temp);
        $newID='';

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
                $file = $_FILES["file"];

                $model = new Core_Model();
                $model->getDB()->connect();

                $query = "SELECT id FROM song ORDER BY `id` DESC LIMIT 0,1";

                $model->getDB()->prepare($query);

                if (!$model->getDB()->query()){
                    echo json_encode(array('status' => 'FAIL', 'code' => CODE_ERROR_SERVER , 'message'=>$model->getDB()->connection->error));
                    return;
                }

                $max = $model->getDB()->fetch()->id;

                $newID = $language . $max;

                $path = SERVER_ROOT . DS . Model_Song::getCachePathOfSong($newID);

                $folder = dirname($path);
                if (!file_exists($folder))
                {
                    //$oldmask = umask(0);
                    mkdir($folder, 0777, true);
                    //umask($oldmask);
                }

                move_uploaded_file($file["tmp_name"], $path);

                if (file_exists($path)){

                    $song = new Model_Song($title,$singer, $author,null,$category);
                    $song->beatURL = BASE_URL . "/songs/" . $newID . DS . $newID . ".mp3";
                    $song->karaoke = $karaoke;
                    $song->ID = $newID;
                    $song->insertThisIntoDatabase();


                    echo json_encode(array(
                        'status' => 'OK' ,
                        'code' => CODE_SUCCESS,
                        'message' => "Upload song $newID successfully"
                    ));

                }
                else {
                    echo json_encode(array(
                        'status' => 'FAILED' ,
                        'code' => CODE_ERROR_FAILED,
                        'message' => 'Can not create new file'
                    ));
                }

                $model->getDB()->disconnect();

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

        // Logging class initialization
        $log = new Lib_Logging();

        // set path and name of log file (optional)
        $log->lfile(SERVER_ROOT. DS . 'logs/logs.log');

        // write message to the log file
        $log->lwrite(sprintf('%s create new beat song the song ID=%s', $username, $newID));
        // close log file
        $log->lclose();
    }

    public function loginAction($param){

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        $username = Lib_Utility::get_post_var("username");
        $password = Lib_Utility::get_post_var("password");

        if (!isset($username) || !isset($password)){
            echo json_encode(array(
               'status' => 'FAILED',
                'code' => CODE_ERROR_MISSING,
                'message' => "Missing username or password"
            ));
        }

        /*
        $randomNumber = Lib_Utility::get_post_var('r');
        if (!Lib_Utility::checkRandomNumber($randomNumber)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Invalid random number',
                'code' => CODE_ERROR_INVALID
            ));
            return;
        }
        */

        $authen = array(
          "ndtruyen" => "truyennguyen",
            'ndtrung' => 'ductrunglk89'
        );

        if ($authen[$username] == $password){
            echo json_encode(array(
                'status' => 'OK',
                'code' => CODE_SUCCESS,
                'message' =>  'Login success'
            ));
        }
        else{
            echo json_encode(array(
               'status' => 'FAILED',
                'code' => CODE_ERROR_INVALID,
                'message' => 'Invalid username or password'
            ));
        }
    }

    public function getyoutubeAction($param){

        $youtubeURL = "";
        $youtubeContent ="";

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        /*
        $randomNumber = Lib_Utility::get_post_var('r');
        if (!Lib_Utility::checkRandomNumber($randomNumber)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Invalid random number',
                'code' => CODE_ERROR_INVALID
            ));
            return;
        }
        */

        if (isset($_POST["url"])){
            $youtubeURL = $_POST["url"];

            $header = array(
                'Host: www.kibase.com',
                'Connection: Close',
                'Origin: http://www.kibase.com',
                'User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_9_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/32.0.1700.107 Safari/537.36',
                'Content-type: application/x-www-form-urlencoded',
                'Accept: */*',
                'DNT: 1',
                'Referer: http://www.kibase.com/YoutubeDownloaderAdv.html',
                'Accept-Encoding: gzip,deflate,sdch',
                'Accept-Language: en-US,en;q=0.8,vi;q=0.6',
                'Cookie: __utma=152272547.776876905.1392412036.1392412036.1392412036.1; __utmb=152272547.6.10.1392412036; __utmc=152272547; __utmz=152272547.1392412036.1.1.utmcsr=wikihow.com|utmccn=(referral)|utmcmd=referral|utmcct=/Download-YouTube-Videos'
            );

            $youtubeContent = Lib_Utility::SendRequest($youtubeURL);



            $data = array(
                'payload' => 'getVideoMap',
                'sourceText' => $youtubeContent
            );

            $url = "http://www.kibase.com/utils/SuperAnalyzer.php";

            $response = Lib_Utility::post_request($url, $header, $data);
            $result = array();

            if ($response['code'] == '200'){

                $content = $response['content'];

                $videoInfo = explode('[+++ADA+++]', $content);

                foreach ($videoInfo as $video){

                    $info = explode('[+++ANDREW+++]', $video);
                    if (sizeof($info) > 1){
                        $v = new VideoInfo();
                        $v->name = $info[0];
                        $v->url = $info[1];
                        array_push($result, $v);
                    }
                }


                echo json_encode(array(
                    'status' => 'OK',
                    'code' => CODE_SUCCESS,
                    'result' => $result
                ));
            }
            else {
                echo json_encode(array(
                    'status' => 'FAILED',
                    'code' => CODE_ERROR_FAILED,
                    'result' => 'Fail'
                ));
            }

        }
        else {
            echo json_encode(array(
                'status' => 'FAILED',
                'code' => CODE_ERROR_MISSING,
                'result' => 'Missing parameter'
            ));
        }
    }

} 