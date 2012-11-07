<!DOCTYPE html>
<html>
<head>
<title>FGS Configurator</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" rel="stylesheet" href="css/fgs.css" />
<link type="text/css" rel="stylesheet" href="css/ddm.css" />
<link type="text/css" href="js/jquery/themes/blitzer/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/jquery/jquery.field.js"></script>
<script type="text/javascript" src="js/fgs.js"></script>
</head>
<body>
<center>
<div class="all-page">
<div class="all-content">
<div id="topsection">
<h1>FGS Tools</h1>
</div>
<?php

$o=array();
$o[]='<div class="additionalmenu">';


if($_SESSION['language']=='ru')
{
    $o[]="<a href=\"login.php?fgsinit=1\" style=\"float:right;\">Login</a><a href=\"{$_SERVER['PHP_SELF']}?lang=en\" style=\"float:right;\"><span class=\"icon_englang\"></span>English</a>   <span class=\"selected\" style=\"float:right;\"><span class=\"icon_ruslang\"></span>Russian </span>   ";
}
else
{
    $o[]="<a href=\"login.php?fgsinit=1\" style=\"float:right;\">Login</a><span class=\"selected\" style=\"float:right;\"><span class=\"icon_englang\"></span>English </span> <a href=\"{$_SERVER['PHP_SELF']}?lang=ru\" style=\"float:right;\"><span class=\"icon_ruslang\"></span>Russian</a>   ";
}
$o[]='</div><br>';
echo implode('',$o);

echo "<h3>";

echo Msg('access_denied');
echo "</h3>";
?>
<br><br>
<div class="copyright">
Copyright &copy; 2011-2012 Konstantin Kim<br />
All rights reserved
</div>
</div>
</div>
</center>
</body>
</html>

