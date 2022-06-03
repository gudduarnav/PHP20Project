<?php


/*
 * teacher/index.php 
 * Index page of Teacher page
 */

require_once __DIR__."/../common/common.php";
login_required();

$details_question_papers = get_list_question_papers();

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="<?php echo URL_RES; ?>/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Teacher-Question Paper Section</title>
</head>

<body style="background-color: #e3f2fd;">


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Teacher-Question Paper Section</a>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid justify-content-start">
        <a class="btn btn-primary me-2" href="<?php echo URL_BASE; ?>">Home</a>
        <a class="btn btn-danger me-2" href="<?php echo URL_LOGOUT; ?>">Logout</a>
    </div>

</nav>





<!-- Create New Question Paper -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
    <div class="container-fluid justify-content-start">
        <a class="navbar-brand" href="<?php echo URL_BASE; ?>">Create new Question Paper</a>
    </div>
</nav>
<p class="container">
    <form class="row" method="get" action="<?php echo URL_TEACHER; ?>newpaper.php">
        <div class="col-auto">
            <label for="id">Paper ID:</label>
            <input class="form-control-plaintext" type="text" name="id" id="id" value="<?php echo get_unique_id(); ?>" readonly>
        </div>

        <div class="col-auto">
            <label for="id">Paper Name:</label>
            <input class="form-control" type="text" name="name" id="name" required>
        </div>

        <div class="col-auto">
            <br>
            <button class="btn btn-success mb-3" type="submit">Create the Question Paper</button>
        </div>
        
    </form>
</p>

<hr>

<!-- List all the Question Papers and allow the user to: Select, Rename, Delete -->
<p class="container">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid justify-content-start">
        <a class="navbar-brand" href="<?php echo URL_BASE; ?>">List of Question Paper</a>
    </div>
</nav>

<table border="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">No. of Questions</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>

<?php
    foreach($details_question_papers as $one_question_paper)
    {
?>
        <tr>
            <td scope="row"><?php echo $one_question_paper["ID"]; ?></td>
            <td><?php echo $one_question_paper["NAME"]; ?></td>
            <td><?php echo $one_question_paper["COUNT"]; ?></td>
            <td>
                <p class="row"><a class="btn btn-success" href="<?php echo URL_TEACHER.'openpaper.php?id='.$one_question_paper["ID"]; ?>">Open</a></p>
                
                <p class="row"><a class="btn btn-info" href="<?php echo URL_TEACHER.'renamepaper.php?id='.$one_question_paper["ID"]; ?>">Rename</a></p>
                
                <p class="row"> <a class="btn btn-danger" href="<?php echo URL_TEACHER.'deletepaper.php?id='.$one_question_paper["ID"]; ?>">Delete</a></p>
            </td>
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