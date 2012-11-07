<?php
$config=array();
$class='Crud';
$template='crud.php';
$script='configurator.php';
$config['title']='messages';
$config['system']=1;
$config['acl']=array('users'=>array(),'roles'=>array('programmer'));
$config['initial']=array();
$config['session']=array();
$config['crud']['controller']=array('form'=>true,'grid'=>true,'search'=>true,'dataset'=>false);
$config['crud']['components']=array();
$config['crud']['class']='Unit';
$config['crud']['type']='crud';
$config['crud']['components']['form'] =array('class'=>'Form','sid'=>'message','display'=>1,'renderer'=>'FgsFormView','hide'=>0);
$config['crud']['components']['grid'] =array('class'=>'Grid','sid'=>'messages','display'=>1,'renderer'=>'FgsGridView','hide'=>0,'multimode_hide'=>1);
$config['crud']['components']['search'] =array('class'=>'Search','sid'=>'messageSearch','display'=>1,'renderer'=>'FgsSearchView','hide'=>0);
$config['crud']['session']=array('controller');
$config['crud']['initial']=array();