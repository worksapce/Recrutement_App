<?php 

include  "C:/xampp/htdocs/Recrutement_App-main/APP/models/connectionDB.php";
//ouvre session et importer le id
@session_start();
$id=$_SESSION['id_candidat'];

$conn = new connectDB();

$sql = "SELECT nom, prenom, email, addres, tel ,photo FROM client where id_candidat=$id";  
$result = $conn->conn->query($sql); // Exécution de la requête avec la méthode query() de PDO




if ($result->rowCount() > 0) {
    // Affichage des résultats
    while($row = $result->fetch()) { 
        $prenom=$row["nom"];
        $nom=$row["prenom"];
        $email=$row["email"];
        $adress=$row["addres"];
        $tel=$row["tel"];
        $photo = $row['photo'];
    }
} else {
    echo "0 results";
}

//importer les infos competance et calculer le score
$sql = "SELECT competance FROM competances where id_candidat=$id";  
$result = $conn->conn->query($sql); // Exécution de la requête avec la méthode query() de PDO

$competance_score=$result->rowCount() ;


$i=0;

if ($result->rowCount() > 0) {
    
    // Affichage des résultats
    while($row = $result->fetch()) { 
        $competance=$row["competance"];
         $tab[$i]=$competance;
         $i++;
    }
} else {
    echo "0 results";
}








//importer les donné from database et calculer le score du langue

$sql4 = "SELECT *FROM langue where id_candidat=$id";  
$result4 = $conn->conn->query($sql4);
$result5 = $conn->conn->query($sql4);

$langue_score=0 ;
$lang=0;
$cou=0;
while($row = $result4->fetch()) { 
       $degre=$row["degre"]; 
        
        if($degre=="Moyenne") $cou=2;
        if($degre=="Faible") $cou=3;
        if($degre=="Elevé") $cou=5;
        $lang+=$cou;
   }
   ///////////
   $langue_score_inter=$lang/ $result4->rowCount() ;
    $langue_score=($langue_score_inter*$result4->rowCount() )/3;



$sql3 = "SELECT * FROM `parcours-professionelle` where id_candidat=$id";  
$result3 = $conn->conn->query($sql3);
$prof_score=$result3->rowCount() ;

$moyennedate=0;
while ($row =$result3 ->fetch()) {
            
            $date_debut = $row['date-debut']; 
            $date_fin = $row['date-fin'];
               
             $moyennedate+=($date_fin-$date_debut);
} 
$moyennedate/=$result3->rowCount() ;
$ss=$prof_score*$moyennedate/2;
$prof_score=$ss;
//

$sql2 = "SELECT *FROM `parcours-scolaire` where id_candidat=$id";  
$result2 = $conn->conn->query($sql2);
$scol_score=$result2->rowCount() ;

$moyenedate=0;
while ($row =$result3 ->fetch()) {
            
            $date_debut = $row['date-debut'];
            $date_fin = $row['date-fin'];

             $moyenedate+=($date_fin-$date_debut);
} 
$moyenedate/=$result2->rowCount() ;
$sss=$scor_score*$moyenedate/2;
$scol_score=$sss;


//calculer le score avec chaque partie dans le cv a un coefficient
     $coefficient=14;
     $scoref=((($scol_score*3)+($prof_score*5)+($langue_score*2)+($competance_score*4)) / $coefficient)*10;

 $score=intval($scoref);
     

// Définit le tableau pour envoyer les donné au session
$monTableau = array(
    'scol_score' => $scol_score,
    'prof_score' => $prof_score,
    'langue_score' => $langue_score,
    'competance_score' => $competance_score

);

$_SESSION['monTableau'] = $monTableau;
    //modifier le score qui est initialiser au 0
     $sql = "UPDATE `client` SET `score` = ? WHERE `id_candidat` = ?";

$stmt = $conn->conn->prepare($sql);
$stmt->bindParam(1, $score);
$stmt->bindParam(2, $id);
$stmt->execute();


?>



