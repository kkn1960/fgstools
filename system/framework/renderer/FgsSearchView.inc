<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FgsSearchView
{
    public $search;
    public $o;
    public $np;
    function __construct($search)
    {
        $this->search=$search;
        $this->np=sizeof($this->search->p);
        if($this->np>1)
        {
            $this->colspan=4;
        }
        else
        {
            $this->colspan=3;
        }
    }
    function render()
    {
        $this->o=array();
        $this->startContainer();
        $this->startForm();
        $this->title();
        $this->searchHeader();
        $this->outErrors();
        $this->outPredicates();
        $this->searchButtons();
        $this->endForm();
        $this->endContainer();
        return implode('',$this->o);
    }
    function outErrors()
    {
        $merge=false;
        $o=array();
        $o[]='<div class="error_box">';
        $o[]=Msg('input_errors').'<br />';
        if(isset($this->search->err) and sizeof($this->search->err)>0)
        {
            $merge=true;
            foreach($this->search->err as $err)
            {
                $o[]="[{$err['id']}]".Msg($err['text']);
                $o[]='<br />';
            }
        }
        foreach($this->search->p as $field=>$obj)
        {
            if(isset($obj->err) and sizeof($obj->err)>0)
            {
                $merge=true;
                foreach($obj->err as $err)
                {
                    $o[]= '<strong>';
                    $o[]=$obj->label;
                    $o[]=':</strong>';
                    $o[]=Msg($err['text']);
                    $o[]='<br />';
                }
            }
            elseif(isset($obj->argument) and sizeof($obj->argument->err)>0)
            {
                $merge=true;
                foreach($obj->argument->err as $err)
                {
                    $o[]= '<strong>';
                    $o[]=$obj->label;
                    $o[]=':</strong>';
                    $o[]=Msg($err['text']);
                    $o[]='<br />';
                }
            }
            elseif(isset($obj->argumentMin) and sizeof($obj->argumentMin->err)>0)
            {
                $merge=true;
                foreach($obj->argumentMin->err as $err)
                {
                    $o[]= '<strong>';
                    $o[]=$obj->label;
                    $o[]=':</strong>';
                    $o[]=Msg($err['text']);
                    $o[]='<br />';
                }
            }
            elseif(isset($obj->argumentMax) and sizeof($obj->argumentMax->err)>0)
            {
                $merge=true;
                foreach($obj->argumentMax->err as $err)
                {
                    $o[]= '<strong>';
                    $o[]=$obj->label;
                    $o[]=':</strong>';
                    $o[]=Msg($err['text']);
                    $o[]='<br />';
                }
            }
        }
        $o[]='</div>';
        if($merge)
        {
            $this->o=array_merge($this->o, $o);
        }
    }
    function  searchButtons()
    {
        $this->o[]='<div class="search_buttons_area">';
        $this->inputButtons();
        $this->o[]='</div>';

    }
    function inputButtons()
    {
        if(!isset($this->search->b)) return ;
        $o=array();
        foreach($this->search->b as $obj)
        {
            $o[]=FormKit::render($obj);
        }
        $this->o[]=implode('&nbsp;&nbsp;&nbsp;',$o);
    }
    function startForm()
    {
        global $registry;
        if(isset($this->search->action))
        {
            $action=$this->search->action;
        }
        else
        {
            $action=$_SERVER['PHP_SELF'];
        }
        $hidden=$registry->fgsHidden($this->search->unit,'search');
        $this->o[]="<form name=\"{$this->search->sid}\"  action=\"{$action}\" method=\"{$this->search->method}\" enctype=\"application/x-www-form-urlencoded\">$hidden";
    }
    function endForm()
    {
        $this->o[]="</form>";
    }
    function startContainer()
    {
        if($this->search->display)
        {
            $display='';
        }
        else
        {
            $display=' none ';
        }
        $this->o[]= "<div class=\"edit\" id=\"{$this->search->sid}_search\"  style=\"display : {$display} \">";
    }
    function endContainer()
    {
        $this->o[]="<br></div>";
    }

    function title()
    {
        global $FGSVersion,$FGSDebug,$registry;
        $s=Msg($this->search->title);
        if($FGSVersion=='development'  and 'programmer'==$registry->getUserRole())
        {
            $editClick=editSearchLink($this->search->sid);
            $title="<span ondblclick=\"$editClick\">{$s}</span>";
        }
        else
        {
            $title=$s;
        }
        $this->o[]='<div class="table_header">';
        $this->o[]=$title;
        $onclick=$registry->fgsToggle($this->search->unit,$this->search->sid,'search');
        $this->o[]="<a href=\"#\" $onclick class=\"icon_invisible\" style=\"float:right;margin-right:10px;\"></a>";
        $this->o[]='</div>';
    }
    function searchHeader()
    {
        $this->o[]='<div class="s_header">';
        
        if($this->np>1)
        {
           $this->o[]='<div class="search_connector_header">';
           $this->o[]=Msg('connector');
           $this->o[]='</div>';
        }
        $this->o[]='<div class="search_label_header">';
        $this->o[]=Msg('field');
        $this->o[]='</div><div class="search_operator_header">';

        $this->o[]=Msg('operator');
        $this->o[]='</div><div class="search_argument_header">';

        $this->o[]=Msg('argument');
        $this->o[]='</div></div>';
    }
    function outPredicates()
    {
        global $FGSVersion,$FGSDebug,$registry;
        $i=0;
        $fieldset='';
        $endTeg=true;
        foreach($this->search->p as $obj)
        {
            if(isset($obj->hidden) and $obj->hidden==1) continue;
            if($obj->fieldset!=$fieldset)
            {
                if(!$endTeg )
                {
                     $this->o[]='</fieldset>';
                     $endTeg=true;
                }
                $fieldset=$obj->fieldset;
                if($fieldset!='')
                {
                    $legend =Msg($obj->fieldset);
                    $this->o[]="<fieldset><legend>$legend</legend>";
                    $endTeg=false;
                }
                $noDots='style="border:none;"';
            }
            else
            {
                $noDots='';
            }
            $this->o[]="<div class=\"search_connector\" $noDots>";
            if($this->np>1)
            {
                if($i!=0 )
                {
                    $this->o[]=FormKit::render($obj->connector);
                }
                $i=1;
            }
            if($FGSVersion=='development'  and 'programmer'==$registry->getUserRole())
            {
                $editLink=editAttributeLink($obj->rowid,'element',$obj->component,'element_rowid',$this->search->system);
                $ondblclick="ondblclick=\"$editLink\"";
            }
            else
            {
                $ondblclick='';
            }
            $this->o[]="</div><div class=\"search_label\" $ondblclick $noDots>";
            $this->o[]=$obj->label;
            $this->o[]="</div><div class=\"search_operator\" $noDots>";
            $this->o[]=FormKit::render($obj->operator);
            $this->o[]='</div>';

            if(isset($obj->argument))
            {
                $this->o[]="<div class=\"search_argument\">";
                $this->o[]=FormKit::render($obj->argument);
                $this->o[]='</div>';
            }
            elseif(isset($obj->argumentMin))
            {
                $this->o[]="<div class=\"search_argument\">";
                $this->o[]='<span class="s_additional_field">';
                $this->o[]=$obj->argumentMin->label;
                $this->o[]='</span>';
                $this->o[]=FormKit::render($obj->argumentMin);
                $this->o[]='<span class="s_additional_field">';
                $this->o[]=$obj->argumentMax->label;
                $this->o[]='</span>';
                $this->o[]=FormKit::render($obj->argumentMax);
                $this->o[]='</div>';
            }

        }
        $this->o[]="<div class=\"search_connector\"></div><div class=\"search_label\"></div><div class=\"search_operator\"></div>";
    }
}
