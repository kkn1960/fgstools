<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class SearchLink
{
    static function render($c,$nRow=null,$row=null)
    {
        global $newInstantEditWindow;
        if($row['unit_search']!=null)
        {
            if($newInstantEditWindow)
            {
                $fgsw='instant_edit_search_'.$row['unit_search'];
                $target='_instant_edit_window_search_'.$row['unit_search'];
            }
            else
            {
                $fgsw='instant_edit';
                $target='_instant_edit_window';
            }
            return "<a href=\"configurator.php?fgsw=$fgsw&fgsc=searchs&fgsu=master&fgst=search&fgsinit=1&argument_form_sid={$row['unit_search']}&&operator_form_sid=equal\" target=\"$target\">{$row['unit_search']}</a>";
        }
        else
        {
            return '';
        }
    }
}
