<?php
$config=array();
$class='MasterDetail';
$template='md.php';
$script='configurator.php';
$config['title']='menus';
$config['system']=1;
$config['session']=array('mode');
$config['initial']=array('mode'=>'master');
$config['units']=array('master','detail');
$config['master']['controller']=array('form'=>true,'grid'=>true,'search'=>true,'dataset'=>false);
$config['master']['components']=array();
$config['master']['class']='Unit';
$config['master']['type']='master';
$config['master']['components']['form'] =array('class'=>'Form','sid'=>'menu','display'=>1,'renderer'=>'FgsFormView','hide'=>0);
$config['master']['components']['grid'] =array('class'=>'Grid','sid'=>'menus','display'=>1,'renderer'=>'FgsGridView','hide'=>0,'multimode_hide'=>0);
$config['master']['components']['search'] =array('class'=>'Search','sid'=>'SearchMenu','display'=>1,'renderer'=>'FgsSearchView','hide'=>0);
$config['master']['session']=array('controller');
$config['master']['initial']=array();
$config['detail']['controller']=array('form'=>true,'grid'=>true,'search'=>false,'dataset'=>false);
$config['detail']['components']=array();
$config['detail']['class']='Unit';
$config['detail']['type']='detail';
$config['detail']['components']['form'] =array('class'=>'Form','sid'=>'menu_item','display'=>1,'renderer'=>'FgsFormView','hide'=>0);
$config['detail']['components']['grid'] =array('class'=>'Grid','sid'=>'menu_items','display'=>1,'renderer'=>'FgsGridView','hide'=>0,'multimode_hide'=>0);
$config['detail']['session']=array('controller');
$config['detail']['initial']=array();
$config['acl']=array('users'=>array(),'roles'=>array('programmer'));
$config['units']=array('master','detail');