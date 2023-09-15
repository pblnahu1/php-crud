<?php 
    session_start();
    session_unset();
    // session_destroy();
    $_SESSION['mensaje'] = 'Se ha cerrado la sesión';
    header("Location: login.php");
    exit();
?>