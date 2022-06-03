<?php

/* 
 * deletequestion.php
 * Delete a question by id
 */

 require_once __DIR__."/../common/common.php";



// id= paper id
// qid = question id
$id = read_param("id", 0);
$qid = read_param("qid", 0);

delete_question_by_id($id, $qid);
header("Location: ".URL_TEACHER."openpaper.php?id=".$id);


?>