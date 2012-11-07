<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class SelectBooleanCheckbox extends InputElement
{
    function ApplyRequestValue($method)
    {
        parent::ApplyRequestValue($method);
        if($this->value==='')
        {
            $this->value=0;
        }
        else
        {
            $this->value=1;
        }
    }
    function isEmpty()
    {
        if(null===$this->value or $this->value===''  or $this->value=='0')
        {
            return true;
        }
        else
        {
           return false;
        }
    }
}
