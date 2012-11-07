<?php
$search['SearchFieldAll']=array();
$search['SearchFieldAll']['session']=array('display','hide');
$search['SearchFieldAll']['initial']=array();
$button['SearchFieldAll']=array();
$button['SearchFieldAll'][]=array('value'=>'Set filter','name'=>'set_filter','renderer'=>'button','type'=>'submit','action'=>'set_filter','attributes'=>'tabindex=\'0\'');
$button['SearchFieldAll'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel');
$button['SearchFieldAll'][]=array('value'=>'Drop filter','name'=>'drop_filter','renderer'=>'button','type'=>'submit','action'=>'drop_filter','attributes'=>'tabindex=\'0\'');
$search['SearchFieldAll']['properties']=array('table'=>'fgs_field','title'=>'SearchField','application'=>false,'method'=>'post','system'=>1,'title'=>'SearchField','events'=>array('set_filter'=>'search','drop_filter'=>'search'),'chains'=>'0');
$p['SearchFieldAll']=array();
$p['SearchFieldAll']['p1560']=array();
$p['SearchFieldAll']['p1560']['class']='Predicate';
$p['SearchFieldAll']['p1560']['properties']=array('rowid'=>1560,'component'=>'SelectOneMenu','get'=>1,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_table','type'=>'varchar','fieldset'=>'table','label'=>'Table');
$p['SearchFieldAll']['p1560']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_table_1560','name'=>'operator_field_table','type'=>'varchar','name'=>'operator_field_table','component'=>'SelectOneMenu','rowid'=>1560,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal')),'default_value'=>'equal','fixed'=>0);
$p['SearchFieldAll']['p1560']['connector']=array('renderer'=>'radio','sid'=>'connector_field_table_1560','name'=>'connector_field_table','type'=>'tinyint','name'=>'connector_field_table','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1560,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p1560']['argument']=array('field'=>'field_table','label'=>'Table','sid'=>'argument_field_table_1560','name'=>'argument_field_table','component'=>'SelectOneMenu','rowid'=>1560,'fieldset'=>'table','renderer'=>'OneMenu','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list_sid'=>'table','list'=>array('sid'=>'table','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','display_field'=>'table_name'),'type'=>'varchar','cai'=>1);
$p['SearchFieldAll']['p1561']=array();
$p['SearchFieldAll']['p1561']['class']='Predicate';
$p['SearchFieldAll']['p1561']['properties']=array('rowid'=>1561,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_table','type'=>'varchar','fieldset'=>'table','label'=>'Table');
$p['SearchFieldAll']['p1561']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_table_1561','name'=>'operator_field_table_1561','type'=>'varchar','name'=>'operator_field_table_1561','component'=>'SelectOneMenu','rowid'=>1561,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFieldAll']['p1561']['connector']=array('renderer'=>'radio','sid'=>'connector_field_table_1561','name'=>'connector_field_table_1561','type'=>'tinyint','name'=>'connector_field_table_1561','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1561,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p1561']['argument']=array('field'=>'field_table','label'=>'Table','sid'=>'argument_field_table_1561','name'=>'argument_field_table_1561','trim'=>'notrim','component'=>'InputText','rowid'=>1561,'fieldset'=>'table','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchFieldAll']['p11032']=array();
$p['SearchFieldAll']['p11032']['class']='Predicate';
$p['SearchFieldAll']['p11032']['properties']=array('rowid'=>11032,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_table','type'=>'varchar','fieldset'=>'table','label'=>'Table');
$p['SearchFieldAll']['p11032']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_table_11032','name'=>'operator_field_table_11032','type'=>'varchar','name'=>'operator_field_table_11032','component'=>'SelectOneMenu','rowid'=>11032,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFieldAll']['p11032']['connector']=array('renderer'=>'radio','sid'=>'connector_field_table_11032','name'=>'connector_field_table_11032','type'=>'tinyint','name'=>'connector_field_table_11032','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>11032,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p11032']['argument']=array('field'=>'field_table','label'=>'Table','sid'=>'argument_field_table_11032','name'=>'argument_field_table_11032','trim'=>'notrim','component'=>'InputText','rowid'=>11032,'fieldset'=>'table','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchFieldAll']['p1562']=array();
$p['SearchFieldAll']['p1562']['class']='Predicate';
$p['SearchFieldAll']['p1562']['properties']=array('rowid'=>1562,'component'=>'InputText','get'=>1,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_name','type'=>'varchar','fieldset'=>'field_name','label'=>'Name');
$p['SearchFieldAll']['p1562']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_name_1562','name'=>'operator_field_name','type'=>'varchar','name'=>'operator_field_name','component'=>'SelectOneMenu','rowid'=>1562,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'equal','fixed'=>0);
$p['SearchFieldAll']['p1562']['connector']=array('renderer'=>'radio','sid'=>'connector_field_name_1562','name'=>'connector_field_name','type'=>'tinyint','name'=>'connector_field_name','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1562,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p1562']['argument']=array('field'=>'field_name','label'=>'Name','sid'=>'argument_field_name_1562','name'=>'argument_field_name','trim'=>'notrim','component'=>'InputText','rowid'=>1562,'fieldset'=>'field_name','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchFieldAll']['p1563']=array();
$p['SearchFieldAll']['p1563']['class']='Predicate';
$p['SearchFieldAll']['p1563']['properties']=array('rowid'=>1563,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_name','type'=>'varchar','fieldset'=>'field_name','label'=>'Name');
$p['SearchFieldAll']['p1563']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_name_1563','name'=>'operator_field_name_1563','type'=>'varchar','name'=>'operator_field_name_1563','component'=>'SelectOneMenu','rowid'=>1563,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFieldAll']['p1563']['connector']=array('renderer'=>'radio','sid'=>'connector_field_name_1563','name'=>'connector_field_name_1563','type'=>'tinyint','name'=>'connector_field_name_1563','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1563,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p1563']['argument']=array('field'=>'field_name','label'=>'Name','sid'=>'argument_field_name_1563','name'=>'argument_field_name_1563','trim'=>'notrim','component'=>'InputText','rowid'=>1563,'fieldset'=>'field_name','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchFieldAll']['p11033']=array();
$p['SearchFieldAll']['p11033']['class']='Predicate';
$p['SearchFieldAll']['p11033']['properties']=array('rowid'=>11033,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_name','type'=>'varchar','fieldset'=>'field_name','label'=>'Name');
$p['SearchFieldAll']['p11033']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_name_11033','name'=>'operator_field_name_11033','type'=>'varchar','name'=>'operator_field_name_11033','component'=>'SelectOneMenu','rowid'=>11033,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFieldAll']['p11033']['connector']=array('renderer'=>'radio','sid'=>'connector_field_name_11033','name'=>'connector_field_name_11033','type'=>'tinyint','name'=>'connector_field_name_11033','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>11033,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p11033']['argument']=array('field'=>'field_name','label'=>'Name','sid'=>'argument_field_name_11033','name'=>'argument_field_name_11033','trim'=>'notrim','component'=>'InputText','rowid'=>11033,'fieldset'=>'field_name','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchFieldAll']['p11044']=array();
$p['SearchFieldAll']['p11044']['class']='Predicate';
$p['SearchFieldAll']['p11044']['properties']=array('rowid'=>11044,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_label','type'=>'varchar','fieldset'=>'label','label'=>'Label');
$p['SearchFieldAll']['p11044']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_label_11044','name'=>'operator_field_label_11044','type'=>'varchar','name'=>'operator_field_label_11044','component'=>'SelectOneMenu','rowid'=>11044,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFieldAll']['p11044']['connector']=array('renderer'=>'radio','sid'=>'connector_field_label_11044','name'=>'connector_field_label_11044','type'=>'tinyint','name'=>'connector_field_label_11044','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>11044,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p11044']['argument']=array('field'=>'field_label','label'=>'Label','sid'=>'argument_field_label_11044','name'=>'argument_field_label_11044','trim'=>'notrim','component'=>'InputText','rowid'=>11044,'fieldset'=>'label','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchFieldAll']['p11046']=array();
$p['SearchFieldAll']['p11046']['class']='Predicate';
$p['SearchFieldAll']['p11046']['properties']=array('rowid'=>11046,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('operator','connector'),'aSave'=>array('operator','connector'),'aPost'=>array('operator','connector'),'aliases'=>array(),'field'=>'t.field_label','type'=>'varchar','fieldset'=>'label','label'=>'Label');
$p['SearchFieldAll']['p11046']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_label_11046','name'=>'operator_field_label_11046','type'=>'varchar','name'=>'operator_field_label_11046','component'=>'SelectOneMenu','rowid'=>11046,'list'=>array('options'=>array('null'=>'null','not_null'=>'not null')),'default_value'=>'null','fixed'=>0,'null_option'=>array(''=>' '),'default_value'=>'');
$p['SearchFieldAll']['p11046']['connector']=array('renderer'=>'radio','sid'=>'connector_field_label_11046','name'=>'connector_field_label_11046','type'=>'tinyint','name'=>'connector_field_label_11046','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>11046,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p11047']=array();
$p['SearchFieldAll']['p11047']['class']='Predicate';
$p['SearchFieldAll']['p11047']['properties']=array('rowid'=>11047,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_list','type'=>'varchar','fieldset'=>'list','label'=>'List');
$p['SearchFieldAll']['p11047']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_list_11047','name'=>'operator_field_list_11047','type'=>'varchar','name'=>'operator_field_list_11047','component'=>'SelectOneMenu','rowid'=>11047,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFieldAll']['p11047']['connector']=array('renderer'=>'radio','sid'=>'connector_field_list_11047','name'=>'connector_field_list_11047','type'=>'tinyint','name'=>'connector_field_list_11047','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>11047,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p11047']['argument']=array('field'=>'field_list','label'=>'List','sid'=>'argument_field_list_11047','name'=>'argument_field_list_11047','trim'=>'notrim','component'=>'InputText','rowid'=>11047,'fieldset'=>'list','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchFieldAll']['p11045']=array();
$p['SearchFieldAll']['p11045']['class']='Predicate';
$p['SearchFieldAll']['p11045']['properties']=array('rowid'=>11045,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('operator','connector'),'aSave'=>array('operator','connector'),'aPost'=>array('operator','connector'),'aliases'=>array(),'field'=>'t.field_list','type'=>'varchar','fieldset'=>'list','label'=>'List');
$p['SearchFieldAll']['p11045']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_list_11045','name'=>'operator_field_list_11045','type'=>'varchar','name'=>'operator_field_list_11045','component'=>'SelectOneMenu','rowid'=>11045,'list'=>array('options'=>array('null'=>'null','not_null'=>'not null')),'default_value'=>'null','fixed'=>0,'null_option'=>array(''=>' '),'default_value'=>'');
$p['SearchFieldAll']['p11045']['connector']=array('renderer'=>'radio','sid'=>'connector_field_list_11045','name'=>'connector_field_list_11045','type'=>'tinyint','name'=>'connector_field_list_11045','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>11045,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p1565']=array();
$p['SearchFieldAll']['p1565']['class']='Predicate';
$p['SearchFieldAll']['p1565']['properties']=array('rowid'=>1565,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_lookup','type'=>'varchar','fieldset'=>'referencing_table','label'=>'Referencing table name');
$p['SearchFieldAll']['p1565']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_lookup_1565','name'=>'operator_field_lookup_1565','type'=>'varchar','name'=>'operator_field_lookup_1565','component'=>'SelectOneMenu','rowid'=>1565,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal')),'default_value'=>'equal','fixed'=>0);
$p['SearchFieldAll']['p1565']['connector']=array('renderer'=>'radio','sid'=>'connector_field_lookup_1565','name'=>'connector_field_lookup_1565','type'=>'tinyint','name'=>'connector_field_lookup_1565','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1565,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p1565']['argument']=array('field'=>'field_lookup','label'=>'Referencing table name','sid'=>'argument_field_lookup_1565','name'=>'argument_field_lookup_1565','component'=>'SelectOneMenu','rowid'=>1565,'fieldset'=>'referencing_table','renderer'=>'OneMenu','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list_sid'=>'table','list'=>array('sid'=>'table','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','display_field'=>'table_name'),'type'=>'varchar','cai'=>1);
$p['SearchFieldAll']['p11034']=array();
$p['SearchFieldAll']['p11034']['class']='Predicate';
$p['SearchFieldAll']['p11034']['properties']=array('rowid'=>11034,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('operator','connector'),'aSave'=>array('operator','connector'),'aPost'=>array('operator','connector'),'aliases'=>array(),'field'=>'t.field_lookup','type'=>'varchar','fieldset'=>'referencing_table','label'=>'Referencing table name');
$p['SearchFieldAll']['p11034']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_lookup_11034','name'=>'operator_field_lookup_11034','type'=>'varchar','name'=>'operator_field_lookup_11034','component'=>'SelectOneMenu','rowid'=>11034,'list'=>array('options'=>array('null'=>'null','not_null'=>'not null')),'default_value'=>'null','fixed'=>0,'null_option'=>array(''=>' '),'default_value'=>'');
$p['SearchFieldAll']['p11034']['connector']=array('renderer'=>'radio','sid'=>'connector_field_lookup_11034','name'=>'connector_field_lookup_11034','type'=>'tinyint','name'=>'connector_field_lookup_11034','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>11034,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p1567']=array();
$p['SearchFieldAll']['p1567']['class']='Predicate';
$p['SearchFieldAll']['p1567']['properties']=array('rowid'=>1567,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_lookup','type'=>'varchar','fieldset'=>'referencing_table','label'=>'Referencing table name');
$p['SearchFieldAll']['p1567']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_lookup_1567','name'=>'operator_field_lookup_1567','type'=>'varchar','name'=>'operator_field_lookup_1567','component'=>'SelectOneMenu','rowid'=>1567,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFieldAll']['p1567']['connector']=array('renderer'=>'radio','sid'=>'connector_field_lookup_1567','name'=>'connector_field_lookup_1567','type'=>'tinyint','name'=>'connector_field_lookup_1567','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1567,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p1567']['argument']=array('field'=>'field_lookup','label'=>'Referencing table name','sid'=>'argument_field_lookup_1567','name'=>'argument_field_lookup_1567','trim'=>'notrim','component'=>'InputText','rowid'=>1567,'fieldset'=>'referencing_table','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchFieldAll']['p1568']=array();
$p['SearchFieldAll']['p1568']['class']='Predicate';
$p['SearchFieldAll']['p1568']['properties']=array('rowid'=>1568,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_relation','type'=>'varchar','fieldset'=>'','label'=>'Foreign key type');
$p['SearchFieldAll']['p1568']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_relation_1568','name'=>'operator_field_relation_1568','type'=>'varchar','name'=>'operator_field_relation_1568','component'=>'SelectOneMenu','rowid'=>1568,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal')),'default_value'=>'equal','fixed'=>0);
$p['SearchFieldAll']['p1568']['connector']=array('renderer'=>'radio','sid'=>'connector_field_relation_1568','name'=>'connector_field_relation_1568','type'=>'tinyint','name'=>'connector_field_relation_1568','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1568,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p1568']['argument']=array('field'=>'field_relation','label'=>'Foreign key type','sid'=>'argument_field_relation_1568','name'=>'argument_field_relation_1568','component'=>'SelectOneMenu','rowid'=>1568,'fieldset'=>'','renderer'=>'OneMenu','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list_sid'=>'ForeignKeyType','list'=>array('options'=>array('master'=>'master table','reference'=>'reference table')),'type'=>'varchar','cai'=>1);
$p['SearchFieldAll']['p1569']=array();
$p['SearchFieldAll']['p1569']['class']='Predicate';
$p['SearchFieldAll']['p1569']['properties']=array('rowid'=>1569,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_element','type'=>'varchar','fieldset'=>'','label'=>'Input component');
$p['SearchFieldAll']['p1569']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_element_1569','name'=>'operator_field_element_1569','type'=>'varchar','name'=>'operator_field_element_1569','component'=>'SelectOneMenu','rowid'=>1569,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFieldAll']['p1569']['connector']=array('renderer'=>'radio','sid'=>'connector_field_element_1569','name'=>'connector_field_element_1569','type'=>'tinyint','name'=>'connector_field_element_1569','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1569,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p1569']['argument']=array('field'=>'field_element','label'=>'Input component','sid'=>'argument_field_element_1569','name'=>'argument_field_element_1569','trim'=>'notrim','component'=>'InputText','rowid'=>1569,'fieldset'=>'','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchFieldAll']['p1566']=array();
$p['SearchFieldAll']['p1566']['class']='Predicate';
$p['SearchFieldAll']['p1566']['properties']=array('rowid'=>1566,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_primary_key','type'=>'varchar','fieldset'=>'','label'=>'Foreign key');
$p['SearchFieldAll']['p1566']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_primary_key_1566','name'=>'operator_field_primary_key_1566','type'=>'varchar','name'=>'operator_field_primary_key_1566','component'=>'SelectOneMenu','rowid'=>1566,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFieldAll']['p1566']['connector']=array('renderer'=>'radio','sid'=>'connector_field_primary_key_1566','name'=>'connector_field_primary_key_1566','type'=>'tinyint','name'=>'connector_field_primary_key_1566','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1566,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p1566']['argument']=array('field'=>'field_primary_key','label'=>'Foreign key','sid'=>'argument_field_primary_key_1566','name'=>'argument_field_primary_key_1566','trim'=>'notrim','component'=>'InputText','rowid'=>1566,'fieldset'=>'','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$p['SearchFieldAll']['p1564']=array();
$p['SearchFieldAll']['p1564']['class']='Predicate';
$p['SearchFieldAll']['p1564']['properties']=array('rowid'=>1564,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_dbtype','type'=>'tinyint','fieldset'=>'','label'=>'Dbtype ?');
$p['SearchFieldAll']['p1564']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_dbtype_1564','name'=>'operator_field_dbtype_1564','type'=>'varchar','name'=>'operator_field_dbtype_1564','component'=>'SelectOneMenu','rowid'=>1564,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal')),'default_value'=>'equal','fixed'=>0);
$p['SearchFieldAll']['p1564']['connector']=array('renderer'=>'radio','sid'=>'connector_field_dbtype_1564','name'=>'connector_field_dbtype_1564','type'=>'tinyint','name'=>'connector_field_dbtype_1564','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1564,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p1564']['argument']=array('field'=>'field_dbtype','label'=>'Dbtype ?','sid'=>'argument_field_dbtype_1564','name'=>'argument_field_dbtype_1564','component'=>'SelectOneMenu','rowid'=>1564,'fieldset'=>'','renderer'=>'OneMenu','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'type'=>'tinyint','cai'=>1);
$p['SearchFieldAll']['p11500']=array();
$p['SearchFieldAll']['p11500']['class']='Predicate';
$p['SearchFieldAll']['p11500']['properties']=array('rowid'=>11500,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.field_dbcascade','type'=>'tinyint','fieldset'=>'','label'=>'Cascade update and delete by DBMS ?');
$p['SearchFieldAll']['p11500']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_field_dbcascade_11500','name'=>'operator_field_dbcascade_11500','type'=>'varchar','name'=>'operator_field_dbcascade_11500','component'=>'SelectOneMenu','rowid'=>11500,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','m'=>'greater','mq'=>'greater or equal','l'=>'less','lq'=>'less or equal')),'default_value'=>'equal','fixed'=>0);
$p['SearchFieldAll']['p11500']['connector']=array('renderer'=>'radio','sid'=>'connector_field_dbcascade_11500','name'=>'connector_field_dbcascade_11500','type'=>'tinyint','name'=>'connector_field_dbcascade_11500','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>11500,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFieldAll']['p11500']['argument']=array('field'=>'field_dbcascade','label'=>'Cascade update and delete by DBMS ?','sid'=>'argument_field_dbcascade_11500','name'=>'argument_field_dbcascade_11500','component'=>'SelectOneMenu','rowid'=>11500,'fieldset'=>'','renderer'=>'OneMenu','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'no','1'=>'yes')),'type'=>'tinyint','cai'=>1);