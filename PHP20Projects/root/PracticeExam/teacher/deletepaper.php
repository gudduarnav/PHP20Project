<?php

/*
 * deletepaper.php
 * Delete a Question Paper
 */

require_once __DIR__."/../common/common.php";

// id = paper id
$id = read_param("id", 0);
delete_paper($id);

header("Location:".URL_TEACHER);

?>


