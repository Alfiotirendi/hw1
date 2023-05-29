<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }

    if (!isset($_GET["q"])){
        echo "Error";
        exit;
    }
?>

<html>

  <head>
    <meta charset="utf-8">
    <title>Titolo del test</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="meal.css"/>
    <script src='meal.js' defer></script>

  </head>

  <body>
    <nav>
        <h2 id="tit">
            Foodify
        </h2>

        <div id="menu">
            <a href="main.php">Home</a>
            <a href="list.php">My list</a>
            <a href="Logout.php">Logout</a>

        </div>
    </nav>

    <section >
        <div class="databox"></div>





        <div class="meal">
           
            <div class="topbox">
                <div class="leftbox">
                    <div class="image">
                       
                    </div>
                   

                </div>
                <div class="rightbox">
                    <div id="namebox">
                        
                    </div>
                    <div class="instruction">
                        
                    </div>


                </div>
            </div>

            <div class="bottombox">
                
                <div class="info">

                </div>

                <div class="favourite">

                </div>


            </div>

        </div>


        <input type="hidden" name="mealid" value="<?php echo $_GET["q"];?>" id="idvalue">

        </div>
        
    </section>
    <footer>
        <span> Powered by Alfio Tirendi Antonio</span>
       <span>1000014567</span>
      </footer>


  </body>
</html>