<?php

/*
 * savenewquestion.php
 * Save the New Question
 */

require_once __DIR__."/../common/common.php";

// id = paper id
// qid= question id (new)
// question = html text of question
// option= correct answer (A, B, C, D)

$id = read_param("id", 0);
$qid = read_param("qid", 0);
$question_text = read_param("question", false);
$option = read_param("option", false);

if($id <= 0 || $qid <= 0)
{
    header_location("Location: ".URL_TEACHER);
    exit;
}

if(!$question_text || !$option)
{
    header_location("Location: ".URL_TEACHER);
    exit;
}

if(strlen($question_text) < 1)
{
    header_location("Location: ".URL_TEACHER);
    exit;
}

if(strcmp($option, "A") ==0 || strcmp($option, "B") == 0 || strcmp($option, "C")==0 || strcmp($option, "D")==0)
{
    // correct option
}
else
{
    header_location("Location: ".URL_TEACHER);
    exit;

}

save_new_question($id, $qid, $question_text, $option);

header("Location: ".URL_TEACHER."openpaper.php?id=".$id);
?>