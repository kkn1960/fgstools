<?php
$form['field']=array();
$form['field']['initial']=array();
$form['field']['initial']=array('mode'=>'insert');
$form['field']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['field']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['field']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['field']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['field']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['field']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['field']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['field']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['field']=array();
$button['field'][]=array('value'=>'Insert','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['field'][]=array('value'=>'Update','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['field'][]=array('value'=>'Remove','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['field'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['field'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['field'][]=array('value'=>'Reset','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['field']['properties']=array('primary_key'=>array('field_table','field_name'),'table'=>'fgs_field','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'field','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['field']=array();
$e['field'][0]=array('table'=>'fgs_field','rowid'=>'373','sid'=>'field_name','fieldset'=>'','name'=>'field_name','label'=>'Name','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'field_name','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'10\'');
$e['field'][1]=array('table'=>'fgs_field','rowid'=>'374','sid'=>'field_type','fieldset'=>'','name'=>'field_type','label'=>'Type','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'text','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'field_type','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'30\'');
$e['field'][2]=array('table'=>'fgs_field','rowid'=>'375','sid'=>'field_dbtype','fieldset'=>'','name'=>'field_dbtype','label'=>'Dbtype ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'1','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'field_dbtype','cai'=>1);
$e['field'][3]=array('table'=>'fgs_field','rowid'=>'11499','sid'=>'field_dbcascade','fieldset'=>'','name'=>'field_dbcascade','label'=>'Cascade update and delete by DBMS ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'field_dbcascade','cai'=>1);
$e['field'][4]=array('table'=>'fgs_field','rowid'=>'378','sid'=>'field_default','fieldset'=>'','name'=>'field_default','label'=>'Default','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'field_default','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'50\'');
$e['field'][5]=array('table'=>'fgs_field','rowid'=>'379','sid'=>'field_label','fieldset'=>'','name'=>'field_label','label'=>'Prompt','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'field_label','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['field'][6]=array('table'=>'fgs_field','rowid'=>'380','sid'=>'field_list','fieldset'=>'','name'=>'field_list','label'=>'List','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'lists','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'lists','table'=>'fgs_list','from'=>'fgs_list','primary_key'=>'list_sid','select'=>'list_sid id,list_sid as name','order'=>'list_sid ASC','display_field'=>'list_sid'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'field_list','cai'=>1);
$e['field'][7]=array('table'=>'fgs_field','rowid'=>'381','sid'=>'field_element','fieldset'=>'','name'=>'field_element','label'=>'Input component','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ElementComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ElementComponent','table'=>'fgs_component','from'=>'fgs_component','primary_key'=>'component_sid','select'=>'component_sid id,component_name as name','order'=>'component_name ASC','where'=>'component_type=\'element\'','display_field'=>'component_name'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'field_element','cai'=>1);
$e['field'][8]=array('table'=>'fgs_field','rowid'=>'382','sid'=>'field_column','fieldset'=>'','name'=>'field_column','label'=>'Column component','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ColumnComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('options'=>array('ColumnText'=>'ColumnText','ColumnDate'=>'ColumnDate','ColumnDatetime'=>'ColumnDatetime','ColumnTime'=>'ColumnTime','ColumnLookup'=>'ColumnLookup','ColumnLink'=>'ColumnLink','ColumnTableJoiner'=>'ColumnTableJoiner','ColumnInputText'=>'ColumnInputText','ColumnSelectOneMenu'=>'ColumnSelectOneMenu','RowSetAction'=>'RowSetAction','RowAction'=>'RowAction','RowSelector'=>'RowSelector','GridButton'=>'GridButton')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'field_column','cai'=>1);
$e['field'][9]=array('table'=>'fgs_field','rowid'=>'383','sid'=>'field_argument','fieldset'=>'','name'=>'field_argument','label'=>'Predicate component','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'PredicateComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'PredicateComponent','table'=>'fgs_component','from'=>'fgs_component','primary_key'=>'component_sid','select'=>'component_sid id,component_name as name','order'=>'component_name ASC','where'=>'component_type=\'element\' and component_predicate=\'1\'','display_field'=>'component_name'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'field_argument','cai'=>1);
$e['field'][10]=array('table'=>'fgs_field','rowid'=>'384','sid'=>'field_lookup','fieldset'=>'','name'=>'field_lookup','label'=>'Lookup table','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'table','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'table','table'=>'fgs_table','filter'=>'table_name!=\'fgs_field\'','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','display_field'=>'table_name'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'field_lookup','cai'=>1);
$e['field'][11]=array('table'=>'fgs_field','rowid'=>'385','sid'=>'field_primary_key','fieldset'=>'','name'=>'field_primary_key','label'=>'Foreign key','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'field_primary_key','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['field'][12]=array('table'=>'fgs_field','rowid'=>'386','sid'=>'field_table','fieldset'=>'','name'=>'field_table','label'=>'Field_table','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'field_table','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['field'][13]=array('table'=>'fgs_field','rowid'=>'387','sid'=>'field_relation','fieldset'=>'','name'=>'field_relation','label'=>'Foreign key type','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'ForeignKeyType','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('options'=>array('master'=>'master table','reference'=>'reference table')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'field_relation','cai'=>1);
$e['field'][14]=array('table'=>'fgs_field','rowid'=>'11501','sid'=>'field_timestamp','fieldset'=>'','name'=>'field_timestamp','label'=>'Timestamp','component'=>'InputText','type'=>'timestamp','required'=>1,'default_value'=>'CURRENT_TIMESTAMP','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'field_timestamp','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'19\' size=\'19\'');