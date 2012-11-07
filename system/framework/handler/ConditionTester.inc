<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class ConditionTester
{
    static function test($statements,$params=null)
    {
        global $FGSDebug,$registry;
        $n=sizeof($statements);
        if($n==0)
        {
            debug::write(0,'statements not found',null,true);
            return true;
        }
        $aCondition=array();
        $aSet=array();
        $group='';
        for($i=0;$i<$n;$i++)
        {
            $value=ConditionTester::testStatement($statements[$i],$params);
            $connector=Evaluator::get($statements[$i]['connector'],$params);
            if($group!=$statements[$i]['group'])
            {
                //group changed
                if($group!='' and sizeof($aSet)>0)
                {
                    //previous statement was last member of a group
                    // we have to get value of all statements from previous group
                    $aCondition[]= self::getGroupConditionValue($aSet);
                    //prepare for a new group
                    $aSet=array();
                }
                $group=$statements[$i]['group'];
            }
            if($group=='')
            {
                // current statement is not member of a group
                $aCondition[]=array('value'=>$value,'connector'=>$connector);;
            }
            else
            {
                // current statement is a member of a group
                $aSet[]=array('value'=>$value,'connector'=>$connector);;
            }
        }
        if(sizeof($aSet)>0)
        {
            $aCondition[]= self::getGroupConditionValue($aSet);
        }
        $result=self::getGroupConditionValue($aCondition);
        return $result['value'];
    }
    static function getGroupConditionValue($aSet)
    {
        $n=sizeof($aSet);
        if($n==1)
        {
            return $aSet[0];
        }
        else
        {
            $connector=$aSet[0]['connector'];
            $value=$aSet[0]['value'];
            for($i=1;$i<$n;$i++)
            {
                $value=self::getValue($value,$aSet[$i]['value'],$aSet[$i]['connector']);
            }
            return array('value'=>$value,'connector'=>$connector) ;
        }
    }
    static function getValue($operand1,$operand2,$connector)
    {
        if($connector=='and')
        {
            if($operand1==true and $operand2==true)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            if($operand1==false and $operand2==false)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }
    static function testStatement($statement,$params=null)
    {
        global $FGSDebug,$registry;
        // operator
        debug::write($statement,'check Statement');
        debug::write($params,'with params');
        $operator=Evaluator::get($statement['operator'],$params);

        //fisrt operand
        $operand1=Evaluator::get($statement['operand1'],$params);
        debug::write($operand1,'operand1');
        if(isset($statement['function']))
        {
            $func=$statement['function'];
            $operand1=$func($operand1);
        }
        if(isset($statement['operand2']))
        {
            //second operand
            $operand2=Evaluator::get($statement['operand2'],$params);
            debug::write($operand2,'operand2');
        }
        elseif($operator!='null' and $operator!='not_null' and $operator!='empty' and $operator!='not_empty')
        {
            debug::write(Msg('not_defined'),'operand2',null,1);
            return 0;
        }
        if($operator=='like' or $operator=='leftlike' or $operator=='not_like' or $operator=='not_leftlike')
        {
            $pos=strpos($operand1,$operand2);
        }
        elseif($operator=='rightlike' or $operator=='not_rightlike')
        {
            $pos=strrpos($operand1,$operand2);
        }
        switch ($operator)
        {
            case 'equal' :
               $result=($operand1==$operand2);
               break;
            case 'not_equal' :
               $result=($operand1!=$operand2);
               break;
            case 'l' :
               $result=($operand1<$operand2);
               break;
            case 'lq' :
               $result=($operand1<=$operand2);
               break;
            case 'm' :
               $result=($operand1>$operand2);
               break;
            case 'mq' :
               $result=($operand1>=$operand2);
               break;
            case 'null' :
               $result=($operand1===null);
               break;
            case 'not_null' :
               $result=($operand1!==null);
               break;
            case 'empty' :
               $result=($operand1=='');
               break;
            case 'not_empty' :
               $result=($operand1!='');
               break;
            case 'like' :
               $result=($pos!==false);
               break;
            case 'not_like' :
               $result=($pos===false);
               break;
            case 'leftlike' :
               $result=($pos!==false and $pos==0);
               break;
            case 'not_leftlike' :
               $result=($pos===false or $pos>0);
               break;
            case 'rightlike' :
               $result=($pos!==false and substr($operand1,$pos)==$operand2);
               break;
            case 'not_rightlike' :
               $result=($pos===false or substr($operand1,$pos)!=$operand2);
               break;
            case 'regexp' :
               $result=preg_match ($operand2, $operand1);
               break;
            case 'between' :
               $min=Evaluator::get($operand2['min'],$params);
               $max=Evaluator::get($operand2['max'],$params);
               $result=($operand1>=$min&&$operand1<=$max);
               break;
            case 'not_between' :
               $min=Evaluator::get($operand2['min'],$params);
               $max=Evaluator::get($operand2['max'],$params);
               $result=(!($operand1>=$min&&$operand1<=$max));
               break;
            case 'in' :
               $result=(in_array($operand1,$operand2));
               break;

            default :
               $result=false;
               break;
        }
        if($statement['failure']==1)
        {
            $result=!$result;
        }
        debug::write($result,'result with params');
        return  $result;
    }
}
