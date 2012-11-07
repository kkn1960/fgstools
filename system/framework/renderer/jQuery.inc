<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class jQuery
{
    static private $instance = NULL;
    public $a;
    private function __construct()
    {
        global $registry;
        $this->a=array();
        $this->a['clicked']='';
        $this->a['language']=$_SESSION['language'];
        $this->a['datepicker']=array();
        $this->a['chain']=array();
        $this->a['chainStatic']=array();
        $this->a['chainDynamic']=array();
        $this->a['autocomplete']=array();
        $this->a['autocompleteStatic']=array();
        $this->a['autocompleteDynamic']=array();
        $this->a['grid']=array();
    }
    static public function getInstance()
    {
        if(self::$instance == NULL)
        {
            self::$instance = new jQuery();
        }
        return self::$instance;
    }
    function render()
    {


        $o=array();
        $o[]='<script type="text/javascript">';
        $o[]="fgs=".json_encode($this->a).';';
        $o[]='$(document).ready(initControls);';
        $o[]='</script>';
        return implode('',$o);
    }
    function jsForm($form)
    {
        $m=$form->mode;
        foreach($form->e as $index=>$obj)
        {
            if(isset($obj->modes) and !in_array($m,$obj->modes)) continue;
            //datapickers

            if(!isset($obj->hidden) and $obj->component!='InputHidden' and $obj->component!='InputSystem' and  ($obj->type=='date' or $obj->type=='datetime'))
            {
                $this->a['datepicker'][]=$obj->id;
            }
            if($obj->component=='InputSystem' or $obj->component=='InputForeignKey' )
            {
                $type= 'input';
            }
            elseif($obj->renderer=='textarea')
            {
                $type= 'textarea';
            }
            elseif($obj->renderer=='OneMenu' or $obj->renderer=='OneListbox' or $obj->renderer=='ManyListbox'  or $obj->renderer=='ManyMenu' )
            {
                $type= 'select';
            }
            else
            {
                $type= 'input';
            }
            //chain links
            if(isset($obj->chain))
            {

                $iChain=$obj->chain;
                $iTier=abs($obj->tier);
                $role=$obj->chain_role;
                if(!isset($this->a['chain'][$iChain]))
                {
                    $this->a['chain'][$iChain]=array();
                    $this->a['chainDynamic'][$iChain]=array();
                    $this->a['chainStatic'][$iChain]=array();
                }
                if($obj->component=='InputForeignKey' or $obj->component=='InputSystem')
                {
                    $this->a['chainStatic'][$iChain][]=array('parameter'=>$obj->register,'value'=>$obj->value);
                }
                elseif($role=='parameter')
                {
                    $this->a['chainDynamic'][$iChain][]=array('parameter'=>$obj->register,'name'=>$obj->name,'type'=>$type);
                }
                else
                {
                    $this->a['chain'][$iChain][$iTier][]=array('parameter'=>$obj->register,'name'=>$obj->name,'type'=>$type,'id'=>$obj->id,'rowid'=>$obj->rowid);
                }
            }
            //autocomplete
            if(isset($obj->autocomplete))
            {
                $a=array();
                if(is_array($obj->autocomplete))
                {
                    $a=$obj->autocomplete;
                }
                else
                {
                    $a[]=$obj->autocomplete;
                }
                foreach($a as $ia)
                {
                    if(!isset($this->a['autocomplete'][$ia]))
                    {
                        $this->a['autocomplete'][$ia]=array();
                        $this->a['autocompleteStatic'][$ia]=array();
                        $this->a['autocompleteDynamic'][$ia]=array();
                    }
                }
                if($obj->component=='InputAutocomplete' or $obj->component=='InputMultiAutocomplete' )
                {
                    $ia=$obj->autocomplete;
                    if(isset($obj->callback))
                    {
                        $this->a['autocomplete'][$ia]['callback']=$obj->callback;
                    }
                    if(isset($obj->token))
                    {
                        $this->a['autocomplete'][$ia]['token']=$obj->token;
                    }
                    $this->a['autocomplete'][$ia]['name']=$obj->name;
                    $this->a['autocomplete'][$ia]['parameter']=$obj->register;
                    $this->a['autocomplete'][$ia]['rowid']=$obj->rowid;
                    $this->a['autocomplete'][$ia]['type']=$type;
                    $this->a['autocomplete'][$ia]['method']=$obj->method;
                    $this->a['autocomplete'][$ia]['min_chars']=$obj->min_chars;
                    $this->a['autocomplete'][$ia]['timeout']=$obj->timeout;
                    $this->a['autocomplete'][$ia]['dataType']='json';
                    if(isset($obj->list['options']))
                    {
                        $this->a['autocomplete'][$ia]['option']=array();
                        foreach($obj->list['options'] as $value=>$description)
                        {
                            $this->a['autocomplete'][$ia]['option'][]=$description;
                        }
                    }
                    if(isset($obj->before_request))
                    {
                        $this->a['autocomplete'][$ia]['before_request']=$obj->before_request;
                    }
                    if(isset($obj->after_request))
                    {
                        $this->a['autocomplete'][$ia]['after_request']=$obj->after_request;
                    }
                    $this->a['autocomplete'][$ia]['url']=$obj->url;
                    $this->a['autocompleteStatic'][$ia][]=array('parameter'=>'rowid','value'=>$obj->rowid);

                    if(isset($obj->id))
                    {
                        $this->a['autocomplete'][$ia]['id']=$obj->id;
                    }
                }
                elseif($obj->component=='InputForeignKey' or $obj->component=='InputSystem')
                {
                    $this->a['autocompleteStatic'][$ia][]=array('parameter'=>$obj->register,'value'=>$obj->value);
                }
                else
                {
                    $this->a['autocompleteDynamic'][$ia][]=array('parameter'=>$obj->register,'name'=>$obj->name,'type'=>$type,'required'=>$obj->required);
                }
            }
            //validators
        }
    }
    function jsSearch($search)
    {
        foreach($search->p as $obj)
        {
            if(isset($obj->hidden) and $obj->hidden==1) continue;
            if(isset($obj->argument))
            {
                if($obj->argument->type=='date' or $obj->argument->type=='datetime')
                {
                    $this->a['datepicker'][]=$obj->argument->id;
                }
            }
            elseif(isset($obj->argumentMin))
            {
                if($obj->argumentMin->type=='date' or $obj->argumentMin->type=='datetime')
                {
                    $this->a['datepicker'][]=$obj->argumentMin->id;
                    $this->a['datepicker'][]=$obj->argumentMax->id;
                }
            }
        }

    }
    function jsGrid($grid)
    {
        global $listLoader,$registry,$db;
        if(!$grid->inline_edit)
        {
            return;
        }
        /// array of primary key fields
        //  array of primary keys
        // array of column definitions
        $this->a['window']=$registry->getWindow();
        $this->a['controller']=$registry->getController();
        $a=array();
        $a['unit']= $grid->unit;
        $a['sid']= $grid->sid;
        $a['primary_key']= $grid->primary_key;
        $a['apk']= $grid->apk;
        $a['column']=array();
        foreach($grid->c as $obj)
        {
            $column=array();
            $column['component']="{$obj->component}";
            if(($obj->component=='ColumnInputText' or $obj->component=='ColumnSelectOneMenu'))
            {
                $column['component']="{$obj->component}";
                $column['field']="{$obj->field}";
                $column['rowid']="{$obj->rowid}";
                $column['type']="'{$obj->type}'";
                $column['name']="{$obj->name}";
                $column['required']="{$obj->required}";
                if($obj->component=='ColumnInputText')
                {
                    if($obj->size!=null)
                    {
                        $column['size']="{$obj->size}";
                    }
                    if($obj->maxlength!=null)
                    {
                        $column['maxlength']="{$obj->maxlength}";
                    }
                }
                elseif($obj->component=='ColumnSelectOneMenu')
                {
                    if(!isset($obj->list['options']))
                    {
                        $options=$listLoader->get($obj->list);
                    }
                    else
                    {
                        $options=$obj->list['options'];
                    }
                    $size=sizeof($options);
                    $column['options']=array();
                    if(!$obj->required)
                    {
                        $column['options'][]=array('id'=>'','name'=>'');
                    }
                    foreach($options as $k=>$v)
                    {
                        $column['options'][]=array('id'=>$k,'name'=>$v);
                    }
                }
            }
            $a['column'][]=$column;
        }
        $this->a['grid'][]=$a;
    }
}
