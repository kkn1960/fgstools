<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FGSLogin extends Crud
{
    function __construct($sid,$config,$template)
    {
        global $registry;
        parent::__construct($sid,$config,$template);
        if(isset($_GET['return_url']))
        {
            $this->return_url=$_GET['return_url'];
        }
        elseif(!isset($this->return_url))
        {
            $this->return_url='index.php';
        }
        if(isset($_GET['return_controller']))
        {
            $this->return_controller=$_GET['return_controller'];
        }
        if(isset($_GET['return_window']))
        {
            $this->return_window=$_GET['return_window'];
        }
    }
    function loadData()
    {
    }
    function processEvent($event,$args)
    {
        parent::processEvent($event,$args);
        $type=$event['event'];
        if($type=='found')
        {
            $url=$this->return_url;
            $a=array();
            if(isset($this->return_window) and $this->return_window!='')
            {
                $a[]='fgsw='.$this->return_window;
            }
            if(isset($this->return_controller) and $this->return_controller!='')
            {
                $a[]='fgsc='.$this->return_controller;
            }
            if(sizeof($a)>0)
            {
                $url.='?'.implode('&',$a);
            }
            GoToPage($url);
        }
        elseif($type=='not_found')
        {
            $this->unit->form->err[]=array('id'=>123,'text'=>"login_or_password_wrong");
        }
    }
    function subscribe()
    {
        global $eventHandler,$requestHandler;
        //register request&event listeners
        parent::subscribe();
        $eventHandler->subscribe(array('obj'=>$this,'event'=>'found','unit'=>'crud','trigger'=>'form'));
        $eventHandler->subscribe(array('obj'=>$this,'event'=>'not_found','unit'=>'crud','trigger'=>'form'));
    }
}
