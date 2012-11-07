<?php
$form['login']=array();
$form['login']['initial']=array();
$form['login']['initial']=array('mode'=>'seek');
$form['login']['session']['seek']=array('mode','hide','display','apk');
$button['login']=array();
$button['login'][]=array('file'=>'enter.jpg','value'=>'Login','name'=>'seek','renderer'=>'button','type'=>'submit','action'=>'seek','modes'=>array('seek'));
$form['login']['properties']=array('primary_key'=>array('user_rowid'),'table'=>'fgs_user','method'=>'post','system'=>1,'redirect_after_insert'=>0,'modes'=>array('seek'),'system'=>1,'title'=>'login','modes'=>array('seek'),'id'=>'user','attributes'=>'','htmlevents'=>'','enctype'=>'application/x-www-form-urlencoded','events'=>array('seek'=>'found'),'joins'=>array());
$e['login']=array();
$e['login'][0]=array('table'=>'fgs_user','rowid'=>'3413','sid'=>'user_login','fieldset'=>'','name'=>'username','label'=>'Login','component'=>'InputText','type'=>'varchar','required'=>1,'name'=>'username','modes'=>array('seek'),'field'=>'user_login','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'20\'');
$e['login'][1]=array('table'=>'fgs_user','rowid'=>'3414','sid'=>'user_password','fieldset'=>'','name'=>'password','label'=>'Password','component'=>'InputSecret','renderer'=>'secret','field'=>'user_password','converter'=>'md5','required'=>1,'name'=>'password','modes'=>array('seek'),'type'=>'varchar','attributes'=>'maxlength=\'20\' size=\'20\'');
$e['login'][2]=array('table'=>'fgs_user','rowid'=>'11396','sid'=>'user_email','fieldset'=>'','name'=>'user_email','label'=>'E-mail','trim'=>'trim','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('seek'),'field'=>'user_email','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'128\' size=\'60\'');
$e['login'][3]=array('table'=>'fgs_user','rowid'=>'11397','sid'=>'user_firstname','fieldset'=>'','name'=>'user_firstname','label'=>'First name','trim'=>'trim','component'=>'InputText','hidden'=>1,'type'=>'varchar','modes'=>array('seek'),'field'=>'user_firstname','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['login'][4]=array('table'=>'fgs_user','rowid'=>'11398','sid'=>'user_lastname','fieldset'=>'','name'=>'user_lastname','label'=>'Last name','trim'=>'trim','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('seek'),'field'=>'user_lastname','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['login'][5]=array('table'=>'fgs_user','rowid'=>'11399','sid'=>'user_role','fieldset'=>'','name'=>'user_role','label'=>'Role','component'=>'SelectOneMenu','hidden'=>1,'renderer'=>'OneMenu','required'=>1,'list_sid'=>'roles','null_option'=>array(''=>'&nbsp;&nbsp;&nbsp;&nbsp;'),'list'=>array('sid'=>'roles','table'=>'fgs_role','from'=>'fgs_role','primary_key'=>'role_id','select'=>'role_id id,role_name as name','order'=>'role_id','display_field'=>'role_name'),'modes'=>array('seek'),'type'=>'varchar','field'=>'user_role','cai'=>1);
$e['login'][6]=array('table'=>'fgs_user','rowid'=>'11400','sid'=>'user_rowid','fieldset'=>'','name'=>'user_rowid','label'=>'User_rowid','component'=>'InputText','hidden'=>1,'type'=>'int','required'=>1,'modes'=>array('seek'),'field'=>'user_rowid','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'11\' size=\'11\'');
$e['login'][7]=array('table'=>'fgs_user','rowid'=>'11401','sid'=>'user_secondname','fieldset'=>'','name'=>'user_secondname','label'=>'Secondname','trim'=>'trim','component'=>'InputText','hidden'=>1,'type'=>'varchar','modes'=>array('seek'),'field'=>'user_secondname','renderer'=>'text','cai'=>'1','attributes'=>'maxlength=\'64\' size=\'60\'');
$e['login'][8]=array('table'=>'fgs_user','rowid'=>'11402','sid'=>'user_title','fieldset'=>'','name'=>'user_title','label'=>'Title','trim'=>'trim','component'=>'InputText','hidden'=>1,'type'=>'varchar','required'=>1,'modes'=>array('seek'),'field'=>'user_title','renderer'=>'text','cai'=>'1');