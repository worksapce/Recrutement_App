<?php
require '../../models/RH_models/connectionDB.php';

  @session_start();
    if(!isset($_SESSION['user'])){ 
      header('Location: ../Sign_in & Sign_Up/SignIn.php');
      exit;
    }

    $userId = $_SESSION['user']['id'];




$user = getUserById($userId);
$recruiter = getRecruteurById($userId);
$id_Rh= $recruiter['id_RH'];    

$societe = $recruiter['societe'];
$secteur = $recruiter['secteur'];

$skills = getRecruteursSkillsInitialsById($id_Rh);

list($skill1, $skill2, $skill3) = array_slice($skills, 0, 3);
$poste= getPosteRechercherById($id_Rh);

if (isset($_POST['envoyer'])) {
    // Handle form submission
    $societe = $_POST['societe'];
    $secteur = $_POST['secteur'];
    $competancea = $_POST['competancea'];
    $competanceb = $_POST['competanceb'];
    $competancec = $_POST['competancec'];
    $poste = $_POST['poste'];

    updateRHParam($societe, $secteur, $competancea, $competanceb, $competancec, $poste, $userId ,$id_Rh) ;

  
     header("Location: RecruteurPage.php ");
     echo "<h1>Data submitted successfully.</h1>";

    exit();

    // Confirmation message
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../../PUBLIC/CSS/RH_CSS/ParamRH.css">





    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

</head>

<body>
    <div class="container">
        <center>
            <header>Changer vos parametres ???</header>
        </center>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'>
            <div class="form first">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Sociéte</label>
                            <input type="text" name="societe" value="<?php echo $societe; ?>">
                        </div>

                        <div class="input-field">
                            <label>Secteur</label>
                            <input type="text" name="secteur" value="<?php echo $secteur; ?>">
                        </div>
                    </div>

                </div>

                <div class="details ID">
                    <span class="title">Normes demandé</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>competances 1</label>
                            <input type="text" placeholder="Numéro 1" name="competancea" value="<?php echo $skill1; ?>">
                        </div>

                        <div class="input-field">
                            <label>competances 2</label>
                            <input type="text" placeholder="Numéro 2" name="competanceb" value="<?php echo $skill2; ?>">
                        </div>

                        <div class="input-field">
                            <label>competances 3</label>
                            <input type="text" placeholder="Numéro 3" name="competancec" value="<?php echo $skill3; ?>">
                        </div>


                        <div class="input-field">
                            <label>poste rechércher</label>
                            <input type="text" name="poste" value="<?php echo $poste; ?>">
                        </div>


                    </div>

                    <button type="submit" class="nextBtn" name="envoyer">
                        <span class="btnText">Update</span>

                    </button>
                </div>
            </div>

        </form>
    </div>

</body>

</html>