<?php

session_start();
$_SESSION["message"] = "";
if( isset($_POST["email"]) && isset($_POST["password"]) && strlen($_POST["email"]) > 0 && strlen($_POST["password"]) > 0){

    



    require_once("connection.php");


$password = md5($_POST["password"]);
$email = $_POST["email"];

$_SESSION["email"] = $email;

$s  = "SELECT * FROM users WHERE email = '$email' && password = '$password' ";


$result = mysqli_query($con,$s);

$num = mysqli_num_rows($result);

if($num == 1){
   
    $resultt = mysqli_query($con,$s);
    $row = mysqli_fetch_assoc($resultt);

   
    $_SESSION["name"] = $row["username"];

    header("location:main.php");
    return;
}else{
    $_SESSION["message"] = "Email or Password is incorrect";

   
}




}

?>

                      
  <html>
      <head>
        <title>LOGIN | TODO APP</title>
        <link href="./styles/forms.css" rel="stylesheet">    
      <head>
          <body>

            <div class="heading">TODO LIST</div>
                <div class="container">



                       <div class="message"><?= $_SESSION["message"] ?></div> 
                        

                        <div class="login-heading">Login</div>
                       <form action="login.php" method="post">
                            <div class="form-group">
                                <label>Email:<label><br>
                                <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required>
                            </div>
                            <div class="form-group">
                                <label>Password:<label><br>
                                <input type="password" name="password" class="form-control" required>
                            </div>   
                            <div class="form-group">
                                <button type="submit"> Login </button>                                                    
                            </div>
                        </form>

                        <div class="register-link"> or <a href="register.php"> register </a> here</div>
                </div>
        </body>
  </html>                      
                        
                        
                                                

