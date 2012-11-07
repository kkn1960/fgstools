<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
abstract class InputElement
{
    public $unit;
    public $form;
    public $sid;
    public $id;
    public $value;
    public $type;
    public $err;
    public $valid;
    function __construct($unit,$form,$specs)
    {
        $this->unit=$unit;
        $this->form=$form;
        foreach($specs as $k=>$v)
        {
            $this->$k=$v;
        }
        if(!isset($this->id) and isset($this->field))
        {
            $this->id= $unit.'_'.$form.'_'.$this->field;
        }
        $this->err=array();
    }
    function validate($formValue=null)
    {
        if(!isset($this->validators) ) return ;
        if(sizeof($this->err)>0) return ;

        foreach($this->validators as $validator)
        {
            if(isset($validator['class']))
            {
                $result=Validator::test($validator,$formValue);
            }
            else
            {
                $result=ConditionTester::test($validator['statement'],$formValue);
            }
            if(!$result)
            {
                $this->err[]=array('id'=>'is_required','text'=>$validator['error']);
                if($validator['break_onfailure'])
                {
                    break;
                }
            }
        }
    }
    function registerValue()
    {
        global $registry;
        if(isset($this->register))
        {
            $registry->setGlobal($this->register,$this->value);
        }
    }
    function isEmpty()
    {
        return ($this->value==='' or null===$this->value);
    }
    function ApplyRequestValue($method,$mode=null)
    {
        if(isset($this->hidden) or isset($this->disabled) or $this->component=='InputSystem') return;
        $n=$this->name;
        if($method=='post')
        {
            $a=&$_POST;
        }
        elseif($method=='get')
        {
            $a=&$_GET;
        }
        else
        {
            die($method.' are not correct');
            return;
        }
        if(isset($a[$n]))
        {
            if(is_string($a[$n]))
            {

                if(isset($this->trim))
                {
                    if($this->trim=='trim')
                    {
                        $this->value=trim($a[$n]);
                    }
                    elseif($this->trim=='ltrim')
                    {
                        $this->value=ltrim($a[$n]);
                    }
                    elseif($this->trim=='rtrim')
                    {
                        $this->value=rtrim($a[$n]);
                    }
                    else
                    {
                        $this->value=$a[$n];
                    }
                    
                }
                else
                {
                     $this->value=trim($a[$n]);
                }
            }
            else
            {
                foreach($a[$n] as &$v)
                {
                    $v=trim($v);
                }
                $this->value=$a[$n];
            }
        }
        else
        {
            $this->value='';
        }
        if($this->value==='')
        {
            if(isset($this->required) and $this->required==1)
            {
                $this->err[]=array('id'=>'is_required','text'=>'is_required');
            }
        }
        $this->registerValue();
    }
    function filter($formValue=null)
    {
        if($this->isEmpty() or !isset($this->filters) ) return ;
        foreach($this->filters as $filter)
        {
            if(isset($filter['condition']))
            {
                if(isset($filter['condition']['class']))
                {
                    $result=Validator::test($filter['condition'],$formValue);

                }
                else
                {
                    $result=ConditionTester::test($filter['condition']['statement'],$formValue);
                }
                if(!$result)
                {
                    continue;
                }
            }
            $this->value=Converter::get($this->value,$filter,$formValue);
        }
        $this->registerValue();
    }
    function processEvent($event,$args=null)
    {
        global $registry;
        foreach($args['key'][0] as $key=>$value)
        {
            $this->value=$value;
        }
        $this->registerValue();
    }
}

