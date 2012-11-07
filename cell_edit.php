<?php
/*
request script for inline editing
*/
require('system.inc');
if($FGSSite=='demo')
{
    echo 1;
    exit;
}

if(isset($_REQUEST['fgsw']) and isset($_REQUEST['fgsu']) and isset($_REQUEST['fgsc']) and isset($_REQUEST['fgst']) and (isset($_SESSION[FGS_SESSION_KEY][$_REQUEST['fgsw']][FGS_CONTROLLER_KEY]['controller']) and $_SESSION[FGS_SESSION_KEY][$_REQUEST['fgsw']][FGS_CONTROLLER_KEY]['controller']==$_REQUEST['fgsc']))
{
    if(isset($_REQUEST['primary_key']) and isset($_REQUEST['field']) and isset($_REQUEST['irow']) )
    {
        $pk=$_SESSION[FGS_SESSION_KEY][$_REQUEST['fgsw']][$_REQUEST['fgsu']][$_REQUEST['fgst']]['apk'][$_REQUEST['irow']];
        $out=array();
        foreach($pk as $v)
        {
            $out[]=$v;
        }
        if(implode('_',$out)==$_REQUEST['primary_key'])
        {
            $rowid= $_REQUEST['rowid'];
            $file=COLUMN_PATH.$rowid.".php";
            if(!file_exists($file))
            {
                die();
            }
            include $file;
            //check acces
            if(isset($column[$rowid]['acl']) and !$accessHandler->testAccess($column[$rowid]['acl']))
            {
                echo 1;
                exit;
            }

            $class=getComponentClass($column[$rowid]['component']);
            $obj=new $class('ajax','grid',$column[$rowid]);
            $obj->ApplyRequestValue('post');
            $obj->validate();
            $table=$column[$rowid]['table'];
            $field=$column[$rowid]['field'];
            foreach($obj->err as $err)
            {
                debug::write($err['id'],$err['text']);
            }
            if($field==$_REQUEST['field'] and sizeof($obj->err)==0)
            {
                $fv=array();
                $fv[$field]=$db->code($obj->value,$obj->type);
                $result=$db->update($table,$fv,$pk);
                if($result['error']==false and isset($obj->save))
                {
                     if(isset($obj->alias))
                     {
                         $key=$obj->alias;
                     }
                     else
                     {
                         $key=$obj->field;
                     }
                     $_SESSION[FGS_SESSION_KEY][$_REQUEST['fgsw']][$_REQUEST['fgsu']][$_REQUEST['fgst']]['adk'][$_REQUEST['irow']][$key]= $obj->value;
                }
            }
        }
        echo 1;
    }
}

