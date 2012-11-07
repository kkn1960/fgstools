<?php
$search['SearchTemplate']=array();
$search['SearchTemplate']['session']=array('display','hide');
$search['SearchTemplate']['initial']=array();
$button['SearchTemplate']=array();
$button['SearchTemplate'][]=array('value'=>'Set filter','name'=>'set_filter','renderer'=>'button','type'=>'submit','action'=>'set_filter','attributes'=>'tabindex=\'0\'');
$button['SearchTemplate'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel');
$button['SearchTemplate'][]=array('value'=>'Drop filter','name'=>'drop_filter','renderer'=>'button','type'=>'submit','action'=>'drop_filter','attributes'=>'tabindex=\'0\'');
$search['SearchTemplate']['properties']=array('table'=>'fgs_form','title'=>'SearchTemplate','application'=>false,'method'=>'post','system'=>1,'title'=>'SearchTemplate','events'=>array('set_filter'=>'search','drop_filter'=>'search'),'chains'=>'0');
$p['SearchTemplate']=array();