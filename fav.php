<?php 
    require_once 'auth.php';
    if (!$userid = checkAuth()) {
        header("Location: login.php");
        exit;
    }
require_once 'dbconf.php';

if (!isset($_GET["q"])) {
    echo "Non dovresti essere qui";
    exit;
}

header('Content-Type: application/json');

$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
$user = mysqli_real_escape_string($conn, $_SESSION["session_user_id"]);
$meal = mysqli_real_escape_string($conn, $_GET["q"]);

$query = "SELECT * FROM pref
            WHERE meal = '$meal'and idu = '$user'";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

mysqli_close($conn);

    ?>
