<?php
$form['FilterStripTags']=array();
$form['FilterStripTags']['initial']=array();
$form['FilterStripTags']['initial']=array('mode'=>'update');
$form['FilterStripTags']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['FilterStripTags']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['FilterStripTags']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['FilterStripTags']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['FilterStripTags']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['FilterStripTags']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['FilterStripTags']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['FilterStripTags']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['FilterStripTags']=array();
$button['FilterStripTags'][]=array('value'=>'��������','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'),'attributes'=>"tabindex='0'");
$button['FilterStripTags'][]=array('value'=>'��������','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'),'attributes'=>"tabindex='0'");
$button['FilterStripTags'][]=array('value'=>'�������','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'),'attributes'=>"tabindex='0'");
$button['FilterStripTags'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'),'attributes'=>"tabindex='0'");
$button['FilterStripTags'][]=array('value'=>'��������','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'),'attributes'=>"tabindex='0'");
$button['FilterStripTags'][]=array('value'=>'�������� ���������','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'),'attributes'=>"tabindex='0'");
$form['FilterStripTags']['properties']=array('primary_key'=>array('filter_rowid'),'table'=>'fgs_filter','method'=>'post','system'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'filter_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>"",'htmlevents'=>"",'enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['FilterStripTags']=array();
$e['FilterStripTags'][0]=array('table'=>'fgs_filter','rowid'=>'621','sid'=>'filter_field','fieldset'=>'','name'=>'filter_field','label'=>'����','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'filter_field','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' readonly='1' size='60' tabindex='0'");
$e['FilterStripTags'][1]=array('table'=>'fgs_filter','rowid'=>'622','sid'=>'filter_converter','fieldset'=>'','name'=>'filter_converter','label'=>'������','component'=>'SelectOneMenu','renderer'=>'OneMenu','list_sid'=>'Filters','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'filter_converter','cai'=>1,'attributes'=>"readonly='1' tabindex='0'");