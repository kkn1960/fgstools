<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
class MySqlLoader
{
    public $mode;
    public $tables;
    public $ntables;
    function render()
    {
        return "Database info has been loaded!";
    }
    function __construct()
    {
        $this->tables=array();
    }
    function  getFieldInfo($table)
    {
        $fields=array();
        $query="show columns from $table";
        $res=mysql_query($query);
        $i=0;
        while($row=mysql_fetch_array($res))
        {

            $fields['Field'][$i]=$row[0];
            $fields['Type'][$i]=$row[1];
            $fields['Null'][$i]=$row[2];
            $fields['Key'][$i]=$row[3];
            $fields['Default'][$i]=$row[4];
            $fields['Extra'][$i]=$row[5];
            $i++;
        }
        return $fields;
    }
    function  loadTableInfo()
    {
        global $db;
        $q='select * from fgs_table';
        $aPrevious=array();
        $aPreviousInfo=array();
        $aNoExists=array();
        $this->tables=array();
        $nt=$db->set($q,$info);
        for($i=0;$i<$nt;$i++)
        {
            $t=$info[$i]['table_name'];
            $aPrevious[]=$t;
            $aPreviousInfo[$t]['table_primary_key']= $info[$i]['table_primary_key'];
            $aPreviousInfo[$t]['table_unique_key']= $info[$i]['table_unique_key'];
        }
        $result= mysql_list_tables($db->dbname);
        $this->ntables = @mysql_numrows($result);
        for($i=0;$i< $this->ntables;$i++)
        {
            $table_name=  mysql_tablename($result, $i);
            $this->tables[]=$table_name;
            $fv=array();
            $fv['table_name']=$table_name;

            $res = mysql_db_query($db->dbname, "SHOW KEYS FROM $table_name") or die();
            $fv['table_primary_key'] = '';
            $index_name='';
            $fv['table_unique_key']='';
            $pks=array();
            $uks=array();
            $uk=array();
            while($row = mysql_fetch_array($res))
            {
                if ($row['Key_name'] == 'PRIMARY')
                {
                    $pks[]=$row['Column_name'];
                }
                elseif($row['Key_name'] != $index_name and $row['Non_unique']==0 )
                {
                    $index_name=$row['Key_name'];
                    if(sizeof($uk)>0)
                    {
                        $uks[]=implode(',',$uk);
                        $uk=array();
                    }
                    $uk[]=$row['Column_name'];
                }
                elseif($row['Key_name'] == $index_name and $row['Non_unique']==0 )
                {
                    $uk[]=$row['Column_name'];
                }
            }
            $uks[]=implode(',',$uk);
            $fv['table_primary_key']=implode(',',$pks);
            $fv['table_unique_key']=implode('; ',$uks);
            if(in_array($table_name,$aPrevious))
            {
                if($fv['table_primary_key']==$aPreviousInfo[$table_name]['table_primary_key'])
                {
                    unset($fv['table_primary_key']);
                }
                if($fv['table_unique_key']==$aPreviousInfo[$table_name]['table_unique_key'])
                {
                    unset($fv['table_unique_key']);
                }
                if(isset($fv['table_primary_key']) or isset($fv['table_unique_key']))
                {
                    $pk['table_name']=$table_name;
                    $db->update('fgs_table',$fv,$pk);
                }
            }
            else
            {

                $db->insert('fgs_table',$fv);

            }

        }
        $aNoExists=array_diff($aPrevious,$this->tables);
        foreach($aNoExists as $table)
        {
            // delete from  fgs_table&&fgs_field
            $apk=array('table_name'=>$table);
            $db->remove('fgs_table',$apk);
            $apk=array('field_table'=>$table);
            $db->remove('fgs_field',$apk);
            // delete from  fgs_dataset&&fgs_predicate&&fgs_list
            $codes=array();
            $q="select dataset_sid from fgs_dataset where dataset_table='$table'";
            $n=$db->set($q,$codes,'dataset_sid');
            if($n>0)
            {
                $cond="'".implode("','",$codes)."'";
                $q="delete from fgs_predicate where predicate_dataset in ($cond)";
                $db->execute($q);
                $q="delete from fgs_list where list_dataset in ($cond)";
                $db->execute($q);
            }
            $apk=array('dataset_table'=>$table);
            $db->remove('fgs_dataset',$apk);
            $apk=array('predicate_table'=>$table);
            $db->remove('fgs_predicate',$apk);
            
            // delete from  fgs_form&&fgs_element&&fgs_validator&&fgs_filter
            $codes=array();
            $q="select form_sid from fgs_form where form_table='$table'";
            $n=$db->set($q,$codes,'form_sid');
            if($n>0)
            {
                $cond="'".implode("','",$codes)."'";
                $q="delete from fgs_element where element_form in ($cond)";
                $db->execute($q);
                $q="delete from fgs_validator where validator_form in ($cond)";
                $db->execute($q);
                $q="delete from fgs_filter where filter_form in ($cond)";
                $db->execute($q);
                
            }
            $apk=array('form_table'=>$table);
            $db->remove('fgs_form',$apk);
            // delete from  fgs_grid&&fgs_column
            $codes=array();
            $q="select grid_sid from fgs_grid where grid_table='$table'";
            $n=$db->set($q,$codes,'grid_sid');
            if($n>0)
            {
                $cond="'".implode("','",$codes)."'";
                $q="delete from fgs_column where column_grid in ($cond)";
                $db->execute($q);
            }
            $apk=array('grid_table'=>$table);
            $db->remove('fgs_grid',$apk);
            // delete from  fgs_list
            $apk=array('list_table'=>$table);
            $db->remove('fgs_list',$apk);
        }
    }
    function  loadFieldInfo()
    {
        global $db;
        foreach($this->tables as $table)
        {
            $q="select field_name,field_type,field_length,field_dbtype,field_flags,field_default from fgs_field where field_table='$table'";
            $aPrevious=array();
            $aPreviousInfo=array();
            $aNoExists=array();
            $aExists=array();
            $fs=array();
            $ns=$db->set($q,$info);
            for($i=0;$i<$ns;$i++)
            {
                $fn=$info[$i]['field_name'] ;
                $aPrevious[]=$fn;
                $aPreviousInfo[$fn]['field_type']=$info[$i]['field_type'];
                $aPreviousInfo[$fn]['field_length']=$info[$i]['field_length'];
                $aPreviousInfo[$fn]['field_dbtype']=$info[$i]['field_dbtype'];
                $aPreviousInfo[$fn]['field_flags']=$info[$i]['field_flags'];
                $aPreviousInfo[$fn]['field_default']=$info[$i]['field_default'];
            }
            $fieldsInfo=$this->getFieldInfo($table);
            $fields = mysql_list_fields($db->dbname, $table);
            $nfields = mysql_num_fields($fields);
            for ($j = 0; $j < $nfields; $j++)
            {
                $field_name=  mysql_field_name($fields, $j);
                $aExists[]=$field_name;
                $f=array();
                $f['field_name']=$field_name;
                $f['field_table'] =strtolower($table);
                $field_type=strtolower($fieldsInfo['Type'][$j]);
                $f['field_length'] =mysql_field_len($fields, $j);
                $f['field_flags'] = mysql_field_flags($fields, $j);

                if($fieldsInfo['Default'][$j]===null )
                {
                    $f['field_default']=null;
                }
                else
                {
                    $f['field_default']=$db->code($fieldsInfo['Default'][$j],'text');
                }
                $tmp='';
                if (preg_match('@^(set|enum)\((.+)\)$@i', $field_type, $tmp))
                {
                    $f['field_type']   = $tmp[1];
                }
                else
                {
                    $type=$field_type;
                    $pos=strpos($type,'(');
                    if($pos===false)
                    {
                        $f['field_type']=$type;
                    }
                    else
                    {
                        $f['field_type']=substr($type,0,$pos);
                        if($f['field_type']=='varchar' or $f['field_type']=='char'  )
                        {
                            $f['field_length']=(int)substr($type,$pos+1);
                        }
                    }
                }
                if($f['field_length']>60 and $f['field_length']<=255)
                {
                    $f['field_size']=60;
                    $f['field_maxlength']=$f['field_length'];
                }
                elseif($f['field_length']<=60)
                {
                    $f['field_size']=$f['field_length'];
                    $f['field_maxlength']=$f['field_length'];
                }
                if(!array_key_exists($field_name,$aPreviousInfo))
                {
                    if($f['field_type']=='date')
                    {
                        $f['field_element']='InputDate';
                        $f['field_column']='ColumnDate';
                        $f['field_argument']='InputDate';
                        $f['field_predicate']='range';
                    }
                    elseif($f['field_type']=='datetime')
                    {
                        $f['field_element']='InputDatetime';
                        $f['field_column']='ColumnDatetime';
                        $f['field_argument']='InputDatetime';
                        $f['field_predicate']='range';
                    }
                    elseif($f['field_type']=='time')
                    {
                        $f['field_element']='InputTime';
                        $f['field_argument']='InputTime';
                        $f['field_column']='ColumnText';
                        $f['field_argument']='InputTime';
                    }
                    elseif($f['field_type']=='char' or $f['field_type']=='varchar' )
                    {
                        $f['field_element']='InputText';
                        $f['field_argument']='InputText';
                        $f['field_column']='ColumnText';
                        $f['field_predicate']='pattern';
                    }
                    $db->insert('fgs_field',$f);
                }
                else
                {
                    if($aPreviousInfo[$field_name]['field_dbtype']==0 or $aPreviousInfo[$field_name]['field_type']==$f['field_type'])
                    {
                        unset($f['field_type']);
                    }
                    if($f['field_length']==$aPreviousInfo[$field_name]['field_length'])
                    {
                        unset($f['field_length']);
                    }
                    if($f['field_flags']==$aPreviousInfo[$field_name]['field_flags'])
                    {
                        unset($f['field_flags']);
                    }
                    if(isset($f['field_default']) and $f['field_default']===$aPreviousInfo[$field_name]['field_default'])
                    {
                        unset($f['field_default']);
                    }



                    $pk=array();
                    $pk["field_table"]=$table;
                    $pk["field_name"]=$field_name;
                    unset($f['field_table']);
                    unset($f['field_name']);
                    if(isset($f['field_type']) or isset($f['field_length']) or isset($f['field_length']) or isset($f['field_flags']) or array_key_exists('field_default',$f) )
                    {
                        $db->update("fgs_field",$f,$pk);
                    }
                    if(isset($f['field_type']))
                    {
                        $q="update fgs_element set element_type='{$f['field_type']}' where element_table='$table' and element_field='$field_name' ";
                        $db->execute($q);
                        $q="update fgs_column set column_type='{$f['field_type']}' where column_table='$table' and column_field='$field_name' ";
                        $db->execute($q);
                    }
                }
            }
            $aNoExists=array_diff($aPrevious,$aExists);
            foreach($aNoExists as $fn)
            {
                $apk=array('field_table'=>$table,'field_name'=>$fn);
                $db->remove('fgs_field',$apk);
                $apk=array('element_table'=>$table,'element_field'=>$fn);
                $db->remove('fgs_element',$apk);
                $apk=array('column_table'=>$table,'column_field'=>$fn);
                $db->remove('fgs_column',$apk);
            }
        }
    }
}
