<?php
 $host = "localhost";
$port = '3306';
    $dbname = "recrutementdb";
    $username = "root";
    $password = "";

    try {
        $con = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $username, $password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    function getUserById($id)
    {
        global $con;
        $stmt = $con->prepare("SELECT * FROM user WHERE `id-user`=?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function getRecruteurById($id)
    {
        global $con;
        $stmt = $con->prepare("SELECT * FROM `rh` WHERE `id-user`=?");
        $stmt->execute([$id]);
       $data=  $stmt->fetch();
       return $data;
    }

    function getRecruteursSkillsInitialsById($id)
    {

        global $con;
        $stmt = $con->prepare("SELECT * FROM `skill_initial` WHERE `id_RH`= ? ");
        $stmt->execute([$id]);
        $skills = array();

        while ($row = $stmt->fetch()) {
            array_push($skills, $row['skill_initial']);
        }
        return $skills;
    }

    function getPosteRechercherById($id)
    {
        global $con ;
        $stmt = $con->prepare("SELECT * FROM `poste-rechercher-initial` WHERE id_RH =?");
        $stmt->execute([$id]);
        $row = $stmt->fetch();
        return $row['poste'];

    }

    function getCandidatsByPosteAndSkills($posteRechercher, $skills)
    {
        global $con;
        $query = "SELECT client.`id_candidat`, `id-user`, `nom`, `prenom`, `tel`, `email`, `adresse`, `status`, `score`, `poste_actuel`  FROM client, skills WHERE client.id_candidat = skills.id_candidat AND poste_actuel=:posteRechercher AND (";
        for ($i = 0; $i < count($skills); $i++) {
            if ($i > 0) {
                $query .= " OR ";
            }
            $query .= "text='" . $skills[$i] . "'";
        }
        $query .= ")";
        $stmt = $con->prepare($query);
        $stmt->bindParam(':posteRechercher', $posteRechercher);
        $stmt->execute();
        $data =$stmt->fetchAll(); 
        return $data;
    }
    function getALLCandidats()
    {
        global $con;
        // $query = " SELECT `id_candidat`, `id_user`, `nom`, `prenom`, `tel`, `email`, `adresse`, `status`, `score`, `poste_actuel`   FROM client ";
        $query = "SELECT `poste_actuel`,  `nom`, `prenom`, `email`,`photo`, `tel`, `addres`, `id_candidat`, `score`, `id-user`FROM `client`";
       
       
        try {
            $stmt = $con->prepare($query);
            $stmt->execute();
            $data =  $stmt->fetchAll();
            return $data;
        } catch(PDOException $e) {
            // Handle exception
            error_log($e->getMessage());
            return false;
        }
    }
    
    function getSkillsByCandidatId($id) {
        global $con;

        $stmt = $con->prepare("SELECT  `competance` FROM competances WHERE id_candidat = ?");
        $stmt->execute([$id]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    function getCandidateById($id) {
        global $con;

        // $stmt = $con->prepare("SELECT `id_candidat`, `id-user`, `nom`, `prenom`, `tel`, `email`, `adresse`, `status`, `score`, `poste_actuel` FROM client WHERE id_candidat = ?");
        $stmt = $con->prepare("SELECT `nom`, `prenom`, `email`, `tel`, `addres`, `id_candidat` , `poste_actuel`, `score`,`id-user` FROM `client` WHERE id_candidat = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    function getParcoursProfessionnelByCandidatId($id) {
        global $con;

        $stmt = $con->prepare("SELECT * FROM `parcours-professionelle` WHERE id_candidat=?");
        $stmt->execute([$id]);
        return $stmt->fetchAll();
    }

    function getParcoursScolaireByCandidatId($id) {
        global $con;

        
        $stmt = $con->prepare("SELECT * FROM `parcours-scolaire` WHERE id_candidat =?");
        $stmt->execute([$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    function getLanguesByCandidatId($id) {
        global $con;

        $stmt = $con->prepare("SELECT * FROM langue WHERE id_candidat = ?");
        $stmt->execute([$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function getALLSkillsByCandidatId($id) {
        global $con;

        $stmt = $con->prepare("SELECT * FROM competances WHERE id_candidat = ?");
        $stmt->execute([$id]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function updateRHParam($societe, $secteur, $competancea, $competanceb, $competancec, $poste, $user_id ,$id_RH) {
        global $con;

        // Update rh table
        $stmt = $con->prepare("UPDATE rh SET societe=?, secteur=? WHERE `ID-user`=?");
        $stmt->execute([$societe, $secteur, $user_id]);
        
        // Update skill_initial table
        $stmt = $con->prepare("UPDATE skill_initial SET skill_initial=? WHERE ID_RH=? AND id_skill_initial=?");
        $stmt->execute([$competancea, $id_RH, 1]);
        $stmt->execute([$competanceb, $id_RH, 2]);
        $stmt->execute([$competancec, $id_RH, 3]);
    
        // Update poste-rechercher-initial table
        $stmt = $con->prepare("UPDATE `poste-rechercher-initial` SET poste=? WHERE ID_RH=?");
        $stmt->execute([$poste, $id_RH]);
    
    }


    function getCandidateCV($candidat_id) {
        global $con;

            // prepare and execute query
            $stmt = $con->prepare("SELECT cv, nom FROM client WHERE id_candidat = :id");
            $stmt->bindParam(":id", $candidat_id);
            $stmt->execute();

            // fetch result
            $file = $stmt->fetch(PDO::FETCH_ASSOC);

            return $file;
            }
                

            function getCandidatePhotoById($candidateId) {
                // Connect to the database
                global $con;
            
                // Prepare and execute query
                $stmt = $con->prepare("SELECT photo FROM client WHERE id_candidat = :id");
                $stmt->bindParam(":id", $candidateId);
                $stmt->execute();
            
                // Fetch the result
                $photoData = $stmt->fetchColumn();
            
                // Close the statement
            
                // Return the photo data
                return $photoData;
            }
            
           