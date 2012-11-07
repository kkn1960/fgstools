<?php
$form['userAdmin']=array();
$form['userAdmin']['initial']=array();
$form['userAdmin']['initial']=array('mode'=>'insert');
$form['userAdmin']['session']['insert']=array('mode','hide','display');
$form['userAdmin']['session']['copy']=array('mode','hide','display','apk','irow');
$form['userAdmin']['session']['read']=array('mode','hide','display','apk','irow');
$form['userAdmin']['session']['update']=array('mode','hide','display','apk','irow');
$form['userAdmin']['session']['update_partial']=array('mode','hide','display','apk','irow');
$form['userAdmin']['session']['remove']=array('mode','hide','display','apk','irow');
$form['userAdmin']['session']['multi_update']=array('mode','hide','display','apk','irow');
$form['userAdmin']['session']['multi_remove']=array('mode','hide','display','apk','irow');
$form['userAdmin']['session']['multi_read']=array('mode','hide','display','apk','irow');
$button['userAdmin']=array();
$button['userAdmin'][]=array('value'=>'Вставить','name'=>'insert','renderer'=>'button','type'=>'submit','action'=>'insert','modes'=>array('insert','copy'),'attributes'=>'tabindex=\'0\'');
$button['userAdmin'][]=array('value'=>'Обновить','name'=>'update','renderer'=>'button','type'=>'submit','action'=>'update','modes'=>array('update','update_partial','multi_update'),'attributes'=>'tabindex=\'0\'');
$button['userAdmin'][]=array('value'=>'Удалить','name'=>'remove','renderer'=>'button','type'=>'submit','action'=>'remove','modes'=>array('remove','multi_remove'),'attributes'=>'tabindex=\'0\'');
$button['userAdmin'][]=array('value'=>'Read','name'=>'read','renderer'=>'button','type'=>'submit','action'=>'read','modes'=>array('multi_read'),'attributes'=>'tabindex=\'0\'');
$button['userAdmin'][]=array('value'=>'Отменить','name'=>'cancel','renderer'=>'button','type'=>'submit','action'=>'cancel','modes'=>array('insert','update','update_partial','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'tabindex=\'0\'');
$button['userAdmin'][]=array('value'=>'Отменить изменения','name'=>'reset','renderer'=>'button','type'=>'reset','action'=>'reset','modes'=>array('insert','update','copy','multi_update'),'attributes'=>'tabindex=\'0\'');
$form['userAdmin']['properties']=array('primary_key'=>array('user_rowid'),'table'=>'fgs_user','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('insert','update','update_partial','copy','remove','read','multi_update','multi_remove','multi_read'),'system'=>1,'title'=>'userAdmin','modes'=>array('insert','update','update_partial','copy','remove','read','multi_update','multi_remove','multi_read'),'attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('insert'=>'done','update'=>'done','remove'=>'done'),'joins'=>array());
$e['userAdmin']=array();
$e['userAdmin'][0]=array('table'=>'fgs_user','rowid'=>'8805','sid'=>'user_login','fieldset'=>'','name'=>'user_login','label'=>'Логин','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','update_partial','copy'),'field'=>'user_login','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'30\'');
$e['userAdmin'][1]=array('table'=>'','rowid'=>'11244','sid'=>'old_password','fieldset'=>'','name'=>'old_password','label'=>'Старый пароль','component'=>'InputSecret','renderer'=>'secret','field'=>'old_password','required'=>1,'modes'=>array('update_partial'),'type'=>'varchar','attributes'=>'maxlength=\'30\' size=\'30\'','validators'=>array(array('error'=>'wrong_value','break_onfailure'=>0,'statement'=>array(array('function'=>'md5','operand1'=>'&arg old_password','operand2'=>'&usr user_password','connector'=>'and','operator'=>'equal','failure'=>'0','group'=>'')))));
$e['userAdmin'][2]=array('table'=>'fgs_user','rowid'=>'8806','sid'=>'user_password','fieldset'=>'','name'=>'user_password','label'=>'Пароль','component'=>'InputSecret','renderer'=>'secret','field'=>'user_password','converter'=>'md5','required'=>1,'modes'=>array('insert','update_partial','copy'),'type'=>'varchar','attributes'=>'maxlength=\'30\' size=\'30\'');
$e['userAdmin'][3]=array('table'=>'','rowid'=>'8807','sid'=>'confirm_password','fieldset'=>'','name'=>'confirm_password','label'=>'Подтвердить пароль','component'=>'InputSecret','renderer'=>'secret','field'=>'confirm_password','required'=>1,'modes'=>array('insert','update_partial','copy'),'type'=>'varchar','attributes'=>'maxlength=\'30\' size=\'30\'','validators'=>array(array('error'=>'wrong_value','break_onfailure'=>0,'statement'=>array(array('operand1'=>'&arg confirm_password','operand2'=>'&arg user_password','connector'=>'and','operator'=>'equal','failure'=>'0','group'=>'')))));
$e['userAdmin'][4]=array('table'=>'fgs_user','rowid'=>'8808','sid'=>'user_firstname','fieldset'=>'','name'=>'user_firstname','label'=>'Имя','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'user_firstname','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['userAdmin'][5]=array('table'=>'fgs_user','rowid'=>'8809','sid'=>'user_lastname','fieldset'=>'','name'=>'user_lastname','label'=>'Фамилия','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'user_lastname','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['userAdmin'][6]=array('table'=>'fgs_user','rowid'=>'8816','sid'=>'user_email','fieldset'=>'','name'=>'user_email','label'=>'E-mail','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'user_email','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'','validators'=>array(array('error'=>'wrong_value','break_onfailure'=>0,'statement'=>array(array('operand1'=>'&arg user_email','operand2'=>'/^([*+!.&#$¦\'\\%\/0-9a-z^_`{}=?~:-]+)@(([0-9a-z-]+\.)+[0-9a-z]{2,4})$/i','connector'=>'and','operator'=>'regexp','failure'=>'0','group'=>'')))));
$e['userAdmin'][7]=array('table'=>'fgs_user','rowid'=>'8818','sid'=>'user_role','fieldset'=>'','name'=>'user_role','label'=>'Роль','component'=>'SelectOneMenu','renderer'=>'OneMenu','required'=>1,'list_sid'=>'roles','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'roles','table'=>'fgs_role','from'=>'fgs_role','primary_key'=>'role_id','select'=>'role_id id,role_name as name','order'=>'role_id','display_field'=>'role_name'),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'varchar','field'=>'user_role','cai'=>1);
$e['userAdmin'][8]=array('table'=>'fgs_user','rowid'=>'8819','sid'=>'user_title','fieldset'=>'','name'=>'user_title','label'=>'Обращение к пользователю','component'=>'InputText','type'=>'varchar','required'=>1,'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'field'=>'user_title','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['userAdmin'][9]=array('table'=>'fgs_user','rowid'=>'8820','sid'=>'user_active','fieldset'=>'','name'=>'user_active','label'=>'Статус пользователя','component'=>'SelectOneRadio','renderer'=>'radio','layout'=>'1','required'=>1,'default_value'=>'0','list_sid'=>'user_status','list'=>array('options'=>array('0'=>'неактивный','1'=>'активный','2'=>'триал')),'modes'=>array('insert','update','copy','remove','read','multi_update','multi_remove','multi_read'),'type'=>'tinyint','field'=>'user_active','cai'=>1);