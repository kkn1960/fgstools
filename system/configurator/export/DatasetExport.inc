<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class DatasetExport extends ConfigExport
{
    public $type='dataset';
    function export($sid,$handle,$e)
    {
        global $registry,$db;
        $lang=$registry->get('export','export','language') ;
        $obj=new Export();
        $d=array();
        $q="select * from fgs_dataset where dataset_sid='$sid'";
        if(!$db->record($q,$d))
        {
            debug::writeExport($this->type,$sid,Msg("dataset_not_found"));
            return ;
        }
        $table=$d['dataset_table'];
        $o=array();
        $an='$'."ds['$sid']";
        $o[]='<?php';
        $op=array();
        $op[]="'table'=>'$table'";
        $op[]="'system'=>{$d['dataset_system']}";

        $predicate=$obj->export_predicate($sid);
        if($predicate!==false)
        {
            $op[]=$predicate;
        }
        $v=implode(',',$op);
        $o[]=$an."=array($v);";
        if(sizeof($obj->err)>0)
        {
            $this->err=array_merge($this->err,$obj->err);
        }
        if (!fwrite($handle,implode("\n",$o),1000000))
        {
            debug::writeExport($this->type,$sid,Msg("cannot_write"));
            return ;
        }
    }
}

