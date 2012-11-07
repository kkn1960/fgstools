<?php
$grid['dataset_predicates']=array();
$selector['dataset_predicates']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['dataset_predicates']['properties']=array('table'=>'fgs_predicate','system'=>1,'primary_key'=>array('predicate_rowid'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'fkr'=>array('predicate_dataset'=>'dataset_sid'),'title'=>'predicates','joins'=>array(),'save'=>array(),'sort'=>array('predicate_rowid'=>'predicate_rowid','predicate_dataset'=>'predicate_dataset','predicate_table'=>'predicate_table','predicate_field'=>'predicate_field','predicate_operator'=>'predicate_operator','predicate_argument'=>'predicate_argument','predicate_connector'=>'predicate_connector','predicate_fieldset'=>'predicate_fieldset','predicate_index'=>'predicate_index'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.predicate_rowid,t.predicate_dataset,t.predicate_table,t.predicate_field,t.predicate_operator,t.predicate_argument,t.predicate_connector,t.predicate_fieldset,t.predicate_index','from'=>'fgs_predicate t ');
$grid['dataset_predicates']['initial']=array('pagesize'=>-1,'direction'=>'ASC','order'=>'predicate_index','offset'=>0);
$grid['dataset_predicates']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk','foreign_key');
$ra['dataset_predicates']=array();
$ra['dataset_predicates'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Редактировать" ></a>');
$ra['dataset_predicates'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Удалить" ></a>');
$ra['dataset_predicates'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Копировать" ></a>');
$rsa['dataset_predicates']=array();
$rsa['dataset_predicates'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['dataset_predicates'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['dataset_predicates']=array();
$column['dataset_predicates'][0]=array('rowid'=>5673,'component'=>'ColumnText','header'=>'Rowid','sid'=>'predicate_rowid','hidden'=>'0','renderer'=>'text','type'=>'int','field'=>'predicate_rowid','hidden'=>'0','calculate'=>'0');
$column['dataset_predicates'][1]=array('rowid'=>5584,'component'=>'ColumnText','header'=>'Predicate_dataset','sid'=>'predicate_dataset','hidden'=>'1','renderer'=>'text','type'=>'varchar','field'=>'predicate_dataset','hidden'=>'1','calculate'=>'0');
$column['dataset_predicates'][2]=array('rowid'=>5594,'component'=>'ColumnText','header'=>'Таблица','sid'=>'predicate_table','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'predicate_table','hidden'=>'0','calculate'=>'0');
$column['dataset_predicates'][3]=array('rowid'=>5587,'component'=>'ColumnText','header'=>'Поле','sid'=>'predicate_field','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'predicate_field','hidden'=>'0','calculate'=>'0');
$column['dataset_predicates'][4]=array('rowid'=>5586,'component'=>'ColumnLookup','header'=>'Оператор','sid'=>'predicate_operator','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','m'=>'больше','mq'=>'больше или равно','l'=>'меньше','lq'=>'меньше или равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp','in'=>'член множества','not_in'=>'не член множества','include_all'=>'включает все','include_one'=>'включает хотя бы одно','not_include_all'=>'не содержит ни одного','null'=>'null','not_null'=>'not null','empty'=>'Пусто','not_empty'=>'Не пусто')),'field'=>'predicate_operator','hidden'=>'0','type'=>'varchar','list_sid'=>'NotRangeTest','renderer'=>'option');
$column['dataset_predicates'][5]=array('rowid'=>5589,'component'=>'ColumnText','header'=>'Значение','sid'=>'predicate_argument','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'predicate_argument','hidden'=>'0','calculate'=>'0');
$column['dataset_predicates'][6]=array('rowid'=>5585,'component'=>'ColumnText','header'=>'Коннектор','sid'=>'predicate_connector','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'predicate_connector','hidden'=>'0','calculate'=>'0');
$column['dataset_predicates'][7]=array('rowid'=>5593,'component'=>'ColumnText','header'=>'Группа','sid'=>'predicate_fieldset','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'predicate_fieldset','hidden'=>'0','calculate'=>'0');
$column['dataset_predicates'][8]=array('rowid'=>5705,'component'=>'ColumnText','header'=>'Индекс','sid'=>'predicate_index','hidden'=>'0','renderer'=>'text','type'=>'int','field'=>'predicate_index','hidden'=>'0','calculate'=>'0');
$button['dataset_predicates']=array();