<?php
$form['form']=array();
$form['form']['initial']=array();
$form['form']['initial']=array('mode'=>'insert');
$form['form']['session']['insert']=array('mode','hide','display');
$form['form']['session']['copy']=array('mode','hide','display','apk','irow');
$form['form']['session']['read']=array('mode','hide','display','apk','irow');
$form['form']['session']['update']=array('mode','hide','display','apk','irow');
$form['form']['session']['remove']=array('mode','hide','display','apk','irow');
$form['form']['session']['multi_update']=array('mode','hide','display','apk','irow');
$form['form']['session']['multi_remove']=array('mode','hide','display','apk','irow');
$form['form']['session']['multi_read']=array('mode','hide','display','apk','irow');
$button['form']=array();
$button['form'][]=array('event'=>'element','value'=>'Insert','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['form'][]=array('value'=>'Update','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['form'][]=array('value'=>'Remove','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['form'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['form'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['form'][]=array('value'=>'Reset','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['form']['properties']=array('primary_key'=>array('form_sid'),'table'=>'fgs_form','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'dependent'=>array('fgs_unit_unit_form'=>array('fk'=>'unit_form','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_unit','pk'=>'form_sid'),'fgs_unit_unit_search'=>array('fk'=>'unit_search','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_unit','pk'=>'form_sid')),'descendant'=>array('fgs_element_element_form'=>array('fk'=>'element_form','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_element','table_pk'=>'element_rowid','pk'=>'form_sid'),'fgs_filter_filter_form'=>array('fk'=>'filter_form','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_filter','table_pk'=>'filter_rowid','pk'=>'form_sid'),'fgs_validator_validator_form'=>array('fk'=>'validator_form','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_validator','table_pk'=>'validator_rowid','pk'=>'form_sid')),'reference'=>array('fgs_element_element_form'=>array('fk'=>'element_form','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_element','pk'=>'form_sid'),'fgs_unit_unit_form'=>array('fk'=>'unit_form','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_unit','pk'=>'form_sid'),'fgs_unit_unit_search'=>array('fk'=>'unit_search','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_unit','pk'=>'form_sid'),'fgs_filter_filter_form'=>array('fk'=>'filter_form','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_filter','pk'=>'form_sid'),'fgs_validator_validator_form'=>array('fk'=>'validator_form','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_validator','pk'=>'form_sid')),'title'=>'form','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','eventTrigger'=>array('insert'),'events'=>array('insert'=>'element','update'=>'done','remove'=>'done'),'joins'=>array());
$e['form']=array();
$e['form'][0]=array('table'=>'fgs_form','rowid'=>'10629','sid'=>'form_system','fieldset'=>'','name'=>'form_system','label'=>'System ?','component'=>'SelectOneRadio','chain'=>'0','tier'=>'0','chain_role'=>'member','id'=>'ajax_form_system','register'=>'system','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'id'=>'ajax_form_system','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'form_system','cai'=>1,'events'=>'onchange=loadOptions(0,0,\'list.php\',\'10629\',0,0,0)');
$e['form'][1]=array('table'=>'fgs_form','rowid'=>'632','sid'=>'form_type','fieldset'=>'','name'=>'form_type','label'=>'Type','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'default_value'=>'application','list_sid'=>'FormType','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('options'=>array('application'=>'application','template'=>'template','element'=>'element','predicate'=>'predicate','column'=>'column','system'=>'system')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'form_type','cai'=>1);
$e['form'][2]=array('table'=>'fgs_form','rowid'=>'634','sid'=>'form_table','fieldset'=>'','name'=>'form_table','label'=>'Table','component'=>'SelectOneMenu','chain'=>'0','tier'=>'1','chain_role'=>'member','id'=>'ajax_form_table','register'=>'form_table','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'id'=>'ajax_form_table','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'form_table','cai'=>1,'attributes'=>'tabindex=\'30\'');
$e['form'][3]=array('table'=>'fgs_form','rowid'=>'633','sid'=>'form_sid','fieldset'=>'','name'=>'form_sid','label'=>'Sid','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'form_sid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'10\'');
$e['form'][4]=array('table'=>'fgs_form','rowid'=>'635','sid'=>'form_title','fieldset'=>'','name'=>'form_title','label'=>'Title','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'form_title','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'20\'');
$e['form'][5]=array('table'=>'fgs_form','rowid'=>'636','sid'=>'form_modes','fieldset'=>'form_modes','name'=>'form_modes','label'=>'Modes','component'=>'SelectManyCheckbox','renderer'=>'ManyCheckbox','layout'=>'0','default_value'=>'\'insert\',\'update\',\'copy\',\'remove\',\'read\',\'multi_update\',\'multi_remove\',\'multi_read\'','list_sid'=>'InputMode','list'=>array('options'=>array('insert'=>'Insert','update'=>'Update','update_partial'=>'Partial Update','copy'=>'Copy','remove'=>'Remove','read'=>'Read','seek'=>'Seek','action'=>'Action','multi_update'=>'MultiUpdate','multi_remove'=>'MultiRemove','multi_read'=>'MultiRead')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'set','field'=>'form_modes','cai'=>1);
$e['form'][6]=array('table'=>'fgs_form','rowid'=>'637','sid'=>'form_startmode','fieldset'=>'form_modes','name'=>'form_startmode','label'=>'Start mode','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'form_startmode','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['form'][7]=array('table'=>'fgs_form','rowid'=>'647','sid'=>'form_action','fieldset'=>'form_actions','name'=>'form_action','label'=>'Action','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'form_action','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['form'][8]=array('table'=>'fgs_form','rowid'=>'10706','sid'=>'form_method','fieldset'=>'form_actions','name'=>'form_method','label'=>'Method','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'post','list_sid'=>'RequestType','list'=>array('options'=>array('post'=>'post','get'=>'get')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'form_method','cai'=>1);
$e['form'][9]=array('table'=>'fgs_form','rowid'=>'7553','sid'=>'form_id','fieldset'=>'','name'=>'form_id','label'=>'Id','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'form_id','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['form'][10]=array('table'=>'fgs_form','rowid'=>'648','sid'=>'form_onreset','fieldset'=>'events','name'=>'form_onreset','label'=>'Onreset','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'form_onreset','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'190\'');
$e['form'][11]=array('table'=>'fgs_form','rowid'=>'649','sid'=>'form_onsubmit','fieldset'=>'events','name'=>'form_onsubmit','label'=>'Onsubmit','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'form_onsubmit','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'200\'');
$e['form'][12]=array('table'=>'fgs_form','rowid'=>'11406','sid'=>'form_rowid_after_insert','fieldset'=>'','name'=>'form_rowid_after_insert','label'=>'Rowid after insert','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'form_rowid_after_insert','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['form'][13]=array('table'=>'fgs_form','rowid'=>'11494','sid'=>'form_initial','fieldset'=>'','name'=>'form_initial','label'=>'Initial values of properties','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'form_initial','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$e['form'][14]=array('table'=>'fgs_form','rowid'=>'11497','sid'=>'form_redirect_after_insert','fieldset'=>'','name'=>'form_redirect_after_insert','label'=>'Redirect page after insert ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'form_redirect_after_insert','cai'=>1);