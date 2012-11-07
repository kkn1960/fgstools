<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class ColumnMultipleSelect extends ColumnElement
{
    public $params;
    public $options;
    function ApplyRequestValue($method)
    {
        global $listLoader;
        parent::ApplyRequestValue($method);
        if(!isset($this->list['options']))
        {
            $options=$listLoader->get($this->list);
        }
        else
        {
            $options=$this->list['options'];
        }
        if(is_array($this->value) )
        {
            foreach($this->value as $k=>$v)
            {
                if ($v==='') continue;
                if (!array_key_exists ($v, $options ))
                {
                    $this->err[]=array("id"=>OPTION_ILLEGAL,"text"=>"wrong_value");
                    break;
                }
            }
        }
        else
        {
            $this->value=array();
        }
    }
    function isEmpty()
    {
        return ($this->value===null or $this->value==='' or sizeof($this->value)==0);
    }
}
