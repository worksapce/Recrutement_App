<?php 
    require '../models/connectionDB.php';
    session_start();

$request = json_decode(file_get_contents('php://input'), true);
$response ; 
$status =400;


if(isset($request['text'],$request['receiverId'])){ 
    if(!empty($request['text']) && !empty($request['receiverId'])){ 
        
        $text= $request['text'];
        $receiverId= $request['receiverId'];
        $senderId = $_SESSION['user']['id'];
        
        $db = new connectDB();
        $conn = $db->conn;
        $stmt = $conn->prepare('select * from contact
         where (contact.`ID-USER1`=:sender AND contact.`ID-USER2`=:receiver)
          OR (contact.`ID-USER1`= :receiver AND contact.`ID-USER2`=:sender) ');
        $stmt->bindValue(':sender', $senderId);
        $stmt->bindValue(':receiver', $receiverId);
        $stmt->execute();
        $isContact = $stmt->fetchAll();

        if($isContact){ 

             // insert message 
             $stmt = $conn->prepare('INSERT INTO `message` (`BODY`, `SENDER`, `RECIVER`)
             VALUES (:body, :sender, :receiver) ');
             $stmt->bindValue(':body',$text);
             $stmt->bindValue(':sender', $senderId);
             $stmt->bindValue(':receiver', $receiverId);
             $stmt->execute();

            // res
            $status = 200;
            $response = [ 
                    'success'=>true, 
                    'msg'=> 'the message has been send',
                ];
            


        }else{ 
            // create contact and then send the message
            $stmt = $conn->prepare('INSERT INTO `contact` (`ID-USER1`, `ID-USER2`) 
            VALUES (:sender, :receiver)');
            $stmt->bindValue(':sender', $senderId);
            $stmt->bindValue(':receiver', $receiverId);
            $stmt->execute();


            // insert message 
            $stmt = $conn->prepare('INSERT INTO `message` (`BODY`, `SENDER`, `RECIVER`)
             VALUES (:body, :sender, :receiver) ');
             $stmt->bindValue(':body',$text);
             $stmt->bindValue(':sender', $senderId);
             $stmt->bindValue(':receiver', $receiverId);
             $stmt->execute();

             $status = 200;
             $response = [ 
                     'success'=>true, 
                     'msg'=> 'the message has been send!!',
                 ];

        }

    }else{ 

    $status = 500;
    $response = [ 
            'success'=>false, 
            'msg'=> 'could not send the message',
        ];
    }

}else{ 

    $status = 500;
    $response = [ 
            'success'=>false, 
            'msg'=> 'could not send the message',
        ];


}


http_response_code($status);
echo json_encode($response);

