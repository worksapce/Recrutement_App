
<?php
include "C:/xampp/htdocs/Recrutement_App/APP/controllers/inscriptionRh.php"
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- importer css -->
    <link rel="stylesheet" href="../../../PUBLIC/CSS/inscriptionRh.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>
<body>
    <div class="container">
        <center>
        <header >Fiche d'inscription</header></center>

        <form action="" method='post' enctype="multipart/form-data">
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Sociéte</label>
                            <input type="text" placeholder="Entrer votre societe" name="societe" >
                        </div>
                        <input type="file" placeholder="" name="photo" >

                        <div class="input-field">
                            <label>Secteur</label>
                            <input type="text" placeholder="Entrer votre secteur" name="secteur" >
                        </div>
                        </div> 
                    
                </div>

                <div class="details ID">
                    <span class="title">Normes demandé</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>competances 1</label>
                            <input type="text" placeholder="Numéro 1" name="competancea" >
                        </div>

                        <div class="input-field">
                            <label>competances 2</label>
                            <input type="text" placeholder="Numéro 2" name="competanceb">
                        </div>

                        <div class="input-field">
                            <label>competances 3</label>
                            <input type="text" placeholder="Numéro 3" name="competancec">
                        </div>

                        <div class="input-field">
                            <label>Langue 1</label>
                            <input type="text" placeholder="Numéro 1" name="languea">
                        </div>

                        <div class="input-field">
                            <label>Langue 2</label>
                            <input type="text" placeholder="Numéro 2" name="langueb">
                        </div>

                        <div class="input-field">
                            <label>Langue 3</label>
                            <input type="text" placeholder="Numéro 3" name="languec">
                        </div>
                        <div class="input-field">
                            <label>poste rechércher</label>
                            <input type="text" placeholder="Entrer le poste a rechercher" name="poste" >
                        </div>


                    </div>

                    <button type="submit" class="nextBtn" name="envoyer">
                        <span class="btnText">Envoyé</span>
                        
                    </button>
                </div> 
            </div>

        </form>
    </div>

</body>
</html>
