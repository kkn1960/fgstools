<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FgsAddGridView extends FgsGridView
{
   function render()
    {
        global $db;
        $flag_calc=false;
        foreach($this->grid->c as &$obj)
        {
            if(isset($obj->calculate))
            {
                $obj->total=0;
                $flag_calc=true;
            }
        }
        $this->o=array();
        $this->startContainer();
        if($this->grid->total>0)
        {
            $this->title();
            $this->startGrid();
            $this->NavigationUrl($this->grid->sid.'_top');
            if(!isset($this->grid->headerspan) or $this->grid->headerspan<2)
            {
                $this->TableHeader();
            }
            else
            {
                $this->MultipleRowHeader();
            }
            if( sizeof($this->grid->b)>0 or isset($this->grid->selector))
            {
                $this->startForm($this->grid->sid);
            }
            $this->outRows();
            $this->outRowSetActions();
            if( sizeof($this->grid->b)>0 or isset($this->grid->selector))
            {
                $this->endForm();
            }
            $this->NavigationUrl($this->grid->sid.'_bottom');
            $this->gridButtons();
            $this->endGrid();
        }
        else
        {
            $this->o[]="<br><center>All possible details have been added already !</center><br>";
        }
        $this->endContainer();
        return implode('',$this->o);
    }
}
