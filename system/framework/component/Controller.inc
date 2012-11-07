<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
abstract class Controller
{
    public $template;
    function run($menuStr=null)
    {
        global  $accessHandler,$timer,$requestHandler, $eventHandler,$registry,$FGSDebug ;
        
        //checking access
        $controller=$registry->getController();
        $window=$registry->getWindow();
        if(isset($this->acl) and sizeof($this->acl)>0)
        {
            $accessHandler->checkAccess($this->acl,$controller,$window);
        }
        
        //registering requests&&events
        $this->subscribe();
        
        $timer->mark('requests_events_registered');
        //dispatching a request
        $requestHandler->dispatch();
        
        //dispatching  events
        $eventHandler->dispatch();
        
        $timer->mark('requests_events_executed');
        
        //loading data for rendering
        $this->loadData();
        
        $timer->mark('data_loaded');
        
        //saving components's state
        $this->saveState();
        
        //page rendering
        require "template/{$this->template}";
    }
}
