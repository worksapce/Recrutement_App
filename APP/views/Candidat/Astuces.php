<?php

//importer fichier astuces
require 'C:/xampp/htdocs/Recrutement_App/APP/controllers/Candidat/Astuces.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Page avec bordure</title>
    <link rel="stylesheet" href="../../../../PUBLIC/CSS/Candidat/Astuces.css">
    
</head>
<body>
<center>
<h1 style="color:orange"> Astuces pour améliorer votre score 💡</h1></center>
    <div class="container">
    <?php

   
    // Vérifie si les scores sont inférieurs à 20 et affiche un message approprié
    if ($scol_score < 3) {
        echo "<p>Votre score scolaire est faible. Vous devez améliorer votre niveau,il y a plusieurs façons d'améliorer votre niveau dans chaque domaine. Pour améliorer votre score scolaire, essayez de consacrer plus de temps à l'étude et à la pratique, utilisez des outils pédagogiques en ligne pour améliorer votre compréhension et votre mémoire, et demandez de l'aide à des tuteurs ou à des enseignants pour les sujets qui vous posent problèmee.</p>";
    }
    if ($prof_score < 4) {
        echo "<p>Votre score de parcours  professionelle est faible. Vous devez améliorer votre niveau,Si vous souhaitez améliorer votre parcours professionnel, commencez par identifier les compétences et les connaissances dont vous avez besoin pour atteindre vos objectifs. Cela peut inclure des compétences techniques, telles que la maîtrise de logiciels ou de méthodes de travail spécifiques, ainsi que des compétences interpersonnelles, telles que la communication, la collaboration et la gestion du temps</p>";
    }
    if ($langue_score < 2) {
        echo "<p>Votre score de langue est faible. Vous devez améliorer votre niveau,Pour améliorer votre score de langue, pratiquez régulièrement en lisant, écrivant, écoutant et parlant la langue, et utilisez des applications et des ressources en ligne pour renforcer votre grammaire, votre vocabulaire et votre compréhension.</p>";
    }
    if ($competance_score < 4) {
        echo "<p>Votre score de compétence est faible. Vous devez améliorer votre niveau,pour améliorer votre score de compétence, travaillez sur vos compétences professionnelles spécifiques en vous formant régulièrement et en acquérant de nouvelles compétences, participez à des projets qui vous permettent de mettre en pratique ces compétences, et cherchez des mentors et des conseillers pour vous guider et vous aider à progresser.</p>";
    }

      
    ?>
    <center>
    <a href="../ProfilCandidat.php"> ⬅️ profil </a></center>
    </div>
</body>
</html>