<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class InputText extends InputElement
{
    function ApplyRequestValue($method)
    {
        global $db;
        parent::ApplyRequestValue($method);
        if($db->IsNumber($this->type) and $this->value!='')
        {
            $this->value=str_replace(",",".",$this->value);
        }
    }
}
