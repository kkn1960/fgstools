<?php
$list['ParentMenu']=array('sid'=>'ParentMenu','from'=>'fgs_item','primary_key'=>'item_id','select'=>'item_id id,item_name name','order'=>'item_id ASC','where'=>"@MenuItem",'table_alias'=>'pm','alias'=>'parent','display_field'=>'item_name');