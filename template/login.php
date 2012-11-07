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
<h1>FGS Tools = FGS Factory Framework + FGS Configurator</h1>
</div>
<?php
echo $menuStr;
$o=array();
$o[]='<div class="additionalmenu">';

$debugRef=toggleDebug();
if($_SESSION['language']=='ru')
{
    $o[]="<a href=\"{$_SERVER['PHP_SELF']}?fgsc={$this->sid}&fgsw={$registry->window}&lang=en\" style=\"float:right;\"><span class=\"icon_englang\"></span>English</a>   <span class=\"selected\" style=\"float:right;\"><span class=\"icon_ruslang\"></span>Russian </span>   $debugRef";
}
else
{
    $o[]="<span class=\"selected\" style=\"float:right;\"><span class=\"icon_englang\"></span>English </span> <a href=\"{$_SERVER['PHP_SELF']}?fgsc={$this->sid}&fgsw={$registry->window}&lang=ru\" style=\"float:right;\"><span class=\"icon_ruslang\"></span>Russian</a>   $debugRef";
}
$o[]='</div><br>';
echo implode('',$o);
if($this->unit->config['form'])
{
    $renderer=$this->unit->components['form']['renderer'];
    $obj=new $renderer($this->unit->form);
    print $obj->render();
}
if($this->unit->config['grid'])
{
    $renderer=$this->unit->components['grid']['renderer'];
    $obj=new $renderer($this->unit->grid);
    print $obj->render();
}
if($this->unit->config['search'])
{
    $renderer=$this->unit->components['search']['renderer'];
    $obj=new $renderer($this->unit->search);
    print $obj->render();
}
print $this->renderJavaScript();
$timer->mark('rendering_completed');
if($FGSDebug)
{
    echo '<div class="edit">';
    echo debug::render();
    echo '</div>';
}
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

