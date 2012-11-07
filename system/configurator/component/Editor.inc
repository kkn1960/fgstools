<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Editor extends Crud
{
    public $unit;
    public $mode;
    public $acl;
    public $views;
    public $type='controller';
    public $component;
    public $form_system;

    function restoreState()
    {
        global $registry;
        parent::restoreState();
        if($this->component!='dummy')
        {
            $this->unit->form->replaceConfig($this->component);
        }
        $this->unit->form->mode='update';
        $this->unit->form->restoreState();
        $this->form_system=$_SESSION[FGS_SESSION_KEY][$registry->window][FGS_CONTROLLER_KEY]['form_system'];
        $registry->setGlobal('system',$this->form_system);
    }
    function saveState()
    {
        global $registry;
        parent::saveState();
        $_SESSION[FGS_SESSION_KEY][$registry->window][FGS_CONTROLLER_KEY]['controller']=$this->sid;
        $_SESSION[FGS_SESSION_KEY][$registry->window][FGS_CONTROLLER_KEY]['end']=true;
        $_SESSION[FGS_SESSION_KEY][$registry->window][FGS_CONTROLLER_KEY]['form_system']=$this->form_system;
    }
    function renderJavaScript()
    {
        parent::renderJavaScript();
        $js=js();
        return $js->render();
    }
    function subscribe()
    {
        global $eventHandler,$requestHandler;
        $this->unit->form->subscribe();
        $requestHandler->subscribe(array('obj'=>$this,'action'=>'cancel','unit'=>'crud','trigger'=>'form','method'=>$this->unit->form->method));
        $eventHandler->subscribe(array('obj'=>$this,'event'=>'done','unit'=>'crud','trigger'=>'form'));
        $requestHandler->subscribe(array('obj'=>$this,'action'=>'update','unit'=>'crud','trigger'=>'controller','method'=>'get','vars'=>array('field','component','system')));
    }
    function processRequest($args)
    {
        global $registry,$db;
        $action=$args['action'];
        if($action=='update')
        {
            $fn=$args['field'];
            $rowid=$args['update'];
            $sid=$args['component'];
            $apk[0]=array($fn=>$rowid);
            $this->component=$sid;
            $this->unit->form->replaceConfig($sid);
            $result= $this->unit->form->row($apk[0]);
            $this->unit->form->initState();
            $this->unit->form->display=true;
            $this->unit->form->irow=0;
            $this->unit->form->apk=$apk;
            $registry->setGlobal('system',$args['system']);
            $this->form_system=$args['system'];
        }
        elseif($action=='cancel')
        {
             $this->unit->form->display=false;
        }
        else
        {
            parent::processRequest($args);
        }

    }
    function processEvent($event,$args=null)
    {
        $type=$event['event'];
        if ($event['event']=='done')
        {
            $this->unit->form->display=false;
        }
        else
        {
            parent::processEvent($event,$args);
        }
    }
}
