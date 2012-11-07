<?php
$grid['SearchForms']=array();
$selector['SearchForms']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['SearchForms']['properties']=array('table'=>'fgs_form','system'=>1,'primary_key'=>array('form_sid'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'title'=>'SearchForms','joins'=>array(),'save'=>array('form_table','form_system'),'sort'=>array('form_table'=>'form_table','form_sid'=>'form_sid','form_title'=>'form_title','form_type'=>'form_type','form_system'=>'form_system'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array('form_sid'=>'form_sid','form_system'=>'system'),'select'=>'t.form_sid,t.form_table,t.form_title,t.form_type,t.form_system','from'=>'fgs_form t ');
$grid['SearchForms']['initial']=array('pagesize'=>30,'direction'=>'ASC','order'=>'form_sid','offset'=>0);
$grid['SearchForms']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk','adk');
$ra['SearchForms']=array();
$ra['SearchForms'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Edit" ></a>');
$ra['SearchForms'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Remove" ></a>');
$ra['SearchForms'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Copy" ></a>');
$ra['SearchForms'][]=array('load'=>false,'action'=>'add','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;add=%1$d&amp;key=%2$s" class="icon_add" title="Add" ></a>');
$ra['SearchForms'][]=array('load'=>false,'action'=>'element','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;element=%1$d&amp;key=%2$s" class="icon_details" title="Element" ></a>');
$ra['SearchForms'][]=array('load'=>false,'action'=>'validator','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;validator=%1$d&amp;key=%2$s" class="icon_validator" title="Validator" ></a>');
$ra['SearchForms'][]=array('load'=>false,'action'=>'filter','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;filter=%1$d&amp;key=%2$s" class="icon_filter" title="Filter" ></a>');
$rsa['SearchForms']=array();
$rsa['SearchForms'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['SearchForms'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['SearchForms']=array();
$column['SearchForms'][0]=array('rowid'=>334,'save'=>'1','component'=>'ColumnText','header'=>'Table','sid'=>'form_table','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'form_table','hidden'=>'0','calculate'=>'0');
$column['SearchForms'][1]=array('rowid'=>335,'register'=>'form_sid','component'=>'ColumnText','header'=>'Sid','sid'=>'form_sid','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'form_sid','hidden'=>'0','calculate'=>'0');
$column['SearchForms'][2]=array('rowid'=>336,'component'=>'ColumnText','header'=>'Title','sid'=>'form_title','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'form_title','hidden'=>'0','calculate'=>'0');
$column['SearchForms'][3]=array('rowid'=>338,'component'=>'ColumnLookup','header'=>'Type','sid'=>'form_type','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('search_application'=>'application search','search_system'=>'system search','search_template'=>'search template')),'field'=>'form_type','hidden'=>'0','type'=>'varchar','align'=>'left','list_sid'=>'SearchType','renderer'=>'option');
$column['SearchForms'][4]=array('rowid'=>5699,'save'=>'1','register'=>'system','component'=>'ColumnLookup','header'=>'System ?','sid'=>'form_system','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'field'=>'form_system','hidden'=>'0','type'=>'tinyint','list_sid'=>'YesNo','renderer'=>'option');
$button['SearchForms']=array();