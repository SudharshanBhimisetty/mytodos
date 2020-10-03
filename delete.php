<?php

session_start();
if(isset($_GET["var"])){
    

    $var = $_GET["var"];

    require_once("connection.php");


        $r = "DELETE FROM todos WHERE text='$var'";
    
         mysqli_query($con,$r);

            $_SESSION["message"] = "Successfully deleted";
         header("location:main.php");




}


?>