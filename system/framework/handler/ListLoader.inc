<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class ListLoader
{
    private static $instance = null;
    private $lists;
    public $sid;
    public $type;
    private function __construct()
    {
        $this->lists = array();
        $this->sid = 'FgsListLoader';
        $this->type = 'ListLoader';
    }
    static public function getInstance()
    {
        if(self::$instance == NULL)
        {
            self::$instance = new ListLoader();
        }
        return self::$instance;
    }
    public function get($params)
    {
        $this->load($params);
        return $this->lists[$params['sid']]['options'];
    }
    private function load($params)
    {
        global $db;
        $sid=$params['sid'];
        if(!isset($this->lists[$sid]))
        {
            $this->lists[$sid]=array('load'=>false,'table'=>$params['table'],'query'=>'','options'=>array());
        }
        if(isset($params['class']))
        {
            // list options are loading by special class
            $this->lists[$sid]['options']=call_user_func($params['class'].'::load',$params);
        }
        else
        {
            $select=Evaluator::get($params['select']) ;
            $from=Evaluator::get($params['from']) ;
            if(isset($params['order']))
            {
                $order=Evaluator::get($params['order']) ;
            }
            else
            {
                $order='';
            }
            if($order!='')
            {
                $order=' order by '.$order;
            }
            $o=array();
            if(isset($params['where']))
            {
                $v=Evaluator::get($params['where']) ;
                if($v!='')
                {
                    $o[]=$v;
                }
            }
            if(isset($params['filter']))
            {
                $v=Evaluator::get($params['filter']) ;
                if($v!='')
                {
                    $o[]=$v;
                }
            }
            if(isset($params['lookup_filter']))
            {
                $o[]=$params['lookup_filter'];
            }
            if(isset($params['dataset_filter']))
            {
                $v=Evaluator::get($params['dataset_filter']) ;
                if($v!='')
                {
                    $o[]=$v;
                }
            }
            $having="";
            if(isset($params['predicates']))
            {
                $v=PredicateBuilder::getFilter($params['predicates']);

                if($v=='empty' or $v['where']=='empty')
                {
                   $this->lists[$sid]['options']=array();
                   $this->lists[$sid]['query']='empty';
                   $this->lists[$sid]['load']=true;
                   return;
                }
                elseif(is_array($v))
                {
                    if($v['where']!='')
                    {
                        $o[]=$v['where'];
                    }
                    if($v['having']!='')
                    {
                        $having="having {$v['having']}";
                    }
                }
            }
            if(sizeof($o)>0)
            {
                $where=implode(' and ',$o);
                $q="select $select from $from where $where  $having $order";
            }
            else
            {
                $q="select $select from $from   $order";
            }
            if(!$this->lists[$sid]['load'] or $this->lists[$sid]['query']!=$q)
            {
                $n=$db->set($q,$this->lists[$sid]['options'],'id','name');
                $this->lists[$sid]['query']=$q;
            }
        }
        $this->lists[$sid]['load']=true;
    }
    private function getQuery($params)
    {
    }
    public function drop($params)
    {
        if(isset($this->lists[$params['sid']]))
        {
            $this->lists[$params['sid']]['load']=false;
        }
    }
    function processEvent($event,$args=null)
    {
        $event=$event['event'];
        $action =$args['action'];
        if($event=='done' and ($action=='insert' or $action=='update' or $action=='delete'))
        {

            foreach($this->lists as $sid=>$params)
            {
                if($params['table']==$args['table'])
                {
                    $this->lists[$sid]['load']=false;
                }
            }
        }
    }
}

