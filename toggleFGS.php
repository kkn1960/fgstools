<?php
require('system.inc');
header('Content-type: text/html; charset=utf-8');
if(isset($_POST['fgsw']) and isset($_POST['fgsu']) and isset($_POST['fgsc']) and isset($_POST['display']) and isset($_POST['fgst']) and isset($_POST['display']) and ($_POST['display']==0 or $_POST['display']==1) and (isset($_SESSION[FGS_SESSION_KEY][$_POST['fgsw']][FGS_CONTROLLER_KEY]['controller']) and $_SESSION[FGS_SESSION_KEY][$_POST['fgsw']][FGS_CONTROLLER_KEY]['controller']==$_POST['fgsc']))
{
    if(isset($_SESSION[FGS_SESSION_KEY][$_POST['fgsw']][$_POST['fgsu']][$_POST['fgst']]['display']))
    {
        $_SESSION[FGS_SESSION_KEY][$_POST['fgsw']][$_POST['fgsu']][$_POST['fgst']]['display']=$_POST['display'];
        echo 'xxxxx=1;';
    }
}
?>
