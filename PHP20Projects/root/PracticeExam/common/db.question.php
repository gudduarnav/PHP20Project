<?php


/*
 * db.question.php
 * Question Paper API
 */

// Create a New Question Paper using a unique ID and unqiue Name
function question_paper_create_new($id, $name)
{
    $sql_query = "INSERT INTO ".TABLE_QUESTIONPAPER." VALUES ($id, '$name')";
    return query_db($sql_query);
}

// Return a list of Question Paper ID, Name
function get_list_question_papers()
{
    $results = query_db("SELECT ID, NAME FROM ".TABLE_QUESTIONPAPER);
    $data = array();
    if($results->num_rows>0)
    {
        while($row=$results->fetch_assoc())
        {
            $count_questions = get_question_count_by_paper_id($row["ID"]);
            $row["COUNT"] = $count_questions;
            array_push($data, $row);
        }
    }
    return $data;    
}

// Get the count of questions given the paper id
function get_question_count_by_paper_id($id)
{
    $query = "SELECT COUNT(ID) AS COUNT FROM ". TABLE_QUESTIONBANK." WHERE PAPERID=$id LIMIT 1";
    $results = query_db($query);
    if($results->num_rows > 0)
    {
        $row = $results->fetch_assoc();
        return $row["COUNT"];
    }
    return -1;
}

// Get name of paper by paper id
function get_paper_name($id)
{
    $query = "SELECT NAME FROM ".TABLE_QUESTIONPAPER." WHERE ID=$id LIMIT 1";
    $results = query_db($query);
    if($results->num_rows > 0)
    {
        $row = $results->fetch_assoc();
        return $row["NAME"];
    }
    return false;
}


// Rename the question paper by id
function rename_paper($id, $name)
{
    $query = "UPDATE ".TABLE_QUESTIONPAPER." SET NAME='$name' WHERE ID=$id";
    return query_db($query);
}

// Delete a question paper by id
function delete_paper($id)
{
    $query = "DELETE FROM ".TABLE_QUESTIONBANK." WHERE PAPERID=".$id;
    query_db($query);
    
    $query = "DELETE FROM ".TABLE_QUESTIONPAPER." WHERE ID=".$id;
    return query_db($query);    
}

// Save a new question
function save_new_question($id, $qid, $question_txt, $option)
{
    $encoded_question_txt = convert_text_to_binary_string($question_txt);
    $query = "INSERT INTO ".TABLE_QUESTIONBANK." VALUES ($qid, $id, '$encoded_question_txt', '$option')";
    return query_db($query);
}

// get question IDs list
function get_question_id_list($paperid)
{
    $query = "SELECT ID FROM ".TABLE_QUESTIONBANK." WHERE PAPERID=$paperid";
    $results = query_db($query);
    $data = array();
    if($results->num_rows > 0)
    {
        while($row = $results->fetch_assoc())
        {
            array_push($data, $row["ID"]);
        }
    }
    return $data;
}

// get the question html text
function get_question_text($paperid, $qid)
{
    $query="SELECT QUESTIONFILE FROM ".TABLE_QUESTIONBANK." WHERE ID=$qid AND PAPERID=$paperid LIMIT 1";
    $results = query_db($query);
    if($results->num_rows > 0 )
    {
        $row = $results->fetch_assoc();
        $questionfile = $row["QUESTIONFILE"];
        return convert_binary_string_to_text($questionfile);
    }
    return false;
}


// get the correct answer option
function get_correct_answer_option($paperid, $qid)
{
    $query = "SELECT CORRECTANSWER FROM ".TABLE_QUESTIONBANK." WHERE ID=$qid AND PAPERID=$paperid LIMIT 1";
    $results = query_db($query);
    if($results->num_rows > 0)
    {
        $row = $results->fetch_assoc();
        return $row["CORRECTANSWER"];
    }
    return "D";
}

// Delete a Question from questionbank by paperid and question id
function delete_question_by_id($paperid, $qid)
{
    $query = "DELETE FROM ".TABLE_QUESTIONBANK." WHERE ID=$qid AND PAPERID=$paperid";
    return query_db($query);
}


// Update a Question By ID
function update_question_by_id($paperid, $qid, $question_txt, $option)
{
    $encoded_question_txt = convert_text_to_binary_string($question_txt);
    $query = "UPDATE ".TABLE_QUESTIONBANK." SET QUESTIONFILE='".$encoded_question_txt."', CORRECTANSWER='".$option."' WHERE ID=$qid AND PAPERID=$paperid";
   return query_db($query);
}


?>