<?php

    include 'auth.php';
    include 'dbconf.php';
    
   if (checkAuth()) {
    header('Location: main.php');
   exit;
}



?>
<html>

  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="home.css"/>

  </head>

  <body>
<nav>
<div class="tit"> Foodify</div>

</nav>
<main>
<div>Foodify, your recipes catalog</div>
<a href="login.php" class="button">Enter now</a>


</main>
    <footer>
      <span> Powered by Alfio Tirendi Antonio</span>
     <span>1000014567</span>
     
    </footer>
  </body>
</html>
