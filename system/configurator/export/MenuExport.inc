<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class MenuExport extends ConfigExport
{
    public $type='menu';
    function export($sid,$handle)
    {
        global $registry,$db;
        $lang=$registry->get('export','export','language') ;
        $q="select * from fgs_item where item_menu='$sid' order by item_id ";
        $ni=$db->set($q,$item);
        if($ni==0)
        {
            debug::writeExport($this->type,$sid,Msg("no_items"));
            return;
        }
        $out[]="<?php";
        $parents=array();
        for($ii=0;$ii<$ni;$ii++)
        {
            if($item[$ii]["item_pid"]!='')
            {
                $parents[$item[$ii]["item_pid"]][]= $ii ;
            }
        }
        for($ii=0;$ii<$ni;$ii++)
        {
            $out[]="$"."item[$ii][\"type\"]=\"".$item[$ii]["item_type"]."\";";
            $out[]="$"."item[$ii][\"name\"]=\"".Msg($item[$ii]["item_name"])."\";";
            if($item[$ii]["item_action"]!='')
            {
               $out[]="$"."item[$ii][\"url\"]=\"".$item[$ii]["item_action"]."\";";
            }

            if($item[$ii]["item_text"]!='')
            {
               $out[]="$"."item[$ii][\"text\"]=\"".Msg($item[$ii]["item_text"])."\";";
            }
            if($item[$ii]["item_condition"]!='')
            {
               $out[]="$"."item[$ii][\"condition\"]=\"".$item[$ii]["item_condition"]."\";";
            }
            if($item[$ii]["item_target"]!='')
            {
               $out[]="$"."item[$ii][\"target\"]=\"".$item[$ii]["item_target"]."\";";
            }
            if($item[$ii]["item_class"]!='')
            {
               $out[]="$"."item[$ii][\"class\"]=\"".$item[$ii]["item_class"]."\";";
            }
            if($item[$ii]["item_childs"]!='')
            {
               $out[]="$"."item[$ii][\"childs\"]=\"".$item[$ii]["item_childs"]."\";";
            }
            if($item[$ii]["item_pid"]!='')
            {
               $out[]="$"."item[$ii][\"pid\"]=\"".$item[$ii]["item_pid"]."\";";
            }

            if($item[$ii]["item_type"]=="menu" and isset($parents[$item[$ii]["item_id"]]))
            {
                $out[]="$"."item[$ii][\"child_nodes\"]=array(".implode(",",$parents[$item[$ii]["item_id"]]).");";
                continue;
            }
        }
        $out[]="?>";
        if (!fwrite($handle,implode("\n",$out),100000))
        {
            fclose($handle);
            debug::writeExport($this->type,$sid,Msg("cannot_write"));
            return ;
        }

    }
}

