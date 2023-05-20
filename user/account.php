<?php

session_start();

require_once ("../config/config.php");
require_once ("../config/connect.php");
//require_once ("../lib/register-validate.php");

displayErrors();

echo $_SESSION['login']."\n";
echo $_SESSION['name'];

?>
