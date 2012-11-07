<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FormGrid extends Grid
{
    function processEvent($event,$args=null)
    {
        if($event['event']=='init_detail')
        {
            $this->init_detail($args);
        }
        else
        {
            parent::processEvent($event,$args);
        }
    }
    function init_detail($args)
    {
        global $db,$eventHandler,$FGSSite;
        $n=sizeof($args['key']);
        $form=$this->apk[0]["form_sid"];
        $q="select max(element_index) from fgs_element where element_form='$form'" ;
        $index=$db->value($q);
        if(is_null($index))
        {
            $index=0;
        }
        $noQuotes=null;
        $q="select field_sequence from fgs_field where field_table='fgs_element' and field_name='element_rowid'";
        $sequence=$db->value($q);
        if($sequence!=null)
        {
            $value=$db->auto_increment($sequence);
            if($value!='')
            {
                $element_rowid=$value;
                $noQuotes=array();
                $noQuotes[]=$value;
            }
        }

        for($i=0;$i<$n;$i++)
        {
            $fv=array();
            if($noQuotes!=null)
            {
                $fv["element_rowid"]=$element_rowid;
            }
            $fv["element_form"]=$form;
            $fv["element_table"]=$args['key'][$i]["field_table"];
            $fv["element_field"]=$args['key'][$i]["field_name"];
            $component=$args['adk'][$i]["field_element"];
            $fv["element_component"]=$component;
            if($args['adk'][$i]["field_label"]!='')
            {
                $fv["element_label"]=$args['adk'][$i]["field_label"];
            }
            if($component=="InputText")
            {

                if($args['adk'][$i]["field_size"]!=0)
                {
                    $fv["element_size"]=$args['adk'][$i]["field_size"];
                }
                else
                {
                    if(60<$args['adk'][$i]["field_length"])
                    {
                        $fv["element_size"]=60;
                    }
                    else
                    {
                        $fv["element_size"]=$args['adk'][$i]["field_length"];
                    }
                }
                if($args['adk'][$i]["field_maxlength"]!=0)
                {
                    $fv["element_maxlength"]=$args['adk'][$i]["field_maxlength"];
                }
                else
                {
                    $fv["element_maxlength"]=$args['adk'][$i]["field_length"];
                }

            }
            elseif($args['adk'][$i]["field_list"]!='')
            {
                $fv["element_list"]=$args['adk'][$i]["field_list"];
            }
            elseif($component=="InputTextarea")
            {
                if($args['adk'][$i]["field_rows"]!=0)
                {
                    $fv["element_rows"]=$args['adk'][$i]["field_rows"];
                }
                else
                {
                    $fv["element_rows"]=4;
                }
                if($args['adk'][$i]["field_cols"]!=0)
                {
                    $fv["element_cols"]=$args['adk'][$i]["field_cols"];
                }
                else
                {
                    $fv["element_cols"]=60;
                }

            }
            $index=$index+10;
            $fv["element_index"]=$index;
            $fv["element_type"]=$args['adk'][$i]["field_type"];
            $fv["element_hidden"]=0;
            $fv["element_default"]=$args['adk'][$i]["field_default"];
            
            $flags=explode(" ",$args['adk'][$i]["field_flags"]);
            if(in_array("not_null",$flags))
            {
                $fv["element_required"]=1;
            }
            else
            {
                $fv["element_required"]=0;
            }
            $fv["element_readonly"]=0;
            $fv["element_modes"]=$db->code("'insert','update','copy','remove','read','multi_update','multi_remove','multi_read'",'text');
            if($FGSSite!='demo')
            {
                $db->insert("fgs_element",$fv,null,$noQuotes) ;
            }
        }
        $eventHandler->fire(array('event'=>'init_detail','unit'=>$this->unit,'trigger'=>'grid'));
    }
    function getDetails($args)
    {
        global $db;
        $form=$args['key'][0]["form_sid"];
        $table=$args['adk'][0]["form_table"];
        $q="select element_field from fgs_element where element_table='$table' and  element_form='$form' ";

        $details=array();
        $db->set($q,$details);
        $out=array();
        $n=sizeof($details);
        for($i=0;$i<$n;$i++)
        {
            $out[]="'".$details[$i]["element_field"]."'";
        }
        return implode(",",$out);
    }
}
