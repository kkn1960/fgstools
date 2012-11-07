<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class InputTime extends InputElement
{
    function isEmpty()
    {
        if(null===$this->value or $this->value===''  or $this->value["hour"]==='' or $this->value["minute"]==='' or $this->value["second"]==='')
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
        $name=$this->label();
        if($this->value==='') return;

        if(!$this->decode())
        {
            $this->err[]=array("id"=>TIME_WRONG,"text"=>"wrong_value");
        }
    }
    function decode()
    {
        global $tf,$delimiter;
        $lang=$_SESSION["language"] ;
        $at=explode($delimiter[$lang]["hms"],$this->value);
        if(!is_array($at) or sizeof($at)!=3)
        {
           return false;
        }
        foreach($at as &$v)
        {
            $v=trim($v);
            if(!is_numeric($v))
            {
                return false;
            }
        }
        if(!($at[$tf[$lang]["hour"]]>=0 and $at[$tf[$lang]["hour"]]<=23))
        {
            return false;
        }
        if(!($at[$tf[$lang]["minute"]]>=0 and $at[$tf[$lang]["minute"]]<=59))
        {
            return false;
        }
        if(!($at[$tf[$lang]["second"]]>=0 and $at[$tf[$lang]["second"]]<=59))
        {
            return false;
        }
        $this->value=array();
        $this->value["hour"]=$at[$tf[$lang]["hour"]];
        $this->value["minute"]=$at[$tf[$lang]["minute"]];
        $this->value["second"]=$at[$tf[$lang]["second"]];
        return true;
    }
    function code()
    {
        global $tf,$delimiter;
        $out=array();
        foreach($tf[$_SESSION["language"]]  as $k=>$v)
        {
            $out[$v]=$this->value[$k];
        }
        ksort($out);
        return implode($delimiter[$_SESSION["language"]]["hms"],$out);
    }

    function value($row=null)
    {
        return $this->code();
    }
}
