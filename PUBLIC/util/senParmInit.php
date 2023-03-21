<?php 

require "../../APP/models/RH_models/connectionDB.php";


session_start();
$response ;
$id =  $_SESSION['user']['id'];


  $recruiter = getRecruteurById($id);
$post = getParamInit($recruiter['id_RH']);

$response = [ 
    'post'=>$post

];


echo json_encode($response);
