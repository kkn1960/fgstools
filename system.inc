<?php
list($usec, $sec) = explode(" ",microtime());
$time_start = ((float)$usec + (float)$sec);
require("include/classes.php");
require("include/config.php");
require("include/lib.php");
$fgs_sql_connection_time=0;
@session_start();
mqn();
if(isset($_GET['lang']) and ($_GET['lang']=='en' or $_GET['lang']=='ru'))
{
    $_SESSION['language']=$_GET['lang'];
}
elseif(!isset($_SESSION['language']))
{
    $_SESSION['language']='en';
}
include("include/{$_SESSION['language']}.php");
define('CONTROLLER_PATH', "specification/controller/{$_SESSION['language']}/");
define('FORM_PATH', "specification/form/{$_SESSION['language']}/");
define('GRID_PATH', "specification/grid/{$_SESSION['language']}/");
define('SEARCH_PATH', "specification/search/{$_SESSION['language']}/");
define('DATASET_PATH', "specification/dataset/{$_SESSION['language']}/");
define('LIST_PATH', "specification/list/{$_SESSION['language']}/");
define('TABLE_PATH', "specification/table/");
define('MENU_PATH', "specification/menu/{$_SESSION['language']}/");
define('ELEMENT_PATH', "specification/element/{$_SESSION['language']}/");
define('COLUMN_PATH', "specification/column/{$_SESSION['language']}/");

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
