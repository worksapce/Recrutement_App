<?php 
    
    require_once __DIR__.'/vendor/autoload.php';

    use Dotenv\Dotenv;
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;
    

    $dotenv = Dotenv::createUnsafeImmutable(__DIR__);
    $dotenv->load();


    // test the fireBase jwt package 
    $payload = [
        'username' => 'oussama', 
        'email' => 'oussama@gmail.com',
        'exp' => time() + 10000,
    ]; 

    $Secret = getenv('JWT_SECRET') ;
    
    $token = JWT::encode($payload, $Secret , 'HS256');

    echo '<pre>';
    var_dump($token);
    echo '</pre>';

    // test the Dotenv package
    // acces the secret key 

    echo 'Key: '.'<br>';
    
    $secretKey = getenv('JWT_SECRET');

    echo '<pre>';
    var_dump($secretKey);
    echo '</pre>';

