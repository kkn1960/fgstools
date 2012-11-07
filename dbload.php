<?php
require('system.inc');
if(isset($_GET["fgsw"]) )
{
    $window=$_GET["fgsw"];
}
elseif(isset($_POST["fgsw"]))
{
    $window=$_POST["fgsw"];
}
else
{
    $window='main';
}
$acl=array('users'=>array(),'roles'=>array('programmer'));
$accessHandler->checkAccess($acl);
$pc=new $dbLoader();
if($FGSSite!='demo')
{
    $pc->loadTableInfo();
    $pc->loadFieldInfo();
}
$menu=new ddm($menu_id);
$menuStr=$menu->render();
$template="dbload.php";
$db=db();
//set element_list to null if component is InputButton, InputText,InputTextarea,InputSystem
$aList="'SelectOneMenu','SelectOneRadio','SelectManyCheckbox','SelectManyListbox','InputMultiAutocomplete','InputAutocomplete','SelectManyMenu','SelectOneListbox'";
$q="update fgs_element set element_list=null WHERE element_list IS NOT NULL and element_component not in ($aList) ";
$db->execute($q);
$aList="'ColumnLookup','ColumnSelectOneMenu'";
$q="update fgs_column set column_list=null WHERE column_list IS NOT NULL and column_component not in ($aList) ";
 $db->execute($q);
 /////
$q="select * from fgs_element order by element_form,element_index";
$n=$db->set($q,$info);
$form='';
for($i=0;$i<$n;$i++)
{
    if($form!=$info[$i]['element_form'])
    {
        $index=10;
        $form=$info[$i]['element_form'];
    }
    $q="update fgs_element  set element_index='$index' where element_rowid='{$info[$i]['element_rowid']}'";
    $index=$index+10;
    $db->execute($q);
    
}
//set type to "set" for elements with InputMultipleSelect,SelectManyListbox,SelectManyMenu,SelectManyCheckbox
$q="update fgs_element set element_type='set' where element_component='InputMultipleSelect' or  element_component='SelectManyListbox' or  element_component='SelectManyMenu' or  element_component='SelectManyCheckbox'";
$db->execute($q);
$q="select * from  fgs_column order by column_grid,column_index";
$n=$db->set($q,$info);
$grid='';
for($i=0;$i<$n;$i++)
{
    if($grid!=$info[$i]['column_grid'])
    {
        $index=10;
        $grid=$info[$i]['column_grid'];
    }
    $q="update  fgs_column  set column_index='$index' where column_rowid='{$info[$i]['column_rowid']}'";
    $index=$index+10;
    $db->execute($q);
}
require "template/{$template}";


