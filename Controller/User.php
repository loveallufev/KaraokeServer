<?php
/**
 * Created by PhpStorm.
 * User: Duc Trung NGUYEN
 * Date: 12/1/13
 * Time: 6:39 PM
 */
include SERVER_ROOT . "/Lib/LanguageDetector/" . 'classifier.php';

class Controller_User extends Core_Controller{


    public function createAction($param){
        $username = Lib_Utility::get_post_var('username');
        $password = Lib_Utility::get_post_var('password');
        if (!isset($username) || !isset($password)){
            echo json_encode(array('status' => 'FAILED', 'message' => 'Missing username or password'));
            return;
        }

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        /* Sanity-check the username, don't rely on our use of prepared statements
        * alone to prevent attacks on the SQL server via malicious usernames. */
        if (!preg_match('/^[a-zA-Z0-9_]{1,60}$/', $username))
        {
            //Lib_Utility::fail('Invalid username');
            echo json_encode(array('status' => 'FAILED', 'message' => 'Invalid username'));
            return;
        }

        /* Don't let them spend more of our CPU time than we were willing to.
        * Besides, bcrypt happens to use the first 72 characters only anyway. */
        if (strlen($password) > 72){
            //Lib_Utility::fail('The supplied password is too long');
            echo json_encode(array('status' => 'FAILED', 'message' => 'The supplied password is too long'));
            return;
        }

        echo json_encode(Model_User::createNewUser($username, $password));

    }


    // POST: username=xxx&password=yyy
    public function loginAction($param){
        $username = Lib_Utility::get_post_var('username');
        $password = Lib_Utility::get_post_var('password');
        if (!isset($username) || !isset($password)){
            echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_MISSING, 'message' => 'Missing username or password'));
            return;
        }

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        /* Sanity-check the username, don't rely on our use of prepared statements
        * alone to prevent attacks on the SQL server via malicious usernames. */
        if (!preg_match('/^[a-zA-Z0-9_]{1,60}$/', $username))
        {
            //Lib_Utility::fail('Invalid username');
            echo json_encode(array('status' => 'FAILED', 'code' => -4, 'message' => 'Invalid username'));
            return;
        }

        echo json_encode(Model_User::login($username, $password));

    }

    public function testAction(){
        //Model_LuckyVoiceAssistant::getLuckyToken();
        //Model_LuckyVoiceAssistant::loginLuckyAction();
        $t = new Lib_LanguageDetector_LanguageDetector();
        //echo "testaction";
        echo "Language:" . $t->predict("anh ba hung") . "<br/>";
        echo "Language:" . $t->predict("proud of you") . "<br/>";
    }

} 