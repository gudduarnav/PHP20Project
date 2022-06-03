<?php

/*
 * common.php
 * Include all the APIs
 */

// Display all error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



// Include the config files
require_once __DIR__."/../config/config.php";

// Include api files
require_once __DIR__."/db.php";
require_once __DIR__."/param.php";
require_once __DIR__."/bintext.php";
require_once __DIR__."/login.php";

// This project specific api files
require_once __DIR__."/db.question.php";


?>