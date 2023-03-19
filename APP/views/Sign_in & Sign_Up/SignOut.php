<?php 
  
  session_start();
  unset($_SESSION['user']);
  unset($_SESSION['id']);

 
  if(!isset($_SESSION['user'])){ 
    header("Location: SignIn.php");
  }
?> 
