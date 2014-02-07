<?php
/*
// Load system configuration
$xml = simplexml_load_string('
<?xml version="1.0" standalone="yes"?>
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
</configuration>
');
//var_dump($xml);

$config = XmlToArray($xml);
*/

// Section connection
$config = array();

$connection['host'] = 'localhost';
$connection['username'] = 'root';
$connection['password'] = 'root';
$connection['database'] = 'karaoke';
$connection['port'] = '8889';
$config['connection'] = $connection;

$luckyvoiceAcc['email'] = 'ductrungkhtn@gmail.com';
$luckyvoiceAcc['password'] = 'ductrunglk89';
$config['luckyvoice'] = $luckyvoiceAcc;

// Section modules
$modules['default'] = 'luckyvoice';

$luckyvoiceAssit['config'] = $luckyvoiceAcc;
$luckyvoiceAssit['prefix'] = 'L';
$luckyvoiceAssit['language'] = 'en';
$luckyvoiceAssit['class'] = 'Model_LuckyVoiceAssistant';
$luckyvoiceAssit['active'] = 1;
$modules['assistants']['luckyvoice'] = $luckyvoiceAssit;

$zingAssit['prefix'] = 'Z';
$zingAssit['language'] = 'vi';
$zingAssit['class'] = 'Model_ZingAssistant';
$zingAssit['active'] = 1;
$modules['assistants']['zing'] = $zingAssit;

$config['modules'] = $modules;

