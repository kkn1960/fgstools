<!DOCTYPE html>
<html>
<head>
<?php
if($_SESSION['language']=='ru')
{
    if($view_doc=='framework')
    {
        print '<title>Руководство фреймворка FGS Factory</title>';
    }
    elseif($view_doc=='configurator')
    {
        print '<title>Руководство конфигуратора FGS Configurator</title>';
    }
    else
    {
        print '<title>Руководство по FGS Tools</title>';
    }
}
else
{
    if($view_doc=='framework')
    {
        print '<title>FGS Factory Framework Guide</title>';
    }
    elseif($view_doc=='configurator')
    {
        print '<title>FGS Configurator’s Guide</title>';
    }
    else
    {
        print '<title>FGS Tools guide</title>';
    }
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="document-state" content="Static" />
<?php
if($_SESSION['language']=='ru')
{
    print '<meta http-equiv="content-language" content="ru">';
    if($view_doc=='framework')
    {
        print '<meta name="description" content="Руководство фреймворка FGS Factory">';
        print '<meta name="keywords" content="fgs,фреймворк, руководство">';
    }
    elseif($view_doc=='configurator')
    {
        print '<meta name="keywords" content="fgs,конфигуратора, руководство">';
    }
    else
    {
        print '<meta name="description" content="Руководство по FGS Tools">';
        print '<meta name="keywords" content="fgs, инструмент, руководство">';
    }
}
else
{
    print '<meta http-equiv="content-language" content="en">';

    if($view_doc=='framework')
    {
        print '<meta name="description" content="FGS Factory Framework Guide">';
        print '<meta name="keywords" content="fgs, framework, guide">';
    }
    elseif($view_doc=='configurator')
    {
        print '<meta name="description" content="FGS Configurator’s Guide">';
        print '<meta name="keywords" content="fgs, configurator, guide">';
    }
    else
    {
        print '<meta name="description" content="FGS Tools guide">';
        print '<meta name="keywords" content="fgs, tool, guide">';
    }
}
?>
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
<h1>FGS Tools = FGS Factory Framework + FGS Configurator</h1>
</div>
<?php
echo $menuStr;
$o=array();
$o[]='<div class="additionalmenu">';

if(!$registry->checkLogin())
{
    $loginRef="<a href=\"login.php?fgsinit=1\" style=\"float:right;\">Login</a>";
}
else
{
    $loginRef="<a href=\"index.php?fgslogout=1\" style=\"float:right;\">Logout</a>";
}
if($_SESSION['language']=='ru')
{
    $o[]="<a href=\"{$_SERVER['PHP_SELF']}?lang=en\" style=\"float:right;\"><span class=\"icon_englang\"></span>English</a>   <span class=\"selected\" style=\"float:right;\"><span class=\"icon_ruslang\"></span>Russian </span>$loginRef";
}
else
{
    $o[]="<span class=\"selected\" style=\"float:right;\"><span class=\"icon_englang\"></span>English </span> <a href=\"{$_SERVER['PHP_SELF']}?lang=ru\" style=\"float:right;\"><span class=\"icon_ruslang\"></span>Russian</a>$loginRef";
}
$o[]='</div><br>';
echo implode('',$o);
$o=array();
include("include/{$view_doc}_{$_SESSION['language']}.txt") ;
echo implode('',$o);
?>
</div> </div>
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

