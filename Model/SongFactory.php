<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 12/23/13
 * Time: 5:08 AM
 */

class Model_SongFactory {
    public static function getAssistant($prefix){
        if ($prefix == Model_SongConstants::$ZING_PREFIX)
            return Model_ZingAssistant::getInstance();

        if ($prefix == Model_SongConstants::$LUCKYVOICE_PREFIX){
            return Model_LuckyVoiceAssistant::getInstance();
        }
    }
} 