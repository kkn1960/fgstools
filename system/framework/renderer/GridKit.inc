<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class GridKit
{
    static function render($c,$nRow=null,$row=null)
    {
        global $registry,$listLoader,$db;
        if(!isset($c->renderer))
        {
            debug::write($c->field,'renderer not defined', null,1);
            return '';
        }
        else
        {
            $r=$c->renderer;
        }
        if($nRow!==null and isset($c->field) and $r!='selector' and $r!='RowAction')
        {
            if(isset($c->alias))
            {
                $v=$row[$c->alias];
            }
            else
            {
                $v=$row[$c->field];
            }
        }
        if(isset($c->list))
        {
            $o=array();
            $add='';
            if(isset($c->list['options']))
            {
                $options=$c->list['options'];
                $size=sizeof($options);
            }
            elseif(!isset($c->join_lookup) or !$c->join_lookup)
            {
                $options=$listLoader->get($c->list);
                $size=sizeof($options);
            }
        }
        if($r=='InputText' or $r=='OneMenu' )
        {
            $name=$c->inputName($nRow);
            if(sizeof($c->err)>0 and in_array($nRow,$c->err))
            {
                $errorClass='class="error-field"';
            }
            else
            {
                $errorClass='';
            }
        }
        switch ($r)
        {
            case 'text':
                $s=$v;
                if(isset($c->converter))
                {
                    $s=Converter::get($s,$c->converter,$row);
                }
                break;
            case 'date':
                $s=$db->localdate($v);
                break;
            case 'time':
                $s=$v;
                break;
            case 'datetime':
                $s=$db->localdatetime($v);
                break;
            case 'option':
                //return $options[$v]
                if(array_key_exists($v,$options))
                {
                    $s= $options[$v];
                }
                else
                {
                    $s='';
                }
                break;
            case 'lookup':
                return $row[$c->lookup];
                break;
            case 'RowAction':
                if(isset($c->condition))
                {
                    if(isset($c->condition['class']))
                    {
                        $display=Validator::test($c->condition,$row);
                    }
                    else
                    {
                        $display=ConditionTester::test($c->condition['statement'],$row);
                    }
                }
                else
                {
                    $display=true;
                }
                if($display)
                {
                    $s=  sprintf($c->view,$nRow,htmlspecialchars($row['primary_key_value']),$registry->fgsRef($c->unit,'grid')) ;
                }
                else
                {
                    $s= '';
                }
                break;
            case 'RowSetAction':
                if(isset($c->condition))
                {
                    if(isset($c->condition['class']))
                    {
                        $display=Validator::test($c->condition,$row);
                    }
                    else
                    {
                        $display=ConditionTester::test($c->condition['statement'],$row);
                    }
                }
                else
                {
                    $display=true;
                }
                if($display)
                {
                    $s= $c->view;
                }
                else
                {
                    $s='';
                }
                break;
            case 'set':
                $values=explode(',',str_replace("'",'',$v));
                $o=array();
                foreach($values as $key)
                {
                    if(array_key_exists($key,$options))
                    {
                        $o[]=$options[$key];
                    }
                }
                $s= implode(', ',$o);
                break;
            case 'selector':
                if(!isset($c->condition) or Evaluator::get($c->condition,$row))
                {
                    $s=  sprintf($c->view,$nRow,$row['primary_key_value']) ;
                }
                else
                {
                    $s= '&nbsp;';
                }
                break;
            case 'button':
                if(isset($c->condition))
                {
                    if(isset($c->condition['class']))
                    {
                        $display=Validator::test($c->condition,$row);
                    }
                    else
                    {
                        $display=ConditionTester::test($c->condition['statement'],$row);
                    }
                }
                else
                {
                    $display=true;
                }
                if($display)
                {
                    if(isset($c->confirm))
                    {
                         $onclick="onclick=\"fgsSetConfirmSubmitMsg('$c->confirm');\"";
                    }
                    else
                    {
                        $onclick='';
                    }
                    $value=htmlspecialchars($c->value);
                    $s=  "<input type=\"{$c->type}\"   name=\"{$c->name}\"  value=\"{$value}\" {$c->attributes} {$c->events} $onclick>";
                }
                else
                {
                    $s= '';
                }
                break;
            case 'InputText':
                $event=htmlspecialchars(sprintf($c->events,$nRow)) ;
                $s=  "<input type=\"text\" $errorClass name=\"$name\"  value=\"{$v}\" size=\"{$c->size}\" maxlength=\"{$c->maxlength}\" $event>";
                break;
            case 'OneMenu':
                $event=htmlspecialchars(sprintf($c->events,$nRow)) ;
                $o[]="<select $errorClass name=\"$name\"   $event>\n";
                $found=false;
                if(!isset($options))
                {
                    debug::write($c->sid,'no options',null,true);
                }
                foreach($options as $value=>$descripton)
                {
                    if($value==='' and ($v==='' or $v===null) )
                    {
                        $selected='selected';
                        $found=true;
                    }
                    if(!$found and $value==$v)
                    {
                        $selected='selected';
                        $found=true;
                    }
                    else
                    {
                        $selected='';
                    }
                    $o[]="<option value=\"{$value}\" {$selected}>{$descripton}</option>";
                }
                $o[]= '</select>';
                $s= implode("",$o);
                break;
            default :
                $s= call_user_func($r.'::render',$c,$nRow,$row);
                break;
        }
        return $s;
    }

}
