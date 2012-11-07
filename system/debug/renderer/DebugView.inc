<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class DebugView
{
    public $o;
    function render()
    {
        global $FGSDebug,$debugStore,$registry,$db,$timer;
        $this->o=array();
        $this->startContainer();
        $this->title('debug_info');
        $this->o[]='<br><br>';
        $info=array();
        if($debugStore=='registry')
        {
            $n=sizeof($registry->sql);
            $info=$registry->sql;
        }
        else
        {
            $q="select * from fgs_debug where debug_type like 'sql%' order by debug_rowid ASC";
            $n=$db->set($q,$info);
        }
        if($n>0)
        {
            $this->outSql($n,$info);
            $this->o[]='<br><br>';
        }
        $info=array();
        if($debugStore=='registry')
        {
            $n=sizeof($registry->vars);
            $info=$registry->vars;
        }
        else
        {
            $q="select * from fgs_debug where debug_type='variable' order by debug_rowid ASC";
            $n=$db->set($q,$info);
        }
        if($n>0)
        {
            $this->outVariables($n,$info);
            $this->o[]='<br><br>';
        }

        $info=array();
        if($debugStore=='registry')
        {
            $n=sizeof($registry->requests);
            $info=$registry->requests;
        }
        else
        {
            $q="select * from fgs_debug where debug_type!='variable' and debug_type!='class' and debug_type not like 'sql%' order by debug_rowid ASC";
            $n=$db->set($q,$info);
        }
        if($n>0)
        {
            $this->outRequests($n,$info);
            $this->o[]='<br><br>';
        }
        $info=array();
        if($debugStore=='registry')
        {
            $n=sizeof($registry->class);
            $info=$registry->class;
        }
        else
        {
            $q="select * from fgs_debug where  debug_type='class'  order by debug_rowid ASC";
            $n=$db->set($q,$info);
        }
        if($n>0)
        {
            $this->outClasses($n,$info);
            $this->o[]='<br><br>';
        }
        $this->o[]=$timer->render();
        $this->endContainer();
        return implode('',$this->o);
    }
    function startContainer()
    {
        $this->o[]='<div  class="edit">';
    }
    function endContainer()
    {
        $this->o[]='</div>';
    }
    function outVariables($n,$info)
    {
        $this->title('variables');
        $this->startGrid();
        $this->TableHeader(array('variable','value','debug_point'));
        $max=0;
        for($i=0;$i<$n;$i++)
        {
            if($info[$i]['debug_point']!='' and $info[$i]['debug_point']!=null and strlen($info[$i]['debug_point'])>$max)
            {
                 $max=strlen($info[$i]['debug_point']) ;
            }
        }
        if($max>0)
        {
            $width="width=200px";
        }
        else
        {
            $width='';
        }
        for($i=0;$i<$n;$i++)
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
            if($info[$i]['debug_error'])
            {
                $class='sql_error';
            }
            $this->o[]="<tr class=$class>";

            $this->o[]='<td align=left width=200px>';
            $this->o[]=$info[$i]['debug_var'];
            $this->o[]='</td>';
            $this->o[]='<td align=left >';
            $this->o[]=$info[$i]['debug_value'];
            $this->o[]='</td>';
            $this->o[]="<td>";
            $this->o[]=$info[$i]['debug_point'];
            $this->o[]='</td>';
            $this->o[]='</tr>';
        }
        $this->endGrid();
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
    function outSql($n,$info)
    {
        $this->title('sql_queries');
        $this->startGrid();
        $this->TableHeader(array('type','result','query'));
        for($i=0;$i<$n;$i++)
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
            if($info[$i]['debug_type']=='sql error')
            {
                $class='sql_error';
            }
            $this->o[]="<tr class=$class>";
            $this->o[]='<td width=150px>';
            $this->o[]=$info[$i]['debug_type'];
            $this->o[]='</td>';
            $this->o[]='<td align=left  width=100px>';
            $this->o[]=$info[$i]['debug_value'];
            $this->o[]='</td>';
            $this->o[]='<td align=left>';
            if(strlen($info[$i]['debug_var'])>80)
            {
                $this->o[]=str_replace(",t."," ,t.",str_replace("','","', '",$info[$i]['debug_var']));
            }
            else
            {
                $this->o[]=$info[$i]['debug_var'];
            }
            $this->o[]='</td>';
            $this->o[]='</tr>';
        }
        $this->endGrid();
    }
    function outRequests($n,$info)
    {
        $this->title('requests_and_events');
        $this->startGrid();
        $this->TableHeader(array('type','request_event','listener_sid','listener_type','unit','trigger','method','arguments'));
        for($i=0;$i<$n;$i++)
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
            $this->o[]='<td>';
            $this->o[]=Msg($info[$i]['debug_type']);
            $this->o[]='</td>';
            
            $this->o[]='<td align=left >';
            $this->o[]=$info[$i]['debug_action'] .$info[$i]['debug_event'];
            $this->o[]='</td>';
            
            $this->o[]='<td align=left >';
            $this->o[]=$info[$i]['debug_sid'];
            $this->o[]='</td>';
            
            
            $this->o[]='<td>';
           $this->o[]=$info[$i]['debug_listener_type'];
            $this->o[]='</td>';
            
            $this->o[]='<td align=left >';
            $this->o[]=$info[$i]['debug_unit'];
            $this->o[]='</td>';
            $this->o[]='<td align=left >';
            $this->o[]=$info[$i]['debug_trigger'];
            $this->o[]='</td>';
            
            
            
            $this->o[]='<td>';
            $this->o[]=$info[$i]['debug_method'];
            $this->o[]='</td>';
            $this->o[]='<td align=left >';
            $this->o[]=str_replace(',',',<br>',$info[$i]['debug_arguments']);
            $this->o[]='</td>';
            $this->o[]='</tr>';
        }
        $this->endGrid();
    }
    function outClasses($n,$info)
    {
        $this->title('class_initialization');
        $this->startGrid();
        $this->TableHeader(array('path','class',' '));
        for($i=0;$i<$n;$i++)
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
            $this->o[]='<td width=300px>';
            $this->o[]=$info[$i]['debug_path'];
            $this->o[]='</td>';
            $this->o[]='<td align=left width=200px>';
            $this->o[]=$info[$i]['debug_value'];
            $this->o[]='</td>';
             $this->o[]='<td width=70%>';
            $this->o[]=' ';
            $this->o[]='</td>';
            $this->o[]='</tr>';
        }
        $this->endGrid();
    }

}


