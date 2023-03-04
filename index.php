<?php 
    
    require_once __DIR__.'/vendor/autoload.php';

    use Dotenv\Dotenv;

    $dotenv = Dotenv::createUnsafeImmutable(__DIR__);
    $dotenv->load();


    // acces the secret key 

    echo 'Key: '.'<br>';
    
    $secretKey = getenv('JWT_SECRET');

    echo '<pre>';
    var_dump($secretKey);
    echo '</pre>';

