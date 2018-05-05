<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head> 
  <title>Vous</title>
  <link rel="shortcut icon" href="logo3.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css" />
 <link rel="stylesheet" type="text/css" href="vous.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>    

  </style>
</head>   
<body>
  
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <img src="Images/logo2.png" class="img-rounded" height="90" width="140" alt="Logo du site" style=" margin-left:10px;">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li> <a href="page_d_accueil.php">Accueil</a></li>
        <li><a href="reseau.php">Réseau</a></li>
        <li><a href="emplois.php">Emplois</a></li>
        <li><a href="messagerie.php">Messagerie</a></li>
        <li><a href=notification.php>Notifications</a></li>
        <li class="active"><a href="vous.php">Vous</a></li>
        <li><a href="page_de_connection.php"> <button type="button" name="Se Deconnecter">Se Deconnecter </button></a> </li>
      </ul>
    </div>
  </div> 
</nav>
 

<div class="container text-center" style="margin:110px">    
  <div class="row" >
    <div class="col-sm-12 well" >
      <div class="well" style="background-image: url(<?php include("vous_getfond.php"); ?>); background-repeat:no-repeat; background-position:center ;"> <!-- affiche l'image de fond -->

      <?php include("vous_getphoto.php"); ?> <!-- affiche photo de profil -->

      </div>

      <div class="well">

          <div class="well">
             <h1>Informations générales:</h1>
             <p> <?php include("vous_getinfos.php"); ?> </p>
              <p></p>
             <p> <input type="button" value="Télécharger le CV" onclick="window.location='<?php include("vous_getlienCV.php"); ?>.' ;"> </p> <!-- telecharge CV -->

          </div>

           <div class="well"> 
              <h1>Experiences:</h1>   
              <p> <pre> <?php include("vous_getemploi.php"); ?> </pre> </p>     
          </div>


          <div class="well"> 
            <h1>Formation:</h1>
              <p> <pre> <?php include("vous_getformation.php"); ?> </pre> </p>
          </div>

            <div class="modifierinfos">
              <br>
            <h1>Modifier mes informations:</h1>
              <br>
             <!-- ouvre une nouvelle fenêtre -->
            <form method="POST" action="vous_modification.php" enctype="multipart/form-data">

              <label style="text-align :left; font-size: 20px;font-weight: bold ;color: #007179; "> Prénom: </label> 
              <input type="text" name="Prenom" id="Prenom"/> <br><br>

              <label style="text-align :left; font-size: 20px;font-weight: bold ;color: #007179;"> Nom: </label>
              <input type="text" name="Nom" id="Nom"/> <br><br>

              <label style="text-align :left; font-size: 20px;font-weight: bold ;color: #007179; "> E-Mail: </label>
              <input type="email" name="Email" id="Email"/> <br><br>

              <label style="text-align :left; font-size: 20px;font-weight: bold ;color: #007179; "> Mot de passe: </label>
              <input type="password" name="Motdepasse" id="Motdepasse"/> <br><br>

              <label style="text-align :left; font-size: 20px;font-weight: bold ;color: #007179; "> Promotion: </label>
              <input type="text" name="Promotion" id="Promotion"/> <br><br>

              <label style="text-align :left; font-size: 20px;font-weight: bold ;color: #007179; "> Humeur: </label>
              <SELECT name="Humeur" id="Humeur" size="1">
                <OPTION>CONTENT</OPTION>
                <OPTION>BOF</OPTION>
                <OPTION>PAS CONTENT</OPTION>
              </SELECT>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <label style="text-align :left; font-size: 20px;font-weight: bold ;color: #007179; margin-right: 50px;"> Spécialité: </label>
              <SELECT name="Specialite" id="Specialite" size="1">
                <OPTION>Sport</OPTION>
                <OPTION>Art</OPTION>
                <OPTION>Jeux-vidéos</OPTION>
                <OPTION>Sciences</OPTION>
                <OPTION>Matlab</OPTION>
                <OPTION>C</OPTION>
                <OPTION>C++</OPTION>
                <OPTION>Java</OPTION>
                <OPTION>Html/Css</OPTION>
                <OPTION>Python</OPTION>
              </SELECT>
              <br><br>
                
              <label style="text-align :left; font-size: 20px;font-weight: bold ;color: #007179; "> Images:  </label> <br><br>

              <label style="width: 300px;"> Importer une photo de profil:</label>
              <input type="file" name="photo_de_profil" id="photo_de_profil" style="padding-left: 400px;" />  <br><br>
              <label style="width: 300px;">  Importer une image de fond: </label> 
              <input type="file" name="image_de_fond" style="padding-left :400px" " /> <br>

               <label style="text-align :left; font-size: 20px;font-weight: bold ;color: #007179;"> CV:  </label> <br>

              <label style="width: 300px;"> Importer votre CV: <br> </label>
              <input type="file" name="cv" id="cv"  style="padding-left :400px" />  <br>
               <p></p>

              <strong> <input type="submit" name="modifier" value="Modifier" style="border:none;
             padding:10px 0 6px 0; border-radius:75%; border-bottom:5px solid #007179; border-top:5px solid #007179; background:transparent;"> </strong>
             </form>
        </div>
      </div> 
    </div>
  </div>
</div>

</div>

<footer class="container-fluid text-center">

  <strong> ECE Student Network Copyright © 2018 </strong>
  <p> Poletto Mathieu <br> Remurier Léo <br> Baralle Nicolas </p>

</footer>

</body>
</html>
