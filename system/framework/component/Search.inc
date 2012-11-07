<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Search  extends Component
{
    public $display;
    public $hide;
    
    public $p;
    public $b;

    
    public $formValue;
    public $type='search';
    public $aliases;
    function __construct($unit,$sid,$hide)
    {
        parent::__construct($unit,$sid,$hide);
        require SEARCH_PATH.$this->sid.'.php';
        $this->session=$search[$sid]['session'];
        $this->initial=$search[$sid]['initial'];
        foreach($search[$sid]['properties'] as $k=>$v)
        {
            $this->$k=$v;
        }
        $this->b=array();
        foreach($button[$sid] as $a)
        {
            $this->b[$a['name']]=new InputButton($unit,$this->type,$a);
        }
        foreach($p[$sid] as $pid=>$a)
        {
            $this->p[$pid]=new $a['class']($unit,$this->type,$a);
        }
    }
    function initState($s)
    {
        $this->display=$s['display'];
        $this->hide=$s['hide'];
        foreach($this->initial as $k=>$v)
        {
            $this->$k=$v;
        }
        foreach($this->p as $sid=>$obj)
        {
            $this->p[$sid]->init();
        }
        $this->setRegistry();
    }
    function saveState()
    {
        parent::saveState();
        foreach($this->p as $sid=>$obj)
        {
            $this->p[$sid]->saveState();
        }
    }
    function restoreState()
    {
        parent::restoreState();
        foreach($this->p as $sid=>$obj)
        {
            $this->p[$sid]->restoreState();
        }
        $this->setRegistry();
    }
    function setRegistry()
    {
        global $db,$registry;
        $this->aliases=array();
        //get search condition for where clause
        $where=$this->formFilter(false);
        //get search condition for having clause
        $having=$this->formFilter(true);
        $registry->set($this->unit,'grid','search',array('where'=>$where,'having'=>$having));
        $registry->set($this->unit,'grid','search_aliases',$this->aliases);
    }
    function formFilter($having)
    {
        global $db,$registry;
        $aFilter=array();
        $aSet=array();
        $fieldset='';
        foreach($this->p as $obj)
        {
            if((!isset($obj->sqlfunction) and $having) or (isset($obj->sqlfunction) and (($having and  !$db->IsAggregateFunction($obj->sqlfunction)) or (!$having and  $db->IsAggregateFunction($obj->sqlfunction)))))
            {
                continue;
            }
            if(isset($obj->custom))
            {
                $predicate=call_user_func($obj->custom.'::getPredicate',$obj,$this);
            }
            else
            {
                $predicate=$obj->getPredicate();
            }
            if($predicate=='')
            {
                continue;
            }
            else
            {
                $this->aliases=array_merge ($this->aliases,$obj->aliases);
            }
            if($fieldset!=$obj->fieldset)
            {
                //fieldset changed
                if($fieldset!='' and sizeof($aSet)>0)
                {
                    //previous predicate was last member of a fieldset
                    // we have to join all members of the previous fieldset
                    $aFilter[]= $this->getFieldsetPredicate($aSet);
                    //prepare for a new fieldset
                    $aSet=array();
                }
                $fieldset=$obj->fieldset;
            }
            if($obj->fieldset=='')
            {
                // current predicate is not member of a fieldset
                $aFilter[]=array('predicate'=>$predicate,'connector'=>$obj->connector->value);
            }
            else
            {
                // current predicate is a member of a fieldset
                $aSet[]=array('predicate'=>$predicate,'connector'=>$obj->connector->value);
            }
        }
        if(sizeof($aSet)>0)
        {
            $aFilter[]= $this->getFieldsetPredicate($aSet);
        }
        $n=sizeof($aFilter);
        if($n==0)
        {
            $search='';
        }
        elseif($n==1)
        {
            $search=$aFilter[0]['predicate'];
        }
        else
        {
            $search='('.$aFilter[0]['predicate'];
            for($i=1;$i<$n;$i++)
            {
                $search.=' '.$aFilter[$i]['connector'].' '.$aFilter[$i]['predicate'];
            }
            $search.=')';
        }
        return $search;
    }
    function getFieldsetPredicate($aSet)
    {
        $n=sizeof($aSet);
        if($n==1)
        {
            return $aSet[0];
        }
        else
        {
            $connector=$aSet[0]['connector'];
            $s='('.$aSet[0]['predicate'];
            for($i=1;$i<$n;$i++)
            {
                $s.=' '.$aSet[$i]['connector'].' '.$aSet[$i]['predicate'];
            }
            $s.=')';
            return array('predicate'=>$s,'connector'=>$connector) ;
        }
    }
    function setFilter()
    {
        global $eventHandler;
        $this->ApplyRequestValues();
        $this->validate();
        if(!$this->validInput()) return;
        $this->setRegistry();
        $eventHandler->fire(array('event'=>$this->events['set_filter'],'unit'=>$this->unit,'trigger'=>'search'));
        $this->hide();
    }
    function subscribe()
    {
        global $requestHandler;
        foreach($this->b as $obj)
        {
            $requestHandler->subscribe(array('obj'=>$this,'action'=>$obj->name,'unit'=>$this->unit,'trigger'=>'search','method'=>$this->method));
        }
    }
    function processRequest($args)
    {
        $action=$args['action'];
        switch($action)
        {
            case 'cancel':
                $this->hide();
                break;
            case 'set_filter':
                $this->setFilter();
                break;
            case 'drop_filter':
                $this->dropFilter();
                $this->hide();
                break;
            case 'cancel':
                break;
            default:
                print 'Request parameters:<br>';
                print_r($args);
                print '<br>';
                die('Illegal request: for '.$this->sid);
        }
    }
    function validInput()
    {
        foreach($this->p as &$obj)
        {
            if(!$obj->validInput())
            {
                return false;
            }
        }
        return true;
    }
    function ApplyRequestValues()
    {
        global $db;
        foreach($this->p as &$obj)
        {
            $obj->ApplyRequestValue($this->method);
            if(isset($obj->argument))
            {
                if($db->IsTime($obj->type))
                {
                    $this->formValue[$obj->field]=$db->code($obj->argument->value,$obj->type);
                }
                else
                {
                    $this->formValue[$obj->field]=$obj->argument->value;
                }
            }
        }
        $this->formValue['xxx_sid']=$this->sid;
        //do filtering  only of entered data
        foreach($this->p as &$obj)
        {
            if(isset($obj->argument))
            {
                $obj->argument->filter($this->formValue);
            }
        }
    }
    function validate()
    {
        foreach($this->p as &$obj)
        {
            $obj->validate($this->formValue);
        }
    }
    function dropFilter()
    {
        global $eventHandler,$registry;
        foreach($this->p as &$obj)
        {
            $obj->dropPredicate();
        }
        $registry->set($this->unit,'grid','search','');
        $eventHandler->fire(array('event'=>$this->events['drop_filter'],'unit'=>$this->unit,'trigger'=>'search'));
    }
}
