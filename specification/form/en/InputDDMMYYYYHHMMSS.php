<?php
$form['InputDDMMYYYYHHMMSS']=array();
$form['InputDDMMYYYYHHMMSS']['initial']=array();
$form['InputDDMMYYYYHHMMSS']['initial']=array('mode'=>'update');
$form['InputDDMMYYYYHHMMSS']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['InputDDMMYYYYHHMMSS']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputDDMMYYYYHHMMSS']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputDDMMYYYYHHMMSS']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputDDMMYYYYHHMMSS']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputDDMMYYYYHHMMSS']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputDDMMYYYYHHMMSS']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputDDMMYYYYHHMMSS']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['InputDDMMYYYYHHMMSS']=array();
$button['InputDDMMYYYYHHMMSS'][]=array('value'=>'Insert','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'),'attributes'=>'tabindex=\'0\'');
$button['InputDDMMYYYYHHMMSS'][]=array('value'=>'Update','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'),'attributes'=>'tabindex=\'0\'');
$button['InputDDMMYYYYHHMMSS'][]=array('value'=>'Remove','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'),'attributes'=>'tabindex=\'0\'');
$button['InputDDMMYYYYHHMMSS'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'),'attributes'=>'tabindex=\'0\'');
$button['InputDDMMYYYYHHMMSS'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'),'attributes'=>'tabindex=\'0\'');
$button['InputDDMMYYYYHHMMSS'][]=array('value'=>'Reset','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'),'attributes'=>'tabindex=\'0\'');
$form['InputDDMMYYYYHHMMSS']['properties']=array('primary_key'=>array('element_rowid'),'table'=>'fgs_element','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'element_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['InputDDMMYYYYHHMMSS']=array();
$e['InputDDMMYYYYHHMMSS'][0]=array('table'=>'fgs_element','rowid'=>'976','sid'=>'element_file','fieldset'=>'system_attributes','name'=>'element_file','label'=>'Element_file','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_file','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputDDMMYYYYHHMMSS'][1]=array('table'=>'fgs_element','rowid'=>'970','sid'=>'element_form','fieldset'=>'system_attributes','name'=>'element_form','label'=>'Form','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_form','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][2]=array('table'=>'fgs_element','rowid'=>'973','sid'=>'element_component','fieldset'=>'system_attributes','name'=>'element_component','label'=>'Component','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ElementComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ElementComponent','table'=>'fgs_component','from'=>'fgs_component','primary_key'=>'component_sid','select'=>'component_sid id,component_name as name','order'=>'component_name ASC','where'=>'component_type=\'element\'','display_field'=>'component_name'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_component','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'45\'');
$e['InputDDMMYYYYHHMMSS'][3]=array('table'=>'fgs_element','rowid'=>'971','sid'=>'element_table','fieldset'=>'system_attributes','name'=>'element_table','label'=>'Table','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_table','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'30\'');
$e['InputDDMMYYYYHHMMSS'][4]=array('table'=>'fgs_element','rowid'=>'11197','sid'=>'element_table_alias','fieldset'=>'system_attributes','name'=>'element_table_alias','label'=>'Table alias','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_table_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'8\' size=\'8\'');
$e['InputDDMMYYYYHHMMSS'][5]=array('table'=>'fgs_element','rowid'=>'972','sid'=>'element_field','fieldset'=>'system_attributes','name'=>'element_field','label'=>'Field','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'20\'');
$e['InputDDMMYYYYHHMMSS'][6]=array('table'=>'fgs_element','rowid'=>'11195','sid'=>'element_alias','fieldset'=>'system_attributes','name'=>'element_alias','label'=>'Alias','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputDDMMYYYYHHMMSS'][7]=array('table'=>'fgs_element','rowid'=>'11196','sid'=>'element_sid','fieldset'=>'system_attributes','name'=>'element_sid','label'=>'Sid','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_sid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['InputDDMMYYYYHHMMSS'][8]=array('table'=>'fgs_element','rowid'=>'981','sid'=>'element_index','fieldset'=>'system_attributes','name'=>'element_index','label'=>'Index','component'=>'InputText','type'=>'smallint','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\'');
$e['InputDDMMYYYYHHMMSS'][9]=array('table'=>'fgs_element','rowid'=>'10962','sid'=>'element_fieldset','fieldset'=>'input_attributes','name'=>'element_fieldset','label'=>'Fieldset','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_fieldset','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputDDMMYYYYHHMMSS'][10]=array('table'=>'fgs_element','rowid'=>'974','sid'=>'element_name','fieldset'=>'input_attributes','name'=>'element_name','label'=>'Attribute name','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_name','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'40\'');
$e['InputDDMMYYYYHHMMSS'][11]=array('table'=>'fgs_element','rowid'=>'980','sid'=>'element_label','fieldset'=>'input_attributes','name'=>'element_label','label'=>'Label','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_label','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'32\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][12]=array('table'=>'fgs_element','rowid'=>'983','sid'=>'element_required','fieldset'=>'input_attributes','name'=>'element_required','label'=>'Required','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_required','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'16\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][13]=array('table'=>'fgs_element','rowid'=>'982','sid'=>'element_default','fieldset'=>'input_attributes','name'=>'element_default','label'=>'Default','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_default','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][14]=array('table'=>'fgs_element','rowid'=>'988','sid'=>'element_register','fieldset'=>'input_attributes','name'=>'element_register','label'=>'Global name','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_register','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputDDMMYYYYHHMMSS'][15]=array('table'=>'fgs_element','rowid'=>'977','sid'=>'element_renderer','fieldset'=>'input_attributes','name'=>'element_renderer','label'=>'Renderer','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_renderer','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][16]=array('table'=>'fgs_element','rowid'=>'978','sid'=>'element_converter','fieldset'=>'input_attributes','name'=>'element_converter','label'=>'Converter','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_converter','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][17]=array('table'=>'fgs_element','rowid'=>'984','sid'=>'element_readonly','fieldset'=>'input_attributes','name'=>'element_readonly','label'=>'Readonly','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_readonly','cai'=>1,'attributes'=>'tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][18]=array('table'=>'fgs_element','rowid'=>'990','sid'=>'element_id','fieldset'=>'input_attributes','name'=>'element_id','label'=>'Id','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_id','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][19]=array('table'=>'fgs_element','rowid'=>'979','sid'=>'element_value','fieldset'=>'input_attributes','name'=>'element_value','label'=>'Value','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_value','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$e['InputDDMMYYYYHHMMSS'][20]=array('table'=>'fgs_element','rowid'=>'989','sid'=>'element_tabindex','fieldset'=>'input_attributes','name'=>'element_tabindex','label'=>'Tabindex','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_tabindex','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\' tabindex=\'50\'');
$e['InputDDMMYYYYHHMMSS'][21]=array('table'=>'fgs_element','rowid'=>'991','sid'=>'element_accesskey','fieldset'=>'input_attributes','name'=>'element_accesskey','label'=>'Accesskey','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_accesskey','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'16\' size=\'16\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][22]=array('table'=>'fgs_element','rowid'=>'11144','sid'=>'element_autocomplete','fieldset'=>'ajax_attributes','name'=>'element_autocomplete','label'=>'Autocomplete number','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_autocomplete','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['InputDDMMYYYYHHMMSS'][23]=array('table'=>'fgs_element','rowid'=>'11145','sid'=>'element_chain','fieldset'=>'ajax_attributes','name'=>'element_chain','label'=>'Select chain','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_chain','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['InputDDMMYYYYHHMMSS'][24]=array('table'=>'fgs_element','rowid'=>'11146','sid'=>'element_tier','fieldset'=>'ajax_attributes','name'=>'element_tier','label'=>'Tier in select chain','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_tier','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputDDMMYYYYHHMMSS'][25]=array('table'=>'fgs_element','rowid'=>'993','sid'=>'element_onblur','fieldset'=>'events','name'=>'element_onblur','label'=>'Onblur','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onblur','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][26]=array('table'=>'fgs_element','rowid'=>'994','sid'=>'element_onchange','fieldset'=>'events','name'=>'element_onchange','label'=>'Onchange','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onchange','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][27]=array('table'=>'fgs_element','rowid'=>'995','sid'=>'element_onclick','fieldset'=>'events','name'=>'element_onclick','label'=>'Onclick','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onclick','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][28]=array('table'=>'fgs_element','rowid'=>'996','sid'=>'element_ondblclick','fieldset'=>'events','name'=>'element_ondblclick','label'=>'Ondblclick','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_ondblclick','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][29]=array('table'=>'fgs_element','rowid'=>'997','sid'=>'element_onfocus','fieldset'=>'events','name'=>'element_onfocus','label'=>'Onfocus','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onfocus','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][30]=array('table'=>'fgs_element','rowid'=>'998','sid'=>'element_onkeydown','fieldset'=>'events','name'=>'element_onkeydown','label'=>'Onkeydown','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeydown','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][31]=array('table'=>'fgs_element','rowid'=>'999','sid'=>'element_onkeypress','fieldset'=>'events','name'=>'element_onkeypress','label'=>'Onkeypress','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeypress','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][32]=array('table'=>'fgs_element','rowid'=>'1000','sid'=>'element_onkeyup','fieldset'=>'events','name'=>'element_onkeyup','label'=>'Onkeyup','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeyup','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][33]=array('table'=>'fgs_element','rowid'=>'1001','sid'=>'element_onmousedown','fieldset'=>'events','name'=>'element_onmousedown','label'=>'Onmousedown','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmousedown','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][34]=array('table'=>'fgs_element','rowid'=>'1002','sid'=>'element_onmousemove','fieldset'=>'events','name'=>'element_onmousemove','label'=>'Onmousemove','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmousemove','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][35]=array('table'=>'fgs_element','rowid'=>'1003','sid'=>'element_onmouseout','fieldset'=>'events','name'=>'element_onmouseout','label'=>'Onmouseout','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseout','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][36]=array('table'=>'fgs_element','rowid'=>'1004','sid'=>'element_onmouseover','fieldset'=>'events','name'=>'element_onmouseover','label'=>'Onmouseover','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseover','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][37]=array('table'=>'fgs_element','rowid'=>'1005','sid'=>'element_onmouseup','fieldset'=>'events','name'=>'element_onmouseup','label'=>'Onmouseup','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseup','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');
$e['InputDDMMYYYYHHMMSS'][38]=array('table'=>'fgs_element','rowid'=>'1006','sid'=>'element_onselect','fieldset'=>'events','name'=>'element_onselect','label'=>'Onselect','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onselect','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'0\'');