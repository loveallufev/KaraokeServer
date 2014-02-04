<?php
/**
 * Created by PhpStorm.
 * User: loveallufev
 * Date: 2/4/14
 * Time: 10:59 PM
 */

if (!file_exists('logs')){
    mkdir('logs', 0777, true);
    echo "create directory logs <br/>" ;
}

if (!file_exists('songs')){
    mkdir('songs', 0777, true);
    echo "create directory songs <br/>";
}

if (!file_exists('temps')){
    mkdir('temps', 0777, true);
    echo "create directory temp <br/>";
}

if (!file_exists('upload')){
    mkdir('upload', 0777, true);
    echo "create directory upload <br/>";
}

chmod('Config/Configuration.xml', 775);
chmod('Config/LuckyVoice.xml', 775);