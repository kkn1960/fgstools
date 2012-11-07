<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Evaluator
{
    static function get($s,$params=null)
    {
        global $FGSDebug,$registry;
        if($s==null or $s=='') return $s;
        $value=null;
        if($s[0]=="#")
        {
            $expr=substr($s,1);
            $value=eval($expr);
        }
        elseif($s[0]=="@")
        {
            $func=trim(substr($s,1));
            if(function_exists($func))
            {
                if($params!=null)
                {
                    $value=$func($params);
                }
                else
                {
                    $value=$func();
                }
            }
            else
            {
                $value=call_user_func(trim(substr($s,1)).'::get',$params);
            }
        }
        elseif($s[0]=="&")
        {
            $array=substr($s,1,3);
            $var=trim(substr($s,4));
            switch ($array)
            {
                case "ses" :
                    if(isset($_SESSION[$var]))
                    {
                        $value=$_SESSION[$var];
                    }
                    elseif($FGSDebug)
                    {
                        debug::write('_SESSION variable not defined',$var,null,1);
                    }
                    break;
                case "glb" :
                    if(isset($GLOBALS[$var]))
                    {
                        $value=$GLOBALS[$var] ;
                    }
                    elseif($FGSDebug)
                    {
                        debug::write('GLOBALS variable not defined',$var,null,1);
                    }
                    break;
                case "srv" :
                    if(isset($_SERVER[$var]))
                    {
                        $value=$_SERVER[$var] ;
                    }
                    elseif($FGSDebug)
                    {
                        debug::write('_SERVER variable not defined',$var,null,1);
                    }
                    break;
                case "env" :
                    if(isset($_ENV[$var]))
                    {
                        $value=$_ENV[$var] ;
                    }
                    elseif($FGSDebug)
                    {
                        debug::write('_ENV variable not defined',$var,null,1);
                    }
                    break;
                case "req" :
                    if(isset($_REQUEST[$var]))
                    {
                        $value=$_REQUEST[$var] ;
                    }
                    elseif($FGSDebug)
                    {
                        debug::write('_REQUEST variable not defined',$var,null,1);
                    }
                    break;
                case "coo" :
                    if(isset($_COOKIE[$var]))
                    {
                        $value=$_COOKIE[$var] ;
                    }
                    elseif($FGSDebug)
                    {
                        debug::write('_COOKIE variable not defined',$var,null,1);
                    }
                    break;
                case "rgv" :
                    $value=$registry->getGlobal($var);
                    break;
                case "arg" :
                    $value=$params[$var];
                    break;
                case "usr" :
                    $value=$registry->getUserField($var);
                    break;
                default:
                
                    if($FGSDebug and 'programmer'==$registry->getUserRole())
                    {
                        die("incorrect variable[$var]");
                    }
                    else
                    {
                        debug::write('incorrect variable',$var,null,1);
                    }
                    break;
            }
        }
        else
        {
            $value=$s;
        }
        return $value;
    }
}
