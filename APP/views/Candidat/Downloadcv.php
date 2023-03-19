
<?php 
include "C:/xampp/htdocs/Recrutement_App/APP/controllers/Candidat/Donwloadcv.php"





?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="style.css"> -->
    <title>Document</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../../PUBLIC/CSS/Candidat/Downloadcv.css">

</head>

<body>

   
</head>
<body  style=" background: linear-gradient(to right,  #c7e7ee,#91E5F6);"> 
    <div class="all">
  


 <nav id="sidebar">
       
   <div id="text">
        <ul class="list-unstyled CTAs">
            
            <a class="tele" href="../../../PUBLIC/Images/cvExemple.pdf" download>Exemple CV 📁</a>
            
           
        </ul>

        
        <ul class="list-unstyled CTAs">
            
                <a class="tele" href="../Candidat/FormCandidat.php" class="download">Allez vers Formulaire ➡️</a class="tele">
            
           
        </ul>
</div>
    </nav> 




<div class="wrapper">
    
                
  



<div class="container">
    <form action="../Candidat/FormCandidat.php" method="post" enctype="multipart/form-data" id="form">

            
            
                  
 
                          
                <div style="  display:grid " id="contenu" >
                  <h1 style="margin-top:8%">veuillez télecharger votre CV ci-dessous</h1>
                 <a href=''>   <label for="filechoose">
                      <img src="../../../PUBLIC/Images/iconecv.png"  alt="Responsive image" style="width: 22vh; margin-left: 2%; ">
                     </label> </a>
                    <input type="file" name="pdf_file" class="form-control-file" id="filechoose"  style="visibility: collapse;">
                    <div class="button" style="background:white">
                         <button class="btn btn-success mt-3"   type="submit" name="submit" id="load" style="font-size: x-large" >Upload</button>
                     </div>
                </div>
                <div class="lien"    style="margin-top:5%; color: #91E5F6">
             <!-- <a href="index.php" style=" color: blue" > Allez vers Formulaire ➡️</a> -->
    </form>      </div>
            
</div>
            
       

<script src="../../../PUBLIC/util/Downloadcv.js"></script>


    <script >
 





</script> 
</div>
</div>


</body>




