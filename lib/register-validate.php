<?php

//-------------------------DEV---------------------------------------------------//

ini_set('display_errors', 'On');
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);


//-------------------------FILES------------------------------------------------//

require_once("register-validate.php");
require_once("validate-fn.php");


//-------------------------SESSION-----------------------------------------------//

session_start();

//-------------------------LOGIN DATA--------------------------------------------//

$name = $_POST['name'];
$lastname = $_POST['lastname'];

$email = $_POST['email'];
$password = $_POST['password'];

$password_Confirm = $_POST['passwordConfirm'];
$login = $_POST['login'];

//-------------------------Validate values-------------------------------------------//

try
{
    validate_name($name);
    $_SESSION['name'] = $name;

    validate_last_name($lastname);
    $_SESSION['lastname'] = $lastname;

    validate_login($login);
    $_SESSION['login'] = $login;

    validate_email($email);
    $_SESSION['email'] = $email;
    
    
    validate_password($password,$password_Confirm);
    $_SESSION['password'] = $password;   
    
    
    $_SESSION['error'] ="";
    header('Location: register-bg.php');

}
catch(Exception $ex)
{
    $_SESSION['error'] = $ex->getMessage();
    header('Location: ../user/register.php');
}

?>