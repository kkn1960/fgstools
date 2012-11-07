<?php
$config=array();
$class='Crud';
$template='crud.php';
$script='configurator.php';
$config['title']='options';
$config['system']=1;
$config['acl']=array('users'=>array(),'roles'=>array('programmer'));
$config['initial']=array();
$config['session']=array();
$config['crud']['controller']=array('form'=>true,'grid'=>true,'search'=>true,'dataset'=>false);
$config['crud']['components']=array();
$config['crud']['class']='Unit';
$config['crud']['type']='crud';
$config['crud']['components']['form'] =array('class'=>'Form','sid'=>'option','display'=>1,'renderer'=>'FgsFormView','hide'=>0);
$config['crud']['components']['grid'] =array('class'=>'Grid','sid'=>'options','display'=>1,'renderer'=>'FgsGridView','hide'=>0,'multimode_hide'=>1);
$config['crud']['components']['search'] =array('class'=>'Search','sid'=>'SearchOption','display'=>1,'renderer'=>'FgsSearchView','hide'=>0);
$config['crud']['session']=array('controller');
$config['crud']['initial']=array();