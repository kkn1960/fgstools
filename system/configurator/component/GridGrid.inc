<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class GridGrid extends FormGrid
{
    function init_detail($args)
    {
        global $db,$eventHandler,$FGSSite;
        $n=sizeof($args['key']);
        $grid=$this->apk[0]["grid_sid"];
        $q="select max(column_index) from fgs_column where column_grid='$grid'" ;
        $index=$db->value($q);
        if($index===null)
        {
            $index=0;
        }
        $noQuotes=null;
        $q="select field_sequence from fgs_field where field_table='fgs_column' and field_name='column_rowid'";
        $sequence=$db->value($q);
        if($sequence!=null)
        {
            $value=$db->auto_increment($sequence);
            if($value!='')
            {
                $column_rowid=$value;
                $noQuotes=array();
                $noQuotes[]=$value;
            }
        }
        for($i=0;$i<$n;$i++)
        {
            $fv=array();
            if($noQuotes!=null)
            {
                $fv["column_rowid"]=$column_rowid;
            }
            $fv["column_grid"]=$grid;
            $index=$index+10;
            $fv["column_table"]=$args['key'][$i]["field_table"];
            $fv["column_field"]=$args['key'][$i]["field_name"];
            $fv["column_component"]=$args['adk'][$i]["field_column"];
            if($args['adk'][$i]["field_align"]!='')
            {
                $fv["column_align"]=$args['adk'][$i]["field_align"];
            }
            if($args['adk'][$i]["field_label"]!='')
            {
                $fv["column_header"]=$args['adk'][$i]["field_label"];
            }
            if($args['adk'][$i]["field_list"]!='' and ($fv["column_component"]=="ColumnLookup" or $fv["column_component"]=="ColumnSelectOneMenu" ))
            {
                $fv["column_list"]=$args['adk'][$i]["field_list"];
                if($args['adk'][$i]["field_type"]=="set")
                {
                   $fv["column_relation"]=1;
                }
            }
            $fv["column_index"]=$index;

            $fv["column_type"]=$args['adk'][$i]["field_type"];
            $fv["column_hidden"]=0;
            $fv["column_sort"]=1;
            $fv["column_save"]=0;
            if($FGSSite!='demo')
            {
                $db->insert("fgs_column",$fv,null,$noQuotes) ;
            }
        }

        $eventHandler->fire(array('event'=>'init_detail','unit'=>$this->unit,'trigger'=>'grid'));
    }
    function getDetails($args)
    {
        global $db;
        $grid=$args['key'][0]["grid_sid"];
        $table=$args['adk'][0]["grid_table"];
        $q="select column_field from fgs_column where column_table='$table' and  column_grid='$grid' ";

        $details=array();
        $db->set($q,$details);
        $out=array();
        $n=sizeof($details);
        for($i=0;$i<$n;$i++)
        {
            $out[]="'".$details[$i]["column_field"]."'";
        }
        return implode(",",$out);
    }
}
