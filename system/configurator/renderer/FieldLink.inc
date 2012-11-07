<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FieldLink
{
    static function render($c,$nRow=null,$row=null)
    {
        global $newInstantEditWindow;
        if($row['field_name']!=null)
        {

            if($newInstantEditWindow)
            {
                $fgsw='instant_edit_field_'.$row['field_name'];
                $target='_instant_edit_window_field_'.$row['field_name'];
            }
            else
            {
                $fgsw='instant_edit';
                $target='_instant_edit_window';
            }
            return "<a href=\"configurator.php?fgsw=$fgsw&fgsc=fieldsSpecification&fgsu=crud&fgst=search&fgsinit=1&argument_field_table={$row['field_table']}&&operator_field_table=equal&argument_field_name={$row['field_name']}&&operator_field_name=equal\" target=\"$target\">{$row['field_name']}</a>";
        }
        else
        {
            return '';
        }
    }
}
