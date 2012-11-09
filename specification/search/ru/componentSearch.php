<?php
$search['componentSearch']=array();
$search['componentSearch']['session']=array('display','hide');
$search['componentSearch']['initial']=array();
$button['componentSearch']=array();
$button['componentSearch'][]=array('value'=>'Установить фильтр','name'=>'set_filter','renderer'=>'button','type'=>'submit','action'=>'set_filter','attributes'=>'tabindex=\'0\'');
$button['componentSearch'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel');
$button['componentSearch'][]=array('value'=>'Сбросить фильтр','name'=>'drop_filter','renderer'=>'button','type'=>'submit','action'=>'drop_filter','attributes'=>'tabindex=\'0\'');
$search['componentSearch']['properties']=array('table'=>'fgs_component','title'=>'componentSearch','application'=>false,'method'=>'post','system'=>1,'title'=>'componentSearch','events'=>array('set_filter'=>'search','drop_filter'=>'search'),'chains'=>'0');
$p['componentSearch']=array();
$p['componentSearch']['p244']=array();
$p['componentSearch']['p244']['class']='Predicate';
$p['componentSearch']['p244']['properties']=array('rowid'=>244,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.component_sid','type'=>'varchar','fieldset'=>'','label'=>'Id');
$p['componentSearch']['p244']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_component_sid_244','name'=>'operator_component_sid_244','type'=>'varchar','name'=>'operator_component_sid_244','component'=>'SelectOneMenu','rowid'=>244,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>1);
$p['componentSearch']['p244']['connector']=array('renderer'=>'radio','sid'=>'connector_component_sid_244','name'=>'connector_component_sid_244','type'=>'tinyint','name'=>'connector_component_sid_244','default_value'=>'or','fixed'=>1,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>244,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['componentSearch']['p244']['argument']=array('field'=>'component_sid','label'=>'Id','sid'=>'argument_component_sid_244','name'=>'argument_component_sid_244','trim'=>'notrim','component'=>'InputText','rowid'=>244,'fieldset'=>'','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['componentSearch']['p245']=array();
$p['componentSearch']['p245']['class']='Predicate';
$p['componentSearch']['p245']['properties']=array('rowid'=>245,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.component_name','type'=>'varchar','fieldset'=>'','label'=>'Имя');
$p['componentSearch']['p245']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_component_name_245','name'=>'operator_component_name_245','type'=>'varchar','name'=>'operator_component_name_245','component'=>'SelectOneMenu','rowid'=>245,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['componentSearch']['p245']['connector']=array('renderer'=>'radio','sid'=>'connector_component_name_245','name'=>'connector_component_name_245','type'=>'tinyint','name'=>'connector_component_name_245','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>245,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['componentSearch']['p245']['argument']=array('field'=>'component_name','label'=>'Имя','sid'=>'argument_component_name_245','name'=>'argument_component_name_245','trim'=>'notrim','component'=>'InputText','rowid'=>245,'fieldset'=>'','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['componentSearch']['p246']=array();
$p['componentSearch']['p246']['class']='Predicate';
$p['componentSearch']['p246']['properties']=array('rowid'=>246,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.component_predicate','type'=>'tinyint','fieldset'=>'','label'=>'Пригодно для предикатов ?');
$p['componentSearch']['p246']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_component_predicate_246','name'=>'operator_component_predicate_246','type'=>'varchar','name'=>'operator_component_predicate_246','component'=>'SelectOneMenu','rowid'=>246,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно')),'default_value'=>'equal','fixed'=>0);
$p['componentSearch']['p246']['connector']=array('renderer'=>'radio','sid'=>'connector_component_predicate_246','name'=>'connector_component_predicate_246','type'=>'tinyint','name'=>'connector_component_predicate_246','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>246,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['componentSearch']['p246']['argument']=array('field'=>'component_predicate','label'=>'Пригодно для предикатов ?','sid'=>'argument_component_predicate_246','name'=>'argument_component_predicate_246','component'=>'SelectOneMenu','rowid'=>246,'fieldset'=>'','renderer'=>'OneMenu','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'type'=>'tinyint','cai'=>1);
$p['componentSearch']['p247']=array();
$p['componentSearch']['p247']['class']='Predicate';
$p['componentSearch']['p247']['properties']=array('rowid'=>247,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.component_type','type'=>'varchar','fieldset'=>'','label'=>'Тип');
$p['componentSearch']['p247']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_component_type_247','name'=>'operator_component_type_247','type'=>'varchar','name'=>'operator_component_type_247','component'=>'SelectOneMenu','rowid'=>247,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно')),'default_value'=>'equal','fixed'=>0);
$p['componentSearch']['p247']['connector']=array('renderer'=>'radio','sid'=>'connector_component_type_247','name'=>'connector_component_type_247','type'=>'tinyint','name'=>'connector_component_type_247','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>247,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['componentSearch']['p247']['argument']=array('field'=>'component_type','label'=>'Тип','sid'=>'argument_component_type_247','name'=>'argument_component_type_247','component'=>'SelectOneMenu','rowid'=>247,'fieldset'=>'','renderer'=>'OneMenu','null_option'=>array(''=>'--select type--'),'list_sid'=>'ComponentType','list'=>array('options'=>array('element'=>'элемент','column'=>'колонка','predicate'=>'предикат','other'=>'остальной')),'type'=>'varchar','cai'=>1);
$p['componentSearch']['p11477']=array();
$p['componentSearch']['p11477']['class']='Predicate';
$p['componentSearch']['p11477']['properties']=array('rowid'=>11477,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.component_renderer','type'=>'varchar','fieldset'=>'','label'=>'Визуализатор');
$p['componentSearch']['p11477']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_component_renderer_11477','name'=>'operator_component_renderer_11477','type'=>'varchar','name'=>'operator_component_renderer_11477','component'=>'SelectOneMenu','rowid'=>11477,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['componentSearch']['p11477']['connector']=array('renderer'=>'radio','sid'=>'connector_component_renderer_11477','name'=>'connector_component_renderer_11477','type'=>'tinyint','name'=>'connector_component_renderer_11477','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>11477,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['componentSearch']['p11477']['argument']=array('field'=>'component_renderer','label'=>'Визуализатор','sid'=>'argument_component_renderer_11477','name'=>'argument_component_renderer_11477','trim'=>'notrim','component'=>'InputText','rowid'=>11477,'fieldset'=>'','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');