<?php
$grid['statements']=array();
$selector['statements']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['statements']['properties']=array('table'=>'fgs_statement','system'=>1,'primary_key'=>array('statement_rowid'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'fkr'=>array('statement_condition'=>'condition_sid'),'title'=>'statements','joins'=>array(),'save'=>array(),'sort'=>array('statement_rowid'=>'statement_rowid','statement_condition'=>'statement_condition','statement_connector'=>'statement_connector','statement_operand1'=>'statement_operand1','statement_function'=>'statement_function','statement_operator'=>'statement_operator','statement_operand2'=>'statement_operand2','statement_failure'=>'statement_failure','statement_group'=>'statement_group','statement_index'=>'statement_index'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.statement_rowid,t.statement_condition,t.statement_connector,t.statement_operand1,t.statement_function,t.statement_operator,t.statement_operand2,t.statement_failure,t.statement_group,t.statement_index','from'=>'fgs_statement t ');
$grid['statements']['initial']=array('pagesize'=>-1,'direction'=>'ASC','order'=>'statement_index','offset'=>0);
$grid['statements']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk','foreign_key');
$ra['statements']=array();
$ra['statements'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Редактировать" ></a>');
$ra['statements'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Удалить" ></a>');
$ra['statements'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Копировать" ></a>');
$rsa['statements']=array();
$rsa['statements'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['statements'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['statements']=array();
$column['statements'][0]=array('rowid'=>5744,'component'=>'ColumnText','header'=>'Rowid','sid'=>'statement_rowid','hidden'=>'0','renderer'=>'text','type'=>'int','field'=>'statement_rowid','hidden'=>'0','calculate'=>'0');
$column['statements'][1]=array('rowid'=>5693,'component'=>'ColumnText','header'=>'Условие','sid'=>'statement_condition','hidden'=>'1','renderer'=>'text','type'=>'varchar','field'=>'statement_condition','hidden'=>'1','calculate'=>'0');
$column['statements'][2]=array('rowid'=>5689,'component'=>'ColumnLookup','header'=>'Коннектор','sid'=>'statement_connector','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')),'field'=>'statement_connector','hidden'=>'0','type'=>'varchar','list_sid'=>'connector','renderer'=>'option');
$column['statements'][3]=array('rowid'=>5690,'component'=>'ColumnText','header'=>'Operand 1','sid'=>'statement_operand1','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'statement_operand1','hidden'=>'0','calculate'=>'0');
$column['statements'][4]=array('rowid'=>5739,'component'=>'ColumnText','header'=>'Функция','sid'=>'statement_function','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'statement_function','hidden'=>'0','calculate'=>'0');
$column['statements'][5]=array('rowid'=>5691,'component'=>'ColumnLookup','header'=>'Оператор','sid'=>'statement_operator','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','m'=>'больше','mq'=>'больше или равно','l'=>'меньше','lq'=>'меньше или равно','between'=>'диапазон','not_between'=>'вне диапазона','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp','in'=>'член множества','not_in'=>'не член множества','include_all'=>'включает все','include_one'=>'включает хотя бы одно','not_include_all'=>'не содержит ни одного','null'=>'null','not_null'=>'not null','empty'=>'Пусто','not_empty'=>'Не пусто')),'field'=>'statement_operator','hidden'=>'0','type'=>'varchar','list_sid'=>'ConditionTest','renderer'=>'option');
$column['statements'][6]=array('rowid'=>5692,'component'=>'ColumnText','header'=>'Operand 2','sid'=>'statement_operand2','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'statement_operand2','hidden'=>'0','calculate'=>'0');
$column['statements'][7]=array('rowid'=>5694,'component'=>'ColumnLookup','header'=>'Failure','sid'=>'statement_failure','hidden'=>'0','join_lookup'=>0,'relation'=>'0','list'=>array('options'=>array('0'=>'Ошибка  при не выполнении','1'=>'Ошибка  при  выполнении')),'field'=>'statement_failure','hidden'=>'0','type'=>'tinyint','align'=>'left','list_sid'=>'failureOnXXX','renderer'=>'option');
$column['statements'][8]=array('rowid'=>5695,'component'=>'ColumnText','header'=>'Группа','sid'=>'statement_group','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'statement_group','hidden'=>'0','calculate'=>'0');
$column['statements'][9]=array('rowid'=>5696,'component'=>'ColumnText','header'=>'Индекс','sid'=>'statement_index','hidden'=>'0','renderer'=>'text','type'=>'int','field'=>'statement_index','hidden'=>'0','calculate'=>'0');
$button['statements']=array();