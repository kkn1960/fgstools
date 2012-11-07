<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Attribute extends Unit
{
    public $component;
    function restoreState()
    {
        global $registry;
        $registry->restoreState($this,'controller',$this->sid);
        if($this->component!='dummy')
        {
            $this->form->replaceConfig($this->component);
        }
        $this->form->mode='update';
        $this->form->restoreState();
    }
    function processEvent($event,$args=null)
    {
        $type=$event['event'];
        if ($event['event']!='done')
        {
            parent::processEvent($event,$args);
        }
    }
}
