<?php
$form['ValidatorLessOrEqual']=array();
$form['ValidatorLessOrEqual']['initial']=array();
$form['ValidatorLessOrEqual']['initial']=array('mode'=>'update');
$form['ValidatorLessOrEqual']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['ValidatorLessOrEqual']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ValidatorLessOrEqual']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ValidatorLessOrEqual']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ValidatorLessOrEqual']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ValidatorLessOrEqual']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ValidatorLessOrEqual']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['ValidatorLessOrEqual']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['ValidatorLessOrEqual']=array();
$button['ValidatorLessOrEqual'][]=array('value'=>'��������','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'),'attributes'=>"tabindex='0'");
$button['ValidatorLessOrEqual'][]=array('value'=>'��������','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'),'attributes'=>"tabindex='0'");
$button['ValidatorLessOrEqual'][]=array('value'=>'�������','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'),'attributes'=>"tabindex='0'");
$button['ValidatorLessOrEqual'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'),'attributes'=>"tabindex='0'");
$button['ValidatorLessOrEqual'][]=array('value'=>'��������','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'),'attributes'=>"tabindex='0'");
$button['ValidatorLessOrEqual'][]=array('value'=>'�������� ���������','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'),'attributes'=>"tabindex='0'");
$form['ValidatorLessOrEqual']['properties']=array('primary_key'=>array('validator_rowid'),'table'=>'fgs_validator','method'=>'post','system'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'validator_specification','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>"",'htmlevents'=>"",'enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['ValidatorLessOrEqual']=array();
$e['ValidatorLessOrEqual'][0]=array('table'=>'fgs_validator','rowid'=>'2186','sid'=>'validator_field','fieldset'=>'','name'=>'validator_field','label'=>'����','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'validator_field','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='64' readonly='1' size='60'");