<?php


/*
 * sql.php
 * SQL queries for table and data
 */

 // SQL for creating the tables
define("MYSQL_QUERIES", array(
    "CREATE TABLE IF NOT EXISTS QUESTIONPAPER(ID BIGINT PRIMARY KEY NOT NULL, NAME VARCHAR(32) NOT NULL)",
    "CREATE TABLE IF NOT EXISTS QUESTIONBANK(ID BIGINT PRIMARY KEY NOT NULL, PAPERID BIGINT, QUESTIONFILE TEXT, CORRECTANSWER VARCHAR(1), FOREIGN KEY(PAPERID) REFERENCES QUESTIONPAPER(ID))"
));

// Table Names
define("TABLE_QUESTIONPAPER", "QUESTIONPAPER");
define("TABLE_QUESTIONBANK", "QUESTIONBANK");

?>