<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class RequestHandler
{
    public $listeners ;
    static private $instance = NULL;
    private function __construct()
    {
        $this->listeners = array();
    }
    static public function getInstance()
    {
        if(self::$instance == NULL)
        {
            self::$instance = new RequestHandler();
        }
        return self::$instance;
    }
    public function subscribe($r)
    {
        global $FGSDebug;
        $this->listeners[] = $r;
        if($FGSDebug)
        {
            $o=array();
            $o['sid']=$r['obj']->sid ;
            if(isset($r['obj']->component))
            {
                 $o['listener_type']=$r['obj']->component;
            }
            elseif(isset($r['obj']->type))
            {
                 $o['listener_type']=$r['obj']->type;
            }
            foreach($r as $k=>$v)
            {
                if($k!='obj')
                {
                    $o[$k]=$v;
                }
            }
            debug::writeListeners($o,'register_request');
        }
    }
    function dispatch()
    {
        global $FGSDebug;
        if($FGSDebug)
        {
            debug::write($_GET,'GET variables');
            debug::write($_POST,'POST variables');
        }
        foreach($this->listeners as $r)
        {
            $a=$r['action'];
            if($r['method']=='post')
            {
                $s=&$_POST;
            }
            elseif($r['method']=='get')
            {
                $s=&$_GET;
            }
            else
            {
                continue;
            }
            if(!isset($s[$a]) or !isset($s['fgst']) or !isset($s['fgsu']) or $s['fgst']!=$r['trigger'] or $s['fgsu']!=$r['unit'])
            {
                continue;
            }
            if(isset($r['vars']))
            {
                $vars=$r['vars'];
            }
            else
            {
                $vars=null;
            }
            $params=array();
            $params['action']=$a;
            $params['trigger']=$r['trigger'];
            $params['unit']=$r['unit'];
            $params[$a]=$s[$a];
            if($vars!==null )
            {
                if(!is_array($vars))
                {
                    if(isset($s[$vars]))
                    {

                        $params[$vars]=$s[$vars];
                    }
                }
                else
                {
                    foreach($vars as $var)
                    {
                        if(isset($s[$var]))
                        {
                            $params[$var]=$s[$var];
                        }
                   }
               }
            }
            if($FGSDebug)
            {
                $o=array();
                $o['sid']=$r['obj']->sid;
                if(isset($r['obj']->component))
                {
                     $o['listener_type']=$r['obj']->component;
                }
                elseif(isset($r['obj']->type))
                {
                     $o['listener_type']=$r['obj']->type;
                }
                $o['action']=$params['action'];
                $o['trigger']=$params['trigger'];
                $o['unit']=$params['unit'];
                $o['arguments']=json_encode($s);
                debug::writeListeners($o,'process_request');
            }
            $r['obj']->processRequest($params);
        }
    }
}

