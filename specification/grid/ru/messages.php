<?php
$grid['messages']=array();
$selector['messages']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['messages']['properties']=array('table'=>'fgs_message','system'=>1,'primary_key'=>array('msg_abbr'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'title'=>'messages','joins'=>array(),'save'=>array(),'sort'=>array('msg_abbr'=>'msg_abbr','msg_en'=>'msg_en','msg_ru'=>'msg_ru','msg_system'=>'msg_system'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.msg_abbr,t.msg_en,t.msg_ru,t.msg_system','from'=>'fgs_message t ');
$grid['messages']['initial']=array('pagesize'=>20,'direction'=>'ASC','order'=>'msg_abbr','offset'=>0);
$grid['messages']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk');
$ra['messages']=array();
$ra['messages'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Редактировать" ></a>');
$ra['messages'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Удалить" ></a>');
$ra['messages'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Копировать" ></a>');
$rsa['messages']=array();
$rsa['messages'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['messages'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['messages']=array();
$column['messages'][0]=array('rowid'=>288,'component'=>'ColumnText','header'=>'Аббревиатура','sid'=>'msg_abbr','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'msg_abbr','hidden'=>'0','calculate'=>'0');
$column['messages'][1]=array('rowid'=>5597,'component'=>'ColumnText','header'=>'Текст на английском','sid'=>'msg_en','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'msg_en','hidden'=>'0','calculate'=>'0');
$column['messages'][2]=array('rowid'=>5598,'component'=>'ColumnText','header'=>'Текст на русском','sid'=>'msg_ru','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'msg_ru','hidden'=>'0','calculate'=>'0');
$column['messages'][3]=array('rowid'=>292,'component'=>'ColumnLookup','header'=>'System ?','sid'=>'msg_system','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'field'=>'msg_system','hidden'=>'0','type'=>'tinyint','align'=>'left','list_sid'=>'YesNo','renderer'=>'option');
$button['messages']=array();