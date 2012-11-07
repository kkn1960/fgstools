<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Converter
{
    static function get($value,$converter,$params=null)
    {
        global $FGSDebug,$registry;
        if($converter['static'])
        {
            return call_user_func($converter['converter'].'::get',$value,$converter,$params);
        }
        else
        {
            $obj=call_user_func($converter['converter'].'::getInstance',$params);
            return call_user_func(array($obj,'get'),$value,$params);
        }
    }
}
