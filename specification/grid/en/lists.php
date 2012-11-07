<?php
$grid['lists']=array();
$selector['lists']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['lists']['properties']=array('table'=>'fgs_list','system'=>1,'primary_key'=>array('list_sid'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'fkr'=>array('list_table'=>'table_name'),'title'=>'lists','joins'=>array(),'save'=>array('list_table','list_system'),'sort'=>array('list_sid'=>'list_sid','list_table'=>'list_table','list_where'=>'list_where','list_dataset'=>'list_dataset','list_export'=>'list_export','list_system'=>'list_system'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array('list_system'=>'system'),'select'=>'t.list_sid,t.list_table,t.list_where,t.list_dataset,t.list_export,t.list_system','from'=>'fgs_list t ');
$grid['lists']['initial']=array('pagesize'=>30,'direction'=>'ASC','order'=>'list_sid','offset'=>0);
$grid['lists']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk','foreign_key','adk');
$ra['lists']=array();
$ra['lists'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Edit" ></a>');
$ra['lists'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Remove" ></a>');
$ra['lists'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Copy" ></a>');
$ra['lists'][]=array('load'=>false,'action'=>'detail','renderer'=>'RowAction','immediate'=>0,'condition'=>array('error'=>'wrong_value','break_onfailure'=>0,'statement'=>array(array('operand1'=>'&arg list_table','operand2'=>'fgs_option','connector'=>'and','operator'=>'equal','failure'=>'0','group'=>''))),'view'=>'<a href="%3$s&amp;detail=%1$d&amp;key=%2$s" class="icon_details" title="Detail" ></a>');
$rsa['lists']=array();
$rsa['lists'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['lists'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['lists']=array();
$column['lists'][0]=array('rowid'=>229,'component'=>'ColumnText','header'=>'Sid','sid'=>'list_sid','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'list_sid','hidden'=>'0','calculate'=>'0');
$column['lists'][1]=array('rowid'=>231,'save'=>'1','component'=>'ColumnText','header'=>'Table','sid'=>'list_table','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'list_table','hidden'=>'0','calculate'=>'0');
$column['lists'][2]=array('rowid'=>5663,'component'=>'ColumnText','header'=>'Filter','sid'=>'list_where','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'list_where','hidden'=>'0','calculate'=>'0');
$column['lists'][3]=array('rowid'=>5662,'component'=>'ColumnLink','header'=>'Dataset','sid'=>'list_dataset','hidden'=>'0','calculate'=>'0','renderer'=>'ListDatasetLink','field'=>'list_dataset','type'=>'varchar');
$column['lists'][4]=array('rowid'=>233,'component'=>'ColumnLookup','header'=>'Export ?','sid'=>'list_export','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'field'=>'list_export','hidden'=>'0','type'=>'tinyint','align'=>'center','list_sid'=>'YesNo','renderer'=>'option');
$column['lists'][5]=array('rowid'=>232,'save'=>'1','register'=>'system','component'=>'ColumnLookup','header'=>'System ?','sid'=>'list_system','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'field'=>'list_system','hidden'=>'0','type'=>'tinyint','align'=>'left','list_sid'=>'YesNo','renderer'=>'option');
$button['lists']=array();