<?php 

require '../models/connectionDB.php';

session_start();
$id = $_SESSION['id'];
//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "recrutement";

// Connexion à la base de données en utilisant l'extension PDO
//$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT nom, prenom, email, addres, tel ,photo FROM client where id_candidat=$id";  
$result = $conn->query($sql); // Exécution de la requête avec la méthode query() de PDO




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


$sql = "SELECT competance FROM competances where id_candidat=$id";  
$result = $conn->query($sql); // Exécution de la requête avec la méthode query() de PDO

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










$sql4 = "SELECT *FROM langue where id_candidat=$id";  
$result4 = $conn->query($sql4);
$result5 = $conn->query($sql4);

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
$result3 = $conn->query($sql3);
$prof_score=$result3->rowCount() ;






$sql2 = "SELECT *FROM `parcours-scolaire` where id_candidat=$id";  
$result2 = $conn->query($sql2);
$scol_score=$result2->rowCount() ;

     $coefficient=14;
     $scoref=((($scol_score*3)+($prof_score*5)+($langue_score*2)+($competance_score*4)) / $coefficient)*10;

 $score=intval($scoref);
     

// Définit le tableau associatif
$monTableau = array(
    'scol_score' => $scol_score,
    'prof_score' => $prof_score,
    'langue_score' => $langue_score,
    'competance_score' => $competance_score

);

$_SESSION['monTableau'] = $monTableau;

     $sql = "UPDATE `client` SET `score` = ? WHERE `id_candidat` = ?";

$stmt = $conn->prepare($sql);
$stmt->bindParam(1, $score);
$stmt->bindParam(2, $id);
$stmt->execute();


?>



