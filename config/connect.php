<?php

function connectToDataBase()
{
    $host = "localhost";
    $user = "2024_nhanczka";
    $password = "Niebo.164";
    $dbname = "2024_nhanczka";

    // Create connection
    $link = new mysqli($host, $user, $password, $dbname);
    return $link;
}



?>


