<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class MasterDetail extends Controller
{
    public $sid;
    public $title;
    public $mode;
    public $session;
    public $master;
    public $detail;
    public $acl;
    
    function __construct($sid,$config,$template)
    {
        global $registry;
        $this->sid=$sid;
        $this->template=$template;
        $this->title=$config['title'];
        $this->acl=$config['acl'];
        $this->initial=$config['initial'];
        $this->session=$config['session'];
        $this->master=new $config['master']['class']('master',$config['master']);
        $this->detail=new $config['detail']['class']('detail',$config['detail']);
        if($registry->newController())
        {
            $this->initState();
        }
        else
        {
            $this->restoreState();
        }
    }
    function initState()
    {
        foreach($this->initial as $k=>$v)
        {
            $this->$k=$v;
        }
        $this->master->initState();
        $this->detail->initState();
    }
    function restoreState()
    {
        global $registry;
        $registry->restoreState($this,'controller');
        $this->master->restoreState();
        $this->detail->restoreState();
    }
    function saveState()
    {
        global $registry;
        $registry->saveState($this,'controller');
        $this->master->saveState();
        $this->detail->saveState();
        $_SESSION[FGS_SESSION_KEY][$registry->window][FGS_CONTROLLER_KEY]['controller']=$this->sid;
        $_SESSION[FGS_SESSION_KEY][$registry->window][FGS_CONTROLLER_KEY]['end']=true;
    }
    function subscribe()
    {
        global $eventHandler,$requestHandler;
        //register request&event listeners
        if($this->mode=='master')
        {
            $this->master->subscribe();
            if($this->master->config['form'] and ($this->master->form->mode=='insert' or $this->master->form->mode=='copy'))
            {
                // after inserting a new row you can at once switch to detail mode
                if($this->detail->config['grid'])
                {
                    $eventHandler->subscribe(array('obj'=>$this->detail->grid,'event'=>'detail','unit'=>'master','trigger'=>'form'));
                }
                if($this->detail->config['form'])
                {
                    $eventHandler->subscribe(array('obj'=>$this->detail->form,'event'=>'detail','unit'=>'master','trigger'=>'form'));
                }
                $eventHandler->subscribe(array('obj'=>$this,'event'=>'detail','unit'=>'master','trigger'=>'form'));
            }
            if($this->detail->config['grid'])
            {
                $eventHandler->subscribe(array('obj'=>$this->detail->grid,'event'=>'detail','unit'=>'master','trigger'=>'grid'));
            }
            if($this->detail->config['form'])
            {
                $eventHandler->subscribe(array('obj'=>$this->detail->form,'event'=>'detail','unit'=>'master','trigger'=>'grid'));
            }
            $eventHandler->subscribe(array('obj'=>$this,'event'=>'detail','unit'=>'master','trigger'=>'grid'));
            $eventHandler->subscribe(array('obj'=>$this,'event'=>'load_failure','unit'=>'master','trigger'=>'grid'));
        }
        elseif($this->mode=='detail')
        {
            $this->detail->subscribe();
            $requestHandler->subscribe(array('obj'=>$this,'action'=>'master','unit'=>'master','trigger'=>'controller','method'=>'get'));
        }
    }
    function processRequest($args)
    {
        $action=$args['action'];
        if($args['action']=='master')
        {
            if($this->detail->config['form'])
            {
                $this->detail->form->initState($this->detail->components['form']);
            }
            $this->mode='master';
            $this->master->grid->display=true;
            if($this->master->config['form'])
            {
                $this->master->form->initState($this->master->components['form']);
            }
        }
    }
    
    function processEvent($event,$args)
    {
        if($event['event']=='detail')
        {
            $this->mode='detail';
            $this->master->grid->apk=$args['key'];
        }
    }
    function loadData()
    {
        if($this->mode=='detail')
        {
            $this->master->grid->row();
            $this->detail->loadData();
        }
        else
        {
            $this->master->loadData();
        }
    }
    function renderJavaScript()
    {
        if($this->mode=='master')
        {
            $this->master->renderJavaScript();
        }
        else
        {
            $this->detail->renderJavaScript();
        }
        $js=js();
        return $js->render();
    }
}
