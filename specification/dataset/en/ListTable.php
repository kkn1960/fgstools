<?php
$ds['ListTable']=array('table'=>'fgs_table','system'=>1,'predicates'=>array(array('field'=>'table_name','type'=>'varchar','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"fgs_option",'operator'=>'equal','connector'=>'and'),array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'or')));