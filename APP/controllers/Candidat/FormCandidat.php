
<?php

use PHPMailer\Test\OAuth\DummyOauthProvider;

session_start();

$userId = $_SESSION['id'];



 //importer affiche qui contient les requee
    include '../../models/Affiche.php';
    include '../../controllers/Candidat/Donwloadcv.php';




if(isset($_POST['envoyer'])){

 $conn = new connectDB();
//exporter le id a partir du base de donné
$sql = "SELECT MAX(id_candidat) as max_count FROM client";
if(!$sql)  $count=0;
$stmt = $conn->conn->prepare($sql);
$stmt->execute();


$ff=$_SESSION['contenu_pdf'];


    $result = $stmt->fetch();

       
    $max_count = $result['max_count'];
    $count = $max_count+  1;
    //envoyer id au session
   $_SESSION['id_candidat']=$count;

     //apporter la photo
        $file_name = $_FILES['photos']['name'];
        $file_size = $_FILES['photos']['size'];
        $file_tmp = $_FILES['photos']['tmp_name'];
        $file_type = $_FILES['photos']['type'];

        // Ouvrir le fichier en lecture binaire
        $fp = fopen($file_tmp, 'rb');
        $content = fread($fp, filesize($file_tmp));
        fclose($fp);    
      
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $addres = $_POST['addres'];
    $diplome= $_POST['diplome'];          
    $etablissement=$_POST['etablissement'];
    $date_debut_scolaire=$_POST['date-debut-scolaire'];
    $date_fin_scolaire=$_POST['date-fine-scolaire'];
    $competance=$_POST['skill'];
    $poste_actuel=$_POST['poste_actuel'];
    $cv=$_POST['cv'];



$score=0; 

//global $contenu_pdf;

//echo $contenu_pdf;  

//inserer les infos au client
    insertClient($nom,$prenom,$email,$tel,$addres,$count,$content,$score,$userId,$ff,$poste_actuel);
  
     


    // Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs des champs du formulaire
    $diplomes = $_POST['diplome'];
    $etablissements = $_POST['etablissement'];
    $dates_debut = $_POST['date-debut-scolaire'];
    $dates_fin = $_POST['date-fine-scolaire'];

    // Vérifier que tous les champs ont été remplis
    if (count($diplomes) !== count($etablissements) || count($diplomes) !== count($dates_debut) || count($diplomes) !== count($dates_fin)) {
        // Afficher un message d'erreur si les tableaux ont des tailles différentes
        echo 'Erreur ';
    } else {
        // Préparer la requête SQL

      
             insertParcoursProfessionnel($diplomes,$etablissements,$dates_debut,$dates_fin,$count);
        }
   
}
   

    if(isset($_POST['skill'])) {
$competences = $_POST['skill'];
insertCompetences($competences,$count);

}                     
   




if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs des champs du formulaire
    $societes = $_POST['parc-scolaire'];
    $positions = $_POST['position'];
    $dates_debuts = $_POST['date-debut-prof'];
    $dates_fins = $_POST['date-fin-prof'];

    // Vérifier que tous les champs ont été remplis
    if (count($societes) !== count($positions) || count($societes) !== count($dates_debuts) || count($societes) !== count($dates_fins)) {
        // Afficher un message d'erreur si les tableaux ont des tailles différentes
        echo 'Erreur ';
    } else {  insertParcoursScolaire($societes,$positions,$dates_debuts,$dates_fins,$count);
        // Préparer la requête SQL
       
             
        }
    
}
   

// récupérer les données du formulaire


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les valeurs des champs du formulaire
    $langue = $_POST['langue_'];
    $degre = $_POST['degre'];
    

    // Vérifier que tous les champs ont été remplis
    if (count($langue) !== count($degre)) {
        // Afficher un message d'erreur si les tableaux ont des tailles différentes
        echo 'Erreur ';
    } else { insertLangues($langue,$degre,$count);
    
             
        }

    $stmt = $conn->conn->prepare('UPDATE `user` SET `verified-inscription`=  \'1\'  WHERE `ID-USER`= :id ');
    $stmt->bindValue(":id",$userId);
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
 
 header("Location: ProfilCandidat.php");
 exit();
        
}


}



 $pdfText = '';

                   
                    if(isset($_POST['submit'])){ 
                    




                        // Si le fichier est sélectionné 
                        if(!empty($_FILES["pdf_file"]["name"])){ 
                            // Chemin de téléchargement du fichier 
                            $fileName = basename($_FILES["pdf_file"]["name"]); 
                            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
                            
                            // Autorise certains formats de fichiers 
                            $allowTypes = array('pdf'); 
                            if(in_array($fileType, $allowTypes)){ 
                                // Inclure le fichier du chargeur automatique 
                                require '../../../vendor/autoload.php';
                                
                                // Initialise et charge la bibliothèque PDF Parser 
                                $parser = new \Smalot\PdfParser\Parser(); 
                                
                                // Fichier PDF source pour extraire le texte 
                                $file = $_FILES["pdf_file"]["tmp_name"]; 
                                
                                // Analyser le fichier pdf à l'aide de la bibliothèque Parser 
                                $pdf = $parser->parseFile($file); 
                                
                                // Extraire le texte du PDF
                                $text = $pdf->getText(); 
                                
                                // Ajoute un saut de ligne 
                                $pdfText = nl2br($text); 
                            }else{ 
                                $statusMsg = '<p>Désolé, seul le fichier PDF est autorisé à télécharger.</p>'; 
                            } 
                        }else{ 
                            $statusMsg = '<p>Veuillez sélectionner un fichier PDF pour extraire le texte.</p>'; 
                        } 
                    } 
                    echo '<input type="hidden" id="maVariable" value="' . $pdfText. '">';
                  
                    
                 
                 
                 
             
                 
                 
                 
                 ?>