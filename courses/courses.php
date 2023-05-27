<?php

if(file_exists("include/header.php")) include("include/header.php");

if($count_error>0){
    echo "<div class='container py-5'>\n";
    for($e = 0; $e < $count_error; $e++){
        echo "<p class='alert alert-warning'>".$error[$e]."</p>\n";
    }
    echo "</div>\n";
} 
else{
    if(file_exists("include/courses.php"))include("include/courses.php");
    if(file_exists("include/course.php"))include("include/course.php");
    if(file_exists("include/top.php"))include("include/top.php");
    if(file_exists("include/services.php"))include("include/services.php");
}

if(file_exists("include/footer.php")) include("include/footer.php");

//  if($_GET[w]=="wynik") {
//     include("wynik.php");
//  } else {
//     include("middle.php");
//  }

//  include("footer.php")
?>
