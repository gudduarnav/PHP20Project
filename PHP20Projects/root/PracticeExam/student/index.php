<?php


/*
 * student/index.php 
 * Index page of Student page
 */

require_once __DIR__."/../common/common.php";


$details_question_papers = get_list_question_papers();
$count_question_paper = 0;
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo URL_RES; ?>/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


    <title>Students - Question Paper List</title>
</head>

<body style="background-color: #e3f2fd;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Students - Question Paper List</a>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid justify-content-start">
        <a class="btn btn-primary me-2" href="<?php echo URL_BASE; ?>">Home</a>
    </div>

</nav>



<!-- List all the Question Papers and allow the user to: Select, Rename, Delete -->
<p class="container">
<table border="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>Name</th>
            <th>No. of Questions</th>
        </tr>
    </thead>
    <tbody>

<?php
    foreach($details_question_papers as $one_question_paper)
    {
        $url = URL_STUDENT."openpaper.php?id=".$one_question_paper["ID"];
        if($one_question_paper["COUNT"]<1)
        {
            continue;
        }
        $count_question_paper = $count_question_paper + 1;
?>
        <tr>
            <td><?php echo $count_question_paper; ?></td>
            <td><a href="<?php echo $url; ?>" class="link-success text-decoration-none"><?php echo $one_question_paper["ID"]; ?></a></td>
            <td><a href="<?php echo $url; ?>" class="link-primary text-decoration-none"><?php echo $one_question_paper["NAME"]; ?></a></td>
            <td><?php echo $one_question_paper["COUNT"]; ?></td>
        </tr>
<?php
    }
?>

    </tbody>
</table>
</p>
<hr>



<!-- End of Page -->

<script src="<?php echo URL_RES; ?>/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>