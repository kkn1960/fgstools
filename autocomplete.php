<?php
/*
request script for autocomplete input fields
*/
include('application.inc');
mqn();
$FGSDebug=true;
if(!isset($_REQUEST['rowid']))
{
    //die();
}
$rowid= $_REQUEST['rowid'];

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

$class=getComponentClass($e[$rowid]['component']);
$obj=new $class('ajax','form',$e[$rowid]);
$ll=ListLoader::getInstance();
foreach($_REQUEST as $k=>$v)
{
    $s=$v;
    if($k=='term')
    {
        $registry->setGlobal($obj->register,$s);
        $obj->list['lookup_filter']=$obj->lookupFilter($s);
    }
    else
    {
        $registry->setGlobal($k,$s);
    }
}
$options=$ll->get($obj->list);
if(sizeof($options)>$obj->max_options)
{
    echo '';
}
else
{
    $a=array();
    foreach($options as $id=>$descr)
    {
       $a[]=array("label" =>$descr);
    }
    $response =json_encode($a);
    echo $response;
}

