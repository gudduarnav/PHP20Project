<?php

/*
 * Display Login Form
 */

require_once __DIR__."/common.php";
$e = read_param("e", 0);

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo URL_RES; ?>/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>LOGIN</title>
</head>

<body class="bg-dark">


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">LOGIN</a>
    </div>
    <div class="container-fluid justify-content-end">
        <a class="btn btn-success me-2" href="<?php echo URL_BASE; ?>">HOME</a>
    </div>

</nav>



<p>
<form class="bg-light mx-auto" style="width:32rem; padding: 1rem 1rem 1rem 1rem;" action="<?php echo URL_LOGIN_PROCESS; ?>" method="POST">
<?php
    if($e == 1)
    {
?>
    <div class="alert alert-danger" role="alert">
        Wrong credentials. Please try again...
    </div>

<?php
    }
?>


  <div class="form-group">
    <label for="username">Username:</label>
    <input type="username" class="form-control" placeholder="Enter Username" id="username" name="username">
  </div>
  <div class="form-group">
    <label for="password">Password:</label>
    <input type="password" class="form-control" placeholder="Enter password" id="password" name="password">
  </div>
  <div class="form-group" style="padding-top: 1rem;">
    <center><button type="submit" class="btn btn-primary">Login</button></center>
  </div>
</form>
</p>







<script src="<?php echo URL_RES; ?>/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>
</html>