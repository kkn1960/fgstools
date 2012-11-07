<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FieldListLink
{
    static function render($c,$nRow=null,$row=null)
    {
        global $newInstantEditWindow;
        if($row['field_list']!=null)
        {
            if($newInstantEditWindow)
            {
                $fgsw='instant_edit_list_'.$row['field_list'];
                $target='_instant_edit_window_list_'.$row['field_list'];
            }
            else
            {
                $fgsw='instant_edit';
                $target='_instant_edit_window';
            }
            return "<a href=\"configurator.php?fgsw=$fgsw&fgsc=lists&fgsu=master&fgst=search&fgsinit=1&argument_list_sid={$row['field_list']}&&operator_list_sid=equal\" target=\"$target\">{$row['field_list']}</a>";
        }
        else
        {
            return '';
        }
    }
}
