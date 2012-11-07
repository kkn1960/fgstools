<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Form extends Component
{
    public $e;
    public $b;
    
    public $mode;

    public $apk;
    public $foreign_key;
    public $primary_key;
    public $select;
    public $from;
    public $irow;

    public $err;
    public $query;
    public $row;
    public $amf;

    public $aSession;
    
    public $reference;
    public $descendant;
    public $dependent;
    public $eventTrigger;
    public $failure;
    public $affected_rows;
    public $formValue;

    public $type='form';
    function __construct($unit,$sid,$hide)
    {
        parent::__construct($unit,$sid,$hide);
        require FORM_PATH.$this->sid.'.php';
        $this->err=array();
        $this->eventTrigger=array();
        $this->initial=$form[$sid]['initial'];
        $this->aSession=$form[$sid]['session'];
        $this->failure=false;
        foreach($form[$sid]['properties'] as $k=>$v)
        {
            $this->$k=$v;
        }
        $this->e=array();
        foreach($e[$sid] as $a)
        {
            $class=getComponentClass($a['component']);
            if(isset($a['extension']))
            {
                $class=$a['extension'];
            }
            $this->e[$a['sid']]=new $class($unit,$this->type,$a);
            if(isset($a['listDrop']))
            {
                $this->listDrop=1;
            }
        }

        $this->b=array();
        foreach($button[$sid] as $a)
        {
            if(isset($a['extension']))
            {
                $class=$a['extension'];
            }
            else
            {
                $class='InputButton';
            }
            $this->b[$a['name']]=new $class($unit,$this->type,$a);
            if(!isset($a['name']))
            {
                debug::write($sid,'name not defined');
            }
        }
    }
    function replaceConfig($sid)
    {
        $this->sid=$sid;
        require FORM_PATH.$this->sid.'.php';
        $this->err=array();
        $this->eventTrigger=array();
        $this->initial=$form[$sid]['initial'];
        $this->aSession=$form[$sid]['session'];
        foreach($form[$sid]['properties'] as $k=>$v)
        {
            $this->$k=$v;
        }

        $this->failure=false;
        foreach($form[$sid]['properties'] as $k=>$v)
        {
            $this->$k=$v;
        }
        $this->e=array();
        foreach($e[$sid] as $a)
        {
            $class=getComponentClass($a['component']);
            $this->e[$a['sid']]=new $class($this->unit,$sid,$a);
        }
        $this->b=array();
        foreach($button[$sid] as $a)
        {
            $this->b[$a['name']]=new InputButton($this->unit,$sid,$a);
        }
    }
    function initState($s=null)
    {
        global $registry;
        foreach($this->initial as $k=>$v)
        {
            $this->$k=$v;
        }
        if(null!=$s)
        {
            $this->display=$s['display'];
            $this->hide=$s['hide'];
        }
        $this->session=$this->aSession[$this->mode];
        $this->initElements();
        $registry->set($this->unit,'form','mode',$this->mode);
    }
    function restoreState()
    {
        global $registry;
        $this->mode=$_SESSION[FGS_SESSION_KEY][$registry->window][$this->unit][$this->type]['mode'];
        $this->session=$this->aSession[$this->mode];
        parent::restoreState();
        foreach($this->e as $field=>&$obj)
        {
            if(isset($obj->modes) and !in_array($this->mode,$obj->modes) ) continue;
            if(isset($_SESSION[FGS_SESSION_KEY][$registry->window][$this->unit]['element'][$obj->rowid]))
            {
                $obj->value=$_SESSION[FGS_SESSION_KEY][$registry->window][$this->unit]['element'][$obj->rowid];
                $obj->registerValue();
            }
        }
        $registry->set($this->unit,'form','mode',$this->mode);
    }
    function saveState()
    {
        global $registry;
        $this->session=$this->aSession[$this->mode];
        parent::saveState();
        foreach($this->e as $field=>&$obj)
        {
            if(isset($obj->modes) and !in_array($this->mode,$obj->modes) ) continue;
            $_SESSION[FGS_SESSION_KEY][$registry->window][$this->unit]['element'][$obj->rowid]=$obj->value;
        }
    }
    function row($ipk)
    {
        global $db,$eventHandler;
        $mode=$this->mode;
        $pk=array();
        
        foreach($this->primary_key as $field)
        {
            $pk[$field] =$ipk[$field];
        }
        $this->setQuery();
        $result=$db->row($this->select,$this->from,$pk,$this->row);

        if($result===true)
        {
            return true;
        }
        else
        {
            $eventHandler->fire(array('event'=>'failure','unit'=>$this->unit,'trigger'=>'form'),array('id'=>'record_not_loaded','text'=>Msg('record_not_loaded')));
            return false;
        }
    }
    function go($args)
    {
        $i=$args['go'];
        if(isset($this->apk[$i]) and $this->row($this->apk[$i]))
        {
            $this->irow=$i;
            $this->initElements();
        }
    }
    function processEvent($event,$args=null)
    {
        global $eventHandler,$registry;;
        $type=$event['event'];

        if(in_array($type,$this->modes))
        {
            //must be key array
            if(!isset($args['key']))
            {
                return;
            }
            $this->mode=$type;
            $this->apk=$args['key'];
            $this->irow=0;
            if(isset($args['immediate']))
            {
                $this->immediate=$args['immediate'];
            }
            else
            {
                $this->immediate=false;
            }
            if($this->immediate)
            {
                //if action immediate - to call the action function
                $this->$type($args);
                return;
            }
            else
            {
                //loading row for the first element of the array has failed
                //trigger event
                $result= $this->row($args['key'][0]);
                if($result!==true)
                {
                    $this->initState();
                    $eventHandler->fire(array('event'=>'failure','unit'=>$this->unit,'trigger'=>'form'),array('id'=>RECORD_NOT_LOADED,'text'=>Msg('record_not_loaded')));
                    return;
                }
            }
            $multi_action=(sizeof($this->apk)>1);
            $this->initElements();
            $this->display=true;
        }
        elseif($type=='detail')
        {
            $this->foreign_key=$args['key'][0];
            $registry->set($this->unit,'form','foreign_key',$this->foreign_key);
            if(isset($args['adk']) and sizeof($args['adk'])>0)
            {
                $this->amf=$args['adk'][0];
            }
            $this->initElements();
        }
    }
    function subscribe()
    {
        global $eventHandler,$requestHandler;
        $mode=$this->mode;
        if(!isset($this->b)) return;
        foreach($this->b as $obj)
        {
            if(!isset($obj->modes) or in_array($mode,$obj->modes))
            {
                $requestHandler->subscribe(array('obj'=>$this,'action'=>$obj->name,'unit'=>$this->unit,'trigger'=>'form','method'=>$this->method));
            }
        }
        foreach($this->modes as $action)
        {
            $eventHandler->subscribe(array('obj'=>$this,'event'=>$action,'unit'=>$this->unit,'trigger'=>'grid'));
        }
        if($mode!='insert' and null!==$this->apk and sizeof($this->apk)>1)
        {
            $requestHandler->subscribe(array('obj'=>$this,'action'=>'go','unit'=>$this->unit,'trigger'=>'form','method'=>'get'));
        }
    }
    function processRequest($args)
    {
        global $eventHandler;
        $action=$args['action'];
        switch($action)
        {
            case 'cancel':
                if(isset($this->events['cancel']))
                {
                    $eventHandler->fire(array('event'=>$this->events['cancel'],'unit'=>$this->unit,'trigger'=>'form'));
                }
                $this->initState();
                $this->hide();
                break;
            case 'insert':
                if($args['trigger']=='form')
                {
                    $this->{$this->b[$action]->action}();
                }
                else
                {
                    $this->mode='insert';
                    $this->initElements();
                }
                break;
            case 'go':
                $this->go($args);
                break;
            default:
            
                if(array_key_exists($action,$this->b))
                {
                    if($this->b[$action]->action=='fire_event')
                    {
                        $this->fire($this->b[$action]);
                    }
                    else
                    {
                        $this->{$this->b[$action]->action}();;
                    }
                }
                else
                {
                    print 'Request parameters:<br>';
                    print_r($args);
                    print '<br>';
                    die('Illegal request: for '.$this->sid);
                    break;
                }
        }
    }
    function fire($obj)
    {
        global $eventHandler;
        $this->ApplyRequestValues();
        $eventHandler->fire(array('event'=>$obj->event,'unit'=>$this->unit,'trigger'=>'form'));
    }
    function initElements()
    {
        global $db;
        $mode=$this->mode;
        foreach($this->e as $sid=>&$obj)
        {
            if(isset($obj->modes) and !in_array($mode,$obj->modes) ) continue;
            if(isset($obj->alias))
            {
                $field=$obj->alias;
            }
            else
            {
                $field=$obj->field;
            }
            $value='';
            if($mode=='insert')
            {
                if(isset($obj->foreign_key) and $this->foreign_key!='')
                {
                    $value=$this->foreign_key[$obj->foreign_key];
                }
                elseif(isset($obj->value) and isset($obj->cai) and $obj->cai==0 )
                {
                    continue;
                }
                elseif(isset($obj->default_value) and $obj->default_value!=='@auto_increment')
                {
                    $value=Evaluator::get($obj->default_value,$this) ;
                }
            }
            elseif(($mode=='copy' and isset($this->row[$field]) and (!isset($obj->default_value) or $obj->default_value!=='@auto_increment')) or ($mode!='copy' and isset($this->row[$field])))
            {
                $value=$this->row[$field];
            }
            elseif((!isset($obj->table) or $obj->table=='') and isset($obj->default_value))
            {
               $value=Evaluator::get($obj->default_value,$this) ;
            }
            if(isset($obj->master_field) and $obj->master_field!='')
            {
                $value=$this->amf[$obj->master_field];
            }
            $obj->value=$db->decode($value,$obj->type);
            $obj->registerValue();
            if($obj->component=='InputAutocomplete' or $obj->component=='InputMultiAutocomplete' )
            {
                $obj->setLookupValue();
            }
        }
    }
    function validate()
    {
        foreach($this->e as $field=>&$obj)
        {
            if($obj->component=='InputSystem' or $obj->component=='InputForeignKey' or (isset($obj->modes) and !in_array($this->mode,$obj->modes)) or  isset($obj->hidden) or  isset($obj->disabled) or isset($obj->readonly) ) continue;
            $obj->validate($this->formValue);
            if(sizeof($obj->err)>0)
            {
                $this->failure=true;
            }
        }
    }
    function ApplyRequestValues()
    {
        // at first process entered data
        global $db;
        foreach($this->e as $field=>&$obj)
        {
            if(isset($obj->modes) and !in_array($this->mode,$obj->modes)) continue;
            if(!isset($obj->hidden) and  !isset($obj->disabled) and !isset($obj->readonly) and $obj->component!='InputSystem' and $obj->component!='InputForeignKey')
            {
                $obj->ApplyRequestValue($this->method,$this->mode);
            }
            if($db->IsTime($obj->type))
            {
                $this->formValue[$field]=$db->code($obj->value,$obj->type);
            }
            else
            {
                $this->formValue[$field]=$obj->value;
            }
        }
        $this->formValue['xxx_mode']=$this->mode;
        $this->formValue['xxx_sid']=$this->sid;
        // secondly get values of elements with  InputSystem component
        foreach($this->e as $field=>&$obj)
        {
            if(isset($obj->modes) and !in_array($this->mode,$obj->modes)) continue;
            if($obj->component=='InputSystem')
            {
                $obj->ApplyRequestValue($this->formValue);
            }
        }
        //do filtering  only of entered data
        foreach($this->e as $field=>&$obj)
        {
            if(isset($obj->modes) and !in_array($this->mode,$obj->modes)) continue;
            if(!isset($obj->hidden) and  !isset($obj->disabled) and !isset($obj->readonly) and $obj->component!='InputSystem' and $obj->component!='InputForeignKey')
            {
                $obj->filter($this->formValue);
            }
            $this->formValue[$field]=$obj->value;
        }
    }
    function seek($args=null)
    {
        global $db,$eventHandler;
        if(!$this->before_seek())
        {
            return false;
        }
        $this->ApplyRequestValues();
        $this->validate();
        if(sizeof($this->err)>0) return  false;
        $isOk=true;
        $fv=array();
        $events=array();
        foreach($this->e as $field=>&$obj)
        {
            if(isset($obj->hidden)) continue;
            if($obj->component=='InputSecret')
            {
                if(isset($obj->converter))
                {
                    $func=$obj->converter;
                    $value=$db->code($func($obj->value),$obj->type);
                }
                else
                {
                    $value=$db->code($obj->value,$obj->type);
                }
            }
            else
            {
                $value=$db->code($obj->value,$obj->type) ;
            }
            $fv[$obj->field]=$value;
        }
        $this->setQuery();
        $result=$db->row($this->select,$this->from,$fv,$this->row);
        if($result===true)
        {
            $eventHandler->fire(array('event'=>$this->events['seek'],'unit'=>$this->unit,'trigger'=>'form'),array('table'=>$this->table));
            $this->after_seek();
            return  true;
        }
        else
        {
            $eventHandler->fire(array('event'=>'not_found','unit'=>$this->unit,'trigger'=>'form'),array('table'=>$this->table));
            return  false;
        }
    }
    function insert($args=null)
    {
        global $FGSDebug,$db,$eventHandler,$registry,$FGSSite;
        $this->ApplyRequestValues();
        $this->validate();
        if(sizeof($this->err)>0 or $this->failure) return;
        if(!$this->before_insert())
        {
            return false;
        }
        if($FGSSite=='demo')
        {
            $eventHandler->fire(array('event'=>'done','unit'=>$this->unit,'trigger'=>'form'),array('table'=>$this->table,'action'=>'insert'));
            $this->initState();
            $this->hide();
            return true;
        }
        $fv=array();
        $mode=$this->mode;
        $noQuotes=array();
        $adk=array();
        foreach($this->e as $obj)
        {
            if($obj->table!=$this->table or (isset($obj->modes) and !in_array($mode,$obj->modes))) continue;
            if($obj->component=='InputSecret')
            {
                if(isset($obj->converter))
                {
                    $func=$obj->converter;
                    $fv[$obj->field]=$db->code($func($obj->value),$obj->type);
                }
                else
                {
                    $fv[$obj->field]=$db->code($obj->value,$obj->type);
                }
            }
            elseif($obj->component!='InputFile' or $obj->value!='')
            {
                $fv[$obj->field]=$db->code($obj->value,$obj->type);
            }
            elseif(($obj->value==='' or $obj->value===null) and isset($obj->default_value) and $obj->default_value=='@auto_increment')
            {
                if(isset($obj->sequence))
                {
                    $value=$db->auto_increment($obj->sequence);
                    if($value!='')
                    {
                        $fv[$obj->field]=$value;
                        $noQuotes[]=$value;
                    }
                }

            }
            if(isset($obj->register))
            {
                $adk[0][$obj->field]=$obj->value;
            }
        }
        if(sizeof($noQuotes)==0)
        {
            $noQuotes=null;
        }
        if(isset($this->rowid_after_insert))
        {
            $result=$db->insert($this->table,$fv,$this->rowid_after_insert,$noQuotes);
        }
        else
        {
            $result=$db->insert($this->table,$fv,null,$noQuotes);
        }
        $this->affected_rows=$result['rows'];
        if($this->affected_rows==0)
        {
            $this->err[]=array('id'=>$result['error_id'],'text'=>$result['error_text']);
            return false;
        }
        if($this->affected_rows===1 )
        {
            $apk=array();
            if(isset($this->rowid_after_insert))
            {
                $insertId=$result['rowid_after_insert'];
                $registry->setGlobal($this->rowid_after_insert,$insertId);
                $apk[0][$this->primary_key[0]]=$insertId;
            }
            else
            {
                foreach($this->primary_key as $field)
                {
                    if(isset($fv[$field]))
                    {
                        $apk[0][$field]=$fv[$field];
                    }
                }
            }
            $eventHandler->fire(array('event'=>$this->events['insert'],'unit'=>$this->unit,'trigger'=>'form'),array('table'=>$this->table,'action'=>'insert','key'=>$apk,'adk'=>$adk));
        }
        if($this->affected_rows===1 and $this->mode=='copy' and isset($this->descendant))
        {
            // copy child tables
            // first find out new values of primary key
            $newPK=array();
            foreach($this->primary_key as $field)
            {
                if(array_key_exists ($field,$fv))
                {
                    $newPK[$field]=$fv[$field];
                }
                else
                {
                    $newPK[$field]=$insertId;
                }
                $primary_key= $field;
            }
            foreach($this->descendant as $index=>$a)
            {

                $newFK=array();
                $table= $a['table'];
                $foreign_key=$a['fk'];
                $newFK[$foreign_key]=$newPK[$primary_key];
                $q="select * from {$table} where $foreign_key='{$this->apk[$this->irow][$primary_key]}'";
                $set=array();
                $n=$db->set($q,$set);
                if($n==0) continue;
                for($j=0;$j<$n;$j++)
                {

                    $fv=array();
                    $noQuotes=null;
                    foreach($set[$j] as $field=>$value)
                    {
                        if(null===$value) continue;
                        if($field==$a['table_pk'])
                        {
                            if(isset($a['sequence']))
                            {
                                $sequence=$db->auto_increment($a['sequence']);
                                if($value!='')
                                {
                                    $fv[$obj->field]=$sequence;
                                    $noQuotes=array();
                                    $noQuotes[]=$sequence;
                                }
                            }
                        }
                        elseif($field==$foreign_key)
                        {
                            $fv[$field]=$newFK[$field];
                        }
                        else
                        {
                            $fv[$field]=$db->code($value,$a['type']);
                        }
                    }
                    $db->insert($table,$fv,null,$noQuotes);
                }
            }
        }
        $this->after_insert();
        $this->initState();
        $this->hide();
        $ref=$registry->fgsRef($this->unit,$this->type);
        if($this->redirect_after_insert)
        {
             $ref=$registry->fgsUrl();
             GoToPage("$ref&insert=1");
        }
        return true;
    }
    function update($args=null)
    {
        global $db,$eventHandler,$FGSSite;
        $this->ApplyRequestValues();
        $this->validate();
        if($this->failure or sizeof($this->err)>0)
        {
            return false;
        }
        if(!$this->before_update())
        {
            return false;
        }
        if($FGSSite=='demo')
        {
            if($this->mode!='multi_update' or !array_key_exists(++$this->irow,$this->apk))
            {
                $eventHandler->fire(array('event'=>'done','unit'=>$this->unit,'trigger'=>'form'),array('table'=>$this->table,'action'=>'update'));
                $this->hide();
            }
            elseif($this->row($this->apk[$this->irow]))
            {
                $this->initElements();
            }
            return;
        }
        $mode=$this->mode;
        $fv=array();
        foreach($this->e as $field=>&$obj)
        {
            if((isset($obj->modes) and !in_array($mode,$obj->modes)) or $obj->table!=$this->table or isset($obj->disabled) or isset($obj->readonly)) continue;
            if($obj->component=='InputSecret')
            {
                if(isset($obj->converter))
                {
                    $func=$obj->converter;
                    $fv[$obj->field]=$db->code($func($obj->value),$obj->type);
                }
                else
                {
                    $fv[$obj->field]=$db->code($obj->value,$obj->type);
                }
            }
            elseif($obj->component!='InputFile' or $obj->value!='')
            {
                $fv[$obj->field]=$db->code($obj->value,$obj->type);
            }
        }
        $newPK=array();
        $change=false;
        foreach($this->apk[$this->irow] as $field=>$oldvalue)
        {
            if(array_key_exists($field,$fv))
            {
                if($fv[$field]!=$oldvalue)
                {
                    $change=true;
                    $newPK[$field]=$fv[$field];
                }
            }
        }
        $result=$db->update($this->table,$fv,$this->apk[$this->irow]);
        $this->affected_rows=$result['rows'];
        $error=$result['error'];
        if($error)
        {
            $this->err[]=array('id'=>$result['error_id'],'text'=>$result['error_text']);
            return false;
        }
        if($change and isset($this->reference) and sizeof($this->reference)>0)
        {
            // update all dependent tables
            $db->cascadeUpdate($this,$newPK);
        }
        //update aarray of primary keys if in multi edit  mode
        if($this->mode=='multi_update' and $change)
        {
            foreach($newPK as $field=>$value)
            {
                $this->apk[$this->irow][$field]=$value ;
            }
        }
        $this->after_update();
        if($this->mode!='multi_update' or !array_key_exists(++$this->irow,$this->apk))
        {
            $eventHandler->fire(array('event'=>$this->events['update'],'unit'=>$this->unit,'trigger'=>'form'),array('table'=>$this->table,'action'=>'update'));
            $this->hide();
        }
        elseif($this->row($this->apk[$this->irow]))
        {
            $this->initElements();
        }

        return true;
    }

    function remove($args=null)
    {
        global $db,$eventHandler,$FGSSite;
        if(!$this->before_remove())
        {
            return;
        }
        //check references
        if($db->hasDependent($this,$this->irow))
        {
            if(isset($this->immediate) and $this->immediate)
            {
                $this->display=true;
            }
            $eventHandler->fire(array('event'=>'load','unit'=>$this->unit,'trigger'=>'form'));
            return;
        }
        if($FGSSite=='demo')
        {
            if($this->mode!='multi_remove' or !array_key_exists($this->irow,$this->apk))
            {
                $eventHandler->fire(array('event'=>'done','unit'=>$this->unit,'trigger'=>'form'),array('table'=>$this->table,'action'=>'remove'));
                $this->hide();
            }
            elseif($this->row($this->apk[$this->irow]))
            {
                $this->initElements();
            }
            return;
        }
        $result=$db->remove($this->table,$this->apk[$this->irow]) ;
        $this->affected_rows=$result['rows'];
        $error=$result['error'];
        if($error)
        {
            $eventHandler->fire(array('event'=>'failure','unit'=>$this->unit,'trigger'=>'form'));
            $this->err[]=array('id'=>$result['error_id'],'text'=>$result['error_text']);
            return false;
        }
        elseif(isset($this->descendant))
        {
            $db->cascadeDelete($this,$this->irow);
        }
        $this->after_remove();
        if($this->mode=='multi_remove')
        {
            $n=sizeof($this->apk);
            if($this->irow==$n-1)
            {
                $eventHandler->fire(array('event'=>'done','unit'=>$this->unit,'trigger'=>'form'));
                return;
            }
            $apk=array();
            for($i=0;$i<$n;$i++)
            {
                if($i!=$this->irow)
                {
                    $apk[]=$this->apk[$i] ;
                }
            }
            $this->apk=$apk;
        }
        if($this->mode!='multi_remove' or !array_key_exists($this->irow,$this->apk))
        {
            $eventHandler->fire(array('event'=>$this->events['remove'],'unit'=>$this->unit,'trigger'=>'form'),array('table'=>$this->table,'action'=>'remove'));
            $this->hide();
        }
        elseif($this->row($this->apk[$this->irow]))
        {
            $this->initElements();
        }
    }
    function multi_remove($args=null)
    {
        global $db,$eventHandler,$FGSSite;
        $n=sizeof($this->apk );
        $failure=false;
        if($FGSSite=='demo')
        {
            $eventHandler->fire(array('event'=>'done','unit'=>$this->unit,'trigger'=>'form'),array('table'=>$this->table,'action'=>'remove'));
            return;
        }
        for($i=0;$i<$n;$i++)
        {
            $pk=$this->apk[$i];
            if(!$this->before_remove())
            {
                continue;
            }
            if($db->hasDependent($this,$i))
            {
                $failure=true;
                continue;
            }

            $result=$db->remove($this->table,$pk) ;
            $error=$result['error'];
            if($error)
            {
                $this->err[]=array('id'=>$result['error_id'],'text'=>$result['error_text']);
                $failure=true;
            }
            elseif(isset($this->descendant))
            {
                $db->cascadeDelete($this,$this->irow);
            }
            $this->after_remove();
        }
        if($failure)
        {
            $eventHandler->fire(array('event'=>'failure','unit'=>$this->unit,'trigger'=>'form'));
        }
        else
        {
            $eventHandler->fire(array('event'=>'done','unit'=>$this->unit,'trigger'=>'form'),array('table'=>$this->table,'action'=>'remove'));
        }
    }
    function setQuery()
    {
        global $db;
        $field_lookup=array();
        foreach($this->primary_key as $v)
        {
            $field_lookup[]='t.'.$v;
        }
        $join_list=array();
        $join_list[]=" {$this->table} t ";
        if(isset($this->joins))
        {
            foreach($this->joins as $a)
            {
                $join_list[]=$db->table_join($a);
            }
        }
        $iAlias=1;
        foreach($this->e as $obj)
        {
            if(isset($obj->modes) and !in_array($this->mode,$obj->modes) or $obj->table=='') continue;
            $field=$obj->field;
            if(isset($obj->table_alias))
            {
                $table_alias= $obj->table_alias;
            }
            else
            {
                $table_alias='t';
            }
            if(isset($obj->alias))
            {
                $alias=' '.$obj->alias;
            }
            else
            {
                $alias='';
            }
            $add=$table_alias.'.'.$field.$alias;
            if(!in_array($add,$field_lookup))
            {
                $field_lookup[]=$add;
            }
        }
        $this->select=implode(",",$field_lookup);
        $this->from=implode(" ",$join_list);
    }
    function before_seek()
    {
        return true;
    }
    function before_insert()
    {
        return true;
    }
    function before_update()
    {
        return true;
    }
    function before_remove()
    {
        return true;
    }
    function after_seek()
    {
        return true;
    }
    function after_insert()
    {
        return true;
    }
    function after_update()
    {
        return true;
    }
    function after_remove()
    {
        return true;
    }

}

