<?php $e['10864']=array('table'=>'fgs_list','rowid'=>'10864','sid'=>'list_dataset','fieldset'=>'','name'=>'list_dataset','label'=>'Dataset','component'=>'SelectOneMenu','chain'=>'0','tier'=>'1','chain_role'=>'member','id'=>'ajax_list_dataset','register'=>'dataset','renderer'=>'OneMenu','list_sid'=>'UnitDataset','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'UnitDataset','table'=>'fgs_dataset','from'=>'fgs_dataset','primary_key'=>'dataset_sid','select'=>'dataset_sid id,dataset_sid as name','order'=>'dataset_sid ASC','display_field'=>'dataset_sid','predicates'=>array(array('field'=>'dataset_system','type'=>'tinyint','table'=>'fgs_dataset','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'id'=>'ajax_list_dataset','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'list_dataset','cai'=>1,'acl'=>array('users'=>array(),'roles'=>array('programmer')));