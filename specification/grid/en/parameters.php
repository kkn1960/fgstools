<?php
$grid['parameters']=array();
$selector['parameters']=array('field'=>'selectrow','renderer'=>'selector','view'=>"<input onclick=\"toggleRow(%1\$d)\" type=checkbox name=\"selectrow[%1\$d]\" id=\"id_selectrow_%1\$d\" value=\"%2\$s\">");
$grid['parameters']['properties']=array('table'=>'fgs_parameter','system'=>1,'primary_key'=>array('parameter_id'),'modal'=>0,'user_order'=>1,'user_pagesize'=>1,'user_offset'=>1,'inline_edit'=>0,'title'=>'parameters','joins'=>array(),'save'=>array(),'sort'=>array('parameter_id'=>'parameter_id'),'sort_prefix'=>array(),'sort_suffix'=>array(),'register'=>array(),'select'=>'t.parameter_id','from'=>'fgs_parameter t ');
$grid['parameters']['initial']=array('pagesize'=>30,'direction'=>'ASC','order'=>'parameter_id','offset'=>0);
$grid['parameters']['session']=array('pagesize','direction','order','offset','total','multimode_hide','display','hide','apk');
$ra['parameters']=array();
$ra['parameters'][]=array('load'=>false,'action'=>'update','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;update=%1$d&amp;key=%2$s" class="icon_edit" title="Edit" ></a>');
$ra['parameters'][]=array('load'=>false,'action'=>'remove','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;remove=%1$d&amp;key=%2$s" class="icon_delete" title="Remove" ></a>');
$ra['parameters'][]=array('load'=>false,'action'=>'copy','renderer'=>'RowAction','immediate'=>0,'view'=>'<a href="%3$s&amp;copy=%1$d&amp;key=%2$s" class="icon_copy" title="Copy" ></a>');
$rsa['parameters']=array();
$rsa['parameters'][]=array('action'=>'multi_update','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_update"  title="Multi_update" ><span style="margin:0 -5px -3px -0px;" class="icon_edit"></span></button>');
$rsa['parameters'][]=array('action'=>'multi_remove','renderer'=>'RowSetAction','immediate'=>0,'view'=>'<button type="submit" name="multi_remove"  title="Multi_remove" ><span style="margin:0 -5px -3px -0px;" class="icon_delete"></span></button>');
$column['parameters']=array();
$column['parameters'][0]=array('rowid'=>299,'component'=>'ColumnText','header'=>'Id','sid'=>'parameter_id','hidden'=>'0','renderer'=>'text','type'=>'varchar','field'=>'parameter_id','hidden'=>'0','calculate'=>'0');
$button['parameters']=array();