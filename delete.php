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
$meal = mysqli_real_escape_string($conn, $_POST["meal"]);

$query = "DELETE FROM pref
        WHERE meal = '$meal' and idu = '$user'";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));


mysqli_close($conn);


    ?>
