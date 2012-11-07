<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class FormKit
{
    static function render($e)
    {
        global $listLoader;
        $r=$e->renderer;
        if($r=='text')
        {
            $v=htmlspecialchars($e->value);
        }
        elseif($r=='autocomplete')
        {
            $v=htmlspecialchars($e->lookup_value);
        }
        elseif($r=='date' or $r=='datetime' or $r=='time' )
        {
            $v=$e->code();
        }
        else
        {
            $v=$e->value;
        }
        if(isset($e->attributes))
        {
            $at=htmlspecialchars($e->attributes);
        }
        else
        {
            $at='';
        }
        if(isset($e->events))
        {
            $ev=htmlspecialchars($e->events);
        }
        else
        {
            $ev='';
        }
        if(isset($e->view))
        {
            return  sprintf($e->view,$v);
        }
        if(!isset($e->renderer))
        {
            debug::write($e->sid.'('.$e->component.')','renderer not defined');
        }
        if($r!='button' and sizeof($e->err)>0)
        {
            $errorClass='class="error-field"';
        }
        else
        {
            $errorClass='';
        }
        if(isset($e->list) and $r!='autocomplete')
        {   $o=array();
            $add='';
            if(isset($e->list['options']))
            {
                $options=$e->list['options'];
            }
            else
            {
                $options=$listLoader->get($e->list);
            }
            if(isset($e->null_option))
            {
                $options=$e->null_option+$options;
            }
            $size=sizeof($options);
        }
        if(isset($e->id))
        {
            $attributeId="id=\"{$e->id}\"";
        }
        else
        {
            $attributeId='';
        }
        switch ($r)
        {
            case 'autocomplete':
                $s="<input $attributeId $errorClass type=\"text\" name=\"{$e->name}\"  value=\"{$v}\" $at $ev>";
                break;
            case 'hidden':
                $s="<input $attributeId type=\"hidden\" name=\"{$e->name}\"  value=\"{$v}\" $at $ev>";
                break;
            case 'button':
                if(isset($e->confirm))
                {
                     $onclick="onclick=\"fgsSetConfirmSubmitMsg('$e->confirm');\"";
                }
                else
                {
                    $onclick='';
                }
                $s="<input type=\"{$e->type}\" name=\"{$e->name}\"  value=\"$v\" $at $ev $onclick>";
                break;
            case 'textarea':
                $s="<textarea  $attributeId $errorClass name=\"{$e->name}\" $at $ev>{$v}</textarea>";
                break;
            case 'time':
                $s="<input $attributeId $errorClass type=\"text\" name=\"{$e->name}\" value=\"{$v}\" size=8 maxlength=8 $at $ev>";;
                break;
            case 'date':
                $s="<input $attributeId $errorClass type=\"text\" name=\"{$e->name}\" value=\"{$v}\" size=10 maxlength=10 $at $ev>";
                break;
            case 'datetime':
                $s="<input $attributeId $errorClass type=\"text\" name=\"{$e->name}\" value=\"{$v}\" size=19 maxlength=19 $at $ev>";
                break;
            case 'secret':
                $s="<input $attributeId $errorClass type=\"password\" name=\"{$e->name}\"  value=\"\" $at $ev>";
                break;
            case 'file':
                $s="<input $attributeId $errorClass type=\"file\" name=\"{$e->name}\"  $at $ev>";
                break;
            case 'text':
                $s="<input $attributeId $errorClass type=\"text\" name=\"{$e->name}\"  value=\"{$v}\" $at $ev>";
                break;
            case 'checkbox':
                if($e->value)
                {
                    $checked="checked";
                }
                else
                {
                    $checked='unchecked';
                }
                $s= "<input $attributeId $errorClass type=\"checkbox\" name=\"{$e->name}\" value=\"1\" {$checked} $at $ev>";
                break;
            case 'OneMenu':
                $o[]="<select $attributeId $errorClass name=\"{$e->name}\" $at $ev>\n";
                $found=false;
                if(!isset($options))
                {
                    debug::write($e->name,'no options',null,true);
                }
                foreach($options as $value=>$descripton)
                {
                    if($value==='' and ($e->value==='' or $e->value===null) )
                    {
                        $selected='selected';
                        $found=true;
                    }
                    if(!$found and $value==$e->value)
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
                break;
            case 'radio':
                if($e->layout==0)
                {
                    $add='<br>';
                }
                foreach($options as $value=>$descripton)
                {
                    if( $value==$e->value)
                    {
                        $checked='checked';
                    }
                    else
                    {
                        $checked='';
                    }
                    $o[]="<input $errorClass type=\"radio\" name=\"{$e->name}\" value=\"{$value}\" {$checked} $at $ev>$descripton";
                }
                break;
            case 'OneListbox':
                if(isset($e->size) and $e->size<=sizeof($options))
                {
                
                    $size='size="'.$e->size.'"';
                }
                else
                {
                    $size='size="'.sizeof($options).'"';
                }
                $found=false;

                $o[]="<select $attributeId $errorClass name=\"{$e->name}\" $at $ev $size\>\n";
                foreach($options as $value=>$descripton)
                {
                    if($value==='' and ($e->value==='' or $e->value===null) )
                    {
                        $selected='selected';
                        $found=true;
                    }
                    if(!$found and $value==$e->value)
                    {
                        $selected='selected';
                        $found=true;
                    }
                    else
                    {
                        $selected='';
                    }
                    $o[]="<option value=\"{$value}\" {$selected}>$descripton</option>";
                }
                $o[]= '</select>';
                break;
            case 'ManyListbox':
                if(isset($e->size) and $e->size>=1 and $e->size<=sizeof($options))
                {
                    $size=$e->size;
                }
                else
                {
                    $size=sizeof($options);
                }
                $o[]="<select $attributeId $errorClass size=$size multiple name=\"{$e->name}[]\" $at $ev >\n";
                foreach($options as $value=>$descripton)
                {
                    if(in_array($value,$e->value))
                    {
                        $selected='selected';
                    }
                    else
                    {
                        $selected='';
                    }

                    $o[]= "<option value=\"{$value}\"  {$selected}>$descripton</option>";
                }
                $o[]= '</select>';
                break;
            case 'ManyMenu':
                $o[]="<select $attributeId $errorClass multiple name=\"{$e->name}[]\" $at $ev>\n";
                foreach($options as $value=>$descripton)
                {
                    if(in_array($value,$e->value))
                    {
                        $selected='selected';
                    }
                    else
                    {
                        $selected='';
                    }

                    $o[]= "<option value=\"{$value}\"  {$selected}>$descripton</option>";
                }
                $o[]= '</select>';
                break;
            case 'ManyCheckbox':
                $add='<br>';
                foreach($options as $value=>$descripton)
                {
                    if(in_array($value,$e->value))
                    {
                        $checked="checked";
                    }
                    else
                    {
                        $checked='unchecked';
                    }
                    $o[]="<input $errorClass type=\"checkbox\" name=\"{$e->name}[]\" value=\"{$value}\" {$checked} $at $ev>$descripton";
                }
                break;
            default:
                $s=call_user_func($r.'::render',$e);
                break;
        }
        if(isset($e->list) and $r!='autocomplete')
        {
            $s=implode($add,$o);
        }
        return $s;
    }
}
