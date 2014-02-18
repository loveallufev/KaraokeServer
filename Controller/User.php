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

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        $username = Lib_Utility::get_post_var('username');
        $password = Lib_Utility::get_post_var('password');

        $randomNumber = Lib_Utility::get_post_var('r');
        if (!Lib_Utility::checkRandomNumber($randomNumber)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Invalid random number',
                'code' => CODE_ERROR_INVALID
            ));
            return;
        }

        if (!isset($username) || !isset($password)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Missing username or password',
                'code' => CODE_ERROR_MISSING
            ));
            return;
        }

        /* Sanity-check the username, don't rely on our use of prepared statements
        * alone to prevent attacks on the SQL server via malicious usernames. */
        if (!preg_match('/^[a-zA-Z0-9_.@]{6,60}$/', $username))
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

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        $username = Lib_Utility::get_post_var('username');
        $password = Lib_Utility::get_post_var('password');


        $randomNumber = Lib_Utility::get_post_var('r');
        if (!Lib_Utility::checkRandomNumber($randomNumber)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Invalid random number',
                'code' => CODE_ERROR_INVALID
            ));
            return;
        }

        if (!isset($username) || !isset($password)){
            echo json_encode(array(
                'status' => 'FAILED',
                'code' => CODE_ERROR_MISSING,
                'message' => 'Missing username or password'
            ));
            return;
        }

        /* Sanity-check the username, don't rely on our use of prepared statements
        * alone to prevent attacks on the SQL server via malicious usernames. */
        if (!preg_match('/^[a-zA-Z0-9_.@]{6,60}$/', $username))
        {
            //Lib_Utility::fail('Invalid username');
            echo json_encode(array('status' => 'FAILED', 'code' => CODE_ERROR_INVALID, 'message' => 'Invalid username'));
            return;
        }

        echo json_encode(Model_User::login($username, $password));

    }

    public function testAction(){
        Lib_Utility::checkRandomNumber("dafadfads");
    }

    // only use this function for login with a social network
    public function createAndLoginAction($param){

        header('Content-Type: application/json; charset=UTF-8');
        header('Cache-Control: no-cache, must-revalidate');

        $username = Lib_Utility::get_post_var('username');
        $password = Lib_Utility::get_post_var('password');


        $randomNumber = Lib_Utility::get_post_var('r');
        if (!Lib_Utility::checkRandomNumber($randomNumber)){
            echo json_encode(array(
                'status' => 'FAILED',
                'message' => 'Invalid random number',
                'code' => CODE_ERROR_INVALID
            ));
            return;
        }

        if (strlen($username) < 4){
            echo json_encode(array(
                'status' => 'FAILED',
                'code' => CODE_ERROR_INVALID,
                'message' => 'Username must have more than 6 characters'
            ));
        }

        if (substr($username,0,3) == "fb@"){
            if (Model_User::usernameExist($username)){
                Controller_User::loginAction($param);
            }else{
                Model_User::createNewUser($username, $password);
                Controller_User::loginAction($param);
            }
        }
        else{
            echo json_encode(array(
                'status' => 'FAILED',
                'code' => CODE_ERROR_INVALID,
                'message' => 'Invalid username. This login method is used only for social network\'s accounts'
            ));
        }
    }

} 