<!DOCTYPE html>
<html>
<head>
<title>FGS Configurator</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<link type="text/css" rel="stylesheet" href="css/fgs.css" />
<link type="text/css" rel="stylesheet" href="css/svm.css" />
<link type="text/css" href="js/jquery/themes/blitzer/jquery-ui-1.8.2.custom.css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery/jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery/jquery-ui-1.8.2.custom.min.js"></script>
<script type="text/javascript" src="js/fgs.js"></script>
</head>
<body>
<center>
<div class="all-page">
<div class="all-content">
<div id="topsection">
<h1>Система Управления Контентом</h1>
</div>
<?php
$o=array();
$o[]='<div class="additionalmenu">';

$debugRef=toggleDebug();
if($_SESSION['language']=='ru')
{
    $o[]="<a href=\"{$_SERVER['PHP_SELF']}?lang=en\" style=\"float:right;\"><span class=\"icon_englang\"></span>English</a>   <span class=\"selected\" style=\"float:right;\"><span class=\"icon_ruslang\"></span>Russian </span>   $debugRef";
}
else
{
    $o[]="<span class=\"selected\" style=\"float:right;\"><span class=\"icon_englang\"></span>English </span> <a href=\"{$_SERVER['PHP_SELF']}?lang=ru\" style=\"float:right;\"><span class=\"icon_ruslang\"></span>Russian</a>   $debugRef";
}
$o[]='</div><br>';
$o[]='<table cellpadding="0" cellspacing="0">
<tr>
<td width="220" valign="top">';
$o[]=$menuStr;
$o[]='</td>
<td width="100%" valign="top">
<div id="main_block">';
echo implode('',$o);

print '</div></td></tr>
<tr>
    <td colspan="2" height="20">
    </td>
</tr>
<tr>
<td colspan="2">';
$timer->mark('rendering_completed');
if($FGSDebug)
{
    echo '<br>';
    echo '<div class="edit">';
    echo debug::render();
    echo '</div>';
}
?>
<div class="copyright">
Copyright &copy; 2011-2012 Konstantin Kim<br />
All rights reserved
</div>
</td>
</tr>
</table>
</div>
</div>
</body>
</html>

