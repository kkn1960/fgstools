<?php
$grid['conditions']=array();
$selector['conditions']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['conditions']['properties']=array('table'=>'fgs_condition','system'=>1,'primary_key'=>array('condition_sid'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'title'=>'conditions','joins'=>array(),'save'=>array(),'sort'=>array('condition_sid'=>'condition_sid','condition_type'=>'condition_type','condition_error'=>'condition_error'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.condition_sid,t.condition_type,t.condition_error','from'=>'fgs_condition t ');
$grid['conditions']['initial']=array('pagesize'=>20,'direction'=>'ASC','order'=>'condition_sid','offset'=>0);
$grid['conditions']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk');
$ra['conditions']=array();
$ra['conditions'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Edit" ></a>');
$ra['conditions'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Remove" ></a>');
$ra['conditions'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Copy" ></a>');
$ra['conditions'][]=array('load'=>false,'action'=>'detail','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;detail=%1$d&amp;key=%2$s" class="icon_details" title="Detail" ></a>');
$rsa['conditions']=array();
$rsa['conditions'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['conditions'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['conditions']=array();
$column['conditions'][0]=array('rowid'=>5681,'component'=>'ColumnText','header'=>'Sid','sid'=>'condition_sid','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'condition_sid','hidden'=>'0','calculate'=>'0');
$column['conditions'][1]=array('rowid'=>5731,'component'=>'ColumnLookup','header'=>'Type','sid'=>'condition_type','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('common'=>'common condition','input'=>'input condition','row'=>'row condition')),'field'=>'condition_type','hidden'=>'0','type'=>'varchar','list_sid'=>'ConditionType','renderer'=>'option');
$column['conditions'][2]=array('rowid'=>5732,'component'=>'ColumnText','header'=>'Error','sid'=>'condition_error','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'condition_error','hidden'=>'0','calculate'=>'0');
$button['conditions']=array();