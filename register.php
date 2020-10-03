<?php


session_start();
$_SESSION["message"] = "";
if( isset($_POST["email"]) && isset($_POST["user"]) && isset($_POST["password"]) && strlen($_POST["user"]) > 0 && strlen($_POST["email"]) > 0 && strlen($_POST["password"]) > 0){



    require_once("connection.php");
$name = $_POST["user"];
$password = md5($_POST["password"]);
$email = $_POST["email"];
$_SESSION["email"] = $email;
$s  = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if($num == 1){

    $_SESSION["message"] = "Email already taken";
    

}else{

    $reg = "INSERT INTO users(username,email,password) VALUES ('$name','$email','$password')";
    mysqli_query($con,$reg);
    
    $_SESSION["name"] = $name;
    header("location:main.php");
    return;
}


}

?>                       
                        
                        
             <html>           
                 <head>
                     <title>Register | TODO APP</title>
                   
                     <link href="./styles/forms.css" rel="stylesheet">   
                 </head>
                 <body>

                 <div class="heading">TODO LIST</div>
                <div class="container">



                <div class="message"><?= $_SESSION["message"] ?></div> 
                        
     
       
                <div class="login-heading">Register</div>  

                                  <form action="register.php" method="post">
                                        <div class="form-group">
                                         <label>Username:<label><br>
                                        <input type="text" name="user" class="form-control" placeholder="username" required>
                                       </div>
                                      <div class="form-group">
                                       <label>Email:<label><br>
                                        <input  type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                                     </div>
                                        <div class="form-group">
                                       <label>Password:<label><br>
                                        <input  type="password" name="password" class="form-control"   required>
                                        </div>   
                                        <div class="form-group">
                                        <button type="submit" class="btn btn-primary"> Register </button>  
</div>                                                  
                                   </form>

                                   <div class="register-link"> or <a href="login.php"> login </a> here</div>
                                 
                               
                        </div>
                    </div>


                <body>
                        <html>