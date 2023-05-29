<?php

    include 'auth.php';
    include 'dbconf.php';
    
   if (checkAuth()) {
    header('Location: main.php');
   exit;
  }

    if (!empty($_POST["username"]) && !empty($_POST["password"]) )
    {

        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        $username = mysqli_real_escape_string($conn, $_POST['username']);

        $query = "SELECT * FROM users WHERE username = '".$username."'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));;
        
        if (mysqli_num_rows($res) > 0) {
           
            $entry = mysqli_fetch_assoc($res);
            if (password_verify($_POST['password'], $entry['password'])) {


                $_SESSION["session_username"] = $entry['username'];
                $_SESSION["session_user_id"] = $entry['id'];
                header("Location: main.php");
                mysqli_free_result($res);
                mysqli_close($conn);
                exit;
            }
        }

        $error = "Invalid username or password";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {

        $error = "Complete all fields";
    }

?>
<html>

  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login.css"/>

  </head>

  <body>
<nav>
<div class="tit"> Foodify</div>

</nav>
<main>

<form  method='post' enctype="multipart/form-data" name="login" id="formlog">
<div>Log into Foodify</div>

    <label > Username  <input type="text" name="username"> </label>
          
    <label > Password  <input type="password" name="password" > </label>
     
  <label class="error" id="err"> 
    <?php    if (isset($error)) {
                    echo "$error";
                }?>      
  </label>

   
  <input type="submit" value= "Login" class="button" id="log" >
  <a href="signup.php"> Sign up for Foodify </a>
  

  
</form>
    
      
      

</main>
    <footer>
      <span> Powered by Alfio Tirendi Antonio</span>
     <span>1000014567</span>
     
    </footer>
  </body>
</html>
