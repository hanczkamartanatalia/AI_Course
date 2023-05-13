<?php

function connectToDataBase()
{
    $host = "localhost";
    $user = "2024_nhanczka";
    $password = "Niebo.164";
    $dbname = "2024_nhanczka";
    $prefix = "prefix nazwy tabeli";

    // Create connection
    $link = new mysqli($host, $user, $password, $dbname);
    return $link;
}

function displayErrors()
{
    ini_set( 'display_errors', 'On' );
    error_reporting( E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);
}

?>


