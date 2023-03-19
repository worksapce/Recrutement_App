<?php


// Vérifier si un fichier a été téléchargé
if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] == 0) {
    // Récupérer le contenu du fichier PDF
    $fichier_pdf = fopen($_FILES['pdf_file']['tmp_name'], "rb");
    $contenu_pdf = fread($fichier_pdf, filesize($_FILES['pdf_file']['tmp_name']));
    fclose($fichier_pdf);
    $_SESSION['contenu_pdf']=$contenu_pdf;
}

    
        
?>
