<?php
$form['GridButton']=array();
$form['GridButton']['initial']=array();
$form['GridButton']['initial']=array('mode'=>'update');
$form['GridButton']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['GridButton']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['GridButton']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['GridButton']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['GridButton']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['GridButton']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['GridButton']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['GridButton']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['GridButton']=array();
$button['GridButton'][]=array('value'=>'Insert','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['GridButton'][]=array('value'=>'Update','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['GridButton'][]=array('value'=>'Remove','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['GridButton'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['GridButton'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['GridButton'][]=array('value'=>'Reset','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['GridButton']['properties']=array('primary_key'=>array('column_rowid'),'table'=>'fgs_column','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'column_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['GridButton']=array();
$e['GridButton'][0]=array('table'=>'fgs_column','rowid'=>'734','sid'=>'column_index','fieldset'=>'','name'=>'column_index','label'=>'Index','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\' tabindex=\'50\'');
$e['GridButton'][1]=array('table'=>'fgs_column','rowid'=>'729','sid'=>'column_grid','fieldset'=>'','name'=>'column_grid','label'=>'Grid','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_grid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\'');
$e['GridButton'][2]=array('table'=>'fgs_column','rowid'=>'730','sid'=>'column_component','fieldset'=>'','name'=>'column_component','label'=>'Component','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ColumnComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('options'=>array('ColumnText'=>'ColumnText','ColumnDate'=>'ColumnDate','ColumnDatetime'=>'ColumnDatetime','ColumnTime'=>'ColumnTime','ColumnLookup'=>'ColumnLookup','ColumnLink'=>'ColumnLink','ColumnTableJoiner'=>'ColumnTableJoiner','ColumnInputText'=>'ColumnInputText','ColumnSelectOneMenu'=>'ColumnSelectOneMenu','RowSetAction'=>'RowSetAction','RowAction'=>'RowAction','RowSelector'=>'RowSelector','GridButton'=>'GridButton')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_component','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'45\'');
$e['GridButton'][3]=array('table'=>'fgs_column','rowid'=>'731','sid'=>'column_action','fieldset'=>'','name'=>'column_action','label'=>'Action','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_action','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['GridButton'][4]=array('table'=>'fgs_column','rowid'=>'11481','sid'=>'column_event','fieldset'=>'','name'=>'column_event','label'=>'Fire event','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_event','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['GridButton'][5]=array('table'=>'fgs_column','rowid'=>'732','sid'=>'column_confirm','fieldset'=>'','name'=>'column_confirm','label'=>'Confirm message','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_confirm','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['GridButton'][6]=array('table'=>'fgs_column','rowid'=>'733','sid'=>'column_function','fieldset'=>'','name'=>'column_function','label'=>'Function','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_function','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['GridButton'][7]=array('table'=>'fgs_column','rowid'=>'735','sid'=>'column_type','fieldset'=>'','name'=>'column_type','label'=>'Type','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'submit','list_sid'=>'ButtonType','list'=>array('options'=>array('submit'=>'submit','reset'=>'reset')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_type','cai'=>1);
$e['GridButton'][8]=array('table'=>'fgs_column','rowid'=>'736','sid'=>'column_value','fieldset'=>'','name'=>'column_value','label'=>'Value','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_value','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['GridButton'][9]=array('table'=>'fgs_column','rowid'=>'737','sid'=>'column_condition','fieldset'=>'','name'=>'column_condition','label'=>'Condition','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'InputCondition','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'InputCondition','table'=>'fgs_condition','from'=>'fgs_condition','primary_key'=>'condition_sid','select'=>'condition_sid id,condition_sid as name','order'=>'condition_sid ASC','display_field'=>'condition_sid','predicates'=>array(array('field'=>'condition_type','type'=>'varchar','table'=>'fgs_condition','fieldset'=>'0','required'=>'1','argument'=>"row",'operator'=>'not_equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_condition','cai'=>1);
$e['GridButton'][10]=array('table'=>'fgs_column','rowid'=>'11346','sid'=>'column_condition_field','fieldset'=>'','name'=>'column_condition_field','label'=>'Condition field','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_condition_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['GridButton'][11]=array('table'=>'fgs_column','rowid'=>'11300','sid'=>'column_condition_class','fieldset'=>'','name'=>'column_condition_class','label'=>'Condition class','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_condition_class','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['GridButton'][12]=array('table'=>'fgs_column','rowid'=>'11341','sid'=>'column_condition_class_static','fieldset'=>'','name'=>'column_condition_class_static','label'=>'Static condition class','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'1','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'column_condition_class_static','cai'=>1);
$e['GridButton'][13]=array('table'=>'fgs_column','rowid'=>'11342','sid'=>'column_condition_parameter','fieldset'=>'','name'=>'column_condition_parameter','label'=>'Condition parameter','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_condition_parameter','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$e['GridButton'][14]=array('table'=>'fgs_column','rowid'=>'11343','sid'=>'column_condition_parameter_type','fieldset'=>'','name'=>'column_condition_parameter_type','label'=>'Condition parametert ype','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'ValidatorParameterTtype','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('options'=>array('scalar'=>'scalar value','field'=>'input element','array'=>'array')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_condition_parameter_type','cai'=>1);
$e['GridButton'][15]=array('table'=>'fgs_column','rowid'=>'738','sid'=>'column_name','fieldset'=>'','name'=>'column_name','label'=>'Attribute name','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_name','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['GridButton'][16]=array('table'=>'fgs_column','rowid'=>'11261','sid'=>'column_attributes','fieldset'=>'','name'=>'column_attributes','label'=>'Attributes','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_attributes','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$e['GridButton'][17]=array('table'=>'fgs_column','rowid'=>'11262','sid'=>'column_events','fieldset'=>'','name'=>'column_events','label'=>'Events','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_events','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');