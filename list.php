<?php
/*
request script for chained selects
*/
header('Content-type: text/html; charset=utf-8');
include('application.inc');
mqn();
$FGSDebug=true;
if(!isset($_GET['rowid']))
{
    die();
}
$rowid= $_GET['rowid'];
$file=ELEMENT_PATH.$rowid.".php";
if(!file_exists($file))
{
    die();
}
include $file;
//check acces
if(isset($e[$rowid]['acl']) and !$accessHandler->testAccess($e[$rowid]['acl']))
{
    die();
}

foreach($_GET as $k=>$v)
{
    $registry->setGlobal($k,$v);
}
$class=getComponentClass($e[$rowid]['component']);
$obj=new $class('ajax','form',$e[$rowid]);
$buf= FormKit::render($obj);
print $buf;
