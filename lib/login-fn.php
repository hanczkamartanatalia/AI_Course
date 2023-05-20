<?php

/* TODO
- hashowanie hasła
*/


function user_exist($login, $connect)
{
    $sql = "SELECT * FROM Login WHERE login='$login'";
    $result = $connect->query($sql);

    error_with_connect($sql, $connect);

    if ($result->num_rows == 0)
    {
        throw new Exception("Incorrect login.");
    } 

    $listDataOfAccount = $result->fetch_assoc();
    return $listDataOfAccount;
}

function verify_password($listDataOfAccount, $connect, $password)
{
    $passDB = trim($listDataOfAccount['login_Password']);
    $pass = trim($password);

    if($passDB !== $pass)
    {
        throw new Exception ("Incorrect login or password.");
    }
}


function error_with_connect($sql, $connect)
{
    if (!$result = $connect->query($sql))
    {
        throw new Exception("Error with connect. Try again leter.");
    }
}

function isAdmin($listDataOfAccount)
{
    $isAdmin = $listDataOfAccount['Admin'];

    if($isAdmin == 0)
    {
        header('Location: ../user/account.php');
    }
    else 
    {
        throw new Exception ("Not implemented yet.");
    }
}
?>