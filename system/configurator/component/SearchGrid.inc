<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class SearchGrid extends FormGrid
{
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
            $fv['element_form']=$form;
            $fv['element_table']=$args['key'][$i]['field_table'];
            $fv['element_field']=$args['key'][$i]['field_name'];
            $component=$args['adk'][$i]['field_argument'];
            $fv['element_component']=$component;
            if($args['adk'][$i]['field_label']!='')
            {
                $fv['element_label']=$args['adk'][$i]['field_label'];
            }
            if($component=='InputText')
            {
                if($args['adk'][$i]['field_size']<1)
                {
                    if(60<$args['adk'][$i]['field_length'])
                    {
                        $fv['element_size']=60;
                    }
                    else
                    {
                        $fv['element_size']=$args['adk'][$i]['field_length'];
                    }
                }
                else
                {
                    $fv['element_size']=$args['adk'][$i]['field_size'];
                }
                if($args['adk'][$i]['field_maxlength']<1)
                {
                    $fv['element_maxlength']=$args['adk'][$i]['field_length'];
                }
                else
                {
                    $fv['element_maxlength']=$args['adk'][$i]['field_maxlength'];
                }
            }
            elseif($args['adk'][$i]['field_list']!='' and ($component=='SelectManyCheckbox'  or $component=='SelectManyListbox'  or $component=='SelectManyMenu'  or $component=='SelectOneListbox'  or $component=='SelectOneMenu'  or $component=='SelectOneRadio' ) )
            {
                $fv['element_list']=$args['adk'][$i]['field_list'];
            }
            elseif($component=='InputTextarea')
            {
                $fv['element_size']=60;
                $fv['element_maxlength']=64;
                $fv['element_component']='InputTex';
            }
            if($component=='SelectOneRadio')
            {
                $fv['element_component']='SelectOneMenu';
            }
            $type=$args['adk'][$i]['field_type'];
            $index=$index+10;
            $fv['element_index']=$index;
            $fv['element_type']=$type;
            $fv['element_hidden']=0;
            $fv['element_connector']='and';
            $fv['element_required']=0;
            if($args['adk'][$i]['field_predicate']==null or $args['adk'][$i]['field_predicate']=='')
            {
                $predicate=$args['adk'][$i]['field_predicate'];
            }
            elseif($type=='set')
            {
                $predicate='set';
            }
            elseif($db->IsNumber($type))
            {
                $predicate='comparison';
            }
            elseif($db->IsText($type))
            {
                $predicate='pattern';

            }
            elseif($db->IsTime($type))
            {
                $predicate='range';
            }
            else
            {
                $predicate='pattern';
            }
            $fv['element_predicate']=$predicate;
            if($predicate=='set')
            {
                $fv['element_operator_default']='in';
                $fv['element_operators']=$db->code("'in','include_all','include_one','not_in','not_include_all'",'text');
            }
            elseif($predicate=='comparison')
            {
                $fv['element_operator_default']='equal';
                $fv['element_operators']=$db->code("'equal','l','lq','m','mq','not_equal'",'text');
            }
            elseif($predicate=='pattern')
            {
                $fv['element_operator_default']='like';
                $fv['element_operators']=$db->code("'like','leftlike','rightlike','not_like','not_leftlike','not_rightlike','equal','not_equal','regexp'",'text');

            }
            elseif($predicate=='range')
            {
                $fv['element_operator_default']='between';
                $fv['element_operators']=$db->code("'between','not_between'",'text');
            }
            elseif($predicate=='null')
            {
                $fv['element_operator_default']=null;
                $fv['element_operators']=$db->code("'null','not_null','empty','not_empty'",'text');
            }
            if($FGSSite!='demo')
            {
                $db->insert('fgs_element',$fv,null,$noQuotes) ;
            }
        }
        $eventHandler->fire(array('event'=>'init_detail','unit'=>$this->unit,'trigger'=>'grid'));
    }
}

