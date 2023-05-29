<?php 

    require_once 'dbconf.php';
    require_once 'auth.php';
   // if (!$userid = checkAuth()) exit;

    


    if(isset($_POST["meal"]))
			  {
					// Connessione al database
					$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
					
					$meal = mysqli_real_escape_string($conn, $_POST["meal"]);
                    $query = "SELECT * from pref where meal = '".$meal."'";
					$res = mysqli_query($conn, $query);
					$num = mysqli_num_rows($res);
					mysqli_close($conn);
                    echo $num;
                    exit;
			  }

              else echo ("erroree");

    ?>
