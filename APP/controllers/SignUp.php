<?php 
    require '../models/connectionDB.php';
    require '../../PUBLIC/util/sendEmail.php';
    require_once '../../vendor/autoload.php';
                    use Dotenv\Dotenv;
                    use Firebase\JWT\JWT;
                    use Firebase\JWT\Key;

    $dotenv = Dotenv::createUnsafeImmutable('../../');
    $dotenv->load();

$formData = json_decode(file_get_contents('php://input'), true);
$status = 400; 
$response;


// echo json_encode($formData);


if(isset($formData['firstName'], $formData['lastName'],$formData['email'],$formData['password'], $formData['VerifyPassword'],$formData['userRole'])){ 

    if(!empty($formData['firstName']) &&  !empty($formData['lastName']) && !empty($formData['email']) && !empty($formData['password']) && !empty($formData['VerifyPassword']) &&  !empty($formData['userRole']) && filter_var($formData['email'], FILTER_VALIDATE_EMAIL) ){ 

        // extract the user info from the  
        $firstName = $formData['firstName'];
        $lastName = $formData['lastName'];
        $email = $formData['email'];
        $password = $formData['password'];
        $verifyPassword = $formData['VerifyPassword'];
        $Role = $formData['userRole'];

        if($password === $verifyPassword){ 
                $hashPassword = password_hash($password, PASSWORD_DEFAULT);

                // check if this use already exists in our database             
                $db = new connectDB();
                $connection= $db->conn;
                $stmt = $connection->prepare('SELECT email FROM user where user.`email` = :email ');
                $stmt->bindValue(':email',$email);
                $stmt->execute();
                $userEmail = $stmt->fetch();
                if(!$userEmail){ 

                    $stmt = $connection->prepare('INSERT INTO user ( `Nom`, `Prenom`, `Email`, `Password`, `Type`, `verified-inscription`, `verified-email`) values(:firstName, :lastName, :email, :password , :userRole , 0 , 0)');
                    $stmt->bindValue(':firstName', $firstName);
                    $stmt->bindValue(':lastName', $lastName);
                    $stmt->bindValue(':email', $email);
                    $stmt->bindValue(':password', $hashPassword);
                    $stmt->bindValue(':userRole', $Role);
                    $stmt->execute();

                     // create a token and send it to the user email
                    $payload = [
                        'firstName' => $firstName, 
                        'lastName' => $lastName, 
                        'email' => $email,
                        'exp' => time() + 36000,
                    ]; 
                    $Secret = getenv('JWT_SECRET') ;
                    
                    $token = JWT::encode($payload, $Secret , 'HS256');

                    // send the email 
                   $isSend = sendEmail($email, 'verify your email', 'verification url :  http://localhost/Recrutement_App/APP/views/verify.php?token='.$token  );
                 
                if($isSend){ 

                    $status  = 200;
                    $response = [ 
                        'success'=> true, 
                        'msg'=> 'User Added Successfully.', 
                        'token'=>$token
                    ];
                }else 
                { 
                    $response = [ 
                        'success'=> false, 
                        'msg'=> 'We couldn\'t send verification Email.'
                    ];
                    
                }

                }else{ 

                    $status  = 401;
                    $response = [ 
                        'success'=> false, 
                        'msg'=> 'user already exists.', 
                    ];
        }


        }else { 

                    $status  = 401;
                    $response = [ 
                        'success'=> false, 
                        'msg'=> 'Password did not match.', 
                    ];
        }

    }else{ 

            $status  = 400;
            $response = [ 
                'success'=> false, 
                'msg'=> 'You did not provide all the information.', 
            ];

    }

}else{ 
    $status  = 400;
    $response = [ 
        'success'=> false, 
        'msg'=> 'You did not provide all the information.', 
    ];
}


http_response_code(200); 
echo json_encode($response);
