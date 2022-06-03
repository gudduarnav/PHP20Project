<?php

/*
 * renamepaper.php
 * Rename the Question Paper
 */

require_once __DIR__."/../common/common.php";
login_required();

// id = question paper id
$id = read_param("id", 0);
$name = get_paper_name($id);
if(!$name)
{
    header("Location: ".URL_TEACHER);
    exit;
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo URL_RES; ?>/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

   
    <title>Rename Question Paper <?php echo $id.":".$name; ?></title>
</head>

<body style="background-color: #e3f2fd;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Rename Question Paper <?php echo $id.":".$name; ?></a>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid justify-content-start">
        <a class="btn btn-danger" href="<?php echo URL_TEACHER; ?>">Return to Question Paper Selection</a>
    </div>

</nav>


<p class="container">
    <form method="POST" action="<?php echo URL_TEACHER; ?>dorenamepaper.php"> 

        <p class="container">
            <label for="id">Question Paper ID:</label>        
            <input class="form-control-plaintext" type="text" id="id" name="id" readonly value="<?php echo $id; ?>">
        </p>

        <p class="container">
            <label for="oldname">From Name:</label>
            <input class="form-control-plaintext" type="text" id="oldname" readonly value="<?php echo $name; ?>">
        </p>

        <p class="container">
            <label for="name">To Name:</label>
            <input class="form-control" type="text" id="name" name="name" required value="<?php echo $name; ?>">
        </p>
           <p class="container"> <button class="btn btn-success" type="submit">Rename</button> </p>
            
        </p>

    </form>
</p>


    <script src="<?php echo URL_RES; ?>/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>