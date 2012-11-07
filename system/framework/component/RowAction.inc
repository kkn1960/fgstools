<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class RowAction
{
    public $unit;
    public $grid;
    public $action;
    public $condition;
    public $args;
    function __construct($unit,$grid,$specs)
    {
        $this->unit=$unit;
        $this->grid=$grid;
        foreach($specs as $k=>$v)
        {
            $this->$k=$v;
        }
    }
}

