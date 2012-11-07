<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FgsFormView
{
    public $form;
    public $o;
    function __construct($form)
    {
        $this->form=$form;
    }
    function formErrors()
    {
        $merge=false;
        $o=array();
        $o[]='<div class="error_box">';
        $o[]=Msg('input_errors').'<br />';
        if(isset($this->form->err) and sizeof($this->form->err)>0)
        {
            $merge=true;
            foreach($this->form->err as $err)
            {
                $o[]=Msg($err['text']);
                $o[]='<br />';
            }
        }
        foreach($this->form->e as $field=>$obj)
        {
            if(isset($obj->err) and sizeof($obj->err)>0)
            {
                $merge=true;
                foreach($obj->err as $err)
                {
                    $o[]= '<strong>';
                    $o[]=$obj->label;
                    $o[]='</strong>:';
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
    function inputButtons()
    {
        if(!isset($this->form->b)) return ;
        $o=array();
        foreach($this->form->b as $obj)
        {
            if(!isset($obj->modes) or in_array($this->form->mode,$obj->modes))
            {
                $o[]=FormKit::render($obj);
            }
        }
        $this->o[]=implode('&nbsp;&nbsp;&nbsp;',$o);
    }
    function render()
    {
        $this->o=array();

        $this->startContainer();
        $this->startForm();
        $this->title();
        $this->formErrors();
        $this->requireNote();

        $this->inputFields();
        $this->hiddenFields();

        $this->formButtons();
        $this->recordNavigation();
        $this->endForm();
        $this->endContainer();

        return implode('',$this->o);
    }
    function  formButtons()
    {
        $this->o[]= '<div class="edit_buttons_area">';
        $this->inputButtons();
        $this->o[]= '</div>';
    }
    function  recordNavigation()
    {
        if(($this->form->mode=='multi_read' or $this->form->mode=='multi_remove' or $this->form->mode=='multi_update') and sizeof($this->form->apk)>1)
        {
            $this->o[]= '<div  class="records">';
            $this->o[]= $this->navigationString();
            $this->o[]=  '</div><br>';
        }
    }
    function  navigationString()
    {
        global  $registry;
        $v=$registry->fgsRef($this->form->unit,'form').'&go';
        if(($this->form->mode=='multi_read' or $this->form->mode=='multi_remove' or $this->form->mode=='multi_update') and sizeof($this->form->apk)>1)
        {
            $msg_next=Msg('next',true);
            $msg_previous=Msg('previous',true);
            $msg_first=Msg('first',true);
            $msg_last=Msg('last',true);
            $o=array();
            $last=sizeof($this->form->apk)-1;
            if($this->form->irow>0)
            {
                $o[]= "<a href=\"$v=0\">$msg_first</a>";
            }
            if($this->form->irow>1)
            {
                $previous=$this->form->irow-1;
                $o[]= "<a href=\"$v=$previous\">$msg_previous</a>";
            }
            if($this->form->irow<$last-1)
            {
                $next=$this->form->irow+1;
                $o[]= "<a href=\"$v=$next\">$msg_next</a>";
            }

            if($this->form->irow<$last)
            {
                $o[]= "<a href=\"$v={$last}\">$msg_last</a>";
            }
            $this->o[]=implode('&nbsp;&nbsp;',$o);
        }
    }
    function startForm()
    {
        global $registry;
        if(isset($this->form->action))
        {
            $action=$this->form->action;
        }
        else
        {
            $action=$_SERVER['PHP_SELF'];
        }
        $hidden=$registry->fgsHidden($this->form->unit,'form');
        if(isset($this->form->onsubmit))
        {
            $onsubmit='';
        }
        else
        {
            $onsubmit="onsubmit=\"return fgsConfirmSubmit();\"";
        }
        $this->o[]= "<form name=\"{$this->form->sid}\" {$this->form->attributes} {$this->form->htmlevents} $onsubmit action=\"{$action}\" method=\"{$this->form->method}\" enctype=\"{$this->form->enctype}\">$hidden";
    }
    function endForm()
    {
        $this->o[]= "</form>";
    }
    function startContainer()
    {
        if($this->form->display)
        {
            $display='';
        }
        else
        {
             $display=' none ';
        }
        $this->o[]= "<div class=\"edit\" id=\"{$this->form->sid}_form\" style=\"display : {$display} \">";
    }
    function endContainer()
    {
        $this->o[]= "<br></div>";
    }
    function title()
    {
        global $FGSVersion,$FGSDebug,$registry;
        $title=Msg($this->form->title).' / '.Msg("record_{$this->form->mode}");
        $onclick=$registry->fgsToggle($this->form->unit,$this->form->sid,'form');
        if($FGSVersion=='development' and 'programmer'==$registry->getUserRole())
        {
            $editClick=editFormLink($this->form->sid);
            $title="<span ondblclick=\"$editClick;\">$title</span>";
        }
        $this->o[]="<div class=\"table_header\">$title<a href=\"#\" $onclick class=\"icon_invisible\" style=\"float:right;margin-right:10px;\"></a></div>";
    }
    function requireNote()
    {
        $this->o[]="<div class=\"edit_label\" style=\"border:none;\"></div>
        <div class=\"edit_field\" style=\"color:#999999; font-size:10px; line-height:28px;\"><img src=\"image/arr.gif\" />";
        $this->o[]=Msg('required_fields');
        $this->o[]='</div>';
    }


    function inputFields()
    {
        global $FGSVersion,$FGSDebug,$registry;
        $m=$this->form->mode;
        $fieldset='';
        $endTeg=true;
        foreach($this->form->e as $index=>$obj)
        {
            if((isset($obj->modes) and !in_array($m,$obj->modes)) or isset($obj->hidden) or  $obj->component=='InputHidden' or $obj->component=='InputSystem') continue;
            $objView=FormKit::render($obj);
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
            if($FGSVersion=='development'  and 'programmer'==$registry->getUserRole())
            {
                $editLink=editAttributeLink($obj->rowid,'element',$obj->component,'element_rowid',$this->form->system);
                $ondblclick="ondblclick=\"$editLink;\"";
            }
            else
            {
                $ondblclick='';
            }
            if(isset($obj->required))
            {
                $class= "class=\"edit_label_mandatory\" $ondblclick ";
            }
            else
            {
                $class= "class=\"edit_label\" $ondblclick";
            }

            $this->o[]= "<div $class $noDots>";

            $this->o[]= $obj->label;

            $this->o[]= "</div><div class=\"edit_field\">";
            if($m=='read' or $m=='multi_read' or $m=='remove' or $m=='multi_remove')
            {
                $this->o[]=$objView;
            }
            else
            {
                if(isset($obj->chain))
                {
                    $this->o[]="<div id='div_{$obj->id}'>";
                    $this->o[]=$objView;
                    $this->o[]='</div>';
                }
                else
                {
                    $this->o[]=$objView;
                }
            }
            $this->o[]= '</div>';
        }
        if(!$endTeg )
        {
            $this->o[]='</fieldset>';
        }
        else
        {
            $this->o[]= '<div class="edit_label"></div><div class="edit_field"></div>';
        }
    }
    function hiddenFields()
    {
        foreach($this->form->e as $obj)
        {
            if($obj->component!='InputHidden' or (isset($obj->modes) and !in_array($this->form->mode,$obj->modes))) continue;
            $this->o[]=FormKit::render($obj);
        }
    }
}

