<?php

    session_start();

    function checkAuth() {
        // Se esiste già una sessione, la ritorno, altrimenti ritorno 0
        if(isset($_SESSION['session_user_id'])) {
            return $_SESSION['session_user_id'];
        } else 
            return 0;
    }
?>