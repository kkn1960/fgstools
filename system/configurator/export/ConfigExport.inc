<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
abstract class ConfigExport
{
    public $title;
    public $type;
    function __construct()
    {
    }
    function render()
    {
        global $export_renderer;
        $renderer=$export_renderer[$this->type];
        $obj=new $renderer();
        return $obj->render($this->title);
    }
}
