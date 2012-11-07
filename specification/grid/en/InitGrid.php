<?php
$grid['InitGrid']=array();
$selector['InitGrid']=array('field'=>'select','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"select[%1\$d]\" id=\"id_select_%1\$d\" value=\"%2\$s\">");
$grid['InitGrid']['properties']=array('table'=>'fgs_field','system'=>1,'primary_key'=>array('field_table','field_name'),'modal'=>1,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'fkr'=>array('field_table'=>'table_name'),'title'=>'SelectGridColumns','joins'=>array(),'save'=>array('field_type','field_column','field_label','field_list','field_align'),'sort'=>array('field_name'=>'field_name'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.field_table,field_name,t.field_name,t.field_type,t.field_column,t.field_label,t.field_list,t.field_align','from'=>'fgs_field t ');
$grid['InitGrid']['initial']=array('pagesize'=>100,'direction'=>'ASC','order'=>'field_name','offset'=>0);
$grid['InitGrid']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk','foreign_key','adk');
$ra['InitGrid']=array();
$rsa['InitGrid']=array();
$rsa['InitGrid'][]=array('action'=>'init_detail','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="init_detail"  title="Add fields" ><span style="margin:0 -5px -3px -0px;" class="icon_add"></span></button>');
$column['InitGrid']=array();
$column['InitGrid'][0]=array('rowid'=>193,'component'=>'ColumnLink','header'=>'Field name','sid'=>'field_name','hidden'=>'0','calculate'=>'0','renderer'=>'FieldLink','field'=>'field_name','type'=>'varchar');
$column['InitGrid'][1]=array('rowid'=>195,'save'=>'1','component'=>'ColumnText','header'=>'Type','sid'=>'field_type','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'field_type','hidden'=>'0','calculate'=>'0');
$column['InitGrid'][2]=array('rowid'=>194,'save'=>'1','component'=>'ColumnText','header'=>'Column component','sid'=>'field_column','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'field_column','hidden'=>'0','calculate'=>'0');
$column['InitGrid'][3]=array('rowid'=>197,'save'=>'1','component'=>'ColumnText','header'=>'Header','sid'=>'field_label','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'field_label','hidden'=>'0','calculate'=>'0');
$column['InitGrid'][4]=array('rowid'=>196,'save'=>'1','component'=>'ColumnText','header'=>'List','sid'=>'field_list','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'field_list','hidden'=>'0','calculate'=>'0');
$column['InitGrid'][5]=array('rowid'=>1084,'save'=>'1','component'=>'ColumnText','header'=>'Align','sid'=>'field_align','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'field_align','hidden'=>'0','calculate'=>'0');
$button['InitGrid']=array();