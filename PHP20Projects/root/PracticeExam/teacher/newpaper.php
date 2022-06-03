<?php


/*
 * newpaper.php
 * Create the new question paper
 */
require_once __DIR__."/../common/common.php";

// Arguments:
// id = unique ID of new question paper
// name= name of the question paper
$id = read_param("id", 0);
$name = read_param("name", 0);


// Save the Question Paper into the database
question_paper_create_new($id, $name);

// Redirect to Question paper list page
header("Location: ".URL_TEACHER);

?>