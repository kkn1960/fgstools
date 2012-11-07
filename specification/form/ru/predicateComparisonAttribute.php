<?php
$form['predicateComparisonAttribute']=array();
$form['predicateComparisonAttribute']['initial']=array();
$form['predicateComparisonAttribute']['initial']=array('mode'=>'update');
$form['predicateComparisonAttribute']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['predicateComparisonAttribute']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['predicateComparisonAttribute']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['predicateComparisonAttribute']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['predicateComparisonAttribute']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['predicateComparisonAttribute']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['predicateComparisonAttribute']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['predicateComparisonAttribute']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['predicateComparisonAttribute']=array();
$button['predicateComparisonAttribute'][]=array('value'=>'Вставить','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'),'attributes'=>'tabindex=\'0\'');
$button['predicateComparisonAttribute'][]=array('value'=>'Обновить','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'),'attributes'=>'tabindex=\'0\'');
$button['predicateComparisonAttribute'][]=array('value'=>'Удалить','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'),'attributes'=>'tabindex=\'0\'');
$button['predicateComparisonAttribute'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'),'attributes'=>'tabindex=\'0\'');
$button['predicateComparisonAttribute'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'),'attributes'=>'tabindex=\'0\'');
$button['predicateComparisonAttribute'][]=array('value'=>'Отменить изменения','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'),'attributes'=>'tabindex=\'0\'');
$form['predicateComparisonAttribute']['properties']=array('primary_key'=>array('element_rowid'),'table'=>'fgs_element','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'predicate_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['predicateComparisonAttribute']=array();
$e['predicateComparisonAttribute'][0]=array('table'=>'fgs_element','rowid'=>'1429','sid'=>'element_form','fieldset'=>'','name'=>'element_form','label'=>'Форма','component'=>'InputText','hidden'=>1,'type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_form','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'0\'');
$e['predicateComparisonAttribute'][1]=array('table'=>'fgs_element','rowid'=>'1430','sid'=>'element_table','fieldset'=>'','name'=>'element_table','label'=>'Таблица','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_table','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'20\'');
$e['predicateComparisonAttribute'][2]=array('table'=>'fgs_element','rowid'=>'1431','sid'=>'element_field','fieldset'=>'','name'=>'element_field','label'=>'Поле','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'30\'');
$e['predicateComparisonAttribute'][3]=array('table'=>'fgs_element','rowid'=>'1432','sid'=>'element_type','fieldset'=>'','name'=>'element_type','label'=>'Тип','component'=>'InputText','type'=>'varchar','default_value'=>'text','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_type','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'40\'');
$e['predicateComparisonAttribute'][4]=array('table'=>'fgs_element','rowid'=>'10824','sid'=>'element_function','fieldset'=>'','name'=>'element_function','label'=>'Функция SQL','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_function','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['predicateComparisonAttribute'][5]=array('table'=>'fgs_element','rowid'=>'10422','sid'=>'element_operators','fieldset'=>'','name'=>'element_operators','label'=>'Операторы','component'=>'SelectManyListbox','renderer'=>'ManyListbox','size'=>'0','required'=>1,'list_sid'=>'ComparisonTest','list'=>array('options'=>array('equal'=>'Равно','not_equal'=>'Не равно','m'=>'больше','mq'=>'больше или равно','l'=>'меньше','lq'=>'меньше или равно')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'set','field'=>'element_operators','cai'=>1);
$e['predicateComparisonAttribute'][6]=array('table'=>'fgs_element','rowid'=>'1434','sid'=>'element_operator_default','fieldset'=>'','name'=>'element_operator_default','label'=>'Оператор по умолчанию','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ComparisonTest','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('options'=>array('equal'=>'Равно','not_equal'=>'Не равно','m'=>'больше','mq'=>'больше или равно','l'=>'меньше','lq'=>'меньше или равно')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_operator_default','cai'=>1,'attributes'=>'tabindex=\'0\'');
$e['predicateComparisonAttribute'][7]=array('table'=>'fgs_element','rowid'=>'1438','sid'=>'element_fix_operator','fieldset'=>'','name'=>'element_fix_operator','label'=>'Фиксировать оператор ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_fix_operator','cai'=>1);
$e['predicateComparisonAttribute'][8]=array('table'=>'fgs_element','rowid'=>'10423','sid'=>'element_connector','fieldset'=>'','name'=>'element_connector','label'=>'Коннектор','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','list_sid'=>'connector','list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_connector','cai'=>1,'attributes'=>'readonly=\'1\'');
$e['predicateComparisonAttribute'][9]=array('table'=>'fgs_element','rowid'=>'10424','sid'=>'element_fix_connector','fieldset'=>'','name'=>'element_fix_connector','label'=>'Фиксировать коннектор ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_fix_connector','cai'=>1);
$e['predicateComparisonAttribute'][10]=array('table'=>'fgs_element','rowid'=>'1439','sid'=>'element_fieldset','fieldset'=>'','name'=>'element_fieldset','label'=>'Fieldset','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_fieldset','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\' tabindex=\'0\'');
$e['predicateComparisonAttribute'][11]=array('table'=>'fgs_element','rowid'=>'11407','sid'=>'element_get','fieldset'=>'','name'=>'element_get','label'=>'Применять $_GET значения','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_get','cai'=>1);