<?php
require('system.inc');

$timer->mark('components_created');
$menu_id='home';
$menu=new ddm($menu_id);
$menuStr=$menu->render();
$template='info.php';
if(isset($_REQUEST["fgslogout"]))
{
    $registry->setUser(null);
}
require "template/{$template}";

