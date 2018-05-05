<?php session_start();?>



<!DOCTYPE html>


<html lang="en">
<head> 
  <title>Accueil</title>
  <link rel="shortcut icon" href="logo3.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="page_accueil.css">

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
        <li class="active"><a href="page_d_accueil.php">Accueil</a></li>
        <li><a href="reseau.php">Réseau</a></li>
        <li><a href="emplois.php">Emplois</a></li>
        <li><a href="messagerie.php">Messagerie</a></li>
        <li><a href="notification.php">Notifications</a></li>
        <li><a href="vous.php">Vous</a></li>
        <li><a href="page_de_connection.php"><button type="button" name="Se Deconnecter">Se Deconnecter </button></a></li>
      </ul>
    </div>
  </div> 
</nav>
  
<div class="container text-center" style="margin:110px">    
  <div class="row">
    <div class="col-sm-3 well" style="background-color: #006687;">
      <div class="well" style=" background-image: url(<?php include("vous_getfond.php"); ?>); background-repeat:no-repeat; background-position:center;">
        <?php include("vous_getphoto.php"); ?> <!-- affiche photo de profil -->
        <p> <br><a href="vous.php" style="  color:black;">Lien vers votre profil</a></p>        
        
      </div>
      <div class="well">
        <p> <h3>Dernière connexion: </h3>
        <?php
        $zone = new DateTimeZone('Europe/Paris');
        $dt = new DateTime();

        $dt->setTimezone($zone);
        $date = $dt->format('d/m/Y - h:i:s');

        echo $date;      
        ?>

        </p>
        <p> <h3> Humeur:</h3>
         <?php include("humeur.php"); gethumeur(); ?>
        </p>

        <p> <h3> Promotion: </h3> </p>
         <p><?php include("promotion.php"); getpromotion(); ?> </p>

        <p> <h3><a href="#">Intêrets:</a></h3></p>
        <p>
                                  
          <span class="label label-success">  <?php include("interet.php"); getinteret(); ?>
         </span>

        </p>
        <p><h3> CV:</h3>
        <input type="button" value="Télécharger le CV" onclick="window.location='<?php include("vous_getlienCV.php"); ?>.' ;"> </p> <!-- telecharge CV -->
      </div>
     </div>
    <div class="col-sm-9">
    
      <div class="row">
        <div class="col-sm-12" >
          <div class="panel panel-default text-left" >
            <div class="panel-body">
              <h2>Poster une photo, un article ou une idée: </h2>
              <div class="well">
               <form method="POST" action="ajout_publication.php" enctype="multipart/form-data"> 

                <label>  &nbsp &nbsp &nbsp Titre: &nbsp &nbsp   </label> 
                <input type="text" name="titre" id="titre"/> <br>
                <br>
                <label> Contenu: &nbsp &nbsp </label>
                <input type="text" name="contenu" id="contenu" style="width: 500px; height: 150px; " /> <br> <br>

                <strong style="padding-left: 470px;"> <input type="submit" name="publier" value="publier" style="border:none;padding:10px 0 6px 0; border-radius:75%; border-bottom:5px solid #007179; border-top:5px solid #007179; background:transparent;"> <span class="glyphicon glyphicon-send"></span> </strong>
              </form>
              </div>
                  <?php include("accueil_publication.php"); ?> 
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
