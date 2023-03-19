<?php

include "C:/xampp/htdocs/Recrutement_App-main/APP/models/connectionDB.php";
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
    $dd=2;
    $societe=$_POST['societe'];
    $secteur=$_POST['secteur'];
    $sql = "INSERT INTO `rh`( `societe`, `secteur`,`photo_rh`,`id-user`) VALUES ( :societe, :secteur,:content,:dd)";
    $stmt = $conn->conn->prepare($sql);
   // $stmt->bindParam(':count', $count);
    $stmt->bindParam(':societe', $societe);
    $stmt->bindParam(':secteur', $secteur);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':dd', $dd);
    $stmt->execute();

    $competencea=$_POST['competancea'];
     
    $sql = "INSERT INTO `skill_initial`(`skill_initial`, `id_RH`) VALUES (:competencea, :count)";
    $stmt = $conn->conn->prepare($sql);
    $stmt->bindParam(':count', $count);
    $stmt->bindParam(':competencea', $competencea);
    $stmt->execute();

    $competenceb=$_POST['competanceb'];
     
    $sql = "INSERT INTO `skill_initial`(`skill_initial`, `id_RH`) VALUES (:competenceb, :count)";
    $stmt = $conn->conn->prepare($sql);
    $stmt->bindParam(':count', $count);
    $stmt->bindParam(':competenceb', $competenceb);
    $stmt->execute();

    $competencec=$_POST['competancec'];
     
    $sql = "INSERT INTO `skill_initial`(`skill_initial`, `id_RH`) VALUES (:competencec, :count)";
    $stmt = $conn->conn->prepare($sql);
    $stmt->bindParam(':count', $count);
    $stmt->bindParam(':competencec',$competencec);
     $stmt->execute();


     $poste=$_POST['poste'];
     
     $sql = "INSERT INTO `poste-rechercher-initial`( `poste`, `id_RH`) VALUES (:poste,:count)" ;
     $stmt = $conn->conn->prepare($sql);
     $stmt->bindParam(':count',$count);
     $stmt->bindParam(':poste',$poste);
      $stmt->execute();
 
 

      $languea=$_POST['languea'];
     
     $sql = "      INSERT INTO `langue-initial`( `langue`, `id_RH`) VALUES (:languea,:count)";

     $stmt = $conn->conn->prepare($sql);
     $stmt->bindParam(':count',$count);
     $stmt->bindParam(':languea',$languea);
      $stmt->execute();

      
      $langueb=$_POST['langueb'];
     
     $sql = " INSERT INTO `langue-initial`( `langue`, `id_RH`) VALUES (:langueb,:count)";

     $stmt = $conn->conn->prepare($sql);
     $stmt->bindParam(':count',$count);
     $stmt->bindParam(':langueb',$langueb);
      $stmt->execute();

      
      $languec=$_POST['languec'];
     
     $sql = "INSERT INTO `langue-initial`( `langue`, `id_RH`) VALUES (:languec,:count)";

     $stmt = $conn->conn->prepare($sql);
     $stmt->bindParam(':count',$count);
     $stmt->bindParam(':languec',$languec);
      $stmt->execute();


















}







?>


