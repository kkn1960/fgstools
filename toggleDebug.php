<?php
require('system.inc');
if('programmer'==$registry->getUserRole() and isset($_POST['debug']) and ($_POST['debug']==0 or $_POST['debug']==1))
{
    $_SESSION[FGS_SESSION_KEY]['session_debug']=$_POST['debug'];
    echo "1";
}

