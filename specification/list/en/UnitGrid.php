<?php
$list['UnitGrid']=array('sid'=>'UnitGrid','table'=>'fgs_grid','from'=>'fgs_grid','primary_key'=>'grid_sid','select'=>'grid_sid id,grid_sid as name','order'=>'grid_sid ASC','display_field'=>'grid_sid','predicates'=>array(array('field'=>'grid_system','type'=>'tinyint','table'=>'fgs_grid','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'),array('field'=>'grid_type','type'=>'varchar','table'=>'fgs_grid','fieldset'=>'t','required'=>'1','argument'=>"template",'operator'=>'not_equal','connector'=>'and')));