<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class PredicateRange extends Predicate
{
    function getPredicate()
    {
        global $db;
        $o=array();
        $a=array('field'=>$this->field,'type'=>$this->type);
        if(!$this->argumentMin->isEmpty())
        {
            $a['operator']='mq';
            if($db->IsTime($this->type))
            {
                $a['argument']=$db->code($this->argumentMin->value,$this->argumentMin->type);
            }
            else
            {
                $a['argument']=$this->argumentMin->value;
            }
            $v=PredicateBuilder::getPredicate($a);
            if($v!='')
            {
                $o[]=$v;
            }
        }
        if(!$this->argumentMax->isEmpty())
        {
            $a['operator']='lq';
            if($db->IsTime($this->type))
            {
                $a['argument']=$db->code($this->argumentMax->value,$this->argumentMax->type);
            }
            else
            {
                $a['argument']=$this->argumentMax->value;
            }
            $v=PredicateBuilder::getPredicate($a);
            if($v!='')
            {
                $o[]=$v;
            }
        }
        if(sizeof($o)>0)
        {
            return '('.implode(' and ',$o).')';
        }
        else
        {
            return '';
        }
    }
    function dropPredicate()
    {
        global $db;
        $this->argumentMin->value=$db->decode('',$this->argumentMin->type);
        $this->argumentMax->value=$db->decode('',$this->argumentMax->type);
    }
    function validInput()
    {
        global $db;
        foreach($this->coa as $e)
        {
            if(sizeof($this->{$e}->err)>0)
            {
                return false;
            }
        }
        if(!$this->argumentMin->isEmpty() and !$this->argumentMax->isEmpty())
        {
            if(is_array($this->argumentMin->value))
            {
                $min=$db->code($this->argumentMin->value,$this->argumentMin->type);
            }
            else
            {
                $min=$this->argumentMin->value;
            }
            if(is_array($this->argumentMax->value))
            {
                $max=$db->code($this->argumentMax->value,$this->argumentMin->type);
            }
            else
            {
                $max=$this->argumentMax->value;
            }
            if($max<$min)
            {
                $this->argumentMin->err[]=array("id"=>128,"text"=>"wrong_value");
                $this->argumentMax->err[]=array("id"=>128,"text"=>"wrong_value");
                $this->err[]=array("id"=>128,"text"=>"limits_are_wrong");
                return false;
            }
        }
        return true;
    }
}
