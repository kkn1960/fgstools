<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class InputDate extends InputElement
{
    function isEmpty()
    {
        if(null===$this->value or $this->value==='' or $this->value["day"]==='' or $this->value["month"]==='' or $this->value["year"]==='')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function ApplyRequestValue($method)
    {
        parent::ApplyRequestValue($method);
        if($this->value=='')
        {
            /*$this->value=array();
            $this->value["day"]='';
            $this->value["month"]='';
            $this->value["year"]='';
            */
            return;
        }
        if(!$this->decode())
        {
            $this->err[]=array("id"=>$this->value,"text"=>"wrong_value");
        }
    }
    function decode()
    {
        global $df,$delimiter;
        $lang=$_SESSION["language"] ;
        $ad=explode($delimiter[$lang]["dmy"],$this->value);
        if(!is_array($ad) or sizeof($ad)!=3)
        {
           return false;
        }
        foreach($ad as $k=>&$v)
        {
            $v=trim($v);
            if(!is_numeric($v))
            {
                return false;
            }
        }
        if(!checkdate($ad[$df[$lang]["month"]],$ad[$df[$lang]["day"]],$ad[$df[$lang]["year"]]))
        {
            return false;
        }
        $this->value=array();
        $this->value["day"]=$ad[$df[$lang]["day"]];
        $this->value["month"]=$ad[$df[$lang]["month"]];
        $this->value["year"]=$ad[$df[$lang]["year"]];
        return true;
    }
    function code()
    {
        global $df,$delimiter;
        if(!is_array($this->value) or $this->value['day']=='' or $this->value['month']=='' or $this->value['year']=='')
        {
            return '';
        }
        $out=array();
        foreach($df[$_SESSION["language"]]  as $k=>$v)
        {
            if($k=="day" or $k=="month")
            {
                 $out[$v]=str_pad($this->value[$k],2,STR_PAD_LEFT);
            }
            else
            {
                $out[$v]=$this->value[$k];
            }
            
        }
        ksort($out);
        return implode($delimiter[$_SESSION["language"]]["dmy"],$out);
    }
    function value()
    {
        return $this->code();
    }
}
