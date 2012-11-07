<?php
$config=array();
$class='Editor';
$template='editor.php';
$script='editor.php';
$config['title']='Editor';
$config['system']=1;
$config['acl']=array('users'=>array(),'roles'=>array('programmer'));
$config['initial']=array('component'=>'dummy');
$config['session']=array('component');
$config['crud']['controller']=array('form'=>true,'grid'=>false,'search'=>false,'dataset'=>false);
$config['crud']['components']=array();
$config['crud']['class']='Unit';
$config['crud']['type']='crud';
$config['crud']['components']['form'] =array('class'=>'AttributeForm','sid'=>'dummy','display'=>1,'renderer'=>'AttributeView','hide'=>0);
$config['crud']['session']=array('controller','component');
$config['crud']['initial']=array('component'=>'dummy');