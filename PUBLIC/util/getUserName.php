<?php 


require "../../APP/models/connectionDB.php";


session_start();
$response ;
$userName = $_SESSION['user']['fullName'];

$id =  $_SESSION['user']['id'];

$db = new connectDB();
$connection = $db->conn;

$stmt  = $connection->prepare('SELECT COALESCE(client.photo, rh.photo) AS photo
FROM user
LEFT JOIN client ON user.`ID-USER` = client.`id-user`
LEFT JOIN rh ON user.`ID-USER` = rh.`id-user`
WHERE user.`ID-USER` = :id');
$stmt->bindValue(":id",$id);
$stmt->execute();
$photo = $stmt->fetch();
$photo = 'data:image/jpeg;base64,'.base64_encode($photo['photo']); 


$response = [ 
    'userName'=>$userName, 
    'photo'=>$photo
];


echo json_encode($response);
