<?php
session_start();

$_SESSION['location'] = '';

if(file_exists("lib/is_login.php"))include("lib/is_login.php"); 
if(file_exists("include/main.php"))include("include/main.php");
if(file_exists("include/footer.php")) include("include/footer.php");


    //if(file_exists("include/course.php"))include("include/course.php");
    //if(file_exists("include/learn.php"))include("include/learn.php");
    //if(file_exists("include/top.php"))include("include/top.php");
    //if(file_exists("include/info.php"))include("include/info.php");
    //if(file_exists("include/team.php"))include("include/team.php");
    //if(file_exists("include/next_step.php"))include("include/next_step.php");

?>
