<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
?>

<html>

  <head>
    <meta charset="utf-8">
    <title>my list</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="list.css"/>
    <script src='list.js' defer></script>

  </head>

  <body>
    <nav>
        <h2 id="tit">
            Foodify
        </h2>

        <div id="menu">
            <a href="main.php">Home</a>
            <div>My list</div>
            <a href="Logout.php">Logout</a>

        </div>
    </nav>

    <section >





<div class="list">
    Hi,<?php
    echo $_SESSION["session_username"]
    ?>, these are your favourite recipes:
</div>

<div class="gallery">

</div>



   
<div class="hiddenInput">
    <form action="meal.php" method="get">
    <input type="hidden" name="q" id="inputbutton" >
    </form>
</div>
    </section>
    <footer>
        <span> Powered by Alfio Tirendi Antonio</span>
       <span>1000014567</span>
       
      </footer>


  </body>
</html>