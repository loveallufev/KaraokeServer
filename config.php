<?php
/**
 * File : Config.php
 * User : loveallufev
 * Date:  5/19/13
 * Group: Hieu-Trung
*/
if (!defined('SERVER_ROOT')){
    define('DS', DIRECTORY_SEPARATOR);
    define('SERVER_ROOT', realpath(dirname(__FILE__)));
}

define('CODE_ERROR_SERVER', 400);
define('CODE_SUCCESS', 200);
define('CODE_ERROR_INVALID', 401); // invalid parameter, like username
define('CODE_ERROR_DUPLICATE', 402);    // duplicated parameter, such as username
define('CODE_ERROR_MISSING', 403);  // missing parameter
define('CODE_ERROR_FAILED', 404);   // operation failed, such as authentication failed

require_once SERVER_ROOT . '/Lib/' . 'XmlHelper.php';
/*
 * @param int $pattern
 *  the pattern passed to glob()
 * @param int $flags
 *  the flags passed to glob()
 * @param string $path
 *  the path to scan
 * @return mixed
 *  an array of files in the given path matching the pattern.
 */

function rglob($pattern='*', $flags = 0, $path='')
{
    $paths=glob($path.'*', GLOB_MARK|GLOB_ONLYDIR|GLOB_NOSORT);
    $files=glob($path.$pattern, $flags);
    foreach ($paths as $path) { $files=array_merge($files,rglob($pattern, $flags, $path)); }
    return $files;
}

// Load system configuration
//$xml = simplexml_load_file(SERVER_ROOT . '/Config/' . 'Configuration.xml');
//var_dump($xml);

//$config = XmlToArray($xml);
require('Config/Configuration.php');

//var_dump($config['modules']['merchant']); die;
