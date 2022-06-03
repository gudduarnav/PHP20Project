<?php

/*
 * dorenamepaper.php
 * ACTION Rename paper
 */

require_once __DIR__."/../common/common.php";

// id = Paper ID
// name = New Name


$id = read_param("id", 0);
$name = read_param("name", "");

if($id>0 && strlen($name)>0)
{
    rename_paper($id, $name);
}

header("Location: ".URL_TEACHER);

?>