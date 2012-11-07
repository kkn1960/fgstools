<?php
$form['authentification']=array();
$form['authentification']['initial']=array();
$form['authentification']['initial']=array('mode'=>'seek');
$form['authentification']['session']['seek']=array('mode','hide','display','apk');
$button['authentification']=array();
$button['authentification'][]=array('file'=>'enter.jpg','value'=>'Login','name'=>'seek','renderer'=>'button','type'=>'submit','action'=>'seek','modes'=>array('seek'));
$form['authentification']['properties']=array('primary_key'=>array('user_rowid'),'table'=>'fgs_user','method'=>'post','system'=>1,'modes'=>array('seek'),'system'=>1,'title'=>'authentification','modes'=>array('seek'),'id'=>'user','attributes'=>"",'htmlevents'=>"",'enctype'=>'application/x-www-form-urlencoded','events'=>array('seek'=>'found'),'joins'=>array());
$e['authentification']=array();
$e['authentification'][0]=array('table'=>'fgs_user','rowid'=>'3413','sid'=>'user_login','fieldset'=>'','name'=>'username','label'=>'Login','component'=>'InputText','type'=>'varchar','required'=>1,'name'=>'username','modes'=>array('seek'),'field'=>'user_login','renderer'=>'text','cai'=>'1','attributes'=>"maxlength='128' size='20'");
$e['authentification'][1]=array('table'=>'fgs_user','rowid'=>'3414','sid'=>'user_password','fieldset'=>'','name'=>'password','label'=>'Password','component'=>'InputSecret','renderer'=>'secret','field'=>'user_password','required'=>1,'name'=>'password','modes'=>array('seek'),'type'=>'varchar','attributes'=>"maxlength='20' size='20'");