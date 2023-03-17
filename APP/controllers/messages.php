<?php 

    require '../models/connectionDB.php';
    session_start();

$request = json_decode(file_get_contents('php://input'), true);
$response ; 
$status =400;

if(isset($request['sender'], $request['receiver'])){ 
    // $sender= $request['sender'];
    $sender= $_SESSION['user']['id'];
    $receiver = $request['receiver'] ;

    $db=new  connectDB();
    $stmt = $db->conn->prepare('SELECT user.* from user where user.`ID-USER`=:receiver');
    $stmt->bindValue(":receiver", $receiver);
    $stmt->execute();
    $data = $stmt->fetch();

    $stmt = $db->conn->prepare('select SENDER , RECIVER, BODY , send_at from message WHERE ( message.SENDER = :sender and message.RECIVER = :receiver ) or (message.SENDER = :receiver and message.RECIVER = :sender ) ORDER by message.send_at asc');
    $stmt->bindValue(':sender',$sender);
    $stmt->bindValue(':receiver',$receiver);
    $stmt->execute(); 
    $messages = $stmt->fetchAll();

    //Convert the timestamps to JavaScript timestamps
    foreach($messages as $message){ 
        $message['send_at'] =  strtotime($message['send_at']) * 1000;
    }

    if($data){ 
    $response = [ 
        'success'=>true, 
        'msg'=> 'we find the contact',
        'data'=>$data,
        'messages'=>$messages
    ]; 
    $status = 200;
    }else{ 
    $status = 404;
    $response = [ 
        'success'=>false, 
        'msg'=> 'we did not find the contact',
        'data'=>$data
    ] ;
    }

    
}else{ 
$status = 400;
$response = [ 
        'success'=>false, 
        'msg'=> 'we didn\'t find the contact',
    ];
}


// rend the response
http_response_code($status);
echo json_encode($response);
