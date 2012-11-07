<?php
$grid['menus']=array();
$selector['menus']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['menus']['properties']=array('table'=>'fgs_menu','system'=>1,'primary_key'=>array('menu_id'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'title'=>'menus','joins'=>array(),'save'=>array('menu_id'),'sort'=>array('menu_id'=>'menu_id','menu_name'=>'menu_name'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array('menu_id'=>'root_menu'),'select'=>'t.menu_id,t.menu_name','from'=>'fgs_menu t ');
$grid['menus']['initial']=array('pagesize'=>30,'direction'=>'ASC','order'=>'','offset'=>0);
$grid['menus']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk','adk');
$ra['menus']=array();
$ra['menus'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Edit" ></a>');
$ra['menus'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Remove" ></a>');
$ra['menus'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Copy" ></a>');
$ra['menus'][]=array('load'=>false,'action'=>'detail','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;detail=%1$d&amp;key=%2$s" class="icon_details" title="Detail" ></a>');
$rsa['menus']=array();
$rsa['menus'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['menus'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['menus']=array();
$column['menus'][0]=array('rowid'=>279,'save'=>'1','register'=>'root_menu','component'=>'ColumnText','header'=>'Sid','sid'=>'menu_id','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'menu_id','hidden'=>'0','calculate'=>'0');
$column['menus'][1]=array('rowid'=>280,'component'=>'ColumnText','header'=>'Name','sid'=>'menu_name','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'menu_name','hidden'=>'0','calculate'=>'0');
$button['menus']=array();