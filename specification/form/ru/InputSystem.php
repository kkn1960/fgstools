<?php
$form['InputSystem']=array();
$form['InputSystem']['initial']=array();
$form['InputSystem']['initial']=array('mode'=>'update');
$form['InputSystem']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['InputSystem']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputSystem']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputSystem']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputSystem']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputSystem']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputSystem']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputSystem']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['InputSystem']=array();
$button['InputSystem'][]=array('value'=>'Вставить','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['InputSystem'][]=array('value'=>'Обновить','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['InputSystem'][]=array('value'=>'Удалить','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['InputSystem'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['InputSystem'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['InputSystem'][]=array('value'=>'Отменить изменения','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['InputSystem']['properties']=array('primary_key'=>array('element_rowid'),'table'=>'fgs_element','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'element_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['InputSystem']=array();
$e['InputSystem'][0]=array('table'=>'fgs_element','rowid'=>'1143','sid'=>'element_form','fieldset'=>'system_attributes','name'=>'element_form','label'=>'Форма','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_form','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\'');
$e['InputSystem'][1]=array('table'=>'fgs_element','rowid'=>'1147','sid'=>'element_component','fieldset'=>'system_attributes','name'=>'element_component','label'=>'Компонент','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ElementComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ElementComponent','table'=>'fgs_component','from'=>'fgs_component','primary_key'=>'component_sid','select'=>'component_sid id,component_name as name','order'=>'component_name ASC','where'=>'component_type=\'element\'','display_field'=>'component_name'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_component','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'45\'');
$e['InputSystem'][2]=array('table'=>'fgs_element','rowid'=>'1144','sid'=>'element_table','fieldset'=>'system_attributes','name'=>'element_table','label'=>'Таблица','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_table','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'30\'');
$e['InputSystem'][3]=array('table'=>'fgs_element','rowid'=>'1145','sid'=>'element_field','fieldset'=>'system_attributes','name'=>'element_field','label'=>'Поле','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'20\'');
$e['InputSystem'][4]=array('table'=>'fgs_element','rowid'=>'1146','sid'=>'element_type','fieldset'=>'system_attributes','name'=>'element_type','label'=>'Тип','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'text','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_type','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'40\'');
$e['InputSystem'][5]=array('table'=>'fgs_element','rowid'=>'10713','sid'=>'element_default','fieldset'=>'input_attributes','name'=>'element_default','label'=>'Значение по умолчанию','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_default','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'64\'');
$e['InputSystem'][6]=array('table'=>'fgs_element','rowid'=>'1150','sid'=>'element_register','fieldset'=>'input_attributes','name'=>'element_register','label'=>'Глобальное имя','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_register','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputSystem'][7]=array('table'=>'fgs_element','rowid'=>'10694','sid'=>'element_cai','fieldset'=>'input_attributes','name'=>'element_cai','label'=>'Обнулить после вставки ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'1','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_cai','cai'=>1);