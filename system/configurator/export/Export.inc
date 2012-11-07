<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Export
{
    public $err;
    public $title;
    function __construct()
    {
        $this->err=array();
    }
    function render($value,$args,$parameter=null)
    {
        if($args['export_attribute_type']=='attribute')
        {
            return $this->export_attribute($value,$args,$parameter);
        }
        elseif($args['export_attribute_type']=='event')
        {
            return $this->export_event($value,$args,$parameter);
        }
        elseif($parameter=='list')
        {
            $result=$this->export_list($value,$args);
            if($result===null)
            {
                return  null;
            }
            else
            {
                return "'list'=>$result";
            }
        }
        elseif($args['export_type']=='array')
        {
            return $this->export_array($value,$args,$parameter);
        }
        elseif($args['export_type']=='string')
        {
            return $this->export_string($value,$args,$parameter);
        }
        elseif($args['export_type']=='number')
        {
            return $this->export_number($value,$args,$parameter);
        }
    }
    function export_list($value,$args=null)
    {
        global   $registry,$db,$listLoader;
        $export_component=$registry->getGlobal('export_component');
        $export_component_sid=$registry->getGlobal('export_component_sid');
        $li=array();
        if($db->record("select t.*,d.dataset_filter  from fgs_list t left join fgs_dataset d on list_dataset=d.dataset_sid where t.list_sid='$value' ",$li)==false)
        {
            debug::writeExport($export_component,$export_component_sid,Msg("list_not_found"),'list',$value);
            return null;
        }
        $table=$li['list_table'];
        $registry->set('export','export','list_info',$li);
        $lang=$registry->get('export','export','language') ;
        if($li["list_table"]=="fgs_option")
        {
            $registry->set('export','export','fgs_option',true);
            $where="option_list='{$li['list_sid']}'";
            if($args!=null and isset($args['filter']))
            {
                $where.=' and ' .addslashes($args['filter']);
            }
            if($li['list_order']!='')
            {
                $order=str_replace('xxx',$lang,$li['list_order']);
                $q="select option_sid as id,option_{$lang} as name from fgs_option where $where order by $order";
            }
            else
            {
                $q="select option_sid as id,option_{$lang} as name from fgs_option where $where";
            }
            $opt=array();
            $n=$db->set($q,$opt,'id','name');
            $out=array();
            if($n==0)
            {
               debug::writeExport($export_component,$export_component_sid,Msg("no_options"),'list',$value);
               return null;
            }

            foreach($opt as $k=>$v)
            {
                $name=addSingleQuoteSlashes($v);
                if($li["list_numeric"]==1)
                {
                    $out[]="'$k'=>$v";
                }
                else
                {
                    $out[]="'$k'=>'$name'";
                }
            }
            return "array('options'=>array(".implode(',',$out).'))';
        }
        elseif($li["list_constant"]==1)
        {
            $params=array();
            $params['sid']=$value;
            $params['table']=$li['list_table'];
            if(isset($args['filter']))
            {
                $params['filter']=$args['filter'];
            }
            if(null==$li['list_from'])
            {
                $params['from']=$li['list_table'];
            }
            else
            {
                $params['from']=$li['list_from'];
            }
            ///////////////////////
            if(null==$li['list_select'])
            {
                $os=array();
                $params['primary_key']=$li['list_primary_key'];
                
                $os[]=$li['list_primary_key'].' id';
                if(null==$li['list_display_field'])
                {
                    debug::writeExport($export_component,$export_component_sid,Msg("display_field_required"),'list',$value);
                    return null;
                }
                $os[]=str_replace('xxx',$lang,$li['list_display_field']).' as name';
                $v=implode(',', $os);
                $params['select']=$v;
            }
            else
            {
                $params['select']=str_replace('xxx',$lang,$li['list_select']);
            }
            if(null!=$li['list_order'])
            {
                $params['order']=str_replace('xxx',$lang,$li['list_order']);
            }
            if(null!=$li['list_where'])
            {
                $params['where']=str_replace('xxx',$lang,$li['list_where']);
            }
            if(null!==$li['list_class'])
            {
                $params['class']=$li['list_class'];
            }
            if(null!==$li['list_table_alias'])
            {
                $params['table_alias']=$li['list_table_alias'];
            }
            if(null!==$li['list_field_alias'])
            {
                $params['alias']=$li['list_field_alias'];
            }
            $params['display_field']=str_replace('xxx',$lang,$li['list_display_field']);
            if($li['list_dataset']!=null)
            {
                if(null!=$li['dataset_filter'])
                {
                    $params['filter']=$li['dataset_filter'];
                }
                $predicate=$this->export_predicate($li['list_dataset'],true);
                if($predicate!='')
                {
                    $params['predicates']=$predicate;
                }
            }
            ////////////////////////
            $options=$listLoader->get($params);
            $n=sizeof($options);
            $out=array();
            foreach($options as $k=>$v)
            {
                $name=addSingleQuoteSlashes($v);
                $out[]="'$k'=>'$name'";
            }
            return "array('options'=>array(".implode(',',$out).'))';
        }
        else
        {
            $o=array();
            $o[]="'sid'=>'$value'";
            $o[]="'table'=>'{$li['list_table']}'";
            if(isset($args['filter']))
            {
                $v=addSingleQuoteSlashes($args['filter']);
                $o[]="'filter'=>'$v'";
            }
            if(null==$li['list_from'])
            {
                $o[]="'from'=>'{$li['list_table']}'";
            }
            else
            {
                $o[]="'from'=>'{$li['list_from']}'";
            }
            if(null==$li['list_select'])
            {
                $os=array();
                $o[]="'primary_key'=>'{$li['list_primary_key']}'";
                $os[]=$li['list_primary_key'].' id';
                if(null==$li['list_display_field'])
                {
                    debug::writeExport($export_component,$export_component_sid,Msg("display_field_required"),'list',$value);
                    return null;
                }
                $os[]=str_replace('xxx',$lang,$li['list_display_field']).' as name';
                $v=implode(',', $os);
                $o[]="'select'=>'$v'";
            }
            else
            {
                $v=str_replace('xxx',$lang,$li['list_select']);
                $o[]="'select'=>'$v'";
            }
            if(null!=$li['list_order'])
            {
                $v=str_replace('xxx',$lang,$li['list_order']);
                $o[]="'order'=>'$v'";
            }
            if(null!=$li['list_where'])
            {
                $v=addSingleQuoteSlashes(str_replace('xxx',$lang,$li['list_where']));
                $o[]="'where'=>'$v'";
            }
            if(null!==$li['list_class'])
            {
                $o[]="'class'=>'{$li['list_class']}'";
            }
            if(null!==$li['list_table_alias'])
            {
                $o[]="'table_alias'=>'{$li['list_table_alias']}'";
            }
            if(null!==$li['list_field_alias'])
            {
                $o[]="'alias'=>'{$li['list_field_alias']}'";
            }
            $v=str_replace('xxx',$lang,$li['list_display_field']);
            $o[]="'display_field'=>'$v'";
            if($li['list_dataset']!=null)
            {
                if(null!=$li['dataset_filter'])
                {
                    $o[]="'filter'=>\"{$li['dataset_filter']}\"";
                }
                $predicate=$this->export_predicate($li['list_dataset']);
                if($predicate!='')
                {
                    $o[]=$predicate;
                }
            }
            return "array(".implode(",",$o).')';
        }
    }
    function export_predicate($sid,$returnAarray=false)
    {
        global $registry,$db;
        $lang=$registry->get('export','export','language') ;
        $export_component=$registry->getGlobal('export_component');
        $export_component_sid=$registry->getGlobal('export_component_sid');
        $q="select * from fgs_predicate where predicate_dataset='$sid' order by predicate_index ASC";
        $n=$db->set($q,$info);
        $ap=array();
        for($i=0;$i<$n;$i++)
        {
            $out=array();
            if($info[$i]['predicate_table']==null)
            {
                $t=$table;
            }
            else
            {
                $t=$info[$i]['predicate_table'];
            }
            $buf=str_replace('xxx',$lang,$info[$i]['predicate_field']);
            $out[]="'field'=>'$buf'";
            $f=str_replace('.','',$buf);
            if($info[$i]['predicate_argument_type']!=null)
            {
                $out[]="'type'=>'{$info[$i]['predicate_argument_type']}'";
            }
            else
            {
                $q="select field_type from fgs_field where field_name='$f' and field_table='$t'";
                $type=$db->value($q);
                if($type==null)
                {
                    debug::writeExport($export_component,$export_component_sid,"$f- field type not found ",'predicate',$sid);
                    return '';
                }
                else
                {
                    $out[]="'type'=>'$type'";
                }
            }
            $out[]="'table'=>'$t'";
            if($info[$i]['predicate_fieldset']===null)
            {
                $out[]="'fieldset'=>'t'";
            }
            else
            {
                $out[]="'fieldset'=>'{$info[$i]['predicate_fieldset']}'";
            }
            if($info[$i]['predicate_function']!=null)
            {
                $out[]="'sqlfunction'=>'{$info[$i]['predicate_function']}'";
            }
            $out[]="'required'=>'{$info[$i]['predicate_required']}'";
            if($info[$i]['predicate_custom']!=null)
            {
                $out[]="'custom'=>'{$info[$i]['predicate_custom']}'";
            }
            if($info[$i]['predicate_argument']!==null)
            {
                $out[]="'argument'=>\"{$info[$i]['predicate_argument']}\"";
            }
            else
            {
                $out[]="'argument'=>''";
            }

            $out[]="'operator'=>'{$info[$i]['predicate_operator']}'";
            $out[]="'connector'=>'{$info[$i]['predicate_connector']}'";
            $v=implode(',',$out);
            $ap[]="array($v)";
        }
        if($n>0)
        {
            $v=implode(',',$ap);
            if($returnAarray)
            {

                return array($v);
            }
            else
            {
                return "'predicates'=>array($v)";
            }
        }
        else
        {
            return '';
        }
    }
    function export_filter($filter)
    {
        global $registry,$db;
        $lang=$registry->get('export','export','language') ;
        $export_component=$registry->getGlobal('export_component');
        $export_component_sid=$registry->getGlobal('export_component_sid');
        $parameter=$filter['filter_parameter'];
        $parameter_type=$filter['filter_parameter_type'];
        $filter_converter=$filter['filter_converter'];
        $o=array();
        $o[]="'converter'=>'{$filter['filter_converter']}'";
        if($parameter!=null)
        {
            if($parameter_type=='array')
            {
                $o[]="'parameter'=>array($parameter)";
            }
            else
            {
                $o[]="'parameter'=>\"$parameter\"";
            }
        }
        $o[]="'static'=>'{$filter['converter_static']}'";
        if($filter['filter_condition']!=null)
        {
            $validator=array();
            $validator['validator_field']= str_replace('xxx',$lang,$filter['filter_condition_field']);
            $validator['validator_condition']= $filter['filter_condition'];
            $validator['validator_class']= $filter['filter_condition_class'];
            $validator['validator_class_static']= $filter['filter_condition_class_static'];
            $validator['validator_parameter']= $filter['filter_condition_parameter'];
            $validator['validator_parameter_type']= $filter['filter_condition_parameter_type'];
            $validator['validator_error']= null;
            $validator['validator_break_onfailure']= 0;
            $validator['condition_error']= $filter['condition_error'];
            $validator['converter_static']= $filter['converter_static'];
            $condition=$this->export_validator($validator);
            if($condition!==0)
            {
                $o[]="'condition'=>array($condition)";
            }
        }
        return implode(",",$o);
    }
    function export_validator($validator)
    {
        global $registry,$db;
        $lang=$registry->get('export','export','language') ;
        $export_component=$registry->getGlobal('export_component');
        $export_component_sid=$registry->getGlobal('export_component_sid');
        $parameter=addSingleQuoteSlashes($validator['validator_parameter']);
        $parameter_type=$validator['validator_parameter_type'];
        $condition=$validator['validator_condition'];
        $o=array();
        if($validator['validator_class']!=null)
        {
            $o[]="'class'=>'{$validator['validator_class']}'";
            $o[]="'static'=>'{$validator['validator_class_static']}'";
        }
        if($condition==null and $parameter!=null)
        {
            if($parameter_type=='array')
            {
                $o[]="'parameter'=>array($parameter)";
            }
            else
            {
                $o[]="'parameter'=>'$parameter'";
            }
        }
        $error=null;
        if($condition!=null)
        {
            $error=$validator['condition_error'];
        }
        if($validator['validator_error']!=null )
        {
            $o[]="'error'=>\"{$validator['validator_error']}\"";
        }
        elseif($error!=null )
        {
            $o[]="'error'=>\"$error\"";
        }
        else
        {
            $o[]="'error'=>'wrong_value'";
        }
        $o[]="'break_onfailure'=>{$validator['validator_break_onfailure']}";
        $q="select * from fgs_statement where statement_condition='{$condition}' order by statement_index ASC";
        $aStatement=array();
        $nStatement=$db->set($q,$aStatement);
        if($nStatement==0)
        {
            debug::writeExport($export_component,$export_component_sid,Msg("condition_without_statements"),'condition',$condition);
            return 0;
        }
        else
        {
            $as=array();
            for($j=0;$j<$nStatement;$j++)
            {
                $out=array();
                $operator=$aStatement[$j]['statement_operator'];
                $operand1=$aStatement[$j]['statement_operand1'];
                $operand2=$aStatement[$j]['statement_operand2'];
                $field=str_replace('xxx',$lang,$validator['validator_field']);
                if($aStatement[$j]['statement_function']!=null)
                {
                    $out[]="'function'=>'{$aStatement[$j]['statement_function']}'";
                }
                //validator_field is  operand1 and   validator_parameter is operand2
                //  %statement_operand1 means that  operand1 is a variable
                //  %statement_operand2 means that  operand2 is a variable
                if(strpos($operand1,'%statement_operand1')!==false)
                {
                    $operand1=str_replace('%statement_operand1',"&arg ".$field,$operand1);
                    $out[]="'operand1'=>'$operand1'";
                }
                elseif(strpos($operand1,'%statement_operand2')!==false)
                {
                    if($parameter==null)
                    {
                        debug::writeExport($export_component,$export_component_sid,Msg("parameter_not_defined"),'condition',$condition);
                    }
                    elseif($parameter_type=='field')
                    {
                        $operand1=str_replace('%statement_operand2',"&arg ".$parameter,$operand1) ;
                        $out[]="'operand1'=>'$operand1'";
                    }
                    elseif($parameter_type=='array')
                    {
                        $out[]="'operand1'=>array($parameter)";
                    }
                    else
                    {
                        $out[]="'operand1'=>\"$parameter\"";
                    }
                }
                else
                {
                    $out[]="'operand1'=>'$operand1'";
                }
                if($operand2!=null)
                {
                    if(strpos($operand2,'%statement_operand1')!==false)
                    {
                        $operand2=str_replace('%statement_operand1',"&arg ".$field,$operand2);
                        $out[]="'operand2'=>'$operand2'";
                    }
                    elseif(strpos($operand2,'%statement_operand2')!==false)
                    {
                        if($parameter==null)
                        {
                            debug::writeExport($export_component,$export_component_sid,Msg("parameter_not_defined"),'condition',$condition);
                        }
                        elseif($parameter_type=='field')
                        {
                            $operand2=str_replace('%statement_operand2',"&arg ".$parameter,$operand2) ;
                            $out[]="'operand2'=>'$operand2'";
                        }
                        elseif($parameter_type=='array')
                        {
                            $out[]="'operand2'=>array($parameter)";
                        }
                        else
                        {
                            $out[]="'operand2'=>'$parameter'";
                        }
                    }
                    else
                    {
                        $out[]="'operand2'=>'$operand2'";
                    }

                }
                $out[]="'connector'=>'{$aStatement[$j]['statement_connector']}'";
                $out[]="'operator'=>'{$aStatement[$j]['statement_operator']}'";
                $out[]="'failure'=>'{$aStatement[$j]['statement_failure']}'";
                if($aStatement[$j]['statement_group']===null)
                {
                    $out[]="'group'=>''";
                }
                else
                {
                    $out[]="'group'=>'{$aStatement[$j]['statement_group']}'";
                }
                $v=implode(',',$out);
                $as[]="array($v)";
            }
            $v=implode(',',$as);
            $o[]="'statement'=>array($v)";
        }
        return implode(",",$o);
    }
    function export_condition($d)
    {
        global $registry,$db;
        $lang=$registry->get('export','export','language') ;
        $export_component=$registry->getGlobal('export_component');
        $export_component_sid=$registry->getGlobal('export_component_sid');
        $validator=array();
        if($d['column_condition_field']!=null)
        {
            $validator['validator_field']= str_replace('xxx',$lang,$d['column_condition_field']);
        }
        else
        {
            $validator['validator_field']= str_replace('xxx',$lang,$d['column_field']);
        }
        $validator['validator_condition']= $d['column_condition'];
        $validator['validator_class']= $d['column_condition_class'];
        $validator['validator_class_static']= $d['column_condition_class_static'];
        $validator['validator_parameter']= $d['column_condition_parameter'];
        $validator['validator_parameter_type']= $d['column_condition_parameter_type'];
        $validator['validator_error']= null;
        $validator['validator_break_onfailure']= 0;
        $validator['condition_error']= null;
        return $this->export_validator($validator);
    }
    function export_attribute($value,$args,$parameter=null)
    {

        if($value===null or $value==='')
        {
            if($args['export_default']===null or $args['export_default']==='')
            {
                return null;
            }
            else
            {
                $v=$args['export_default'];
            }
        }
        elseif($args['export_required']==0 and $args['export_default']==$value)
        {
            return null;
        }
        else
        {
            $v=$value;
        }
        if($args['export_translate']==='1')
        {
            $v=Msg($v);
        }
        if($parameter==null)
        {
            return $v;
        }
        return "$parameter='$v'" ;
    }
    function export_event($value,$args,$parameter=null)
    {
        if($value===null or $value==='')
        {
            if($args['export_default']===null or $args['export_default']==='')
            {
                return null;
            }
            else
            {
                $v=$args['export_default'];
            }
        }
        else
        {
            $v=$value;
        }
        if($args['export_translate']==='1')
        {
            $v=Msg($v);
        }
        if($parameter==null)
        {
            return $v;
        }
        return "$parameter=\"$v\"" ;
    }

    function export_string($value,$args,$parameter=null)
    {
        if($value===null or $value==='')
        {
            if($args['export_default']===null or $args['export_default']==='')
            {
                return null;
            }
            else
            {
                $v=$args['export_default'];
            }
        }
        elseif($args['export_required']==0 and $args['export_default']==$value)
        {
            return null;
        }
        else
        {
            $v=$value;
        }
        if($args['export_translate']==='1')
        {
            $v=Msg($v);
        }
        if($parameter==null)
        {
            return $v;
        }
        if($parameter=='default')
        {
            $parameter='default_value';
        }
        if($args['export_value_type']=='string')
        {
            $v=addSingleQuoteSlashes($v);
            return "'$parameter'=>'$v'" ;
        }
        elseif($args['export_value_type']=='number')
        {
            return "'$parameter'=>$v" ;
        }
    }
    function export_number($value,$args,$parameter=null)
    {
        if($value===null or $value==='')
        {
            if($args['export_default']===null or $args['export_default']==='')
            {
                return null;
            }
            else
            {
                $v=$args['export_default'];
            }
        }
        elseif($args['export_required']==0 and $args['export_default']==$value)
        {
            return null;
        }
        else
        {
            $v=$value;
        }

        if($parameter==null)
        {
            return $v;
        }
        if($parameter=='default')
        {
            $parameter='default_value';
        }
        return "'$parameter'=>$v" ;
    }

    function export_array($value,$args,$parameter=null)
    {
        if($value===null or $value==='')
        {
            if(!isset($args['export_default']) or $args['export_default']==='')
            {
                return null;
            }
            else
            {
                $v=$args['export_default'];
            }
        }
        else
        {
            $v=$value;
        }
        $a=explode($args['export_delimiter'],$v);
        $o=array();
        foreach($a as $v)
        {
            if($args['export_value_type']=='string')
            {
                $v="'".$v."'";
            }
            $o[]=$v;
        }
        if($parameter==null)
        {
            return 'array('.implode(',',$o).')';
        }
        else
        {
            return "'$parameter'=>array(".implode(',',$o).")";
        }
    }

}
