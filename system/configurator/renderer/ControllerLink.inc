<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class ControllerLink
{
    static function render($c,$nRow=null,$row=null)
    {
        return "<a href=\"{$row['controller_script']}?fgsinit=1&fgsw=application&fgsc={$row['controller_sid']}\" target=\"_debug_application\">{$row['controller_sid']}</a>";
    }
}
