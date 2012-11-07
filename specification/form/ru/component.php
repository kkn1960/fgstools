<?php
$form['component']=array();
$form['component']['initial']=array();
$form['component']['initial']=array('mode'=>'insert');
$form['component']['session']['insert']=array('mode','hide','display');
$form['component']['session']['copy']=array('mode','hide','display','apk','irow');
$form['component']['session']['read']=array('mode','hide','display','apk','irow');
$form['component']['session']['update']=array('mode','hide','display','apk','irow');
$form['component']['session']['remove']=array('mode','hide','display','apk','irow');
$form['component']['session']['multi_update']=array('mode','hide','display','apk','irow');
$form['component']['session']['multi_remove']=array('mode','hide','display','apk','irow');
$form['component']['session']['multi_read']=array('mode','hide','display','apk','irow');
$button['component']=array();
$button['component'][]=array('value'=>'Вставить','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['component'][]=array('value'=>'Обновить','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['component'][]=array('value'=>'Удалить','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['component'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['component'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['component'][]=array('value'=>'Отменить изменения','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['component']['properties']=array('primary_key'=>array('component_sid'),'table'=>'fgs_component','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'dependent'=>array('fgs_element_element_component'=>array('fk'=>'element_component','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_element','pk'=>'component_sid'),'fgs_column_column_component'=>array('fk'=>'column_component','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_column','pk'=>'component_sid'),'fgs_field_field_element'=>array('fk'=>'field_element','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_field','pk'=>'component_sid'),'fgs_field_field_column'=>array('fk'=>'field_column','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_field','pk'=>'component_sid'),'fgs_field_field_argument'=>array('fk'=>'field_argument','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_field','pk'=>'component_sid')),'descendant'=>array('fgs_export_export_component'=>array('fk'=>'export_component','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_export','table_pk'=>'export_rowid','pk'=>'component_sid')),'reference'=>array('fgs_element_element_component'=>array('fk'=>'element_component','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_element','pk'=>'component_sid'),'fgs_column_column_component'=>array('fk'=>'column_component','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_column','pk'=>'component_sid'),'fgs_export_export_component'=>array('fk'=>'export_component','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_export','pk'=>'component_sid'),'fgs_field_field_element'=>array('fk'=>'field_element','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_field','pk'=>'component_sid'),'fgs_field_field_column'=>array('fk'=>'field_column','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_field','pk'=>'component_sid'),'fgs_field_field_argument'=>array('fk'=>'field_argument','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_field','pk'=>'component_sid')),'title'=>'component','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['component']=array();
$e['component'][0]=array('table'=>'fgs_component','rowid'=>'353','sid'=>'component_sid','fieldset'=>'','name'=>'component_sid','label'=>'Id','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'component_sid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'10\'');
$e['component'][1]=array('table'=>'fgs_component','rowid'=>'354','sid'=>'component_name','fieldset'=>'','name'=>'component_name','label'=>'Имя','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'component_name','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'20\'');
$e['component'][2]=array('table'=>'fgs_component','rowid'=>'355','sid'=>'component_type','fieldset'=>'','name'=>'component_type','label'=>'Тип','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ComponentType','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('options'=>array('element'=>'элемент','column'=>'колонка','predicate'=>'предикат','other'=>'остальной')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'component_type','cai'=>1);
$e['component'][3]=array('table'=>'fgs_component','rowid'=>'11476','sid'=>'component_renderer','fieldset'=>'','name'=>'component_renderer','label'=>'Визуализатор','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'component_renderer','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['component'][4]=array('table'=>'fgs_component','rowid'=>'356','sid'=>'component_index','fieldset'=>'','name'=>'component_index','label'=>'Индекс','component'=>'InputText','type'=>'int','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'component_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'4\' size=\'4\'');
$e['component'][5]=array('table'=>'fgs_component','rowid'=>'357','sid'=>'component_predicate','fieldset'=>'','name'=>'component_predicate','label'=>'Пригодно для предикатов ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'1','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'component_predicate','cai'=>1);