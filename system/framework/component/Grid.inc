<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Grid extends Component
{
    public $c;
    public $ra;
    public $rsa;
    public $b;

    public $nrows;
    public $total;
    public $query;
    public $set;

    public $err;
    public $editable;
    public $type='grid';
    
    // state proprties
    public $pagesize;
    public $direction;
    public $order;
    public $offset;
    public $hide;
    public $multimode_hide;
    public $display;
    public $apk;
    public $adk;
    public $foreign_key;
    
    function save($button)
    {
        global $db,$eventHandler;
        $this->err=array();
        $n=sizeof($this->apk);
        for($i=0;$i<$n;$i++)
        {
            $fv=array();
            $rowError=false;
            foreach($this->c as &$obj)
            {
                if($obj->component!="ColumnInputText" and $obj->component!="ColumnSelectOneMenu") continue;
                $name=$obj->inputName($i);
                $value=trim($_POST[$name]);
                if($obj->required and $value==='')
                {
                    $err_msg=Msg("row@@nn@@:").($i+1)." ".$obj->header." ".Msg("is_required") ;
                    $this->err[]=array('nrow'=>$i,'text'=>$err_msg);
                    $obj->err[]=$i;
                    continue;
                }
                if($db->IsText($obj->type))
                {
                    $value=$db->code($value,$obj->type) ;
                }
                $fv[$obj->field]=$value;
            }
            if(sizeof($fv)>0)
            {
                $pk=array();
                foreach($this->primary_key as $v)
                {
                    $pk[$v]=$this->apk[$i][$v] ;
                }
                $db->update($this->table,$fv,$pk);
            }
        }
        if(sizeof($this->err)==0)
        {
            $this->edit_message=Msg("data_saved@@!");
            if(isset($button->event))
            {
                $eventHandler->fire(array('event'=>$button->event,'unit'=>$this->unit,'trigger'=>'grid'));
            }
        }
        else
        {
            $this->edit_message=Msg("input_errors@@!");
        }
    }
    function __construct($unit,$sid,$hide)
    {
        parent::__construct($unit,$sid,$hide);
        require GRID_PATH.$this->sid.'.php';
        $this->initial=$grid[$sid]['initial'];
        $this->session=$grid[$sid]['session'];
        foreach($grid[$sid]['properties'] as $k=>$v)
        {
            $this->$k=$v;
        }
        if(isset($selector[$sid]))
        {
            $this->selector=new Column($unit,$sid,$selector[$sid]);
        }
        $this->editable=false;
        $this->c=array();
        foreach($column[$sid] as $a)
        {
            $this->c[$a['sid']]=new Column($unit,$sid,$a);
            if($a['component']=='ColumnInputText' or $a['component']=='ColumnSelectOneMenu' )
            {
                $this->editable=true;
                $this->c[$a['sid']]->err=array();
            }
        }
        $this->ra=array();
        foreach($ra[$sid] as $a)
        {
            $this->ra[$a['action']]=new RowAction($unit,$sid,$a);
        }
        $this->rsa=array();
        foreach($rsa[$sid] as $a)
        {
            $this->rsa[$a['action']]=new RowSetAction($unit,$sid,$a);
        }
        $this->b=array();
        foreach($button[$sid] as $a)
        {
            $this->b[$a['name']]=new InputButton($unit,$sid,$a);
        }
    }
    function initState($s)
    {
        $this->display=$s['display'];
        $this->hide=$s['hide'];
        $this->multimode_hide=$s['multimode_hide'];
        foreach($this->initial as $k=>$v)
        {
            $this->$k=$v;
        }
    }
    function saveState()
    {
        global $registry;
        parent::saveState();
    }
    function restoreState()
    {
        global $registry;
        parent::restoreState();
        if(isset($this->save) and isset($this->adk)  and sizeof($this->adk)==1 and isset($this->register))
        {
            foreach($this->register as $field=>$var)
            {
                if(isset($this->apk[0][$field]))
                {
                    $registry->setGlobal($var,$this->apk[0][$field]);
                }
                elseif(isset($this->adk[0][$field]))
                {
                    $registry->setGlobal($var,$this->adk[0][$field]);
                }
                else
                {
                    debug::write($field,"can't restore");
                }

            }
        }
    }
    function row($irow=0)
    {
        global $db,$eventHandler;
        $out=array();
        foreach($this->apk[$irow] as $pk=>$value)
        {
            $v=$db->code($value,'text');
            $out[]="t.$pk='$v'";
        }

        $where=implode(' and ',$out);
        $this->setQuery(false);
        $this->set=array();
        $q="select {$this->select} from {$this->from} where {$where} ";
        $this->nrows=$db->set($q,$this->set);
        $this->total=$this->nrows;
        if($this->nrows!=1)
        {
            $eventHandler->fire(array('event'=>'load_failure','unit'=>$this->unit,'trigger'=>'grid'));
            return false;
        }
        $this->saveKeyes(true);
        return true;
    }
    function page($saveKeyes=false,$rowPK=null)
    {
        global $db,$registry;
        $out=array();
        if($rowPK!=null)
        {
            $out[]=$rowPK;
        }
        $out_having=array();
        $filter=$registry->get($this->unit,'grid','filter');
        $search_filter=false;
        if(isset($filter))
        {
            if($filter=='empty')
            {
                $this->set=array();
                $this->nrows=0;
                $this->total=0;
                $this->saveKeyes();
                return;
            }
            elseif(is_array($filter))
            {
                if($filter['where']!='')
                {
                    $out[]=$filter['where'];
                }
                if($filter['having']!='')
                {
                    $out_having[]=$filter['having'];
                }
                $search_filter=true;
            }
        }
        $this->setQuery($search_filter);
        if(isset($this->foreign_key) and $this->foreign_key!='')
        {
            $out[]=$this->foreign_key;
        }
        $search=$registry->get($this->unit,'grid','search');
        if(isset($search) and is_array($search))
        {
            if($search['where']!='')
            {
                $out[]=$search['where'];
            }
            if($search['having']!='')
            {
                $out_having[]=$search['having'];
            }
        }
        if(sizeof($out)>0)
        {

            $where=' where '.implode(' and ',$out);
        }
        else
        {
            $where='';
        }
        if(sizeof($out_having)>0)
        {

            $having=' having '.implode(' and ',$out_having);
        }
        else
        {
            $having='';
        }
        if(isset($this->property["groupby"])  and $this->property["groupby"]!='')
        {
            $group='group by '.$groupby;
        }
        else
        {
            $group='';
        }
        $order=$this->getOrder();
        if($order!='')
        {
            $order="order by $order";
        }
        $db->page($this,$where,$order,$group,$having);
        $this->saveKeyes();
    }
    function saveKeyes($setGlobal=false)
    {
        global $registry,$listLoader,$db;
        $this->apk=array();
        if(isset($this->save))
        {
            $this->adk=array();
        }
        for($i=0;$i<$this->nrows;$i++)
        {
            foreach($this->primary_key as $v)
            {
                $this->apk[$i][$v] =$this->set[$i][$v];
            }
            if(isset($this->save))
            {
                foreach($this->save as $field)
                {
                    $this->adk[$i][$field] =$this->set[$i][$field];
                }
                if($setGlobal and isset($this->register))
                {
                    foreach($this->register as $field=>$var)
                    {
                        $registry->setGlobal($var,$this->set[$i][$field]);
                    }
                }
            }
            if(isset($this->set_lists))
            {
                foreach($this->set_lists as $cid=>$fn)
                {
                    if(!isset($this->c[$cid]->list_keys))
                    {
                        $this->c[$cid]->list_keys=array();
                    }
                    if($this->set[$i][$fn]!=null)
                    {
                        $this->c[$cid]->list_keys[]=$this->set[$i][$fn];
                    }
                }
            }
        }
        $registry->set($this->unit,'grid','apk',$this->apk);
        if(isset($this->save))
        {
            $registry->set($this->unit,'grid','adk',$this->adk);
        }
        if(isset($this->set_lists) and $this->nrows>0)
        {
            foreach($this->set_lists as $cid=>$fn)
            {
                if(sizeof( $this->c[$cid]->list_keys)>0)
                {
                    $out= array_unique ( $this->c[$cid]->list_keys);
                    if($this->c[$cid]->type=='set')
                    {
                        $set=implode(',',$out);
                        $out=explode(',',$set);
                        $out= array_unique ($out);
                        $v=implode(',',$out);
                    }
                    else
                    {
                        $v="'".implode("','",$out)."'";
                    }
                    $pk=$this->c[$cid]->list['primary_key'];
                    $this->c[$cid]->list['filter']="($pk in ($v))";
                    $this->c[$cid]->list['options']= $listLoader->get($this->c[$cid]->list);
                }
            }
            
        }
    }
    function subscribe()
    {
        global $requestHandler;
        $requestHandler->subscribe(array('obj'=>$this,'action'=>'go','unit'=>$this->unit,'trigger'=>'grid','method'=>'post','vars'=>array('offset','pagesize')));
        if($this->user_pagesize)
        {
            $requestHandler->subscribe(array('obj'=>$this,'action'=>'pagesize','unit'=>$this->unit,'trigger'=>'grid','method'=>'get'));
        }
        if($this->user_offset)
        {
            $requestHandler->subscribe(array('obj'=>$this,'action'=>'offset','unit'=>$this->unit,'trigger'=>'grid','method'=>'get'));
        }
        if(count($this->sort)>0 and $this->user_order)
        {
            $requestHandler->subscribe(array('obj'=>$this,'action'=>'order','unit'=>$this->unit,'trigger'=>'grid','method'=>'get','vars'=>'direction'));
        }
        foreach($this->ra as $action=>$obj)
        {
            $requestHandler->subscribe(array('obj'=>$this,'action'=>$action,'unit'=>$this->unit,'trigger'=>'grid','method'=>'get','vars'=>'key'));
        }
        foreach($this->rsa as $action=>$obj)
        {
            $requestHandler->subscribe(array('obj'=>$this,'action'=>$action,'unit'=>$this->unit,'trigger'=>'grid','method'=>'post','vars'=>$this->selector->field));
        }
        if(sizeof($this->b)==0) return;
        foreach($this->b as $field=>$obj)
        {
            $requestHandler->subscribe(array('obj'=>$this,'action'=>$obj->name,'unit'=>$this->unit,'trigger'=>'grid','method'=>'post'));
        }
    }
    function processRequest($args)
    {
        global $eventHandler;
        $action=$args['action'];
        switch($action)
        {
            case 'go':
                $this->setPagesize($args);
                $this->setOffset($args);
                break;
            case 'pagesize':
                $this->setPagesize($args);
                break;
            case 'offset':
                $this->setOffset($args);
                break;
            case 'order':
                $this->setOrder($args);
                break;
            default:
                if( isset($this->ra[$action]))
                {
                    $this->RowAction($args);
                }
                elseif(isset($this->rsa[$action]))
                {
                    $this->RowSetAction($args);
                }
                elseif(isset($this->b[$action]))
                {
                    if(method_exists($this->b[$action],action))
                    {
                        $this->$action($$this->b[$action]);
                    }
                    else
                    {
                        $eventHandler->fire(array('event'=>$action,'unit'=>$this->unit,'trigger'=>'grid'));
                    }
                }
                else
                {
                    print 'Request parameters:<br>';
                    print_r($args);
                    print '<br>';
                    die('Illegal request: for '.$this->SourceId);
                }
        }
    }
    function processEvent($event,$args=null)
    {
        $type=$event['event'];
        if($type=='detail')
        {
            $o=array();
            $this->afr=array();
            foreach($this->fkr as $fk=>$pk)
            {
                if(isset($args['key'][0][$pk]))
                {
                    $o[]="t.$fk='{$args['key'][0][$pk]}'";
                    $this->afr[$fk]= $args['key'][0][$pk];
                }
                elseif(isset($args['adk'][0][$pk]))
                {
                    $o[]="t.$fk='{$args['adk'][0][$pk]}'";
                    $this->afr[$fk]= $args['adk'][0][$pk];
                }
                else
                {
                    debug::write(Msg('not_found'),$pk,null,1);
                }

            }
            $this->foreign_key='('.implode(' and ',$o).')';
        }
        elseif($type=='search')
        {
            $this->offset=0;
            $this->total=null;
            $this->display=true;
        }
    }
    function isValidAction($args)
    {
        if(!isset($args['key'])) return false;
        $action=$args['action'];
        $i=$args[$action];
        if(isset($this->apk[$i]))
        {
            $out=array();
            foreach($this->apk[$i] as $v)
            {
                $out[]=$v;
            }
            if(implode('_',$out)!=$args['key'])
            {
                return false;
            }
        }
        else
        {
            return false;
        }
        if(isset($this->ra[$action]->condition))
        {
            if(isset($this->adk))
            {
                $row=array_merge($this->apk[$i],$this->adk[$i]);
            }
            else
            {
                $row=$this->apk[$i];
            }
            if(isset($this->ra[$action]->condition['class']))
            {
                $result=Validator::test($this->ra[$action]->condition,$row);
            }
            else
            {
                $result=ConditionTester::test($this->ra[$action]->condition['statement'],$row);
            }
            if(!$result)
            {
                return false;
            }
            
        }
        return true;
    }
    function RowAction($args)
    {
        global $eventHandler,$registry;
        if(!$this->isValidAction($args))
        {
            return;
        }
        $action=$args['action'];
        $apk=array();
        $apk[]=$this->apk[$args[$action]];
        if(isset($this->adk))
        {
            $adk=array();
            $adk[]=$this->adk[$args[$action]];
            if(isset($this->register))
            {
                foreach($this->register as $field=>$var)
                {
                    if(isset($adk[0][$field]))
                    {
                        $registry->setGlobal($var,$adk[0][$field]);
                    }
                    elseif(isset($apk[0][$field]))
                    {
                        $registry->setGlobal($var,$apk[0][$field]);
                    }
                    else
                    {
                        debug::write($field,'value not found',null,1);
                    }
                }
            }
        }
        if($this->ra[$action]->immediate and method_exists($this,$action))
        {
            $this->{$action}($apk,$adk);
            return;
        }
        if($this->ra[$action]->load and !$this->row($args[$action]))
        {
            return;
        }
        if(isset($this->adk[$args[$action]]) and isset($this->ra[$action]->field))
        {
            $eventHandler->fire(array('event'=>$action,'unit'=>$this->unit,'trigger'=>'grid'),array('immediate'=>$this->ra[$action]->immediate,'key'=>$apk,'adk'=>$adk,'field'=>$this->ra[$action]->field));
        }
        elseif(isset($this->adk[$args[$action]]))
        {
            $eventHandler->fire(array('event'=>$action,'unit'=>$this->unit,'trigger'=>'grid'),array('immediate'=>$this->ra[$action]->immediate,'key'=>$apk,'adk'=>$adk));
        }
        else
        {
            $eventHandler->fire(array('event'=>$action,'unit'=>$this->unit,'trigger'=>'grid'),array('immediate'=>$this->ra[$action]->immediate,'key'=>$apk));
        }
        if(!$this->ra[$action]->immediate)
        {
            $this->hide();
        }
    }
    function RowSetAction($args)
    {
        global $eventHandler;
        if(!$this->isValidRowSetAction($args))
        {
            return;
        }
        $action=$args['action'];
        $apk=array();
        $adk=array();
        foreach($args[$this->selector->field] as $k=>$code)
        {
            $apk[]=$this->apk[$k];
            if(isset($this->adk))
            {
                $adk[]=$this->adk[$k];
            }
        }
        if($this->rsa[$action]->immediate and method_exists($this,$action))
        {
            $this->{$action}($apk,$adk);
            return;
        }
        $this->display=!$this->multimode_hide;

        if(isset($this->adk))
        {
            $eventHandler->fire(array('event'=>$action,'unit'=>$this->unit,'trigger'=>'grid'),array('immediate'=>$this->rsa[$action]->immediate,'key'=>$apk,'adk'=>$adk));
        }
        else
        {
            $eventHandler->fire(array('event'=>$action,'unit'=>$this->unit,'trigger'=>'grid'),array('immediate'=>$this->rsa[$action]->immediate,'key'=>$apk));
        }
    }
    function isValidRowSetAction($args)
    {
        if(!isset($this->selector) or !isset($args[$this->selector->field]))
        {
            return false;
        }
        $action=$args['action'];
        foreach($args[$this->selector->field] as $k=>$code)
        {
            if(!array_key_exists($k,$this->apk))
            {
                return false;
            }
            $out=array();
            foreach($this->apk[$k] as $v)
            {
                $out[]=$v;
            }
            if(implode('_',$out)!=$code)
            {
                return false;
            }
            ///////////////////
            if(isset($this->rsa[$action]->condition))
            {
                if(isset($this->adk))
                {
                    $row=array_merge($this->apk[$k],$this->adk[$k]);
                }
                else
                {
                    $row=$this->apk[$k];
                }
                if(isset($this->rsa[$action]->condition['class']))
                {
                    $result=Validator::test($this->rsa[$action]->condition,$row);
                }
                else
                {
                    $result=ConditionTester::test($this->rsa[$action]->condition['statement'],$row);
                }
                if(!$result)
                {
                    return false;
                }
            }
        }
        return true;
    }
    function setQuery($search_filter)
    {
        global $db,$registry;
        $search_aliases=$registry->get($this->unit,'grid','search_aliases');
        $o=array();
        $from=$this->table." t ";
        foreach($this->joins as $a)
        {
            if($a['required'] or ($search_filter and is_array($search_aliases) and  in_array($a['right_alias'],$search_aliases)))
            {
                $o[]=$db->table_join($a);
            }
        }
        if(sizeof($o)>0)
        {
            $from.=implode(' ',$o);
        }
        $this->from=$from;
    }
    function setOffset($args)
    {
        if(ctype_digit($args['offset'])and $args['offset']>=0)
        {
            $this->offset=$args['offset'];
        }
    }
    function setPagesize($args)
    {
        if(ctype_digit($args['pagesize'])and $args['pagesize']>=0)
        {
            $this->pagesize=$args['pagesize'];
        }
    }
    function setOrder($args)
    {
        $order=$args['order'] ;
        if(array_key_exists($order,$this->sort))
        {
            $this->order=$order;

            if(isset($args['direction']) and (strtoupper(($args['direction']))=='ASC' or strtoupper(($args['direction']))=='DESC'))
            {
                $this->direction=$args['direction'];
            }
        }
    }
    function getOrder()
    {
        if(!isset($this->order))
        {
            return '';
        }
        if(!isset($this->direction))
        {
            $this->direction='ASC';
        }
        if(!isset($this->order) or $this->order==null)
        {
            return '';
        }
        $order=$this->sort[$this->order].' '.$this->direction;
        if(array_key_exists($this->order,$this->sort_prefix))
        {
            $order=$this->sort_prefix[$this->order].','. $order;
        }
        if(array_key_exists($this->order,$this->sort_suffix))
        {
            $order.=','.$this->sort_suffix[$this->order];
        }
        return  $order;
    }
}

