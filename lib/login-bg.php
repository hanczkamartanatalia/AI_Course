<?php

session_start();

//-------------------------FILES-------------------------------------------------//

require_once "../config/connect.php";
require_once "../config/config.php";
require_once "login-fn.php";


//-------------------------DEV---------------------------------------------------//

displayErrors();

$login = $_POST['login'];
$password = $_POST['password'];

$connect = connectToDataBase();

try
{
    $listDataOfAccount = user_exist($login,$connect);
    verify_password($listDataOfAccount, $connect, $password);
    
    $_SESSION['login'] = $listDataOfAccount['login'];
    isAdmin($listDataOfAccount);
}
catch(Exception $ex)
{
    $_SESSION['error'] = $ex->getMessage();
    header('Location: ../user/login.php');
}

$connect->close();

?>
