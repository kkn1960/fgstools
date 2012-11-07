<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class PredicateBuilder
{
    static function getPredicate($a)
    {
        global $db;
        $f=$a['field'];
        if(isset($a['sqlfunction']) and $a['sqlfunction']!='')
        {
            $f=$a['sqlfunction'].'('.$f.')';
        }
        //$type=$a['type'];
        $operator=$a['operator'];
        if($operator=='' or $operator==null ) return '';
        $f.=$db->getOperator($operator);
        if($operator=='null' or $operator=='not_null' or $operator=='empty' or $operator=='not_empty')
        {
            return $f;
        }
        if(!array_key_exists('argument',$a))
        {
            return '';
        }
        if(($a['argument']===null or $a['argument']==='') or (is_array($a['argument']) and sizeof($a['argument'])==0))
        {
            if(isset($a['required']) and $a['required']==1)
            {
                return 'empty';
            }
            else
            {
                return '';
            }
        }
        $argument= $a['argument'];
        $out=array();
        if(array_key_exists('custom',$a) and $a['custom']!=null)
        {
            return call_user_func($a['custom'].'::getPredicate',$a);
        }
        elseif($operator=='in' or $operator=='not_in' )
        {
            foreach($argument as $v)
            {
                $out[]="'".$v."'";
            }
            return $f.' ('.implode(',',$out).')';
        }
        elseif(isset($a['type']) and $a['type']=='set')
        {
            if(!is_array($argument))
            {
                 $aArgs=explode(',',str_replace("'",'',$argument));
            }
            else
            {
                 $aArgs=$argument;
            }
            foreach($aArgs as $v)
            {
                $v=$db->code("'".$v."'",'text');
                $out[]=$f."'%$v%'";
            }

            if($operator=='include_all' or  $operator=='not_include_all')
            {
                return  '('.implode(' and ',$out).')';
            }
            elseif($operator=='include_one')
            {
                return "(".implode(" or ",$out).")";
            }
            else
            {
                return '';
            }

        }
        else
        {
            if(!is_array($argument) and (substr($argument,0,1)=="@"))
            {
                return $f.substr($argument,1);
            }
            else
            {
                if(isset($a['type']))
                {
                    $v=$db->code($argument,$a['type']);
                }
                else
                {
                    $v=$argument;
                }
                if(($operator=="leftlike" or $operator=="not_leftlike") and strpos($v,"%")=== false)
                {
                    return $f."'".$v."%'";
                }
                elseif(($operator=="rightlike" or $operator=="not_rightlike") and strpos($v,"%")=== false)
                {
                    return $f."'%".$v."'";
                }
                elseif(($operator=="like" or $operator=="not_like") and strpos($v,"%")=== false )
                {
                    return $f."'%".$v."%'";
                }
                else
                {
                    return $f."'".$v."'";
                }
            }
        }
    }
    static function getFilter($predicates)
    {
        if(sizeof($predicates)==0)
        {
            return '';
        }
        $where=self::formFilter($predicates,false);
        $having=self::formFilter($predicates,true);
        return array('where'=>$where,'having'=>$having);
    }
    static function formFilter($predicates,$having)
    {
        if(sizeof($predicates)==0)
        {
            return '';
        }
        $aFilter=array();
        $aSet=array();
        $fieldset='';

        foreach($predicates as &$a)
        {

            if(((!isset($a['sqlfunction']) or $a['sqlfunction']==null or $a['sqlfunction']=='') and $having  ) or (isset($a['sqlfunction']) and $a['sqlfunction']!='' and (($having and  !$db->IsAggregateFunction($a['sqlfunction'])) or (!$having and  $db->IsAggregateFunction($a['sqlfunction'])))))
            {
                continue;
            }
            if(isset($a['argument']))
            {
                $a['argument']=Evaluator::get($a['argument']);
            }
            $predicate=self::getPredicate($a);
            if($predicate=='empty')
            {
                return  'empty';
            }
            elseif($predicate=='')
            {
                continue;
            }
            if($fieldset!=$a['fieldset'])
            {
                //fieldset changed
                if($fieldset!='' and sizeof($aSet)>0)
                {
                    //previous predicate was last member of a fieldset
                    // we have to join all members of the previous fieldset
                    $aFilter[]= self::getFieldsetPredicate($aSet);
                    //prepare for a new fieldset
                    $aSet=array();
                }
                $fieldset=$a['fieldset'];
            }
            if($a['fieldset']=='')
            {
                // current predicate is not member of a fieldset
                $aFilter[]=array('predicate'=>$predicate,'connector'=>$a['connector']);
            }
            else
            {
                // current predicate is first member of a new fieldset
                $aSet[]=array('predicate'=>$predicate,'connector'=>$a['connector']);
            }
        }
        if(sizeof($aSet)>0)
        {
            $aFilter[]= self::getFieldsetPredicate($aSet);
        }
        $n=sizeof($aFilter);
        if($n==0)
        {
            $search='';
        }
        elseif($n==1)
        {
            return $aFilter[0]['predicate'];
        }
        else
        {
            $search='('.$aFilter[0]['predicate'];
            for($i=1;$i<$n;$i++)
            {
                $search.=' '.$aFilter[$i]['connector'].' '.$aFilter[$i]['predicate'];
            }
            $search.=')';
        }
        return $search;
    }
    static function getFieldsetPredicate($aSet)
    {
        $n=sizeof($aSet);
        if($n==1)
        {
            return $aSet[0];
        }
        else
        {
            $connector=$aSet[0]['connector'];
            $s='('.$aSet[0]['predicate'];
            for($i=1;$i<$n;$i++)
            {
                $s.=' '.$aSet[$i]['connector'].' '.$aSet[$i]['predicate'];
            }
            $s.=')';
            return array('predicate'=>$s,'connector'=>$connector) ;
        }
    }
}
