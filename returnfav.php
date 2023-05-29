<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
require_once 'dbconf.php';



header('Content-Type: application/json');

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
$user = mysqli_real_escape_string($conn, $_SESSION["session_user_id"]);
;

$query = "SELECT * FROM pref
            WHERE idu = '$user'";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

while($entry = mysqli_fetch_assoc($res)) {
    // Scorro i risultati ottenuti e creo l'elenco di post
    
    $Meals[] = (array('strMeal' => $entry['meal'],
                        'strCategory' => $entry['category'], 'strMealThumb' => ($entry['imageurl'])));}

 echo json_encode($Meals);

mysqli_close($conn);
exit;

    ?>
