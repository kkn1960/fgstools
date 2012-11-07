<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
abstract class ExportView
{
    public $o;
    public $errors;
    public $nErrors;
    public $headers;

    function render($title)
    {
        global $FGSDebug,$debugStore,$registry,$db;
        $this->errors=array();

        if($debugStore=='registry')
        {
            $n=sizeof($registry->exportErrors);
            $this->errors=$registry->exportErrors;
        }
        else
        {
            $q="select * from fgs_debug where  debug_type='export'  order by debug_rowid ASC";
            $n=$db->set($q,$this->errors);
        }
        $this->nErrors=sizeof($this->errors);
        $this->o=array();
        $this->startContainer();
        $this->title($title);
        if($this->nErrors==0)
        {
            $this->o[]='<br><br><center>';
            $this->o[]=Msg("export_successfully_done@@!");
            $this->o[]='</center><br><br>';
        }
        else
        {
            $this->startGrid();
            $this->TableHeader();
            $this->outErrors();
            $this->endGrid();
        }
        $this->endContainer();
        return implode('',$this->o);
    }
    function startContainer()
    {
        $this->o[]='<div  class="edit">';
    }
    function endContainer()
    {
        $this->o[]='</div>';
    }
    function title($title)
    {
        $this->o[]="<div class=\"export_header\">$title</div>";
    }
    function  startGrid()
    {
        $this->o[]='<table class="table_data" width="100%" cellspacing="0" cellpadding="3" bordercolor="#FFFFFF" bgcolor="#FFFFFF" align="center"><tbody>';
    }
    function  endGrid()
    {
        $this->o[]='</tbody></table>';
    }
    function TableHeader()
    {
        $this->o[]='<tr>';
        foreach($this->headers as $header)
        {
            $this->o[]='<td class="cols_header">';
            $this->o[]=Msg($header);
            $this->o[]='</td>';
        }
        $this->o[]='</tr>';
    }
    abstract function outErrors();
}
