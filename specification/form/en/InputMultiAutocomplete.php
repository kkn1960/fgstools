<?php
$form['InputMultiAutocomplete']=array();
$form['InputMultiAutocomplete']['initial']=array();
$form['InputMultiAutocomplete']['initial']=array('mode'=>'update');
$form['InputMultiAutocomplete']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['InputMultiAutocomplete']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputMultiAutocomplete']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputMultiAutocomplete']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputMultiAutocomplete']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputMultiAutocomplete']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputMultiAutocomplete']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['InputMultiAutocomplete']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['InputMultiAutocomplete']=array();
$button['InputMultiAutocomplete'][]=array('value'=>'Insert','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['InputMultiAutocomplete'][]=array('value'=>'Update','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['InputMultiAutocomplete'][]=array('value'=>'Remove','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['InputMultiAutocomplete'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['InputMultiAutocomplete'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['InputMultiAutocomplete'][]=array('value'=>'Reset','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['InputMultiAutocomplete']['properties']=array('primary_key'=>array('element_rowid'),'table'=>'fgs_element','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'element_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['InputMultiAutocomplete']=array();
$e['InputMultiAutocomplete'][0]=array('table'=>'fgs_element','rowid'=>'11423','sid'=>'element_form','fieldset'=>'system_attributes','name'=>'element_form','label'=>'Form','trim'=>'trim','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_form','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\'');
$e['InputMultiAutocomplete'][1]=array('table'=>'fgs_element','rowid'=>'11426','sid'=>'element_component','fieldset'=>'system_attributes','name'=>'element_component','label'=>'Component','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ElementComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ElementComponent','table'=>'fgs_component','from'=>'fgs_component','primary_key'=>'component_sid','select'=>'component_sid id,component_name as name','order'=>'component_name ASC','where'=>'component_type=\'element\'','display_field'=>'component_name'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_component','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'45\'');
$e['InputMultiAutocomplete'][2]=array('table'=>'fgs_element','rowid'=>'11424','sid'=>'element_table','fieldset'=>'system_attributes','name'=>'element_table','label'=>'Table','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_table','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'30\'');
$e['InputMultiAutocomplete'][3]=array('table'=>'fgs_element','rowid'=>'11467','sid'=>'element_table_alias','fieldset'=>'system_attributes','name'=>'element_table_alias','label'=>'Table alias','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_table_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'8\' size=\'8\'');
$e['InputMultiAutocomplete'][4]=array('table'=>'fgs_element','rowid'=>'11425','sid'=>'element_field','fieldset'=>'system_attributes','name'=>'element_field','label'=>'Field','trim'=>'trim','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'20\'');
$e['InputMultiAutocomplete'][5]=array('table'=>'fgs_element','rowid'=>'11466','sid'=>'element_alias','fieldset'=>'system_attributes','name'=>'element_alias','label'=>'Alias','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputMultiAutocomplete'][6]=array('table'=>'fgs_element','rowid'=>'11468','sid'=>'element_sid','fieldset'=>'system_attributes','name'=>'element_sid','label'=>'Sid','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_sid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['InputMultiAutocomplete'][7]=array('table'=>'fgs_element','rowid'=>'11432','sid'=>'element_index','fieldset'=>'system_attributes','name'=>'element_index','label'=>'Index','component'=>'InputText','type'=>'smallint','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\'');
$e['InputMultiAutocomplete'][8]=array('table'=>'fgs_element','rowid'=>'11483','sid'=>'element_event','fieldset'=>'system_attributes','name'=>'element_event','label'=>'Set value by event','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_event','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputMultiAutocomplete'][9]=array('table'=>'fgs_element','rowid'=>'11462','sid'=>'element_fieldset','fieldset'=>'input_attributes','name'=>'element_fieldset','label'=>'Fieldset','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_fieldset','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputMultiAutocomplete'][10]=array('table'=>'fgs_element','rowid'=>'11427','sid'=>'element_name','fieldset'=>'input_attributes','name'=>'element_name','label'=>'Attribute name','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_name','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'40\'');
$e['InputMultiAutocomplete'][11]=array('table'=>'fgs_element','rowid'=>'11431','sid'=>'element_label','fieldset'=>'input_attributes','name'=>'element_label','label'=>'Label','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_label','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'32\'');
$e['InputMultiAutocomplete'][12]=array('table'=>'fgs_element','rowid'=>'11437','sid'=>'element_required','fieldset'=>'input_attributes','name'=>'element_required','label'=>'Required','trim'=>'trim','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_required','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'16\'');
$e['InputMultiAutocomplete'][13]=array('table'=>'fgs_element','rowid'=>'11433','sid'=>'element_list','fieldset'=>'input_attributes','name'=>'element_list','label'=>'List','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'lists','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'lists','table'=>'fgs_list','from'=>'fgs_list','primary_key'=>'list_sid','select'=>'list_sid id,list_sid as name','order'=>'list_sid ASC','display_field'=>'list_sid'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_list','cai'=>1);
$e['InputMultiAutocomplete'][14]=array('table'=>'fgs_element','rowid'=>'11434','sid'=>'element_filter','fieldset'=>'input_attributes','name'=>'element_filter','label'=>'Filter','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_filter','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][15]=array('table'=>'fgs_element','rowid'=>'11435','sid'=>'element_null_option','fieldset'=>'input_attributes','name'=>'element_null_option','label'=>'Null option','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_null_option','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['InputMultiAutocomplete'][16]=array('table'=>'fgs_element','rowid'=>'11436','sid'=>'element_default','fieldset'=>'input_attributes','name'=>'element_default','label'=>'Default','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_default','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputMultiAutocomplete'][17]=array('table'=>'fgs_element','rowid'=>'11439','sid'=>'element_register','fieldset'=>'input_attributes','name'=>'element_register','label'=>'Global name','trim'=>'trim','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_register','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputMultiAutocomplete'][18]=array('table'=>'fgs_element','rowid'=>'11457','sid'=>'element_cai','fieldset'=>'input_attributes','name'=>'element_cai','label'=>'Clear after insert ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'1','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_cai','cai'=>1);
$e['InputMultiAutocomplete'][19]=array('table'=>'fgs_element','rowid'=>'11415','sid'=>'element_size','fieldset'=>'input_attributes','name'=>'element_size','label'=>'Size','component'=>'InputText','type'=>'tinyint','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_size','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'3\' size=\'3\'');
$e['InputMultiAutocomplete'][20]=array('table'=>'fgs_element','rowid'=>'11416','sid'=>'element_maxlength','fieldset'=>'input_attributes','name'=>'element_maxlength','label'=>'Maxlength','component'=>'InputText','type'=>'int','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_maxlength','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'3\' size=\'3\'');
$e['InputMultiAutocomplete'][21]=array('table'=>'fgs_element','rowid'=>'11428','sid'=>'element_renderer','fieldset'=>'input_attributes','name'=>'element_renderer','label'=>'Renderer','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_renderer','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputMultiAutocomplete'][22]=array('table'=>'fgs_element','rowid'=>'11429','sid'=>'element_converter','fieldset'=>'input_attributes','name'=>'element_converter','label'=>'Converter','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_converter','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputMultiAutocomplete'][23]=array('table'=>'fgs_element','rowid'=>'11438','sid'=>'element_readonly','fieldset'=>'input_attributes','name'=>'element_readonly','label'=>'Readonly','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_readonly','cai'=>1);
$e['InputMultiAutocomplete'][24]=array('table'=>'fgs_element','rowid'=>'11441','sid'=>'element_id','fieldset'=>'input_attributes','name'=>'element_id','label'=>'Id','trim'=>'trim','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_id','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputMultiAutocomplete'][25]=array('table'=>'fgs_element','rowid'=>'11430','sid'=>'element_value','fieldset'=>'input_attributes','name'=>'element_value','label'=>'Value','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_value','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$e['InputMultiAutocomplete'][26]=array('table'=>'fgs_element','rowid'=>'11440','sid'=>'element_tabindex','fieldset'=>'input_attributes','name'=>'element_tabindex','label'=>'Tabindex','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_tabindex','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\' tabindex=\'50\'');
$e['InputMultiAutocomplete'][27]=array('table'=>'fgs_element','rowid'=>'11442','sid'=>'element_accesskey','fieldset'=>'input_attributes','name'=>'element_accesskey','label'=>'Accesskey','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_accesskey','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'16\' size=\'16\'');
$e['InputMultiAutocomplete'][28]=array('table'=>'fgs_element','rowid'=>'11460','sid'=>'element_method','fieldset'=>'ajax_attributes','name'=>'element_method','label'=>'Method','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','list_sid'=>'RequestType','list'=>array('options'=>array('post'=>'post','get'=>'get')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_method','cai'=>1);
$e['InputMultiAutocomplete'][29]=array('table'=>'fgs_element','rowid'=>'11458','sid'=>'element_autocomplete','fieldset'=>'ajax_attributes','name'=>'element_autocomplete','label'=>'Autocomplete number','trim'=>'trim','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_autocomplete','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'16\' size=\'16\'');
$e['InputMultiAutocomplete'][30]=array('table'=>'fgs_element','rowid'=>'11474','sid'=>'element_token','fieldset'=>'ajax_attributes','name'=>'element_token','label'=>'Токен','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_token','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'8\' size=\'8\'');
$e['InputMultiAutocomplete'][31]=array('table'=>'fgs_element','rowid'=>'11473','sid'=>'element_search_field','fieldset'=>'ajax_attributes','name'=>'element_search_field','label'=>'Search field','trim'=>'trim','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_search_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$e['InputMultiAutocomplete'][32]=array('table'=>'fgs_element','rowid'=>'11472','sid'=>'element_min_chars','fieldset'=>'ajax_attributes','name'=>'element_min_chars','label'=>'Min chars for request','component'=>'InputText','type'=>'tinyint','required'=>1,'default_value'=>'2','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_min_chars','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'4\' size=\'4\'');
$e['InputMultiAutocomplete'][33]=array('table'=>'fgs_element','rowid'=>'11471','sid'=>'element_max_options','fieldset'=>'ajax_attributes','name'=>'element_max_options','label'=>'Max of list options','component'=>'InputText','type'=>'tinyint','required'=>1,'default_value'=>'20','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_max_options','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'4\' size=\'4\'');
$e['InputMultiAutocomplete'][34]=array('table'=>'fgs_element','rowid'=>'11469','sid'=>'element_chain','fieldset'=>'ajax_attributes','name'=>'element_chain','label'=>'Select chain','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_chain','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['InputMultiAutocomplete'][35]=array('table'=>'fgs_element','rowid'=>'11470','sid'=>'element_tier','fieldset'=>'ajax_attributes','name'=>'element_tier','label'=>'Tier in select chain','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_tier','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputMultiAutocomplete'][36]=array('table'=>'fgs_element','rowid'=>'11463','sid'=>'element_before_request','fieldset'=>'ajax_attributes','name'=>'element_before_request','label'=>'Before request function','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_before_request','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputMultiAutocomplete'][37]=array('table'=>'fgs_element','rowid'=>'11464','sid'=>'element_after_request','fieldset'=>'ajax_attributes','name'=>'element_after_request','label'=>'After request function','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_after_request','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputMultiAutocomplete'][38]=array('table'=>'fgs_element','rowid'=>'11459','sid'=>'element_url','fieldset'=>'ajax_attributes','name'=>'element_url','label'=>'URL','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_url','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'64\'');
$e['InputMultiAutocomplete'][39]=array('table'=>'fgs_element','rowid'=>'11465','sid'=>'element_callback','fieldset'=>'ajax_attributes','name'=>'element_callback','label'=>'Callback function','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_callback','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['InputMultiAutocomplete'][40]=array('table'=>'fgs_element','rowid'=>'11461','sid'=>'element_timeout','fieldset'=>'ajax_attributes','name'=>'element_timeout','label'=>'Timeout','component'=>'InputText','type'=>'int','required'=>1,'default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_timeout','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'11\' size=\'11\'');
$e['InputMultiAutocomplete'][41]=array('table'=>'fgs_element','rowid'=>'11443','sid'=>'element_onblur','fieldset'=>'events','name'=>'element_onblur','label'=>'Onblur','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onblur','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][42]=array('table'=>'fgs_element','rowid'=>'11444','sid'=>'element_onchange','fieldset'=>'events','name'=>'element_onchange','label'=>'Onchange','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onchange','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][43]=array('table'=>'fgs_element','rowid'=>'11445','sid'=>'element_onclick','fieldset'=>'events','name'=>'element_onclick','label'=>'Onclick','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onclick','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][44]=array('table'=>'fgs_element','rowid'=>'11446','sid'=>'element_ondblclick','fieldset'=>'events','name'=>'element_ondblclick','label'=>'Ondblclick','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_ondblclick','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][45]=array('table'=>'fgs_element','rowid'=>'11447','sid'=>'element_onfocus','fieldset'=>'events','name'=>'element_onfocus','label'=>'Onfocus','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onfocus','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][46]=array('table'=>'fgs_element','rowid'=>'11448','sid'=>'element_onkeydown','fieldset'=>'events','name'=>'element_onkeydown','label'=>'Onkeydown','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeydown','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][47]=array('table'=>'fgs_element','rowid'=>'11449','sid'=>'element_onkeypress','fieldset'=>'events','name'=>'element_onkeypress','label'=>'Onkeypress','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeypress','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][48]=array('table'=>'fgs_element','rowid'=>'11450','sid'=>'element_onkeyup','fieldset'=>'events','name'=>'element_onkeyup','label'=>'Onkeyup','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeyup','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][49]=array('table'=>'fgs_element','rowid'=>'11451','sid'=>'element_onmousedown','fieldset'=>'events','name'=>'element_onmousedown','label'=>'Onmousedown','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmousedown','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][50]=array('table'=>'fgs_element','rowid'=>'11452','sid'=>'element_onmousemove','fieldset'=>'events','name'=>'element_onmousemove','label'=>'Onmousemove','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmousemove','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][51]=array('table'=>'fgs_element','rowid'=>'11453','sid'=>'element_onmouseout','fieldset'=>'events','name'=>'element_onmouseout','label'=>'Onmouseout','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseout','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][52]=array('table'=>'fgs_element','rowid'=>'11454','sid'=>'element_onmouseover','fieldset'=>'events','name'=>'element_onmouseover','label'=>'Onmouseover','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseover','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][53]=array('table'=>'fgs_element','rowid'=>'11455','sid'=>'element_onmouseup','fieldset'=>'events','name'=>'element_onmouseup','label'=>'Onmouseup','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseup','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['InputMultiAutocomplete'][54]=array('table'=>'fgs_element','rowid'=>'11456','sid'=>'element_onselect','fieldset'=>'events','name'=>'element_onselect','label'=>'Onselect','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onselect','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');