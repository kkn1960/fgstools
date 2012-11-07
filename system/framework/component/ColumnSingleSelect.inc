<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class ColumnSingleSelect extends InputColumn
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
        if(!$this->isEmpty() and !array_key_exists ($this->value, $options ))
        {
            $this->err[]=array("id"=>101,"text"=>"wrong_value");
        }
    }
}
