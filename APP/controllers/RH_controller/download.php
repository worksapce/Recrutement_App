<?php
require '../../models/RH_models/connectionDB.php';

   
    // get the file ID from the form
    $candidat_id = $_POST['candidateId'];

    // get candidate's CV from the model
    $file = getCandidateCV($candidat_id);

    // check if the query returned a valid result
    if ($file['cv']) {
        // set headers to trigger download
        header('Content-Description: File Transfer');
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $file['nom'] . '.pdf"; cache-control=max-age=0');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . strlen($file['cv']));

        // turn off output buffering to ensure no whitespace is output before the file content
        while (ob_get_level()) {
            ob_end_clean();
        }

        // output the file contents
        echo $file['cv'];
        exit;
    } else {
        // no file found, display error message
        echo 'No file found for this candidate.';
    }

?>