<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class AccessHandler
{
    static private $instance = NULL;
    static public function getInstance()
    {
        if(self::$instance === NULL)
        {
            self::$instance = new accessHandler();
        }
        return self::$instance;
    }
    private function __construct()
    {
    }
    function checkAccess($acl,$controller=null,$window=null)
    {
        global $registry,$default_page;
     //   return true;
        if($acl===null or !is_array($acl) or (sizeof($acl['roles'])==0 and sizeof($acl['users'])==0 ))
        {
            return true;
        }

        //if a user has not signed in then got to login page
        if(!$registry->checkLogin())
        {
            if($controller!=null and $window!=null)
            {
                GoToPage($default_page['login']."?return_controller=$controller&return_window=$window&fgsinit=1&return_url={$_SERVER['PHP_SELF']}");
            }
            else
            {
                GoToPage($default_page['login']."?return_url={$_SERVER['PHP_SELF']}");
            }
            exit;
        }
        if(array_key_exists('roles',$acl) and in_array($registry->getUserRole(),$acl['roles']))
        {
            return true;
        }
        elseif(array_key_exists('users',$acl) and in_array($registry->getUserId(),$acl['users']))
        {
            return true;
        }
        else
        {
            GoToPage($default_page['access_denied']);
            exit;
        }
    }
    function testAccess($acl)
    {
        global $registry,$default_page;
     //   return true;
        if($acl===null or !is_array($acl) or (sizeof($acl['roles'])==0 and sizeof($acl['users'])==0 ))
        {
            return true;
        }
        //if a user has not signed in
        if(!$registry->checkLogin())
        {
            return false;
        }
        if(array_key_exists('roles',$acl) and in_array($registry->getUserRole(),$acl['roles']))
        {
            return true;
        }
        elseif(array_key_exists('users',$acl) and in_array($registry->getUserId(),$acl['users']))
        {
            return true;
        }
        else
        {
             return false;
        }
    }
}
