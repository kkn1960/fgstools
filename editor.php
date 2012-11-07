<?php
require('system.inc');
// set request window
$window=$registry->setWindow();
// set controller in request window
$controller=$registry->setController();
if($controller===0)
{
    $menu=new ddm($menu_id);
    $menuStr=$menu->render();
    require "template/start.php";
    die();
}
$menu=new ddm($menu_id);
$menuStr=$menu->render();
require CONTROLLER_PATH.$controller.".php";
$pc=new $class($controller,$config,$template);
$timer->mark('components_created');
$pc->run($menuStr);
