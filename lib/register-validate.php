<?php

//-------------------------DEV---------------------------------------------------//

ini_set('display_errors', 'On');
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);


//-------------------------Screen next step-------------------------------------//
if($count_error>0){
    echo "<div class='container py-5'>\n";
    for($e = 0; $e < $count_error; $e++){
        echo "<p class='alert alert-warning'>".$error[$e]."</p>\n";
    }
    echo "</div>\n";
} 
else{
    if(file_exists("./include/next_step.php"))include("./include/next_step.php");
}

require_once("register-validate.php");


//-------------------------SESSION-----------------------------------------------//

session_start();

//-------------------------LOGIN DATA--------------------------------------------//

$name = $_POST['name'];
$lastname = $_POST['lastname'];

$email = $_POST['email'];
$password = $_POST['password'];

$password_Confirm = $_POST['passwordConfirm'];
$login = $_POST['login'];

//-------------------------Check 'password' with 'confirm password'------------------//




//-------------------------Validate name-------------------------------------------//

try
{
    validate_email($email);
    validate_last_name($lastname);
    validate_name($name);
    validate_password($password,$password_Confirm);
    validate_login($login);
}
catch(Exception)
{
 
}


$_SESSION['name'] = $name;
$_SESSION['lastname'] = $lastname;

$_SESSION['email'] = $email;
$_SESSION['password'] = $password;

$_SESSION['login'] = $login;

?>