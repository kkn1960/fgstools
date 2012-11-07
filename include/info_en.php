<?php
$o[]='<div class="edit">';
$o[]='<div class="debug_header">';
$o[]='What is FGS Tools?';
$o[]='</div><div class="info">';
$o[]="<p >FGS Tools is a web tool to create web-based user interfaces to  database tables. FGS Tools consists of FGS Factory framework and FGS Configurator.</p>";



$o[]="<p>FGS Tools uses three concepts:</p>";
$o[]="<ul><li>";
$o[]="Component architecture";
$o[]="</li><li>";
$o[]="Specifications of components";
$o[]="</li><li>";
$o[]="Configurator of specifications";

$o[]="</li></ul>";

$o[]="<p>The Framework is based on three visual components Form, Grid, Search and one non-visual component Dataset. The Form enables a user to add, edit, delete and view table rows. The Grid enables the user to view, navigate, and edit individual table rows in a tabular manner. The Search enables the user to enter filters on rows displaying in the Grid. The Dataset sets hidden filters on table rows.
</p>";

$o[]="<p>The Framework uses concept of specification: appearance and behavior of a component are ruled by its specification. The Framework creates instances of components from its specifications. To change a component's appearance or behavior, we have to change its specification.";


$o[]="<p>Specifications of components are stored in special database tables. To speed up operation, the data from these tables is exported to specification's files. The Framework uses these files to create instances of components. </p>";

$o[]="<p>The Configurator is a special web-based application for creating specifications of components. The Configurator is created on the base of the FGS Factory framework and provides web user interfaces to these database tables. </p>";

$o[]="<p>With FGS Tools you can create three types of user interfaces:</p>";
$o[]="<ul><li>";
$o[]="Interface to a single table";
$o[]="</li><li>";
$o[]='Interface to two tables associated by master-detail relationship';
$o[]="</li><li>";
$o[]='Interface to several tables associated or not by master-detail relationship';

$o[]="</li></ul>";
$o[]='<div class="debug_header">';
$o[]='Main advantages of FGS Tools:';
$o[]='</div>';

$o[]="<ul><li>";
$o[]="Full featured and ready to use components";
$o[]="</li><li>";
$o[]="No or minimum PHP, SQL and JavaScript coding";
$o[]="</li><li>";
$o[]='Minimum input of neccesary information';
$o[]="</li><li>";
$o[]="Built-in support of autocomplete input fields, chained select's, inline editing of rows";
$o[]="</li></ul>";

$o[]="<p>No or minimum PHP, SQL and JavaScript coding - it's not kidding! For example FGS Configurator  provides user interfaces to 26 (twenty six) database tables and there are manual coding only of 7 (seven) SQL queries to provide non-standard input and output in these tables! Also FGS Configurator uses standard implementation of chained select's, inline editing of rows without any additional of PHP, SQL or JavaScript coding!</p><p> Of course, it's not related to data processing. Implementation of specifications' export required a lot of PHP, SQL manual coding </p>";

$o[]='<div class="debug_header">';
$o[]='How to use FGS Tools?';
$o[]='</div>';
$o[]="<ul><li>";
$o[]="Download archive of FGS Tools somewhere under your local web server's root directory and unpack it.";
$o[]="</li><li>";
$o[]='Create database tables related to the Configurator by execution of the fgstools.sql SQL script from downloaded archive in phpMyAdmin';
$o[]="</li><li>";
$o[]='Set database connection - host name, database name, login and password';
$o[]="</li><li>";
$o[]='Start the Configurator in a web-browser and enjoy new style of development!';
$o[]="</li></ul>";
$o[]="<p>Although FGS Tools let you create simple user interfaces to database tables just in minutes you can assess and enjoy full power of FGS Tools only after thorough studying of the Framework and Configurator guides! </p>";


$o[]='<div class="debug_header">';
$o[]='FGS Tools requires:';
$o[]='</div>';
$o[]="<ul><li>";
$o[]="PHP 5.2";
$o[]="</li><li>";
$o[]="MySql 5";
$o[]="</li><li>";
$o[]="jQuery 1.4.2";
$o[]="</li><li>";
$o[]="jQuery UI 1.8.2";
$o[]="</li></ul>";
$o[]="<p>FGS Tools was developed to use with different database management systems (DBMS). But just now FGS Tools has support for MySql only</p>";
$o[]="<p>FGS Tools was tested for PHP 5.2 only</p>";
$o[]='<div class="debug_header">';
$o[]='FGS Tools is not:';
$o[]='</div>';
$o[]="<ul><li>";
$o[]="Tool for administering MySQL databases like well known phpMyAdmin- you cannot create databases or tables and change its structures";
$o[]="</li><li>";
$o[]="Code generator like SciptCase PHP Generator or which Yii and Symphony 2 frameworks have";
$o[]="</li><li>";
$o[]="RAD Tool";
$o[]="</li></ul>";
$o[]="<p class=\"info\">Even though FGS Tools has some features of a RAD Tool like an underlying component architecture, a set of standard components, an application infrastructure and a debug tool, it's not a RAD tool! </p>";

$o[]='<div class="debug_header">';
$o[]='To try demo version of FGS Configurator on this site login with:';
$o[]='</div>';
$o[]="<ul><li>";
$o[]="login: programmer";
$o[]="</li><li>";
$o[]="password: programmer";
$o[]="</li></ul>";
$o[]="<p>Demo version of FGS Configurator let you only view specifications! </p>";

$o[]='<div class="debug_header">';
$o[]='Main facts of FGS Tools:';
$o[]='</div>';
$o[]="<ul><li>";
$o[]="Start of development: 2004";
$o[]="</li><li>";
$o[]="Current version: 3";
$o[]="</li><li>";
$o[]="License: MIT";
$o[]="</li></ul>";
