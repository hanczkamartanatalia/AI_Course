<?php 

/* TODO 
1. Special char in login and password, accepted -_.
2. validate login - unique value

*/

//------------------------------auxiliary functions--------------------//
function length_of_text_between_min_and_max($text, $min_value = 8 , $max_value = 20)
{
    if (mb.strlen($text) > $max_value || mb.strlen($text) < $min_value )
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
    if(length_of_text_between_min_and_max($name,2) == false || text_contain_only_letters($name)==false)
    {
        throw new Exception ('Invalid name. The name must contain characters between 2 and 20');
    }
}

function validate_last_name($last_name)
{
    if(length_of_text_between_min_and_max($last_name,2) == false || text_contain_only_letters($last_name)==false)
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

    if(length_of_text_between_min_and_max($password) == false)
    {
        throw new Exception('Invalid password. Password must contain characters between 8 and 20');
    }
}

function validate_email($email)
{
    if(length_of_text_between_min_and_max($email,1,40))
    {
        throw new Exception ('Invalid email. The email must contain only 40 characters.');
    }
}


function validate_login($login)
{
    if(length_of_text_between_min_and_max($login,1))
    {
        throw new Exception ('Invalid email. The email must contain only 20 characters.');
    }
}

?>