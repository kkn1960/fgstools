<?php
// Database name && connection parameters
$dbname="database name";
$gaDbConnect["database name"]=array("server"=>"localhost","dbname"=>"database name","dbms"=>"Mysql","codepage"=>"utf8","user"=>"user login","password"=>"user password");

define('DEFAULT_CHARSET', 'utf8');
$dbLoader="MySqlLoader";

//dbname="database name";
//$gaDbConnect["fgs"]=array("server"=>"localhost","port"=>5432,"dbname"=>"fgs","dbms"=>"PostgreSql","encoding"=>"UTF8","user"=>"user login","password"=>"user password");
//$dbLoader="PostgreSqlLoader";

//constants for storing components's status
define('FGS_SESSION_KEY', "FGS");
define('FGS_CONTROLLER_KEY', "FGSYYY");

// product version
$FGSVersion='development';


//export mode
$FGSSite='production';

//class for export of parameters for JavaScript
$jsClass="jQuery";

// debug parameters
$FGSDebug=true;
$debugStore='registry';
$debugClear=true;
$newInstantEditWindow=false;

//supported interface languages
$language='en';
$languages=array('ru','en');

// system variables
$sysDateTime=date("Y-m-d H:i:s");
$sysDate=date("Y-m-d");
$userIP=getenv ("REMOTE_ADDR");

// language specific format for date && time
$delimiter["ru"]["dmy"]=".";
$delimiter["ru"]["hms"]=":";
$delimiter["ru"]["date_time"]=" ";
$delimiter['en']["dmy"]="/";
$delimiter['en']["hms"]=":";
$delimiter['en']["date_time"]=" ";

$df["ru"]["day"]=0;
$df["ru"]["month"]=1;
$df["ru"]["year"]=2;

$tf["ru"]["hour"]=0;
$tf["ru"]["minute"]=1;
$tf["ru"]["second"]=2;

$dtf["ru"]["day"]=0;
$dtf["ru"]["month"]=1;
$dtf["ru"]["year"]=2;

$dtf["ru"]["hour"]=3;
$dtf["ru"]["minute"]=4;
$dtf["ru"]["second"]=5;
$ifFormat["ru"]="%d.%m.%Y";

$df['en']["day"]=1;
$df['en']["month"]=0;
$df['en']["year"]=2;
$tf['en']["hour"]=0;
$tf['en']["minute"]=1;
$tf['en']["second"]=2;
$dtf['en']["day"]=1;
$dtf['en']["month"]=0;
$dtf['en']["year"]=2;
$dtf['en']["hour"]=3;
$dtf['en']["minute"]=4;
$dtf['en']["second"]=5;
$ifFormat['en']="%m/%d/%Y";

// available CSS classes for row action's icons
$icon_class[]='icon_insert';
$icon_class[]='icon_search';
$icon_class[]='icon_edit';
$icon_class[]='icon_delete';
$icon_class[]='icon_add';
$icon_class[]='icon_details';
$icon_class[]='icon_validator';
$icon_class[]='icon_filter';
$icon_class[]='icon_copy';
$icon_class[]='icon_attr';
$icon_class[]='icon_visible';
$icon_class[]='icon_invisible';
$icon_class[]='icon_settings';
$icon_class[]='icon_ruslang';
$icon_class[]='icon_englang';

// configurator's renderers at specification's export
$export_renderer['form']='FormExportView';
$export_renderer['grid']='GridExportView';
$export_renderer['search']='SearchExportView';
$export_renderer['controller']='ControllerExportView';
$export_renderer['list']='ListExportView';
$export_renderer['message']='MessageExportView';
$export_renderer['dataset']='DatasetExportView';
$export_renderer['menu']='MenuExportView';
$debugRenderer='DebugView';
$timerRenderer='TimerView';

//default scripts for the AccessHandler component
$default_page['login']='login.php';
$default_page['access_denied']='access_denied.php';


