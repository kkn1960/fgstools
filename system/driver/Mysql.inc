<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class Mysql
{
    static private $instance = NULL;
    public $aConnect;
    public $dbc;
    public $server;
    public $dbname;
    public $codepage;
    public $user;
    public $password;
    function table_join($a)
    {
        $type=$a['join'];
        $o=array();
        if($type=='left')
        {
            $o[]="left outer join";
        }
        elseif($type=='right')
        {
            $o[]="right outer join";
        }
        elseif($type=='innner')
        {
            $o[]="inner outer join";
        }
        $o[]=$a['right_table'];
        $o[]=$a['right_alias'];
        $o[]='on';
        $o[]=$a['left_alias'].'.'.$a['left_foreign_key'].'='.$a['right_alias'].'.'.$a['right_primay_key'];
        if(isset($a['where']) and $a['where']!='')
        {
            $o[]=$a['where'];
        }
        return implode(' ',$o);
    }
    private function __construct($dbname)
    {
        $this->aConnect=$GLOBALS['gaDbConnect'][$dbname] ;
        $this->server=$this->aConnect['server'] ;
        $this->dbname=$this->aConnect['dbname'] ;
        $this->codepage=$this->aConnect['codepage'] ;
        $this->user=$this->aConnect['user'] ;
        $this->password=$this->aConnect['password'] ;
        $this->connect();
        $this->operators=array();
        $this->operators['l']=' < ';
        $this->operators['lq']=' <= ';
        $this->operators['m']=' > ';
        $this->operators['mq']=' >= ';
        $this->operators['equal']=' = ';
        $this->operators['not_equal']=' != ';
        $this->operators['in']=' in ';
        $this->operators['not_in']=' not in ';
        $this->operators['like']=' like ';
        $this->operators['leftlike']=' like ';
        $this->operators['rightlike']=' like ';
        $this->operators['not_like']=' not like ';
        $this->operators['not_leftlike']=' not like ';
        $this->operators['not_rightlike']=' not like ';
        $this->operators['include_all']=' like ';
        $this->operators['not_include_all']=' not like ';
        $this->operators['include_one']=' like ';
        $this->operators['not_include_one']=' not like ';
        $this->operators['null']=' is null ';
        $this->operators['not_null']=' is not null ';
        $this->operators['empty']=" ='' ";
        $this->operators['not_empty']=" !='' ";
        $this->operators['regexp']=" regexp ";

    }
    function getOperator($s)
    {
        if(array_key_exists($s,$this->operators))
        {
            return $this->operators[$s];
        }
        else
        {
            return '';
        }
    }
    static public function getInstance($dbname)
    {
        if(self::$instance == NULL)
        {
            self::$instance = new Mysql($dbname);
        }
        return self::$instance;
    }
    //connect && close connection
    function connect()
    {
        global $fgs_sql_connection_time;
        $start=getmicrotime();
        if(($this->dbc = mysql_connect($this->server, $this->user, $this->password))===false)
        {
            die(Msg("db_connection_failed"));
        }
        $result=mysql_query("set names {$this->codepage}");
        if($result===false)
        {
            debug::writeSql($q,mysql_error(),'sql error');
        }
        if(@mysql_select_db($this->dbname)===false)
        {
            die(Msg("SelectDBFailed"));
        }
        $fgs_sql_connection_time=getmicrotime()-$start;
    }
    function close()
    {
        mysql_close($this->dbc);
    }
    function auto_increment($sequence)
    {
        return '';
    }
    // get result of a operation
    function affectedRows()
    {
        return mysql_affected_rows();
    }
    function errorMsg()
    {
        return mysql_error($this->dbc);
    }
    function errorNum()
    {
        return mysql_errno($this->dbc);
    }
    // getting result
    function value($q)
    {
        global $timer;
        $start=getmicrotime();
        $result = mysql_query($q);
        $value=null;
        if($result===false)
        {
            debug::writeSql($q,mysql_error(),'sql error');
        }
        else
        {
            while ($row = mysql_fetch_array($result))
            {
                $value=$row[0];
            }
        }

        $timer->addSql(getmicrotime()-$start);
        return $value;
    }
    function page($grid,$where,$order,$group,$having='')
    {
        global $registry;
        if(null!==$grid->offset and $grid->offset>=0 and null!==$grid->pagesize and $grid->pagesize>0)
        {
            $limit="limit {$grid->offset}, {$grid->pagesize}" ;
        }
        else
        {
            $limit='';
        }
        if($group=='' and strpos(strtolower($grid->select),'distinct')===false)
        {
            $q="select {$grid->select} from {$grid->from} {$where} $having {$order} {$limit}";
            $grid->nrows=$this->set($q,$grid->set);
            if($limit!='')
            {
                $q="select count(*) from {$grid->from} {$where} $having ";
                $grid->total=$this->value($q);
            }
            else
            {
                $grid->total=$grid->nrows;
            }
        }
        else
        {
            $q="select SQL_CALC_FOUND_ROWS  {$grid->select} from {$grid->from} {$where} {$group} $having {$order} {$limit}";
            $grid->nrows=$this->set($q,$grid->set);
            if($limit!='')
            {
                $q='select FOUND_ROWS()';
                $grid->total= $this->value($q);
            }
            else
            {
                $grid->total=$grid->nrows;
            }
        }
    }
    function set($q,&$set,$key=null,$field=null)
    {
        global $timer;
        $start=getmicrotime();
        $n=0;
        $set=array() ;
        $result = mysql_query($q);
        if($result===false)
        {
            debug::writeSql($q,mysql_error(),'sql error');
        }
        else
        {
            $n= mysql_num_rows($result);
            $set=array();
            if(null===$key)
            {
                while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
                {
                    $set[]=$row;
                }
            }
            elseif(null===$field)
            {
                while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
                {
                    $set[]=$row[$key];
                }
            }
            else
            {
                while ($row = mysql_fetch_array($result,MYSQL_ASSOC))
                {
                    $set[$row[$key]]=$row[$field];
                }
            }


        }

        $timer->addSql(getmicrotime()-$start);
        return $n;
    }
    function row($select,$from,$pk,&$record)
    {
        global $timer;
        $start=getmicrotime();
        $err=true;
        $out=array();
        foreach($pk as $field=>$value)
        {
            $v=mysql_escape_string($value);
            $out[]=$field."='$v'";
        }
        $where="where ".implode(" and ",$out);
        $q="select {$select} from {$from} {$where} ";
        $result = mysql_query($q);
        if($result===false)
        {
            debug::writeSql($q,mysql_error(),'sql error');
        }
        elseif(mysql_num_rows($result)>0)
        {
            $record= mysql_fetch_array($result,MYSQL_ASSOC);

            return true;
        }
        else
        {
            $err=array("id"=>23,"text"=>"not found row with query:".$q);
            debug::writeSql($q,'row not found','sql error');
        }
        $timer->addSql(getmicrotime()-$start);
        return $err;
    }
    function record($q,&$record)
    {
        global $timer;
        $start=getmicrotime();
        $result = mysql_query($q);
        if($result===false)
        {
            debug::writeSql($q,mysql_error(),'sql error');
            $return= false;
        }
        elseif(mysql_num_rows($result)>0)
        {
            $record= mysql_fetch_array($result,MYSQL_ASSOC);
            $return= true;
        }
        else
        {
            $lastError=array("id"=>23,"text"=>"not found row with query:".$q);
            $return= false;
        }
        $timer->addSql(getmicrotime()-$start);
        return $return;
    }
    function execute($q)
    {
        global $timer;
        $start=getmicrotime();
        $result=mysql_query($q);
        if($result===false)
        {
            debug::writeSql($q,mysql_error(),'sql error');
        }
        $timer->addSql(getmicrotime()-$start);
    }
    function insertWithUpdateOnDuplicateKey($table,$aval,$rowid_after_insert=null)
    {
        global $timer;
        $start=getmicrotime();
        $fieldList=array();
        $valueList=array();
        $i=0;
        $update=array();
        foreach($aval as $field=>$value)
        {
            $fieldList[]=$field;
            if(''===$value or null===$value)
            {
               $valueList[$i]="null";
            }
            else
            {
                $valueList[$i]="'$value'";
            }
            if(''===$value or null===$value)
            {
                $update[]="$field=NULL" ;
            }
            else
            {
                $update[]="$field={$valueList[$i]}" ;
            }
            $i++;
        }
        $fields =implode(",",$fieldList);
        $values =implode(",",$valueList);
        $on_duplicate_key=" ON duplicate KEY UPDATE ".implode(",",$update);
        $q="insert into {$table} ({$fields}) values ({$values}) $on_duplicate_key";
        $result = mysql_query($q);
        if($result===false)
        {
            $nar=array('rows'=>0,"error_id"=>mysql_errno(),"error_text"=>mysql_error());
            debug::writeSql($q,mysql_error(),'sql error');
        }
        else
        {
            if($rowid_after_insert===null)
            {
                $nar=array("rows"=>mysql_affected_rows());
            }
            else
            {

                $nar=array("rows"=>mysql_affected_rows(),"rowid_after_insert"=>mysql_insert_id());
            }

        }
        if(!isset($timer))
        {
            global $time_start;
            $timer = Timer::getInstance($time_start);
        }
        $timer->addSql(getmicrotime()-$start);
        return $nar;
    }
    function insert($table,$aval,$rowid_after_insert=null,$noQuotes=null)
    {
        global $timer;
        $start=getmicrotime();
        $fieldList=array();
        $valueList=array();
        $i=0;
        $update=array();
        foreach($aval as $field=>$value)
        {
            $fieldList[]=$field;
            if(''===$value or null===$value)
            {
               $valueList[$i]="null";
            }
            elseif($noQuotes===null)
            {
                $valueList[$i]="'$value'";
            }
            elseif(in_array($field,$noQuotes))
            {
                $valueList[$i]=$value;
            }

            $i++;
        }
        $fields =implode(",",$fieldList);
        $values =implode(",",$valueList);
        $q="insert into {$table} ({$fields}) values ({$values})";
        $result = mysql_query($q);
        $nar=array();
        if($result===false)
        {
            $nar=array('rows'=>0,"error_id"=>mysql_errno(),"error_text"=>mysql_error());
            debug::writeSql($q,mysql_error(),'sql error');
        }
        else
        {
            if($rowid_after_insert===null)
            {
                $nar=array("rows"=>mysql_affected_rows());
            }
            else
            {

                $nar=array("rows"=>mysql_affected_rows(),"rowid_after_insert"=>mysql_insert_id());
            }
        }
        if(!isset($timer))
        {
            global $time_start;
            $timer = Timer::getInstance($time_start);
        }
        $timer->addSql(getmicrotime()-$start);
        return $nar;
    }
    function update($table,$aval,$apk)
    {
        global $timer;
        $start=getmicrotime();
        $out=array();
        foreach($aval as $field=>$value)
        {
            if(!isset($value) or ''===$value )
            {
                $out[]=$field."=null";
            }
            else
            {
                $out[]=$field."='$value'";
            }
        }
        $set="set ".implode(",",$out);
        $out=array();
        foreach($apk as $field=>$value)
        {
            $v=mysql_escape_string($value);
            $out[]=$field."='$v'";
        }
        $where="where ".implode(" and ",$out);
        $q="update {$table} {$set} {$where}";
        $result = mysql_query($q);
        if($result===false)
        {
            $nar=array('rows'=>0,"error"=>true,"error_id"=>mysql_errno(),"error_text"=>mysql_error());
            debug::writeSql($q,mysql_error(),'sql error');
        }
        else
        {
            $nar=array("rows"=>mysql_affected_rows(),"error"=>false);
        }
        $timer->addSql(getmicrotime()-$start);
        return $nar;
    }
    function remove($table,$apk)
    {
        global $timer;
        $start=getmicrotime();
        $out=array();
        foreach($apk as $field=>$value)
        {
            $v=mysql_escape_string($value);
            $out[]=$field."='$v'";
        }
        $where="where ".implode(" and ",$out);
        $q="delete from {$table} {$where}";
        $result = mysql_query($q);
        $result = mysql_query($q);
        if($result===false)
        {
            $nar=array('rows'=>0,"error"=>true,"error_id"=>mysql_errno(),"error_text"=>mysql_error());
            debug::writeSql($q,mysql_error(),'sql error');
        }
        else
        {
            $nar=array("rows"=>mysql_affected_rows(),"error"=>false);
        }
        $timer->addSql(getmicrotime()-$start);
        return $nar;
    }
    function KeyExist($table,$key,$not=null)
    {
        $out=array();
        if(null!==$not)
        {
            foreach($not as $field=>$value)
            {
                $select=$field;
                if(''===$value )
                {
                     $out[]=$field."is not null";
                }
                else
                {
                    $out[]=$field."!='$value'";
                }
                
            }
        }
        foreach($key as $field=>$value)
        {
            $select=$field;
            if(!isset($value) or ''===$value )
            {
                $out[]=$field." is null";
            }
            else
            {

                $out[]=$field."='$value'";
            }

        }
        $where="where ".implode(" and ",$out);
        $q="select count(*) from $table {$where}";
        return ($this->value($q));
    }
    function code($value,$type)
    {
        if($this->IsText($type))
        {
            return mysql_escape_string($value);
        }
        elseif($type=='date')
        {
            if(is_array($value))
            {
                return $value['year'].'-'.str_pad($value['month'],2,'0', STR_PAD_LEFT).'-'.str_pad($value['day'],2,'0', STR_PAD_LEFT);
            }
            else
            {
                return $value ;
            }
        }
        elseif($type=='datetime')
        {
            if(is_array($value))
            {
                return $value['year'].'-'.str_pad($value['month'],2,'0', STR_PAD_LEFT).'-'.str_pad($value['day'],2,'0', STR_PAD_LEFT).' '.str_pad($value['hour'],2,'0', STR_PAD_LEFT).':'.str_pad($value['minute'],2,'0', STR_PAD_LEFT).':'.str_pad($value['second'],2,'0', STR_PAD_LEFT);
            }
            else
            {
                return $value ;
            }
        }
        elseif($type=='time' )
        {
            if(is_array($value))
            {
                if($value['hour']==='')
                {
                    return '';
                }
                else
                {
                    return str_pad($value['hour'],2,'0', STR_PAD_LEFT).':'.str_pad($value['minute'],2,'0', STR_PAD_LEFT).':'.str_pad($value['second'],2,'0', STR_PAD_LEFT);
                }
            }
            else
            {
                return $value;
            }
        }
        elseif($type=='set')
        {
            if(is_array($value))
            {
                foreach($value as &$v)
                {
                    $v="'".$v."'";
                }
                return mysql_escape_string(implode(",",$value));
            }
            else
            {
                return mysql_escape_string($value);
            }
        }
        else
        {
            return $value;
        }
    }
    function decode($value,$type)
    {
        if($type=='date')
        {
            if(null==$value or $value=='') return array('year'=>'','month'=>'','day'=>'');
            $date=explode('-',$value);
            return array('year'=>$date[0],'month'=>$date[1],'day'=>$date[2]);
        }
        elseif($type=='datetime')
        {
            if(null==$value or $value=='') return array('year'=>'','month'=>'','day'=>'','hour'=>'','minute'=>'','second'=>'');
            $buf=explode(' ',$value);
            $date=explode('-',$buf[0]);
            $time=explode(':',$buf[1]);
            return array('year'=>$date[0],'month'=>$date[1],'day'=>$date[2],'hour'=>$time[0],'minute'=>$time[1],'second'=>$time[2]);
        }
        elseif($type=='time')
        {
            if(null==$value or $value=='') return array('hour'=>'','minute'=>'','second'=>'');
            $time=explode(':',$value);
            return array('hour'=>$time[0],'minute'=>$time[1],'second'=>$time[2]);
        }
        elseif($type=='set')
        {
            if(null===$value or $value==='') return array();
            return explode(',',str_replace("'",'',$value));
        }
        else
        {
            return $value;
        }
    }
    function localdatetime($value)
    {
        global $df,$tf,$delimiter;
        if($value=='')  return '';
        $ad=$this->decode($value,'datetime');
        $outd=array();
        foreach($df[$_SESSION['language']]  as $k=>$v)
        {
            $outd[]=$ad[$k];
        }
        ksort($outd);
        $outt=array();
        foreach($tf[$_SESSION['language']]  as $k=>$v)
        {
            $outt[]=$ad[$k];
        }
        ksort($outt);
        return implode($delimiter[$_SESSION['language']]['dmy'],$outd).$delimiter[$_SESSION['language']]['date_time'].implode($delimiter[$_SESSION['language']]['hms'],$outt);

    }
    function localdate($value)
    {
        global $df,$delimiter;
        if($value=='')  return '';
        $ad=$this->decode($value,'date');

        $out=array();
        foreach($df[$_SESSION['language']]  as $k=>$v)
        {
            if($k=='day' or $k=='month')
            {
                 $out[$v]=str_pad($ad[$k],2,STR_PAD_LEFT);
            }
            else
            {
                $out[$v]=$ad[$k];
            }

        }
        ksort($out);
        return implode($delimiter[$_SESSION['language']]['dmy'],$out);
    }
    function IsTime($type)
    {
        return ($type=='date' or $type=='time' or $type=='datetime');
    }
    function IsText($type)
    {
        return ($type=='varchar' or $type=='char' or $type=='text' or  $type=='mediumtext' or $type=='tinytext' or $type=='longtext' );
    }
    function IsNumber($type)
    {
        return ($type=='int' or $type=='float'  or $type=='double'  or $type=='decimal' or $type=='tinyint' or  $type=='mediumint' or $type=='smallint' or $type=='bigint' or $type=='bool' );
    }
    function IsBlob($type)
    {
        return ($type=='blob' or $type=='tinyblob' or $type=='mediumblob' or $type=='longblob') ;
    }
    function IsAggregateFunction($function)
    {
        return ($function=='avg' or $function=='count' or $function=='min' or $function=='max' or $function=='std' or $function=='sum');
    }
    function cascadeUpdate($form,$newPK)
    {
        foreach($form->reference as $index=>$a)
        {
            $apk=array();
            $changedFK=array();
            $table=$a['table'];
            $fk=$a['fk'];
            $pk=$a['pk'];
            $new_pk=$newPK[$pk];
            $old_pk=$form->apk[$form->irow][$pk];
            if($a['type']=='set')
            {
                $q="update $table set $fk=REPLACE($fk,'\'{$old_pk}\'','\'{$new_pk}\'') where $fk like '%\'{$old_pk}\'%'";
                $result=$this->execute($q);
            }
            elseif($a['dbcascade']==0)
            {
                $q="update $table set $fk='$new_pk' where $fk='$old_pk'";
                $result=$this->execute($q);
            }
        }
    }
    function cascadeDelete($form,$i)
    {
        foreach($form->descendant as $index=>$a)
        {
            if($a['dbcascade']==0)
            {
                $apk=array();
                $table=$a['table'];
                $pk=$a['pk'];
                $fk=$a['fk'];
                $apk[$fk]=$form->apk[$i][$pk] ;
                $this->remove($table,$apk) ;
            }
        }
    }
    function hasDependent(&$form,$i)
    {
        if(!isset($form->dependent) or sizeof($form->dependent)==0) return false;
        $has=false;
        foreach($form->dependent as $index=>$a)
        {
            $apk=array();
            $table=$a['table'];
            $pk=$a['pk'];
            $fk=$a['fk'];
            $apk[$fk]=$form->apk[$i][$pk] ;
            if($a['type']=='set')
            {
                $q="select $fk from $table where find_in_set('\'{$apk[$fk]}\'',$fk)>0 limit 0,1";
                $result =$this->value($q);
                if(null!==$result)
                {
                    $has=true;
                    $form->err[]=array('id'=>123,'text'=>Msg('record@@has_references@@in_table@@'.$table));
                }
            }
            elseif($this->KeyExist($table,$apk)>0)
            {
                $has=true;
                $form->err[]=array('id'=>123,'text'=>Msg('record@@has_references@@in_table@@'.$table));
            }
        }
        return $has;
    }
}

