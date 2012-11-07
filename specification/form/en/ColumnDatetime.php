<?php
$form['ColumnDatetime']=array();
$form['ColumnDatetime']['initial']=array();
$form['ColumnDatetime']['initial']=array('mode'=>'update');
$form['ColumnDatetime']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['ColumnDatetime']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnDatetime']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnDatetime']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnDatetime']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnDatetime']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnDatetime']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnDatetime']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['ColumnDatetime']=array();
$button['ColumnDatetime'][]=array('value'=>'Insert','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['ColumnDatetime'][]=array('value'=>'Update','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['ColumnDatetime'][]=array('value'=>'Remove','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['ColumnDatetime'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['ColumnDatetime'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['ColumnDatetime'][]=array('value'=>'Reset','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['ColumnDatetime']['properties']=array('primary_key'=>array('column_rowid'),'table'=>'fgs_column','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'column_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['ColumnDatetime']=array();
$e['ColumnDatetime'][0]=array('table'=>'fgs_column','rowid'=>'89','sid'=>'column_grid','fieldset'=>'system','name'=>'column_grid','label'=>'Grid','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_grid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\'');
$e['ColumnDatetime'][1]=array('table'=>'fgs_column','rowid'=>'88','sid'=>'column_table','fieldset'=>'system','name'=>'column_table','label'=>'Table','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_table','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'30\'');
$e['ColumnDatetime'][2]=array('table'=>'fgs_column','rowid'=>'11082','sid'=>'column_table_alias','fieldset'=>'system','name'=>'column_table_alias','label'=>'Table alias','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_table_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'8\' size=\'8\'');
$e['ColumnDatetime'][3]=array('table'=>'fgs_column','rowid'=>'87','sid'=>'column_field','fieldset'=>'system','name'=>'column_field','label'=>'Field','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'20\'');
$e['ColumnDatetime'][4]=array('table'=>'fgs_column','rowid'=>'11076','sid'=>'column_alias','fieldset'=>'system','name'=>'column_alias','label'=>'Alias','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnDatetime'][5]=array('table'=>'fgs_column','rowid'=>'91','sid'=>'column_type','fieldset'=>'system','name'=>'column_type','label'=>'Type','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_type','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnDatetime'][6]=array('table'=>'fgs_column','rowid'=>'90','sid'=>'column_component','fieldset'=>'system','name'=>'column_component','label'=>'Component','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ColumnComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('options'=>array('ColumnText'=>'ColumnText','ColumnDate'=>'ColumnDate','ColumnDatetime'=>'ColumnDatetime','ColumnTime'=>'ColumnTime','ColumnLookup'=>'ColumnLookup','ColumnLink'=>'ColumnLink','ColumnTableJoiner'=>'ColumnTableJoiner','ColumnInputText'=>'ColumnInputText','ColumnSelectOneMenu'=>'ColumnSelectOneMenu','RowSetAction'=>'RowSetAction','RowAction'=>'RowAction','RowSelector'=>'RowSelector','GridButton'=>'GridButton')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_component','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'45\'');
$e['ColumnDatetime'][7]=array('table'=>'fgs_column','rowid'=>'11081','sid'=>'column_sid','fieldset'=>'system','name'=>'column_sid','label'=>'Sid','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_sid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnDatetime'][8]=array('table'=>'fgs_column','rowid'=>'11037','sid'=>'column_save','fieldset'=>'system','name'=>'column_save','label'=>'Save','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'column_save','cai'=>1);
$e['ColumnDatetime'][9]=array('table'=>'fgs_column','rowid'=>'10845','sid'=>'column_register','fieldset'=>'system','name'=>'column_register','label'=>'Global name','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_register','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnDatetime'][10]=array('table'=>'fgs_column','rowid'=>'11079','sid'=>'column_hidden','fieldset'=>'system','name'=>'column_hidden','label'=>'Hidden ?','trim'=>'trim','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_hidden','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnDatetime'][11]=array('table'=>'fgs_column','rowid'=>'11080','sid'=>'column_renderer','fieldset'=>'rendering','name'=>'column_renderer','label'=>'Renderer','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_renderer','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnDatetime'][12]=array('table'=>'fgs_column','rowid'=>'93','sid'=>'column_index','fieldset'=>'rendering','name'=>'column_index','label'=>'Index','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\' tabindex=\'50\'');
$e['ColumnDatetime'][13]=array('table'=>'fgs_column','rowid'=>'94','sid'=>'column_header','fieldset'=>'rendering','name'=>'column_header','label'=>'Header','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_header','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnDatetime'][14]=array('table'=>'fgs_column','rowid'=>'95','sid'=>'column_span','fieldset'=>'rendering','name'=>'column_span','label'=>'Span','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_span','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnDatetime'][15]=array('table'=>'fgs_column','rowid'=>'10947','sid'=>'column_align','fieldset'=>'rendering','name'=>'column_align','label'=>'Align','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_align','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnDatetime'][16]=array('table'=>'fgs_column','rowid'=>'11083','sid'=>'column_width','fieldset'=>'rendering','name'=>'column_width','label'=>'Width','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_width','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['ColumnDatetime'][17]=array('table'=>'fgs_column','rowid'=>'11077','sid'=>'column_converter','fieldset'=>'rendering','name'=>'column_converter','label'=>'Converter','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_converter','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnDatetime'][18]=array('table'=>'fgs_column','rowid'=>'92','sid'=>'column_format','fieldset'=>'rendering','name'=>'column_format','label'=>'Format','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_format','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['ColumnDatetime'][19]=array('table'=>'fgs_column','rowid'=>'11078','sid'=>'column_function','fieldset'=>'rendering','name'=>'column_function','label'=>'Function','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_function','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['ColumnDatetime'][20]=array('table'=>'fgs_column','rowid'=>'96','sid'=>'column_footer','fieldset'=>'rendering','name'=>'column_footer','label'=>'Footer','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_footer','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnDatetime'][21]=array('table'=>'fgs_column','rowid'=>'11010','sid'=>'column_sort','fieldset'=>'sorting','name'=>'column_sort','label'=>'Sort as','trim'=>'trim','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_sort','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['ColumnDatetime'][22]=array('table'=>'fgs_column','rowid'=>'11011','sid'=>'column_sort_prefix','fieldset'=>'sorting','name'=>'column_sort_prefix','label'=>'Sort prefix','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_sort_prefix','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['ColumnDatetime'][23]=array('table'=>'fgs_column','rowid'=>'11012','sid'=>'column_sort_suffix','fieldset'=>'sorting','name'=>'column_sort_suffix','label'=>'Sort suffix','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_sort_suffix','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');