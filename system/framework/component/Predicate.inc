<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Predicate
{
    public $unit;
    public $search;
    public $sid;
    public $coa; //connector-operator-argument


    public $aSave; // array of elements to save session vars
    public $aPost; // array of elements to get by POST

    public $connector;
    public $argument;
    public $operator;

    function __construct($unit,$parent,$a)
    {
        $this->unit=$unit;
        $this->search=$parent;
        $this->alias=array();
        foreach($a['properties'] as $k=>$v)
        {
            $this->$k=$v;
        }
        foreach($this->coa as $e)
        {
            $class=getComponentClass($a[$e]['component']);
            
            $this->{$e}=new $class($unit,$parent,$a[$e]) ;
        }
    }
    function init()
    {
        foreach($this->coa as $e)
        {
            if(isset($this->{$e}->default_value))
            {
                $this->{$e}->value=Evaluator::get($this->{$e}->default_value,$this->{$e}) ;
            }
            elseif($this->{$e}->type=='set')
            {
                $this->{$e}->value=array();
            }
            else
            {
                $this->{$e}->value='';
            }
        }
        $this->ApplyGetRequestValue();
    }
    function saveState()
    {
        global $registry;
        foreach($this->aSave as $e)
        {
            $_SESSION[FGS_SESSION_KEY][$registry->window][$this->unit][$e][$this->rowid]=$this->{$e}->value;
        }
    }
    function ApplyGetRequestValue()
    {
        global $eventHandler;
        if(!$this->get or !isset($_GET['fgsu']) or $_GET['fgsu']!=$this->unit or !isset($_GET['fgst']) or $_GET['fgst']!='search')
        {
            return;
        }
        $fireEvent=false;
        foreach($this->coa as $e)
        {
            if(($e=='operator' or $e=='connector') and  $this->$e->fixed)
            {
                continue;
            }
            if(isset($_GET[$this->$e->name]))
            {
                $this->$e->ApplyRequestValue('get');
                $this->$e->validate();
                if(sizeof($this->$e->err)==0)
                {
                    $fireEvent=false;
                }
            }
        }
        if($fireEvent)
        {
            $eventHandler->fire(array('event'=>'search','unit'=>$this->unit,'trigger'=>'search'));
        }
    }
    
    function restoreState()
    {
        global $eventHandler,$registry;;
        foreach($this->aSave as $e)
        {
            $this->{$e}->value=$_SESSION[FGS_SESSION_KEY][$registry->window][$this->unit][$e][$this->rowid];
        }
        $this->ApplyGetRequestValue();
        
    }
    function ApplyRequestValue($method)
    {
        foreach($this->aPost as $e)
        {
            if(($e=='operator' or $e=='connector') and  $this->$e->fixed)
            {
                continue;
            }
            $this->{$e}->ApplyRequestValue($method);
        }
    }
    function validate($formValue)
    {
        foreach($this->aPost as $e)
        {
            if(($e=='operator' and $this->operator->fixed) or ($e=='connector'   and $this->operator->fixed) )
            {
                continue;
            }
            $this->{$e}->validate($formValue);
        }
    }
    function dropPredicate()
    {
        global $db;
        foreach($this->coa as $e)
        {
            if($e=='argument')
            {
                $this->argument->value=$db->decode('',$this->argument->type);;
            }
            elseif($e=='operator' and ($this->operator->value=='null' or $this->operator->value=='not_null' or $this->operator->value=='empty' or $this->operator->value=='not_empty'))
            {
                $this->operator->value='';
            }
        }
    }
    function getPredicate()
    {
        global $db;
        $a=array('field'=>$this->field,'type'=>$this->type,'operator'=>$this->operator->value);
        if(isset($this->sqlfunction))
        {
            $a['sqlfunction']=$this->sqlfunction;
        }
        if(isset($this->argument))
        {
            if($this->argument->isEmpty()) return '';
            if($db->IsTime($this->argument->type))
            {
                $a['argument']=$db->code($this->argument->value,$this->argument->type);
            }
            else
            {
                $a['argument']=$this->argument->value;
            }
            return PredicateBuilder::getPredicate($a);
        }
        else
        {
            return PredicateBuilder::getPredicate($a);
        }

    }
    function validInput()
    {
        foreach($this->coa as $e)
        {
            if(sizeof($this->{$e}->err)>0)
            {
                debug::write($this->{$e}->err,'input search errors');
                return false;
            }
        }
        return true;
    }
}
