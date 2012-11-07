<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class InputAutocomplete extends InputElement
{
    public $lookup_value;
    public $lookup_fields;
    public $lookup_table;
    public $lookup_pk;
    function __construct($unit,$form,$specs)
    {
        parent::__construct($unit,$form,$specs);
        $this->session[]='lookup_value';
    }
    function ApplyRequestValue($method)
    {
        global $db,$listLoader;
        parent::ApplyRequestValue($method);
        $this->lookup_value=$this->value;
        $this->registerValue();
        if($this->value=='')
        {
            return;
        }
        if(isset($this->list['options']))
        {
            $v=null;
            foreach($this->list['options'] as $value=>$descripton)
            {
                if($this->value==$descripton)
                {
                    $v=$value;
                    break;
                }
            }
        }
        else
        {
            $v=$db->code($this->value,'text');
            $q="select {$this->list['primary_key']} from {$this->list['from']} where {$this->list['display_field']}='$v'";
            $v=$db->value($q);
        }
        if($v!=null)
        {
            $this->value=$v;
        }
        else
        {
            $this->value='';
            $this->err[]=array("id"=>123,"text"=>"not_found");
        }
    }
    function setLookupValue()
    {
        global $db;
        $this->lookup_value='';
        if($this->value==null or $this->value=='')
        {
            return;
        }
        if(isset($this->list['options']))
        {
            $v=null;
            foreach($this->list['options'] as $value=>$descripton)
            {
                if($this->value==$value)
                {
                    $v=$descripton;
                    break;
                }
            }
        }
        else
        {
            $q="select {$this->list['display_field']} from {$this->list['from']} where {$this->list['primary_key']}='$this->value'";
            $v=$db->value($q);
        }
        if($v!=null)
        {
            $this->lookup_value=$v;
        }
    }
    function registerValue()
    {
        global $registry;
        if(isset($this->register))
        {
            $registry->setGlobal($this->register,$this->lookup_value);
        }
    }
    function lookupFilter($search)
    {
        global $db;
        $search_value=$db->code($search,'text');
        $o=array();
        $a=explode(',',$this->search_field);
        foreach($a as $field)
        {
            $fld=str_replace('xxx',$_SESSION['language'],$field);
            $o[]="$fld like '%$search_value%'";
        }
        return '('.implode(' or ',$o).')';
    }
    function processEvent($event,$args=null)
    {
        global $registry;
        parent::processEvent($event,$args);
        $this->setLookupValue();
    }
}
