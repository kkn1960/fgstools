<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FormExport extends ConfigExport
{
    public $type='form';
    function export($sid,$handle,$e)
    {
        global $registry,$db,$listLoader;
        
        $lang=$registry->get('export','export','language') ;
        $obj=new Export();
        ///get ACL for this form
        $aRoles=array();
        $q="select c.controller_roles from fgs_unit t left join fgs_controller c on t.unit_controller=c.controller_sid where unit_form='$sid'";
        $nRoles=$db->set($q,$aRoles,'controller_roles');
        ////
        
        
        $validators=array();
        $q="select t.*,c.* from fgs_validator t left join fgs_condition c on t.validator_condition=c.condition_sid where t.validator_form='$sid' order by t.validator_index ASC";
        $nvalidators=$db->set($q,$validators);
        $filters=array();
        $q="select t.*,c.*,cond.* from fgs_filter t left join fgs_converter c on t.filter_converter=c.converter_sid left join fgs_condition cond on t.filter_condition=cond.condition_sid where filter_form='$sid' order by filter_index ASC";
        $nfilters=$db->set($q,$filters);
        $components=array();
        $q="select component_sid,component_renderer from fgs_component where component_renderer is not null";
        $db->set($q,$components,'component_sid','component_renderer');
        $formInfo=array();
        $q="select * from fgs_form where form_sid='$sid'";
        if(!$db->record($q,$formInfo))
        {
            debug::writeExport($this->type,$sid,Msg("form_not_found"));
            return ;
        }
        if($formInfo['form_system'])
        {
            $element_path=SYSTEM_ELEMENT_PATH;
        }
        else
        {
            $element_path=APPLICATION_ELEMENT_PATH;
        }
        $table=$formInfo['form_table'];
        $q="select count(*) from fgs_field where field_table='$table' and field_lookup is not null and field_relation='master' ";
        $fkr=array();
        if($db->value($q)>0)
        {
            $sessionFK=",'amf','foreign_key'";
        }
        else
        {
            $sessionFK='';
        }
        $tableInfo=array();
        if($table!='' and $table!=null)
        {
            $q="select * from fgs_table where table_name='$table'";
            if(!$db->record($q,$tableInfo))
            {
                debug::writeExport($this->type,$sid,$table.':'.Msg("table_not_found"));
                return;
            }
        }
        $o=array();
        $an='$'."form['$sid']";
        $o[]='<?php';
        $o[]=$an.'=array();';
        $o[]=$an."['initial']=array();";
        if($formInfo['form_initial']!=null)
        {
            $addInitial=','.$formInfo['form_initial'];
        }
        else
        {
            $addInitial='';
        }
        if($formInfo['form_startmode']!=='' and $formInfo['form_startmode']!==null)
        {
            $o[]=$an."['initial']=array('mode'=>'{$formInfo['form_startmode']}'{$addInitial});";
        }
        elseif(strpos($formInfo['form_modes'],'insert')!==false)
        {
            $o[]=$an."['initial']=array('mode'=>'insert'{$addInitial});";
        }

        if(strpos($formInfo['form_modes'],'insert')!==false)
        {
            $o[]=$an."['session']['insert']=array('mode','hide','display'{$sessionFK}{$addInitial});";
        }
        if(strpos($formInfo['form_modes'],'copy')!==false)
        {
            $o[]=$an."['session']['copy']=array('mode','hide','display','apk','irow'{$sessionFK}{$addInitial});";
        }
        if(strpos($formInfo['form_modes'],'read')!==false)
        {
            $o[]=$an."['session']['read']=array('mode','hide','display','apk','irow'$sessionFK{$addInitial});";
        }
        if(strpos($formInfo['form_modes'],'update')!==false)
        {
            $o[]=$an."['session']['update']=array('mode','hide','display','apk','irow'$sessionFK{$addInitial});";
        }
        if(strpos($formInfo['form_modes'],'update_partial')!==false)
        {
            $o[]=$an."['session']['update_partial']=array('mode','hide','display','apk','irow'$sessionFK{$addInitial});";
        }
        if(strpos($formInfo['form_modes'],'remove')!==false)
        {
            $o[]=$an."['session']['remove']=array('mode','hide','display','apk','irow'$sessionFK{$addInitial});";
        }
        if(strpos($formInfo['form_modes'],'multi_update')!==false)
        {
            $o[]=$an."['session']['multi_update']=array('mode','hide','display','apk','irow'$sessionFK{$addInitial});";
        }
        if(strpos($formInfo['form_modes'],'multi_remove')!==false)
        {
            $o[]=$an."['session']['multi_remove']=array('mode','hide','display','apk','irow'$sessionFK{$addInitial});";
        }
        if(strpos($formInfo['form_modes'],'multi_read')!==false)
        {
            $o[]=$an."['session']['multi_read']=array('mode','hide','display','apk','irow'$sessionFK{$addInitial});";
        }
        if(strpos($formInfo['form_modes'],'seek')!==false)
        {
            $o[]=$an."['session']['seek']=array('mode','hide','display','apk'{$addInitial});";
        }
        $aProperties=array();
        if($table!='' and $table!=null)
        {
            $v=$obj->export_array($tableInfo['table_primary_key'],array('export_type'=>'array','export_delimiter'=>',','export_value_type'=>'string'));
            $aProperties[]="'primary_key'=>$v";
            $aProperties[]="'table'=>'$table'";
        }
        $aProperties[]="'method'=>'{$formInfo['form_method']}'";
        $aProperties[]="'system'=>{$formInfo['form_system']}";
        $aProperties[]="'redirect_after_insert'=>{$formInfo['form_redirect_after_insert']}";

        $aProperties[]=$obj->export_array($formInfo['form_modes'],array('export_type'=>'array','export_delimiter'=>',','export_value_type'=>'number'),'modes');
        if(isset($formInfo['form_rowid_after_insert']))
        {
            $aProperties[]="'rowid_after_insert'=>'{$formInfo['form_rowid_after_insert']}'";
        }
        $aProperties[]="'system'=>{$formInfo['form_system']}";
        if($table!='' and $table!=null)
        {
            //descendants
            $q="select t.*, t1.table_primary_key from fgs_field t left join fgs_table t1 on t.field_table=t1.table_name where t.field_lookup='$table'";
            $fieldInfo=array();
            $n=$db->set($q,$fieldInfo);
            $outDescendant=array();
            $outDependent=array();
            $outReference=array();
            $outd=array();
            for($i=0;$i<$n;$i++)
            {
                $t=$fieldInfo[$i]['field_table'];
                $f=$fieldInfo[$i]['field_name'];
                $type=$fieldInfo[$i]['field_type'];
                $pk=$fieldInfo[$i]['field_primary_key'];
                $dbcascade=$fieldInfo[$i]['field_dbcascade'];
                $table_pk= $fieldInfo[$i]['table_primary_key'];
                $index=$t.'_'.$f;
                if($fieldInfo[$i]['field_relation']=='master')
                {
                    if($fieldInfo[$i]['field_sequence']!=null)
                    {
                        $outDescendant[]="'{$index}'=>array('fk'=>'$f','type'=>'$type','dbcascade'=>$dbcascade,'table'=>'$t','pk'=>'$pk','table_pk'=>'$table_pk','sequence'=>'$sequence')";
                    }
                    else
                    {
                        $outDescendant[]="'{$index}'=>array('fk'=>'$f','type'=>'$type','dbcascade'=>$dbcascade,'table'=>'$t','table_pk'=>'$table_pk','pk'=>'$pk')";
                    }

                }
                else
                {
                    $outDependent[]="'{$index}'=>array('fk'=>'$f','type'=>'$type','dbcascade'=>$dbcascade,'table'=>'$t','pk'=>'$pk')";
                }
                $outReference[]="'{$index}'=>array('fk'=>'$f','type'=>'$type','dbcascade'=>$dbcascade,'table'=>'$t','pk'=>'$pk')";
            }
            if(sizeof($outDependent)>0)
            {
                $aProperties[]="'dependent'=>array(".implode(',',$outDependent).')';
            }
            if(sizeof($outDescendant)>0)
            {
                $aProperties[]="'descendant'=>array(".implode(',',$outDescendant).')';
            }
            if(sizeof($outReference)>0)
            {
                $aProperties[]="'reference'=>array(".implode(',',$outReference).')';
            }
        }

        //attributes&events
        $outa=array();
        $oute=array();
        foreach($e['Form'] as $parameter=>$a)
        {
            $fieldName='form_'.$parameter;

            $v= $obj->render($formInfo[$fieldName],$a,$parameter);
            if($v===null) continue;
            if($parameter=='onsubmit')
            {
                $v=addSingleQuoteSlashes($formInfo[$fieldName]);
                $aProperties[]="'onsubmit'=>'$v'";
            }
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
        $aProperties[]="'attributes'=>'".implode(' ',addSingleQuoteSlashes($outa))."'";
        $aProperties[]="'htmlevents'=>'".implode(' ',addSingleQuoteSlashes($oute))."'";

        //export elements
        $elementInfo=array();
        $q="select * from fgs_element where element_index>0 and  element_form='$sid' order by element_index  ASC";
        $n=$db->set($q,$elementInfo);
        $multipart=false;
        //preliminary checks
        // form enctype
        $chains=array();
        $autocomplete=array();
        $setEvents=array();
        $setComponents=array('InputAutocomplete','InputMultiAutocomplete','SelectOneRadio','SelectOneMenu','SelectOneListbox','SelectManyMenu','SelectManyListbox','SelectManyCheckbox');
        for($i=0;$i<$n;$i++)
        {
            $rowid=$elementInfo[$i]['element_rowid'];
            $id=$elementInfo[$i]['element_id'];
            $component=$elementInfo[$i]['element_component'];
            $register=$elementInfo[$i]['element_register'];
            $iChain=$elementInfo[$i]['element_chain'];
            $iTier=$elementInfo[$i]['element_tier'];
            if($elementInfo[$i]['element_event']!=null and in_array($component,$setComponents) and $elementInfo[$i]['element_list']!=null )
            {
                $q="select list_table from fgs_list where list_sid='{$elementInfo[$i]['element_list']}'";
                $listTable=$db->value($q);
                if($listTable!=null)
                {
                    $elSid=$this->getElementSid($elementInfo[$i]);
                    $setEvents[]="array('table'=>'$listTable','sid'=>'$elSid','event'=>'{$elementInfo[$i]['element_event']}')";
                }
            }
            if($elementInfo[$i]['element_component']=='InputFile')
            {
                $multipart=true;
            }
            elseif($component=='SetFieldCheckbox')
            {
                $elementInfo[$i]['element_component']='SelectBooleanCheckbox';
            }
            elseif(strpos($component,'Select')!==false and $component!='SelectBooleanCheckbox')
            {
                if($elementInfo[$i]['element_list']==null)
                {
                    debug::writeExport($this->type,$sid,Msg("list_not_defined"),$rowid);
                }
                else
                {
                    if($iChain!==null and $iTier!==null )
                    {
                        if($elementInfo[$i]['element_id']==null)
                        {
                            debug::writeExport($this->type,$sid,Msg("id_not_defined"),'element',$rowid);
                            $elementInfo[$i]['element_id']="chain_select_".str_replace('xxx',$lang,$elementInfo[$i]['element_field']);
                        }
                        elseif($elementInfo[$i]['element_register']==null)
                        {
                            debug::writeExport($this->type,$sid,Msg("register_not_defined"),'element',$rowid);
                            $elementInfo[$i]['element_register']=str_replace('xxx',$lang,$elementInfo[$i]['element_field']);
                        }
                        $chains[$iChain][$iTier]=$rowid;
                    }
                }
            }
        }
        if($multipart)
        {
            $aProperties[]="'enctype'=>'multipart/form-data'";
        }
        else
        {
            $aProperties[]="'enctype'=>'application/x-www-form-urlencoded'";
        }

        if(sizeof($setEvents)>0)
        {
             $aProperties[]="'setByEvent'=>array(".implode(',',$setEvents).")";
        }
        $ap=array();
        $aa=array();
        $ae=array();
        $o[]='$button[\''.$sid.'\']=array();';
        $event_trigger=array();
        $events=array();
        for($i=0;$i<$n;$i++)
        {
            if($elementInfo[$i]['element_component']!='InputButton') continue;
            if($elementInfo[$i]['element_name']!==null)
            {
                $attribute_name=$elementInfo[$i]['element_name'];
            }
            elseif($elementInfo[$i]['element_action']!='fire_event')
            {
                $attribute_name=$elementInfo[$i]['element_action'];
            }
            else
            {
                $attribute_name=$elementInfo[$i]['element_event'];
            }
            $elementInfo[$i]['element_name']=$attribute_name;
            if($elementInfo[$i]['element_action']=='reset')
            {
                $elementInfo[$i]['element_type']='reset';
            }
            else
            {
                $elementInfo[$i]['element_type']='submit';
            }

            $op=array();
            $oa=array();
            $oe=array();
            $event='';
            if($elementInfo[$i]['element_extension']!=null)
            {
                $op[]="'extension'=>'{$elementInfo[$i]['element_extension']}'";
            }
            if($elementInfo[$i]['element_event']!=null)
            {
                $op[]="'event'=>'{$elementInfo[$i]['element_event']}'";
                $event_trigger[]="'".$attribute_name."'";
                $event=$elementInfo[$i]['element_event'];
            }
            elseif($attribute_name=='set_filter' or $attribute_name=='drop_filter')
            {
                $event='search';
            }
            elseif($attribute_name=='insert' or $attribute_name=='update' or $attribute_name=='remove' )
            {
                $event='done';
            }
            elseif($attribute_name=='seek')
            {
                $event='found';
            }
            if($event!='')
            {
                $events[]="'".$attribute_name."'=>'$event'" ;
            }
            if($elementInfo[$i]['element_confirm']!=null)
            {
                $v=addSingleQuoteSlashes(Msg($elementInfo[$i]['element_confirm']));
                $op[]="'confirm'=>'$v'";
            }
            foreach($e['InputButton'] as $parameter=>$a)
            {
                $fn='element_'.$parameter;
                $v= $obj->render($elementInfo[$i][$fn],$a,$parameter);
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
        if(sizeof($event_trigger)>0)
        {
            $v=implode(',',$event_trigger);
            $aProperties[]="'eventTrigger'=>array($v)";
        }
        if(sizeof($events)>0)
        {
            $v=implode(',',$events);
            $aProperties[]="'events'=>array($v)";
        }
        $joins=array();
        for($i=0;$i<$n;$i++)
        {
            if($elementInfo[$i]['element_component']!='ElementTableJoiner')
            {
                continue;
            }
            $op=array();
            foreach($e['ElementTableJoiner'] as $parameter=>$a)
            {
                $fn='element_'.$parameter;
                $v= $obj->render($elementInfo[$i][$fn],$a,$parameter);
                if($v===null) continue;
                $op[]=$v;
            }
            $op[]="'join'=>'left'";
            $op[]="'right_table'=>'{$elementInfo[$i]['element_table']}'";
            $op[]="'right_alias'=>'{$elementInfo[$i]['element_table_alias']}'" ;
            $op[]= "'right_primay_key'=>'{$elementInfo[$i]['element_field']}'" ;
            $joins[]="array(".implode(',',$op).')';
        }
        $v=implode(',',$joins);
        $aProperties[]="'joins'=>array($v)";
        $o[]=$an."['properties']=array(". implode(',',$aProperties).');';
        $o[]='$e[\''.$sid.'\']=array();';
        $ie=0;
        for($i=0;$i<$n;$i++)
        {
            $component=$elementInfo[$i]['element_component'];
            $rowid=$elementInfo[$i]['element_rowid'];
            if($component=='InputButton'or $elementInfo[$i]['element_component']=='ElementTableJoiner') continue;
            $type=$elementInfo[$i]['element_type'];
            $field=str_replace('xxx',$lang,$elementInfo[$i]['element_field']);
            $chain=$elementInfo[$i]['element_chain'];
            $tier=$elementInfo[$i]['element_tier'];
            if(null==$field)
            {
                debug::writeExport($this->type,$sid,Msg("field_not_defined"),$rowid);
                continue;
            }
            $op=array();
            $oa=array();
            $oe=array();
            $writeElement=false;
            $op[]="'table'=>'{$elementInfo[$i]['element_table']}'";
            $op[]="'rowid'=>'{$elementInfo[$i]['element_rowid']}'";
            if($elementInfo[$i]['element_event']!=null)
            {
                $op[]="'event'=>'{$elementInfo[$i]['element_event']}'";
            }
            if($elementInfo[$i]['element_extension']!=null)
            {
                $op[]="'extension'=>'{$elementInfo[$i]['element_extension']}'";
            }
            if(null!=$elementInfo[$i]['element_table_alias'])
            {
                $op[]="'table_alias'=>'{$elementInfo[$i]['element_table_alias']}'";
            }
            if($elementInfo[$i]['element_alias']!=null)
            {
                $op[]="'alias'=>'{$elementInfo[$i]['element_alias']}'";
            }
            $v=$this->getElementSid($elementInfo[$i]);
            $op[]="'sid'=>'$v'";

            $op[]="'fieldset'=>'{$elementInfo[$i]['element_fieldset']}'";
            $v=$this->getElementName($elementInfo[$i]);
            $op[]="'name'=>'$v'";
            if(null==$elementInfo[$i]['element_label'])
            {
                $v=str_replace("'","\\'",Msg($field));
            }
            else
            {
                $v=str_replace("'","\\'",Msg($elementInfo[$i]['element_label']));
            }
            $op[]="'label'=>'$v'";
            if($component=='InputCustom' and $elementInfo[$i]['element_renderer']==null)
            {
                debug::writeExport($this->type,$sid,Msg("renderer_is_null"),'element',$rowid);
                continue ;
            }
            if($component=='InputTextarea')
            {
                $op[]="'rows'=>'{$elementInfo[$i]['element_rows']}'";
            }
            elseif($component=='InputText' and $db->IsText($type))
            {
                if($elementInfo[$i]['element_trim']!=null)
                {
                    $op[]="'trim'=>'{$elementInfo[$i]['element_trim']}'";
                }
            }
            elseif($component=='InputSystem')
            {
                if($elementInfo[$i]['element_default']==null)
                {
                    debug::writeExport($this->type,$sid,Msg("default_value_is_null"),'element',$rowid);
                }
                else
                {
                    $v=addSingleQuoteSlashes($elementInfo[$i]['element_default']);
                    $op[]="'default_value'=>'$v'";
                }
            }
            $null_option='&nbsp;&nbsp;&nbsp;&nbsp;';
            $op[]="'component'=>'$component'";
            if($component=='SelectOneMenu' or $component=='SelectOneRadio' or $component=='SelectOneListbox'  )
            {
                if(null!=$elementInfo[$i]['element_null_option'])
                {
                    $null_option=Msg($elementInfo[$i]['element_null_option']);
                }
            }
            elseif($component=='InputForeignKey' )
            {
                $q="select field_primary_key from fgs_field where field_name='$field' and field_table='$table' and field_relation='master' and field_lookup is not null";
                $v=$db->value($q);
                if($v==null)
                {
                    debug::writeExport($this->type,$sid,Msg("foreign_key_not_found"),$rowid);
                }
                else
                {
                    $op[]="'foreign_key'=>'$v'";
                }
            }
            if($chain!==null)
            {
                $op[]="'chain'=>'$chain'";
                $op[]="'tier'=>'$tier'";

            }
            if($chain!==null)
            {
                $op[]="'chain_role'=>'{$elementInfo[$i]['element_chain_role']}'";
                if($elementInfo[$i]['element_chain_role']=='member')
                {
                    $writeElement=true;
                }
            }
            if(strpos($component,'Select')!==false)
            {
                if($chain!==null)
                {
                    $op[]="'id'=>'{$elementInfo[$i]['element_id']}'";
                    if($elementInfo[$i]['element_callback']===null)
                    {
                        $callback=0;
                    }
                    else
                    {
                        $callback="'{$elementInfo[$i]['element_callback']}'";
                    }
                    
                    if($elementInfo[$i]['element_before_request']===null)
                    {
                        $before_request=0;
                    }
                    else
                    {
                        $before_request="'{$elementInfo[$i]['element_before_request']}'";
                    }
                    if($elementInfo[$i]['element_after_request']===null)
                    {
                        $after_request=0;
                    }
                    else
                    {
                        $after_request="'{$elementInfo[$i]['element_after_request']}'";
                    }
                    if($tier===null)
                    {
                        debug::writeExport($this->type,$sid,Msg("tier_not_found"),'element',$rowid);
                    }
                    else
                    {
                        if($elementInfo[$i]['element_onchange']==null)
                        {
                            if($elementInfo[$i]['element_url']!=null)
                            {
                                $url=$elementInfo[$i]['element_url'];
                            }
                            else
                            {
                                $url='list.php';
                            }
                            $next_tier= $tier+1;
                            if($next_tier<sizeof($chains[$chain]))
                            {
                                $oe[]="onchange=loadOptions($chain,$tier,'$url','{$elementInfo[$i]['element_rowid']}',$callback,$before_request,$after_request)";
                            }
                        }
                        else
                        {
                            $oe[]="onchange={$elementInfo[$i]['element_url']}";
                        }
                    }
                }
            }
            if($elementInfo[$i]['element_autocomplete']!==null)
            {
                if($elementInfo[$i]['element_component']=='InputAutocomplete' or $elementInfo[$i]['element_component']=='InputMultiAutocomplete')
                {
                    $writeElement=true;
                    if($elementInfo[$i]['element_callback']!==null)
                    {
                        $op[]="'callback'=>{$elementInfo[$i]['element_callback']}";

                    }
                    if($elementInfo[$i]['element_search_field']!=null)
                    {
                        $search_field=str_replace(' ','',str_replace('xxx',$lang,$elementInfo[$i]['element_search_field']));
                        $op[]="'search_field'=>'$search_field'";
                    }
                    else
                    {
                        debug::writeExport($this->type,$sid,Msg("search_field_is_required"),'element',$rowid);
                    }
                    if($elementInfo[$i]['element_min_chars']!=null)
                    {
                        $op[]="'min_chars'=>{$elementInfo[$i]['element_min_chars']}";
                    }
                    else
                    {
                        debug::writeExport($this->type,$sid,Msg("min_chars_is_required"),'element',$rowid);
                    }
                    if($elementInfo[$i]['element_max_options']!=null)
                    {
                        $op[]="'max_options'=>{$elementInfo[$i]['element_max_options']}";
                    }
                    else
                    {
                        debug::writeExport($this->type,$sid,Msg("max_options_is_required"),'element',$rowid);
                    }

                    if($elementInfo[$i]['element_before_request']!==null)
                    {
                        $op[]="'before_request'=>{$elementInfo[$i]['element_before_request']}";
                    }
                    if($elementInfo[$i]['element_after_request']!==null)
                    {
                        $op[]="'after_request'=>{$elementInfo[$i]['element_after_request']}";
                    }
                    $op[]="'renderer'=>'autocomplete'";
                    $nAutocomplete=(int)$elementInfo[$i]['element_autocomplete'];
                    $op[]="'autocomplete'=>$nAutocomplete";
                    if($elementInfo[$i]['element_id']==null)
                    {
                        $v=$elementInfo[$i]['element_id'];
                    }
                    else
                    {
                        $v=$field.'_id';
                    }
                    $op[]="'id'=>'$v'";
                }
                else
                {
                    $args=array();
                    $args['export_type']="array";
                    $args['export_delimiter']=",";
                    $args['export_value_type']="number";
                    $v= $obj->render($elementInfo[$i]['element_autocomplete'],$a,'autocomplete');
                    $op[]=$v;
                }
            }
            elseif($elementInfo[$i]['element_component']=='InputAutocomplete' or $elementInfo[$i]['element_component']=='InputMultiAutocomplete')
            {
                debug::writeExport($this->type,$sid,Msg("autocomplete_not_defined"),'element',$rowid);
            }
            if(1==$elementInfo[$i]['element_hidden'])
            {
                $op[]="'hidden'=>1";
            }

            foreach($e[$component] as $parameter=>$a)
            {
                $fn='element_'.$parameter;
                if($parameter=='list' )
                {
                    if(null!=$elementInfo[$i]['element_filter'])
                    {
                        $a['filter']= $elementInfo[$i]['element_filter'];
                    }
                    $op[]="'list_sid'=>'{$elementInfo[$i]['element_list']}'";
                    $li=$registry->get('export','export','list_info');
                    if($component=='SelectOneMenu' or $component=='SelectOneListbox')
                    {
                        if($li['list_null_option']!=null)
                        {
                            $null_option=Msg($li['list_null_option']);
                        }
                        $op[]="'null_option'=>array(''=>'$null_option')";
                    }
                    if($component!='InputAutocomplete' or $component!='InputMultiAutocomplete')
                    {
                        if($table==$li['list_table'])
                        {
                            $op[]="'listDrop'=>1";
                        }
                    }
                }
                $v= $obj->render($elementInfo[$i][$fn],$a,$parameter);
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
            //export validators
            if(null!=$elementInfo[$i]['element_alias'])
            {
                $key=$elementInfo[$i]['element_alias'];
            }
            else
            {
                $key=$elementInfo[$i]['element_field'];
            }
            //export of validators
            $outv=array();

            for($iv=0;$iv<$nvalidators;$iv++)
            {
                if($validators[$iv]['validator_field']==$key)
                {
                    $export_validator=$obj->export_validator($validators[$iv]);
                    if($export_validator===0)
                    {
                         continue;
                    }
                    else
                    {
                         $outv[]="array($export_validator)";
                    }
                }
            }
            if(sizeof($outv)>0)
            {
                $v=implode(',',$outv);
                $op[]="'validators'=>array($v)";
            }
            $outv=array();
            for($iv=0;$iv<$nfilters;$iv++)
            {
                if($filters[$iv]['filter_field']==$key)
                {
                    $export_filter=$obj->export_filter($filters[$iv]);
                    if($export_filter===0)
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
            $o[]='$e[\''.$sid.'\']['.$ie.']=array('.implode(',',$op).');';
            if($writeElement)
            {
                $sr=array();
                for($ir=0;$ir<$nRoles;$ir++)
                {
                    if($aRoles[$ir]!='')
                    {
                        $aBuf=explode(',',$aRoles[$ir]);
                    }
                    $sr=array_merge($sr,$aBuf);
                }

                if(sizeof($sr)>0)
                {
                    $sr = array_unique($sr);
                    $acl=implode(',',$sr);
                    $op[]="'acl'=>array('users'=>array(),'roles'=>array($acl))";
                }
                else
                {
                    $op[]="'acl'=>array('users'=>array(),'roles'=>array())";
                }
                $file=$element_path.$rowid.".php";
                if (!$ihandle = fopen($file, 'wb'))
                {
                    debug::writeExport($this->type,$sid,Msg("cannot_open_file").':'.$file);
                }
                else
                {
                    $buf='<?php $e[\''.$rowid.'\']=array('.implode(',',$op).');';
                    if (!fwrite($ihandle,$buf,1000000))
                    {
                        debug::writeExport($this->type,$sid,Msg("cannot_write").':'.$file);
                    }
                    fclose($ihandle);
                }
            }
            $ie++;
        }
        if (!fwrite($handle,implode("\n",$o),1000000))
        {
            debug::writeExport($this->type,$sid,Msg("cannot_write").':'.$file);
        }
        if(sizeof($obj->err)>0)
        {
            $this->err=array_merge($this->err,$obj->err);
        }
    }
    function getElementSid($a)
    {
        if(null==$a['element_sid'])
        {
            return $a['element_field'];
        }
        else
        {
            return $a['element_sid'];
        }
    }
    function getElementName($a)
    {
        if(null==$a['element_name'])
        {
            return $a['element_field'];
        }
        else
        {
            return $a['element_name'];
        }
    }
}

