<?php
$form['RowAction']=array();
$form['RowAction']['initial']=array();
$form['RowAction']['initial']=array('mode'=>'update');
$form['RowAction']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['RowAction']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['RowAction']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['RowAction']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['RowAction']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['RowAction']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['RowAction']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['RowAction']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['RowAction']=array();
$button['RowAction'][]=array('value'=>'Insert','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['RowAction'][]=array('value'=>'Update','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['RowAction'][]=array('value'=>'Remove','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['RowAction'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['RowAction'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['RowAction'][]=array('value'=>'Reset','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['RowAction']['properties']=array('primary_key'=>array('column_rowid'),'table'=>'fgs_column','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'column_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['RowAction']=array();
$e['RowAction'][0]=array('table'=>'fgs_column','rowid'=>'1493','sid'=>'column_index','fieldset'=>'','name'=>'column_index','label'=>'Index','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\' tabindex=\'50\'');
$e['RowAction'][1]=array('table'=>'fgs_column','rowid'=>'1483','sid'=>'column_grid','fieldset'=>'','name'=>'column_grid','label'=>'Grid','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_grid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\'');
$e['RowAction'][2]=array('table'=>'fgs_column','rowid'=>'1485','sid'=>'column_action','fieldset'=>'','name'=>'column_action','label'=>'Action','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_action','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['RowAction'][3]=array('table'=>'fgs_column','rowid'=>'1486','sid'=>'column_immediate','fieldset'=>'','name'=>'column_immediate','label'=>'Immediate ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'column_immediate','cai'=>1);
$e['RowAction'][4]=array('table'=>'fgs_column','rowid'=>'11413','sid'=>'column_confirm','fieldset'=>'','name'=>'column_confirm','label'=>'Confirm message','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_confirm','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['RowAction'][5]=array('table'=>'fgs_column','rowid'=>'1487','sid'=>'column_condition','fieldset'=>'','name'=>'column_condition','label'=>'Condition','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'RowCondition','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'RowCondition','table'=>'fgs_condition','from'=>'fgs_condition','primary_key'=>'condition_sid','select'=>'condition_sid id,condition_sid as name','order'=>'condition_sid ASC','display_field'=>'condition_sid','predicates'=>array(array('field'=>'condition_type','type'=>'varchar','table'=>'fgs_condition','fieldset'=>'0','required'=>'1','argument'=>"input",'operator'=>'not_equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_condition','cai'=>1);
$e['RowAction'][6]=array('table'=>'fgs_column','rowid'=>'11344','sid'=>'column_condition_field','fieldset'=>'','name'=>'column_condition_field','label'=>'Condition field','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_condition_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['RowAction'][7]=array('table'=>'fgs_column','rowid'=>'11302','sid'=>'column_condition_class','fieldset'=>'','name'=>'column_condition_class','label'=>'Condition class','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_condition_class','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['RowAction'][8]=array('table'=>'fgs_column','rowid'=>'11335','sid'=>'column_condition_class_static','fieldset'=>'','name'=>'column_condition_class_static','label'=>'Static condition class','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'1','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'column_condition_class_static','cai'=>1);
$e['RowAction'][9]=array('table'=>'fgs_column','rowid'=>'11336','sid'=>'column_condition_parameter','fieldset'=>'','name'=>'column_condition_parameter','label'=>'Condition parameter','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_condition_parameter','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$e['RowAction'][10]=array('table'=>'fgs_column','rowid'=>'11337','sid'=>'column_condition_parameter_type','fieldset'=>'','name'=>'column_condition_parameter_type','label'=>'Condition parametert ype','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'0','list_sid'=>'ConditionParameterTtype','list'=>array('options'=>array('scalar'=>'scalar value','field'=>'field','array'=>'array')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_condition_parameter_type','cai'=>1);
$e['RowAction'][11]=array('table'=>'fgs_column','rowid'=>'1488','sid'=>'column_name','fieldset'=>'','name'=>'column_name','label'=>'Name','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_name','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['RowAction'][12]=array('table'=>'fgs_column','rowid'=>'1489','sid'=>'column_file','fieldset'=>'','name'=>'column_file','label'=>'Image','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_file','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['RowAction'][13]=array('table'=>'fgs_column','rowid'=>'1497','sid'=>'column_renderer','fieldset'=>'','name'=>'column_renderer','label'=>'Renderer','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_renderer','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');