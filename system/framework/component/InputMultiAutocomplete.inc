<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class InputMultiAutocomplete extends InputElement
{
    public $lookup_value;
    public $lookup_fields;
    public $lookup_table;
    public $lookup_pk;

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
        $aSearch= array_unique ( explode($this->token,$this->lookup_value)) ;
        $this->value=array();
        foreach($aSearch as $search)
        {
            if($search==='')
            {
                continue;
            }
            if(isset($this->list['options']))
            {
                $v=null;
                foreach($this->list['options'] as $value=>$descripton)
                {
                    if($search==$descripton)
                    {
                        $v=$value;
                        break;
                    }
                }
            }
            else
            {
                $v=$db->code($search,'text');
                $q="select {$this->list['primary_key']} from {$this->list['from']} where {$this->list['display_field']}='$v'";
                $v=$db->value($q);
            }
            if($v!=null)
            {
                $this->value[]=$v;
            }
            else
            {
                $this->err[]=array("id"=>123,"text"=>"not_found@@:@@".$search);
            }
        }
    }
    function setLookupValue()
    {
        global $db;
        $this->lookup_value='';
        if($this->value===null or $this->value===''  or sizeof($this->value)==0)
        {
            return;
        }
        $buf=array();
        if(isset($this->list['options']))
        {
            if(is_array($this->value))
            {
                $aVal=$this->value;
            }
            else
            {
                $aVal=explode(',', str_replace("'",'',$this->value));
            }
            foreach($this->list['options'] as $value=>$descripton)
            {
                if(in_array($value,$aVal))
                {
                    $buf[]=$descripton;
                }
            }
            $n=sizeof($buf);
        }
        else
        {
            if(is_array($this->value))
            {
                $cond=implode(',',$this->value);
            }
            else
            {
                $cond=$this->value;
            }
            $q="select {$this->list['display_field']} from {$this->list['from']} where {$this->list['primary_key']} in ($cond)";
            $n=$db->set($q,$buf,$this->list['display_field']);
        }
        if($n>0)
        {
            $this->lookup_value=implode($this->token,$buf).$this->token;
        }
    }
    function isEmpty()
    {
        return ($this->value===null or $this->value==='' or sizeof($this->value)==0);
    }
    function lookupFilter($search)
    {
        global $db;
        $aSearch=explode($this->token,$search);
        $n=sizeof($aSearch);
        $search_value=$db->code($aSearch[$n-1],'text');
        $not=array();
        for($i=0;$i<$n-1;$i++)
        {
            $v=$db->code($aSearch[$i],'text');
            $not[]="{$this->list['display_field']}!='$v'";
        }
        if(sizeof($not)>0)
        {
            $add= '('.implode(' and ',$not).') and ';
        }
        else
        {
            $add='';
        }
        $o=array();
        $a=explode(',',$this->search_field);
        foreach($a as $field)
        {
            $fld=str_replace('xxx',$_SESSION['language'],$field);
            $o[]="$fld like '%$search_value%'";
        }
        return $add.'('.implode(' or ',$o).')';
    }
    function processEvent($event,$args=null)
    {
        global $registry;
        foreach($args['key'][0] as $key=>$value)
        {
            $this->value[]=$value;
        }
        $this->registerValue();
        $this->setLookupValue();
    }
}
