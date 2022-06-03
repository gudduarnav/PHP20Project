<?php

/*
 * saveeditquestion.php
 * Save the Question edited
 */

require_once __DIR__."/../common/common.php";

// id = paperid
// qid = question id
// question = question text
// option = correct option

$id = read_param("id", 0);
$qid = read_param("qid", 0);
$question_text = read_param("question" ,"");
$option = read_param("option", "D");

update_question_by_id($id, $qid, $question_text, $option);
header("Location: ".URL_TEACHER."openpaper.php?id=".$id);


?>