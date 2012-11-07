<?php
$form['ColumnJoinTable']=array();
$form['ColumnJoinTable']['initial']=array();
$form['ColumnJoinTable']['initial']=array('mode'=>'update');
$form['ColumnJoinTable']['session']['insert']=array('mode','display','amf','foreign_key');
$form['ColumnJoinTable']['session']['copy']=array('mode','display','apk','irow','amf','foreign_key');
$form['ColumnJoinTable']['session']['read']=array('mode','display','apk','irow','amf','foreign_key');
$form['ColumnJoinTable']['session']['update']=array('mode','display','apk','irow','amf','foreign_key');
$form['ColumnJoinTable']['session']['remove']=array('mode','display','apk','irow','amf','foreign_key');
$form['ColumnJoinTable']['session']['multi_update']=array('mode','display','apk','irow','amf','foreign_key');
$form['ColumnJoinTable']['session']['multi_remove']=array('mode','display','apk','irow','amf','foreign_key');
$form['ColumnJoinTable']['session']['multi_read']=array('mode','display','apk','irow','amf','foreign_key');
$button['ColumnJoinTable']=array();
$button['ColumnJoinTable'][]=array('value'=>'Insert','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['ColumnJoinTable'][]=array('value'=>'Update','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['ColumnJoinTable'][]=array('value'=>'Remove','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['ColumnJoinTable'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['ColumnJoinTable'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['ColumnJoinTable'][]=array('value'=>'Reset','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['ColumnJoinTable']['properties']=array('primary_key'=>array('column_rowid'),'table'=>'fgs_column','method'=>'post','system'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'column_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['ColumnJoinTable']=array();
$e['ColumnJoinTable'][0]=array('table'=>'fgs_column','rowid'=>'7458','sid'=>'column_table','fieldset'=>'identification','name'=>'column_table','label'=>'Table','component0'=>'SelectOneMenu','component'=>'InputSingleSelect','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','sqlfunction'=>'','required'=>'1','argument'=>'&rgv system','operator'=>'equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_table','cai'=>1,'attributes'=>'readonly="1" tabindex="30"');
$e['ColumnJoinTable'][1]=array('table'=>'fgs_column','rowid'=>'7457','sid'=>'column_field','fieldset'=>'identification','name'=>'column_field','label'=>'Field','component0'=>'InputText','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength="64" readonly="1" size="60" tabindex="20"');
$e['ColumnJoinTable'][2]=array('table'=>'fgs_column','rowid'=>'7460','sid'=>'column_type','fieldset'=>'identification','name'=>'column_type','label'=>'Type','component0'=>'InputText','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_type','renderer'=>'text','cai'=>'1','attributes'=>'maxlength="64" size="60"');
$e['ColumnJoinTable'][3]=array('table'=>'fgs_column','rowid'=>'7461','sid'=>'column_index','fieldset'=>'rendering','name'=>'column_index','label'=>'Index','component0'=>'InputText','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength="6" size="6" tabindex="50"');
$e['ColumnJoinTable'][4]=array('table'=>'fgs_column','rowid'=>'7459','sid'=>'column_component','fieldset'=>'rendering','name'=>'column_component','label'=>'Component','component0'=>'SelectOneMenu','component'=>'InputSingleSelect','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ColumnComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ColumnComponent','from'=>'fgs_component','primary_key'=>'component_sid','select'=>'component_sid id,component_name name','order'=>'component_index ASC','where'=>'component_type=\'column\' or component_name=\'InputButton\'','display_field'=>'component_name'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_component','cai'=>1,'attributes'=>'readonly="1" tabindex="45"');
$e['ColumnJoinTable'][5]=array('table'=>'fgs_column','rowid'=>'7462','sid'=>'column_left_table','fieldset'=>'join_parameters','name'=>'column_left_table','label'=>'Left table','component0'=>'InputText','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_left_table','renderer'=>'text','cai'=>'1','attributes'=>'maxlength="64" size="60"');
$e['ColumnJoinTable'][6]=array('table'=>'fgs_column','rowid'=>'7463','sid'=>'column_left_alias','fieldset'=>'join_parameters','name'=>'column_left_alias','label'=>'Left table alias','component0'=>'InputText','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_left_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength="64" size="60"');
$e['ColumnJoinTable'][7]=array('table'=>'fgs_column','rowid'=>'7464','sid'=>'column_left_foreign_key','fieldset'=>'join_parameters','name'=>'column_left_foreign_key','label'=>'Left table foreign key','component0'=>'InputText','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_left_foreign_key','renderer'=>'text','cai'=>'1','attributes'=>'maxlength="64" size="60"');
$e['ColumnJoinTable'][8]=array('table'=>'fgs_column','rowid'=>'7465','sid'=>'column_join','fieldset'=>'join_parameters','name'=>'column_join','label'=>'Join type','component0'=>'SelectOneRadio','component'=>'InputSingleSelect','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'left','list_sid'=>'JoinTableTypes','list'=>array('options'=>array('left'=>'left','right'=>'right','inner'=>'inner','full'=>'full')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_join','cai'=>1);
$e['ColumnJoinTable'][9]=array('table'=>'fgs_column','rowid'=>'10612','sid'=>'column_where','fieldset'=>'join_parameters','name'=>'column_where','label'=>'Where','component0'=>'InputText','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_where','renderer'=>'text','cai'=>'1','attributes'=>'maxlength="128" size="60"');
$e['ColumnJoinTable'][10]=array('table'=>'fgs_column','rowid'=>'10613','sid'=>'column_required','fieldset'=>'join_parameters','name'=>'column_required','label'=>'Required ?','component0'=>'SelectOneRadio','component'=>'InputSingleSelect','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'column_required','cai'=>1);