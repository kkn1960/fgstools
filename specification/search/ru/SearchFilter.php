<?php
$search['SearchFilter']=array();
$search['SearchFilter']['session']=array('display','hide');
$search['SearchFilter']['initial']=array();
$button['SearchFilter']=array();
$button['SearchFilter'][]=array('value'=>'Установить фильтр','name'=>'set_filter','renderer'=>'button','type'=>'submit','action'=>'set_filter','attributes'=>'tabindex=\'0\'');
$button['SearchFilter'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel');
$button['SearchFilter'][]=array('value'=>'Сбросить фильтр','name'=>'drop_filter','renderer'=>'button','type'=>'submit','action'=>'drop_filter','attributes'=>'tabindex=\'0\'');
$search['SearchFilter']['properties']=array('table'=>'fgs_filter','title'=>'SearchFilter','application'=>false,'method'=>'post','system'=>1,'title'=>'SearchFilter','events'=>array('set_filter'=>'search','drop_filter'=>'search'),'chains'=>'0');
$p['SearchFilter']=array();
$p['SearchFilter']['p1573']=array();
$p['SearchFilter']['p1573']['class']='Predicate';
$p['SearchFilter']['p1573']['properties']=array('rowid'=>1573,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.filter_field','type'=>'varchar','fieldset'=>'','label'=>'Filter_field');
$p['SearchFilter']['p1573']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_filter_field_1573','name'=>'operator_filter_field_1573','type'=>'varchar','name'=>'operator_filter_field_1573','component'=>'SelectOneMenu','rowid'=>1573,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFilter']['p1573']['connector']=array('renderer'=>'radio','sid'=>'connector_filter_field_1573','name'=>'connector_filter_field_1573','type'=>'tinyint','name'=>'connector_filter_field_1573','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1573,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchFilter']['p1573']['argument']=array('field'=>'filter_field','label'=>'Filter_field','sid'=>'argument_filter_field_1573','name'=>'argument_filter_field_1573','trim'=>'notrim','component'=>'InputText','rowid'=>1573,'fieldset'=>'','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchFilter']['p1574']=array();
$p['SearchFilter']['p1574']['class']='Predicate';
$p['SearchFilter']['p1574']['properties']=array('rowid'=>1574,'component'=>'SelectManyListbox','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.filter_converter','type'=>'set','fieldset'=>'','label'=>'Filter_converter');
$p['SearchFilter']['p1574']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_filter_converter_1574','name'=>'operator_filter_converter_1574','type'=>'varchar','name'=>'operator_filter_converter_1574','component'=>'SelectOneMenu','rowid'=>1574,'list'=>array('options'=>array('in'=>'член множества','not_in'=>'не член множества')),'default_value'=>'in','fixed'=>0);
$p['SearchFilter']['p1574']['connector']=array('renderer'=>'radio','sid'=>'connector_filter_converter_1574','name'=>'connector_filter_converter_1574','type'=>'tinyint','name'=>'connector_filter_converter_1574','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1574,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchFilter']['p1574']['argument']=array('field'=>'filter_converter','label'=>'Filter_converter','sid'=>'argument_filter_converter_1574','name'=>'argument_filter_converter_1574','component'=>'SelectManyListbox','rowid'=>1574,'fieldset'=>'','renderer'=>'ManyListbox','size'=>'60','list_sid'=>'Converter','list'=>array('sid'=>'Converter','table'=>'fgs_converter','from'=>'fgs_converter','primary_key'=>'converter_sid','select'=>'converter_sid id,converter_sid as name','order'=>'converter_sid ASC','display_field'=>'converter_sid'),'type'=>'set','cai'=>1);