<?php

/*
 * student/openpaper.php
 * Student opens the question paper
 */

require_once __DIR__."/../common/common.php";

// id = paper id
$id = read_param("id", 0);
$paper_name = get_paper_name($id);

$list_question_ids = get_question_id_list($id);
$count_questions = 0;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?php echo URL_RES; ?>/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title><?php echo $id.":".$paper_name; ?></title>

    <script type="text/javascript">  

(function (global) {

if(typeof (global) === "undefined") {
    throw new Error("window is undefined");
}

var _hash = "!";
var noBackPlease = function () {
    global.location.href += "#";

    // Making sure we have the fruit available for juice (^__^)
    global.setTimeout(function () {
        global.location.href += "!";
    }, 50);
};

global.onhashchange = function () {
    if (global.location.hash !== _hash) {
        global.location.hash = _hash;
    }
};

global.onload = function () {
    noBackPlease();

    // Disables backspace on page except on input fields and textarea..
    document.body.onkeydown = function (e) {
        var elm = e.target.nodeName.toLowerCase();
        if (e.which === 8 && (elm !== 'input' && elm  !== 'textarea')) {
            e.preventDefault();
        }
        // Stopping the event bubbling up the DOM tree...
        e.stopPropagation();
    };
}
})(window);



    </script>

</head>

<body style="background-color: #e3f2fd;">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?php echo $paper_name; ?></a>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid justify-content-start">
        <a class="navbar-brand text-success" href="#">Paper ID: <?php echo $id; ?></a>
    </div>

</nav>

<p class="container">

<form method="post" action="<?php echo URL_STUDENT."answersheet.php"; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">

<table border="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Question</th>
        </tr>
    </thead>
    <tbody>

<?php 
    foreach($list_question_ids as $qid)
    {
        $count_questions = $count_questions + 1;
        $question_text = get_question_text($id, $qid);
        $option_id = "option_".$qid;
?>
        <tr>
            <th class="text-primary"><?php echo $count_questions; ?></td>
            <td>
                <p><?php echo $question_text; ?></p>
                <hr>
                <p>
                    <select class="form-control" name="<?php echo $option_id; ?>" id="<?php echo $option_id; ?>">
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="Z" selected>Not Answered</option>
                    </select>
                </p>
                <hr>
            </td>

        </tr>


<?php
    }
?>


        <tr>
            <td colspan="2"><center><button class="btn btn-success" type="submit">Submit Answers and Complete the Exam</button></center></td>
        </tr>
    </tbody>
</table>


    

</form>


</p>

<script src="<?php echo URL_RES; ?>/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>