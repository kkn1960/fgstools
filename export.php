<?php
include('export.inc');

// set request window
$acl=array('users'=>array(),'roles'=>array('programmer'));
$accessHandler->checkAccess($acl);

$window=$registry->setWindow();
$registry->set('export','export','language',$_SESSION['language']);
$q="select * from fgs_export ";
$n=$db->set($q,$info);
$a=array();
for($i=0;$i<$n;$i++)
{
    $component=$info[$i]['export_component'];
    $parameter=$info[$i]['export_parameter'];
    if(!isset($a[$component]))
    {
        $a[$component]=array();
    }
    $a[$component][$parameter]=$info[$i];
}
if(isset($_GET['component']))
{
    $component=$_GET['component'];
    $components=array('form','grid','search','dataset','controller','list','menu','message');
    if(!in_array($component,$components))
    {
        die($component.'is not legal');
    }
    switch ($component)
    {
        case 'form':
            $pc=new FormExport();
            $pc->title=Msg('FormExport');
            $field='form_system';
            $q="select form_sid,$field from fgs_form where form_type not like '%search%' and form_sid!='dummy'";
            $n=$db->set($q,$info,'form_sid',$field);
            $system_path=SYSTEM_FORM_PATH;
            $application_path=APPLICATION_FORM_PATH;
            break;
        case 'grid':
            $pc=new GridExport();
            $pc->title=Msg('GridExport');
            $field='grid_system';
            $q="select grid_sid,$field from fgs_grid";
            $n=$db->set($q,$info,'grid_sid',$field);
            $system_path=SYSTEM_GRID_PATH;
            $application_path=APPLICATION_GRID_PATH;
            break;
        case 'search':
            $pc=new SearchExport();
            $pc->title=Msg('SearchExport');
            $field='form_system';
            $q="select form_sid,$field from fgs_form where form_type like '%search%'";
            $n=$db->set($q,$info,'form_sid',$field);
            $system_path=SYSTEM_SEARCH_PATH;
            $application_path=APPLICATION_SEARCH_PATH;
            break;
        case 'dataset':
            $pc=new DatasetExport();
            $pc->title=Msg('DatasetExport');
            $field='dataset_system';
            $q="select dataset_sid,$field from fgs_dataset";
            $n=$db->set($q,$info,'dataset_sid',$field);
            $system_path=SYSTEM_DATASET_PATH;
            $application_path=APPLICATION_DATASET_PATH;
            break;
        case 'controller':
            $pc=new ControllerExport();
            $pc->title=Msg('ControllerExport');
            $field='controller_system';
            $q="select controller_sid,$field from fgs_controller";
            $n=$db->set($q,$info,'controller_sid',$field);
            $system_path=SYSTEM_CONTROLLER_PATH;
            $application_path=APPLICATION_CONTROLLER_PATH;
            break;
        case 'list':
            $pc=new ListExport();
            $pc->title=Msg('ListExport');
            $field='list_system';
            $q="select list_sid,$field from fgs_list ";
            $n=$db->set($q,$info,'list_sid',$field);
            $system_path=SYSTEM_LIST_PATH;
            $application_path=APPLICATION_LIST_PATH;
            break;
        case 'menu':
            $pc=new MenuExport();
            $pc->title=Msg('MenuExport');
            $field='menu_system';
            $q="select menu_id,$field from fgs_menu";
            $n=$db->set($q,$info,'menu_id',$field);
            $system_path=SYSTEM_MENU_PATH;
            $application_path=APPLICATION_MENU_PATH;
            break;
        case 'message':
            $pc=new MessageExport();
            $pc->title=Msg('MessageExport');
            break;
        default:
            break;
    }
    $registry->setGlobal('export_component',$component);
    if($FGSSite!='demo')
    {
        if($component!='message')
        {
            foreach($info as $sid=>$system)
            {
                if($system)
                {
                    $path=$system_path;
                }
                else
                {
                    $path=$application_path;
                }
                $registry->setGlobal('export_component_sid',$sid);
                $file=$path.$sid.".php";
                if (!$handle = fopen($file, 'wb'))
                {
                    debug::writeExport($component,$sid,Msg("cannot_open_file").':'.$file);
                }
                else
                {
                    $pc->export($sid,$handle,$a);
                    fclose($handle);

                }
            }
        }
        else
        {
            $pc->export();
        }
    }
}

$menu=new ddm($menu_id);
$menuStr=$menu->render();
$template="export.php";
$timer->mark('export_executed');
require "template/{$template}";


