<?php

/*
 * Process Login information
 */
require_once __DIR__."/common.php";


// username = Username
// password = Password

$username = read_param("username", "");
$password = read_param("password", "");

$status = is_username_password($username, $password);

if($status == false)
{
    // login failed
    header("Location: ".URL_LOGIN."?e=1");
    exit;
}

// Login success

// Save Login data 
$store_cred = $username.",".$password;
write_cookie(TEACHER_LOGIN_COOKIENAME, $store_cred);

// Redirect to Teacher URL
header("Location: ".URL_TEACHER);

?>
