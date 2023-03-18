



<? require '../../controllers/FormCandidat.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../PUBLIC/CSS/FormCandidat.css">
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css"> 
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- <<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
          <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous"> -->

</head>
<body style=" background: linear-gradient(to right,  #c7e7ee,#91E5F6); "> 
    

    






<div class="wrapper">
    
    
    



    <div class="container">
    <form action="" method="post" enctype="multipart/form-data" id="form">

            <h1 style=" color:#386FA4  ">CV FORMULAIRE</h1>
            <div class="form-group">
                   <div class="head">
                  <div class="photo">
<label for="photo">
                              <img src="../../../PUBLIC/Images/iconephoto.png"  alt="Responsive image" style="width: 20vh; margin-left: 20%;">  
</label>
                 <input type="file" name="photos" onchange="afficherImage()" style="width: 60%; visibility:collapse; " id="photo"  >
                     </div>
 

                   </div>
            </div>
            
         

                 
        <h2 style="margin-top: 2%; color :    color: #59A5D8;">Information personnelle</h2>
        <div class="fieldset"> 
            <div class="ligne">
                
               <input type="text" name="nom" placeholder="entrer votre nom"  id="nom" >
                <input type="text" name="prenom" placeholder="entrer votre prenom" id="prenom"> 
            </div>
            <br> 
            <div class="info">
                <div class="ligne">
                    <input type="email" name="email" placeholder="entrer votre email"  id="email">
                    <input type="text" name="addres" placeholder="entrer votre adress"  id="adresse" >
                </div>
                <br> 
                <div class="ligne">
                    <input type="tel"    name="tel" placeholder="entrer votre numéro de télephone"  id="tel"> 
                </div>
                <br> 
                
               
             <h2 style="color :    color: #59A5D8;">Langue</h2>
             <div id="languesss">
             <div class="langue">
        <input type="text" name="langue_[]" style="width:42vh" placeholder="Entrer votre langue" id="langue">
        <input type="text" name="degre[]" style="width:42vh" placeholder="Entrer le degré" id="degre"><br>
        </div>     
      </div>
      
    <div id="langues"></div>
    <button class="button" id="btn-langue">Ajouter une langue</button>
    <button class="button" id="Btn-l_rm">supprimer</button>
      

                <br> 
                <div class="ligne">
                    <h2 style="color :    color: #59A5D8;">Compétances</h2>
                    <div id="competance">
                    <input type="text" name="skill[]" placeholder="entrer votre Compétances" id="competances" > 
                     </div>
                    <span id="competancess" ></span>
                    <button class="button" id="btn-competance">ajouter des Compétances</button>
                    <button class="button" id="Btn-s_rm">supprimer</button>

                </div>
            </div>




            <div class="pa-sc">
                <h2 style="color :    color: #59A5D8;">Parcours scolaire</h2>
                <div class="ligne">
                    <div id="parcour_sc">
                    <div id="parcour_sc_container"> 
                        <input type="text" name="diplome[]" placeholder="entrer votre Diplome" id="diplome" >  
                        <input type="text" name="etablissement[]" placeholder="entrer votre Etablissement" id="etablissement"> 
                        <br>  
                        <label for="datedebut">Date Début</label>   
                        <input type="date" name="date-debut-scolaire[]" style="margin-left: 5%;">  <br> <br>
                        <label for="date-fin">Date fin</label>   
                        <input type="date" name="date-fine-scolaire[]"  style="margin-left: 7.5%;" >  
                        <br>  <br> <br>
                    </div>
                    </div>
                    <div id="parcours_sc"></div>
                    <button class="button" id="Btn-sc">ajouter autres</button>
                    <button class="button" id="Btn-sc_rm">supprimer</button>

                </div>
                <br> 
            </div>
            
        <div class="pa-pr">
            <h2 style="color :    color: #59A5D8;"> Parcours Professionelle</h2> 
            
            
                <div class="ligne">
                 <span id="parcour_pr">
                    <div class="parcours_pr_container">
                    <input type="text" name="parc-scolaire[]" placeholder="la société" id="societe">
                    <input type="text" name="position[]" placeholder="votre position" id="position">
                    <br> 
                    <label for="datedebut">Date Début</label>   
                    <input type="date" name="date-debut-prof[]" style="margin-left: 5%;" >  <br><br>
                    <label for="date-fin">Date fin</label>   
                    <input type="date" name="date-fin-prof[]" style="margin-left: 7.5%;" > <br> <br> <br>
                  </div>  
                 </span>
                  <div id="parcours_pr"></div>

                   <button class="button" id="Btn-pr">ajouter autres</button>
                   <button class="button" id="Btn-pr_rm">supprimer</button>

                </div>
        </div>
        <br> <br>
        <button type="submit" name="envoyer" id="envoyer"  >Envoyer</button>
    </form>

    <script src="../../../PUBLIC/util/Form.js"></script>
    <script src="../../../PUBLIC/util/Parser.js"></script>



   
</div>



</body>


