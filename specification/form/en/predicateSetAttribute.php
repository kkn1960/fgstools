<?php
$form['predicateSetAttribute']=array();
$form['predicateSetAttribute']['initial']=array();
$form['predicateSetAttribute']['initial']=array('mode'=>'update');
$form['predicateSetAttribute']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['predicateSetAttribute']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['predicateSetAttribute']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['predicateSetAttribute']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['predicateSetAttribute']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['predicateSetAttribute']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['predicateSetAttribute']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['predicateSetAttribute']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['predicateSetAttribute']=array();
$button['predicateSetAttribute'][]=array('value'=>'Insert','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'),'attributes'=>'tabindex=\'0\'');
$button['predicateSetAttribute'][]=array('value'=>'Update','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'),'attributes'=>'tabindex=\'0\'');
$button['predicateSetAttribute'][]=array('value'=>'Remove','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'),'attributes'=>'tabindex=\'0\'');
$button['predicateSetAttribute'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'),'attributes'=>'tabindex=\'0\'');
$button['predicateSetAttribute'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'),'attributes'=>'tabindex=\'0\'');
$button['predicateSetAttribute'][]=array('value'=>'Reset','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'),'attributes'=>'tabindex=\'0\'');
$form['predicateSetAttribute']['properties']=array('primary_key'=>array('element_rowid'),'table'=>'fgs_element','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'predicate_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['predicateSetAttribute']=array();
$e['predicateSetAttribute'][0]=array('table'=>'fgs_element','rowid'=>'1446','sid'=>'element_form','fieldset'=>'','name'=>'element_form','label'=>'Form','component'=>'InputText','hidden'=>1,'type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_form','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'0\'');
$e['predicateSetAttribute'][1]=array('table'=>'fgs_element','rowid'=>'1447','sid'=>'element_table','fieldset'=>'','name'=>'element_table','label'=>'Table','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_table','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'20\'');
$e['predicateSetAttribute'][2]=array('table'=>'fgs_element','rowid'=>'1448','sid'=>'element_field','fieldset'=>'','name'=>'element_field','label'=>'Field','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'30\'');
$e['predicateSetAttribute'][3]=array('table'=>'fgs_element','rowid'=>'1449','sid'=>'element_type','fieldset'=>'','name'=>'element_type','label'=>'Type','component'=>'InputText','type'=>'varchar','default_value'=>'text','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_type','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'40\'');
$e['predicateSetAttribute'][4]=array('table'=>'fgs_element','rowid'=>'10826','sid'=>'element_function','fieldset'=>'','name'=>'element_function','label'=>'SQL function','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_function','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['predicateSetAttribute'][5]=array('table'=>'fgs_element','rowid'=>'1451','sid'=>'element_operators','fieldset'=>'','name'=>'element_operators','label'=>'Operators','component'=>'SelectManyListbox','renderer'=>'ManyListbox','size'=>'0','list_sid'=>'SetTest','list'=>array('options'=>array('in'=>'member of set','not_in'=>'out of set','include_all'=>'include all','include_one'=>'include at least one','not_include_all'=>'include noone')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'set','field'=>'element_operators','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'70\'');
$e['predicateSetAttribute'][6]=array('table'=>'fgs_element','rowid'=>'1450','sid'=>'element_operator_default','fieldset'=>'','name'=>'element_operator_default','label'=>'Default operator','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'SetTest','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('options'=>array('in'=>'member of set','not_in'=>'out of set','include_all'=>'include all','include_one'=>'include at least one','not_include_all'=>'include noone')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_operator_default','cai'=>1,'attributes'=>'tabindex=\'0\'');
$e['predicateSetAttribute'][7]=array('table'=>'fgs_element','rowid'=>'1454','sid'=>'element_fix_operator','fieldset'=>'','name'=>'element_fix_operator','label'=>'Fix operator ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_fix_operator','cai'=>1,'attributes'=>'tabindex=\'0\'');
$e['predicateSetAttribute'][8]=array('table'=>'fgs_element','rowid'=>'10428','sid'=>'element_connector','fieldset'=>'','name'=>'element_connector','label'=>'Connector','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'and','list_sid'=>'connector','list'=>array('options'=>array('and'=>'AND','or'=>'OR')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'element_connector','cai'=>1);
$e['predicateSetAttribute'][9]=array('table'=>'fgs_element','rowid'=>'10427','sid'=>'element_fix_connector','fieldset'=>'','name'=>'element_fix_connector','label'=>'Fix connector ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_fix_connector','cai'=>1);
$e['predicateSetAttribute'][10]=array('table'=>'fgs_element','rowid'=>'1455','sid'=>'element_fieldset','fieldset'=>'','name'=>'element_fieldset','label'=>'Fieldset','component'=>'InputText','type'=>'tinyint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'element_fieldset','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\' tabindex=\'0\'');
$e['predicateSetAttribute'][11]=array('table'=>'fgs_element','rowid'=>'11411','sid'=>'element_get','fieldset'=>'','name'=>'element_get','label'=>'Apply $_GET values','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'element_get','cai'=>1);