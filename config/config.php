<?php

$allowed_char= ['-','_','.'];

$dev = true;

function displayErrors()
{
    global $dev;
    if($dev = true)
    {
        ini_set( 'display_errors', 'On' );
        error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
    }
}


?>