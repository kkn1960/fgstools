<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FormLink
{
    static function render($c,$nRow=null,$row=null)
    {
        global $newInstantEditWindow;
        if($row['unit_form']!=null)
        {
            if($newInstantEditWindow)
            {
                $fgsw='instant_edit_form_'.$row['unit_form'];
                $target='_instant_edit_window_form_'.$row['unit_form'];
            }
            else
            {
                $fgsw='instant_edit';
                $target='_instant_edit_window';
            }
            return "<a href=\"configurator.php?fgsw=$fgsw&fgsc=forms&fgsu=master&fgst=search&fgsinit=1&argument_form_sid={$row['unit_form']}&&operator_form_sid=equal\" target=\"$target\">{$row['unit_form']}</a>";
        }
        else
        {
            return '';
        }
    }
}
