<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class ListExport extends ConfigExport
{
    public $type='list';
    function export($sid,$handle,$e)
    {
        global  $registry,$db;
        $lang=$registry->get('export','export','language') ;
        $obj=new Export();
        $li=array();
        if($db->record("select *  from fgs_list  where list_sid='$sid' ",$li)==false)
        {
            debug::writeExport($this->type,$sid,Msg("list_not_found"));
            return ;
        }
        $table=$li['list_table'];
        $registry->set('export','export','list_info',$li);
        $lang=$registry->get('export','export','language') ;
        $an='$'."list['$sid']";
        $o=array();
        $o[]='<?php';
        $result=$obj->export_list($sid);
        if($result===null)
        {
            return ;
        }
        else
        {
            $o[]="$an=$result;";
        }
        if (!fwrite($handle,implode("\n",$o),1000000))
        {
            debug::writeExport($this->type,$sid,Msg("cannot_write"));
        }
    }
}
