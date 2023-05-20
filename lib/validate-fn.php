<?php 
//------------------------------files----------------------------------//

require_once ("../config/config.php");
require_once ("../config/connect.php");

//------------------------------auxiliary functions--------------------//
function length_of_text_between_min_and_max($text, $min_value = 8 , $max_value = 20)
{
    if (mb_strlen($text) > $max_value || mb_strlen($text) < $min_value )
    {
        return false;
    }
    else return true;
}

function text_contain_only_letters($text)
{
    if(!ctype_alpha($text))
    {
        return false;
    }
    else return true;
}

//--------------------------Validate-----------------------------------//

function validate_name($name)
{
    if(!length_of_text_between_min_and_max($name,2) || !text_contain_only_letters($name))
    {
        throw new Exception ('Invalid name. The name must contain characters between 2 and 20');
    }    
}

function validate_last_name($last_name)
{
    if(!length_of_text_between_min_and_max($last_name,2) || !text_contain_only_letters($last_name))
    {
        throw new Exception ('Invalid last name. The last name must contain characters between 2 and 20');
    }
}


function validate_password($password, $password_Confirm)
{
    if($password != $password_Confirm) 
    {
        throw new Exception('Invalid password. Password and confirm password must by equal.');
    }

    if(!length_of_text_between_min_and_max($password))
    {
        throw new Exception('Invalid password. Password must contain characters between 8 and 20');
    }
}

function validate_email($email)
{
    if(!length_of_text_between_min_and_max($email,5,40))
    {
        throw new Exception ("Invalid email. The email '$email' must contain characters between 6 and 40.");
    }
}


function validate_login($login)
{
    if(!length_of_text_between_min_and_max($login,1))
    {
        throw new Exception ('Invalid Login. The login must contain only 20 characters.');
    }

    $sql = "SELECT * FROM `Login` WHERE login = '$login'";

    $connect = connectToDataBase();

    $result = $connect->query($sql);

    //$connect.close();

    if($result->num_rows !=0)
    {
        throw new Exception ("Invalid login. Login $login is not unique.");
    }
}

?>