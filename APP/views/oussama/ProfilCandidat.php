
<? require '../controllers/ProfilCandidat.php';?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../PUBLIC/CSS/ProfilCandidat.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body style=" background: linear-gradient(to right,  #c7e7ee,#91E5F6);">





<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb " class="main-breadcrumb">
          
            <ol class="breadcrumb text-center">
<center>
           Bienvenue sur  Votre profil , veuillez consuler votre score et prend quelques astuces  ⬇️  </center>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
              
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card " >
                <div class="card-body">   
                  <div class="d-flex flex-column align-items-center text-center">
                  <img src= "data:image/jpeg;base64,<?php echo base64_encode($photo); ?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4> <?php   echo $prenom .' '. $nom;                     ?></h4>
                      <?php
                                foreach ($tab as $valeur) {
                                    
                                

                                echo '<p class="text-secondary mb-1">' . $valeur . '</p>';}
                            ?>
                      <p class="text-muted font-size-sm"></p>
                      
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="card mt-3" >
                <ul class="list-group list-group-flush">
                  
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                   <h2>   votre score est : <?php   echo '<span style="color:#386FA4">' . $score . '</span>';?></h2>
                  </li>
                </ul>
              </div>
               
              <div class="card mt-3" >
                <ul class="list-group list-group-flush  " >
                  
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                            
                  <h2>Valorisation:</h2>   
                        <h3>
                            <?php   
                                if($score < 15){
                                    echo '<span style="color:red">Faible</span>';
                                }
                                else if($score >= 15 && $score < 45){
                                    echo '<span style="color:orange">Moyenne</span>';
                                }
                                else{
                                    echo '<span style="color:green">Elevé</span>';
                                }
                            ?> 
                        </h3>



                  </li>
                </ul>
              </div>

              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <a href='Astuces.php'> <h3 style="color:green">   Astuces pour ameliorer votre score 💡</h3> </a>
                  </li>
                </ul>
              </div>
              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <a href='downloadcv.php'> <h3 style="color:orange"> mettre à jour votre cv  </h3> </a>
                  </li>
                </ul>
              </div>


            </div>

            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row" >
                    <div class="col-sm-3">
                      <h6 class="mb-0"> Prenom</h6> 
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php   echo $prenom;                      ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nom</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php   echo  $nom;                     ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row" >
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php   echo  $email;                     ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php   echo  $tel;                     ?>                    </div>
                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php   echo  $adress;                     ?>
                    </div>
                  </div>
                  <hr>
                  
                </div>
              </div>

              <div class="row gutters-sm" style="margin-left:1%" >
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">CV Status</h6>
                      <small>Compétance</small>
                      <div class="progress mb-3" style="height: 5px">
                      <div class="progress-bar bg-primary" role="progressbar" style="width:  <?php   echo  $competance_score *10;  ?>%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>

                      </div>
                      <small>langue</small>
                      <div class="progress mb-3" style="height: 5px">
                      
                        <div class="progress-bar bg-primary" role="progressbar" style="width:   <?php   echo  $langue_score *10;  ?>%" aria-valuenow="72" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small> Formation scolaire</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width:  <?php   echo  $scol_score *10;  ?>%" aria-valuenow="89" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      <small>Experience professionnelle</small>
                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width:  <?php   echo  $prof_score *10;  ?>%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      
                    </div>
                  </div>
                </div>
                
              

                 


              <div class="row gutters-sm"  style="margin-left:4%  " >
                <div class="col-sm-23 mb-3" >
                  <div class="card h-100">
                    <div class="card-body" >
                                              


                  

                                                        <table class="table">
                                    <thead>
                                        <tr>
                                        <th >Langue</th>
                                        <th style=" padding-left:80px">Degré</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                         <?php  while ($row = $result5->fetch()) {
                                         
                                            ?>
                                        <tr>

                                            <td ><?php echo $row["langue"]; ?></td>
                                            <td style=" padding-left:70px"><?php echo $row["degre"]; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                    </table>
                      
                      
                    </div>
                  </div>
                </div>
                
              </div>



              <table class="table">
  <thead>
    <tr>
      <th>Diplome</th>
      <th>Etablissement</th>
      <th>Date début</th>
      <th>Date fin</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $result2->fetch()) { ?>
      <tr>
        <td><?php echo $row["diplome"]; ?></td>
        <td><?php echo $row["etablissement"]; ?></td>
        <td><?php echo $row["date-debut"]; ?></td>
        <td><?php echo $row["date-fin"]; ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>



<table class="table">
  <thead>
    <tr>
      <th>Societe</th>
      <th>   la Position   </th>
      <th >   Date début</th>
      <th>Date fin</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    while($row = $result3->fetch()) { 
      $societe = $row["societe"];
      $position = $row["position"];
      $date_debut = $row["date-debut"];
      $date_fin = $row["date-fin"];
    ?>
    <tr>
      <td><?php echo $societe; ?></td>
      <td><?php echo $position; ?></td>
      <td><?php echo $date_debut; ?></td>
      <td><?php echo $date_fin; ?></td>
    </tr>
    <?php 
    }
    ?>
  </tbody>
</table>









<style> 

table{


border: 2px ;
background-color: white;
}



</style>




             </div>

            </div>
          </div>

        </div>
    </div>
</body>

