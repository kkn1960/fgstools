<?php
$search['SearchValidator']=array();
$search['SearchValidator']['session']=array('display','hide');
$search['SearchValidator']['initial']=array();
$button['SearchValidator']=array();
$button['SearchValidator'][]=array('value'=>'Установить фильтр','name'=>'set_filter','renderer'=>'button','type'=>'submit','action'=>'set_filter','attributes'=>'tabindex=\'0\'');
$button['SearchValidator'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel');
$button['SearchValidator'][]=array('value'=>'Сбросить фильтр','name'=>'drop_filter','renderer'=>'button','type'=>'submit','action'=>'drop_filter','attributes'=>'tabindex=\'0\'');
$search['SearchValidator']['properties']=array('table'=>'fgs_validator','title'=>'SearchValidator','application'=>false,'method'=>'post','system'=>1,'title'=>'SearchValidator','events'=>array('set_filter'=>'search','drop_filter'=>'search'),'chains'=>'0');
$p['SearchValidator']=array();
$p['SearchValidator']['p1627']=array();
$p['SearchValidator']['p1627']['class']='Predicate';
$p['SearchValidator']['p1627']['properties']=array('rowid'=>1627,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.validator_field','type'=>'varchar','fieldset'=>'','label'=>'Поле');
$p['SearchValidator']['p1627']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_validator_field_1627','name'=>'operator_validator_field_1627','type'=>'varchar','name'=>'operator_validator_field_1627','component'=>'SelectOneMenu','rowid'=>1627,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchValidator']['p1627']['connector']=array('renderer'=>'radio','sid'=>'connector_validator_field_1627','name'=>'connector_validator_field_1627','type'=>'tinyint','name'=>'connector_validator_field_1627','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1627,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchValidator']['p1627']['argument']=array('field'=>'validator_field','label'=>'Поле','sid'=>'argument_validator_field_1627','name'=>'argument_validator_field_1627','trim'=>'notrim','component'=>'InputText','rowid'=>1627,'fieldset'=>'','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');