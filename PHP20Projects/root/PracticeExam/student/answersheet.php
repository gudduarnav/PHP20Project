<?php

/*
 * answersheet.php
 * Answer sheet evaluation
 */

require_once __DIR__."/../common/common.php";

// id = paperid
// option_[qid] = A | B | C | D | 0 (Not Answered)

$id = read_param("id", 0);

$paper_name = get_paper_name($id);

$list_question_ids = get_question_id_list($id);

$correct_answer = 0;
$incorrect_answer = 0;
$un_answered = 0;
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
        <a class="navbar-brand" href="#"><?php echo $paper_name; ?> (Paper ID: <?php echo $id; ?>)</a>
    </div>
</nav>

<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid justify-content-start">
        <a class="btn btn-primary" href="<?php echo URL_STUDENT; ?>">Goto Question Paper List</a>
    </div>

</nav>


<p class="container">

<table border="0" class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Question</th>
            <th>Selected Answer</th>
            <th>Correct Answer</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>

<?php 
    foreach($list_question_ids as $qid)
    {
        $question_text = get_question_text($id, $qid);
        $option_id = "option_".$qid;

        $option_user = read_param($option_id, "Z");
        $option_correct = get_correct_answer_option($id, $qid);

        $status = "";

        $count_questions = $count_questions + 1;
        $classname = "text-success";
        if(strcmp($option_user, "Z") == 0)
        {
            $un_answered = $un_answered + 1;
        }
        else if(strcmp($option_user, $option_correct) == 0)
        {
            $correct_answer = $correct_answer + 1;
            $status = "CORRECT";
        }
        else 
        {
            $incorrect_answer = $incorrect_answer + 1;
            $status = "WRONG";
            $classname="text-danger";
        }

?>
        <tr>
            <td class="text-primary"><?php echo $count_questions; ?></td>
            <td><?php echo $question_text; ?></td>
            <td class="<?php echo $classname; ?>">
                <?php 
                    if(strcmp($option_user, "Z")==0)
                        echo "Not Answered";
                    else
                        echo $option_user;
                ?>

            </td>
            <td class="text-success"><?php echo $option_correct; ?></td>
            <td class="<?php echo $classname; ?>"><?php echo $status; ?></td>

        </tr>


<?php
    }
?>


    </tbody>
</table>

</p>

<hr>

<p class="container">
<!-- Score List -->
<table border="0" class="table table-striped table-hover">

    <tr>
        <th colspan="3"><center>SCORE CARD</center></th>
    </tr>

    <tr class="text-success">
        <td>Correct:</td>
        <td><?php echo $correct_answer; ?></td>
        <td><?php echo round($correct_answer*100.0/$count_questions,2); ?> %</td>
    </tr>


    <tr class="text-danger">
        <td>Wrong:</td>
        <td><?php echo $incorrect_answer; ?></td>
        <td><?php echo round($incorrect_answer*100.0/$count_questions,2); ?> %</td>
    </tr>

    <tr class="text-secondary">
        <td>Not Answered:</td>
        <td><?php echo $un_answered; ?></td>
        <td><?php echo round($un_answered*100.0/$count_questions,2); ?> %</td>
    </tr>

    <tr class="text-primary">
        <th>Total:</th>
        <th><?php echo $count_questions; ?></th>
        <th><?php echo round($count_questions*100.0/$count_questions,2); ?> %</th>
    </tr>



</table>
    
</p>

<hr>




<script src="<?php echo URL_RES; ?>/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>