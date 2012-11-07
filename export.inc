<?php
list($usec, $sec) = explode(" ",microtime());
$time_start = ((float)$usec + (float)$sec);
$fgs_sql_connection_time=0;
require("include/lib.php");
require("include/classes.php");
require("include/config.php");
@session_start();
if(isset($_GET['lang']) and ($_GET['lang']=='en' or $_GET['lang']=='ru'))
{
    $_SESSION['language']=$_GET['lang'];
}
elseif(!isset($_SESSION['language']))
{
    $_SESSION['language']='en';
}
include("include/{$_SESSION['language']}.php");
define('SYSTEM_CONTROLLER_PATH', "specification/controller/{$_SESSION['language']}/");
define('SYSTEM_FORM_PATH', "specification/form/{$_SESSION['language']}/");
define('SYSTEM_GRID_PATH', "specification/grid/{$_SESSION['language']}/");
define('SYSTEM_SEARCH_PATH', "specification/search/{$_SESSION['language']}/");
define('SYSTEM_DATASET_PATH', "specification/dataset/{$_SESSION['language']}/");
define('SYSTEM_LIST_PATH', "specification/list/{$_SESSION['language']}/");
define('SYSTEM_TABLE_PATH', "specification/table/");
define('SYSTEM_MENU_PATH', "specification/menu/{$_SESSION['language']}/");
define('SYSTEM_ELEMENT_PATH', "specification/element/{$_SESSION['language']}/");
define('SYSTEM_COLUMN_PATH', "specification/column/{$_SESSION['language']}/");

define('APPLICATION_FORM_PATH', "specification/form/{$_SESSION['language']}/");
define('APPLICATION_GRID_PATH', "specification/grid/{$_SESSION['language']}/");
define('APPLICATION_SEARCH_PATH', "specification/search/{$_SESSION['language']}/");
define('APPLICATION_CONTROLLER_PATH', "specification/controller/{$_SESSION['language']}/");
define('APPLICATION_DATASET_PATH', "specification/dataset/{$_SESSION['language']}/");
define('APPLICATION_MENU_PATH', "specification/menu/{$_SESSION['language']}/");
define('APPLICATION_LIST_PATH', "specification/list/{$_SESSION['language']}/");
define('APPLICATION_ELEMENT_PATH', "specification/element/{$_SESSION['language']}/");
define('APPLICATION_COLUMN_PATH', "specification/column/{$_SESSION['language']}/");
define('MENU_PATH', "specification/menu/{$_SESSION['language']}/");

$menu_id="configurator";
$timer = Timer::getInstance($time_start);
$db=db();
$registry=Registry::getInstance();
$requestHandler=RequestHandler::getInstance();
$eventHandler=EventHandler::getInstance();
$listLoader=ListLoader::getInstance();
$accessHandler=AccessHandler::getInstance();

$timer->mark('files_included');
restoreDebug();
$js=js();
debug::start();
