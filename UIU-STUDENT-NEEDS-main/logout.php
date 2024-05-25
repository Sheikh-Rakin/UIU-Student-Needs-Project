<?php 
    session_start();
    
    // terminating session
    session_unset();
    session_destroy();
    
    header("Location: index.php");
?>