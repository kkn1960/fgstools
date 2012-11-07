<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Unit
{
    public $sid;
    public $config;
    public $initial;
    public $components;
    public $session;
    public $mode;
    public $type;
    public $form;
    public $grid;
    public $search;
    public $dataset;
    function __construct($sid,$config)
    {
        $this->sid=$sid;
        $this->config=$config['controller'];
        $this->type=$config['type'];
        $this->initial=$config['initial'];
        $this->session=$config['session'];
        $this->components=$config['components'];
        $this->createComponents();
    }
    function initState($args=null)
    {
        foreach($this->initial as $k=>$v)
        {
            $this->$k=$v;
        }
        foreach($this->components as $c=>$s)
        {
            if($c!='dataset')
            {
                $this->$c->initState($s);
            }
        }
    }
    function saveState()
    {
        global $registry;
        $registry->saveState($this,'controller',$this->sid);
        foreach($this->components as $c=>$s)
        {
            $this->$c->saveState();
        }
    }
    function restoreState()
    {
        global $registry;
        $registry->restoreState($this,'controller',$this->sid);
        foreach($this->components as $c=>$s)
        {
            $this->$c->restoreState();
        }
    }
    function createComponents()
    {
        foreach($this->components as $c=>$s)
        {
            $this->$c=new $s['class']($this->sid,$s['sid'],$s['hide']);
        }
    }
    function subscribe()
    {
        global $eventHandler,$requestHandler,$listLoader;
        //register request&event listeners
        if($this->config['grid'])
        {
            $this->grid->subscribe();
            if($this->config['form'])
            {
                $eventHandler->subscribe(array('obj'=>$this,'event'=>'failure','unit'=>$this->sid,'trigger'=>'form'));
            }
        }
        if($this->config['form'])
        {
            $this->form->subscribe();
            $requestHandler->subscribe(array('obj'=>$this,'action'=>'cancel','unit'=>$this->sid,'trigger'=>'form','method'=>$this->form->method));
            $eventHandler->subscribe(array('obj'=>$this,'event'=>'done','unit'=>$this->sid,'trigger'=>'form'));
            if(isset($this->form->listDrop) and $this->form->listDrop==1)
            {
                $eventHandler->subscribe(array('obj'=>$listLoader,'event'=>'done','unit'=>$this->sid,'trigger'=>'form'));
            }
            if(in_array('insert',$this->form->modes))
            {
                $requestHandler->subscribe(array('obj'=>$this,'action'=>'insert','unit'=>$this->form->unit,'trigger'=>'form','method'=>'get'));
            }
        }
        if($this->config['search'])
        {
            $this->search->subscribe();
            $requestHandler->subscribe(array('obj'=>$this,'action'=>'cancel','unit'=>$this->sid,'trigger'=>'search','method'=>$this->search->method));
            $eventHandler->subscribe(array('obj'=>$this->grid,'event'=>'search','unit'=>$this->sid,'trigger'=>'search'));
            if(isset($this->search->aGet))
            {
                $eventHandler->subscribe(array('obj'=>$this->grid,'event'=>'search','unit'=>$this->sid,'trigger'=>'search'));
            }
        }
    }
    function processRequest($args)
    {
        $action=$args['action'];
        switch($action)
        {
            case 'cancel':
                if($this->config['grid'])
                {
                    $this->grid->display=true;
                }
                break;
            case 'insert':
                $this->form->display=true;
                break;
            default:
                print 'Request parameters:<br>';
                print_r($args);
                print '<br>';
                die('Illegal request: for '.$this->sid);
                break;
        }
    }
    function processEvent($event,$args=null)
    {
        $type=$event['event'];
        switch($type)
        {
            case 'failure':
                if($this->config['grid'])
                {
                    $this->grid->display=true;
                }
                $this->err[]=$args;
                break;
            case 'done':
                $this->form->initState($this->components['form']);
                if($this->config['grid'])
                {
                    $this->grid->display=true;
                }
                break;
            default:
                break;
        }
    }
    function loadData()
    {
        if($this->config['grid'])
        {
            $this->grid->page();
            if($this->grid->nrows==0 and $this->grid->total>0)
            {
                $this->grid->offset=0;
                $this->grid->page();
            }
        }
    }
    function renderJavaScript()
    {
        $js=js();
        if($this->config['form'])
        {
            if(method_exists ($this->form ,'renderJavaScript' ))
            {
                $this->form->renderJavaScript();
            }
            else
            {
                $js->jsForm($this->form);
            }
        }
        if($this->config['search'])
        {
            if(method_exists ($this->search ,'renderJavaScript' ))
            {
                $this->search->renderJavaScript();
            }
            else
            {
                $js->jsSearch($this->search);
            }
        }
        if($this->config['grid'])
        {
            if(method_exists ($this->grid ,'renderJavaScript' ))
            {
                $this->grid->renderJavaScript();
            }
            else
            {
                $js->jsGrid($this->grid);
            }
        }
    }
}
