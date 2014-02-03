<?php
/**
 * Created by PhpStorm.
 * User: Duc Trung NGUYEN
 * Date: 12/1/13
 * Time: 3:12 PM
 */
//require_once '../Lib/Utility.php';
class Model_User extends  Core_Model{
    public static function createNewUser($username, $password){
        if (strlen($password) > 72){
            Lib_Utility::fail('The supplied password is too long');
        }

        $username = mysql_real_escape_string($username);

        $model = new Core_Model();
        $model->getDB()->connect();

        $hasher = new Lib_PasswordHash();

        $hash = $hasher->HashPassword($password);
        if (strlen($hash) < 20)
            Lib_Utility::fail('Failed to hash new password');
        unset($hasher);

        //$model->getDB()->prepare("INSERT INTO Product(ProductCode, Name, Website) VALUES ('B000KKI1F6', 'Clearblue Digital Pregnancy Test Kit with Conception Indicator - Twin-Pack', 'amazon')");
        $query = sprintf("INSERT INTO user (username, password) VALUES ('%s', '%s')", $username, $hash);
        $model->getDB()->prepare($query);

        $result = null;
        if (!$model->getDB()->query()){
            if ($model->getDB()->connection->errno == 1062 /*DUPLICATE ENTRY ERROR*/){
                //Lib_Utility::fail('This username is already taken');
                $result =  array('status' => 'FAIL', 'code' => CODE_ERROR_DUPLICATE ,'message'=>'This username is already taken');
            }
            else{
                $result =  array('status' => 'FAIL', 'code' => CODE_ERROR_SERVER , 'message'=>$model->getDB()->connection->error);
            }
        }
        else
            $result =  array('status' => 'OK', 'code' => CODE_SUCCESS ,'message' => 'Create new account successfully');

        $model->getDB()->disconnect();
        return $result;
    }

    public static function login($username, $password, $return_json = true){
        $model = new Core_Model();
        $model->getDB()->connect();
        $username = mysql_real_escape_string($username);

        $query = sprintf("SELECT password FROM user WHERE username='%s'", $username);
        $model->getDB()->prepare($query);

        if (!$model->getDB()->query()){
            return array('status' => 'FAIL', 'code' => CODE_ERROR_SERVER , 'message'=>$model->getDB()->connection->error);
        }

        $qresult = $model->getDB()->fetch();



        $hasher = new Lib_PasswordHash();

        $r = null;
        $checked = $hasher->CheckPassword($password, $qresult->password);
        $token = null;
        if ($checked) {


            /* Write a token to database and return token to user */
            $dateFormat="d-m-Y H:i";
            $timeNdate=gmdate($dateFormat, time());
            $token = $hasher->HashPassword($timeNdate);

            $query = sprintf("INSERT INTO authentication(username, token) VALUES ('%s', '%s')", $username, $token);
            $model->getDB()->prepare($query);

            $r = array ('status' => 'OK', 'code' =>  CODE_SUCCESS ,'message' => 'Authentication succeeded', 'token' => $token);

            $result = null;
            if (!$model->getDB()->query()){
                echo $model->getDB()->connection->error ."<br/>";
                Lib_Utility::fail('Can not insert token into database', $model->getDB()->connection->error);
            }
        } else {
            $r = array('status' => 'FAIL','code' => CODE_ERROR_FAILED ,'message' =>  'Authentication failed');
        }

        unset($hasher);
        $model->getDB()->disconnect();

        // if Don't need to return in json format, only return the token or null
        if (!$return_json){
            if ($checked)
                return true;
            else
                return false;
        }

        return $r;
    }

    public static function usernameExist($username){

        $model = new Core_Model();
        $model->getDB()->connect();

        $query = sprintf("SELECT password FROM user WHERE username='%s'", mysql_real_escape_string($username));
        $model->getDB()->prepare($query);

        if (!$model->getDB()->query()){
            return array('status' => 'FAIL', 'code' => CODE_ERROR_SERVER , 'message'=>$model->getDB()->connection->error);
        }

        $qresult = $model->getDB()->fetch();
        if (isset($qresult)){
            return true;
        }
        return false;
    }

    public static function checkAuthenticatedToken($token){

        $model = new Core_Model();
        $model->getDB()->connect();

        $query = sprintf("SELECT * FROM authentication WHERE token='%s'", mysql_real_escape_string($token));

        $model->getDB()->prepare($query);

        if (!$model->getDB()->query()){
            echo  array('status' => 'FAIL', 'code' => CODE_ERROR_SERVER ,'message'=>$model->getDB()->connection->error);
            return null;
        }

        $qresult = $model->getDB()->fetch();

        if (isset($qresult)){
            return $qresult->username;
        }

        return null;
    }
}