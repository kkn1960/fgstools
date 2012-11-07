<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class GridLink
{
    static function render($c,$nRow=null,$row=null)
    {
        global $newInstantEditWindow;
        if($row['unit_grid']!=null)
        {
            if($newInstantEditWindow)
            {
                $fgsw='instant_edit_grid_'.$row['unit_grid'];
                $target='_instant_edit_window_grid_'.$row['unit_grid'];
            }
            else
            {
                $fgsw='instant_edit';
                $target='_instant_edit_window';
            }
            return "<a href=\"configurator.php?fgsw=$fgsw&fgsc=grids&fgsu=master&fgst=search&fgsinit=1&argument_grid_sid={$row['unit_grid']}&&operator_grid_sid=equal\" target=\"$target\">{$row['unit_grid']}</a>";
        }
        else
        {
            return '';
        }
    }
}
