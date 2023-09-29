<?php 
    session_start();
    session_unset();
    // session_destroy();
    $_SESSION['mensaje'] = 'Se ha cerrado la sesión';
    //unset($_SESSION['email_usuario']);
    header("Location: login.php");
    exit();
?>
