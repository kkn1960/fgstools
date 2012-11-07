<?php
$form['dummy']=array();
$form['dummy']['properties']=array('method'=>'post','table'=>'fgs_elements','modes'=>array('update'));

$form['dummy']['initial']=array('mode'=>'update');
$form['dummy']['session']['update']=array('mode','active','apk','irow','foreign_key');
$form['dummy']['select']='t.*';
$form['dummy']['from']='fgs_elements t';

$form['dummy']['primary_key']=array('element_rowid');
$button['dummy']=array();
$e['dummy']=array();
