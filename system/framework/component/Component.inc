<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
abstract class Component
{
    public $unit;
    public $sid;
    public $type;
    public $session;
    public $initial;
    public $errors;
    public $table;
    public $display;
    public $hide;
    function __construct($unit,$sid,$hide)
    {
        $this->unit=$unit;
        $this->sid=$sid;
        $this->hide=$hide;
        $this->errors=array();
    }
    function saveState()
    {
        global $registry;
        $registry->saveState($this,$this->type,$this->unit);
    }
    function restoreState()
    {
        global $registry;
        $registry->restoreState($this,$this->type,$this->unit);
    }
    function hide()
    {
        $this->display=!$this->hide;
    }
}
