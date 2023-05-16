<?php

session_start();

//-------------------------DEV---------------------------------------------------//

ini_set('display_errors', 'On');
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);

//-------------------------LOGIN DATA--------------------------------------------//

$name = $_SESSION['name'];
$lastname = $_SESSION['lastname'];

$email = $_SESSION['email'];
$password = $_SESSION['password'];

$login = $_SESSION['login'];

//-------------------------FILES-------------------------------------------------//

require_once "../config/connect.php";
require_once "sql-bg.php";

//-------------------------CONNECT-----------------------------------------------//

$connect = connectToDataBase();

//-------------------------SQL---------------------------------------------------//

$sqlLogin = "INSERT INTO `Login`(`login`, `login_Password`) VALUES ('$login', '$password')";

if ($connect -> query($sqlLogin) === TRUE) 
{
    echo "New record created successfully";
}
 else 
{
    header('Location: register.php'); 
}

$sql = "SELECT * FROM `Login` WHERE login = '$login'";

$result = $connect -> query($sql);

if($result)
{
    $listDataOfAccount = $result->fetch_assoc();
    $id_fk = $listDataOfAccount['id_login'];
}
else
{
    echo 'Error';
}

$sql = "INSERT INTO `Application_user`(`Name`, `Last_name`, `Email`,`id_login_FK`) VALUES ('$name','$lastname','$email','$id_fk')";

$result = $connect -> query($sql);

if($result)
{
    echo 'Created accaunt correct.';
}


 $result->free();
 $connect->close();
  ?>
