<?php

/*
 * param.php
 * Parameter reader
 */

// Read the url parameter
function read_param($name, $default_param=false)
{
    if(isset($_REQUEST[$name]))
    {
        return $_REQUEST[$name];
    }
    else 
    {
        return $default_param;
    }
}


// Reset a cookie
function reset_cookie($name)
{
    return setcookie($name, "", time()-3600, "/");
}


// Write the value 
function write_cookie($name, $value, $timeout=86400)
{
    return setcookie($name, $value, time() + $timeout, "/");
}


// Read the value for cookie
function read_cookie($name, $default_param=false)
{
    if(isset($_COOKIE[$name]))
    {
        return $_COOKIE[$name];
    }
    else
    {
        return $default_param;
    }
}



?>