<?php

/*
 * bintext.txt
 * Binary Text
 */

// Convert text to binary string
function convert_text_to_binary_string($txt)
{
    return htmlentities($txt, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401);
}

// Convert binary text to text
function convert_binary_string_to_text($binstr)
{
    return html_entity_decode($binstr, ENT_QUOTES | ENT_SUBSTITUTE | ENT_HTML401);
}


?>