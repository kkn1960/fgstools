<?php
$search['SearchOption']=array();
$search['SearchOption']['session']=array('display','hide');
$search['SearchOption']['initial']=array();
$button['SearchOption']=array();
$button['SearchOption'][]=array('value'=>'Установить фильтр','name'=>'set_filter','renderer'=>'button','type'=>'submit','action'=>'set_filter','attributes'=>'tabindex=\'0\'');
$button['SearchOption'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel');
$button['SearchOption'][]=array('value'=>'Сбросить фильтр','name'=>'drop_filter','renderer'=>'button','type'=>'submit','action'=>'drop_filter','attributes'=>'tabindex=\'0\'');
$search['SearchOption']['properties']=array('table'=>'fgs_option','title'=>'SearchOption','application'=>false,'method'=>'post','system'=>1,'title'=>'SearchOption','events'=>array('set_filter'=>'search','drop_filter'=>'search'),'chains'=>'0');
$p['SearchOption']=array();
$p['SearchOption']['p10444']=array();
$p['SearchOption']['p10444']['class']='Predicate';
$p['SearchOption']['p10444']['properties']=array('rowid'=>10444,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_list','type'=>'varchar','fieldset'=>'list','label'=>'Список');
$p['SearchOption']['p10444']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_list_10444','name'=>'operator_option_list_10444','type'=>'varchar','name'=>'operator_option_list_10444','component'=>'SelectOneMenu','rowid'=>10444,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchOption']['p10444']['connector']=array('renderer'=>'radio','sid'=>'connector_option_list_10444','name'=>'connector_option_list_10444','type'=>'tinyint','name'=>'connector_option_list_10444','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10444,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10444']['argument']=array('field'=>'option_list','label'=>'Список','sid'=>'argument_option_list_10444','name'=>'argument_option_list_10444','trim'=>'notrim','component'=>'InputText','rowid'=>10444,'fieldset'=>'list','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchOption']['p10885']=array();
$p['SearchOption']['p10885']['class']='Predicate';
$p['SearchOption']['p10885']['properties']=array('rowid'=>10885,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_list','type'=>'varchar','fieldset'=>'list','label'=>'Список');
$p['SearchOption']['p10885']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_list_10885','name'=>'operator_option_list_10885','type'=>'varchar','name'=>'operator_option_list_10885','component'=>'SelectOneMenu','rowid'=>10885,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchOption']['p10885']['connector']=array('renderer'=>'radio','sid'=>'connector_option_list_10885','name'=>'connector_option_list_10885','type'=>'tinyint','name'=>'connector_option_list_10885','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10885,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10885']['argument']=array('field'=>'option_list','label'=>'Список','sid'=>'argument_option_list_10885','name'=>'argument_option_list_10885','trim'=>'notrim','component'=>'InputText','rowid'=>10885,'fieldset'=>'list','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchOption']['p10886']=array();
$p['SearchOption']['p10886']['class']='Predicate';
$p['SearchOption']['p10886']['properties']=array('rowid'=>10886,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_list','type'=>'varchar','fieldset'=>'list','label'=>'Список');
$p['SearchOption']['p10886']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_list_10886','name'=>'operator_option_list_10886','type'=>'varchar','name'=>'operator_option_list_10886','component'=>'SelectOneMenu','rowid'=>10886,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchOption']['p10886']['connector']=array('renderer'=>'radio','sid'=>'connector_option_list_10886','name'=>'connector_option_list_10886','type'=>'tinyint','name'=>'connector_option_list_10886','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10886,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10886']['argument']=array('field'=>'option_list','label'=>'Список','sid'=>'argument_option_list_10886','name'=>'argument_option_list_10886','trim'=>'notrim','component'=>'InputText','rowid'=>10886,'fieldset'=>'list','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchOption']['p10445']=array();
$p['SearchOption']['p10445']['class']='Predicate';
$p['SearchOption']['p10445']['properties']=array('rowid'=>10445,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_sid','type'=>'varchar','fieldset'=>'sid','label'=>'Sid');
$p['SearchOption']['p10445']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_sid_10445','name'=>'operator_option_sid_10445','type'=>'varchar','name'=>'operator_option_sid_10445','component'=>'SelectOneMenu','rowid'=>10445,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchOption']['p10445']['connector']=array('renderer'=>'radio','sid'=>'connector_option_sid_10445','name'=>'connector_option_sid_10445','type'=>'tinyint','name'=>'connector_option_sid_10445','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10445,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10445']['argument']=array('field'=>'option_sid','label'=>'Sid','sid'=>'argument_option_sid_10445','name'=>'argument_option_sid_10445','trim'=>'notrim','component'=>'InputText','rowid'=>10445,'fieldset'=>'sid','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchOption']['p10992']=array();
$p['SearchOption']['p10992']['class']='Predicate';
$p['SearchOption']['p10992']['properties']=array('rowid'=>10992,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_sid','type'=>'varchar','fieldset'=>'sid','label'=>'Sid');
$p['SearchOption']['p10992']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_sid_10992','name'=>'operator_option_sid_10992','type'=>'varchar','name'=>'operator_option_sid_10992','component'=>'SelectOneMenu','rowid'=>10992,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchOption']['p10992']['connector']=array('renderer'=>'radio','sid'=>'connector_option_sid_10992','name'=>'connector_option_sid_10992','type'=>'tinyint','name'=>'connector_option_sid_10992','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10992,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10992']['argument']=array('field'=>'option_sid','label'=>'Sid','sid'=>'argument_option_sid_10992','name'=>'argument_option_sid_10992','trim'=>'notrim','component'=>'InputText','rowid'=>10992,'fieldset'=>'sid','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchOption']['p10993']=array();
$p['SearchOption']['p10993']['class']='Predicate';
$p['SearchOption']['p10993']['properties']=array('rowid'=>10993,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_sid','type'=>'varchar','fieldset'=>'sid','label'=>'Sid');
$p['SearchOption']['p10993']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_sid_10993','name'=>'operator_option_sid_10993','type'=>'varchar','name'=>'operator_option_sid_10993','component'=>'SelectOneMenu','rowid'=>10993,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchOption']['p10993']['connector']=array('renderer'=>'radio','sid'=>'connector_option_sid_10993','name'=>'connector_option_sid_10993','type'=>'tinyint','name'=>'connector_option_sid_10993','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10993,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10993']['argument']=array('field'=>'option_sid','label'=>'Sid','sid'=>'argument_option_sid_10993','name'=>'argument_option_sid_10993','trim'=>'notrim','component'=>'InputText','rowid'=>10993,'fieldset'=>'sid','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchOption']['p10446']=array();
$p['SearchOption']['p10446']['class']='Predicate';
$p['SearchOption']['p10446']['properties']=array('rowid'=>10446,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_en','type'=>'varchar','fieldset'=>'option_en','label'=>'Опция на английском');
$p['SearchOption']['p10446']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_en_10446','name'=>'operator_option_en_10446','type'=>'varchar','name'=>'operator_option_en_10446','component'=>'SelectOneMenu','rowid'=>10446,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchOption']['p10446']['connector']=array('renderer'=>'radio','sid'=>'connector_option_en_10446','name'=>'connector_option_en_10446','type'=>'tinyint','name'=>'connector_option_en_10446','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10446,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10446']['argument']=array('field'=>'option_en','label'=>'Опция на английском','sid'=>'argument_option_en_10446','name'=>'argument_option_en_10446','trim'=>'notrim','component'=>'InputText','rowid'=>10446,'fieldset'=>'option_en','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$p['SearchOption']['p10994']=array();
$p['SearchOption']['p10994']['class']='Predicate';
$p['SearchOption']['p10994']['properties']=array('rowid'=>10994,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_en','type'=>'varchar','fieldset'=>'option_en','label'=>'Опция на английском');
$p['SearchOption']['p10994']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_en_10994','name'=>'operator_option_en_10994','type'=>'varchar','name'=>'operator_option_en_10994','component'=>'SelectOneMenu','rowid'=>10994,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchOption']['p10994']['connector']=array('renderer'=>'radio','sid'=>'connector_option_en_10994','name'=>'connector_option_en_10994','type'=>'tinyint','name'=>'connector_option_en_10994','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10994,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10994']['argument']=array('field'=>'option_en','label'=>'Опция на английском','sid'=>'argument_option_en_10994','name'=>'argument_option_en_10994','trim'=>'notrim','component'=>'InputText','rowid'=>10994,'fieldset'=>'option_en','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$p['SearchOption']['p10995']=array();
$p['SearchOption']['p10995']['class']='Predicate';
$p['SearchOption']['p10995']['properties']=array('rowid'=>10995,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_en','type'=>'varchar','fieldset'=>'option_en','label'=>'Опция на английском');
$p['SearchOption']['p10995']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_en_10995','name'=>'operator_option_en_10995','type'=>'varchar','name'=>'operator_option_en_10995','component'=>'SelectOneMenu','rowid'=>10995,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchOption']['p10995']['connector']=array('renderer'=>'radio','sid'=>'connector_option_en_10995','name'=>'connector_option_en_10995','type'=>'tinyint','name'=>'connector_option_en_10995','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10995,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10995']['argument']=array('field'=>'option_en','label'=>'Опция на английском','sid'=>'argument_option_en_10995','name'=>'argument_option_en_10995','trim'=>'notrim','component'=>'InputText','rowid'=>10995,'fieldset'=>'option_en','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$p['SearchOption']['p10447']=array();
$p['SearchOption']['p10447']['class']='Predicate';
$p['SearchOption']['p10447']['properties']=array('rowid'=>10447,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_ru','type'=>'varchar','fieldset'=>'option_ru','label'=>'Опция на русском');
$p['SearchOption']['p10447']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_ru_10447','name'=>'operator_option_ru_10447','type'=>'varchar','name'=>'operator_option_ru_10447','component'=>'SelectOneMenu','rowid'=>10447,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchOption']['p10447']['connector']=array('renderer'=>'radio','sid'=>'connector_option_ru_10447','name'=>'connector_option_ru_10447','type'=>'tinyint','name'=>'connector_option_ru_10447','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10447,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10447']['argument']=array('field'=>'option_ru','label'=>'Опция на русском','sid'=>'argument_option_ru_10447','name'=>'argument_option_ru_10447','trim'=>'notrim','component'=>'InputText','rowid'=>10447,'fieldset'=>'option_ru','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$p['SearchOption']['p10996']=array();
$p['SearchOption']['p10996']['class']='Predicate';
$p['SearchOption']['p10996']['properties']=array('rowid'=>10996,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_ru','type'=>'varchar','fieldset'=>'option_ru','label'=>'Опция на русском');
$p['SearchOption']['p10996']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_ru_10996','name'=>'operator_option_ru_10996','type'=>'varchar','name'=>'operator_option_ru_10996','component'=>'SelectOneMenu','rowid'=>10996,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchOption']['p10996']['connector']=array('renderer'=>'radio','sid'=>'connector_option_ru_10996','name'=>'connector_option_ru_10996','type'=>'tinyint','name'=>'connector_option_ru_10996','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10996,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10996']['argument']=array('field'=>'option_ru','label'=>'Опция на русском','sid'=>'argument_option_ru_10996','name'=>'argument_option_ru_10996','trim'=>'notrim','component'=>'InputText','rowid'=>10996,'fieldset'=>'option_ru','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$p['SearchOption']['p10997']=array();
$p['SearchOption']['p10997']['class']='Predicate';
$p['SearchOption']['p10997']['properties']=array('rowid'=>10997,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_ru','type'=>'varchar','fieldset'=>'option_ru','label'=>'Опция на русском');
$p['SearchOption']['p10997']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_ru_10997','name'=>'operator_option_ru_10997','type'=>'varchar','name'=>'operator_option_ru_10997','component'=>'SelectOneMenu','rowid'=>10997,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно','like'=>'содержит(like)','leftlike'=>'начинается с','rightlike'=>'заканчивается на','not_like'=>'не содержит(not like)','not_leftlike'=>'не начинается с','not_rightlike'=>'не заканчивается на','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchOption']['p10997']['connector']=array('renderer'=>'radio','sid'=>'connector_option_ru_10997','name'=>'connector_option_ru_10997','type'=>'tinyint','name'=>'connector_option_ru_10997','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10997,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10997']['argument']=array('field'=>'option_ru','label'=>'Опция на русском','sid'=>'argument_option_ru_10997','name'=>'argument_option_ru_10997','trim'=>'notrim','component'=>'InputText','rowid'=>10997,'fieldset'=>'option_ru','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$p['SearchOption']['p10448']=array();
$p['SearchOption']['p10448']['class']='Predicate';
$p['SearchOption']['p10448']['properties']=array('rowid'=>10448,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.option_system','type'=>'tinyint','fieldset'=>'','label'=>'System ?');
$p['SearchOption']['p10448']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_option_system_10448','name'=>'operator_option_system_10448','type'=>'varchar','name'=>'operator_option_system_10448','component'=>'SelectOneMenu','rowid'=>10448,'list'=>array('options'=>array('equal'=>'равно','not_equal'=>'не равно')),'default_value'=>'equal','fixed'=>0);
$p['SearchOption']['p10448']['connector']=array('renderer'=>'radio','sid'=>'connector_option_system_10448','name'=>'connector_option_system_10448','type'=>'tinyint','name'=>'connector_option_system_10448','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10448,'list'=>array('options'=>array('and'=>'И','or'=>'ИЛИ')));
$p['SearchOption']['p10448']['argument']=array('field'=>'option_system','label'=>'System ?','sid'=>'argument_option_system_10448','name'=>'argument_option_system_10448','component'=>'SelectOneMenu','rowid'=>10448,'fieldset'=>'','renderer'=>'OneMenu','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'type'=>'tinyint','cai'=>1);