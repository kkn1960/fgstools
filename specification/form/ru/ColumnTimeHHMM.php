<?php
$form['ColumnTimeHHMM']=array();
$form['ColumnTimeHHMM']['initial']=array();
$form['ColumnTimeHHMM']['initial']=array('mode'=>'update');
$form['ColumnTimeHHMM']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['ColumnTimeHHMM']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnTimeHHMM']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnTimeHHMM']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnTimeHHMM']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnTimeHHMM']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnTimeHHMM']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnTimeHHMM']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['ColumnTimeHHMM']=array();
$button['ColumnTimeHHMM'][]=array('value'=>'Вставить','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['ColumnTimeHHMM'][]=array('value'=>'Обновить','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['ColumnTimeHHMM'][]=array('value'=>'Удалить','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['ColumnTimeHHMM'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['ColumnTimeHHMM'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['ColumnTimeHHMM'][]=array('value'=>'Отменить изменения','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['ColumnTimeHHMM']['properties']=array('primary_key'=>array('column_rowid'),'table'=>'fgs_column','method'=>'post','system'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'column_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['ColumnTimeHHMM']=array();
$e['ColumnTimeHHMM'][0]=array('table'=>'fgs_column','rowid'=>'233','sid'=>'column_grid','fieldset'=>'system','name'=>'column_grid','label'=>'Грид','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_grid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\'');
$e['ColumnTimeHHMM'][1]=array('table'=>'fgs_column','rowid'=>'232','sid'=>'column_table','fieldset'=>'system','name'=>'column_table','label'=>'Таблица','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_table','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'30\'');
$e['ColumnTimeHHMM'][2]=array('table'=>'fgs_column','rowid'=>'231','sid'=>'column_field','fieldset'=>'system','name'=>'column_field','label'=>'Поле','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'20\'');
$e['ColumnTimeHHMM'][3]=array('table'=>'fgs_column','rowid'=>'235','sid'=>'column_type','fieldset'=>'system','name'=>'column_type','label'=>'Тип','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_type','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnTimeHHMM'][4]=array('table'=>'fgs_column','rowid'=>'234','sid'=>'column_component','fieldset'=>'system','name'=>'column_component','label'=>'Компонент','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ColumnComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ColumnComponent','table'=>'fgs_component','from'=>'fgs_component','primary_key'=>'component_sid','select'=>'component_sid id,component_name as name','order'=>'component_index ASC','where'=>"component_type='column'",'display_field'=>'component_name'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_component','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'45\'');
$e['ColumnTimeHHMM'][5]=array('table'=>'fgs_column','rowid'=>'11043','sid'=>'column_save','fieldset'=>'system','name'=>'column_save','label'=>'Сохранить','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'column_save','cai'=>1);
$e['ColumnTimeHHMM'][6]=array('table'=>'fgs_column','rowid'=>'10849','sid'=>'column_register','fieldset'=>'system','name'=>'column_register','label'=>'Глобальное имя','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_register','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnTimeHHMM'][7]=array('table'=>'fgs_column','rowid'=>'237','sid'=>'column_index','fieldset'=>'rendering','name'=>'column_index','label'=>'Индекс','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\' tabindex=\'50\'');
$e['ColumnTimeHHMM'][8]=array('table'=>'fgs_column','rowid'=>'238','sid'=>'column_header','fieldset'=>'rendering','name'=>'column_header','label'=>'Заголовок','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_header','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnTimeHHMM'][9]=array('table'=>'fgs_column','rowid'=>'239','sid'=>'column_span','fieldset'=>'rendering','name'=>'column_span','label'=>'Span','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_span','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnTimeHHMM'][10]=array('table'=>'fgs_column','rowid'=>'10948','sid'=>'column_align','fieldset'=>'rendering','name'=>'column_align','label'=>'Align','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_align','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnTimeHHMM'][11]=array('table'=>'fgs_column','rowid'=>'236','sid'=>'column_format','fieldset'=>'rendering','name'=>'column_format','label'=>'Format','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_format','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['ColumnTimeHHMM'][12]=array('table'=>'fgs_column','rowid'=>'240','sid'=>'column_footer','fieldset'=>'rendering','name'=>'column_footer','label'=>'Подвал','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_footer','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnTimeHHMM'][13]=array('table'=>'fgs_column','rowid'=>'11028','sid'=>'column_sort','fieldset'=>'sorting','name'=>'column_sort','label'=>'Сортировать как','trim'=>'trim','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_sort','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['ColumnTimeHHMM'][14]=array('table'=>'fgs_column','rowid'=>'11029','sid'=>'column_sort_prefix','fieldset'=>'sorting','name'=>'column_sort_prefix','label'=>'Префикс сортировки','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_sort_prefix','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['ColumnTimeHHMM'][15]=array('table'=>'fgs_column','rowid'=>'11030','sid'=>'column_sort_suffix','fieldset'=>'sorting','name'=>'column_sort_suffix','label'=>'Суффикс сортировки','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_sort_suffix','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');