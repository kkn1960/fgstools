<?php
$form['InputHHMMSS']=array();
$form['InputHHMMSS']['initial']=array();
$form['InputHHMMSS']['initial']=array('mode'=>'update');
$form['InputHHMMSS']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['InputHHMMSS']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputHHMMSS']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputHHMMSS']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputHHMMSS']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputHHMMSS']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputHHMMSS']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputHHMMSS']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['InputHHMMSS']=array();
$button['InputHHMMSS'][]=array('value'=>'Вставить','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'),'attributes'=>'tabindex=\'0\'');
$button['InputHHMMSS'][]=array('value'=>'Обновить','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'),'attributes'=>'tabindex=\'0\'');
$button['InputHHMMSS'][]=array('value'=>'Удалить','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'),'attributes'=>'tabindex=\'0\'');
$button['InputHHMMSS'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'),'attributes'=>'tabindex=\'0\'');
$button['InputHHMMSS'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'),'attributes'=>'tabindex=\'0\'');
$button['InputHHMMSS'][]=array('value'=>'Отменить изменения','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'),'attributes'=>'tabindex=\'0\'');
$form['InputHHMMSS']['properties']=array('primary_key'=>array('element_rowid'),'table'=>'fgs_element','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'element_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['InputHHMMSS']=array();
$e['InputHHMMSS'][0]=array('table'=>'fgs_element','rowid'=>'1056','sid'=>'element_form','fieldset'=>'system_attributes','name'=>'element_form','label'=>'Форма','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_form','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][1]=array('table'=>'fgs_element','rowid'=>'1059','sid'=>'element_component','fieldset'=>'system_attributes','name'=>'element_component','label'=>'Компонент','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ElementComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ElementComponent','table'=>'fgs_component','from'=>'fgs_component','primary_key'=>'component_sid','select'=>'component_sid id,component_name as name','order'=>'component_name ASC','where'=>'component_type=\'element\'','display_field'=>'component_name'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_component','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'45\'');
$e['InputHHMMSS'][2]=array('table'=>'fgs_element','rowid'=>'1057','sid'=>'element_table','fieldset'=>'system_attributes','name'=>'element_table','label'=>'Таблица','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_table','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'30\'');
$e['InputHHMMSS'][3]=array('table'=>'fgs_element','rowid'=>'11204','sid'=>'element_table_alias','fieldset'=>'system_attributes','name'=>'element_table_alias','label'=>'Алиас таблицы','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_table_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'8\' size=\'8\'');
$e['InputHHMMSS'][4]=array('table'=>'fgs_element','rowid'=>'1058','sid'=>'element_field','fieldset'=>'system_attributes','name'=>'element_field','label'=>'Поле','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'20\'');
$e['InputHHMMSS'][5]=array('table'=>'fgs_element','rowid'=>'11202','sid'=>'element_alias','fieldset'=>'system_attributes','name'=>'element_alias','label'=>'Алиас','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputHHMMSS'][6]=array('table'=>'fgs_element','rowid'=>'11203','sid'=>'element_sid','fieldset'=>'system_attributes','name'=>'element_sid','label'=>'Sid','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_sid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['InputHHMMSS'][7]=array('table'=>'fgs_element','rowid'=>'1065','sid'=>'element_index','fieldset'=>'system_attributes','name'=>'element_index','label'=>'Индекс','component'=>'InputText','type'=>'smallint','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\'');
$e['InputHHMMSS'][8]=array('table'=>'fgs_element','rowid'=>'10964','sid'=>'element_fieldset','fieldset'=>'input_attributes','name'=>'element_fieldset','label'=>'Fieldset','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_fieldset','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputHHMMSS'][9]=array('table'=>'fgs_element','rowid'=>'1060','sid'=>'element_name','fieldset'=>'input_attributes','name'=>'element_name','label'=>'Атрибут name','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_name','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'40\'');
$e['InputHHMMSS'][10]=array('table'=>'fgs_element','rowid'=>'1064','sid'=>'element_label','fieldset'=>'input_attributes','name'=>'element_label','label'=>'Ярлык','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_label','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'32\' tabindex=\'0\'');
$e['InputHHMMSS'][11]=array('table'=>'fgs_element','rowid'=>'1067','sid'=>'element_required','fieldset'=>'input_attributes','name'=>'element_required','label'=>'Необходимый','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_required','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'16\' tabindex=\'0\'');
$e['InputHHMMSS'][12]=array('table'=>'fgs_element','rowid'=>'1066','sid'=>'element_default','fieldset'=>'input_attributes','name'=>'element_default','label'=>'По умолчанию','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_default','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][13]=array('table'=>'fgs_element','rowid'=>'1072','sid'=>'element_register','fieldset'=>'input_attributes','name'=>'element_register','label'=>'Глобальное имя','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_register','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputHHMMSS'][14]=array('table'=>'fgs_element','rowid'=>'1061','sid'=>'element_renderer','fieldset'=>'input_attributes','name'=>'element_renderer','label'=>'Визуализатор','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_renderer','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][15]=array('table'=>'fgs_element','rowid'=>'1062','sid'=>'element_converter','fieldset'=>'input_attributes','name'=>'element_converter','label'=>'Конвертер','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_converter','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][16]=array('table'=>'fgs_element','rowid'=>'1068','sid'=>'element_readonly','fieldset'=>'input_attributes','name'=>'element_readonly','label'=>'Readonly','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_readonly','cai'=>1,'attributes'=>'tabindex=\'0\'');
$e['InputHHMMSS'][17]=array('table'=>'fgs_element','rowid'=>'1074','sid'=>'element_id','fieldset'=>'input_attributes','name'=>'element_id','label'=>'Id','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_id','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][18]=array('table'=>'fgs_element','rowid'=>'1063','sid'=>'element_value','fieldset'=>'input_attributes','name'=>'element_value','label'=>'Значение','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_value','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$e['InputHHMMSS'][19]=array('table'=>'fgs_element','rowid'=>'1073','sid'=>'element_tabindex','fieldset'=>'input_attributes','name'=>'element_tabindex','label'=>'Tabindex','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_tabindex','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\' tabindex=\'50\'');
$e['InputHHMMSS'][20]=array('table'=>'fgs_element','rowid'=>'1075','sid'=>'element_accesskey','fieldset'=>'input_attributes','name'=>'element_accesskey','label'=>'Accesskey','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_accesskey','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'16\' size=\'16\' tabindex=\'0\'');
$e['InputHHMMSS'][21]=array('table'=>'fgs_element','rowid'=>'11151','sid'=>'element_autocomplete','fieldset'=>'ajax_attributes','name'=>'element_autocomplete','label'=>'Номер autocomplete','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_autocomplete','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['InputHHMMSS'][22]=array('table'=>'fgs_element','rowid'=>'11152','sid'=>'element_chain','fieldset'=>'ajax_attributes','name'=>'element_chain','label'=>'Цепочка select','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_chain','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['InputHHMMSS'][23]=array('table'=>'fgs_element','rowid'=>'11153','sid'=>'element_tier','fieldset'=>'ajax_attributes','name'=>'element_tier','label'=>'Уровень в цепочке select','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_tier','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputHHMMSS'][24]=array('table'=>'fgs_element','rowid'=>'1077','sid'=>'element_onblur','fieldset'=>'events','name'=>'element_onblur','label'=>'Onblur','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onblur','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][25]=array('table'=>'fgs_element','rowid'=>'1078','sid'=>'element_onchange','fieldset'=>'events','name'=>'element_onchange','label'=>'Onchange','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onchange','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][26]=array('table'=>'fgs_element','rowid'=>'1079','sid'=>'element_onclick','fieldset'=>'events','name'=>'element_onclick','label'=>'Onclick','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onclick','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][27]=array('table'=>'fgs_element','rowid'=>'1080','sid'=>'element_ondblclick','fieldset'=>'events','name'=>'element_ondblclick','label'=>'Ondblclick','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_ondblclick','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][28]=array('table'=>'fgs_element','rowid'=>'1081','sid'=>'element_onfocus','fieldset'=>'events','name'=>'element_onfocus','label'=>'Onfocus','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onfocus','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][29]=array('table'=>'fgs_element','rowid'=>'1082','sid'=>'element_onkeydown','fieldset'=>'events','name'=>'element_onkeydown','label'=>'Onkeydown','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeydown','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][30]=array('table'=>'fgs_element','rowid'=>'1083','sid'=>'element_onkeypress','fieldset'=>'events','name'=>'element_onkeypress','label'=>'Onkeypress','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeypress','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][31]=array('table'=>'fgs_element','rowid'=>'1084','sid'=>'element_onkeyup','fieldset'=>'events','name'=>'element_onkeyup','label'=>'Onkeyup','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeyup','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][32]=array('table'=>'fgs_element','rowid'=>'1085','sid'=>'element_onmousedown','fieldset'=>'events','name'=>'element_onmousedown','label'=>'Onmousedown','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmousedown','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][33]=array('table'=>'fgs_element','rowid'=>'1086','sid'=>'element_onmousemove','fieldset'=>'events','name'=>'element_onmousemove','label'=>'Onmousemove','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmousemove','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][34]=array('table'=>'fgs_element','rowid'=>'1087','sid'=>'element_onmouseout','fieldset'=>'events','name'=>'element_onmouseout','label'=>'Onmouseout','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseout','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][35]=array('table'=>'fgs_element','rowid'=>'1088','sid'=>'element_onmouseover','fieldset'=>'events','name'=>'element_onmouseover','label'=>'Onmouseover','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseover','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][36]=array('table'=>'fgs_element','rowid'=>'1089','sid'=>'element_onmouseup','fieldset'=>'events','name'=>'element_onmouseup','label'=>'Onmouseup','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseup','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputHHMMSS'][37]=array('table'=>'fgs_element','rowid'=>'1090','sid'=>'element_onselect','fieldset'=>'events','name'=>'element_onselect','label'=>'Onselect','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onselect','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');