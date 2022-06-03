<?php

/*
 * common/db.php
 * Database API
 */

// MYSQL connection
$_db = new mysqli(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD);

// check connection
if($_db->connect_error)
{
    die("Connection failed:".$_db->connect_error);
}

// function to return database instance
function get_db()
{
    global $_db;
    return $_db;
}

// function to run a query using mysqli instance
function query_db($sql)
{
    global $_db;
    return $_db->query($sql);
}



// Check and create the database
query_db("CREATE DATABASE IF NOT EXISTS ".MYSQL_DATABASE);

// Select the database
get_db()->select_db(MYSQL_DATABASE);

// Execute the SQL queries
foreach(MYSQL_QUERIES as $_onequery)
{
    query_db($_onequery);
}

// Funtion generate a unique ID
function get_unique_id()
{
    static $m = false;
    while($m)
    {
        sleep(1);
    }    
    $m = true;
    sleep(1);

    $pageTime = new DateTime(INSTALL_DATE);
    $rowTime  = new DateTime();
    
    $uDiff = ($rowTime->format('u') - $pageTime->format('u')) / (1000 * 1000);
    
    $timePassed = $rowTime->getTimestamp() - $pageTime->getTimestamp() + $uDiff;
    
    $timePassed =  (int)($timePassed);
    if($timePassed <= 0)
    {
        die("ERROR: Check installation datetime. Value is negative.");
    }
    $m = false;

    return $timePassed;

}


?>