<?php

session_start();




if(!isset($_SESSION['name'])){
    die("<h1>access denied</h1>");
}



if(isset($_POST["add"]) && strlen($_POST["todo"]) > 0){

$todo = $_POST["todo"];




require_once("connection.php");




$name = $_SESSION["name"];
$email = $_SESSION["email"];


$s = "SELECT * FROM users WHERE email = '$email' ";
$resultt = mysqli_query($con,$s);
$row = mysqli_fetch_assoc($resultt);


$userId = $row["user_id"];


$q = "INSERT INTO todos(text,user_id) VALUES ('$todo','$userId')";






if(mysqli_query($con,$q)){
    $_SESSION["message"] = "Successfully Added";
}

header("location:main.php");
return;
}
?>





<html>
<head>
<title>TODO APP</title>
<script src="https://kit.fontawesome.com/8337bf64cd.js"></script>
<link href="./styles/main.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

</head>

<body>


    <div class="heading">TODO LIST</div>


    <div class="name-logout">
        <p>HAI <?= $_SESSION["name"] ?></p>
        <p class="logout"><a href="logout.php">LOGOUT</a></p>
</div>






<div class="container">

 

<div class="message"><?=$_SESSION["message"] ?></div>

    <div class="box">
         <h3 class="box-heading">TO-DO list</h3>
         
         <form action="main.php" method="post">
    
            <input type="text" name="todo" placeholder="Add New Todo" autocomplete="off">
            <button type="submit" name="add">Add</button>

        </form>
            

        </div>
        <?php
    
  


    require_once("connection.php");
    
    $name = $_SESSION["name"];
    
        $r = "SELECT users.username,todos.text FROM users JOIN todos ON users.user_id = todos.user_id WHERE username = '$name'";
    
        $resultt = mysqli_query($con,$r);
    
        // $row = mysqli_fetch_assoc($resultt);
       
        ?>


        <div class="todos">

            <ul>
        <?php
        while($row = mysqli_fetch_assoc($resultt)){
            echo "<li>";
            echo($row['text']);
       
           echo "<span class='icon'><i class='far fa-trash-alt'></i></span></li>";
        }
        
        ?>
        </ul>
     
        </div>

</div>



<script>


    $("ul").on("click","li",function(){
    $(this).toggleClass("completed")
});

$("ul").on("click","span",function(event){
    $testing = $(this).parent().text();
    console.log($testing);
    console.log(encodeURIComponent($testing));
    window.location.href= "delete.php?var=" + encodeURIComponent($testing);
    $(this).parent().fadeOut(500,function(){
        $(this).remove();
    });
    // event.stopPropagation();
});

</script>;


</body>

</html>