<?php
require '../../models/RH_models/connectionDB.php';

  session_start();
    if(!isset($_SESSION['user'])){ 
      header('Location: ../Sign_in & Sign_Up/SignIn.php');
      exit;
    }

    $userId = $_SESSION['user']['id'];



$user = getUserById($userId);
$recruiter = getRecruteurById($userId);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>RH profile</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../../PUBLIC/CSS/RH_CSS/ProfileRH.css" />

   
  </head>
  <body>
  <div class="sidebar">
            <!-- logo de site -->
            <h1 class="logo">sitename</h1>
            <!-- menu -->
            <div class="menu">
                <a href="./RecruteurPage.php"> <ion-icon name="home"></ion-icon> Accueil </a>
                <a href="./ProfileRH.php"> <ion-icon name="person"></ion-icon>Profile </a>
                <a href="#"> <ion-icon name="mail"></ion-icon>Messagerie </a>
                <a href="../Sign_in & Sign_Up/SignOut.php"> <ion-icon name="log-out-outline" ></ion-icon>Log out </a>
            </div>
            <!-- profile RH -->
            <div class="profile">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($recruiter['photo']); ?>" alt="" class="image_RH">
                <div class="nom_RH">
                <h4> Espace RH</h4>
                </div>
            </div>

        </div>

    <div class="profile-card">
      <div class="image">
        <img src="data:image/jpeg;base64,<?php echo base64_encode($recruiter['photo']); ?>" alt="" class="profile-img" />

      </div>

      <div class="text-data">
      <span class="name"><?php echo $user['Prenom']; ?> <?php echo $user['Nom']; ?></span>
        <span class="job"><?php echo $recruiter['secteur']; ?></span>
        <span class="job"><?php echo $user['Email']; ?></span>

      </div>


      
      <div class="buttons">
                <a href="./ParamRH.php">
            <button class="button">Parametres</button>
            </a>      
        </div>

      <div class="analytics">
        <div class="data">
          <i class="bx bx-heart"></i>
          <span class="number"><?php echo $recruiter['societe']; ?></span>

        </div>
      </div>
    </div>
  </body>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</html>
