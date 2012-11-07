<?php
$search['SearchFormSearch']=array();
$search['SearchFormSearch']['session']=array('display','hide');
$search['SearchFormSearch']['initial']=array();
$button['SearchFormSearch']=array();
$button['SearchFormSearch'][]=array('value'=>'Set filter','name'=>'set_filter','renderer'=>'button','type'=>'submit','action'=>'set_filter','attributes'=>'tabindex=\'0\'');
$button['SearchFormSearch'][]=array('value'=>'Cancel','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel');
$button['SearchFormSearch'][]=array('value'=>'Drop filter','name'=>'drop_filter','renderer'=>'button','type'=>'submit','action'=>'drop_filter','attributes'=>'tabindex=\'0\'');
$search['SearchFormSearch']['properties']=array('table'=>'fgs_form','title'=>'SearchFormSearch','application'=>false,'method'=>'post','system'=>1,'title'=>'SearchFormSearch','events'=>array('set_filter'=>'search','drop_filter'=>'search'),'chains'=>'0');
$p['SearchFormSearch']=array();
$p['SearchFormSearch']['p1578']=array();
$p['SearchFormSearch']['p1578']['class']='Predicate';
$p['SearchFormSearch']['p1578']['properties']=array('rowid'=>1578,'component'=>'InputText','get'=>1,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.form_sid','type'=>'varchar','fieldset'=>'sid','label'=>'Sid');
$p['SearchFormSearch']['p1578']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_form_sid_1578','name'=>'operator_form_sid','type'=>'varchar','name'=>'operator_form_sid','component'=>'SelectOneMenu','rowid'=>1578,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFormSearch']['p1578']['connector']=array('renderer'=>'radio','sid'=>'connector_form_sid_1578','name'=>'connector_form_sid','type'=>'tinyint','name'=>'connector_form_sid','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1578,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFormSearch']['p1578']['argument']=array('field'=>'form_sid','label'=>'Sid','sid'=>'argument_form_sid_1578','name'=>'argument_form_sid','trim'=>'notrim','component'=>'InputText','rowid'=>1578,'fieldset'=>'sid','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$p['SearchFormSearch']['p10954']=array();
$p['SearchFormSearch']['p10954']['class']='Predicate';
$p['SearchFormSearch']['p10954']['properties']=array('rowid'=>10954,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.form_sid','type'=>'varchar','fieldset'=>'sid','label'=>'Sid');
$p['SearchFormSearch']['p10954']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_form_sid_10954','name'=>'operator_form_sid_10954','type'=>'varchar','name'=>'operator_form_sid_10954','component'=>'SelectOneMenu','rowid'=>10954,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFormSearch']['p10954']['connector']=array('renderer'=>'radio','sid'=>'connector_form_sid_10954','name'=>'connector_form_sid_10954','type'=>'tinyint','name'=>'connector_form_sid_10954','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10954,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFormSearch']['p10954']['argument']=array('field'=>'form_sid','label'=>'Sid','sid'=>'argument_form_sid_10954','name'=>'argument_form_sid_10954','trim'=>'notrim','component'=>'InputText','rowid'=>10954,'fieldset'=>'sid','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$p['SearchFormSearch']['p10955']=array();
$p['SearchFormSearch']['p10955']['class']='Predicate';
$p['SearchFormSearch']['p10955']['properties']=array('rowid'=>10955,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.form_sid','type'=>'varchar','fieldset'=>'sid','label'=>'Sid');
$p['SearchFormSearch']['p10955']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_form_sid_10955','name'=>'operator_form_sid_10955','type'=>'varchar','name'=>'operator_form_sid_10955','component'=>'SelectOneMenu','rowid'=>10955,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFormSearch']['p10955']['connector']=array('renderer'=>'radio','sid'=>'connector_form_sid_10955','name'=>'connector_form_sid_10955','type'=>'tinyint','name'=>'connector_form_sid_10955','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10955,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFormSearch']['p10955']['argument']=array('field'=>'form_sid','label'=>'Sid','sid'=>'argument_form_sid_10955','name'=>'argument_form_sid_10955','trim'=>'notrim','component'=>'InputText','rowid'=>10955,'fieldset'=>'sid','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$p['SearchFormSearch']['p1580']=array();
$p['SearchFormSearch']['p1580']['class']='Predicate';
$p['SearchFormSearch']['p1580']['properties']=array('rowid'=>1580,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.form_table','type'=>'varchar','fieldset'=>'table','label'=>'Table');
$p['SearchFormSearch']['p1580']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_form_table_1580','name'=>'operator_form_table_1580','type'=>'varchar','name'=>'operator_form_table_1580','component'=>'SelectOneMenu','rowid'=>1580,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFormSearch']['p1580']['connector']=array('renderer'=>'radio','sid'=>'connector_form_table_1580','name'=>'connector_form_table_1580','type'=>'tinyint','name'=>'connector_form_table_1580','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1580,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFormSearch']['p1580']['argument']=array('field'=>'form_table','label'=>'Table','sid'=>'argument_form_table_1580','name'=>'argument_form_table_1580','trim'=>'notrim','component'=>'InputText','rowid'=>1580,'fieldset'=>'table','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'32\'');
$p['SearchFormSearch']['p10956']=array();
$p['SearchFormSearch']['p10956']['class']='Predicate';
$p['SearchFormSearch']['p10956']['properties']=array('rowid'=>10956,'component'=>'InputText','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.form_table','type'=>'varchar','fieldset'=>'table','label'=>'Table');
$p['SearchFormSearch']['p10956']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_form_table_10956','name'=>'operator_form_table_10956','type'=>'varchar','name'=>'operator_form_table_10956','component'=>'SelectOneMenu','rowid'=>10956,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal','like'=>'like','leftlike'=>'start with','rightlike'=>'end with','not_like'=>'not like','not_leftlike'=>'does\'t start with','not_rightlike'=>'does\'t end with','regexp'=>'regexp')),'default_value'=>'like','fixed'=>0);
$p['SearchFormSearch']['p10956']['connector']=array('renderer'=>'radio','sid'=>'connector_form_table_10956','name'=>'connector_form_table_10956','type'=>'tinyint','name'=>'connector_form_table_10956','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>10956,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFormSearch']['p10956']['argument']=array('field'=>'form_table','label'=>'Table','sid'=>'argument_form_table_10956','name'=>'argument_form_table_10956','trim'=>'notrim','component'=>'InputText','rowid'=>10956,'fieldset'=>'table','type'=>'varchar','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'32\'');
$p['SearchFormSearch']['p1581']=array();
$p['SearchFormSearch']['p1581']['class']='Predicate';
$p['SearchFormSearch']['p1581']['properties']=array('rowid'=>1581,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.form_table','type'=>'varchar','fieldset'=>'table','label'=>'Table');
$p['SearchFormSearch']['p1581']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_form_table_1581','name'=>'operator_form_table_1581','type'=>'varchar','name'=>'operator_form_table_1581','component'=>'SelectOneMenu','rowid'=>1581,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal')),'default_value'=>'equal','fixed'=>0);
$p['SearchFormSearch']['p1581']['connector']=array('renderer'=>'radio','sid'=>'connector_form_table_1581','name'=>'connector_form_table_1581','type'=>'tinyint','name'=>'connector_form_table_1581','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1581,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFormSearch']['p1581']['argument']=array('field'=>'form_table','label'=>'Table','sid'=>'argument_form_table_1581','name'=>'argument_form_table_1581','component'=>'SelectOneMenu','rowid'=>1581,'fieldset'=>'table','renderer'=>'OneMenu','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list_sid'=>'table','list'=>array('sid'=>'table','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','display_field'=>'table_name'),'type'=>'varchar','cai'=>1);
$p['SearchFormSearch']['p1582']=array();
$p['SearchFormSearch']['p1582']['class']='Predicate';
$p['SearchFormSearch']['p1582']['properties']=array('rowid'=>1582,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.form_type','type'=>'varchar','fieldset'=>'SearchType','label'=>'Type');
$p['SearchFormSearch']['p1582']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_form_type_1582','name'=>'operator_form_type_1582','type'=>'varchar','name'=>'operator_form_type_1582','component'=>'SelectOneMenu','rowid'=>1582,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal')),'default_value'=>'equal','fixed'=>0);
$p['SearchFormSearch']['p1582']['connector']=array('renderer'=>'radio','sid'=>'connector_form_type_1582','name'=>'connector_form_type_1582','type'=>'tinyint','name'=>'connector_form_type_1582','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1582,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFormSearch']['p1582']['argument']=array('field'=>'form_type','label'=>'Type','sid'=>'argument_form_type_1582','name'=>'argument_form_type_1582','component'=>'SelectOneMenu','rowid'=>1582,'fieldset'=>'SearchType','renderer'=>'OneMenu','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list_sid'=>'SearchType','list'=>array('options'=>array('search_application'=>'application search','search_system'=>'system search','search_template'=>'search template')),'type'=>'varchar','cai'=>1);
$p['SearchFormSearch']['p1583']=array();
$p['SearchFormSearch']['p1583']['class']='Predicate';
$p['SearchFormSearch']['p1583']['properties']=array('rowid'=>1583,'component'=>'SelectOneMenu','get'=>0,'coa'=>array('argument','operator','connector'),'aSave'=>array('argument','operator','connector'),'aPost'=>array('argument','operator','connector'),'aliases'=>array(),'field'=>'t.form_type','type'=>'varchar','fieldset'=>'SearchType','label'=>'Type');
$p['SearchFormSearch']['p1583']['operator']=array('renderer'=>'OneMenu','sid'=>'operator_form_type_1583','name'=>'operator_form_type_1583','type'=>'varchar','name'=>'operator_form_type_1583','component'=>'SelectOneMenu','rowid'=>1583,'list'=>array('options'=>array('equal'=>'equal','not_equal'=>'not equal')),'default_value'=>'equal','fixed'=>0);
$p['SearchFormSearch']['p1583']['connector']=array('renderer'=>'radio','sid'=>'connector_form_type_1583','name'=>'connector_form_type_1583','type'=>'tinyint','name'=>'connector_form_type_1583','default_value'=>'and','fixed'=>0,'layout'=>1,'component'=>'SelectOneRadio','rowid'=>1583,'list'=>array('options'=>array('and'=>'AND','or'=>'OR')));
$p['SearchFormSearch']['p1583']['argument']=array('field'=>'form_type','label'=>'Type','sid'=>'argument_form_type_1583','name'=>'argument_form_type_1583','component'=>'SelectOneMenu','rowid'=>1583,'fieldset'=>'SearchType','renderer'=>'OneMenu','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list_sid'=>'SearchType','list'=>array('options'=>array('search_application'=>'application search','search_system'=>'system search','search_template'=>'search template')),'type'=>'varchar','cai'=>1);