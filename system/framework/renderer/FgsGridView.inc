<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FgsGridView
{
    public $grid;
    public $o;
    public $url;
    public $hidden;
    public $systemColumns;
    public $displayColumns;
    public $totalColumns;
    function __construct($grid)
    {
        global $registry;
        $this->grid=$grid;
        if(!isset($this->grid->width))
        {
            $this->grid->width='100%';
        }
        $this->url=$registry->fgsRef($this->grid->unit,'grid');
        $this->hidden=$registry->fgsHidden($this->grid->unit,'grid');
        $this->systemColumns=0;
        if(isset($this->grid->selector))
        {
            $this->systemColumns=1;
        }
        if(sizeof($this->grid->ra)>0)
        {
            $this->systemColumns++;
        }
        $this->displayColumns=0;
        foreach($this->grid->c as $obj)
        {
            if(!$obj->hidden)
            {
                $this->displayColumns++;
            }
        }
        $this->totalColumns=$this->displayColumns+$this->systemColumns;
    }
    function render()
    {
        global $db;
        $flag_calc=false;
        foreach($this->grid->c as &$obj)
        {
            if(isset($obj->calculate) and $obj->calculate==1)
            {
                $obj->total=0;
                $flag_calc=true;
            }
        }
        $this->o=array();
        $this->startContainer();
        $this->title();
        $this->NavigationUrl($this->grid->sid.'_top');
        if( sizeof($this->grid->b)>0 or isset($this->grid->selector))
        {
            $this->startForm($this->grid->sid);
        }
        $this->startGrid();

        if(!isset($this->grid->headerspan) or $this->grid->headerspan<2)
        {
            $this->TableHeader();
        }
        else
        {
            $this->MultipleRowHeader();
        }
        $this->outRows();
        if($flag_calc)
        {
            $this->outTotals();
        }
        $this->outRowSetActions();

        $this->gridButtons();
        $this->endGrid();
        if( sizeof($this->grid->b)>0 or isset($this->grid->selector))
        {
            $this->endForm($this->grid->sid);
        }
        $this->NavigationUrl($this->grid->sid.'_bottom');
        $this->endContainer();
        return implode('',$this->o);
    }
    function gridButtons()
    {
        if(!isset($this->grid->b)or sizeof($this->grid->b)==0) return ;
        $this->o[]="<tr bgcolor=\"#ffffff\"><td  colspan={$this->nc} align=left><span class=\"size90_1\">";
        $o=array();
        foreach($this->grid->b as $obj)
        {
            $o[]=GridKit::render($obj);
        }
        $this->o[]=implode('&nbsp;&nbsp;&nbsp;',$o);
        $this->o[]="</span></td></tr>";
    }
    function  outRows()
    {
        global $db,$registry;
        $controller=$registry->getController();
        $grid_id=$this->grid->sid.'_grid_';
        for($i=0;$i<$this->grid->nrows;$i++)
        {
            $o=array();
            foreach($this->grid->primary_key as $pk)
            {
                $o[]=$this->grid->set[$i][$pk];
            }
            $this->grid->set[$i]['primary_key_value']=implode('_',$o);
            $class=$i%2;
            if($i%2==0)
            {
                $class='odd';
            }
            else
            {
                $class='even';
            }
            $row_id=$grid_id.$i;
            $this->o[]="<tr class=$class id=\"$row_id\">";
            if(isset($this->grid->selector))
            {
                $tdClick="onclick=\"toggleRow('$i','$row_id','{$this->grid->selector->field}')\"";
                $s="<input onclick=\"toggleCheckbox('$i','$row_id','{$this->grid->selector->field}')\" type=checkbox name=\"{$this->grid->selector->field}[$i]\" id=\"id_{$this->grid->selector->field}_$i\" value=\"{$this->grid->set[$i]['primary_key_value']}\">";
                if($s=='')
                {
                    $s='&nbsp;';
                }
                $this->o[]='<td>';
                $this->o[]=$s;
                $this->o[]='</td>';

            }
            else
            {
                $tdClick='';
            }
            if(sizeof($this->grid->ra)>=1)
            {
                $this->o[]='<td>';
                foreach($this->grid->ra as $obj)
                {
                    $s=GridKit::render($obj,$i,$this->grid->set[$i]);
                    if($s!='')
                    {
                        $s.=' ';
                    }
                    $this->o[]=$s;
                }
                $this->o[]='</td>';
            }
            $iColumn=-1;
            foreach($this->grid->c as $obj)
            {
                $iColumn++;
                if($obj->hidden) continue;
                $s=GridKit::render($obj,$i,$this->grid->set[$i]);
                if($s=='')
                {
                    $s='&nbsp;';
                }
                elseif(isset($obj->calculate))
                {
                    $obj->total+=$s;
                }
                if(isset($obj->align))
                {
                    $align="align={$obj->align}";
                }
                elseif($db->IsNumber($obj->type))
                {
                    $align="align=right";
                }
                else
                {
                    $align="align=left" ;
                }
                if($obj->component!='ColumnLink')
                {
                    if(($obj->component=='ColumnInputText' or $obj->component=='ColumnSelectOneMenu') and $this->grid->inline_edit)
                    {
                        $this->o[]="<td $align class=\"inline_{$this->grid->unit}_$iColumn {$this->grid->set[$i]['primary_key_value']} $i\">$s</td>";
                        //$this->o[]="<td $align ondblclick=\"{$obj->onclick}(this,$iColumn,$i,{$this->grid->set[$i]['primary_key_value']},'$controller','{$this->grid->unit}','{$this->grid->type}')\">$s</td>";

                    }
                    else
                    {
                        $this->o[]="<td $align $tdClick>$s</td>";
                    }
                }
                
                else
                {
                    $this->o[]="<td $align>$s</td>";
                }
            }
            $this->o[]='</tr>';
        }
    }
    function outTotals()
    {

        $this->o[]='<tr class=grid_row>';
        for($i=0;$i<$this->systemColumns;$i++)
        {
            $this->o[]='<td>&nbsp;</td>';
        }
        foreach($this->grid->c as $field=>&$obj)
        {
            if($obj->hidden) continue;
            if(isset($obj->calculate) and $obj->calculate==1)
            {
                $s=$obj->total;
            }
            else
            {
                $s='&nbsp;';
            }
            $this->o[]="<td align=right>$s</td>";
        }
        $this->o[]='</tr>';
    }
    function outRowSetActions()
    {
        if(!isset($this->grid->selector) or sizeof($this->grid->rsa)==0 or $this->grid->nrows<1) return;
        $this->o[]="<tr bgcolor=\"#ffffff\"><td  colspan={$this->nc} align=left><span class=\"size90_1\">";
        $this->o[]=$this->checkUncheckAll();
        $this->o[]="<i>".Msg("with_selected").":</i>";
        foreach($this->grid->rsa as $obj)
        {
            $this->o[]=GridKit::render($obj);;
        }
        $this->o[]="</td></tr>";
    }
    function checkUncheckAll()
    {
       $initCheckBoxName="init_" .$this->grid->selector->field;
       $initCheckBoxId=$initCheckBoxName."_id";
       $msgCheck=Msg('check_all');
       $this->o[]="<img src=\"image/arrow_lt.png\" border=\"0\" width=\"38\" height=\"22\" /><a href=\"#\" onclick=\"setCheckboxes(true,'{$this->grid->selector->field}',{$this->grid->nrows},'$initCheckBoxId','{$this->grid->sid}_grid'); return false;\" href=\"\">$msgCheck</a>&nbsp;/&nbsp;";
       $msgCheck=Msg('uncheck_all');
       $this->o[]="<a href=\"#\" onclick=\"setCheckboxes(false,'{$this->grid->selector->field}',{$this->grid->nrows},'$initCheckBoxId','{$this->grid->sid}_grid'); return false;\" href=\"\">$msgCheck</a>&nbsp;/&nbsp;";

    }
    function  TableHeader()
    {
        global $FGSVersion,$FGSDebug,$registry;
        $desc=Msg('sort_descending');
        $asc =Msg('sort_ascending');
        $cur_order=$this->grid->order;
        $cur_dir=$this->grid->direction;
        $a=$this->url;
        $this->o[]='<tr>';
        if(isset($this->grid->selector))
        {
            $this->o[]='<td class="cols_header" width="16px">&nbsp;</td>';
        }
        if(sizeof($this->grid->ra)>=1)
        {
            $this->o[]="<td class=\"cols_header\">";
            $this->o[]= Msg("actions");
            $this->o[]='</td>';
        }
        $this->nc=$this->systemColumns;
        foreach($this->grid->c as &$obj)
        {
            if($obj->hidden) continue;
            $field=$obj->field;
            $this->nc++;
            $this->o[]='<td align=center class=cols_header>';
            if($FGSVersion=='development'  and 'programmer'==$registry->getUserRole())
            {
                $editLink=editAttributeLink($obj->rowid,'column',$obj->component,'column_rowid',$this->grid->system);
                $header="<div ondblclick=\"$editLink\" >".$obj->header.'</div>';
            }
            else
            {
                $header=$obj->header;
            }

            if(array_key_exists($obj->sid,$this->grid->sort) and  $this->grid->total>1 and $this->grid->user_order)
            {
                if($cur_order==$obj->sid and $cur_dir=='ASC')
                {
                    $this->o[]='<table align=center border="0"><tr><td>';
                    $this->o[]=$header;
                    $this->o[]='</td><td><a href="';
                    $this->o[]=$a;
                    $this->o[]='&amp;order=';
                    $this->o[]=$obj->sid;
                    $this->o[]='&amp;direction=DESC" title="';
                    $this->o[]=$desc;
                    $this->o[]='"><span class="order_desc"></span></a></td></tr></table></td>';
                }
                elseif ($cur_order==$obj->sid and $cur_dir=='DESC')
                {
                    $this->o[]='<table align=center border="0"><tr><td>';
                    $this->o[]=$header;
                    $this->o[]='</td><td><a href="';
                    $this->o[]=$a;
                    $this->o[]='&amp;order=';
                    $this->o[]=$obj->sid;
                    $this->o[]='&amp;direction=ASC" title="';
                    $this->o[]=$asc;
                    $this->o[]='"><span class="order_asc"></span></a></td></tr></table></td>';
                }
                else
                {
                    $this->o[]='<table align=center border="0"><tr><td rowspan=2>';
                    $this->o[]=$header;
                    $this->o[]='</td><td><a href="';
                    $this->o[]=$a;
                    $this->o[]='&amp;order=';
                    $this->o[]=$obj->sid;
                    $this->o[]='&amp;direction=ASC" title="';
                    $this->o[]=$asc;
                    $this->o[]='"><span class="order_asc"></span></a></td></tr><tr><td><a href="';
                    $this->o[]=$a;
                    $this->o[]='&amp;order=';
                    $this->o[]=$obj->sid;
                    $this->o[]='&amp;direction=DESC" title="';
                    $this->o[]=$desc;
                    $this->o[]='"><span class="order_desc"></span></a></td></tr></table></td>';
                }
            }
            else
            {
                $this->o[]=$header;
                $this->o[]='</td>';
            }
        }
        $this->o[]='</tr>';
    }
    function  MultipleRowHeader()
    {
        global $FGSVersion,$FGSDebug,$registry;
        $formula=array();
        $header_rows=$this->grid->headerspan;
        $start_row=array();
        $desc=Msg('sort_descending');
        $asc =Msg('sort_ascending');
        $cur_order=$this->grid->order;
        $cur_dir=$this->grid->direction;
        $a=$this->url;
        $this->nc=$this->systemColumns;
        foreach($this->grid->c as $field=>&$obj)
        {
            if($obj->hidden) continue;
            $this->nc++;
            $formula[$field]=array();

            if(isset($obj->span) and $obj->span!='')
            {
                $obj->span=str_replace("*","x",$obj->span);
                $formula[$field]=explode(',',$obj->span);
            }
            else
            {
                $formula[$field][0]=$header_rows."x1";
            }
            $no=sizeof($formula[$field]);
            for($j=0;$j<$no;$j++)
            {
                if($formula[$field][$j]!='0')
                {
                    $start_row[$field]=$j;
                    break;
                }
            }
            $column_header[$field]=array();
            if(isset($obj->header) and strpos($obj->header,",")>=1)
            {
                $buf=explode(',',$obj->header);
                $no=sizeof($buf);
                for($j=0;$j<$no;$j++)
                {
                    $column_header[$field][$j+$start_row[$field]]=$buf[$j];

                }
            }
        }
        $out=array();
        for($j=0;$j<$header_rows;$j++)
        {
            $this->o[]='<tr>';
            if(isset($this->grid->selector) and $j==0)
            {
                $this->o[]="<td rowspan=$header_rows class=cols_header></td>";
            }
            if(sizeof($this->grid->ra)>=1 and  $j==0)
            {
                $this->o[]="<td rowspan=$header_rows class=\"cols_header\">";
                $this->o[]= Msg("actions");
                $this->o[]='</td>';
            }
            foreach($this->grid->c as $field=>&$obj)
            {
                if(!isset($formula[$field][$j]) or $formula[$field][$j]=='0') continue;
                $cell_formula='';
                $cell_formula=explode('x',$formula[$field][$j]);
                $rs=$cell_formula[0];
                $cs=$cell_formula[1];
                if($rs>1)
                {
                    $rowspan="rowspan=$rs";
                }
                else
                {
                    $rowspan='';
                }
                if($cs>1)
                {
                    $colspan="colspan=$cs";
                }
                else
                {
                    $colspan='';
                }
                $this->o[]="<td $rowspan $colspan align=center class=cols_header>";
                if(isset($column_header[$field][$j]))
                {
                    $header =$column_header[$field][$j];
                }
                else
                {
                    $header=$obj->header;
                }

                if((($j==0 and  $formula[$field][0]==$header_rows."x1") or ($j==($header_rows-1))) and array_key_exists($obj->sid,$this->grid->sort) and $this->grid->total>1 and $this->grid->user_order)
                {
                    if($FGSVersion=='development'  and 'programmer'==$registry->getUserRole())
                    {
                        $editLink=editAttributeLink($obj->rowid,'column',$obj->component,'column_rowid',$this->grid->system);
                        $header="<div ondblclick=\"$editLink\" >".$header.'</div>';
                    }
                    if($cur_order==$obj->sid and $cur_dir=='ASC')
                    {
                        $this->o[]='<table align=center><tr><td>';
                        $this->o[]=$header;
                        $this->o[]='</td><td><a href="';
                        $this->o[]=$a;
                        $this->o[]='&amp;order=';
                        $this->o[]=$obj->sid;
                        $this->o[]='&amp;direction=DESC" title="';
                        $this->o[]=$desc;
                        $this->o[]='"><span class="order_desc"></span></a></td></tr></table></td>';
                    }
                    elseif ($cur_order==$obj->sid and $cur_dir=='DESC')
                    {
                        $this->o[]='<table align=center><tr><td>';
                        $this->o[]=$header;
                        $this->o[]='</td><td><a href="';
                        $this->o[]=$a;
                        $this->o[]='&amp;order=';
                        $this->o[]=$obj->sid;
                        $this->o[]='&amp;direction=ASC" title="';
                        $this->o[]=$asc;
                        $this->o[]='"><span class="order_asc"></span></a></td></tr></table></td>';
                    }
                    else
                    {
                        $this->o[]='<table align=center><tr><td rowspan=2>';
                        $this->o[]=$header;
                        $this->o[]='</td><td><a href="';
                        $this->o[]=$a;
                        $this->o[]='&amp;order=';
                        $this->o[]=$obj->sid;
                        $this->o[]='&amp;direction=ASC" title="';
                        $this->o[]=$asc;
                        $this->o[]='"><span class="order_asc"></span></a></td></tr><tr><td><a href="';
                        $this->o[]=$a;
                        $this->o[]='&amp;order=';
                        $this->o[]=$obj->sid;
                        $this->o[]='&amp;direction=DESC" title="';
                        $this->o[]=$desc;
                        $this->o[]='"><span class="order_desc"></span></a></td></tr></table></td>';
                    }
                }
                else
                {
                    $this->o[]=$header;
                    $this->o[]='</td>';
                }
            }
            $this->o[]='</tr>';
        }
    }
    function IsPageVisible($p_last,$p_current,$p_test)
    {
        // first and last pages must be visible
        if($p_test==1 or $p_test==$p_last)
        {
          return true;
        }
        // nearest 10 pages must be visible
        $begin=$p_current-2;

        if($begin<1)
        {
          $begin=1;
        }
        $end=$begin+5;
        if($end>$p_last)
        {
          $end=$p_last;
        }
        if($p_test>=$begin and $p_test<=$end)
        {
          return true;
        }
        // nearest 100 pages must be visible with step=10
        $begin=$p_current-20;
        if($begin<1)
        {
          $begin=1;
        }
        $end=$begin+50;

        if($end>$p_last)
        {
          $end=$p_last;
        }
        if($p_test>=$begin and $p_test<=$end)
        {

          if($p_test%10==0)
          {
            return true;
          }
          else
          {
            return false;
          }
        }
        // nearest 1000 pages must be visible with step=100
        $begin=$p_current-200;
        if($begin<1)
        {
          $begin=1;
        }
        $end=$begin+500;

        if($end>$p_last)
        {
          $end=$p_last;
        }
        if($p_test>=$begin and $p_test<=$end)
        {

          if($p_test%100==0)
          {
            return true;
          }
          else
          {
            return false;
          }
        }
        // nearest 10000 pages must be visible with step=1000
        $begin=$p_current-2000;
        if($begin<1)
        {
          $begin=1;
        }
        $end=$begin+5000;

        if($end>$p_last)
        {
          $end=$p_last;
        }
        if($p_test>=$begin and $p_test<=$end)
        {

          if($p_test%1000==0)
          {
            return true;
          }
          else
          {
            return false;
          }
        }
        return false;
    }

    function NavigationUrl($formName)
    {
        if($this->grid->total<1) return;

        $pages = $this->grid->total / $this->grid->pagesize;
        if ($pages < 1)
        {
          $pages = 1;
        }
        if ($pages / (int) $pages <> 1)
        {
          $pages = (int) $pages + 1;
        }
        else
        {
          $pages = $pages;
        }
        $btnValue=Msg('show_rows');
        $whatMsg=Msg('rows_start_with_row',true,false);
        if($pages<=1)
        {
            if($this->grid->total>1)
            {
                $this->o[]=$this->rowsQuantity() ;
                if($this->grid->user_pagesize or $this->grid->user_offset)
                {
                    $this->o[]='<div class="offset_bar">';
                    $this->startForm($formName);
                    $this->o[]=$this->hidden;
                    $this->o[]="<input type=\"submit\" value=\"$btnValue:\" name=\"go\">";
                    if($this->grid->user_pagesize)
                    {
                        $this->o[]="<input type=\"text\" size=\"3\" name=\"pagesize\" value=\"{$this->grid->pagesize}\">";
                    }
                    if($this->grid->user_offset)
                    {
                        $this->o[]="$whatMsg<input type=\"text\" size=\"3\" name=\"offset\" value=\"{$this->grid->offset}\">";
                    }
                    $this->endForm($formName);
                    $this->o[]="</div>";
                }
            }
            return;
        }
        $msg_records=Msg('records',true);
        $msg_pages=Msg('pages',true);
        $msg_page=Msg('page',true);
        $msg_next=Msg('next',true);
        $msg_previous=Msg('previous',true);
        $ref=$this->url.'&amp;offset=';
        if (($this->grid->offset > $this->grid->total) or (!is_numeric($this->grid->offset)))
        {
            $this->grid->offset = 0;
        }
        $this->o[]=$this->rowsQuantity() ;

        
        $pagenow = (int)($this->grid->offset/$this->grid->pagesize + 1);
        $this->o[]="<span class='size90_2'><i>".$msg_page." </i> <b> " . $pagenow ."</b><i> ". Msg("of",true,false)."</i><b> ". $pages."</b></span> ::<span class='pages'> ";
        $next = $this->grid->offset + $this->grid->pagesize;
        $previous = $this->grid->offset - $this->grid->pagesize;

        if ($pages <> 1)
        {
          if ($previous >= 0)
          {
            $this->o[]="<a href=$ref$previous title='$msg_previous ".$this->grid->pagesize . " $msg_records '><font size='-1'>&lt;&lt;&lt;</font></a>";
          }
        }
        $this->o[]=" ";
        $i = 0;
        while ($i < $pages)
        {
          $ri = $i + 1;
          $showpage = $i * $this->grid->pagesize;
          if ($ri == $pagenow)
          {
            $this->o[]=$ri." ";
          }
          else
          {
            if($this->IsPageVisible($pages,$pagenow,$ri))
            {
              $this->o[]="<a href=$ref$showpage>$ri</a> ";
            }
         }
         $i++;
        }

        if ($pages <> 1)
        {
          if ($next <= $this->grid->total)
          {
            $this->o[]="<a href='$ref$next' title='$msg_next " . $this->grid->pagesize . " $msg_records'><font size='-1'>&gt;&gt;&gt;</font></a>";
          }
        }
        $this->o[]='</span>';
        if($this->grid->total>$this->grid->pagesize and ($this->grid->user_pagesize or $this->grid->user_offset))
        {
            $this->o[]='<div class="offset_bar">';
            $this->startForm($formName);
            $this->o[]=$this->hidden;
            $this->o[]="<input type=\"submit\" value=\"$btnValue:\" name=\"go\">";
            if($this->grid->user_pagesize)
            {
                $this->o[]="<input type=\"text\" size=\"3\" name=\"pagesize\" value=\"{$this->grid->pagesize}\">";
            }
            if($this->grid->user_offset)
            {
                $this->o[]="$whatMsg<input type=\"text\" size=\"3\" name=\"offset\" value=\"{$this->grid->offset}\">";
            }
            $this->endForm();
            $this->o[]="</div>";
        }
    }
    function startGrid()
    {
        $this->o[]='<table class="table_data" align="center" bgcolor="#FFFFFF"  bordercolor="#FFFFFF" cellpadding="3" cellspacing="0" width="100%"><tbody>';
    }
    function endGrid()
    {
        $this->o[]='</tbody></table>';
    }
    function startForm($formName)
    {
        $this->o[]='<form name="';
        $this->o[]=$formName;
        $this->o[]='" onsubmit="';
        $this->o[]='return fgsConfirmSubmit();';
        $this->o[]='" action="';
        $this->o[]=$_SERVER['PHP_SELF'];
        $this->o[]='" method="POST">';
        $this->o[]=$this->hidden;
    }
    function endForm($formName=null)
    {
        $this->o[]='</form>';
    }
    function startContainer()
    {
        if($this->grid->display)
        {
            $display='';
        }
        else
        {
            $display=' none ';
        }
        $this->o[]= "<div id=\"{$this->grid->sid}_grid\" class=\"edit\" style=\"display : {$display} \">";
    }
    function endContainer()
    {
        $this->o[]='<br></div>';
    }
    function title()
    {
        global $FGSVersion,$FGSDebug,$registry;
        $s=Msg($this->grid->title);
        if($FGSVersion=='development'  and 'programmer'==$registry->getUserRole())
        {
            $editClick=editGridLink($this->grid->sid);
            $title="<span ondblclick=\"$editClick\">{$s}</span>";
        }
        else
        {
            $title=$s;
        }
        if($this->grid->modal)
        {
            $this->o[]="<div class=\"table_header\">$title</div>";
        }
        else
        {
            $onclick=$registry->fgsToggle($this->grid->unit,$this->grid->sid,'grid');
            $this->o[]="<div class=\"table_header\">$title<a href=\"#\" $onclick class=\"icon_invisible\" style=\"float:right;margin-right:10px;\"></a></div>";
        }
        if($this->grid->editable and isset($this->grid->edit_message))
        {
        
        }
    }
    function rowsQuantity()
    {
        $this->o[]='<span class="size90_2" align=left><i>';
        $this->o[]=Msg('total_records');
        $this->o[]=' -</i><b>';
        $this->o[]=$this->grid->total;
        $this->o[]='</b></span>';
    }
}
