<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class AttributeView extends FgsFormView
{
    function inputFields()
    {
        global $FGSVersion,$FGSDebug,$registry;
        $user_role=$registry->getUserRole();
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
                     $this->o[]= '<div class="float_corrector"></div>';
                     $this->o[]='</div>';
                     $endTeg=true;
                }
                $fieldset=$obj->fieldset;
                if($fieldset!='')
                {
                    $this->o[]='<div class="form_block_header">';
                    $this->o[]=Msg($obj->fieldset);
                    $this->o[]='</div>';
                    $this->o[]='<div class="form_block">';
                    $endTeg=false;
                }
                $noDots='style="border:none;"';
            }
            else
            {
                $noDots='';
            }
            if($FGSVersion=='development'  and $user_role=='programmer')
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
            $this->o[]= '<div class="float_corrector"></div>';
            $this->o[]='</div>';
        }
        else
        {
            $this->o[]= '<div class="edit_label"></div><div class="edit_field"></div>';
        }

    }
}
