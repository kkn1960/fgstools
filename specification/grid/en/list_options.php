<?php
$grid['list_options']=array();
$selector['list_options']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['list_options']['properties']=array('table'=>'fgs_option','system'=>1,'primary_key'=>array('option_list','option_sid'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'fkr'=>array('option_list'=>'list_sid'),'title'=>'list_options','joins'=>array(),'save'=>array('option_list'),'sort'=>array('option_list'=>'option_list','option_sid'=>'option_sid','option_en'=>'option_en','option_ru'=>'option_ru','option_index'=>'option_index'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.option_list,option_sid,t.option_list,t.option_sid,t.option_en,t.option_ru,t.option_index','from'=>'fgs_option t ');
$grid['list_options']['initial']=array('pagesize'=>30,'direction'=>'ASC','order'=>'option_index','offset'=>0);
$grid['list_options']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk','foreign_key','adk');
$ra['list_options']=array();
$ra['list_options'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Edit" ></a>');
$ra['list_options'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Remove" ></a>');
$ra['list_options'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Copy" ></a>');
$rsa['list_options']=array();
$rsa['list_options'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['list_options'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['list_options']=array();
$column['list_options'][0]=array('rowid'=>5559,'save'=>'1','component'=>'ColumnText','header'=>'List','sid'=>'option_list','hidden'=>'1','renderer'=>'text','type'=>'varchar','field'=>'option_list','hidden'=>'1','calculate'=>'0','align'=>'left');
$column['list_options'][1]=array('rowid'=>5560,'component'=>'ColumnText','header'=>'Sid','sid'=>'option_sid','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'option_sid','hidden'=>'0','calculate'=>'0');
$column['list_options'][2]=array('rowid'=>5561,'component'=>'ColumnText','header'=>'Option in English','sid'=>'option_en','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'option_en','hidden'=>'0','calculate'=>'0');
$column['list_options'][3]=array('rowid'=>5562,'component'=>'ColumnText','header'=>'Option in russian','sid'=>'option_ru','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'option_ru','hidden'=>'0','calculate'=>'0');
$column['list_options'][4]=array('rowid'=>5563,'component'=>'ColumnText','header'=>'Index','sid'=>'option_index','hidden'=>'0','renderer'=>'text','type'=>'int','field'=>'option_index','hidden'=>'0','calculate'=>'0');
$button['list_options']=array();