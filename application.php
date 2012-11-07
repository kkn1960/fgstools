<?php
require('application.inc');
// set request window
$window=$registry->setWindow();
// set controller in request window
$controller=$registry->setController();
if($controller===0)
{
    $menu=new svm($menu_id);
    $menuStr=$menu->render();
    require "template/start_application.php";
    die();
}

$menu_id=$registry->getUserRole();
if($menu_id==null)
{
    GoToPage('index.php');
}
$menu=new svm($menu_id);
$menuStr=$menu->render();
require CONTROLLER_PATH.$controller.".php";
$pc=new $class($controller,$config,$template);

$timer->mark('components_created');
$pc->run($menuStr);

