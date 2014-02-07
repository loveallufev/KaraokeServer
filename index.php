<?php
/**
 * File : Index.php
 * User : loveallufev
 * Date:  5/16/13
 * Group: Hieu-Trung
*/

/**
 * WEB_ROOT_FOLDER is the name of the parent folder you created these
 * documents in.
 */

// only allow to access Index.php
define('APP', TRUE);
define('DEBUG', FALSE);
define('DS', DIRECTORY_SEPARATOR);
define('SERVER_ROOT', realpath(dirname(__FILE__)));
define('MY_THEME', 'violet');

$HTTP_HOST = $_SERVER['HTTP_HOST'];
// absolute path
if (!isset( $HTTP_HOST)){
    $HTTP_HOST = '';
}

$SCRIPT_NAME = $_SERVER['SCRIPT_NAME'];
// For testing
if (is_null($SCRIPT_NAME))
    $SCRIPT_NAME = SERVER_ROOT . '/index.php';


$REQUEST_URI = $_SERVER['REQUEST_URI'];
if (!isset($REQUEST_URI) || is_null($REQUEST_URI))
    //$_SERVER['REQUEST_URI'] = SERVER_ROOT. DS . 'index.php/product/track?site=amazon&id=B00004Y3Q8&name=Conan%20the%20Destroyer%20[DVD]%20[1984]';
    //$_SERVER['REQUEST_URI'] = SERVER_ROOT. DS . 'index.php/product/view?active=amazon&id=B00004Y3Q8';

    $REQUEST_URI= SERVER_ROOT. DS . '';
// End for testing

$base_url = 'http://' . $HTTP_HOST . str_replace('/index.php', '', $SCRIPT_NAME);

define('BASE_URL' , $base_url);

// Include configuration file
require_once SERVER_ROOT . DS . 'config.php';

/**
 * Fetch the router
 */
require_once SERVER_ROOT . DS . 'Core' . DS . 'Core.php';
Core::init($config);
