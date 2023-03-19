<?php
    include 'c:/xampp/htdocs/Recrutement_App/APP/models/connectionDB.php';



//ici on creer des fonction permettant de supprimer et inserer et afficher les donné des table dand bdd
function clients($id) {
   
//creer instance 
   $conncotion = new connectDB();
   
   $sql = "SELECT nom, prenom, email, addres, tel ,photo FROM client where id_candidat=:id";  
   $result = $conncotion->conn->prepare($sql);// Exécution de la requête avec la méthode query() de PDO
   
   $result->bindValue(':id',$id);
   $result->execute();
   $row = $result->fetch() ;
   return $row;
    
   }
   
   function updateclient($id,$nom,$prenom,$email,$tel,$adresse) {
    $conncotion = new connectDB();

    $sql = "UPDATE client SET nom=:nom, prenom=:prenom, addres=:adresse, tel=:tel, email=:email WHERE id_candidat=:id";

    $stmt = $conncotion->conn->prepare($sql);

    // Lier les paramètres avec les valeurs correspondantes
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':email', $email);

    // Exécuter la requête SQL
    $stmt->execute();
    
   }
   
function insertCompetences( $competences, $count) {
    $conn = new connectDB();

    foreach ($competences as $competence) {
        $sql = "INSERT INTO `competances` (`competance`, `id_candidat`) VALUES (:competence, :count)";
        $stmt = $conn->conn->prepare($sql);
        $stmt->bindParam(':competence', $competence);
        $stmt->bindParam(':count', $count);
        $stmt->execute();
    }
}


function insertParcoursProfessionnel( $societes, $positions, $dates_debuts, $dates_fins, $count) {
    $conn = new connectDB();

    $sql = 'INSERT INTO `parcours-professionelle`(`societe`, `position`, `date-debut`, `date-fin`,`id_candidat`) VALUES (:societe,:position,:date_debut,:date_fin,:count)';
    $stmt = $conn->conn->prepare($sql);

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


function insertLangues( $langue, $degre, $count) {
    $conn = new connectDB();

    $sql = 'INSERT INTO `langue`(`langue`, `degre`, `id_candidat`) VALUES (:lang, :degres, :count)';
    $stmt = $conn->conn->prepare($sql);

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



function afficherParcoursProfessionnel($id) {

    $conn = new connectDB();

    

$sql = 'SELECT * FROM `parcours-professionelle` WHERE id_candidat=:id';
$stmt = $conn->conn->prepare($sql);

$stmt->bindParam(':id', $id);
$stmt->execute();


    if ($stmt->rowCount() >  0) {
        while ($row = $stmt->fetch()) {
            $societe = $row['societe'];
            $position = $row['position'];
            $date_debut = $row['date-debut'];
            $date_fin = $row['date-fin'];
            
            echo '<input type="text" name="parc-scolaire[]" placeholder="la société" id="societe" value="'.$societe.'">';
            echo '<input type="text" name="position[]" placeholder="votre position" id="position" value="'.$position.'">';
            echo '<br>';
            echo '<label for="datedebut">Date Début</label>';
            echo '<input type="date" name="date-debut-prof[]" style="margin-left: 5%;" value="'.$date_debut.'"> <br><br>';
            echo '<label for="date-fin">Date fin</label>';
            echo '<input type="date" name="date-fin-prof[]" style="margin-left: 7.5%;" value="'.$date_fin.'"> <br> <br> <br>';
        }
    } else {
        echo "Aucun parcours professionnel trouvé.";
    }
}



function afficherLangues($id) {
    $conn = new connectDB();
    $sql = "SELECT * FROM langue WHERE id_candidat = :id";
    $stmt = $conn->conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch()) {
            $langue = $row['langue'];
            $degre = $row['degre'];

            echo '<input type="text" name="langue_[]" style="width:42vh" placeholder="Entrer votre langue" id="langue" value="' . $langue . '">';
            echo '<input type="text" name="degre[]" style="width:42vh" placeholder="Entrer le degré" id="degre" value="' . $degre . '"><br>';
        }
    } else {
        echo "Aucune langue trouvée.";
    }
}



function afficherParcoursScolaire($id) {
    $conn = new connectDB();

    $sql = "SELECT * FROM `parcours-scolaire` WHERE id_candidat=:id";
    $stmt = $conn->conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    
    if ($stmt->rowCount() > 0) {
        while ($row = $stmt->fetch()) {
            $diplome = $row['diplome'];
            $etablissement = $row['etablissement'];
            $date_debut = $row['date-debut'];
            $date_fin = $row['date-fin'];
            
            echo '<input type="text" name="diplome[]" placeholder="entrer votre Diplome" id="diplome" value="'.$diplome.'">';
            echo '<input type="text" name="etablissement[]" placeholder="entrer votre Etablissement" id="etablissement" value="'.$etablissement.'">'; 
            echo '<br>';  
            echo '<label for="datedebut">Date Début</label>';   
            echo '<input type="date" name="date-debut-scolaire[]" style="margin-left: 5%;" value="'.$date_debut.'">';  
            echo '<br> <br>';
            echo '<label for="date-fin">Date fin</label>';   
            echo '<input type="date" name="date-fin-scolaire[]" style="margin-left: 7.5%;" value="'.$date_fin.'">';  
            echo '<br> <br> <br>';
        }
    } else {
        echo "Aucun parcours scolaire trouvé.";
    }
}



function afficherCompetences($id) {
    $conn = new connectDB();
    $sql = "SELECT competance FROM competances WHERE id_candidat=$id";
    $stmt = $conn->conn->prepare($sql);
  
    if ($stmt->execute()) {
        while ($row = $stmt->fetch()) {
            $competance = $row['competance'];
            echo '<input type="text" name="skill[]" placeholder="Entrer votre compétence" id="competences" value="'.$competance.'">';
            echo '<br>';
        }
    } else {
        echo "Aucune compétence trouvée.";
    }
}




function deleteCompetence($id) {
    $conn = new connectDB();

    // Préparer la requête SQL
    $sql = "DELETE FROM `competances`  WHERE id_candidat=$id";
    $stmt = $conn->conn->prepare($sql);

   
    // Exécuter la requête SQL
    $stmt->execute();
}





function deleteLangue( $id,) {
    $conn = new connectDB();
   // UPDATE `langue` SET `langue`='[value-2]',`degre`='[value-3]' WHERE 1
    // Préparer la requête SQL
    $sql = "DELETE FROM `langue` WHERE  id_candidat=$id";
    $stmt = $conn->conn->prepare($sql);

   

    // Exécuter la requête SQL
    $stmt->execute();
}

   
function deleteScolaire( $id) {
    $conn = new connectDB();

    $sql = "DELETE FROM `parcours-scolaire` WHERE id_candidat=$id ";
    $stmt = $conn->conn->prepare($sql);

    

    // Exécuter la requête SQL
    $stmt->execute();
}


function deleteProf($id) {
    $conn = new connectDB();
    
    $sql = "DELETE FROM `parcours-professionelle`  WHERE  id_candidat=$id ";
    $stmt = $conn->conn->prepare($sql);

  


    // Exécuter la requête SQL
    $stmt->execute();
}





function insertParcoursScolaire($diplomes, $etablissements, $dates_debut, $dates_fin, $count) {
    $conn = new connectDB();

    $sql = 'INSERT INTO `parcours-scolaire` (`diplome`, `etablissement`, `date-debut`, `date-fin`, `id_candidat`) VALUES (:diplome, :etablissement, :date_debut, :date_fin, :count)';
    $stmt = $conn->conn->prepare($sql);

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





function     insertClient($nom,$prenom,$email,$tel,$addres,$count,$content,$score,$ff,$cv,$poste_actuel)
 {
    $conn = new connectDB();

    $sql = "INSERT INTO `client`(`nom`, `prenom`, `email`, `tel`, `addres`, `id_candidat`, `photo`, `score`, `id-user`, `CV`,`poste_actuel`) VALUES (:nom, :prenom, :email, :tel, :addres, :count, :content, :score, :ff, :cv,:poste_actuel)";
    $stmt = $conn->conn->prepare($sql);
    $stmt->bindParam(':count', $count);
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':addres', $addres);
    $stmt->bindParam(':tel', $tel);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':content', $content);
    $stmt->bindParam(':score', $score);
    $stmt->bindParam(':ff', $ff);
    $stmt->bindParam(':cv', $cv);
    $stmt->bindParam(':poste_actuel', $poste_actuel);

    $stmt->execute();
}