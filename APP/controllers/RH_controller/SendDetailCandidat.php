<?php 
    require '../../models/RH_models/connectionDB.php';


    $candidateId = $_GET['candidateId'];
    $includeSkills = isset($_GET['includeSkills']) && $_GET['includeSkills'] === 'true';
    $includeParProf = isset($_GET['includeParProf']) && $_GET['includeParProf'] === 'true';
    $includeParScol = isset($_GET['includeParScol']) && $_GET['includeParScol'] === 'true';
    $includeLang = isset($_GET['includeLang']) && $_GET['includeLang'] === 'true';


    $candidate = getCandidateById($candidateId);
    $photoData = getCandidatePhotoById($candidateId);

    // Add the photo data to the candidate data
    $candidate['photo'] = base64_encode($photoData);

  

    if ($includeSkills) {
        $skills = getALLSkillsByCandidatId($candidateId);
        $candidate['skills'] = $skills;
        
    }

    if ($includeParProf) {
        $parcours_professionnel = getParcoursProfessionnelByCandidatId($candidateId);
        $candidate['parcours_professionnel'] = $parcours_professionnel;
    }

    if ($includeParScol) {
        $parcours_scolaire = getParcoursScolaireByCandidatId($candidateId);

        $candidate['parcours_scolaire'] = $parcours_scolaire;
    }

    if ($includeLang) {
        $langues = getLanguesByCandidatId($candidateId);
        $candidate['langues'] = $langues;
    }

    //header('Content-Type: application/json');
    echo json_encode($candidate);
?>