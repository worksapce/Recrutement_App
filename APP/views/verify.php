<?php 
    require '../models/connectionDB.php';
    require_once '../../vendor/autoload.php';
    use Dotenv\Dotenv;
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    

    $dotenv = Dotenv::createUnsafeImmutable('../../');
    $dotenv->load();

 
$url =  isset($_SERVER['HTTPS']) &&
 $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";  
 $url .= $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; 

$url_components = parse_url($url); 
parse_str($url_components['query'], $params); 

// get the token 
$token = $params['token'];


// verify the token 
$secret = getenv('JWT_SECRET');

try { 

$payload = JWT::decode($token, new key($secret, 'HS256'));

    // go to the database and try to find the user and change the email activated 
    $db= new connectDB();
    $connection = $db->conn;
    $stmt = $connection->prepare('update `user` set `user`.`verified-email` = \'1\' where email= :email');
    $stmt->bindValue(':email', $payload->email);
    $stmt->execute();

    echo  '<h2 style="text-align:center;margin-top:5rem">your account is activated</h2>';

}catch(Exception $e) { 

    echo 'Invalid token, we can not activate you account ';
}
