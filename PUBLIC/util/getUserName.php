<?php 

session_start();

$userName = $_SESSION['user']['fullName'];
 

echo json_encode($userName);
