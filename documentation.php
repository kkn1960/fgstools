<?php
require('system.inc');

$timer->mark('components_created');
$menu_id='home';
$menu=new ddm($menu_id);
$menuStr=$menu->render();
$template='documentation.php';
if(isset($_REQUEST["fgslogout"]))
{
    $registry->setUser(null);
}
if(isset($_REQUEST["fgsdoc"]))
{
    if($_REQUEST["fgsdoc"]=='framework')
    {
        $view_doc='framework';
    }
    elseif($_REQUEST["fgsdoc"]=='configurator')
    {
        $view_doc='configurator';
    }
    else
    {
        $view_doc='tools';
    }
}
elseif(isset($_SESSION['fgsdoc']))
{
    $view_doc=$_SESSION['fgsdoc'];
}
else
{
    $view_doc='tools';
}
$_SESSION['fgsdoc']=$view_doc;
require "template/{$template}";

