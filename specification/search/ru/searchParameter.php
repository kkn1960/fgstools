<?php
$search['searchParameter']=array();
$search['searchParameter']['session']=array('display','hide');
$search['searchParameter']['initial']=array();
$button['searchParameter']=array();
$button['searchParameter'][]=array('value'=>'Установить фильтр','name'=>'set_filter','renderer'=>'button','type'=>'submit','action'=>'set_filter','attributes'=>'tabindex=\'0\'');
$button['searchParameter'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel');
$button['searchParameter'][]=array('value'=>'Сбросить фильтр','name'=>'drop_filter','renderer'=>'button','type'=>'submit','action'=>'drop_filter','attributes'=>'tabindex=\'0\'');
$search['searchParameter']['properties']=array('table'=>'fgs_parameter','title'=>'searchParameter','application'=>false,'method'=>'post','system'=>1,'title'=>'searchParameter','events'=>array('set_filter'=>'search','drop_filter'=>'search'),'chains'=>'0');
$p['searchParameter']=array();
$p['searchParameter']['p1602']=array();
$p['searchParameter']['p1602']['class']='Predicate';
$p['searchParameter']['p1602']['properties']=array('rowid'=>1602,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.parameter_id','type'=>'varchar','fieldset'=>'','label'=>'Id');
$p['searchParameter']['p1602']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_parameter_id_1602','name'=>'operator_parameter_id_1602','type'=>'varchar','name'=>'operator_parameter_id_1602','component'=>'SelectOneMenu','rowid'=>1602,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['searchParameter']['p1602']['connector']=array('renderer'=>'radio','sid'=>'connector_parameter_id_1602','name'=>'connector_parameter_id_1602','type'=>'tinyint','name'=>'connector_parameter_id_1602','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1602,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['searchParameter']['p1602']['argument']=array('field'=>'parameter_id','label'=>'Id','sid'=>'argument_parameter_id_1602','name'=>'argument_parameter_id_1602','trim'=>'notrim','component'=>'InputText','rowid'=>1602,'fieldset'=>'','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['searchParameter']['p1603']=array();
$p['searchParameter']['p1603']['class']='Predicate';
$p['searchParameter']['p1603']['properties']=array('rowid'=>1603,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.parameter_id','type'=>'varchar','fieldset'=>'','label'=>'Id');
$p['searchParameter']['p1603']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_parameter_id_1603','name'=>'operator_parameter_id_1603','type'=>'varchar','name'=>'operator_parameter_id_1603','component'=>'SelectOneMenu','rowid'=>1603,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['searchParameter']['p1603']['connector']=array('renderer'=>'radio','sid'=>'connector_parameter_id_1603','name'=>'connector_parameter_id_1603','type'=>'tinyint','name'=>'connector_parameter_id_1603','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1603,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['searchParameter']['p1603']['argument']=array('field'=>'parameter_id','label'=>'Id','sid'=>'argument_parameter_id_1603','name'=>'argument_parameter_id_1603','trim'=>'notrim','component'=>'InputText','rowid'=>1603,'fieldset'=>'','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');