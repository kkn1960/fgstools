<?php
$form['SelectOneListboxFromOtherTable']=array();
$form['SelectOneListboxFromOtherTable']['initial']=array();
$form['SelectOneListboxFromOtherTable']['initial']=array('mode'=>'update');
$form['SelectOneListboxFromOtherTable']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['SelectOneListboxFromOtherTable']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneListboxFromOtherTable']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneListboxFromOtherTable']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneListboxFromOtherTable']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneListboxFromOtherTable']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneListboxFromOtherTable']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['SelectOneListboxFromOtherTable']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['SelectOneListboxFromOtherTable']=array();
$button['SelectOneListboxFromOtherTable'][]=array('value'=>'��������','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['SelectOneListboxFromOtherTable'][]=array('value'=>'��������','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['SelectOneListboxFromOtherTable'][]=array('value'=>'�������','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['SelectOneListboxFromOtherTable'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['SelectOneListboxFromOtherTable'][]=array('value'=>'��������','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['SelectOneListboxFromOtherTable'][]=array('value'=>'�������� ���������','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['SelectOneListboxFromOtherTable']['properties']=array('primary_key'=>array('element_rowid'),'table'=>'fgs_element','method'=>'post','system'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'element_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>"",'htmlevents'=>"",'enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['SelectOneListboxFromOtherTable']=array();
$e['SelectOneListboxFromOtherTable'][0]=array('table'=>'fgs_element','rowid'=>'7292','sid'=>'element_form','fieldset'=>'system_attributes','name'=>'element_form','label'=>'����','component'=>'InputText','hidden'=>1,'type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_form','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneListboxFromOtherTable'][1]=array('table'=>'fgs_element','rowid'=>'7293','sid'=>'element_table','fieldset'=>'system_attributes','name'=>'element_table','label'=>'�������','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_table','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' readonly='1' size='60'");
$e['SelectOneListboxFromOtherTable'][2]=array('table'=>'fgs_element','rowid'=>'7294','sid'=>'element_field','fieldset'=>'system_attributes','name'=>'element_field','label'=>'����','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_field','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' readonly='1' size='60'");
$e['SelectOneListboxFromOtherTable'][3]=array('table'=>'fgs_element','rowid'=>'7295','sid'=>'element_alias','fieldset'=>'system_attributes','name'=>'element_alias','label'=>'����� ����','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_alias','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneListboxFromOtherTable'][4]=array('table'=>'fgs_element','rowid'=>'7305','sid'=>'element_index','fieldset'=>'system_attributes','name'=>'element_index','label'=>'Index','component'=>'InputText','type'=>'smallint','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_index','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='6' size='6'");
$e['SelectOneListboxFromOtherTable'][5]=array('table'=>'fgs_element','rowid'=>'10977','sid'=>'element_fieldset','fieldset'=>'input_attributes','name'=>'element_fieldset','label'=>'Fieldset','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_fieldset','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneListboxFromOtherTable'][6]=array('table'=>'fgs_element','rowid'=>'7299','sid'=>'element_name','fieldset'=>'input_attributes','name'=>'element_name','label'=>'������� name','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_name','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60' tabindex='40'");
$e['SelectOneListboxFromOtherTable'][7]=array('table'=>'fgs_element','rowid'=>'7304','sid'=>'element_label','fieldset'=>'input_attributes','name'=>'element_label','label'=>'�����','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_label','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='32'");
$e['SelectOneListboxFromOtherTable'][8]=array('table'=>'fgs_element','rowid'=>'7311','sid'=>'element_required','fieldset'=>'input_attributes','name'=>'element_required','label'=>'�����������','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_required','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='16'");
$e['SelectOneListboxFromOtherTable'][9]=array('table'=>'fgs_element','rowid'=>'7306','sid'=>'element_list','fieldset'=>'input_attributes','name'=>'element_list','label'=>'������','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'lists','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'lists','from'=>'fgs_list','primary_key'=>'list_sid','select'=>'list_sid id,list_sid name','order'=>'list_sid ASC','display_field'=>'list_sid'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_list','cai'=>1);
$e['SelectOneListboxFromOtherTable'][10]=array('table'=>'fgs_element','rowid'=>'7307','sid'=>'element_filter','fieldset'=>'input_attributes','name'=>'element_filter','label'=>'������','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_filter','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][11]=array('table'=>'fgs_element','rowid'=>'7308','sid'=>'element_null_option','fieldset'=>'input_attributes','name'=>'element_null_option','label'=>'������� �����','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_null_option','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='32' size='32'");
$e['SelectOneListboxFromOtherTable'][12]=array('table'=>'fgs_element','rowid'=>'7310','sid'=>'element_default','fieldset'=>'input_attributes','name'=>'element_default','label'=>'�� ���������','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_default','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneListboxFromOtherTable'][13]=array('table'=>'fgs_element','rowid'=>'7316','sid'=>'element_register','fieldset'=>'input_attributes','name'=>'element_register','label'=>'���������� ���','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_register','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneListboxFromOtherTable'][14]=array('table'=>'fgs_element','rowid'=>'7296','sid'=>'element_left_table','fieldset'=>'input_attributes','name'=>'element_left_table','label'=>'������� �����','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_left_table','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60' tabindex='45'");
$e['SelectOneListboxFromOtherTable'][15]=array('table'=>'fgs_element','rowid'=>'7297','sid'=>'element_left_alias','fieldset'=>'input_attributes','name'=>'element_left_alias','label'=>'����� ������� �����','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_left_alias','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60' tabindex='30'");
$e['SelectOneListboxFromOtherTable'][16]=array('table'=>'fgs_element','rowid'=>'7298','sid'=>'element_left_foreign_key','fieldset'=>'input_attributes','name'=>'element_left_foreign_key','label'=>'������� ���� ������� �����','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_left_foreign_key','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60' tabindex='20'");
$e['SelectOneListboxFromOtherTable'][17]=array('table'=>'fgs_element','rowid'=>'7309','sid'=>'element_size','fieldset'=>'input_attributes','name'=>'element_size','label'=>'Size','component'=>'InputText','type'=>'tinyint','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_size','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='3' size='3'");
$e['SelectOneListboxFromOtherTable'][18]=array('table'=>'fgs_element','rowid'=>'7301','sid'=>'element_renderer','fieldset'=>'input_attributes','name'=>'element_renderer','label'=>'������������','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_renderer','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneListboxFromOtherTable'][19]=array('table'=>'fgs_element','rowid'=>'7302','sid'=>'element_converter','fieldset'=>'input_attributes','name'=>'element_converter','label'=>'���������','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_converter','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneListboxFromOtherTable'][20]=array('table'=>'fgs_element','rowid'=>'7312','sid'=>'element_readonly','fieldset'=>'input_attributes','name'=>'element_readonly','label'=>'Readonly','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'���','1'=>'��')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_readonly','cai'=>1);
$e['SelectOneListboxFromOtherTable'][21]=array('table'=>'fgs_element','rowid'=>'7318','sid'=>'element_id','fieldset'=>'input_attributes','name'=>'element_id','label'=>'Id','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_id','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneListboxFromOtherTable'][22]=array('table'=>'fgs_element','rowid'=>'7303','sid'=>'element_value','fieldset'=>'input_attributes','name'=>'element_value','label'=>'��������','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_value','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='255' size='60'");
$e['SelectOneListboxFromOtherTable'][23]=array('table'=>'fgs_element','rowid'=>'7317','sid'=>'element_tabindex','fieldset'=>'input_attributes','name'=>'element_tabindex','label'=>'Tabindex','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_tabindex','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='6' size='6' tabindex='50'");
$e['SelectOneListboxFromOtherTable'][24]=array('table'=>'fgs_element','rowid'=>'7319','sid'=>'element_accesskey','fieldset'=>'input_attributes','name'=>'element_accesskey','label'=>'Accesskey','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_accesskey','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='16' size='16'");
$e['SelectOneListboxFromOtherTable'][25]=array('table'=>'fgs_element','rowid'=>'7300','sid'=>'element_tier','fieldset'=>'ajax_attributes','name'=>'element_tier','label'=>'������� � ������� select','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_tier','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' size='60'");
$e['SelectOneListboxFromOtherTable'][26]=array('table'=>'fgs_element','rowid'=>'7321','sid'=>'element_onblur','fieldset'=>'events','name'=>'element_onblur','label'=>'Onblur','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onblur','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][27]=array('table'=>'fgs_element','rowid'=>'7322','sid'=>'element_onchange','fieldset'=>'events','name'=>'element_onchange','label'=>'Onchange','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onchange','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][28]=array('table'=>'fgs_element','rowid'=>'7323','sid'=>'element_onclick','fieldset'=>'events','name'=>'element_onclick','label'=>'Onclick','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onclick','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][29]=array('table'=>'fgs_element','rowid'=>'7324','sid'=>'element_ondblclick','fieldset'=>'events','name'=>'element_ondblclick','label'=>'Ondblclick','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_ondblclick','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][30]=array('table'=>'fgs_element','rowid'=>'7325','sid'=>'element_onfocus','fieldset'=>'events','name'=>'element_onfocus','label'=>'Onfocus','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onfocus','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][31]=array('table'=>'fgs_element','rowid'=>'7326','sid'=>'element_onkeydown','fieldset'=>'events','name'=>'element_onkeydown','label'=>'Onkeydown','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeydown','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][32]=array('table'=>'fgs_element','rowid'=>'7327','sid'=>'element_onkeypress','fieldset'=>'events','name'=>'element_onkeypress','label'=>'Onkeypress','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeypress','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][33]=array('table'=>'fgs_element','rowid'=>'7328','sid'=>'element_onkeyup','fieldset'=>'events','name'=>'element_onkeyup','label'=>'Onkeyup','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onkeyup','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][34]=array('table'=>'fgs_element','rowid'=>'7329','sid'=>'element_onmousedown','fieldset'=>'events','name'=>'element_onmousedown','label'=>'Onmousedown','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmousedown','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][35]=array('table'=>'fgs_element','rowid'=>'7330','sid'=>'element_onmousemove','fieldset'=>'events','name'=>'element_onmousemove','label'=>'Onmousemove','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmousemove','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][36]=array('table'=>'fgs_element','rowid'=>'7331','sid'=>'element_onmouseout','fieldset'=>'events','name'=>'element_onmouseout','label'=>'Onmouseout','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseout','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][37]=array('table'=>'fgs_element','rowid'=>'7332','sid'=>'element_onmouseover','fieldset'=>'events','name'=>'element_onmouseover','label'=>'Onmouseover','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseover','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][38]=array('table'=>'fgs_element','rowid'=>'7333','sid'=>'element_onmouseup','fieldset'=>'events','name'=>'element_onmouseup','label'=>'Onmouseup','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onmouseup','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");
$e['SelectOneListboxFromOtherTable'][39]=array('table'=>'fgs_element','rowid'=>'7334','sid'=>'element_onselect','fieldset'=>'events','name'=>'element_onselect','label'=>'Onselect','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_onselect','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='60'");