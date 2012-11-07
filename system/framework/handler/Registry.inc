<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Registry
{
    static private $instance = NULL;
    public $controller;
    public $window;
    public $store;
    public $globals;
    public $vars;
    public $requests;
    public $sql;
    public $class;
    public $exportErrors;
    static public function getInstance()
    {
        if(self::$instance === NULL)
        {
            self::$instance = new Registry();
        }
        return self::$instance;
    }
    private function __construct()
    {
        $this->store=array();
        
        $this->globals=array();
        
        $this->vars=array();
        $this->requests=array();
        $this->sql=array();
        $this->class=array();
        $this->exportErrors=array();
    }
    function setGlobal($var,$value)
    {
        $this->globals[$var]=$value;
    }
    function getGlobal($var)
    {
        if(isset($this->globals[$var]))
        {

            return $this->globals[$var];
        }
        else
        {
            debug::write('registry global variable not found',$var,null,1);
            return null;
        }
    }
    function checkLogin()
    {
        if(isset($_SESSION[FGS_SESSION_KEY]['session_user'][FGS_CONTROLLER_KEY]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function setUser($a)
    {
        $_SESSION[FGS_SESSION_KEY]['session_user'][FGS_CONTROLLER_KEY]=$a;
    }
    function getUserField($field)
    {
        if(isset($_SESSION[FGS_SESSION_KEY]['session_user'][FGS_CONTROLLER_KEY][$field]))
        {
            return $_SESSION[FGS_SESSION_KEY]['session_user'][FGS_CONTROLLER_KEY][$field];
        }
        else
        {
            return null;
        }
    }
    function getUser()
    {
        if(isset($_SESSION[FGS_SESSION_KEY]['session_user'][FGS_CONTROLLER_KEY]))
        {
            return $_SESSION[FGS_SESSION_KEY]['session_user'][FGS_CONTROLLER_KEY];
        }
        else
        {
            return null;
        }
    }
    function getUserRole()
    {
        if(isset($_SESSION[FGS_SESSION_KEY]['session_user'][FGS_CONTROLLER_KEY]))
        {
            return $_SESSION[FGS_SESSION_KEY]['session_user'][FGS_CONTROLLER_KEY]['user_role'];
        }
        else
        {
            return null;
        }
    }
    function getUserId()
    {
        if(isset($_SESSION[FGS_SESSION_KEY]['session_user'][FGS_CONTROLLER_KEY]))
        {
            return $_SESSION[FGS_SESSION_KEY]['session_user'][FGS_CONTROLLER_KEY]['user_id'];
        }
        else
        {
            return null;
        }
    }
    function setController($controller=null)
    {
        if($controller!=null)
        {
            $this->controller=$controller;
        }
        elseif(isset($_REQUEST["fgsc"]))
        {
            $this->controller=$_REQUEST["fgsc"];
        }
        elseif(isset($_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]))
        {
            $this->controller=$_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]['controller'];
        }
        else
        {
            $this->controller=0;
        }
        return $this->controller;
    }
    function getController()
    {
        return $this->controller;
    }
    function newController()
    {
        if(isset($_GET['fgsinit']))
        {
            // there is GET varable fgsinit
            unset($_SESSION[FGS_SESSION_KEY][$this->window]);
            $_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]['controller']=$this->controller;
            $_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]['end']=false;
            return true;
        }
        elseif(!isset($_SESSION[FGS_SESSION_KEY][$this->window]))
        {
            // window did not exist
            $_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]['controller']=$this->controller;
            $_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]['end']=false;
            return true;
        }
        elseif(isset($_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]['controller']) and $_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]['controller']==$this->controller and $_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]['end']==true)
        {
            // window existed & controller exsisted & state was saved in previous cycle
            $_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]['controller']=$this->controller;
            $_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]['end']=false;
            return false;
        }
        else
        {
            // window existed & controller did not exist
            unset($_SESSION[FGS_SESSION_KEY][$this->window]);
            $_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]['controller']=$this->controller;
            $_SESSION[FGS_SESSION_KEY][$this->window][FGS_CONTROLLER_KEY]['end']=false;
            return true;
        }
    }
    function getWindow()
    {
        return $this->window;
    }
    function setWindow($window=null)
    {
        if($window!=null)
        {
            $this->window=$window;
        }
        elseif(isset($_REQUEST["fgsw"]))
        {
            $this->window=$_REQUEST["fgsw"];
        }
        else
        {
            $this->window='main';
        }
        return $this->window;
    }
    function set($unit,$sid,$variable,$value)
    {
        $this->store[$unit][$sid][$variable]=$value;
    }
    function get($unit,$sid,$variable)
    {
        if(isset($this->store[$unit][$sid][$variable]))
        {
            return $this->store[$unit][$sid][$variable];
        }
        else
        {
            return null;
        }
    }
    public function seek($variable)
    {
        foreach($this->store as $unit=>$aUnit)
        {
            foreach($aUnit as $sid=>$aSid)
            {
                foreach($aSid as $var=>$value)
                {
                    if($var==$variable)
                    {
                        return $value;
                    }
                }
            }
        }
        return null;
    }
    function saveState($obj,$component,$unit=null)
    {
    
        if(!isset($obj->session) or  !is_array($obj->session))
        {
            return;
        }
        foreach($obj->session as $variable)
        {
            if(isset($obj->$variable) and null!==$obj->$variable)
            {
                if($unit==null)
                {
                    $_SESSION[FGS_SESSION_KEY][$this->window][$component][$variable]=$obj->$variable;
                }
                else
                {
                    $_SESSION[FGS_SESSION_KEY][$this->window][$unit][$component][$variable]=$obj->$variable;
                }
            }
        }

        
    }
    function restoreState(&$obj,$component,$unit=null)
    {
        if(!isset($obj->session) or  !is_array($obj->session))
        {
            return;
        }
        foreach($obj->session as $variable)
        {
            if($unit==null and isset($_SESSION[FGS_SESSION_KEY][$this->window][$component][$variable]))
            {
                $obj->$variable=$_SESSION[FGS_SESSION_KEY][$this->window][$component][$variable];
            }
            elseif($unit!=null and isset($_SESSION[FGS_SESSION_KEY][$this->window][$unit][$component][$variable]))
            {
                $obj->$variable=$_SESSION[FGS_SESSION_KEY][$this->window][$unit][$component][$variable];
            }
        }
    }
    function fgsHidden($unit,$component)
    {
        return "<input type=\"hidden\" name=\"fgsw\" value=\"{$this->window}\"><input type=\"hidden\" name=\"fgsc\" value=\"{$this->controller}\"><input type=\"hidden\" name=\"fgsu\" value=\"$unit\"><input type=\"hidden\" name=\"fgst\" value=\"$component\">";
    }
    function fgsRef($unit,$component)
    {
        return $_SERVER['PHP_SELF']."?fgsw={$this->window}&fgsc={$this->controller}&fgsu=$unit&fgst=$component";
    }
    function fgsToggle($unit,$sid,$component)
    {
        return "onclick=\"toggleFGS('{$this->window}','{$this->controller}','$unit','$sid','$component')\"";
    }
    function fgsUrl()
    {
        return $_SERVER['PHP_SELF']."?fgsw={$this->window}&fgsc={$this->controller}";
    }

}

