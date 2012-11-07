<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Crud  extends Controller
{
    public $title;
    public $unit;
    public $mode;
    public $acl;
    public $views;
    public $type='controller';
    function __construct($sid,$config,$template)
    {
        global $registry;
        $this->sid=$sid;
        $this->template=$template;
        $this->title=$config['title'];
        $this->acl=$config['acl'];
        $this->initial=$config['initial'];
        $this->session=$config['session'];
        $this->unit=new $config['crud']['class']('crud',$config['crud']);

        if($registry->newController())
        {
            $this->initState();
        }
        else
        {
            $this->restoreState();
        }
    }
    function subscribe()
    {
        global $eventHandler,$requestHandler;
        //register request&event listeners
        $this->unit->subscribe();
    }
    function loadData()
    {
        $this->unit->loadData();
    }
    function processRequest($args)
    {
        $this->unit->processRequest($args);
    }

    function processEvent($event,$args)
    {
        $this->unit->processEvent($event,$args);
    }
    function initState($args=null)
    {
        foreach($this->initial as $k=>$v)
        {
            $this->$k=$v;
        }
        $this->unit->initState();
    }
    function saveState()
    {
        global $registry;
        unset($_SESSION[$registry->window]);
        $registry->saveState($this,'controller');
        $this->unit->saveState();
        $_SESSION[FGS_SESSION_KEY][$registry->window][FGS_CONTROLLER_KEY]['controller']=$this->sid;
        $_SESSION[FGS_SESSION_KEY][$registry->window][FGS_CONTROLLER_KEY]['end']=true;
    }
    function restoreState()
    {
        global $registry;
        $registry->restoreState($this,'controller');
        $this->unit->restoreState();
    }
    function renderJavaScript()
    {
        $this->unit->renderJavaScript();
        $js=js();
        return $js->render();
    }
    
}
