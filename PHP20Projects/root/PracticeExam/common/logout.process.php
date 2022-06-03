<?php

/*
 * Logout
 */
require_once __DIR__."/common.php";

// Logout process
reset_cookie(TEACHER_LOGIN_COOKIENAME);

// Redirect to home page
header("Location: ".URL_AFTER_LOGOUT_SUCCESS);

?>
