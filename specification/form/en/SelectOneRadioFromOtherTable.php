<?php
$form['SelectOneRadioFromOtherTable']=array();
$form['SelectOneRadioFromOtherTable']['initial']=array();
$form['SelectOneRadioFromOtherTable']['initial']=array('mode'=>'update');
$form['SelectOneRadioFromOtherTable']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['SelectOneRadioFromOtherTable']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneRadioFromOtherTable']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneRadioFromOtherTable']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneRadioFromOtherTable']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneRadioFromOtherTable']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneRadioFromOtherTable']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneRadioFromOtherTable']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['SelectOneRadioFromOtherTable']=array();
$button['SelectOneRadioFromOtherTable'][]=array('value'=>'Insert','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['SelectOneRadioFromOtherTable'][]=array('value'=>'Update','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['SelectOneRadioFromOtherTable'][]=array('value'=>'Remove','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['SelectOneRadioFromOtherTable'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['SelectOneRadioFromOtherTable'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['SelectOneRadioFromOtherTable'][]=array('value'=>'Reset','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['SelectOneRadioFromOtherTable']['properties']=array('primary_key'=>array('element_rowid'),'table'=>'fgs_element','method'=>'post','system'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'element_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>"",'htmlevents'=>"",'enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['SelectOneRadioFromOtherTable']=array();
$e['SelectOneRadioFromOtherTable'][0]=array('table'=>'fgs_element','rowid'=>'7193','sid'=>'element_form','fieldset'=>'system_attributes','name'=>'element_form','label'=>'Field','component'=>'InputText','hidden'=>1,'type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_form','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneRadioFromOtherTable'][1]=array('table'=>'fgs_element','rowid'=>'7194','sid'=>'element_table','fieldset'=>'system_attributes','name'=>'element_table','label'=>'Table','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_table','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' readonly='1' size='60'");
$e['SelectOneRadioFromOtherTable'][2]=array('table'=>'fgs_element','rowid'=>'7195','sid'=>'element_field','fieldset'=>'system_attributes','name'=>'element_field','label'=>'Field','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_field','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' readonly='1' size='60'");
$e['SelectOneRadioFromOtherTable'][3]=array('table'=>'fgs_element','rowid'=>'7196','sid'=>'element_alias','fieldset'=>'system_attributes','name'=>'element_alias','label'=>'Field alias','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_alias','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneRadioFromOtherTable'][4]=array('table'=>'fgs_element','rowid'=>'7205','sid'=>'element_index','fieldset'=>'system_attributes','name'=>'element_index','label'=>'Index','component'=>'InputText','type'=>'smallint','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_index','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='6' size='6'");
$e['SelectOneRadioFromOtherTable'][5]=array('table'=>'fgs_element','rowid'=>'10981','sid'=>'element_fieldset','fieldset'=>'input_attributes','name'=>'element_fieldset','label'=>'Fieldset','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_fieldset','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneRadioFromOtherTable'][6]=array('table'=>'fgs_element','rowid'=>'7200','sid'=>'element_name','fieldset'=>'input_attributes','name'=>'element_name','label'=>'Attribute name','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_name','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60' tabindex='40'");
$e['SelectOneRadioFromOtherTable'][7]=array('table'=>'fgs_element','rowid'=>'7204','sid'=>'element_label','fieldset'=>'input_attributes','name'=>'element_label','label'=>'Label','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_label','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='32'");
$e['SelectOneRadioFromOtherTable'][8]=array('table'=>'fgs_element','rowid'=>'7211','sid'=>'element_required','fieldset'=>'input_attributes','name'=>'element_required','label'=>'Required','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_required','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='16'");
$e['SelectOneRadioFromOtherTable'][9]=array('table'=>'fgs_element','rowid'=>'7206','sid'=>'element_list','fieldset'=>'input_attributes','name'=>'element_list','label'=>'List','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'lists','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'lists','from'=>'fgs_list','primary_key'=>'list_sid','select'=>'list_sid id,list_sid name','order'=>'list_sid ASC','display_field'=>'list_sid'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_list','cai'=>1);
$e['SelectOneRadioFromOtherTable'][10]=array('table'=>'fgs_element','rowid'=>'7207','sid'=>'element_filter','fieldset'=>'input_attributes','name'=>'element_filter','label'=>'Filter','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_filter','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][11]=array('table'=>'fgs_element','rowid'=>'7209','sid'=>'element_layout','fieldset'=>'input_attributes','name'=>'element_layout','label'=>'Layout','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'OptionLayout','list'=>array('options'=>array('0'=>'vertically','1'=>'horizontally')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_layout','cai'=>1);
$e['SelectOneRadioFromOtherTable'][12]=array('table'=>'fgs_element','rowid'=>'7208','sid'=>'element_null_option','fieldset'=>'input_attributes','name'=>'element_null_option','label'=>'Null option','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_null_option','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='32' size='32'");
$e['SelectOneRadioFromOtherTable'][13]=array('table'=>'fgs_element','rowid'=>'7210','sid'=>'element_default','fieldset'=>'input_attributes','name'=>'element_default','label'=>'Default','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_default','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneRadioFromOtherTable'][14]=array('table'=>'fgs_element','rowid'=>'7216','sid'=>'element_register','fieldset'=>'input_attributes','name'=>'element_register','label'=>'Global name','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_register','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneRadioFromOtherTable'][15]=array('table'=>'fgs_element','rowid'=>'7197','sid'=>'element_left_table','fieldset'=>'input_attributes','name'=>'element_left_table','label'=>'Left table','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_left_table','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60' tabindex='45'");
$e['SelectOneRadioFromOtherTable'][16]=array('table'=>'fgs_element','rowid'=>'7198','sid'=>'element_left_alias','fieldset'=>'input_attributes','name'=>'element_left_alias','label'=>'Left table alias','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_left_alias','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60' tabindex='30'");
$e['SelectOneRadioFromOtherTable'][17]=array('table'=>'fgs_element','rowid'=>'7199','sid'=>'element_left_foreign_key','fieldset'=>'input_attributes','name'=>'element_left_foreign_key','label'=>'Left table foreign key','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_left_foreign_key','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60' tabindex='20'");
$e['SelectOneRadioFromOtherTable'][18]=array('table'=>'fgs_element','rowid'=>'7201','sid'=>'element_renderer','fieldset'=>'input_attributes','name'=>'element_renderer','label'=>'Renderer','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_renderer','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneRadioFromOtherTable'][19]=array('table'=>'fgs_element','rowid'=>'7202','sid'=>'element_converter','fieldset'=>'input_attributes','name'=>'element_converter','label'=>'Converter','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_converter','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneRadioFromOtherTable'][20]=array('table'=>'fgs_element','rowid'=>'7212','sid'=>'element_readonly','fieldset'=>'input_attributes','name'=>'element_readonly','label'=>'Readonly','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_readonly','cai'=>1);
$e['SelectOneRadioFromOtherTable'][21]=array('table'=>'fgs_element','rowid'=>'7218','sid'=>'element_id','fieldset'=>'input_attributes','name'=>'element_id','label'=>'Id','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_id','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneRadioFromOtherTable'][22]=array('table'=>'fgs_element','rowid'=>'7203','sid'=>'element_value','fieldset'=>'input_attributes','name'=>'element_value','label'=>'Value','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_value','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='255' size='60'");
$e['SelectOneRadioFromOtherTable'][23]=array('table'=>'fgs_element','rowid'=>'7217','sid'=>'element_tabindex','fieldset'=>'input_attributes','name'=>'element_tabindex','label'=>'Tabindex','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_tabindex','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='6' size='6' tabindex='50'");
$e['SelectOneRadioFromOtherTable'][24]=array('table'=>'fgs_element','rowid'=>'7219','sid'=>'element_accesskey','fieldset'=>'input_attributes','name'=>'element_accesskey','label'=>'Accesskey','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_accesskey','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='16' size='16'");
$e['SelectOneRadioFromOtherTable'][25]=array('table'=>'fgs_element','rowid'=>'7221','sid'=>'element_onblur','fieldset'=>'events','name'=>'element_onblur','label'=>'Onblur','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onblur','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][26]=array('table'=>'fgs_element','rowid'=>'7222','sid'=>'element_onchange','fieldset'=>'events','name'=>'element_onchange','label'=>'Onchange','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onchange','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][27]=array('table'=>'fgs_element','rowid'=>'7223','sid'=>'element_onclick','fieldset'=>'events','name'=>'element_onclick','label'=>'Onclick','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onclick','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][28]=array('table'=>'fgs_element','rowid'=>'7224','sid'=>'element_ondblclick','fieldset'=>'events','name'=>'element_ondblclick','label'=>'Ondblclick','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_ondblclick','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][29]=array('table'=>'fgs_element','rowid'=>'7225','sid'=>'element_onfocus','fieldset'=>'events','name'=>'element_onfocus','label'=>'Onfocus','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onfocus','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][30]=array('table'=>'fgs_element','rowid'=>'7226','sid'=>'element_onkeydown','fieldset'=>'events','name'=>'element_onkeydown','label'=>'Onkeydown','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeydown','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][31]=array('table'=>'fgs_element','rowid'=>'7227','sid'=>'element_onkeypress','fieldset'=>'events','name'=>'element_onkeypress','label'=>'Onkeypress','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeypress','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][32]=array('table'=>'fgs_element','rowid'=>'7228','sid'=>'element_onkeyup','fieldset'=>'events','name'=>'element_onkeyup','label'=>'Onkeyup','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeyup','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][33]=array('table'=>'fgs_element','rowid'=>'7229','sid'=>'element_onmousedown','fieldset'=>'events','name'=>'element_onmousedown','label'=>'Onmousedown','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmousedown','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][34]=array('table'=>'fgs_element','rowid'=>'7230','sid'=>'element_onmousemove','fieldset'=>'events','name'=>'element_onmousemove','label'=>'Onmousemove','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmousemove','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][35]=array('table'=>'fgs_element','rowid'=>'7231','sid'=>'element_onmouseout','fieldset'=>'events','name'=>'element_onmouseout','label'=>'Onmouseout','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseout','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][36]=array('table'=>'fgs_element','rowid'=>'7232','sid'=>'element_onmouseover','fieldset'=>'events','name'=>'element_onmouseover','label'=>'Onmouseover','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseover','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][37]=array('table'=>'fgs_element','rowid'=>'7233','sid'=>'element_onmouseup','fieldset'=>'events','name'=>'element_onmouseup','label'=>'Onmouseup','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseup','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneRadioFromOtherTable'][38]=array('table'=>'fgs_element','rowid'=>'7234','sid'=>'element_onselect','fieldset'=>'events','name'=>'element_onselect','label'=>'Onselect','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onselect','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");