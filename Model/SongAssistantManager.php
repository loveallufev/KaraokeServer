<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 12/25/13
 * Time: 7:39 PM
 */

class Model_SongAssistantManager {
    private static $wasInit = false;
    private static $assistants;
    private static $default;

    public static function Init(){
        if (Model_SongAssistantManager::$wasInit)
            return;

        if (isset(Core::$config['modules'])){

            if (isset(Core::$config['modules']['assistants']))
                Model_SongAssistantManager::$assistants = Core::$config['modules']['assistants'];
            if (isset(Core::$config['modules']['default']))
                Model_SongAssistantManager::$default = Core::$config['modules']['default'];

            Model_SongAssistantManager::$wasInit = true;
        }
        else
            echo "Need config modules first!";
    }

    public static function getSongAssistantByLanguage($lang){

        if (!Model_SongAssistantManager::$wasInit)
            Model_SongAssistantManager::Init();

        foreach (Model_SongAssistantManager::$assistants as $module){
            if ($module['language'] == $lang && intval($module['active'])){
                $assistant =  new $module['class'];
                if (isset($module['config'])) $assistant->config = $module['config'];
                $assistant->lang = $lang;
                $assistant->prefix = $module['prefix'];
                var_dump($assistant);die;
                return $assistant;
            }
        }

        // return default assistant
        if (isset(Model_SongAssistantManager::$default)){
            return Model_SongAssistantManager::getSongAssistantByName(Model_SongAssistantManager::$default);
        }

        return null;
    }

    public static function getSongAssistantByPrefix($prefix){
        if (!Model_SongAssistantManager::$wasInit)
            Model_SongAssistantManager::Init();

        foreach (Model_SongAssistantManager::$assistants as $module){
            if ($module['prefix'] == $prefix){
                $assistant =  new $module['class'];
                if (isset($module['config'])) $assistant->config = $module['config'];
                $assistant->prefix = $prefix;
                $assistant->lang = $module['language'];
                return $assistant;
            }
        }
        return null;
    }

    public static function getSongAssistantByName($name){
        if (!Model_SongAssistantManager::$wasInit)
            Model_SongAssistantManager::Init();

        $assistant = null;
        if (isset(Model_SongAssistantManager::$assistants[$name]['class']))
        {
            $assistant = new  Model_SongAssistantManager::$assistants[$name]['class'];

            if (isset(Model_SongAssistantManager::$assistants[$name]['language']))
                $assistant->lang = Model_SongAssistantManager::$assistants[$name]['language'];

            if (isset(Model_SongAssistantManager::$assistants[$name]['config']))
                $assistant->config = Model_SongAssistantManager::$assistants[$name]['config'];

            if (isset(Model_SongAssistantManager::$assistants[$name]['prefix']))
                $assistant->prefix = Model_SongAssistantManager::$assistants[$name]['prefix'];
        }

        return $assistant;
    }
} 