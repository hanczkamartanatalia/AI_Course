<?php

session_start();

//-------------------------DEV---------------------------------------------------//

ini_set('display_errors', 'On');
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);

//-------------------------LOGIN DATA--------------------------------------------//

$name = $_POST['name'];
$lastname = $_POST['lastname'];

$email = $_POST['email'];
$password = $_POST['password'];

$passwordConfirm = $_POST['passwordConfirm'];
$login = $_POST['login'];

//-------------------------Check password with confirm password------------------//

if($password != $passwordConfirm)
{
    header('Location: ../user/register.php');
    exit();
}

//-------------------------FILES-------------------------------------------------//

require_once "../config/connect.php";
require_once "sql-bg.php";

//-------------------------CONNECT-----------------------------------------------//

$connect = connectToDataBase();

//-------------------------SQL---------------------------------------------------//

// $login = mysqli_real_escape_string($connect, $login);

// $sql_unique_login = "SELECT * FROM Login WHERE login = $login";

// $result = $connect->query($sql);

// // if (!$result = $connect->query($sql)) // error with connect
// // {
// //     $connect->close();
// //     header('Location: ../user/login-bg_copy.php');
// //     exit();
// // }

// if($result->num_rows != 0)
// {
//     $connect->close();
//     header('Location: ../user/sql_bg.php');
//     exit();
// }


$host = "localhost";
$user = "2024_nhanczka";
$pass = "Niebo.164";
$dbname = "2024_nhanczka";
$prefix = "prefix nazwy tabeli";

// Create connection
$link = new mysqli($host, $user, $pass, $dbname);

$sqlLogin = "INSERT INTO `Login`(`login`, `login_Password`) VALUES ('$login', '$password')";

if ($link -> query($sqlLogin) === TRUE) 
{
    echo "New record created successfully";
}
 else 
{
    echo "Error: " . $sql;
}

 //$result->free();
 $link->close();


// $sql= "SELECT id_login FROM `Login` WHERE login = $login";

// $result = $connect->query($sql);

// $listDataOfAccount = $result->fetch_assoc();

// $id_fk = $listDataOfAccount['id_login'];

// $sqlUser = "INSERT INTO `Application_user`(`Name`, `Last_name`, `Email`,`id_login_FK`) VALUES ($name,$lastname,$email,$id_fk)";

// $_SESSION['login'] = $login;
// $_SESSION['name'] = $name;
// $_SESSION['last_name'] = $lastname;
// $_SESSION['email'] = $email;
// $_SESSION['id_login_fk'] = $id_fk;

// $id_fk->free();
// $result->free();
// $connect->close();

// header('Location: ../user/account.php'); // jeśli strona nie zostanie znaleziona to wykonuje polecenie dalej

// ?>
