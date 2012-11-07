<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class LoginFormView extends FgsFormView
{
    function title()
    {
        global $FGSVersion,$FGSDebug,$registry;
        $title=Msg($this->form->title);
        if($FGSVersion=='development' and 'programmer'==$registry->getUserRole())
        {
            $editClick=editFormLink($this->form->sid);
            $title="<span ondblclick=\"$editClick;\">$title</span>";
        }
        $this->o[]="<div class=\"table_header\">$title</div>";
    }
    function formErrors()
    {
        $merge=false;
        $o=array();
        $o[]='<div class="error_box">';
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
}
