

<?php 
require '../models/connectionDB.php';
echo"jdjdjdjdjdjdjd";
session_start();
if (isset($_SESSION['pdf_file'])) {
    // Récupérer le contenu du fichier PDF
    $contenu_pdf = $_SESSION['pdf_file'];

    // Faire quelque chose avec le contenu du fichier PDF (par exemple, l'afficher)
    
    // Effacer la variable de session
} else {
    // La variable de session n'existe pas, gérer l'erreur
    echo "Erreur : aucun fichier PDF n'a été trouvé.";
}


require_once "connectionDB.php";





//$servername = "localhost";
//$username = "root";
//$password = "";
//$dbname = "recrutement";

//try {
 //   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
 //   $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//} catch(PDOException $e) {
 //   echo "Connexion échouée : " . $e->getMessage();
//}

if(isset($_POST['envoyer'])){

  

    $sql = "SELECT MAX(id_candidat) as max_count FROM client";
$stmt = $conn->prepare($sql);
$stmt->execute();





    $result = $stmt->fetch();


    $max_count = $result['max_count'];
    $count = $max_count+  1;


        $file_name = $_FILES['photos']['name'];
        $file_size = $_FILES['photos']['size'];
        $file_tmp = $_FILES['photos']['tmp_name'];
        $file_type = $_FILES['photos']['type'];

        // Ouvrir le fichier en lecture binaire
        $fp = fopen($file_tmp, 'rb');
        $content = fread($fp, filesize($file_tmp));
        fclose($fp);    
      
// Ajouter 1 à la dernière valeur de count pour obtenir la nouvelle valeur
      
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
    //$societe=$_POST['parc-scolaire'];
    //$position=$_POST['position'];
   // $date_debut_prof=$_POST['date-debut-prof'];
   // $date_fin_prof=$_POST['date-fin-prof'];
   // $langue=$_POST['langue'];
   // $degre=$_POST['niveau'];
    
$score=0;
    $sql = "INSERT INTO `client`( `nom`, `prenom`, `email`, `tel`, `addres`,`id_candidat` ,`photo` ,`score`,`cv`) VALUES (:nom, :prenom, :email, :tel, :addres , :count,:content,:score,:cv)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':count',$count);
    $stmt->bindParam(':nom',$nom);
    $stmt->bindParam(':prenom',$prenom);
    $stmt->bindParam(':addres',$addres);
    $stmt->bindParam(':tel',$tel);
    $stmt->bindParam(':email',$email);
    $stmt->bindParam(':content',$content);
    $stmt->bindParam(':score',$score);
    $stmt->bindParam(':cv',$cv);

    $stmt->execute();
         



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
        $sql = 'INSERT INTO `parcours-scolaire` (`diplome`, `etablissement`, `date-debut`, `date-fin`, `id_candidat`) VALUES (:diplome, :etablissement, :date_debut, :date_fin, :count)';
        $stmt = $conn->prepare($sql);

        // Parcourir les tableaux et insérer les données dans la base de données
        foreach ($diplomes as $index => $diplome) {
            $etablissement = $etablissements[$index];
            $date_debut = $dates_debut[$index];
            $date_fin = $dates_fin[$index];

            
                // Lier les paramètres de la requête SQL aux valeurs des champs du formulaire
                $stmt->bindParam(':diplome', $diplome);
                $stmt->bindParam(':etablissement', $etablissement);
                $stmt->bindParam(':date_debut', $date_debut);
                $stmt->bindParam(':date_fin', $date_fin);
                $stmt->bindParam(':count', $count);

                // Exécuter la requête SQL
                $stmt->execute();
             
        }
    }
}
   

    if(isset($_POST['skill'])) {
$competences = $_POST['skill'];


foreach ($competences as $competence) {
    $sql3="INSERT INTO `competances`( `competance`,`id_candidat`) VALUES (:competence,:count)";

    $stmt3=$conn->prepare($sql3);
    $stmt3->bindParam(':competence',$competence);
    $stmt3->bindParam(':count',$count);

    $stmt3->execute();
}
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
    } else {
        // Préparer la requête SQL
        $sql = 'INSERT INTO `parcours-professionelle`(`societe`, `position`, `date-debut`, `date-fin`,`id_candidat`) VALUES (:societe,:position,:date_debut,:date_fin,:count)';
        $stmt = $conn->prepare($sql);

        // Parcourir les tableaux et insérer les données dans la base de données
        foreach ($societes as $index => $societe) {
            $position = $positions[$index];
            $date_debut = $dates_debuts[$index];
            $date_fin = $dates_fins[$index];

            
                // Lier les paramètres de la requête SQL aux valeurs des champs du formulaire
                $stmt->bindParam(':societe', $societe);
                $stmt->bindParam(':position', $position);
                $stmt->bindParam(':date_debut', $date_debut);
                $stmt->bindParam(':date_fin', $date_fin);
                $stmt->bindParam(':count', $count);

                // Exécuter la requête SQL
                $stmt->execute();
             
        }
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
    } else {
        // Préparer la requête SQL
        $sql = 'INSERT INTO `langue`( `langue`, `degre`, `id_candidat`) VALUES (:lang,:degres,:count)';
        $stmt = $conn->prepare($sql);

        // Parcourir les tableaux et insérer les données dans la base de données
        foreach ($langue as $index => $lang) {
            $degres = $degre[$index];
            

            
                // Lier les paramètres de la requête SQL aux valeurs des champs du formulaire
                $stmt->bindParam(':lang', $lang);
                $stmt->bindParam(':degres', $degres);
               
                $stmt->bindParam(':count', $count);

                // Exécuter la requête SQL
                $stmt->execute();
             
        }
    }
}


    $_SESSION['id'] = $count;

  header("Location: profil.php");
  exit();
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
                                include 'vendor/autoload.php';
                                
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
                    // Affiche le contenu du texte 

                 //   require_once "index.php";
                    ?>