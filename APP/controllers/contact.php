<?php


session_start();
if (!isset($_SESSION['user'])) {
    header('Location: SignIn.php');
    exit;
}



require '../models/connectionDB.php';
$request = json_decode(file_get_contents('php://input'), true);
$response = [];
$status = 400;
if ($request) {
    if (!isset($request['userId']) || empty($request['userId'])) {
        $status = 400;
        $response = [
            'success' => false,
            'msg' => 'we couldn\'t find the user ...',
        ];
    } else {
        $userId = $_SESSION['user']['id'];


        // connect to db 
        $connection = new connectDB();
        // $stmt = $connection->conn->prepare('select user.* from user, contact where ( contact.`ID-USER1`=user.`ID-USER` or contact.`ID-USER2`=user.`ID-USER`) and ( contact.`ID-USER1`= :userId or contact.`ID-USER2`= :userId ) and `user`.`ID-USER`!= :userId ORDER by contact.`Date-contact` DESC');
        $stmt = $connection->conn->prepare('SELECT u.*, subquery.photo
        FROM user AS u
        INNER JOIN (
            SELECT COALESCE(c.photo, r.photo) AS photo, u.`ID-USER`
            FROM user AS u
            LEFT JOIN client AS c ON u.`ID-USER` = c.`id-user`
            LEFT JOIN rh AS r ON u.`ID-USER` = r.`id-user`
        ) AS subquery ON u.`ID-USER` = subquery.`ID-USER`
        INNER JOIN contact AS c ON u.`ID-USER` IN (c.`ID-USER1`, c.`ID-USER2`)
        WHERE u.`ID-USER` != :userId AND :userId IN (c.`ID-USER1`, c.`ID-USER2`)
        ORDER BY c.`Date-contact` DESC');
        $stmt->bindValue(':userId', $userId);

        $stmt->execute();

        $data = array(); // initialize an empty array
        while ($row = $stmt->fetch()) {

            $id = $row['ID-USER'];
            $Nom = $row['Nom'];
            $Prenom = $row['Prenom'];
            $email = $row['Email'];
           if(!empty($row['photo'])){ 
                $photo = 'data:image/jpeg;base64,'.base64_encode($row['photo']);
            }else { 
                $photo ="";
            }
            $row_data = array(
                "id"=>$id,
                "Nom"=>$Nom,
                "Prenom"=>$Prenom,
                "email"=>$email,
                "photo" => $photo

            );
            // push the row data into the $data array
            array_push($data, $row_data);
        }




        $status = 200;
        $response = [
            'success' => true,
            'msg' => 'the request is successfully completed ',
            'data' =>$data
        ]; 
     
        // photo 
        // $stmt = $connection->conn->prepare("SELECT 
        // COALESCE(client.photo, rh.photo) AS photo,
        // COALESCE(`client`.`id-user`, rh.`id-user`) AS id
        // FROM user
        //  LEFT JOIN client ON user.`ID-USER` = client.`id-user`
        // LEFT JOIN rh ON user.`ID-USER` = rh.`id-user`
        // WHERE user.`ID-USER` = ");

        // // $stmt->bindValue(":userId", $userId);
        // $stmt->execute();
        // $photo = $stmt->fetch();


        $status = 200;
        $response = [
            'success' => true,
            'msg' => 'the request is successfully completed ',
            'data' => $data
        ];

    }
} else {
    $status = 404;
    $response = [
        'success' => false,
        'msg' => 'we couldn\'t find the user here...',
    ];
}

http_response_code($status);
echo json_encode($response);
