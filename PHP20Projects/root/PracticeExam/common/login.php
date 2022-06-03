<?php

/*
 * Login API
 */

// Check if the login is ok or not
function is_username_password($username, $password)
{
    if(strcmp($username, TEACHER_LOGIN_USERNAME) == 0 && strcmp($password, TEACHER_LOGIN_PASSWORD)== 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}



// This function checks if logged in 
// otherwise display the login form
function login_required()
{
    // check for login
    $is_logged_in = true;

    // read cookie data -> username, password

    $cookie_data = explode(",", read_cookie(TEACHER_LOGIN_COOKIENAME, ""));


    $stored_username = "";
    $stored_password = "";

    if(count($cookie_data) > 0)
    {
        $stored_password = array_pop($cookie_data);
    }

    if(count($cookie_data) > 0)
    {
        $stored_username= array_pop($cookie_data);
    }

    // check the login
    $is_logged_in = is_username_password($stored_username, $stored_password);

    // action when logged in
    if($is_logged_in)
    {
        // logged in
        return;
    }

    // take action for login
    header("Location: ".URL_LOGIN);
    exit;
}





?>