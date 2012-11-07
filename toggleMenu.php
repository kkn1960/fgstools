<?php
require('system.inc');
header('Content-type: text/html; charset=utf-8');
if(isset($_POST['role']) and $_POST['role']==$registry->getUserRole() and isset($_POST['display']) and isset($_POST['window']))
{
    if(isset($_SESSION[$_POST['window']]['menu_display']))
    {
        $_SESSION[FGS_SESSION_KEY][$_POST['window'][FGS_CONTROLLER_KEY]['menu_display']=$_POST['display'];
        echo 'xxxxx=1;';
    }
}

