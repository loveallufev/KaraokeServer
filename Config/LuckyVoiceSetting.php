<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 12/23/13
 * Time: 3:55 AM
 */

require_once SERVER_ROOT . '/Lib/' . 'XmlHelper.php';

class LuckyVoiceSetting {

    public static $config;

    public static function loadConfig(){
        LuckyVoiceSetting::$config  = simplexml_load_file(SERVER_ROOT . '/Config/' . 'LuckyVoice.xml');
    }


    public static function updateConfig(){
        $configfile = SERVER_ROOT . '/Config/' . 'LuckyVoice.xml';
        if(!LuckyVoiceSetting::$config->asXml($configfile))
        {
            // Logging class initialization
            $log = new Lib_Logging();

            // set path and name of log file (optional)
            $log->lfile(SERVER_ROOT. DS . 'logs/logs.log');

            // write message to the log file
            $log->lwrite("Error when update config for LuckyVoice (" . substr(sprintf('%o', fileperms($configfile)), -4) .")");
            // close log file
            $log->lclose();
        }
    }

}

LuckyVoiceSetting::loadConfig();