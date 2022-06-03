<?php

/*
 * index.php
 */
require_once __DIR__."/common/common.php";


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo URL_RES; ?>/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Practice Exam</title>
</head>

<body style="background-color: #e3f2fd;">


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Practice Exam</a>
    </div>

</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid justify-content-start">
        <a class="btn btn-primary me-2" href="<?php echo URL_STUDENT; ?>">Student</a>
        <a class="btn btn-success me-2" href="<?php echo URL_TEACHER; ?>">Teacher</a>
    </div>

</nav>





<script src="<?php echo URL_RES; ?>/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>