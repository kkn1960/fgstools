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
<h1>FGS Configurator > <?php echo Msg($this->title);?></h1>
</div>
<?php
echo $menuStr;
$o=array();
$o[]='<div class="additionalmenu">';
$mode=$this->mode;
if($this->$mode->config['form'])
{
    $onclick=$registry->fgsToggle($mode,$this->$mode->form->sid,'form');
    if($this->$mode->form->display)
    {
        $icon_class='icon_invisible';
    }
    else
    {
        $icon_class='icon_visible';
    }
    $icon_id= $this->$mode->form->sid.'_form_icon';
    $o[]="<a href=\"#\" $onclick><span class=\"$icon_class\" id=\"$icon_id\"></span>Form</a>";
}

if($this->$mode->config['grid'])
{
    $onclick=$registry->fgsToggle($mode,$this->$mode->grid->sid,'grid');
    if($this->$mode->grid->display)
    {
        $icon_class='icon_invisible';
    }
    else
    {
        $icon_class='icon_visible';
    }
    $icon_id= $this->$mode->grid->sid.'_grid_icon';
    $o[]="<a href=\"#\" $onclick><span class=\"$icon_class\" id=\"$icon_id\"></span>Grid</a>";
}
if($this->$mode->config['search'])
{
    $onclick=$registry->fgsToggle($mode,$this->$mode->search->sid,'search');
    if($this->$mode->search->display)
    {
        $icon_class='icon_invisible';
    }
    else
    {
        $icon_class='icon_visible';
    }
    $icon_id= $this->$mode->search->sid.'_search_icon';
    $o[]="<a href=\"#\" $onclick><span class=\"$icon_class\" id=\"$icon_id\"></span>Search</a>";
}
if($this->mode!='master')
{
    $url=$registry->fgsRef('master','controller').'&master=1';
    $o[]="<a href=\"$url\"><span class=\"icon_master\"></span>Master</a>";
    
}
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

if($this->mode!='master')
{
    if(isset($this->master->grid->ra['update']))
    {
        unset($this->master->grid->ra['update']);
    }
    if(isset($this->master->grid->ra['copy']))
    {
        unset($this->master->grid->ra['copy']);
    }
    if(isset($this->master->grid->ra['remove']))
    {
        unset($this->master->grid->ra['remove']);
    }
    if(isset($this->master->grid->selector) )
    {
        $this->master->grid->selector=null;
    }
}
if($this->mode=='master')
{
    if($this->master->config['form'])
    {
        $renderer=$this->master->components['form']['renderer'];
        $obj=new $renderer($this->master->form);
        print $obj->render();
    }
    $renderer=$this->master->components['grid']['renderer'];
    $obj=new $renderer($this->master->grid);
    print $obj->render();
    if($this->master->config['search'])
    {
        $renderer=$this->master->components['search']['renderer'];
        $obj=new $renderer($this->master->search);
        print $obj->render();
    }
}
else
{
    $renderer=$this->master->components['grid']['renderer'];
    $obj=new $renderer($this->master->grid);
    print $obj->render();
    if($this->{$this->mode}->type=='auxiliary')
    {

        if($this->{$this->mode}->config['form'])
        {
            $renderer=$this->{$this->mode}->components['form']['renderer'];
            $obj=new $renderer($this->{$this->mode}->form);
            print $obj->render();
        }
        $renderer=$this->{$this->mode}->components['grid']['renderer'];
        $obj=new $renderer($this->{$this->mode}->grid);
        print $obj->render();
        if($this->{$this->mode}->config['search'])
        {
            $renderer=$this->{$this->mode}->components['search']['renderer'];
            $obj=new $renderer($this->{$this->mode}->search);
            print $obj->render();
        }
    }
    elseif($this->{$this->mode}->type=='detail')
    {
        if($this->{$this->mode}->config['form'])
        {
            $renderer=$this->{$this->mode}->components['form']['renderer'];
            $obj=new $renderer($this->{$this->mode}->form);
            print $obj->render();
        }
        $renderer=$this->{$this->mode}->components['grid']['renderer'];
        $obj=new $renderer($this->{$this->mode}->grid);
        print $obj->render();
        if($this->{$this->mode}->config['search'])
        {
            $renderer=$this->{$this->mode}->components['search']['renderer'];
            $obj=new $renderer($this->{$this->mode}->search);
            print $obj->render();
        }
    }
    else
    {
        $renderer=$this->{$this->previous_mode}->components['grid']['renderer'];
        $obj=new $renderer($this->{$this->previous_mode}->grid);
        print $obj->render();
        if($this->{$this->mode}->config['form'])
        {
            $renderer=$this->{$this->mode}->components['form']['renderer'];
            $obj=new $renderer($this->{$this->mode}->form);
            print $obj->render();
        }
        if($this->{$this->mode}->config['grid'])
        {
            $renderer=$this->{$this->mode}->components['grid']['renderer'];
            $obj=new $renderer($this->{$this->mode}->grid);
            print $obj->render();
        }
        if($this->{$this->mode}->config['search'])
        {

            $renderer=$this->{$this->mode}->components['search']['renderer'];
            $obj=new $renderer($this->{$this->mode}->search);
            print $obj->render();
        }
    }
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
