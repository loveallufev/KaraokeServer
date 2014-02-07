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

if (!file_exists('Config/LuckyVoice.xml')){
    echo "create Config/LuckyVoice.xml<br/>" ;
    $file = fopen('Config/LuckyVoice.xml', 'w');
    fwrite($file,'<?xml version="1.0" standalone="yes"?>
<configuration>
    <login>
        <sessionid>5zmbjoka55yvuq1ura2pnv2udhmek92s</sessionid>
        <expires>Wed, 04-Feb-2015 00:34:27 GMT</expires>
    </login>
    <api_token>
        <sessionid>5zmbjoka55yvuq1ura2pnv2udhmek92s</sessionid>
        <token>c7910d695fc646e39d9908069bfe2877</token>
        <expires>2014-02-04T06:15:41.464677+00:00</expires>
    </api_token>
</configuration>'
);
    fclose($file);
}

if (!file_exists('Config/Configuration.xml')){
    echo "create Config/Configuration.xml<br/>";
    $file = fopen('Config/Configuration.xml', 'w');
    fwrite($file,'<?xml version="1.0" standalone="yes"?>
<configuration>
    <connection>
        <host>localhost</host>
        <username>root</username>
        <password>root</password>
        <database>karaoke</database>
        <port>8889</port>
    </connection>
    <mod_rewrite>on</mod_rewrite>
    <luckyvoice>
        <email>ductrungkhtn@gmail.com</email>
        <password>ductrunglk89</password>
    </luckyvoice>
    <modules>
        <assistants>
            <luckyvoice>
                <config>
                    <email>ductrungkhtn@gmail.com</email>
                    <password>ductrunglk89</password>
                </config>
                <prefix>L</prefix>
                <language>en</language>
                <class>Model_LuckyVoiceAssistant</class>
                <active>1</active>
            </luckyvoice>
            <zing>
                <language>vi</language>
                <class>Model_ZingAssistant</class>
                <active>1</active>
                <prefix>Z</prefix>
            </zing>
        </assistants>
        <default>luckyvoice</default>
    </modules>
    <cache>
        <lastsongid>-1</lastsongid>
    </cache>
</configuration>');
    fclose($file);
}



$testGD = get_extension_funcs("gd"); // Grab function list
if (!$testGD){ echo "GD not even installed.<br/>"; }
echo"<pre> GD is already install</pre>";

chmod('Config/Configuration.xml', 775);
chmod('Config/LuckyVoice.xml', 775);