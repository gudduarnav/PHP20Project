<?php

/*
 * openpaper.php
 * Open a Question Paper
 */
require_once __DIR__."/../common/common.php";
login_required();

// id = paper ID
$id = read_param("id", 0);
$name = get_paper_name($id);

$list_of_question_id = get_question_id_list($id);
$count_question = 0; 
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo URL_RES; ?>/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Question Bank for Paper <?php echo $id.":".$name; ?></title>
</head>

<body style="background-color: #e3f2fd;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Question Bank for Paper <?php echo $id.":".$name; ?></a>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid justify-content-start">
        <a class="btn btn-primary" href="<?php echo URL_TEACHER; ?>">Question Paper List</a>
    </div>
</nav>

<p class="container">

<table border="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Correct Answer</th>
            <th></th>
        </tr>
    </thead>

    <tbody>

<?php
    foreach($list_of_question_id as $qid)
    {
        $count_question = $count_question + 1;
        $txt_question = get_question_text($id, $qid);
        $correct_answer = get_correct_answer_option($id, $qid);
?>

        <tr>
            <td class="text-primary"><?php echo $count_question; ?></td>
            <td><?php echo $txt_question; ?></td>
            <td class="text-success"><?php echo $correct_answer; ?></td>
            <td>
                <p class="row"><a class="btn btn-success" href="<?php echo URL_TEACHER.'editquestion.php?id='.$id.'&qid='.$qid; ?>">Edit</a></p>
                <p class="row"><a class="btn btn-danger" href="<?php echo URL_TEACHER.'deletequestion.php?id='.$id.'&qid='.$qid; ?>">Delete</a></p>
            </td>
        </tr>


<?php
    }
?>

        <tr>
           <td colspan="5">
               <p class="container">
                <center>
                    <a class="btn btn-success" href="<?php echo URL_TEACHER."newquestion.php?id=".$id; ?>">Add a New Question</a>
                </center>
               </p>
            </td>
        </tr>


    </tbody>
</table>

</p>

<script src="<?php echo URL_RES; ?>/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>