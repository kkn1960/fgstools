<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class ControllerExportView extends ExportView
{
    function __construct()
    {
        $this->headers=array('component','sid','error');
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
            $sid=$this->errors[$i]['debug_sid'];
            $this->o[]="<tr class=$class>";
            $this->o[]='<td width=150px class="export_error">';
            $this->o[]=$this->errors[$i]['debug_component'];
            $this->o[]='</td>';
            $this->o[]='<td width=200px>';
            $this->o[]= "<a href=\"configurator.php?fgsw=instant_edit&fgsc=controllers&fgsu=master&fgst=search&fgsinit=1&argument_controller_sid=$sid&&operator_controller_sid=equal\" target=\"_instant_edit_window\">$sid</a>";

            $this->o[]='</td>';
            $this->o[]='<td>';
            $this->o[]=$this->errors[$i]['debug_value'];
            $this->o[]='</td>';
            $this->o[]='</tr>';
        }
    }
}
