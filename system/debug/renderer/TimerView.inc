<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class TimerView
{
    public $o;
    function render()
    {
        global $FGSDebug,$debugStore,$registry,$db,$timer,$fgs_sql_connection_time;
        $n=sizeof($timer->m);
        $total=$timer->m[$n-1]['start']-$timer->m[0]['start']+$fgs_sql_connection_time;
        $this->o=array();
        $this->title('execution_time_statistics');
        $this->startGrid();
        $this->TableHeader(array('action','time@@(@@sec@@)','percentage@@(@@%@@)',' '));
        for($i=1;$i<$n;$i++)
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
            $this->o[]='<td width=150px>';
            $this->o[]=Msg($timer->m[$i]['point']);
            $this->o[]='</td>';
            $this->o[]='<td align=right width=150px>';
            $this->o[]=$timer->m[$i]['interval'];
            $this->o[]='</td>';
            $this->o[]='<td align=right width=100px>';
            $this->o[]=round(100*$timer->m[$i]['interval']/$total,2);
            $this->o[]='</td>';
            $this->o[]='<td align=right width=800px>';
            $this->o[]='';
            $this->o[]='</td>';
            $this->o[]='</tr>';
        }

        $this->o[]='<tr>';
        $this->o[]='<td align=left><strong>';
        $this->o[]=Msg('total');
        $this->o[]='</strong></td>';
        $this->o[]='<td align=right>';
        $this->o[]=$total;
        $this->o[]='</td><td align=right>100</td>';
        $this->o[]='</tr>';
        $this->o[]="<tr>";
        $this->o[]='<td align=left><strong>';
        $this->o[]=Msg('sql_queries');
        $this->o[]='</strong></td>';
        $this->o[]='<td align=right>';
        $this->o[]=$timer->sql+$fgs_sql_connection_time;
        $this->o[]='</td>';
        $this->o[]='<td align=right width=100px>';
        $this->o[]=round(100*($timer->sql+$fgs_sql_connection_time)/$total,2);
        $this->o[]='</td>';
        $this->o[]='<td align=right width=800px>';
        $this->o[]='';
        $this->o[]='</td>';
        $this->o[]='</tr>';
        $this->endGrid();
        return implode('',$this->o);
    }
    function TableHeader($a)
    {
        $this->o[]='<tr>';
        foreach($a as $header)
        {
            $this->o[]='<td class="cols_header">';
            $this->o[]=Msg($header);
            $this->o[]='</td>';
        }
        $this->o[]='</tr>';
    }
    function title($title)
    {
        $this->o[]='<div class="debug_header">';
        $this->o[]=Msg($title);
        $this->o[]='</div>';
    }
    function  startGrid()
    {
        $this->o[]='<table class="table_data" width="100%" cellspacing="0" cellpadding="3" bordercolor="#FFFFFF" bgcolor="#FFFFFF" align="center"><tbody>';
    }
    function  endGrid()
    {
        $this->o[]='</tbody></table>';
    }
}


