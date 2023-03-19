<?php 

  require '../../models/Affiche.php';
    
//ouvrir la session
session_start();
$id=$_SESSION['id_candidat'];


//**************** */
$row = clients($id);


    // Affichage des résultats
         $prenom=$row[0];
        $nom=$row[1];
        $email=$row[2];
        $adress=$row[3];
        $tel=$row[4];
        $photo = $row[5];
    

        
    if(isset($_POST['update'])){
      //importer les donné a partir du html apres avoir clické update
     $nomn = $_POST['nom'];
    $prenomn = $_POST['prenom'];
    $emailn = $_POST['email'];
    $teln = $_POST['tel'];
    $addresn = $_POST['addres'];
    $competences = $_POST['skill'];
    
    $diplomes = $_POST['diplome'];
    $etablissements = $_POST['etablissement'];
    $dates_debut = $_POST['date-debut-scolaire'];
    $dates_fin = $_POST['date-fin-scolaire'];
   
    $societes = $_POST['parc-scolaire'];
    $positions = $_POST['position'];
    $dates_debuts = $_POST['date-debut-prof'];
    $dates_fins = $_POST['date-fin-prof'];

    $langue = $_POST['langue_'];
    $degre = $_POST['degre'];
    updateclient($id,$nomn,$prenomn,$emailn,$teln,$addresn);

     
        deleteCompetence($id);
        deleteLangue($id);
        deleteProf($id);
        deleteScolaire($id);
        insertLangues($langue,$degre,$id);
        insertParcoursProfessionnel($societes,$positions,$dates_debuts,$dates_fins,$id);
        insertParcoursScolaire($diplomes,$etablissements,$dates_debut,$dates_fin,$id);
        insertCompetences($competences,$id);
       


        //redirect vers profil candidat
header("Location:ProfilCandidat.php");
  exit();


    }
        




 








?>