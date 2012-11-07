<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Configurator extends UnitSet
{
    function subscribe()
    {
        global $eventHandler,$requestHandler;
        foreach($this->units as $unit)
        {
            $eventHandler->subscribe(array('obj'=>$this,'event'=>$unit,'unit'=>'master','trigger'=>'grid'));
            if($this->{$unit}->type=='detail')
            {
                if(isset($this->{$unit}->form))
                {
                    $eventHandler->subscribe(array('obj'=>$this->{$unit}->form,'event'=>'detail','trigger'=>'controller','unit'=>'master'));
                }
                if(isset($this->{$unit}->grid))
                {
                    $eventHandler->subscribe(array('obj'=>$this->{$unit}->grid,'event'=>'detail','trigger'=>'controller','unit'=>'master'));
                }
            }
        }
        $m=$this->mode;
        if($m=='master')
        {
            $this->master->subscribe();
            if($this->master->form->mode=='insert' or $this->master->form->mode=='copy')
            {
                // after inserting a new form, grid or search you can at once switch to element, column mode or add mode
                foreach($this->units as $unit)
                {
                    if($this->{$unit}->type=='detail' or $this->{$unit}->type=='auxiliary')
                    {
                        if($this->{$unit}->type=='detail')
                        {
                            $eventHandler->subscribe(array('obj'=>$this->{$unit}->form,'event'=>'detail','trigger'=>'controller','unit'=>'master'));
                            $eventHandler->subscribe(array('obj'=>$this->{$unit}->grid,'event'=>'detail','trigger'=>'controller','unit'=>'master'));
                        }
                        $eventHandler->subscribe(array('obj'=>$this,'event'=>$unit,'unit'=>'master','trigger'=>'form'));
                    }
                }
            }
        }
        else
        {
            $this->master->grid->subscribe();
            $this->{$m}->subscribe();
            $requestHandler->subscribe(array('obj'=>$this,'action'=>'master','unit'=>'master','trigger'=>'controller','method'=>'get'));
            if($this->$m->type=='attribute' or $this->$m->type=='predicate' )
            {
                $eventHandler->subscribe(array('obj'=>$this,'event'=>'done','unit'=>$m,'trigger'=>'form'));
                $requestHandler->subscribe(array('obj'=>$this,'action'=>'cancel','unit'=>$m,'trigger'=>'form','method'=>$this->$m->form->method));
                $sm=$this->previous_mode;
                $this->$sm->subscribe();
                $this->$sm->grid->subscribe();
                $grid=$this->$sm->grid->sid;
                foreach($this->$sm->grid->ra as $action=>$obj)
                {
                    $requestHandler->subscribe(array('obj'=>$this,'action'=>$action,'unit'=>$sm,'trigger'=>'grid','method'=>'get','vars'=>'key'));
                }
                foreach($this->$sm->grid->rsa as $action=>$obj)
                {
                    $requestHandler->subscribe(array('obj'=>$this,'action'=>$action,'unit'=>$sm,'trigger'=>'grid','method'=>'post','vars'=>$this->$sm->grid->selector->field));
                }
                $eventHandler->subscribe(array('obj'=>$this,'event'=>'attribute','unit'=>$sm,'trigger'=>'grid'));
                if(array_key_exists('predicate',$this->$sm->grid->ra))
                {
                    $eventHandler->subscribe(array('obj'=>$this,'event'=>'predicate','unit'=>$sm,'trigger'=>'grid'));
                }
            }
            elseif($this->$m->type=='detail')
            {
                $eventHandler->subscribe(array('obj'=>$this,'event'=>'attribute','unit'=>$m,'trigger'=>'grid'));
                if(array_key_exists('predicate',$this->$m->grid->ra))
                {
                    $eventHandler->subscribe(array('obj'=>$this,'event'=>'predicate','unit'=>$m,'trigger'=>'grid'));
                }
            }
            elseif($m=='add')
            {
                $eventHandler->subscribe(array('obj'=>$this->master->grid,'event'=>'init_detail','unit'=>$m,'trigger'=>'grid'));
                $eventHandler->subscribe(array('obj'=>$this,'event'=>'init_detail','unit'=>'master','trigger'=>'grid'));
            }
        }
    }

    function processEvent($event,$args)
    {
        global $eventHandler;
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
            elseif($this->$e->type=='attribute')
            {
                if($this->mode!=$e)
                {
                    $this->previous_mode=$this->mode;
                    $m=$this->previous_mode;
                    $this->mode=$e;
                }
                else
                {
                    $m=$this->previous_mode;
                }
                $fn=$args['field'];
                $sid=$args['adk'][0][$fn];
                $this->$e->component=$sid;
                $this->$e->form->replaceConfig($sid);
                $result= $this->$e->form->row($args['key'][0]);
                $this->$e->form->initState($this->$e->components['form']);
                $this->$e->form->display=true;
                $this->$e->form->irow=0;
                $this->$e->form->apk=$args['key'];
            }
            elseif($this->$e->type=='predicate')
            {
                if($this->mode!=$e)
                {
                    $this->previous_mode=$this->mode;
                    $m=$this->previous_mode;
                    $this->mode=$e;
                }
                else
                {
                    $m=$this->previous_mode;
                }
                $fn=$args['field'];
                $sid=$args['adk'][0][$fn];
                if($sid=='') return;
                if($sid=='range')
                {
                    $component="predicateRangeAttribute";
                }
                elseif($sid=='set' )
                {
                    $component="predicateSetAttribute";
                }
                elseif($sid=='null' )
                {
                    $component="predicateNullAttribute";
                }
                elseif($sid=='pattern' )
                {
                    $component="predicatePatternAttribute";
                }
                else
                {
                    $component="predicateComparisonAttribute";
                }
                
                $this->$e->component=$component;
                $this->$e->form->replaceConfig($component);
                $result= $this->$e->form->row($args['key'][0]);
                $this->$e->form->initState($this->$e->components['form']);
                $this->$e->form->display=true;
                $this->$e->form->irow=0;
                $this->$e->form->apk=$args['key'];
            }
            elseif($e=='add')
            {
                $details=$this->master->grid->getDetails($args);
                if(!isset($this->previous_mode) or $this->previous_mode=='')
                {
                    $this->previous_mode=$this->mode;
                }
                $fn=$this->master->grid->save[0];
                $this->master->grid->apk=$args['key'];
                if($details!='')
                {
                    $this->add->grid->foreign_key=" field_table='{$args['adk'][0][$fn]}' and field_name not in ($details)";
                }
                else
                {
                    $this->add->grid->foreign_key=" field_table='{$args['adk'][0][$fn]}'";;
                }
                $this->mode=$e;
            }
        }
        elseif($e=='init_detail')
        {
            $this->mode=$this->previous_mode;
            $this->{$this->mode}->grid->display=true;
            $this->previous_mode='';
        }
        else
        {
            $this->mode=$this->previous_mode;
            $this->{$this->mode}->form->initState($this->{$this->mode}->components['form']);
            $this->previous_mode='';
        }
    }
    function loadData()
    {
        if($this->mode=='master')
        {
            $this->master->loadData();
        }
        else
        {
            $this->master->grid->row();
            if($this->{$this->mode}->type=='detail')
            {
                $this->{$this->mode}->loadData();
            }
            elseif($this->{$this->mode}->type=='auxiliary')
            {
                $this->{$this->mode}->loadData();
            }
            else
            {
                $this->{$this->previous_mode}->loadData();
            }
        }
    }
}
