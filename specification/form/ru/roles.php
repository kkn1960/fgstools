<?php
$form['roles']=array();
$form['roles']['initial']=array();
$form['roles']['initial']=array('mode'=>'insert');
$form['roles']['session']['insert']=array('mode','hide','display');
$form['roles']['session']['copy']=array('mode','hide','display','apk','irow');
$form['roles']['session']['read']=array('mode','hide','display','apk','irow');
$form['roles']['session']['update']=array('mode','hide','display','apk','irow');
$form['roles']['session']['remove']=array('mode','hide','display','apk','irow');
$form['roles']['session']['multi_update']=array('mode','hide','display','apk','irow');
$form['roles']['session']['multi_remove']=array('mode','hide','display','apk','irow');
$form['roles']['session']['multi_read']=array('mode','hide','display','apk','irow');
$button['roles']=array();
$button['roles'][]=array('value'=>'Вставить','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('insert','copy'),'attributes'=>'tabindex=\'0\'');
$button['roles'][]=array('value'=>'Обновить','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','multi_update'),'attributes'=>'tabindex=\'0\'');
$button['roles'][]=array('value'=>'Удалить','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'),'attributes'=>'tabindex=\'0\'');
$button['roles'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'),'attributes'=>'tabindex=\'0\'');
$button['roles'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'tabindex=\'0\'');
$button['roles'][]=array('value'=>'Отменить изменения','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('insert','update','copy','multi_update'),'attributes'=>'tabindex=\'0\'');
$form['roles']['properties']=array('primary_key'=>array('role_id'),'table'=>'fgs_role','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'dependent'=>array('fgs_controller_controller_roles'=>array('fk'=>'controller_roles','type'=>'set','dbcascade'=>0,'table'=>'fgs_controller','pk'=>'role_id'),'fgs_user_user_role'=>array('fk'=>'user_role','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_user','pk'=>'role_id')),'reference'=>array('fgs_controller_controller_roles'=>array('fk'=>'controller_roles','type'=>'set','dbcascade'=>0,'table'=>'fgs_controller','pk'=>'role_id'),'fgs_user_user_role'=>array('fk'=>'user_role','type'=>'varchar','dbcascade'=>0,'table'=>'fgs_user','pk'=>'role_id')),'title'=>'roles','modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['roles']=array();
$e['roles'][0]=array('table'=>'fgs_role','rowid'=>'2376','sid'=>'role_id','fieldset'=>'','name'=>'role_id','label'=>'Id','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'role_id','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'32\' size=\'32\'');
$e['roles'][1]=array('table'=>'fgs_role','rowid'=>'2377','sid'=>'role_name','fieldset'=>'','name'=>'role_name','label'=>'Имя','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'role_name','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'32\'');
$e['roles'][2]=array('table'=>'fgs_role','rowid'=>'2378','sid'=>'role_internal','fieldset'=>'','name'=>'role_internal','label'=>'Внутренная роль ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'1','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'role_internal','cai'=>1);
$e['roles'][3]=array('table'=>'fgs_role','rowid'=>'2379','sid'=>'role_client','fieldset'=>'','name'=>'role_client','label'=>'Клиентская роль ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'role_client','cai'=>1);
$e['roles'][4]=array('table'=>'fgs_role','rowid'=>'2380','sid'=>'role_active','fieldset'=>'','name'=>'role_active','label'=>'Активный ?','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','default_value'=>'1','list_sid'=>'YesNo','list'=>array('options'=>array('0'=>'нет','1'=>'да')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'role_active','cai'=>1);