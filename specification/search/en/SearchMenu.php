<?php
$search['SearchMenu']=array();
$search['SearchMenu']['session']=array('display','hide');
$search['SearchMenu']['initial']=array();
$button['SearchMenu']=array();
$button['SearchMenu'][]=array('value'=>'Set filter','name'=>'set_filter','renderer'=>'button','type'=>'submit','action'=>'set_filter','attributes'=>'tabindex=\'0\'');
$button['SearchMenu'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel');
$button['SearchMenu'][]=array('value'=>'Drop filter','name'=>'drop_filter','renderer'=>'button','type'=>'submit','action'=>'drop_filter','attributes'=>'tabindex=\'0\'');
$search['SearchMenu']['properties']=array('table'=>'fgs_menu','title'=>'SearchMenu','application'=>false,'method'=>'post','system'=>1,'title'=>'SearchMenu','events'=>array('set_filter'=>'search','drop_filter'=>'search'),'chains'=>'0');
$p['SearchMenu']=array();
$p['SearchMenu']['p11352']=array();
$p['SearchMenu']['p11352']['class']='Predicate';
$p['SearchMenu']['p11352']['properties']=array('rowid'=>11352,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.menu_system','type'=>'tinyint','fieldset'=>'','label'=>'System ?');
$p['SearchMenu']['p11352']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_menu_system_11352','name'=>'operator_menu_system_11352','type'=>'varchar','name'=>'operator_menu_system_11352','component'=>'SelectOneMenu','rowid'=>11352,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','m'=>'greater','mq'=>'greater or equal','l'=>'less','lq'=>'less or equal')),'default_value'=>'equal','fixed'=>0);
$p['SearchMenu']['p11352']['connector']=array('renderer'=>'radio','sid'=>'connector_menu_system_11352','name'=>'connector_menu_system_11352','type'=>'tinyint','name'=>'connector_menu_system_11352','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>11352,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchMenu']['p11352']['argument']=array('field'=>'menu_system','label'=>'System ?','sid'=>'argument_menu_system_11352','name'=>'argument_menu_system_11352','component'=>'SelectOneMenu','rowid'=>11352,'fieldset'=>'','renderer'=>'OneMenu','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'type'=>'tinyint','cai'=>1);