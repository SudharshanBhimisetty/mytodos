<?php

session_start();
if(isset($_GET["var"])){
    

    // $var = decodeURIComponent($_GET["var"]);

    $var = urldecode($_GET["var"]);


    require_once("connection.php");


        $r = "DELETE FROM todos WHERE text='$var'";
    
        if(mysqli_query($con,$r)){
         

            $_SESSION["message"] = "Successfully deleted";
         header("location:main.php");


        }

}


?>