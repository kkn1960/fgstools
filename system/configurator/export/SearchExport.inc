<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class SearchExport extends ConfigExport
{
    public $type='search';
    function export($sid,$handle,$e)
    {
        global $registry,$db,$listLoader;
        $lang=$registry->get('export','export','language');
        $obj=new Export();
        $validators=array();
        $q="select t.*,c.* from fgs_validator t left join fgs_condition c on t.validator_condition=c.condition_sid where t.validator_form='$sid' order by t.validator_index ASC";

        $nvalidators=$db->set($q,$validators);
        $filters=array();
        $q="select t.*,c.*,cond.* from fgs_filter t left join fgs_converter c on t.filter_converter=c.converter_sid left join fgs_condition cond on t.filter_condition=cond.condition_sid where filter_form='$sid' order by filter_index ASC";

        $nfilters=$db->set($q,$filters);
        $components=array();
        $q="select component_sid,component_renderer from fgs_component where component_renderer is not null";
        $db->set($q,$components,'component_sid','component_renderer');
        $q="select option_sid as id,option_{$lang} as name from fgs_option where (option_list='PatternMatchingTest' or option_list='NullTest' or option_list='SetTest' or option_list='RangeTest' or option_list='ComparisonTest') order by option_list,option_index";
        $aOperators=array();
        $nop=$db->set($q,$aOperators,'id','name');
        $formInfo=array();
        $q="select * from fgs_form where form_sid='$sid'";
        if(!$db->record($q,$formInfo))
        {
            debug::writeExport($this->type,$sid,Msg("search_not_found"));
            return;
        }
        $table=$formInfo['form_table'];
        $o=array();
        $an='$'."search['$sid']";
        $o[]='<?php';
        $o[]=$an.'=array();';
        $o[]=$an."['session']=array('display','hide');";
        if($formInfo['form_initial']!=null)
        {
            $o[]=$an."['initial']=array({$formInfo['form_initial']});";
        }
        else
        {
            $o[]=$an."['initial']=array();";
        }

        $aProperties=array();
        $aProperties[]="'table'=>'$table'";
        $aProperties[]="'title'=>'{$formInfo['form_title']}'";
        if($formInfo['form_type']=='search_application')
        {
            $aProperties[]="'application'=>true";
        }
        else
        {
            $aProperties[]="'application'=>false";
        }
        $aProperties[]="'method'=>'{$formInfo['form_method']}'";
        $aProperties[]="'system'=>{$formInfo['form_system']}";
        $outa=array();
        $oute=array();
        foreach($e['Search'] as $parameter=>$a)
        {
            $fieldName='form_'.$parameter;
            $v= $obj->render($formInfo[$fieldName],$a,$parameter);
            if($v===null) continue;
            if($a['export_attribute_type']=='property')
            {
                $aProperties[]=$v;
            }
            elseif($a['export_attribute_type']=='attribute')
            {
                $outa[]=$v;
            }
            elseif($a['export_attribute_type']=='event')
            {
                $oute[]=$v;
            }
        }

        $d=array();
        $q="select * from fgs_element where element_index>0 and  element_form='$sid' order by element_index  ASC";
        $n=$db->set($q,$d);
        $chains=array();
        $ap=array();
        $aa=array();
        $ae=array();
        //export buttons
        $o[]='$button[\''.$sid.'\']=array();';
        $events=array();
        for($i=0;$i<$n;$i++)
        {
            if($d[$i]['element_component']=='InputButton')
            {
                $op=array();
                $oa=array();
                $oe=array();
                if($d[$i]['element_action']=='set_filter' or $d[$i]['element_action']=='drop_filter')
                {
                    if($d[$i]['element_event']!=null)
                    {
                        $event=$d[$i]['element_event'];
                    }
                    else
                    {
                        $event='search';
                    }
                    $events[]="'".$d[$i]['element_action']."'=>'{$event}'";
                }
                foreach($e['InputButton'] as $parameter=>$a)
                {
                    $fn='element_'.$parameter;
                    $v= $obj->render($d[$i][$fn],$a,$parameter);
                    if($v===null) continue;
                    if($a['export_attribute_type']=='property')
                    {
                        $op[]=$v;
                    }
                    elseif($a['export_attribute_type']=='attribute')
                    {
                        $oa[]=$v;
                    }
                    elseif($a['export_attribute_type']=='event')
                    {
                        $oe[]=$v;
                    }
                }
                if(sizeof($oa)>0)
                {
                    $v=addSingleQuoteSlashes(implode(' ',$oa));
                    $op[]="'attributes'=>'$v'";
                }
                if(sizeof($oe)>0)
                {
                    $v=addSingleQuoteSlashes(implode(' ',$oe));
                    $op[]="'events'=>'$v'";
                }
                $o[]='$button[\''.$sid.'\'][]=array('.implode(',',$op).');';
            }
            elseif(strpos($d[$i]['element_component'],'Select')!==false and $d[$i]['element_component']!='SelectBooleanCheckbox')
            {

                if($d[$i]['element_list']==null)
                {
                    debug::writeExport($this->type,$sid,Msg("list_not_defined"),'list',$d[$i]['element_rowid']);
                }
                else
                {
                    $iChain=$d[$i]['element_chain'];
                    $iTier=$d[$i]['element_tier'];
                    if($iChain!==null and $iTier!==null)
                    {
                        if($d[$i]['element_id']==null)
                        {
                            debug::writeExport($this->type,$sid,Msg("id_not_defined"),'list',$d[$i]['element_rowid']);
                        }
                        else
                        {
                            $chains[$iChain][$iTier]=array('id'=>$d[$i]['element_id'],'list'=>$d[$i]['element_list'],'sid'=>$d[$i]['element_rowid']);
                        }
                    }
                }
            }

        }
        $nChain=sizeof($chains);
        if($nChain>0)
        {
            $chained=1;
            foreach($chains as $i=>$a)
            {
                $nTier=sizeof($a);
                for($j=0;$j<($nTier-1);$j++)
                {
                    if(!isset($chains[$i][$j+1]))
                    {
                        debug::writeExport($this->type,$sid,Msg("child_not_defined"),'child',$chains[$i]['sid']);
                    }
                }
            }
        }
        else
        {
            $chained=0;
        }
        if(sizeof($events)>0)
        {
            $v=implode(',',$events);
            $aProperties[]="'events'=>array($v)";
        }
        $aProperties[]="'chains'=>'$chained'";
        $o[]=$an."['properties']=array(". implode(',',$aProperties).');';
        $o[]='$p[\''.$sid.'\']=array();';
        //export predicates
        for($i=0;$i<$n;$i++)
        {
            $rowid=$d[$i]['element_rowid'];
            $component=$d[$i]['element_component'];
            $predicate=$d[$i]['element_predicate'];
            $pid='p'.$d[$i]['element_rowid'];
            if($component=='InputButton') continue;
            $type=$d[$i]['element_type'];
            if(null==$d[$i]['element_field'])
            {
                debug::writeExport($this->type,$sid,Msg("field_not_defined"),$component,$d[$i]['element_rowid']);
                continue;
            }
            //export predicate properties
            $pp=array();
            $field=str_replace('xxx',$lang,$d[$i]['element_field']);
            $an='$p[\''.$sid."']['$pid']";
            $o[]=$an.'=array();';
            $pp[]="'rowid'=>$rowid";
            $pp[]="'component'=>'$component'";
            $pp[]="'get'=>{$d[$i]['element_get']}";
            $function=$d[$i]['element_function'];
            if($function!=null)
            {
                $pp[]="'sqlfunction'=>'$function'";
            }
            if($predicate=='range' )
            {
                $o[]=$an."['class']='PredicateRange';";
            }
            else
            {
                $o[]=$an."['class']='Predicate';";
                
            }

            if($predicate=='range' )
            {
                $pp[]="'coa'=>array('argumentMin','argumentMax','operator','connector')";
                $pp[]="'aSave'=>array('argumentMin','argumentMax','operator','connector')";
                $pp[]="'aPost'=>array('argumentMin','argumentMax','operator','connector')";
            }
            elseif($predicate=='null')
            {
                $pp[]="'coa'=>array('operator','connector')";
                $pp[]="'aSave'=>array('operator','connector')";
                $pp[]="'aPost'=>array('operator','connector')";
            }
            else
            {
                $pp[]="'coa'=>array('argument','operator','connector')";
                $pp[]="'aSave'=>array('argument','operator','connector')";
                $pp[]="'aPost'=>array('argument','operator','connector')";
            }
            if($d[$i]['element_left_alias']!=null)
            {
                $v=preg_replace("/\s/",'',$d[$i]['element_left_alias']);
                $v="'".str_replace(',',"','",$v)."'";
                $pp[]="'aliases'=>array($v)";
            }
            else
            {
                $pp[]="'aliases'=>array()";
            }
            if(null==$d[$i]['element_table_alias'])
            {
                $ta='t';
            }
            else
            {
               $ta=$d[$i]['element_table_alias'];
            }
            if(null==$d[$i]['element_alias'])
            {
                if(strpos($field,'.')===false)
                {
                    $fa=$ta.'.'.$field;
                }
                else
                {
                    $fa=$field;
                }
            }
            else
            {
               $fa=$ta.'.'.$d[$i]['element_alias'];
            }
            $pp[]="'field'=>'$fa'";
            $pp[]="'type'=>'$type'";
            if(null!=$d[$i]['element_label'])
            {
                $label=str_replace("'","\\'",Msg($d[$i]['element_label']));
            }
            else
            {
                $label=str_replace("'","\\'",Msg(str_replace('xxx',$lang,$d[$i]['element_field'])));
            }

            $pp[]="'fieldset'=>'{$d[$i]['element_fieldset']}'";
            $pp[]="'label'=>'$label'";
            if($d[$i]['element_predicate_custom']!=null)
            {
                $pp[]="'custom'=>'{$d[$i]['element_predicate_custom']}'";
            }

            $v=implode(',',$pp);
            $o[]=$an."['properties']=array($v);";
            //export Operator properties
            $op=array();
            $op[]="'renderer'=>'OneMenu'";
            $v=$this->getOperatorSid($d[$i]);
            $op[]="'sid'=>'$v'";
            $v=$this->getOperatorName($d[$i]);
            $op[]="'name'=>'$v'";
            $op[]="'type'=>'varchar'";
            $op[]="'name'=>'$v'";
            $op[]="'component'=>'SelectOneMenu'";
            $op[]="'rowid'=>$rowid";


            if($predicate=='set' and  null==$d[$i]["element_operators"])
            {
                $d[$i]["element_operators"]="'in','not_in'";
            }
            if($predicate=='range' and null==$d[$i]["element_operators"])
            {
                $d[$i]["element_operators"]="'between','not_between'";
            }
            if(null==$d[$i]["element_operators"])
            {
                debug::writeExport($this->type,$sid,Msg("operators_not_defined"),$component,$d[$i]['element_rowid']);
                continue;
            }
            else
            {
                $operators=explode(',',str_replace("'","",$d[$i]["element_operators"]));
                $out=array();
                $iFirst=0 ;
                foreach($aOperators as $k=>$v)
                {
                    if(!in_array($k,$operators)) continue;
                    //if(($operator!="between" and $operator!="not_between" ) and  ($k=="between" or $k=="not_between" )) continue;
                    //if(($operator!="in" and $operator!="not_in" ) and  ($k=="in" or $k=="not_in" )) continue;
                    $name=addSingleQuoteSlashes($v);
                    $out[]="'$k'=>'$name'";
                    if($iFirst==0)
                    {
                        $operatorDefault=$k;
                        $iFirst=1;
                    }
                }
                $v=implode(',',$out);
                $op[]="'list'=>array('options'=>array($v))";
                if($d[$i]['element_operator_default']!=null)
                {
                    $op[]="'default_value'=>'{$d[$i]['element_operator_default']}'";
                }
                else
                {
                    if(!isset($operatorDefault))
                    {
                        debug::write($d[$i]["element_operators"],'element_operator_default');
                    }
                    $op[]="'default_value'=>'$operatorDefault'";
                }
                $op[]="'fixed'=>{$d[$i]['element_fix_operator']}";
            }
            if($predicate=='null')
            {
                $op[]="'null_option'=>array(''=>' ')";
                $op[]="'default_value'=>''";
            }
            $v=implode(',',$op);
            $o[]=$an."['operator']=array($v);";
            //export Connector properties
            $co=array();
            $co[]="'renderer'=>'radio'";
            $v=$this->getConnectorSid($d[$i]);
            $co[]="'sid'=>'$v'";
            $v=$this->getConnectorName($d[$i]);
            $co[]="'name'=>'$v'";
            $co[]="'type'=>'tinyint'";
            $co[]="'name'=>'$v'";
            
            $co[]="'default_value'=>'{$d[$i]['element_connector']}'";
            $co[]="'fixed'=>{$d[$i]['element_fix_connector']}";
            $co[]="'layout'=>1";
            $co[]="'component'=>'SelectOneRadio'";
            $co[]="'rowid'=>$rowid";
            $and=Msg('and');
            $or=Msg('or');
            $co[]="'list'=>array('options'=>array('and'=>'$and','or'=>'$or'))";
            $v=implode(',',$co);

            $o[]=$an."['connector']=array($v);";
            if($predicate=='null')
            {
                continue;
            }
            //export argument properties
            $op=array();
            $oa=array();
            $oe=array();
            $op[0]="'field'=>'$field'";
            $op[1]="'label'=>'$label'";
            $v=$this->getArgumentSid($d[$i]);
            $op[2]="'sid'=>'$v'";
            $v=$this->getArgumentName($d[$i]);
            $op[3]="'name'=>'$v'";


            if(($type=='date' or $type=='datetime')  and ($d[$i]['element_id']==null or $d[$i]['element_id']==''))
            {
                $d[$i]['element_id']='datepicker_'.$d[$i]['element_rowid'];
            }

            
            if(strpos($d[$i]['element_component'],'Select')!==false and $d[$i]['element_component']!='SelectBooleanCheckbox')
            {
                if($d[$i]['element_chain']!==null)
                {
                    $v=$d[$i]['element_chain'];
                    $op[]="'chain'=>$v";
                    if($d[$i]['element_tier']!==null)
                    {
                        $v=$d[$i]['element_tier'];
                        $op[]="'link'=>$v";
                        if($d[$i]['element_url']!=null)
                        {
                            $op[]="'url'=>{$d[$i]['element_url']}";
                        }
                        else
                        {
                            $op[]="'url'=>'list.php'";
                        }
                        if($d[$i]['element_callback']!=null)
                        {
                            $op[]="'callback'=>{$d[$i]['element_callback']}";
                        }
                        else
                        {
                            $op[]="'callback'=>'setSingleSelect'";
                        }
                    }
                    else
                    {
                        debug::writeExport($this->type,$sid,Msg("link_not_found"),$component,$d[$i]['element_rowid']);
                    }
                }
            }
            if($type=='date' or $type=='datetime')
            {
                $op[4]="'id'=>'{$d[$i]['element_id']}'";
            }
            if($d[$i]['element_component']=='InputText' and $db->IsText($type))
            {
                $op[5]="'trim'=>'notrim'";
            }
            if($predicate=='range'  and ($d[$i]['element_id']!=null and $d[$i]['element_id']!=''))
            {
                $oa[0]="'id'=>'{$d[$i]['element_id']}'";
            }
            $op[]="'component'=>'$component'";
            $op[]="'rowid'=>$rowid";
            if($component=='SelectOneMenu' or $component=='SelectOneRadio' or $component=='SelectOneListbox'  )
            {
                if(null!=$d[$i]['element_null_option'])
                {
                    $null_option=Msg($d[$i]['element_null_option']);
                }
                elseif(!$d[$i]['element_required'])
                {
                    $null_option='&nbsp;&nbsp;&nbsp;&nbsp;';
                }
            }
            $op[]="'fieldset'=>'{$d[$i]['element_fieldset']}'";
            foreach($e[$component] as $parameter=>$a)
            {
                if($parameter=='required' or $parameter=='modes' or $parameter=='name' or $parameter=='readonly'  or $parameter=='label'  or $parameter=='field') continue;
                if($predicate=='range'  and $parameter=='id') continue;
                $fn='element_'.$parameter;
                //////////////////
                if($parameter=='list' )
                {
                    if($parameter=='list' and null!=$d[$i]['element_filter'])
                    {
                        $a['filter']= $d[$i]['element_filter'];
                    }
                    if($component=='SelectOneMenu' or $component=='SelectOneListbox')
                    {
                        $listInfo=$registry->get('export','export','list_info');
                        if($listInfo['list_null_option']!=null)
                        {
                            $null_option=Msg($listInfo['list_null_option']);
                        }
                        if(!$d[$i]['element_required'])
                        {
                            $op[]="'null_option'=>array(''=>'$null_option')";
                        }
                    }
                    $op[]="'list_sid'=>'{$d[$i]['element_list']}'";
                }
                $v= $obj->render($d[$i][$fn],$a,$parameter);
                if($v===null)
                {
                    if($parameter=='renderer' and array_key_exists($component,$components))
                    {
                        $v="'renderer'=>'{$components[$component]}'";
                    }
                    else
                    {
                        continue;
                    }
                }

                if($a['export_attribute_type']=='property')
                {
                    $op[]=$v;
                }
                elseif($a['export_attribute_type']=='attribute')
                {
                    $oa[]=$v;
                }
                elseif($a['export_attribute_type']=='event')
                {
                    $oe[]=$v;
                }
            }
            if(sizeof($oa)>0 and $predicate!='range')
            {
                $v=addSingleQuoteSlashes(implode(' ',$oa));
                $op[]="'attributes'=>'$v'";
            }
            if(sizeof($oe)>0)
            {
                $v=addSingleQuoteSlashes(implode(' ',$oe));
                $op[]="'events'=>'$v'";
            }
            //export of validators
            if(null!=$d[$i]['element_alias'])
            {
                $key=$d[$i]['element_alias'];
            }
            else
            {
                $key=$d[$i]['element_field'];
            }
            $outv=array();
            //export of validators
            $outv=array();
            for($iv=0;$iv<$nvalidators;$iv++)
            {
                if($validators[$iv]['validator_field']==$key)
                {
                    $export_validator=$obj->export_validator($validators[$iv]);
                    if($export_validator!=0)
                    {
                         $outv[]=$export_validator;
                    }
                }
            }
            if(sizeof($outv)>0)
            {
                $v=implode(',',$outv);
                $op[]="'validators'=>array($v)";
            }
            $outv=array();
            $outv=array();
            for($iv=0;$iv<$nfilters;$iv++)
            {
                if($filters[$iv]['filter_field']==$key)
                {
                    $export_filter=$obj->export_filter($filters[$iv]);
                    if($export_validator===0)
                    {
                         continue;
                    }
                    else
                    {
                         $outv[]="array($export_filter)";
                    }
                }
            }
            if(sizeof($outv)>0)
            {
                $v=implode(',',$outv);
                $op[]="'filters'=>array($v)";
            }
            if($predicate=='range')
            {
                if($db->isTime($d[$i]['element_type']))
                {
                    $label=Msg('from');
                }
                else
                {
                    $label=Msg('min');
                }
                $op[1]="'label'=>\"$label\"";
                $v=$this->getArgumentSid($d[$i]).'min';
                $op[2]="'sid'=>'$v'";
                $v=$this->getArgumentName($d[$i]).'_min';
                $op[3]="'name'=>'$v'";
                
                if($d[$i]['element_id']!=null and $d[$i]['element_id']!='')
                {
                    $oa[0]="id='{$d[$i]['element_id']}_min'";
                    $op[4]="'id'=>'{$d[$i]['element_id']}_min'";
                }
                $last=sizeof($op);
                if(sizeof($oa)>0)
                {
                   $v=implode(' ',$oa);
                   $op[$last]="'attributes'=>\"$v\"";
                }
                
                $v=implode(',',$op);
                $o[]=$an."['argumentMin']=array($v);";
                if($db->isTime($d[$i]['element_type']))
                {
                    $label=Msg('until');
                }
                else
                {
                    $label=Msg('max');
                }
                $op[1]="'label'=>\"$label\"";
                $v=$this->getArgumentSid($d[$i]).'max';
                $op[2]="'sid'=>'$v'";
                $v=$this->getArgumentName($d[$i]).'_max';
                $op[3]="'name'=>'$v'";
                if($d[$i]['element_id']!=null and $d[$i]['element_id']!='')
                {
                    $oa[0]="id='{$d[$i]['element_id']}_max'";
                    $op[4]="'id'=>'{$d[$i]['element_id']}_max'";
                }
                if(sizeof($oa)>0)
                {
                   $v=implode(' ',$oa);
                   $op[$last]="'attributes'=>\"$v\"";
                }
                $v=implode(',',$op);
                $o[]=$an."['argumentMax']=array($v);";
            }
            else
            {
                $v=implode(',',$op);
                $o[]=$an."['argument']=array($v);";
            }


            ///////////////////
        }
        if (!fwrite($handle,implode("\n",$o),1000000))
        {
            debug::writeExport($this->type,$sid,Msg("cannot_write"));
        }
    }
    function getOperatorSid($a)
    {
        global $lang;
        if(null==$a['element_sid'])
        {
            return 'operator_'.str_replace('xxx',$lang,$a['element_field']).'_'.$a['element_rowid'];
        }
        else
        {
            return 'operator_'.$a['element_sid'];
        }
    }
    function getOperatorName($a)
    {
        global $lang;
        if(null==$a['element_name'])
        {
            return 'operator_'.str_replace('xxx',$lang,$a['element_field']).'_'.$a['element_rowid'];;
        }
        else
        {
            return 'operator_'.$a['element_name'];
        }
    }
    function getConnectorSid($a)
    {
        global $lang;
        if(null==$a['element_sid'])
        {
            return 'connector_'.str_replace('xxx',$lang,$a['element_field']).'_'.$a['element_rowid'];;
        }
        else
        {
            return 'connector_'.$a['element_sid'];
        }
    }
    function getConnectorName($a)
    {
        global $lang;
        if(null==$a['element_name'])
        {
            return 'connector_'.str_replace('xxx',$lang,$a['element_field']).'_'.$a['element_rowid'];;
        }
        else
        {
            return 'connector_'.$a['element_name'];
        }
    }
    function getArgumentSid($a)
    {
        global $lang;
        if(null==$a['element_sid'])
        {
            return 'argument_'.str_replace('xxx',$lang,$a['element_field']).'_'.$a['element_rowid'];;
        }
        else
        {
            return $a['element_sid'];
        }
    }
    function getArgumentName($a)
    {
        global $lang;
        if(null==$a['element_name'])
        {
            return 'argument_'.str_replace('xxx',$lang,$a['element_field']).'_'.$a['element_rowid'];;
        }
        else
        {
            return 'argument_'.$a['element_name'];
        }
    }
}

