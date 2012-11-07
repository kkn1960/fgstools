<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class MessageExportView extends ExportView
{
    function __construct()
    {
        $this->headers=array('component','sid','detail','detail_sid','error');
    }
    function outErrors()
    {
        global $registry,$db;
        for($i=0;$i<$this->nErrors;$i++)
        {
            $class=$i%2;
            if($i%2==0)
            {
                $class='odd';
            }
            else
            {
                $class='even';
            }
            $this->o[]="<tr class=$class>";
            $this->o[]='<td width=150px class="export_error">';
            $this->o[]=$this->errors[$i]['debug_component'];
            $this->o[]='</td>';
            $this->o[]='<td width=200px>';
            $this->o[]=$this->errors[$i]['debug_sid'];
            $this->o[]='</td>';
            $this->o[]='<td>';
            $this->o[]=$this->errors[$i]['debug_value'];
            $this->o[]='</td>';
            $this->o[]='</tr>';
        }
    }
}
