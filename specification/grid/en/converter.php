<?php
$grid['converter']=array();
$selector['converter']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['converter']['properties']=array('table'=>'fgs_converter','system'=>1,'primary_key'=>array('converter_sid'),'modal'=>0,'user_order'=>0,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'title'=>'converters','joins'=>array(),'save'=>array(),'sort'=>array('converter_sid'=>'converter_sid','converter_type'=>'converter_type','converter_static'=>'converter_static'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.converter_sid,t.converter_type,t.converter_static','from'=>'fgs_converter t ');
$grid['converter']['initial']=array('pagesize'=>20,'direction'=>'ASC','order'=>'converter_sid','offset'=>0);
$grid['converter']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk');
$ra['converter']=array();
$ra['converter'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Edit" ></a>');
$ra['converter'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Remove" ></a>');
$ra['converter'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Copy" ></a>');
$rsa['converter']=array();
$rsa['converter'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['converter'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['converter']=array();
$column['converter'][0]=array('rowid'=>5752,'component'=>'ColumnText','header'=>'Sid','sid'=>'converter_sid','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'converter_sid','hidden'=>'0','calculate'=>'0');
$column['converter'][1]=array('rowid'=>5753,'component'=>'ColumnLookup','header'=>'Type','sid'=>'converter_type','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('filter'=>'filter','converter'=>'converter')),'field'=>'converter_type','hidden'=>'0','type'=>'varchar','list_sid'=>'ConverterType','renderer'=>'option');
$column['converter'][2]=array('rowid'=>5765,'component'=>'ColumnLookup','header'=>'Static method ?','sid'=>'converter_static','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'field'=>'converter_static','hidden'=>'0','type'=>'tinyint','list_sid'=>'YesNo','renderer'=>'option');
$button['converter']=array();