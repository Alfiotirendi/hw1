<?php 

require_once 'auth.php';

// Se la sessione è scaduta, esco
if (!checkAuth()) exit;

// Imposto l'header della risposta
header('Content-Type: application/json');

mealsearch();

function mealsearch() {
    $key = '1'; # in quetso caso la chiave è 1 perchè sto utilizzando la versione di prova,altrimenti avrei avuto una chiave vera e propria
     

    # query 
    $query = $_GET["q"];
    $url = 'https://www.themealdb.com/api/json/v1/'.$key.'/search.php?s='.$query;
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $res=curl_exec($ch);
    curl_close($ch);

    echo $res;
    
}
?>