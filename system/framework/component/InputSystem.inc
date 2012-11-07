<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class InputSystem extends InputElement
{
    function ApplyRequestValues($formValue)
    {
        $this->value=Evaluator::get($this->default_value,array('obj'=>$this,'formValue'=>$formValue)) ;
        if(isset($this->register))
        {
            $this->registerValue();
        }
    }
}
