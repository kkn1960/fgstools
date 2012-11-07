<?php
$form['list']=array();
$form['list']['initial']=array();
$form['list']['initial']=array('mode'=>'insert');
$form['list']['session']['insert']=array('mode','hide','display','amf','foreign_key');
$form['list']['session']['copy']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['list']['session']['read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['list']['session']['update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['list']['session']['remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['list']['session']['multi_update']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['list']['session']['multi_remove']=array('mode','hide','display','apk','irow','amf','foreign_key');
$form['list']['session']['multi_read']=array('mode','hide','display','apk','irow','amf','foreign_key');
$button['list']=array();
$button['list'][]=array('value'=>'Вставить','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('copy','insert'));
$button['list'][]=array('value'=>'Обновить','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'));
$button['list'][]=array('value'=>'Удалить','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'));
$button['list'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'));
$button['list'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('copy','remove','update','multi_remove','multi_update','multi_read','insert','read'));
$button['list'][]=array('value'=>'Отменить изменения','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('copy','update','multi_update','insert'));
$form['list']['properties']=array('primary_key'=>array('list_sid'),'table'=>'fgs_list','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'dependent'=>array('fgs_element_element_list'=>array('fk'=>'element_list','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_element','pk'=>'list_sid'),'fgs_column_column_list'=>array('fk'=>'column_list','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_column','pk'=>'list_sid'),'fgs_field_field_list'=>array('fk'=>'field_list','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_field','pk'=>'list_sid')),'descendant'=>array('fgs_option_option_list'=>array('fk'=>'option_list','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_option','table_pk'=>'option_list,option_sid','pk'=>'list_sid')),'reference'=>array('fgs_option_option_list'=>array('fk'=>'option_list','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_option','pk'=>'list_sid'),'fgs_element_element_list'=>array('fk'=>'element_list','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_element','pk'=>'list_sid'),'fgs_column_column_list'=>array('fk'=>'column_list','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_column','pk'=>'list_sid'),'fgs_field_field_list'=>array('fk'=>'field_list','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_field','pk'=>'list_sid')),'title'=>'list','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['list']=array();
$e['list'][0]=array('table'=>'fgs_list','rowid'=>'6584','sid'=>'list_system','fieldset'=>'','name'=>'list_system','label'=>'System ?','component'=>'SelectOneRadio','chain'=>'0','tier'=>'0','chain_role'=>'member','id'=>'ajax_list_system','register'=>'system','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'id'=>'ajax_list_system','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'list_system','cai'=>1,'events'=>'onchange=loadOptions(0,0,\'list.php\',\'6584\',0,0,0)');
$e['list'][1]=array('table'=>'fgs_list','rowid'=>'6566','sid'=>'list_sid','fieldset'=>'','name'=>'list_sid','label'=>'Sid','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_sid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\' tabindex=\'10\'');
$e['list'][2]=array('table'=>'fgs_list','rowid'=>'6568','sid'=>'list_table','fieldset'=>'','name'=>'list_table','label'=>'Таблица','component'=>'SelectOneMenu','chain'=>'0','tier'=>'1','chain_role'=>'member','id'=>'list_table_id','register'=>'list_table','renderer'=>'OneMenu','required'=>1,'list_sid'=>'ListTable','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'ListTable','table'=>'fgs_table','from'=>'fgs_table','primary_key'=>'table_name','select'=>'table_name id,table_name as name','order'=>'table_name ASC','display_field'=>'table_name','predicates'=>array(array('field'=>'table_name','type'=>'varchar','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"fgs_option",'operator'=>'equal','connector'=>'and'),array('field'=>'table_system','type'=>'tinyint','table'=>'fgs_table','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'or'))),'id'=>'list_table_id','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'list_table','cai'=>1,'attributes'=>'tabindex=\'30\'');
$e['list'][3]=array('table'=>'fgs_list','rowid'=>'6569','sid'=>'list_table_alias','fieldset'=>'','name'=>'list_table_alias','label'=>'Алиас таблицы','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_table_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['list'][4]=array('table'=>'fgs_list','rowid'=>'6570','sid'=>'list_primary_key','fieldset'=>'','name'=>'list_primary_key','label'=>'Поле - ключ','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_primary_key','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\' tabindex=\'40\'');
$e['list'][5]=array('table'=>'fgs_list','rowid'=>'6571','sid'=>'list_numeric','fieldset'=>'','name'=>'list_numeric','label'=>'Ключ- числовой ? (только для таблицы fgs_option)','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'list_numeric','cai'=>1);
$e['list'][6]=array('table'=>'fgs_list','rowid'=>'6572','sid'=>'list_display_field','fieldset'=>'','name'=>'list_display_field','label'=>'Видимое поле','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_display_field','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'60\'');
$e['list'][7]=array('table'=>'fgs_list','rowid'=>'6573','sid'=>'list_field_alias','fieldset'=>'','name'=>'list_field_alias','label'=>'Алиас поля','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_field_alias','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['list'][8]=array('table'=>'fgs_list','rowid'=>'6574','sid'=>'list_delimiters','fieldset'=>'','name'=>'list_delimiters','label'=>'Разделители','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_delimiters','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['list'][9]=array('table'=>'fgs_list','rowid'=>'6576','sid'=>'list_null_option','fieldset'=>'','name'=>'list_null_option','label'=>'Нулевая опция списка','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_null_option','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['list'][10]=array('table'=>'fgs_list','rowid'=>'6577','sid'=>'list_group','fieldset'=>'','name'=>'list_group','label'=>'Предложение group by в SQL запросе','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_group','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'100\' tabindex=\'120\'');
$e['list'][11]=array('table'=>'fgs_list','rowid'=>'6578','sid'=>'list_select','fieldset'=>'','name'=>'list_select','label'=>'Предложение select в SQL запросе','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_select','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'100\' tabindex=\'70\'');
$e['list'][12]=array('table'=>'fgs_list','rowid'=>'6579','sid'=>'list_having','fieldset'=>'','name'=>'list_having','label'=>'Предложение having в SQL запросе','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_having','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'100\' tabindex=\'110\'');
$e['list'][13]=array('table'=>'fgs_list','rowid'=>'6580','sid'=>'list_from','fieldset'=>'','name'=>'list_from','label'=>'Предложение from в SQL запросе','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_from','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'100\' tabindex=\'80\'');
$e['list'][14]=array('table'=>'fgs_list','rowid'=>'6581','sid'=>'list_order','fieldset'=>'','name'=>'list_order','label'=>'Предложение order by в SQL запросе','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_order','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'100\' tabindex=\'130\'');
$e['list'][15]=array('table'=>'fgs_list','rowid'=>'6583','sid'=>'list_query','fieldset'=>'','name'=>'list_query','label'=>'SQL запрос на выборку записей','rows'=>'4','component'=>'InputTextarea','renderer'=>'textarea','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'text','field'=>'list_query','cai'=>1,'attributes'=>'cols=\'80\' rows=\'4\' tabindex=\'140\'');
$e['list'][16]=array('table'=>'fgs_list','rowid'=>'6582','sid'=>'list_where','fieldset'=>'','name'=>'list_where','label'=>'Предложение where в SQL запросе','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_where','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'255\' size=\'100\' tabindex=\'90\'');
$e['list'][17]=array('table'=>'fgs_list','rowid'=>'6585','sid'=>'list_export','fieldset'=>'','name'=>'list_export','label'=>'Экспорт ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'list_export','cai'=>1);
$e['list'][18]=array('table'=>'fgs_list','rowid'=>'10450','sid'=>'list_large','fieldset'=>'','name'=>'list_large','label'=>'Partial_load ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'list_large','cai'=>1);
$e['list'][19]=array('table'=>'fgs_list','rowid'=>'11479','sid'=>'list_constant','fieldset'=>'','name'=>'list_constant','label'=>'Use_as_constant_list  ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'list_constant','cai'=>1);
$e['list'][20]=array('table'=>'fgs_list','rowid'=>'10453','sid'=>'list_class','fieldset'=>'','name'=>'list_class','label'=>'Класс загрузчика','component'=>'InputText','type'=>'varchar','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'list_class','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['list'][21]=array('table'=>'fgs_list','rowid'=>'10864','sid'=>'list_dataset','fieldset'=>'','name'=>'list_dataset','label'=>'Набор данных','component'=>'SelectOneMenu','chain'=>'0','tier'=>'1','chain_role'=>'member','id'=>'ajax_list_dataset','register'=>'dataset','renderer'=>'OneMenu','list_sid'=>'UnitDataset','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'UnitDataset','table'=>'fgs_dataset','from'=>'fgs_dataset','primary_key'=>'dataset_sid','select'=>'dataset_sid id,dataset_sid as name','order'=>'dataset_sid ASC','display_field'=>'dataset_sid','predicates'=>array(array('field'=>'dataset_system','type'=>'tinyint','table'=>'fgs_dataset','fieldset'=>'t','required'=>'1','argument'=>"&rgv system",'operator'=>'equal','connector'=>'and'))),'id'=>'ajax_list_dataset','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'list_dataset','cai'=>1);