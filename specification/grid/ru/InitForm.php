<?php
$grid['InitForm']=array();
$selector['InitForm']=array('field'=>'select','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"select[%1\$d]\" id=\"id_select_%1\$d\" value=\"%2\$s\">");
$grid['InitForm']['properties']=array('table'=>'fgs_field','system'=>1,'primary_key'=>array('field_table','field_name'),'modal'=>1,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'fkr'=>array('field_table'=>'table_name'),'title'=>'SelectInputFormElements','joins'=>array(),'save'=>array('field_element','field_label','field_list','field_type','field_length','field_default','field_cols','field_maxlength','field_rows','field_size','field_flags'),'sort'=>array('field_name'=>'field_name','field_cols'=>'field_cols','field_maxlength'=>'field_maxlength','field_rows'=>'field_rows','field_size'=>'field_size','field_flags'=>'field_flags'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.field_table,field_name,t.field_name,t.field_element,t.field_label,t.field_list,t.field_type,t.field_length,t.field_default,t.field_cols,t.field_maxlength,t.field_rows,t.field_size,t.field_flags','from'=>'fgs_field t ');
$grid['InitForm']['initial']=array('pagesize'=>100,'direction'=>'ASC','order'=>'field_name','offset'=>0);
$grid['InitForm']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk','foreign_key','adk');
$ra['InitForm']=array();
$rsa['InitForm']=array();
$rsa['InitForm'][]=array('action'=>'init_detail','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="init_detail"  title="Добавить поля" ><span style="margin:0 -5px -3px -0px;" class="icon_add"></span></button>');
$column['InitForm']=array();
$column['InitForm'][0]=array('rowid'=>182,'component'=>'ColumnLink','header'=>'Название поля','sid'=>'field_name','hidden'=>'0','calculate'=>'0','renderer'=>'FieldLink','field'=>'field_name','type'=>'varchar');
$column['InitForm'][1]=array('rowid'=>183,'save'=>'1','component'=>'ColumnText','header'=>'Input','sid'=>'field_element','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'field_element','hidden'=>'0','calculate'=>'0');
$column['InitForm'][2]=array('rowid'=>190,'save'=>'1','component'=>'ColumnText','header'=>'Ярлык','sid'=>'field_label','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'field_label','hidden'=>'0','calculate'=>'0');
$column['InitForm'][3]=array('rowid'=>189,'save'=>'1','component'=>'ColumnText','header'=>'Список','sid'=>'field_list','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'field_list','hidden'=>'0','calculate'=>'0');
$column['InitForm'][4]=array('rowid'=>185,'save'=>'1','component'=>'ColumnText','header'=>'Тип поля','sid'=>'field_type','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'field_type','hidden'=>'0','calculate'=>'0');
$column['InitForm'][5]=array('rowid'=>187,'save'=>'1','component'=>'ColumnText','header'=>'Length','sid'=>'field_length','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'field_length','hidden'=>'0','calculate'=>'0');
$column['InitForm'][6]=array('rowid'=>186,'save'=>'1','component'=>'ColumnText','header'=>'По умолчанию','sid'=>'field_default','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'field_default','hidden'=>'0','calculate'=>'0');
$column['InitForm'][7]=array('rowid'=>5629,'save'=>'1','component'=>'ColumnText','header'=>'Атрибут cols','sid'=>'field_cols','hidden'=>'1','renderer'=>'text','type'=>'tinyint','field'=>'field_cols','hidden'=>'1','calculate'=>'0');
$column['InitForm'][8]=array('rowid'=>5630,'save'=>'1','component'=>'ColumnText','header'=>'Атрибут maxlength','sid'=>'field_maxlength','hidden'=>'1','renderer'=>'text','type'=>'int','field'=>'field_maxlength','hidden'=>'1','calculate'=>'0');
$column['InitForm'][9]=array('rowid'=>5631,'save'=>'1','component'=>'ColumnText','header'=>'Атрибут rows','sid'=>'field_rows','hidden'=>'1','renderer'=>'text','type'=>'tinyint','field'=>'field_rows','hidden'=>'1','calculate'=>'0');
$column['InitForm'][10]=array('rowid'=>5632,'save'=>'1','component'=>'ColumnText','header'=>'Атрибут size','sid'=>'field_size','hidden'=>'1','renderer'=>'text','type'=>'int','field'=>'field_size','hidden'=>'1','calculate'=>'0');
$column['InitForm'][11]=array('rowid'=>5729,'save'=>'1','component'=>'ColumnText','header'=>'Flags','sid'=>'field_flags','hidden'=>'1','renderer'=>'text','type'=>'varchar','field'=>'field_flags','hidden'=>'1','calculate'=>'0');
$button['InitForm']=array();