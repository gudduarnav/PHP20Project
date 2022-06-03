<?php

/*
 * newquestion.php
 * Add a New Question to the question bank
 */

require_once __DIR__."/../common/common.php";
login_required();

// id = paper ID
$id = read_param("id", 0);
$name = get_paper_name($id);
$qid = get_unique_id();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Question for Paper ID <?php echo $id.":".$name; ?>(Question ID: <?php echo $qid; ?>)</title>

    <link href="<?php echo URL_RES; ?>/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <!-- Begin TinyMCE -->
    <script src="<?php echo URL_RES; ?>/tinymce/tinymce.min.js" referrerpolicy="origin"></script>
    <script type="text/javascript">
    tinyMCE.init({
      selector:"textarea#question",
      height: "400"
    });
    </script>
    <!-- End TinyMCE -->


</head>

<body style="background-color: #e3f2fd;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">New Question for Paper ID <?php echo $id.":".$name; ?>(Question ID: <?php echo $qid; ?>)</a>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid justify-content-start">
        <a class="btn btn-primary" href="<?php echo URL_TEACHER.'openpaper.php?id='.$id; ?>">Back to Question Bank</a>
    </div>
</nav>

 <p class="container">

    <form method="POST" action="<?php echo URL_TEACHER.'savenewquestion.php'; ?>">
        <p class="container">
            <label for="id">Question Paper ID:</label>
            <input class="form-control-plaintext" type="text" readonly required id="id" name="id" value="<?php echo $id; ?>">
        </p>

        <p class="container">
            <label for="name">Question Paper Name:</label>
            <input class="form-control-plaintext" type="text" readonly required id="name" value="<?php echo get_paper_name($id); ?>">
        </p>

        <p class="container">
            <label for="qid">Question ID</label>
            <input class="form-control-plaintext" type="text" readonly required id="qid" name="qid" value="<?php echo $qid; ?>">
        </p>
        
        <p class="container" >
            <textarea id="question" name="question">Edit the Question here. Also specify Options A. B. C. D. </textarea>
        </p>

        <p class="container">
            Correct Answer is:

            <select class="form-control" id="option" name="option">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D" selected>D</option>
            </select>
        </p>

        <p class="container">
            <center>
                <button class="btn btn-success" type="submit">Save Question</button>
            </center>
        </p>

    </form>
</p>


<script src="<?php echo URL_RES; ?>/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>


</html>
