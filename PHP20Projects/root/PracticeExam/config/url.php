<?php

/*
 * url.php
 * URL Configuration file
 */

if(isset($_SERVER["HTTPS"]))
{
    define("URL_PROTOCOL", ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http");
}
else
{
    define("URL_PROTOCOL", "http");

}

define("URL_HOST", $_SERVER["HTTP_HOST"]);

define("URL_BASE", URL_PROTOCOL."://".URL_HOST."/PracticeExam/");

define("URL_TEACHER", URL_BASE."teacher/");
define("URL_STUDENT", URL_BASE."student/");


define("URL_LOGIN_FOLDER", URL_BASE."common/");

define("URL_LOGIN", URL_LOGIN_FOLDER."login.form.php");
define("URL_LOGOUT", URL_LOGIN_FOLDER."logout.process.php");
define("URL_LOGIN_PROCESS", URL_LOGIN_FOLDER."login.process.php");
define("URL_AFTER_LOGIN_SUCCESS", URL_TEACHER);
define("URL_AFTER_LOGOUT_SUCCESS", URL_BASE);


define("URL_RES", URL_BASE."res/");

?>