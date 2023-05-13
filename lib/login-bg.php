<?php

session_start();

//-------------------------DEV---------------------------------------------------//

ini_set('display_errors', 'On');
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);

//-------------------------LOGIN DATA--------------------------------------------//

$login = $_POST['login'];
$password = $_POST['password'];

//-------------------------FILES-------------------------------------------------//

require_once "../config/connect.php";
require_once "sql-bg.php";

//-------------------------CONNECT-----------------------------------------------//

$connect = connectToDataBase();

//-------------------------SQL---------------------------------------------------//

// Zabezpieczenie przed atakami SQL injection

$login = mysqli_real_escape_string($connect, $login);

$sql = "SELECT * FROM Login WHERE login='$login'"; // tworzenie zapytania szukającego loginu


if (!$result = $connect->query($sql)) // error with connect
{
    $connect->close();
    header('Location: ../user/login.php');
    exit();
}


if ($result->num_rows == 0) // user dont find
{
    $connect->close();
    header('Location: ../lib/login.php');
    exit();
} 

// user exist
$listDataOfAccount = $result->fetch_assoc(); // include name of columns


// hash password
$hash = $listDataOfAccount['login_Password'];


// incorrect password
if(password_verify($password,$hash)==false)
{
    $connect->close();
    header('Location: ../account.php');
    exit();
}

// correct password
$_SESSION['login'] = $listDataOfAccount['login'];
$_SESSION['id_application_userFK'] = $listDataOfAccount['id_application_userFK'];

$result->free();
$connect->close();

header('Location: ../user/account.php'); // jeśli strona nie zostanie znaleziona to wykonuje polecenie dalej

?>

