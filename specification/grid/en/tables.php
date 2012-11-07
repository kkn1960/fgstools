<?php
$grid['tables']=array();
$selector['tables']=array('field'=>'select','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"select[%1\$d]\" id=\"id_select_%1\$d\" value=\"%2\$s\">");
$grid['tables']['properties']=array('table'=>'fgs_table','system'=>1,'primary_key'=>array('table_name'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'title'=>'tables','joins'=>array(),'save'=>array(),'sort'=>array('table_name'=>'table_name','table_primary_key'=>'table_primary_key','table_unique_key'=>'table_unique_key','table_master'=>'table_master','table_system'=>'table_system'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.table_name,t.table_primary_key,t.table_unique_key,t.table_master,t.table_system','from'=>'fgs_table t ');
$grid['tables']['initial']=array('pagesize'=>30,'direction'=>'ASC','order'=>'table_name','offset'=>0);
$grid['tables']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk');
$ra['tables']=array();
$ra['tables'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Edit" ></a>');
$ra['tables'][]=array('load'=>false,'action'=>'detail','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;detail=%1$d&amp;key=%2$s" class="icon_details" title="Detail" ></a>');
$rsa['tables']=array();
$rsa['tables'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$column['tables']=array();
$column['tables'][0]=array('rowid'=>356,'component'=>'ColumnText','header'=>'Name','sid'=>'table_name','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'table_name','hidden'=>'0','calculate'=>'0');
$column['tables'][1]=array('rowid'=>358,'component'=>'ColumnText','header'=>'Primary key','sid'=>'table_primary_key','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'table_primary_key','hidden'=>'0','calculate'=>'0');
$column['tables'][2]=array('rowid'=>5774,'component'=>'ColumnText','header'=>'Unique key','sid'=>'table_unique_key','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'table_unique_key','hidden'=>'0','calculate'=>'0');
$column['tables'][3]=array('rowid'=>360,'component'=>'ColumnText','header'=>'Master table','sid'=>'table_master','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'table_master','hidden'=>'0','calculate'=>'0');
$column['tables'][4]=array('rowid'=>359,'component'=>'ColumnLookup','header'=>'System table ?','sid'=>'table_system','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'field'=>'table_system','hidden'=>'0','type'=>'tinyint','align'=>'left','list_sid'=>'YesNo','renderer'=>'option');
$button['tables']=array();