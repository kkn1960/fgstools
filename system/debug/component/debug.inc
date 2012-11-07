<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class debug
{
    static function writeExport($component,$sid,$error,$detail=null,$detail_sid=null)
    {

        global $FGSDebug,$debugStore,$registry,$db;
        if(!$FGSDebug) return;
        if($debugStore=='registry')
        {
            $registry->exportErrors[]=array('debug_type'=>'export','debug_component'=>$component,'debug_sid'=>$sid,'debug_detail'=>$detail,'debug_detail_sid'=>$detail_sid,'debug_value'=>$error);
            return;
        }
        $fv=array();
        $fv['debug_type']='export';
        $fv['debug_component']=$component;
        $fv['debug_sid']=$sid;
        $fv['debug_detail']=$db->code($detail,'text');
        $fv['debug_detail_sid']=$detail_sid;
        $fv['debug_value']=$db->code($error,'text');
        $fv['debug_datetime']=date("Y-m-d H:i:s");
        $db->insert('fgs_debug',$fv);
    }
    static function writeClass($class,$path)
    {
        global $FGSDebug,$debugStore,$registry,$db;
        if(!$FGSDebug) return;

        if($debugStore=='registry')
        {
            $registry->class[]=array('debug_type'=>'class','debug_value'=>$class,'debug_path'=>$path);
            return;
        }
        else
        {
            $db=db();
        }
        $fv=array();
        $fv['debug_type']='class';
        $fv['debug_path']=$path;
        $fv['debug_value']=$class;
        $fv['debug_datetime']=date("Y-m-d H:i:s");
        $db->insert('fgs_debug',$fv);
    }
    static function write($value,$var,$point=null,$error=0)
    {
        global $FGSDebug,$debugStore,$registry,$db;
        if(!$FGSDebug) return;
        $fv=array();
        $fv['debug_type']='variable';
        $fv['debug_var']=$db->code($var,'text');
        $fv['debug_datetime']=date("Y-m-d H:i:s");
        $fv['debug_error']=$error;
        $out=array();
        if(is_array($value))
        {
            $json=false;
            foreach($value as $k=>$v)
            {
                if(is_array($v))
                {
                    $json=true;
                    break;
                }
            }
            if($json)
            {
                $out[]=str_replace(',',',<br>',json_encode($value));
            }
            else
            {
                foreach($value as $k=>$v)
                {
                    $out[]="$k=$v;<br>";
                }
            }
        }
        elseif(strlen($value)>200)
        {
            $out[]=str_replace(',',',<br>',$value);
        }
        else
        {
            $out[]=$value;
        }
        $buf=implode("\n",$out);
        if($debugStore=='registry')
        {
            $registry->vars[]=array('debug_type'=>'variable','debug_var'=>$var,'debug_value'=>$buf,'debug_point'=>$point,'debug_error'=>$error);
            return;
        }
        $fv['debug_value']=$db->code($buf,'text');
        if($point!=null)
        {
            $fv['debug_point']=$db->code($point,'text');
        }
        $db->insert('fgs_debug',$fv);
    }
    static function writeSql($q,$result,$type)
    {
    
        global $FGSDebug,$debugStore,$registry,$db;
        if(!$FGSDebug) return;
        if($debugStore=='registry')
        {
            $registry->sql[]=array('debug_type'=>$type,'debug_var'=>str_replace(',',', ',$q),'debug_value'=>$result);
            return;
        }
        $fv=array();
        $fv['debug_type']=$type;
        $fv['debug_var']=$db->code($q,'text');
        if(is_array($result))
        {
            $fv['debug_value']=$db->code(json_encode($result),'text');
        }
        else
        {
            $fv['debug_value']=$db->code($result,'text');
        }
        $fv['debug_datetime']=date("Y-m-d H:i:s");
        $db->insert('fgs_debug',$fv);
    }
    static function start()
    {
        global $FGSDebug,$debugStore,$debugClear,$registry,$db;
        if($debugStore=='registry') return;
        if($debugClear)
        {
            $q="truncate table fgs_debug";
            $db->execute($q);
        }
    }
    static function writeListeners($args,$type)
    {
        global $FGSDebug,$debugStore,$db,$registry;
        if(!$FGSDebug) return;
        $fld['trigger']='debug_trigger';
        $fld['sid']='debug_sid';
        $fld['unit']='debug_unit';
        $fld['method']='debug_method';
        $fld['action']='debug_trigger';
        $fld['event']='debug_event';
        $fld['action']='debug_action';
        $fld['arguments']='debug_arguments';
        $fld['listener_type']='debug_listener_type';
        $fv=array();
        $ofv=array();
        foreach($args as $k=>$v)
        {
            if(array_key_exists($k,$fld))
            {
                if($debugStore=='registry')
                {
                    $fv[$fld[$k]]=$v;
                }
                else
                {
                    $fv[$fld[$k]]=$db->code($v,'text');
                }

            }
        }
        $fv['debug_datetime']=date("Y-m-d H:i:s");
        $fv['debug_type']=$type;
        if($debugStore=='registry')
        {
            $o=array();
            foreach($fld as $k=>$v)
            {
                $o[$v]='';
            }
            $o=array_merge($o,$fv);
            $registry->requests[]=$o;
            return;
        }
        $db->insert('fgs_debug',$fv);
    }
    static function render()
    {
        global $FGSDebug,$debugStore,$registry,$db,$debugRenderer;
        if(!$FGSDebug) return;
        $obj=new $debugRenderer();
        return $obj->render();
    }
}
