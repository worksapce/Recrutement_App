<?php

    // require "../../APP/models/connectionDB.php";
    require "C:/xampp/htdocs/Recrutement_App/APP/models/connectionDB.php";




  session_start();

    $userId = $_SESSION['id'];





if(isset($_POST['envoyer'])){
    $conn = new connectDB();

$file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];

        // Ouvrir le fichier en lecture binaire
        $fp = fopen($file_tmp, 'rb');
        $content = fread($fp, filesize($file_tmp));
        fclose($fp);    
      
    $count=9;
    $dd=$userId;
    $societe=$_POST['societe'];
    $secteur=$_POST['secteur'];
    $sql = "INSERT INTO `rh`( `societe`, `secteur`,`photo`,`id-user`) VALUES ( :societe, :secteur,:content,:dd)";
    $stmt = $conn->conn->prepare($sql);
   // $stmt->bindParam(':count', $count);
    $stmt->bindParam(':societe', $societe);
    $stmt->bindParam(':secteur', $secteur);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':dd', $dd);
    $stmt->execute();

    //  find the rh by user id 
    $sql = 'SELECT `id_RH` FROM `rh` WHERE `id-user` = :dd';
    $stmt = $conn->conn->prepare($sql);
    $stmt->bindParam(':dd', $userId);
    $stmt->execute();
    $IdRh = $stmt->fetch();
    $IdRh = $IdRh['id_RH'];

    $competencea=$_POST['competancea'];
     
    $sql = "INSERT INTO `skill_initial`(`skill_initial`, `id_RH`) VALUES (:competencea, :idRh)";
    $stmt = $conn->conn->prepare($sql);
    $stmt->bindParam(':idRh', $IdRh);
    $stmt->bindParam(':competencea', $competencea);
    $stmt->execute();

    $competenceb=$_POST['competanceb'];
     
    $sql = "INSERT INTO `skill_initial`(`skill_initial`, `id_RH`) VALUES (:competenceb, :idRh)";
    $stmt = $conn->conn->prepare($sql);
    $stmt->bindParam(':idRh', $IdRh);
    $stmt->bindParam(':competenceb', $competenceb);
    $stmt->execute();

    $competencec=$_POST['competancec'];
     
    $sql = "INSERT INTO `skill_initial`(`skill_initial`, `id_RH`) VALUES (:competenceb, :idRh)";
    $stmt = $conn->conn->prepare($sql);
    $stmt->bindParam(':idRh', $IdRh);
    $stmt->bindParam(':competenceb',$competencec);
     $stmt->execute();


     $poste=$_POST['poste'];
     
     $sql = "INSERT INTO `poste-rechercher-initial`( `poste`, `id_RH`) VALUES (:poste,:idRh)" ;
     $stmt = $conn->conn->prepare($sql);
     $stmt->bindParam(':idRh',$IdRh);
     $stmt->bindParam(':poste',$poste);
      $stmt->execute();
 
 

      $languea=$_POST['languea'];
     
     $sql = "      INSERT INTO `langue-initial`( `langue`, `id_RH`) VALUES (:languea,:idRh)";

     $stmt = $conn->conn->prepare($sql);
     $stmt->bindParam(':idRh',$IdRh);
     $stmt->bindParam(':languea',$languea);
      $stmt->execute();

      

      $langueb=$_POST['langueb'];
     
     $sql = " INSERT INTO `langue-initial`( `langue`, `id_RH`) VALUES (:langueb,:idRh)";

     $stmt = $conn->conn->prepare($sql);
     $stmt->bindParam(':idRh',$IdRh);
     $stmt->bindParam(':langueb',$langueb);
      $stmt->execute();

      
      $languec=$_POST['languec'];
     
     $sql = "INSERT INTO `langue-initial`( `langue`, `id_RH`) VALUES (:languec,:idRh)";

     $stmt = $conn->conn->prepare($sql);
     $stmt->bindParam(':idRh',$IdRh);
     $stmt->bindParam(':languec',$languec);
      $stmt->execute();

      $conn = $conn->conn;
      $stmt = $conn->prepare('select    `ID-USER`, email , password, Nom , Prenom, type, `verified-email` , `verified-inscription`  from user where `ID-USER` = :iduser ');
      $stmt->bindValue(':iduser', $userId);
      $stmt->execute();
      $isExist  = $stmt->fetch(PDO::FETCH_ASSOC);


      $_SESSION["user"] = [
                              "id" => $isExist['ID-USER'], 
                              "fullName" => $isExist['Nom'].' '.$isExist['Prenom'],
                              "email"=>$isExist['email'],
                              "ROLE"=>$isExist['type'],
                          ];
                          

        header("Location: ../RH_views/RecruteurPage.php");



}







?>


