<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   welcome to the home page 
   <?php 
    session_start();
    
     echo $_SESSION["user"]["id"];

   ?> 

   <p><a href="./Sign_in & Sign_Up/SignOut.php">Sign out</a></p>
</body>
</html>