<?php
$form['ColumnLink']=array();
$form['ColumnLink']['initial']=array();
$form['ColumnLink']['initial']=array('mode'=>'update');
$form['ColumnLink']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['ColumnLink']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnLink']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnLink']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnLink']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnLink']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnLink']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ColumnLink']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['ColumnLink']=array();
$button['ColumnLink'][]=array('value'=>'Insert','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'),'attributes'=>'tabindex=\'0\'');
$button['ColumnLink'][]=array('value'=>'Update','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'),'attributes'=>'tabindex=\'0\'');
$button['ColumnLink'][]=array('value'=>'Remove','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'),'attributes'=>'tabindex=\'0\'');
$button['ColumnLink'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'),'attributes'=>'tabindex=\'0\'');
$button['ColumnLink'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'),'attributes'=>'tabindex=\'0\'');
$button['ColumnLink'][]=array('value'=>'Reset','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'),'attributes'=>'tabindex=\'0\'');
$form['ColumnLink']['properties']=array('primary_key'=>array('column_rowid'),'table'=>'fgs_column','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'column_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['ColumnLink']=array();
$e['ColumnLink'][0]=array('table'=>'fgs_column','rowid'=>'10780','sid'=>'column_grid','fieldset'=>'system','name'=>'column_grid','label'=>'Grid','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_grid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'0\'');
$e['ColumnLink'][1]=array('table'=>'fgs_column','rowid'=>'10779','sid'=>'column_table','fieldset'=>'system','name'=>'column_table','label'=>'Table','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_table','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'30\'');
$e['ColumnLink'][2]=array('table'=>'fgs_column','rowid'=>'11086','sid'=>'column_table_alias','fieldset'=>'system','name'=>'column_table_alias','label'=>'Table alias','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_table_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'8\' size=\'8\'');
$e['ColumnLink'][3]=array('table'=>'fgs_column','rowid'=>'10778','sid'=>'column_field','fieldset'=>'system','name'=>'column_field','label'=>'Field','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'20\'');
$e['ColumnLink'][4]=array('table'=>'fgs_column','rowid'=>'11084','sid'=>'column_alias','fieldset'=>'system','name'=>'column_alias','label'=>'Alias','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnLink'][5]=array('table'=>'fgs_column','rowid'=>'10782','sid'=>'column_type','fieldset'=>'system','name'=>'column_type','label'=>'Type','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_type','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['ColumnLink'][6]=array('table'=>'fgs_column','rowid'=>'10781','sid'=>'column_component','fieldset'=>'system','name'=>'column_component','label'=>'Component','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ColumnComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('options'=>array('ColumnText'=>'ColumnText','ColumnDate'=>'ColumnDate','ColumnDatetime'=>'ColumnDatetime','ColumnTime'=>'ColumnTime','ColumnLookup'=>'ColumnLookup','ColumnLink'=>'ColumnLink','ColumnTableJoiner'=>'ColumnTableJoiner','ColumnInputText'=>'ColumnInputText','ColumnSelectOneMenu'=>'ColumnSelectOneMenu','RowSetAction'=>'RowSetAction','RowAction'=>'RowAction','RowSelector'=>'RowSelector','GridButton'=>'GridButton')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_component','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'45\'');
$e['ColumnLink'][7]=array('table'=>'fgs_column','rowid'=>'11085','sid'=>'column_sid','fieldset'=>'system','name'=>'column_sid','label'=>'Sid','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_sid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnLink'][8]=array('table'=>'fgs_column','rowid'=>'11039','sid'=>'column_save','fieldset'=>'system','name'=>'column_save','label'=>'Save','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'column_save','cai'=>1);
$e['ColumnLink'][9]=array('table'=>'fgs_column','rowid'=>'10846','sid'=>'column_register','fieldset'=>'system','name'=>'column_register','label'=>'Global name','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_register','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnLink'][10]=array('table'=>'fgs_column','rowid'=>'10788','sid'=>'column_calculate','fieldset'=>'system','name'=>'column_calculate','label'=>'Calculate ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'column_calculate','cai'=>1);
$e['ColumnLink'][11]=array('table'=>'fgs_column','rowid'=>'10783','sid'=>'column_renderer','fieldset'=>'rendering','name'=>'column_renderer','label'=>'Renderer','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_renderer','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['ColumnLink'][12]=array('table'=>'fgs_column','rowid'=>'10784','sid'=>'column_index','fieldset'=>'rendering','name'=>'column_index','label'=>'Index','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\' tabindex=\'50\'');
$e['ColumnLink'][13]=array('table'=>'fgs_column','rowid'=>'10785','sid'=>'column_header','fieldset'=>'rendering','name'=>'column_header','label'=>'Header','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_header','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['ColumnLink'][14]=array('table'=>'fgs_column','rowid'=>'10786','sid'=>'column_span','fieldset'=>'rendering','name'=>'column_span','label'=>'Span','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_span','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['ColumnLink'][15]=array('table'=>'fgs_column','rowid'=>'10949','sid'=>'column_align','fieldset'=>'rendering','name'=>'column_align','label'=>'Align','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_align','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['ColumnLink'][16]=array('table'=>'fgs_column','rowid'=>'11087','sid'=>'column_width','fieldset'=>'rendering','name'=>'column_width','label'=>'Width','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_width','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['ColumnLink'][17]=array('table'=>'fgs_column','rowid'=>'10787','sid'=>'column_footer','fieldset'=>'rendering','name'=>'column_footer','label'=>'Footer','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_footer','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'0\'');
$e['ColumnLink'][18]=array('table'=>'fgs_column','rowid'=>'11016','sid'=>'column_sort','fieldset'=>'sorting','name'=>'column_sort','label'=>'Sort as','trim'=>'trim','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_sort','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['ColumnLink'][19]=array('table'=>'fgs_column','rowid'=>'11017','sid'=>'column_sort_prefix','fieldset'=>'sorting','name'=>'column_sort_prefix','label'=>'Sort prefix','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_sort_prefix','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['ColumnLink'][20]=array('table'=>'fgs_column','rowid'=>'11018','sid'=>'column_sort_suffix','fieldset'=>'sorting','name'=>'column_sort_suffix','label'=>'Sort suffix','trim'=>'trim','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_sort_suffix','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');