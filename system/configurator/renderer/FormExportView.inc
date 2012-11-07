<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FormExportView extends ExportView
{
    function __construct()
    {
        $this->headers=array('component','sid','detail','detail_sid','error');
    }
    function outErrors()
    {
        global $registry,$db;
        $q="select form_sid,form_system from fgs_form";
        $aSys=array();
        $n=$db->set($q,$aSys,'form_sid','form_system');
        $aElem=array();
        $q="select element_rowid,element_component from fgs_element";
        $n=$db->set($q,$aElem,'element_rowid','element_component');
        
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
            $this->o[]= "<a href=\"configurator.php?fgsw=instant_edit&fgsc=forms&fgsu=master&fgst=search&fgsinit=1&argument_form_sid=$sid&&operator_form_sid=equal\" target=\"_instant_edit_window\">$sid</a>";
            $this->o[]='</td>';
            $this->o[]='<td width=150px>';
            $this->o[]=$this->errors[$i]['debug_detail'];
            $this->o[]='</td>';
            $this->o[]='<td width=200px>';
            if($this->errors[$i]['debug_detail']=='element')
            {
                $rowid=$this->errors[$i]['debug_detail_sid'];
                $component=$aElem[$rowid];
                $system=$aSys[$sid];
                $this->o[]= "<a href=\"editor.php?fgsw=instant_edit&fgsc=editor&fgsu=crud&fgsinit=1&fgst=controller&update=$rowid&component=$component&field=element_rowid&system=$system\" target=\"_instant_edit_window\">$rowid</a>";
            }
            else
            {
                $this->o[]=$this->errors[$i]['debug_detail_sid'];
            }
            $this->o[]='</td>';
            $this->o[]='<td>';
            $this->o[]=$this->errors[$i]['debug_value'];
            $this->o[]='</td>';
            $this->o[]='</tr>';
        }
    }
}
