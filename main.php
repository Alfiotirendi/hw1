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
    <title>Main</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css"/>
    <script src='main.js' defer></script>

  </head>

  <body>
    <nav>
        <h2 id="tit">
            Foodify
        </h2>

        <div id="menu">
            <div>Home</div>
            <a href="list.php">My list</a>
            <a href="Logout.php">Logout</a>

        </div>
    </nav>

    <section >

<div class="welcome">
    Welcome, here you will have all the recipes you want at your disposal
</div>

<div class="search">
    <div>Search your favourite recipe:</div>
    <form>
    <input type="text" name="search" id="searchbar" > <input type="submit" value="Search">
</form>
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