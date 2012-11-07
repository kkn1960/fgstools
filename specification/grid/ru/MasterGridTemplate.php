<?php
$grid['MasterGridTemplate']=array();
$selector['MasterGridTemplate']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['MasterGridTemplate']['properties']=array('table'=>'fgs_column','system'=>1,'primary_key'=>array('column_rowid'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'fkr'=>array('column_grid'=>'grid_sid'),'title'=>'MasterGridTemplate','joins'=>array(),'save'=>array(),'sort'=>array(),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.column_rowid','from'=>'fgs_column t ');
$grid['MasterGridTemplate']['initial']=array('pagesize'=>0,'direction'=>'ASC','order'=>'','offset'=>0);
$grid['MasterGridTemplate']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk','foreign_key');
$ra['MasterGridTemplate']=array();
$ra['MasterGridTemplate'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Редактировать" ></a>');
$ra['MasterGridTemplate'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Удалить" ></a>');
$ra['MasterGridTemplate'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Копировать" ></a>');
$ra['MasterGridTemplate'][]=array('load'=>false,'action'=>'detail','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;detail=%1$d&amp;key=%2$s" class="icon_details" title="Detail" ></a>');
$rsa['MasterGridTemplate']=array();
$rsa['MasterGridTemplate'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['MasterGridTemplate'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['MasterGridTemplate']=array();
$button['MasterGridTemplate']=array();