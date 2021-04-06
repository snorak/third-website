<?php require_once "config/connection.php"; 

    session_start();

    

    if(isset($_SESSION['user'])) {
      header("Location:views/home.php");
    }
    else {
    include "views/login.php";
    }

    
?>
