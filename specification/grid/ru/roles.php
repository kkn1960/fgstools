<?php
$grid['roles']=array();
$selector['roles']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['roles']['properties']=array('table'=>'fgs_role','system'=>1,'primary_key'=>array('role_id'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'title'=>'roles','joins'=>array(),'save'=>array(),'sort'=>array('role_id'=>'role_id','role_name'=>'role_name','role_internal'=>'role_internal','role_client'=>'role_client','role_active'=>'role_active'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.role_id,t.role_name,t.role_internal,t.role_client,t.role_active','from'=>'fgs_role t ');
$grid['roles']['initial']=array('pagesize'=>20,'direction'=>'ASC','order'=>'role_id','offset'=>0);
$grid['roles']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk');
$ra['roles']=array();
$ra['roles'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Редактировать" ></a>');
$ra['roles'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Удалить" ></a>');
$ra['roles'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Копировать" ></a>');
$rsa['roles']=array();
$rsa['roles'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['roles'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['roles']=array();
$column['roles'][0]=array('rowid'=>489,'component'=>'ColumnText','header'=>'Id','sid'=>'role_id','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'role_id','hidden'=>'0','calculate'=>'0');
$column['roles'][1]=array('rowid'=>490,'component'=>'ColumnText','header'=>'Имя','sid'=>'role_name','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'role_name','hidden'=>'0','calculate'=>'0');
$column['roles'][2]=array('rowid'=>491,'component'=>'ColumnLookup','header'=>'Внутренная роль ?','sid'=>'role_internal','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'field'=>'role_internal','hidden'=>'0','type'=>'tinyint','list_sid'=>'YesNo','renderer'=>'option');
$column['roles'][3]=array('rowid'=>492,'component'=>'ColumnLookup','header'=>'Клиентская роль ?','sid'=>'role_client','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'field'=>'role_client','hidden'=>'0','type'=>'tinyint','list_sid'=>'YesNo','renderer'=>'option');
$column['roles'][4]=array('rowid'=>493,'component'=>'ColumnLookup','header'=>'Активный ?','sid'=>'role_active','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'field'=>'role_active','hidden'=>'0','type'=>'tinyint','list_sid'=>'YesNo','renderer'=>'option');
$button['roles']=array();