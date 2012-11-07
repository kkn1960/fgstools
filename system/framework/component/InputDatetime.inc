<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class InputDatetime extends InputElement
{
    function ApplyRequestValue($method)
    {
        parent::ApplyRequestValue($method);
        $name=$this->label();
        if($this->value==='') return;
        if(!$this->decode())
        {
            $this->err[]=array('id'=>DATETIME_WRONG,'text'=>'wrong_value');
        }
    }
    function isEmpty()
    {
        if(null===$this->value or $this->value==='' or $this->value['day']==='' or $this->value['month']==='' or $this->value['year']==='' or $this->value['hour']==='' or $this->value['minute']==='' or $this->value['second']==='')
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function decode()
    {
        global $df,$tf,$delimiter;
        $lang=$_SESSION['language'] ;
        $pos = strpos($this->value, $delimiter[$lang]['date_time']);
        if ($pos === false)
        {
            return false;
        }
        $ad=explode($delimiter[$lang]['dmy'],substr($this->value,0,$pos));

        if(!is_array($ad) or sizeof($ad)!=3)
        {
           return false;
        }
        foreach($ad as &$v)
        {
            $v=trim($v);
            if(!is_numeric($v))
            {
                return false;
            }
        }
        if(!checkdate($ad[$df[$lang]['month']],$ad[$df[$lang]['day']],$ad[$df[$lang]['year']]))
        {
            return false;
        }
        $at=explode($delimiter[$lang]['hms'],substr($this->value,$pos+1));
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
        if(!($at[$tf[$lang]['hour']]>=0 and $at[$tf[$lang]['hour']]<=23))
        {
            return false;
        }
        if(!($at[$tf[$lang]['minute']]>=0 and $at[$tf[$lang]['minute']]<=59))
        {
            return false;
        }
        if(!($at[$tf[$lang]['second']]>=0 and $at[$tf[$lang]['second']]<=59))
        {
            return false;
        }
        $this->value=array();
        $this->value['day']=$ad[$df[$lang]['day']];
        $this->value['month']=$ad[$df[$lang]['month']];
        $this->value['year']=$ad[$df[$lang]['year']];
        $this->value['hour']=$at[$tf[$lang]['hour']];
        $this->value['minute']=$at[$tf[$lang]['minute']];
        $this->value['second']=$at[$tf[$lang]['second']];
        return true;
    }
    function code()
    {
        global $df,$tf,$delimiter;
        $lang=$_SESSION['language'] ;
        $outd=array();
        foreach($df[$lang]  as $k=>$v)
        {
            $outd[$v]=$this->value[$k];
        }
        ksort($outd);
        $outt=array();
        foreach($tf[$lang]  as $k=>$v)
        {
            $outt[$v]=$this->value[$k];
        }
        ksort($outt);
        return implode($delimiter[$lang]['dmy'],$outd).$delimiter[$lang]['date_time'].implode($delimiter[$lang]['hms'],$outt);
    }
    function value($row=null)
    {
        return $this->code();
    }
}
