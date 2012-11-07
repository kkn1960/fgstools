<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class UnitSet extends Controller
{
    public $sid;
    public $title;
    public $mode;
    public $session;
    public $master;
    public $units;
    public $acl;
    public $previous_mode;
    public $type='controller';
    function __construct($sid,$config,$template)
    {
        global $registry;
        $this->sid=$sid;
        $this->template=$template;
        $this->title=$config['title'];
        $this->acl=$config['acl'];
        $this->units=$config['units'];
        $this->initial=$config['initial'];
        $this->session=$config['session'];
        $this->master=new $config['master']['class']('master',$config['master']);
        foreach($config['units'] as $unit)
        {
            $this->$unit=new $config[$unit]['class']($unit,$config[$unit]);
        }
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
        foreach($this->units as $unit)
        {
            $this->$unit->initState();
        }
    }
    function saveState()
    {
        global $registry;
        $registry->saveState($this,'controller');
        $this->master->saveState();
        foreach($this->units as $unit)
        {
            $this->$unit->saveState();
        }
        $_SESSION[FGS_SESSION_KEY][$registry->window][FGS_CONTROLLER_KEY]['controller']=$this->sid;
        $_SESSION[FGS_SESSION_KEY][$registry->window][FGS_CONTROLLER_KEY]['end']=true;
    }
    function restoreState()
    {
        global $registry;
        $registry->restoreState($this,'controller');
        $this->master->restoreState();
        foreach($this->units as $unit)
        {
            $this->$unit->restoreState();
        }
    }
    function subscribe()
    {
        global $eventHandler,$requestHandler;
        //register request&event listeners
        $mode=$this->mode;
        foreach($this->units as $unit)
        {
            if(array_key_exists($unit,$this->master->grid->ra))
            {
                $eventHandler->subscribe(array('obj'=>$this,'event'=>$unit,'unit'=>'master','trigger'=>'grid'));
            }
            if($this->{$unit}->type=='detail')
            {
                if($this->{$unit}->config['form'])
                {
                    $eventHandler->subscribe(array('obj'=>$this->{$unit}->form,'event'=>'detail','trigger'=>'controller','unit'=>'master'));
                }
                if($this->{$unit}->config['grid'])
                {
                    $eventHandler->subscribe(array('obj'=>$this->{$unit}->grid,'event'=>'detail','trigger'=>'controller','unit'=>'master'));
                }
            }
        }
        if($mode=='master')
        {
            $this->master->subscribe();
            if($this->master->form->mode=='insert' or $this->master->form->mode=='copy')
            {
                // after inserting a new form, grid or search you can at once switch to detail or auxiliary mode
                foreach($this->units as $unit)
                {
                    if($this->{$unit}->type=='detail' or $this->{$unit}->type=='auxiliary')
                    {
                        if($this->{$unit}->type=='detail')
                        {
                            if($this->{$unit}->config['form'])
                            {
                                $eventHandler->subscribe(array('obj'=>$this->{$unit}->form,'event'=>'detail','trigger'=>'controller','unit'=>'master'));
                            }
                            if($this->{$unit}->config['grid'])
                            {
                                $eventHandler->subscribe(array('obj'=>$this->{$unit}->grid,'event'=>'detail','trigger'=>'controller','unit'=>'master'));
                            }
                        }
                        $eventHandler->subscribe(array('obj'=>$this,'event'=>$unit,'unit'=>'master','trigger'=>'form'));
                    }
                }
            }
        }
        else
        {
            $this->master->grid->subscribe();
            $this->{$mode}->subscribe();
            $requestHandler->subscribe(array('obj'=>$this,'action'=>'master','unit'=>'master','trigger'=>'controller','method'=>'get'));
            if($this->{$mode}->config['form'] and sizeof($this->{$mode}->form->eventTrigger)>0)
            {
                foreach($this->{$mode}->form->eventTrigger as $sid)
                {
                    if(in_array($this->{$mode}->form->mode,$this->{$mode}->form->b[$sid]->modes))
                    {
                        $eventHandler->subscribe(array('obj'=>$this,'event'=>$this->{$mode}->form->b[$sid]->event,'unit'=>$mode,'trigger'=>'form'));
                    }
                }
            }
            if($this->{$mode}->type=='auxiliary')
            {
                $this->{$this->previous_mode}->subscribe();
                //subscribe to to auxiliary unit components events triggered by its buttons
                if($this->{$mode}->config['grid'])
                {
                    if(sizeof($this->{$mode}->grid->rsa)>0)
                    {
                        foreach($this->{$mode}->grid->rsa as $action=>$obj)
                        {
                            $eventHandler->subscribe(array('obj'=>$this,'action'=>$action,'unit'=>$mode,'trigger'=>'grid'));
                        }
                    }
                    ///////////
                    if(sizeof($this->{$mode}->grid->b)==0)
                    {
                        foreach($this->{$mode}->grid->b as $field=>$obj)
                        {
                            if(isset($obj->event))
                            {
                                $eventHandler->subscribe(array('obj'=>$this,'action'=>$obj->event,'unit'=>$mode,'trigger'=>'grid'));
                            }
                        }
                    }
                }
                //subscribe previous unit for set events triggered by auxiliary unit's input form
                if($this->{$mode}->config['form'] and $this->{$this->previous_mode}->config['form'] and isset($this->{$this->previous_mode}->form->setByEvent))
                {
                    foreach($this->{$this->previous_mode}->form->setByEvent as $a)
                    {
                        if($a['table']==$this->{$mode}->form->table and $this->{$this->previous_mode}->form->e[$a['sid']]->event==$a['event'])
                        {
                            $eventHandler->subscribe(array('obj'=>$this->{$this->previous_mode}->form->e[$a['sid']],'event'=>$a['event'],'unit'=>$mode,'trigger'=>'form'));
                        }
                    }
                }
                if($this->{$mode}->config['form'])
                {
                    $requestHandler->subscribe(array('obj'=>$this,'action'=>'cancel','unit'=>$mode,'trigger'=>'form','method'=>'post'));
                }

            }

            if($this->{$mode}->config['grid'] and sizeof($this->{$mode}->grid->b)==0)
            {
                foreach($this->{$mode}->grid->b as $field=>$obj)
                {
                    if(isset($obj->event) and  $obj->event=='master')
                    {
                        $eventHandler->subscribe(array('obj'=>$this,'action'=>$obj->event,'unit'=>$mode,'trigger'=>'grid'));
                    }
                }
            }
        }
    }
    function processRequest($args)
    {
        $action=$args['action'];
        $trigger=$args['trigger'];
        $unit=$args['unit'];
        if($args['action']=='master')
        {
            if($this->{$this->mode}->config['form'])
            {
                $this->{$this->mode}->form->initState($this->{$this->mode}->components['form']);
            }
            $this->mode='master';
            $this->master->grid->display=true;
            $this->previous_mode='';
            $this->master->form->initState($this->master->components['form']);
            foreach($this->units as $unit)
            {
                if($unit!='master' and $this->$unit->config['form'])
                {
                    $this->{$unit}->form->initState($this->$unit->components['form']);
                }
            }
        }
        elseif($args['action']=='cancel')
        {
            $m=$this->mode;
            if($trigger=='form')
            {
                if($unit!='master')
                {
                    $this->mode=$this->previous_mode;
                    $this->previous_mode='';
                }
            }
        }
        else
        {
             $this->mode=$this->previous_mode;
             $this->previous_mode='';
        }
    }
    function processEvent($event,$args)
    {
        global $eventHandler,$registry;
        $e=$event['event'];
        if(in_array($e,$this->units))
        {
            if($this->$e->type=='detail')
            {
                $this->mode=$e;
                $this->previous_mode='';
                $this->{$e}->grid->display=true;
                $this->master->grid->apk=$args['key'];
                $args['unit']=$e;
                $eventHandler->fire(array('event'=>'detail','trigger'=>'controller','unit'=>'master'),$args);
            }
            elseif($this->$e->type=='auxiliary')
            {
                $unit=$e;
                $this->previous_mode=$this->mode;
                $this->mode=$unit;
                $this->{$unit}->initState();
            }
        }
        else
        {
            //auxiliary unit components' events lead to the previous mode of the controller
            if($this->{$this->mode}->type=='auxiliary')
            {
                $this->mode=$this->previous_mode;
                $this->previous_mode='';
            }
        }
    }
    function loadData()
    {
        $mode=$this->mode;
        if($this->mode=='master')
        {
            $this->master->loadData();
        }
        else
        {
            $this->master->grid->row();
            $this->{$mode}->loadData();
        }
    }
    function renderJavaScript()
    {
        $this->{$this->mode}->renderJavaScript();
        $js=js();
        return $js->render();
    }
}
