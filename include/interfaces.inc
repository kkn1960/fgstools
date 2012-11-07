<?php
/**
 *        Copyright (c) 2011-2012, Konstantin Kim (http://www.fgstools.net)
 *        All Rights Reserved.
 *        FGS Tools, version 3.0
 *
 *        This source file is part of FGS Tools 3.0 and licensed under the MIT license.
 *        The MIT license is bundled with this package in the file LICENSE.txt.
*/
interface iDatabase
{
    //connect && close connection
    function connect();
    function close();

    // get result of a operation
    function affectedRows();
    function error();
    function errorN();
    function nRows();
    function value($q);
    
    // prepare data to SQL opearator
    function escapeString ();
    
    // getting result
    function total();
    function show();
    function set($q,&$set,$key=null,$field=null);
    function row($select,$from,$pk,&$record);

    
    // data manipulation function

    function query();
    function prepare();
    function execute($q);

    
    function insert($table,$aval,$rowid_after_insert=null,$noQuotes=null;
    function update($table,$aval,$apk);
    function remove($table,$apk);
    
    // take into account features of the database
    function select();
    function auto_increment($obj);
    // conversion function
    function code($value,$type);
    function decode($value,$type);
    function localdate($value);
    function localdatetime($value);
    function table_join($left_table,$right_table,$join_type='left');
    // text types
    function IsText($type);
    // check existence of primary/unique key
    function KeyExist($table,$key,$not=null);
    
};

