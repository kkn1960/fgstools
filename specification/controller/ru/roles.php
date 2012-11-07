<?php
$config=array();
$class='Crud';
$template='admin_crud.php';
$config['title']='roles';
$config['system']=1;
$config['acl']=array('users'=>array(),'roles'=>array('programmer','sysadmin'));
$config['initial']=array();
$config['session']=array();
$config['crud']['controller']=array('form'=>true,'grid'=>true,'search'=>false,'dataset'=>false);
$config['crud']['components']=array();
$config['crud']['class']='Unit';
$config['crud']['type']='crud';
$config['crud']['components']['form'] =array('class'=>'Form','sid'=>'roles','display'=>1,'renderer'=>'FgsFormView','hide'=>0);
$config['crud']['components']['grid'] =array('class'=>'Grid','sid'=>'roles','display'=>1,'renderer'=>'FgsGridView','hide'=>0,'multimode_hide'=>0);
$config['crud']['session']=array('controller');
$config['crud']['initial']=array();