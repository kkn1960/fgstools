<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class EventHandler
{
    static private $instance = NULL;
    public $listeners ;
    public $events ;
    private function __construct()
    {
        $this->listeners = array();
        $this->events = array();
    }
    static public function getInstance()
    {
        if(self::$instance == NULL)
        {
            self::$instance = new EventHandler();
        }
        return self::$instance;
    }
    public function subscribe($e)
    {
        global $FGSDebug;
        $this->listeners[] =$e;
        if($FGSDebug)
        {
            $o=array();
            $o['sid']=$e['obj']->sid ;
            if(isset($e['obj']->component))
            {
                $o['listener_type']=$e['obj']->component;
            }
            elseif(isset($e['obj']->type))
            {
                $o['listener_type']=$e['obj']->type;
            }
            foreach($e as $k=>$v)
            {
                if($k!='obj')
                {
                    $o[$k]=$v;
                }
            }
            debug::writeListeners($o,'register_event');
        }
    }
    public function fire($event,$args=null)
    {
        global $FGSDebug;
        $this->events[]=array('event'=>$event,'args'=>$args);
        if($FGSDebug)
        {
            $o=array();
            foreach($event as $k=>$v)
            {
                if($k!='obj')
                {
                    $o[$k]=$v;
                }
            }
            if($args!=null)
            {
                $o['arguments']=json_encode($args);
            }
            debug::writeListeners($o,'fire_event');
        }
    }
    function dispatch()
    {
        global $FGSDebug;
        
        if(sizeof($this->events)==0) return;

        $i = 0;
        do{
            $e=$this->events[$i];
            foreach($this->listeners as &$l)
            {
                $result=true;
                foreach($e['event'] as $k=>$v)
                {
                    if($k!='obj' and (!array_key_exists($k,$l) or $v!=$l[$k]))
                    {
                        $result=false;
                        break;
                    }
                }
                if($result)
                {
                    if($FGSDebug )
                    {
                        $o=array();
                        $o['sid']=$l['obj']->sid ;
                        if(isset($l['obj']->component))
                        {
                            $o['listener_type']=$l['obj']->component;
                        }
                        elseif(isset($l['obj']->type))
                        {
                            $o['listener_type']=$l['obj']->type;
                        }
                        foreach($e['event'] as $k=>$v)
                        {
                            if($k!='obj')
                            {
                                $o[$k]=$v;
                            }
                        }
                        if($e['args']!=null)
                        {
                            $o['arguments']=json_encode($e['args']);
                        }

                        debug::writeListeners($o,'process_event');
                        
                    }
                    $l['obj']->processEvent($e['event'],$e['args']);
                }
            }
            $i++;
        } while ($i<sizeof($this->events));
    }
}

