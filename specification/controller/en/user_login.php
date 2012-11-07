<?php
$config=array();
$class='FGSLogin';
$template='login.php';
$script='login.php';
$config['title']='user_login';
$config['system']=1;
$config['acl']=array('users'=>array(),'roles'=>array());
$config['initial']=array();
$config['session']=array('return_controller','return_window','return_url');
$config['crud']['controller']=array('form'=>true,'grid'=>false,'search'=>false,'dataset'=>false);
$config['crud']['components']=array();
$config['crud']['class']='Unit';
$config['crud']['type']='crud';
$config['crud']['components']['form'] =array('class'=>'LoginForm','sid'=>'login','display'=>1,'renderer'=>'LoginFormView','hide'=>0);
$config['crud']['session']=array('controller');
$config['crud']['initial']=array();