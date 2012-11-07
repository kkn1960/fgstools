<?php
$form['Predicate']=array();
$form['Predicate']['initial']=array();
$form['Predicate']['initial']=array('mode'=>'insert');
$form['Predicate']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['Predicate']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['Predicate']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['Predicate']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['Predicate']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['Predicate']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['Predicate']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['Predicate']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['Predicate']=array();
$button['Predicate'][]=array('value'=>'Вставить','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['Predicate'][]=array('value'=>'Обновить','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['Predicate'][]=array('value'=>'Удалить','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['Predicate'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['Predicate'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['Predicate'][]=array('value'=>'Отменить изменения','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['Predicate']['properties']=array('primary_key'=>array('element_rowid'),'table'=>'fgs_element','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'Predicate','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['Predicate']=array();
$e['Predicate'][0]=array('table'=>'fgs_element','rowid'=>'1391','sid'=>'element_form','fieldset'=>'','name'=>'element_form','label'=>'Форма','component'=>'InputForeignKey','foreign_key'=>'form_sid','hidden'=>1,'type'=>'varchar','field'=>'element_form','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'));
$e['Predicate'][1]=array('table'=>'fgs_element','rowid'=>'1392','sid'=>'element_table','fieldset'=>'','name'=>'element_table','label'=>'Таблица','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_table','cai'=>1,'attributes'=>'tabindex=\'20\'');
$e['Predicate'][2]=array('table'=>'fgs_element','rowid'=>'1400','sid'=>'element_table_alias','fieldset'=>'','name'=>'element_table_alias','label'=>'Алиас таблицы','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_table_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'8\' size=\'8\'');
$e['Predicate'][3]=array('table'=>'fgs_element','rowid'=>'1393','sid'=>'element_field','fieldset'=>'','name'=>'element_field','label'=>'Поле','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\' tabindex=\'30\'');
$e['Predicate'][4]=array('table'=>'fgs_element','rowid'=>'10614','sid'=>'element_alias','fieldset'=>'','name'=>'element_alias','label'=>'Алиас поля','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['Predicate'][5]=array('table'=>'fgs_element','rowid'=>'10487','sid'=>'element_sid','fieldset'=>'','name'=>'element_sid','label'=>'Sid','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_sid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['Predicate'][6]=array('table'=>'fgs_element','rowid'=>'1394','sid'=>'element_type','fieldset'=>'','name'=>'element_type','label'=>'Тип','component'=>'InputText','type'=>'varchar','default_value'=>'text','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_type','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'40\'');
$e['Predicate'][7]=array('table'=>'fgs_element','rowid'=>'1395','sid'=>'element_label','fieldset'=>'','name'=>'element_label','label'=>'Ярлык','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_label','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'32\'');
$e['Predicate'][8]=array('table'=>'fgs_element','rowid'=>'1396','sid'=>'element_component','fieldset'=>'','name'=>'element_component','label'=>'Компонент','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'PredicateComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'PredicateComponent','table'=>'fgs_component','from'=>'fgs_component','primary_key'=>'component_sid','select'=>'component_sid id,component_name as name','order'=>'component_name ASC','where'=>'component_type=\'element\' and component_predicate=\'1\'','display_field'=>'component_name'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_component','cai'=>1,'attributes'=>'tabindex=\'50\'');
$e['Predicate'][9]=array('table'=>'fgs_element','rowid'=>'1397','sid'=>'element_index','fieldset'=>'','name'=>'element_index','label'=>'Индекс','component'=>'InputText','type'=>'smallint','required'=>1,'default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\' tabindex=\'60\'');
$e['Predicate'][10]=array('table'=>'fgs_element','rowid'=>'1398','sid'=>'element_predicate','fieldset'=>'','name'=>'element_predicate','label'=>'Условия сравнения','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'PredicateType','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('options'=>array('comparison'=>'Тест сравнения','pattern'=>'Тест на соответствие шаблону','range'=>'Тест на принадлежность диапазону','set'=>'Тест на членство в множестве','null'=>'Тест на NULL')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_predicate','cai'=>1,'validators'=>array(array('error'=>'wrong_value','break_onfailure'=>0,'statement'=>array(array('operand1'=>'&arg element_component','operand2'=>'InputButton','connector'=>'and','operator'=>'equal','failure'=>'0','group'=>'1'),array('operand1'=>'&arg element_predicate','connector'=>'and','operator'=>'empty','failure'=>'0','group'=>'1'),array('operand1'=>'&arg element_component','operand2'=>'InputButton','connector'=>'or','operator'=>'not_equal','failure'=>'0','group'=>'2'),array('operand1'=>'&arg element_predicate','connector'=>'and','operator'=>'not_empty','failure'=>'0','group'=>'2')))));
$e['Predicate'][11]=array('table'=>'fgs_element','rowid'=>'1401','sid'=>'element_predicate_custom','fieldset'=>'','name'=>'element_predicate_custom','label'=>'Специальный предикат','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_predicate_custom','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['Predicate'][12]=array('table'=>'fgs_element','rowid'=>'1408','sid'=>'element_hidden','fieldset'=>'','name'=>'element_hidden','label'=>'Скрытый ?','component'=>'InputText','type'=>'tinyint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_hidden','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'1\' size=\'1\'');
$e['Predicate'][13]=array('table'=>'fgs_element','rowid'=>'10619','sid'=>'element_fieldset','fieldset'=>'','name'=>'element_fieldset','label'=>'Fieldset','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_fieldset','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');