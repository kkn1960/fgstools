<?php $e['510']=array('table'=>'fgs_table','rowid'=>'510','sid'=>'table_master','fieldset'=>'','name'=>'table_master','label'=>'Master table','component'=>'SelectOneMenu','chain'=>'0','tier'=>'1','chain_role'=>'member','id'=>'ajax_table_master','register'=>'table_master','renderer'=>'OneMenu','list_sid'=>'ApplicationTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ApplicationTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','table_alias'=>'master_table','alias'=>'app_table','display_field'=>'table_name','predicates'=>array(array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'id'=>'ajax_table_master','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'table_master','cai'=>1,'acl'=>array('users'=>array(),'roles'=>array('programmer')));