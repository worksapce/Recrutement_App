<?php 
    require '../models/connectionDB.php';
// get the from data from the request
$formData = json_decode(file_get_contents('php://input'), true);
$response; 
$status = 400; 

if($formData && isset($formData['email'], $formData['password'])){ 

    if(!empty($formData['email']) && !empty($formData['password'])){ 

        $email = $formData['email'];
        $password = $formData['password'];

        // check if this email is already exists 
        $db=  new connectDB();
        $conn = $db->conn;
        $stmt = $conn->prepare('select    `ID-USER`, email , password, Nom , Prenom, type, `verified-email` , `verified-inscription`  from user where email = :email ');
        $stmt->bindValue(':email', $email);
        $stmt->execute();
        $isExist  = $stmt->fetch(PDO::FETCH_ASSOC);

        if($isExist){ 

            // check the password
            $hashPassword = $isExist['password'];

            if(password_verify($password, $hashPassword)){ 

                if($isExist['verified-email']){ 

                    if($isExist['verified-inscription']){ 

                       
                        $status  = 200;
                        $response = [ 
                            'success'=>true, 
                            'msg'=> 'Login....',
                            'user'=>$isExist
                        ];

                        session_start();
                        $_SESSION["user"] = [
                                "id" => $isExist['ID-USER'], 
                                "fullName" => $isExist['Nom'].' '.$isExist['Prenom'],
                                "email"=>$isExist['email'],
                                "ROLE"=>$isExist['type'],
                            ];

                        

                    }else{ 
                        session_start();
                        $_SESSION["id"] = $isExist['ID-USER'];
                        $_SESSION['Nom'] = $isExist['Nom'];
                        $_SESSION['Prenom'] = $isExist['Prenom'];

                        $status  = 200;
                        $response = [ 
                            'success'=>false, 
                            'msg'=> 'You did not complete inscription',
                            'userRole'=> $isExist['type']
                        ];
                    }

                }else{ 

                    $status  = 400;
                    $response = [ 
                        'success'=>false, 
                        'msg'=> 'Please verify your email',
                    ];


                }

            }else{ 
            
                $status  = 400;
                $response = [ 
                    'success'=>false, 
                    'msg'=> 'Incorrect password',
                ];


            }


        }else{
         $status  = 400;
        $response =  [
            'success'=> false, 
            'msg'=> 'Unauthorize.',
            ];
     
        }

    }else{ 
        $status  = 400;
        $response =  [
            'success'=> false, 
            'msg'=> 'Pleas provide email and Password',
        ];
    }

}else{ 

    $status  = 400;
    $response =  [
        'success'=> false, 
        'msg'=> 'Pleas provide email and Password',
    ];

}


http_response_code($status);
echo json_encode($response);