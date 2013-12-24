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
        LuckyVoiceSetting::$config->asXml(SERVER_ROOT . '/Config/' . 'LuckyVoice.xml');
    }

}

LuckyVoiceSetting::loadConfig();