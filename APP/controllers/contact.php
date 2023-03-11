<?php


require '../models/connectionDB.php';
$request = json_decode(file_get_contents('php://input'), true);
$response = [];
$status = 400;
if($request){ 
    if(!isset($request['userId']) || empty($request['userId'])){ 
        $status = 400;
        $response = [ 
            'success'=> false, 
            'msg'=>'we couldn\'t find the user ...',
        ];
    }else{
        $userId= $request['userId'];
        // connect to db 
        $connection = new connectDB();
        $stmt =$connection->conn->prepare('select user.* from user, contact where ( contact.`ID-USER1`=user.`ID-USER` or contact.`ID-USER2`=user.`ID-USER`) and ( contact.`ID-USER1`= :userId or contact.`ID-USER2`= :userId ) and `user`.`ID-USER`!= :userId ORDER by contact.`Date-contact` DESC');
        $stmt->bindValue(':userId', $userId);
         $stmt->execute();
        $data = $stmt->fetchAll();

        $status = 200;
        $response = [ 
            'success'=> true, 
            'msg'=>'the request is successfully completed ',
            'data'=> $data
        ];
    }
}else {
    $status=404;
     $response = [ 
            'success'=> false, 
            'msg'=>'we couldn\'t find the user here...',
        ];
 } 
 http_response_code($status);
 echo json_encode($response) ;