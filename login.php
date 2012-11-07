<?php
require('system.inc');
// set request window  to 'login_window'
$window=$registry->setWindow('login_window');

// set controller to 'user_login' in request window
$controller=$registry->setController('user_login');

require CONTROLLER_PATH.$controller.".php";
$pc=new $class($controller,$config,$template);
$timer->mark('components_created');
$menu_id='home';
$menu=new ddm($menu_id);
$menuStr=$menu->render();
$pc->run($menuStr);
