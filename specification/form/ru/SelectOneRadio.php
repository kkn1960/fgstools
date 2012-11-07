<?php
$form['SelectOneRadio']=array();
$form['SelectOneRadio']['initial']=array();
$form['SelectOneRadio']['initial']=array('mode'=>'update');
$form['SelectOneRadio']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['SelectOneRadio']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneRadio']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneRadio']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneRadio']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneRadio']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneRadio']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneRadio']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['SelectOneRadio']=array();
$button['SelectOneRadio'][]=array('value'=>'Вставить','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['SelectOneRadio'][]=array('value'=>'Обновить','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['SelectOneRadio'][]=array('value'=>'Удалить','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['SelectOneRadio'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['SelectOneRadio'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['SelectOneRadio'][]=array('value'=>'Отменить изменения','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['SelectOneRadio']['properties']=array('primary_key'=>array('element_rowid'),'table'=>'fgs_element','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'element_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['SelectOneRadio']=array();
$e['SelectOneRadio'][0]=array('table'=>'fgs_element','rowid'=>'1970','sid'=>'element_form','fieldset'=>'system_attributes','name'=>'element_form','label'=>'Форма','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_form','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\'');
$e['SelectOneRadio'][1]=array('table'=>'fgs_element','rowid'=>'1973','sid'=>'element_component','fieldset'=>'system_attributes','name'=>'element_component','label'=>'Компонент','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ElementComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ElementComponent','table'=>'fgs_component','from'=>'fgs_component','primary_key'=>'component_sid','select'=>'component_sid id,component_name as name','order'=>'component_name ASC','where'=>'component_type=\'element\'','display_field'=>'component_name'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_component','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'45\'');
$e['SelectOneRadio'][2]=array('table'=>'fgs_element','rowid'=>'1971','sid'=>'element_table','fieldset'=>'system_attributes','name'=>'element_table','label'=>'Таблица','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_table','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'30\'');
$e['SelectOneRadio'][3]=array('table'=>'fgs_element','rowid'=>'11179','sid'=>'element_table_alias','fieldset'=>'system_attributes','name'=>'element_table_alias','label'=>'Алиас таблицы','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_table_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'8\' size=\'8\'');
$e['SelectOneRadio'][4]=array('table'=>'fgs_element','rowid'=>'1972','sid'=>'element_field','fieldset'=>'system_attributes','name'=>'element_field','label'=>'Поле','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'20\'');
$e['SelectOneRadio'][5]=array('table'=>'fgs_element','rowid'=>'11178','sid'=>'element_alias','fieldset'=>'system_attributes','name'=>'element_alias','label'=>'Алиас','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][6]=array('table'=>'fgs_element','rowid'=>'11223','sid'=>'element_sid','fieldset'=>'system_attributes','name'=>'element_sid','label'=>'Sid','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_sid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['SelectOneRadio'][7]=array('table'=>'fgs_element','rowid'=>'1979','sid'=>'element_index','fieldset'=>'system_attributes','name'=>'element_index','label'=>'Индекс','component'=>'InputText','type'=>'smallint','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\'');
$e['SelectOneRadio'][8]=array('table'=>'fgs_element','rowid'=>'11486','sid'=>'element_event','fieldset'=>'system_attributes','name'=>'element_event','label'=>'Уcтановить значение по событию','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_event','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][9]=array('table'=>'fgs_element','rowid'=>'10982','sid'=>'element_fieldset','fieldset'=>'input_attributes','name'=>'element_fieldset','label'=>'Fieldset','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_fieldset','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][10]=array('table'=>'fgs_element','rowid'=>'1974','sid'=>'element_name','fieldset'=>'input_attributes','name'=>'element_name','label'=>'Атрибут name','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_name','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'40\'');
$e['SelectOneRadio'][11]=array('table'=>'fgs_element','rowid'=>'1978','sid'=>'element_label','fieldset'=>'input_attributes','name'=>'element_label','label'=>'Ярлык','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_label','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'32\'');
$e['SelectOneRadio'][12]=array('table'=>'fgs_element','rowid'=>'1985','sid'=>'element_required','fieldset'=>'input_attributes','name'=>'element_required','label'=>'Необходимый','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_required','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'16\'');
$e['SelectOneRadio'][13]=array('table'=>'fgs_element','rowid'=>'1980','sid'=>'element_list','fieldset'=>'input_attributes','name'=>'element_list','label'=>'Список','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'lists','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'lists','table'=>'fgs_list','from'=>'fgs_list','primary_key'=>'list_sid','select'=>'list_sid id,list_sid as name','order'=>'list_sid ASC','display_field'=>'list_sid'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_list','cai'=>1);
$e['SelectOneRadio'][14]=array('table'=>'fgs_element','rowid'=>'1981','sid'=>'element_filter','fieldset'=>'input_attributes','name'=>'element_filter','label'=>'Фильтр','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_filter','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][15]=array('table'=>'fgs_element','rowid'=>'1983','sid'=>'element_layout','fieldset'=>'input_attributes','name'=>'element_layout','label'=>'Направление вывода','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'OptionLayout','list'=>array('options'=>array('0'=>'vertically','1'=>'horizontally')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_layout','cai'=>1);
$e['SelectOneRadio'][16]=array('table'=>'fgs_element','rowid'=>'1984','sid'=>'element_default','fieldset'=>'input_attributes','name'=>'element_default','label'=>'По умолчанию','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_default','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][17]=array('table'=>'fgs_element','rowid'=>'1990','sid'=>'element_register','fieldset'=>'input_attributes','name'=>'element_register','label'=>'Глобальное имя','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_register','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][18]=array('table'=>'fgs_element','rowid'=>'10692','sid'=>'element_cai','fieldset'=>'input_attributes','name'=>'element_cai','label'=>'Обнулить после вставки ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'1','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_cai','cai'=>1);
$e['SelectOneRadio'][19]=array('table'=>'fgs_element','rowid'=>'1975','sid'=>'element_renderer','fieldset'=>'input_attributes','name'=>'element_renderer','label'=>'Визуализатор','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_renderer','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][20]=array('table'=>'fgs_element','rowid'=>'1976','sid'=>'element_converter','fieldset'=>'input_attributes','name'=>'element_converter','label'=>'Конвертер','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_converter','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][21]=array('table'=>'fgs_element','rowid'=>'1986','sid'=>'element_readonly','fieldset'=>'input_attributes','name'=>'element_readonly','label'=>'Readonly','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_readonly','cai'=>1);
$e['SelectOneRadio'][22]=array('table'=>'fgs_element','rowid'=>'1992','sid'=>'element_id','fieldset'=>'input_attributes','name'=>'element_id','label'=>'Id','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_id','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][23]=array('table'=>'fgs_element','rowid'=>'1977','sid'=>'element_value','fieldset'=>'input_attributes','name'=>'element_value','label'=>'Значение','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_value','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$e['SelectOneRadio'][24]=array('table'=>'fgs_element','rowid'=>'1991','sid'=>'element_tabindex','fieldset'=>'input_attributes','name'=>'element_tabindex','label'=>'Tabindex','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_tabindex','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\' tabindex=\'50\'');
$e['SelectOneRadio'][25]=array('table'=>'fgs_element','rowid'=>'1993','sid'=>'element_accesskey','fieldset'=>'input_attributes','name'=>'element_accesskey','label'=>'Accesskey','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_accesskey','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'16\' size=\'16\'');
$e['SelectOneRadio'][26]=array('table'=>'fgs_element','rowid'=>'11358','sid'=>'element_method','fieldset'=>'ajax_attributes','name'=>'element_method','label'=>'Метод','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'post','list_sid'=>'RequestType','list'=>array('options'=>array('post'=>'post','get'=>'get')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_method','cai'=>1);
$e['SelectOneRadio'][27]=array('table'=>'fgs_element','rowid'=>'10691','sid'=>'element_autocomplete','fieldset'=>'ajax_attributes','name'=>'element_autocomplete','label'=>'Номер autocomplete','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_autocomplete','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'16\' size=\'16\'');
$e['SelectOneRadio'][28]=array('table'=>'fgs_element','rowid'=>'10574','sid'=>'element_chain','fieldset'=>'ajax_attributes','name'=>'element_chain','label'=>'Цепочка select','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_chain','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'4\' size=\'4\'');
$e['SelectOneRadio'][29]=array('table'=>'fgs_element','rowid'=>'10593','sid'=>'element_tier','fieldset'=>'ajax_attributes','name'=>'element_tier','label'=>'Уровень в цепочке select','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_tier','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][30]=array('table'=>'fgs_element','rowid'=>'11134','sid'=>'element_chain_role','fieldset'=>'ajax_attributes','name'=>'element_chain_role','label'=>'Роль в цепочке select','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','list_sid'=>'ChainRole','list'=>array('options'=>array('member'=>'участник','parameter'=>'параметер')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_chain_role','cai'=>1);
$e['SelectOneRadio'][31]=array('table'=>'fgs_element','rowid'=>'11115','sid'=>'element_before_request','fieldset'=>'ajax_attributes','name'=>'element_before_request','label'=>'Функция до запроса','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_before_request','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][32]=array('table'=>'fgs_element','rowid'=>'11133','sid'=>'element_after_request','fieldset'=>'ajax_attributes','name'=>'element_after_request','label'=>'Функция после запроса','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_after_request','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][33]=array('table'=>'fgs_element','rowid'=>'11387','sid'=>'element_url','fieldset'=>'ajax_attributes','name'=>'element_url','label'=>'URL','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_url','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][34]=array('table'=>'fgs_element','rowid'=>'10610','sid'=>'element_callback','fieldset'=>'ajax_attributes','name'=>'element_callback','label'=>'Функция callback','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_callback','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['SelectOneRadio'][35]=array('table'=>'fgs_element','rowid'=>'1995','sid'=>'element_onblur','fieldset'=>'events','name'=>'element_onblur','label'=>'Onblur','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onblur','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][36]=array('table'=>'fgs_element','rowid'=>'1996','sid'=>'element_onchange','fieldset'=>'events','name'=>'element_onchange','label'=>'Onchange','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onchange','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][37]=array('table'=>'fgs_element','rowid'=>'1997','sid'=>'element_onclick','fieldset'=>'events','name'=>'element_onclick','label'=>'Onclick','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onclick','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][38]=array('table'=>'fgs_element','rowid'=>'1998','sid'=>'element_ondblclick','fieldset'=>'events','name'=>'element_ondblclick','label'=>'Ondblclick','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_ondblclick','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][39]=array('table'=>'fgs_element','rowid'=>'1999','sid'=>'element_onfocus','fieldset'=>'events','name'=>'element_onfocus','label'=>'Onfocus','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onfocus','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][40]=array('table'=>'fgs_element','rowid'=>'2000','sid'=>'element_onkeydown','fieldset'=>'events','name'=>'element_onkeydown','label'=>'Onkeydown','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeydown','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][41]=array('table'=>'fgs_element','rowid'=>'2001','sid'=>'element_onkeypress','fieldset'=>'events','name'=>'element_onkeypress','label'=>'Onkeypress','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeypress','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][42]=array('table'=>'fgs_element','rowid'=>'2002','sid'=>'element_onkeyup','fieldset'=>'events','name'=>'element_onkeyup','label'=>'Onkeyup','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeyup','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][43]=array('table'=>'fgs_element','rowid'=>'2003','sid'=>'element_onmousedown','fieldset'=>'events','name'=>'element_onmousedown','label'=>'Onmousedown','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmousedown','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][44]=array('table'=>'fgs_element','rowid'=>'2004','sid'=>'element_onmousemove','fieldset'=>'events','name'=>'element_onmousemove','label'=>'Onmousemove','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmousemove','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][45]=array('table'=>'fgs_element','rowid'=>'2005','sid'=>'element_onmouseout','fieldset'=>'events','name'=>'element_onmouseout','label'=>'Onmouseout','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseout','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][46]=array('table'=>'fgs_element','rowid'=>'2006','sid'=>'element_onmouseover','fieldset'=>'events','name'=>'element_onmouseover','label'=>'Onmouseover','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseover','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][47]=array('table'=>'fgs_element','rowid'=>'2007','sid'=>'element_onmouseup','fieldset'=>'events','name'=>'element_onmouseup','label'=>'Onmouseup','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseup','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['SelectOneRadio'][48]=array('table'=>'fgs_element','rowid'=>'2008','sid'=>'element_onselect','fieldset'=>'events','name'=>'element_onselect','label'=>'Onselect','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onselect','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');