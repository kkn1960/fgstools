<?php
$config=array();
$class='Configurator';
$template='fgs.php';
$script='configurator.php';
$config['title']='forms';
$config['system']=1;
$config['session']=array('mode','previous_mode');
$config['initial']=array('mode'=>'master','previous_mode'=>'');
$config['acl']=array('users'=>array(),'roles'=>array('programmer'));
$config['master']['controller']=array('form'=>true,'grid'=>true,'search'=>true,'dataset'=>true);
$config['master']['components']=array();
$config['master']['class']='Unit';
$config['master']['type']='master';
$config['master']['components']['form'] =array('class'=>'Form','sid'=>'form','display'=>0,'renderer'=>'FgsFormView','hide'=>1);
$config['master']['components']['grid'] =array('class'=>'FormGrid','sid'=>'InputForms','display'=>1,'renderer'=>'FgsGridView','hide'=>0,'multimode_hide'=>0);
$config['master']['components']['search'] =array('class'=>'Search','sid'=>'FormSearch','display'=>1,'renderer'=>'FgsSearchView','hide'=>0);
$config['master']['components']['dataset'] =array('class'=>'Dataset','sid'=>'InputForm','hide'=>0);
$config['master']['session']=array('controller');
$config['master']['initial']=array();
$config['units']=array('master','element','validator','filter','add','attribute');
$config['element']['controller']=array('form'=>true,'grid'=>true,'search'=>false,'dataset'=>false);
$config['element']['components']=array();
$config['element']['class']='Unit';
$config['element']['type']='detail';
$config['element']['components']['form'] =array('class'=>'Form','sid'=>'Element','display'=>0,'renderer'=>'FgsFormView','hide'=>1);
$config['element']['components']['grid'] =array('class'=>'Grid','sid'=>'elements','display'=>1,'renderer'=>'FgsGridView','hide'=>0,'multimode_hide'=>0);
$config['element']['session']=array('controller');
$config['element']['initial']=array();
$config['validator']['controller']=array('form'=>true,'grid'=>true,'search'=>false,'dataset'=>false);
$config['validator']['components']=array();
$config['validator']['class']='Unit';
$config['validator']['type']='detail';
$config['validator']['components']['form'] =array('class'=>'Form','sid'=>'validator','display'=>1,'renderer'=>'FgsFormView','hide'=>0);
$config['validator']['components']['grid'] =array('class'=>'Grid','sid'=>'validators','display'=>1,'renderer'=>'FgsGridView','hide'=>0,'multimode_hide'=>0);
$config['validator']['session']=array('controller');
$config['validator']['initial']=array();
$config['filter']['controller']=array('form'=>true,'grid'=>true,'search'=>false,'dataset'=>false);
$config['filter']['components']=array();
$config['filter']['class']='Unit';
$config['filter']['type']='detail';
$config['filter']['components']['form'] =array('class'=>'Form','sid'=>'filter','display'=>1,'renderer'=>'FgsFormView','hide'=>0);
$config['filter']['components']['grid'] =array('class'=>'Grid','sid'=>'filters','display'=>1,'renderer'=>'FgsGridView','hide'=>0,'multimode_hide'=>0);
$config['filter']['session']=array('controller');
$config['filter']['initial']=array();
$config['add']['controller']=array('form'=>false,'grid'=>true,'search'=>false,'dataset'=>false);
$config['add']['components']=array();
$config['add']['class']='Unit';
$config['add']['type']='auxiliary';
$config['add']['components']['grid'] =array('class'=>'Grid','sid'=>'InitForm','display'=>1,'renderer'=>'FgsAddGridView','hide'=>0,'multimode_hide'=>0);
$config['add']['session']=array('controller');
$config['add']['initial']=array();
$config['attribute']['controller']=array('form'=>true,'grid'=>false,'search'=>false,'dataset'=>false);
$config['attribute']['components']=array();
$config['attribute']['class']='Attribute';
$config['attribute']['type']='attribute';
$config['attribute']['components']['form'] =array('class'=>'Form','sid'=>'dummy','display'=>1,'renderer'=>'AttributeView','hide'=>0);
$config['attribute']['session']=array('controller','component');
$config['attribute']['initial']=array('component'=>'dummy');