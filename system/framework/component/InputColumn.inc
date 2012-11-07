<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class InputColumn  extends Column
{
    public $err;
    public $value;
    function __construct($unit,$grid,$specs)
    {
        parent::__construct($unit,$grid,$specs);
        $this->err=array();
    }
    function validate($formValue=null)
    {
        if(!isset($this->condition) ) return ;
        if(sizeof($this->err)>0) return ;

        foreach($this->condition as $condition)
        {
            if(isset($condition['class']))
            {
                $result=Validator::test($condition,$formValue);
            }
            else
            {
                $result=ConditionTester::test($condition['statement'],$formValue);
            }
            if(!$result)
            {
                $this->err[]=array('id'=>'is_required','text'=>$condition['error']);
                if($condition['break_onfailure'])
                {
                     break;
                }
            }
        }
    }
    function isEmpty()
    {
        return ($this->value==='' or null===$this->value);
    }
    function ApplyRequestValue($method)
    {
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

                $this->value=trim($a[$n]);
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
            if(isset($this->required) and $this->required)
            {
                $this->err[]=array('id'=>'is_required','text'=>'is_required');
            }
        }
    }
}

