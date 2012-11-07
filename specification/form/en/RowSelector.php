<?php
$form['RowSelector']=array();
$form['RowSelector']['initial']=array();
$form['RowSelector']['initial']=array('mode'=>'update');
$form['RowSelector']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['RowSelector']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['RowSelector']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['RowSelector']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['RowSelector']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['RowSelector']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['RowSelector']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['RowSelector']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['RowSelector']=array();
$button['RowSelector'][]=array('value'=>'Insert','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['RowSelector'][]=array('value'=>'Update','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['RowSelector'][]=array('value'=>'Remove','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['RowSelector'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['RowSelector'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['RowSelector'][]=array('value'=>'Reset','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['RowSelector']['properties']=array('primary_key'=>array('column_rowid'),'table'=>'fgs_column','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'column_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['RowSelector']=array();
$e['RowSelector'][0]=array('table'=>'fgs_column','rowid'=>'201','sid'=>'column_grid','fieldset'=>'','name'=>'column_grid','label'=>'Grid','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_grid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\'');
$e['RowSelector'][1]=array('table'=>'fgs_column','rowid'=>'202','sid'=>'column_type','fieldset'=>'','name'=>'column_type','label'=>'Type','component'=>'InputText','type'=>'varchar','required'=>1,'default_value'=>'text','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_type','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' readonly=\'1\' size=\'60\' tabindex=\'40\'');
$e['RowSelector'][2]=array('table'=>'fgs_column','rowid'=>'203','sid'=>'column_component','fieldset'=>'','name'=>'column_component','label'=>'Component','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ColumnComponent','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('options'=>array('ColumnText'=>'ColumnText','ColumnDate'=>'ColumnDate','ColumnDatetime'=>'ColumnDatetime','ColumnTime'=>'ColumnTime','ColumnLookup'=>'ColumnLookup','ColumnLink'=>'ColumnLink','ColumnTableJoiner'=>'ColumnTableJoiner','ColumnInputText'=>'ColumnInputText','ColumnSelectOneMenu'=>'ColumnSelectOneMenu','RowSetAction'=>'RowSetAction','RowAction'=>'RowAction','RowSelector'=>'RowSelector','GridButton'=>'GridButton')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'column_component','cai'=>1,'attributes'=>'readonly=\'1\' tabindex=\'45\'');
$e['RowSelector'][3]=array('table'=>'fgs_column','rowid'=>'204','sid'=>'column_index','fieldset'=>'','name'=>'column_index','label'=>'Index','component'=>'InputText','type'=>'smallint','default_value'=>'0','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_index','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'6\' size=\'6\' tabindex=\'50\'');
$e['RowSelector'][4]=array('table'=>'fgs_column','rowid'=>'10493','sid'=>'column_renderer','fieldset'=>'','name'=>'column_renderer','label'=>'Renderer','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'column_renderer','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');