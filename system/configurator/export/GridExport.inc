<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class GridExport extends ConfigExport
{
    public $type='grid';
    function export($sid,$handle,$e)
    {
        global $icon_class,$registry,$db;
        $column_path=SYSTEM_COLUMN_PATH;
        $lang=$registry->get('export','export','language') ;
        $session=array();
        $session[]="'pagesize'";
        $session[]="'direction'";
        $session[]="'order'";
        $session[]="'offset'";
        $session[]="'total'";
        $session[]="'multimode_hide'";
        $session[]="'display'";
        $session[]="'hide'";
        $session[]="'apk'";
        $obj=new Export();
        ///get ACL for this grid
        $aRoles=array();
        $q="select c.controller_roles from fgs_unit t left join fgs_controller c on t.unit_controller=c.controller_sid where unit_grid='$sid'";
        $nRoles=$db->set($q,$aRoles,'controller_roles');
        ////
        $gridInfo=array();
        $q="select * from fgs_grid where grid_sid='$sid'";
        if(!$db->record($q,$gridInfo))
        {
            debug::writeExport($this->type,$sid,Msg("grid_not_found"));
            return;
        }
        $table=$gridInfo['grid_table'];
        $tableInfo=array();
        $q="select * from fgs_table where table_name='$table'";
        if(!$db->record($q,$tableInfo))
        {
            debug::writeExport($this->type,$sid,$table.':'.Msg("table_not_found"));
            return false;
        }
        $o=array();
        $an='$'."grid['$sid']";
        $o[]='<?php';
        $o[]=$an.'=array();';
        $aProperties=array();
        $v=$obj->export_array($tableInfo['table_primary_key'],array('export_type'=>'array','export_delimiter'=>',','export_value_type'=>'string'));
        $aProperties[]="'table'=>'$table'";
        $aProperties[]="'system'=>{$gridInfo['grid_system']}";
        $aProperties[]="'primary_key'=>$v";
        $aProperties[]="'modal'=>{$gridInfo['grid_modal']}";
        $aProperties[]="'user_order'=>{$gridInfo['grid_user_order']}";
        $aProperties[]="'user_pagesize'=>{$gridInfo['grid_user_pagesize']}";
        $aProperties[]="'user_offset'=>{$gridInfo['grid_user_offset']}";
        $inline_edit=$gridInfo['grid_inline_edit'];
        $aProperties[]="'inline_edit'=>$inline_edit";
        if($gridInfo['grid_headerspan']!=null and $gridInfo['grid_headerspan']>1)
        {
            $aProperties[]="'headerspan'=>{$gridInfo['grid_headerspan']}";
        }
        $q="select * from fgs_field where field_table='$table' and field_lookup is not null and field_relation='master'";
        $fkr=array();
        if($db->record($q,$fkr))
        {
            $aProperties[]="'fkr'=>array('{$fkr['field_name']}'=>'{$fkr['field_primary_key']}')";
            $session[]="'foreign_key'";
        }
        $aProperties[]="'title'=>'{$gridInfo['grid_title']}'";
        $components=array();
        $q="select component_sid,component_renderer from fgs_component where component_renderer is not null";
        $db->set($q,$components,'component_sid','component_renderer');
        $d=array();
        $q="select * from fgs_column where column_index>0 and  column_grid='$sid' order by column_index  ASC";
        $n=$db->set($q,$d);
        $multipart=false;
        $register=array();
        $save=array();
        $sort=array();
        $sort_prefix=array();
        $sort_suffix=array();
        $ra=array();
        $rsa=array();
        $button=array();
        $column=array();
        $ic=0;
        $join_list=array();
        $field_lookup=array();
        $a=explode(' ',$tableInfo['table_primary_key']);
        foreach($a as $k)
        {
            $field_lookup[]='t.'.$k;
        }
        $current_alias=1;
        $setList=array();
        $joins=array();

        for($i=0;$i<$n;$i++)
        {
            $component=$d[$i]['column_component'];
            $cid=$d[$i]['column_rowid'];
            $rowid=$d[$i]['column_rowid'];
            $column_field=str_replace('xxx',$lang,$d[$i]['column_field']);
            if($d[$i]['column_renderer']!=null)
            {
                $renderer=$d[$i]['column_renderer'];
            }
            elseif( array_key_exists($component,$components))
            {
                $renderer=$components[$component];
            }
            $action=$d[$i]['column_action'];
            $name=$d[$i]['column_name'];
            $icon=$d[$i]['column_file'];
            $immediate=$d[$i]['column_immediate'];
            $op=array();
            $oa=array();
            $oe=array();
            $op[]="'rowid'=>$rowid";
            if($component=='RowAction')
            {
                if(null!=$d[$i]['column_field'])
                {
                    $fld=",'field'=>'$column_field'";
                }
                else
                {
                    $fld='';
                }
                if(null==$renderer)
                {
                    $renderer='RowAction';
                }
                if($d[$i]['column_condition']!=null)
                {
                    $condition=$obj->export_condition($d[$i],'condition');
                    if($condition===0)
                    {
                        continue;
                    }
                    else
                    {
                        $cond="'condition'=>array($condition),";
                    }
                }
                else
                {
                    $cond='';
                }
                if(null==$action)
                {
                    debug::writeExport($this->type,$sid,Msg("action_not_defined"),$component,$cid);
                }
                else
                {
                    if($name!=null)
                    {
                        $alt=Msg($name);
                    }
                    else
                    {
                        $alt=Msg($action);
                    }
                    if($immediate==1 and $d[$i]['column_confirm']!=null)
                    {
                        $confirm_msg=Msg($d[$i]['column_confirm']);
                        $onclick="onclick=\"if (confirm('{$confirm_msg}')) {location.href ='%3\$s&amp;$action=%1\$d&amp;key=%2\$s'} return false;\"" ;
                        $onclick=addSingleQuoteSlashes($onclick);
                    }
                    else
                    {
                        $onclick='';
                    }
                    if(in_array($icon,$icon_class))
                    {
                        $ra[]='$ra'."['$sid'][]=array('load'=>false,'action'=>'$action','renderer'=>'$renderer','immediate'=>$immediate,$cond'view'=>'<a href=\"%3\$s&amp;$action=%1\$d&amp;key=%2\$s\" class=\"$icon\" title=\"$alt\" $onclick></a>'$fld);";
                    }
                    else
                    {
                        $ra[]='$ra'."['$sid'][]=array('load'=>false,'action'=>'$action','renderer'=>'$renderer','immediate'=>$immediate,$cond'view'=>'<a href=\"%3\$s&amp;$action=%1\$d&amp;key=%2\$s\" $onclick><img class=\"icon\" width=\"16\" height=\"16\" border=0 src=\"image/$icon\" alt=\"$alt\" title=\"$alt\" /></a>'$fld);";
                    }
                }
            }
            elseif($component=='RowSetAction')
            {
                if(null==$renderer)
                {
                    $renderer='RowSetAction';
                }
                if(null==$name)
                {
                    debug::writeExport($this->type,$sid,Msg("name_not_defined"),$component,$cid);
                }
                if(null==$action)
                {
                    $alt=Msg($name);
                    $action=$name;
                }
                else
                {
                    $alt=Msg($action);
                }
                if($d[$i]['column_condition']!=null)
                {
                    $condition=$obj->export_condition($d[$i],'condition');
                    if($condition===0)
                    {
                        continue;
                    }
                    else
                    {
                        $cond="'condition'=>array($condition),";
                    }
                }
                else
                {
                    $cond='';
                }
                if($d[$i]['column_confirm']!=null)
                {
                     $confirm_msg=Msg($d[$i]['column_confirm']);
                     $onclick="onclick=\"fgsSetConfirmSubmitMsg('$confirm_msg');\"";
                     $onclick=addSingleQuoteSlashes($onclick);
                }
                else
                {
                    $onclick='';
                }
                if(in_array($icon,$icon_class))
                {
                    $rsa[]='$rsa'."['$sid'][]=array('action'=>'$action','renderer'=>'$renderer','immediate'=>$immediate,$cond'view'=>'<button type=\"submit\" name=\"$name\"  title=\"$alt\" $onclick><span style=\"margin:0 -5px -3px -0px;\" class=\"$icon\"></span></button>');";
                }
                else
                {
                    $rsa[]='$rsa'."['$sid'][]=array('action'=>'$action','renderer'=>'$renderer','immediate'=>$immediate,$cond'view'=>'<button type=\"submit\" name=\"$name\"  title=\"$alt\" $onclick><img src=\"image/$icon\" title=\"$alt\" alt=\"$alt\" width=\"16\" height=\"16\"></button>');";
                }
            }
            elseif($component=='RowSelector')
            {
                if(null==$renderer)
                {
                    $renderer='selector';
                }
                if(null==$column_field)
                {
                    $column_field='selectrow';
                }
                $o[]='$'."selector['$sid']=array('field'=>'$column_field','renderer'=>'$renderer','view'=>".'"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"'.$column_field.'[%1\$d]\" id=\"id_'.$column_field.'_%1\$d\" value=\"%2\$s\">");';
            }
            elseif($component=='GridButton')
            {
                if(null==$renderer)
                {
                    $renderer='button';
                }
                $op[]="'type'=>'submit'";
                $op[]="'renderer'=>'$renderer'";
                $op[]="'name'=>'{$d[$i]['column_name']}'";
                if($d[$i]['column_event']!=null)
                {
                    $op[]="'event'=>'{$d[$i]['column_event']}'";
                }
                if($d[$i]['column_condition']!=null)
                {
                    $condition=$obj->export_condition($d[$i]);
                    if($condition!==0)
                    {
                        $op[]="'condition'=>array($condition)";
                    }
                }
                if($d[$i]['column_confirm']!=null)
                {
                    $v=addSingleQuoteSlashes(Msg($d[$i]['column_confirm']));
                    $op[]="'confirm'=>'$v'";
                }
                if($d[$i]['column_value']!=null)
                {
                    $v=Msg($d[$i]['column_value']);
                }
                elseif($d[$i]['column_action']!=null)
                {
                    $op[]="'action'=>'{$d[$i]['column_action']}'";
                    $v=Msg($d[$i]['column_action']);
                }
                else
                {
                    $v=Msg($d[$i]['column_name']);
                    $op[]="'action'=>'{$d[$i]['column_name']}'";
                }
                if($d[$i]['column_events']!=null)
                {
                    $op[]="'events'=>\"{$d[$i]['column_events']}\"";
                }
                else
                {
                    $op[]="'events'=>''";
                }
                if($d[$i]['column_attributes']!=null)
                {
                    $op[]="'attributes'=>\"{$d[$i]['column_attributes']}\"";
                }
                else
                {
                    $op[]="'attributes'=>''";
                }
                $op[]="'value'=>'$v'";
                $v=implode(',',$op);
                $button[]='$'."button['$sid'][]=array($v);";
            }
            else
            {
                $cid=$this->getColumnSid($d[$i]);
                if($column_field==null)
                {
                    debug::writeExport($this->type,$sid,Msg("field_not_defined"),$component,$cid);
                    continue;
                }
                if($d[$i]['column_alias']!=null)
                {
                    $field_alias=' '.$d[$i]['column_alias'];
                    $op[]="'alias'=>'{$d[$i]['column_alias']}'";
                }
                elseif($d[$i]['column_function']!=null)
                {
                    $field_alias=' '.$column_field;
                }
                else
                {
                    $field_alias='';
                }
                if(strpos($column_field,'.')!==false)
                {
                    $table_alias='';
                }
                else
                {
                    if($d[$i]['column_table']==$table)
                    {
                        $table_alias='t';
                    }
                    else
                    {
                        $table_alias=$d[$i]['column_table_alias'];
                    }
                }
                if($d[$i]['column_component']=='ColumnTableJoiner')
                {
                    $oj=array();
                    foreach($e['ColumnTableJoiner'] as $parameter=>$a)
                    {
                        $fn='column_'.$parameter;
                        $v= $obj->render($d[$i][$fn],$a,$parameter);
                        if($v===null) continue;
                        $oj[]=$v;
                    }
                    $oj[]="'right_table'=>'{$d[$i]['column_table']}'";
                    $oj[]="'right_alias'=>'{$d[$i]['column_table_alias']}'" ;
                    $oj[]= "'right_primay_key'=>'$column_field'" ;
                    $joins[]="array(".implode(',',$oj).')';
                    continue;
                }
                if($d[$i]['column_component']=='ColumnInputText' or $d[$i]['column_component']=='ColumnSelectOneMenu' )
                {
                    $v=$this->getColumnName($d[$i]);
                    $op[]="'table'=>'{$d[$i]['column_table']}'";
                    $op[]="'name'=>'$v'";
                    $op[]="'inline_edit'=>$inline_edit";
                    if($d[$i]['column_attributes']!=null)
                    {
                        $op[]="'attributes'=>\"{$d[$i]['column_attributes']}\"";
                    }
                    else
                    {
                        $op[]="'attributes'=>''";
                    }
                    if($d[$i]['column_component']=='ColumnInputText')
                    {
                        $op[]="'size'=>'{$d[$i]['column_size']}'";
                        $op[]="'maxlength'=>'{$d[$i]['column_maxlength']}'";
                        if($d[$i]['column_condition']!=null)
                        {
                            $condition=$obj->export_condition($d[$i]);
                            if($condition!==0)
                            {
                                $op[]="'condition'=>array($condition)";
                            }
                        }
                        if($inline_edit)
                        {
                            $op[]="'renderer'=>'text'";
                        }
                        else
                        {
                            $op[]="'renderer'=>'InputText'";
                        }
                    }
                    if($d[$i]['column_component']=='ColumnSelectOneMenu' and !$inline_edit)
                    {
                        $op[]="'renderer'=>'OneMenu'";
                    }
                    if($d[$i]['column_events']!=null)
                    {
                        $events="'events'=>'{$d[$i]['column_events']}' ";
                    }
                    else
                    {
                        $events='';
                    }
                    if($inline_edit)
                    {
                        if($d[$i]['column_onclick']!=null)
                        {
                            $op[]="'onclick'='{$d[$i]['column_onclick']}'";
                        }
                        else
                        {
                            $op[]="'onclick'=>'inlineEdit'";
                        }
                    }
                    else
                    {
                        if($d[$i]['column_onkeypress']!=null)
                        {
                            $op[]="'events'=\"$events onkeypress='{$d[$i]['column_onkeypress']}'\"";
                        }
                        else
                        {
                            $op[]="'events'=>\"$events onkeypress='preventEnter(event)'\"";
                        }
                    }
                    $op[]="'required'=>{$d[$i]['column_required']}";
                }

                if($d[$i]['column_function']!=null)
                {
                    if($table_alias!='')
                    {
                        $add_field=$d[$i]['column_function'].'('.$table_alias.'.'.$column_field.')'.$field_alias ;
                    }
                    else
                    {
                        $add_field=$d[$i]['column_function'].'('.$column_field.')'.$field_alias ;
                    }
                }
                else
                {
                    if($table_alias!='')
                    {
                        $add_field=$table_alias.'.'.$column_field.$field_alias;
                    }
                    else
                    {
                        $add_field=$column_field.$field_alias;
                    }
                }
                if(!in_array($add_field,$field_lookup))
                {
                    $field_lookup[]=$add_field;
                }
                if($d[$i]['column_save'])
                {
                    if($d[$i]['column_alias']==null)
                    {
                        $save[]="'$column_field'";
                    }
                    else
                    {
                        $save[]="'{$d[$i]['column_alias']}'";
                    }
                    $op[]="'save'=>'{$d[$i]['column_save']}'";
                }
                if($d[$i]['column_register']!=null)
                {
                    $op[]="'register'=>'{$d[$i]['column_register']}'";
                    if($d[$i]['column_alias']!=null)
                    {
                        $register[]="'{$d[$i]['column_alias']}'=>'{$d[$i]['column_register']}'";
                    }
                    else
                    {
                        $register[]="'{$column_field}'=>'{$d[$i]['column_register']}'";
                    }

                }
                if( $d[$i]['column_sort']!=null and  $d[$i]['column_sort']!='0')
                {
                    if($d[$i]['column_sort']=='1')
                    {
                        $sort[]="'$cid'=>'$column_field'";
                    }
                    else
                    {
                        $sort[]="'$cid'=>'{$d[$i]['column_sort']}'";
                    }
                    if( $d[$i]['column_sort_prefix']!=null)
                    {
                        $sort_prefix[]="'$cid'=>'{$d[$i]['column_sort_prefix']}'";
                    }
                    if( $d[$i]['column_sort_suffix']!=null)
                    {
                        $sort_suffix[]="'$cid'=>'{$d[$i]['column_sort_suffix']}'";
                    }
                }
                if($d[$i]['column_header']==null)
                {
                    $v=str_replace("'","\\'",Msg($column_field));
                }
                else
                {
                    if(substr($d[$i]['column_header'],0,1)=='@')
                    {
                        $v=$d[$i]['column_header'];
                    }
                    else
                    {
                        $v=str_replace("'","\\'",Msg($d[$i]['column_header']));
                    }
                }
                $op[]="'component'=>'$component'";
                $op[]="'header'=>'$v'";
                $op[]="'sid'=>'$cid'";
                $op[]="'hidden'=>'{$d[$i]['column_hidden']}'";
                if($component=='ColumnLookup')
                {
                    $registry->set('export','export','fgs_option',false);
                    $registry->set('export','export','list_info',null);
                    $op[]="'join_lookup'=>{$d[$i]['column_join_lookup']}";
                }
                foreach($e[$component] as $parameter=>$a)
                {
                    if($parameter=='list' and ($component=='ColumnInputText' or $component=='ColumnSelectOneMenu'))
                    {
                        if(null!=$d[$i]['column_filter'])
                        {
                            $a['filter']= $d[$i]['column_filter'];
                        }
                    }
                    $v= $obj->render($d[$i]['column_'.$parameter],$a,$parameter);
                    if($v===null)
                    {
                        continue;
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
                if($component=='ColumnLookup' or ($component=='ColumnSelectOneMenu' and $inline_edit))
                {
                    //set renderer
                    $op[]="'list_sid'=>'{$d[$i]['column_list']}'";
                    $fgs_option=$registry->get('export','export','fgs_option');
                    $li=$registry->get('export','export','list_info');
                    if($d[$i]['column_relation']==1)
                    {
                        $renderer='set';
                        if(!$fgs_option)
                        {
                            $setList[]="'$cid'=>'$column_field'";
                        }
                    }
                    elseif($fgs_option)
                    {
                        $renderer='option';
                    }
                    elseif($li!==null)
                    {
                        if($li['list_field_alias']==null)
                        {
                            $v=str_replace('xxx',$lang,$li['list_display_field']);
                            $field_alias='';
                        }
                        else
                        {
                            $v= $li['list_field_alias'];
                            $field_alias=' '.$v;
                        }
                        $op[]="'lookup'=>'$v'";
                        $left_table=array('table'=>$table,'alias'=>'t','key'=>$column_field);
                        if(isset($li['list_table_alias']))
                        {
                            $table_alias=$li['list_table_alias'];
                        }
                        else
                        {
                            $table_alias='t'.$current_alias;
                            $current_alias++;
                        }
                        $oj=array();
                        $oj[]="'join'=>'left'";
                        $oj[]="'left_table'=>'$table'";
                        $oj[]="'left_alias'=>'t'" ;
                        $oj[]= "'left_foreign_key'=>'$column_field'";
                        $oj[]="'right_table'=>'{$li['list_table']}'";
                        $oj[]="'right_alias'=>'$table_alias'";
                        $oj[]= "'right_primay_key'=>'{$li['list_primary_key']}'" ;
                        if($d[$i]['column_join_lookup']==0)
                        {
                            $renderer='option';
                            if($li['list_large'])
                            {
                                $setList[]="'$cid'=>'$column_field'";
                            }
                            $oj[]= "'required'=>0" ;
                        }
                        else
                        {
                            $renderer='lookup';
                            $oj[]= "'required'=>1" ;
                            $add_field=$table_alias.'.'.str_replace('xxx',$lang,$li['list_display_field']).$field_alias;
                            if(!in_array($add_field,$field_lookup))
                            {
                                $field_lookup[]=$add_field;
                            }
                        }
                        $v=implode(',',$oj);
                        $joins[]="array($v)";
                    }
                    $op[]="'renderer'=>'$renderer'";
                }

                $column[]='$'."column['$sid'][$ic]=array(".implode(',',$op).');';
                ////////////
                if(($component=='ColumnInputText' or $component=='ColumnSelectOneMenu'))
                {
                    ////////////
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
                    //////////////
                    $file=$column_path.$rowid.".php";
                    if (!$ihandle = fopen($file, 'wb'))
                    {
                        debug::writeExport($this->type,$sid,Msg("cannot_open_file").':'.$file);
                    }
                    else
                    {
                        $buf='<?php $column[\''.$rowid.'\']=array('.implode(',',$op).');';
                        if (!fwrite($ihandle,$buf,1000000))
                        {
                            debug::writeExport($this->type,$sid,Msg("cannot_write").':'.$file);
                        }
                        fclose($ihandle);

                    }
                }
                /////////////
                $ic++;
            }
        }

        $v=implode(',',$joins);
        $aProperties[]="'joins'=>array($v)";
        $v=implode(',',$save);
        $aProperties[]="'save'=>array($v)";
        $v=implode(',',$sort);
        $aProperties[]="'sort'=>array($v)";
        $v=implode(',',$sort_prefix);
        $aProperties[]="'sort_prefix'=>array($v)";
        $v=implode(',',$sort_suffix);
        $aProperties[]="'sort_suffix'=>array($v)";
        $v=implode(',',$register);
        $aProperties[]="'register'=>array($v)";
        $from=$table." t ";
        if(sizeof($join_list)>0)
        {
            $from.=implode(' ',$join_list);
        }
        $select=implode(',',$field_lookup);
        $aProperties[]="'select'=>'$select'";
        $aProperties[]="'from'=>'$from'";
        if(sizeof($setList)>0)
        {
            $v=implode(',',$setList);
            $aProperties[]="'set_lists'=>array($v)";
        }
        $o[]=$an."['properties']=array(". implode(',',$aProperties).');';
        $ov=array();
        if($gridInfo['grid_pagesize']==null)
        {
            $ps=20;
        }
        else
        {
            $ps=$gridInfo['grid_pagesize'];
        }
        if($gridInfo['grid_direction']==null)
        {
            $dir='ASC';
        }
        else
        {
            $dir=$gridInfo['grid_direction'];
        }
        if($gridInfo['grid_order']==null)
        {
            $order='';
        }
        else
        {
            $order=$gridInfo['grid_order'];
        }
        if($gridInfo['grid_initial']!=null)
        {
            $o[]=$an."['initial']=array('pagesize'=>$ps,'direction'=>'$dir','order'=>'$order','offset'=>0,{$gridInfo['grid_initial']});";
        }
        else
        {
            $o[]=$an."['initial']=array('pagesize'=>$ps,'direction'=>'$dir','order'=>'$order','offset'=>0);";
        }
        if(sizeof($save)>0)
        {
            $session[]="'adk'";
        }
        $v=implode(',',$session);
        $o[]=$an."['session']=array($v);";
        $o[]='$ra[\''.$sid.'\']=array();';
        foreach($ra as $aa)
        {
            $o[]=$aa;
        }
        $o[]='$rsa[\''.$sid.'\']=array();';

        foreach($rsa as $aaa)
        {
            $o[]=$aaa;
        }
        $o[]='$column[\''.$sid.'\']=array();';
        foreach($column as $ca)
        {
            $o[]=$ca;
        }
        $o[]='$button[\''.$sid.'\']=array();';
        foreach($button as $b)
        {
            $o[]=$b;
        }

        if (!fwrite($handle,implode("\n",$o),1000000))
        {
            debug::writeExport($this->type,$sid,Msg("cannot_write"));
        }
    }
    function getColumnSid($a)
    {
        global $lang;
        if(null==$a['column_sid'])
        {
            return str_replace('xxx',$lang,$a['column_field']);
        }
        else
        {
            return $a['column_sid'];
        }
    }

    function getColumnName($a)
    {
        global $lang;
        if(null==$a['column_name'])
        {
            return str_replace('xxx',$lang,$a['column_field']);
        }
        else
        {
            return $a['column_name'];
        }
    }
}

