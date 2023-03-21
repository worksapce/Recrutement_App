    <?php
    require '../../models/RH_models/connectionDB.php';

    
     session_start();
    if(!isset($_SESSION['user'])){ 

      header('Location: ../../views/Sign_in & Sign_Up/SignIn.php');
      exit;
    }



    $userId = $_SESSION['user']['id'];

    $user = getUserById($userId);
    $recruiter = getRecruteurById($userId);
    $poste = getPosteRechercherById($recruiter['id_RH']);
    $candidats =  getALLCandidats();

    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../PUBLIC/CSS/RH_CSS/RecruteurPage.css?echo time(); ?>" />

        <!-- font utlisé  -->
        <!-- <link href="https://fonts.googleapis.com/cgss2?family=Poppins:wght@300;700&display=swap" rel="stylesheet"> -->
        <title>RH</title>
    </head>

    <body>
        <!--sidebar  -->
        <div class="sidebar">
            <!-- logo de site -->
            <h1 class="logo">sitename</h1>
            <!-- menu -->
            <div class="menu">
                <a href="./RecruteurPage.php"> <ion-icon name="home"></ion-icon> Accueil </a>
                <a href="./ProfileRH.php"> <ion-icon name="person"></ion-icon>Profile </a>
                <a href="../chatApp/Chat_app.php" > <ion-icon name="mail"></ion-icon>Messagerie </a>
                <a href="../Sign_in & Sign_Up/SignOut.php"> <ion-icon name="log-out-outline" ></ion-icon>Log out </a>
            </div>
            <!-- profile RH -->
            <div class="profile">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($recruiter['photo']); ?>" alt="" class="image_RH">
                <div class="nom_RH">
                    <h4><a href="./ProfileRH.php" id="link"><?php echo $user['Nom']; ?></a> </h4>
                </div>
            </div>

        </div>
        <!-- main -->
        <div id="main">
            <div class="main-header">
                <div class="ZoneDeRecherche">
                    <input type="text" placeholder="Search..." class="input_recherche" id="search-item" onkeyup="search()">
                    <button class="Bouton_Recherche"> <ion-icon name="search"></ion-icon></button>
                </div>
            </div>


            <!-- filters -->
            <div class="filtercontainer">
                <!-- skills -->


                <div class="selectbox">
                    <div class="selectOption">
                        <button type="text" placeholder="            job title" class="inputSelect" id="jobtitle-select">Job Titles</button>
                    </div>
                    <div class="content">
                        <div class="search">
                            <input type="text" placeholder="Search" class="optionsearch">
                        </div>
                        <ul class="options">
                        </ul>
                    </div>
                </div>
                <div class="selectbox">
                    <div class="selectOption">
                        <button type="text" class="inputSelect" id="inputSelectSkill">Select skill</button>
                    </div>
                    <div class="content">
                        <div class="search">
                            <input type="text" placeholder="Search" class="optionsearch">
                        </div>
                        <ul class="options">
                        </ul>
                    </div>
                </div>

        
                <div class="selectbox">
                    <div class="selectOptionx">
                        <button type="text" class="inputSelect" id="resetBtn">Reset</button>
                    </div>

                </div>
            </div>
            <!-- sort -->
            <div class="sort">
                <div class="sortlist">
                    <select id="select">
                        <option value="tout">Tout</option>
                        <option value="Mscore">Meilleur score</option>
                        <option value="Fscore">Faible score</option>
                    </select>
                </div>
            </div>

            <!-- cards -->

            <div class="items">
                <?php
                    foreach ($candidats as $r) {
                        $id_candidat = $r['id_candidat'];
                        $candidatSkill = getSkillsByCandidatId($id_candidat);
                        $encoded_skills = htmlspecialchars(json_encode($candidatSkill));
    
                        
                      
    

                ?>
                        <div class="wrapper" data-id=<?php echo $r['id_candidat']; ?> data-jobtitle="<?php echo $r['poste_actuel']; ?>" data-skills="<?php echo $encoded_skills; ?> ">
                            <div class="card">
                                <div class="card_left bg">
                                <img src="data:image/jpeg;base64,<?php echo base64_encode($r['photo']); ?>" alt="" class="image_RH">
                                </div>
                                <div class="card_Center">
                                    <h3><?php echo $r['nom']; ?></h3>
                                    <p class="st"><?php echo $r['poste_actuel']; ?></p>
                                    <p class="em"><ion-icon name="mail-outline"></ion-icon> <?php echo $r['email']; ?></p>
                                </div>
                                <div class="card_right">
                                    <h1><?php echo $r['score']; ?></h1>
                                </div>
                            </div>
                        </div>
                <?php
                    }
               
                ?>
            </div>



        </div>


        <!-- les details de card -->
        <div class="info">

        </div>


    </body>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script src="../../../PUBLIC/JS/RH_JS/RechercheFilter.js?php echo time(); ?>"></script>
    <script type="module"  src="../../../PUBLIC/JS/RH_JS/ImplementationData.js?php echo time(); ?>"></script>
    <script src="../../../PUBLIC/JS/RH_JS/TrierScore.js?php echo time(); ?>"></script>

    <script src="../../../PUBLIC/JS/RH_JS/BarRecherche.js?php echo time(); ?>"></script>
    <script src="../../../PUBLIC/JS/RH_JS/listeners.js?php echo time(); ?>"></script>

    <script defer    src="../../controllers/RH_controller/Displayinfo.js?php echo time(); ?>"></script>
    <script  type="module"    src="../../controllers/RH_controller/FilterCandidat.js?php echo time(); ?>"></script>





    </html>