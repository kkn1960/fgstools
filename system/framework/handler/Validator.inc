<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Validator
{
    static function test($validator,$formValue)
    {
        global $FGSDebug,$registry;
        if($validator['static'])
        {
            return call_user_func($validator['class'].'::test',$validator['parameter'],$formValue);
        }
        else
        {
            $class= $validator['class'];
            $obj=$class($validator['parameter']);
            return call_user_func(array($obj,'test'),$formValue);
        }
    }
}
