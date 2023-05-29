<?php
require_once 'auth.php';
require_once 'dbconf.php';

    if (checkAuth()) {
        header("Location: main.php");
        exit;
    }   

    if (!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["passwordcnf"]))
    {
        $error = array();
        $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
            $error[] = "Invalid username";
        } else {
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $query = "SELECT username FROM users WHERE username = '$username'";
            $res = mysqli_query($conn, $query);
            if (mysqli_num_rows($res) > 0) {
                $error[] = "This username is already taken";
            }
        }

        if (strlen($_POST["password"]) < 8) {
            $error[] = "This password is too short";
        } 

        if (strcmp($_POST["password"], $_POST["passwordcnf"]) != 0) {
            $error[] = "Passwords are not the same";
        }
      


      if (count($error) == 0) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $password = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users(username, password) VALUES('$username', '$password')";
        
        if (mysqli_query($conn, $query)) {
            $_SESSION["session_username"] = $_POST["username"];
            $_SESSION["session_id"] = mysqli_insert_id($conn);
            mysqli_close($conn);
            header("Location: main.php");
            exit;
        } else {
            $error[] = "Database error";
        }
    }

    mysqli_close($conn);
  }
  else if (isset($_POST["username"])) {
    $error = array("Some fields are empty");
  }
?>

<html>

  <head>
    <meta charset="utf-8">
    <title>Signup</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="signup.css"/>
    <script src='signup.js' defer></script>

  </head>

  <body>
<nav>
<div class="tit"> Foodify</div>

</nav>
<main>
    <form  method='post' enctype="multipart/form-data" name="login" id="formsign">
    <div>Create a new account</div>
    <label > Username  <input type="text" name="username" id="usr"> </label>
          
    <label > Password  <input type="password" name="password" id="pwd" > </label>

    <label > Conferma Password  <input type="password" name="passwordcnf" id="pwdcnf" > </label>
     
  <label class="error" id="err"> 
     <?php
      if(isset($error)) {
            echo "$error[0]";
        
      }
     ?>
  </label>

  <input type="submit" value= "Sign up" class="button" id="sign" >
  
  <a href="login.php"> Already have an account?</a>
</form>
    
      
      

</main>
    <footer>
      <span> Powered by Alfio Tirendi Antonio</span>
     <span>1000014567</span>
    </footer>
  </body>
</html>