<!DOCTYPE html>
<html lang="en">
<head> 
  <title>Accueil</title>
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
  <div class="row">
    <div class="col-sm-12 well">
      <div class="well">
      <h1> Votre profil</h1>
      </div>

      <div class="well">

          <div class="well">
             <h1>Photo de profil sur image de fond</h1>
          </div>

          <div class="well">
             <h1>Information générale</h1>
             <p>Prenom</p>
             <p>Nom</p>
             <p>Promotion</p>
             <p>CV</p>
          </div>

           <div class="well"> 
            <h1>Experiences:</h1>
              <div class="col-sm-3">Image entreprise</div>
              <div class="col-sm-3">Poste</div>
              <div class="col-sm-3">Entreprise</div>
              <div class="col-sm-3">Durée</div>
              <div class="col-sm-12">Description</div>
          </div>

          <div class="well">
              <div class="col-sm-3">Image entreprise</div>
              <div class="col-sm-3">Poste</div>
              <div class="col-sm-3">Entreprise</div>
              <div class="col-sm-3">Durée</div>
              <div class="col-sm-12">Description</div>
          </div>

          <div class="well"> 
            <h1>Formation:</h1>
              <div class="col-sm-3">Image Ecole</div>
              <div class="col-sm-3">Promotion</div>
          </div>
          <div class="well"> 
              <div class="col-sm-3">Image Ecole</div>
              <div class="col-sm-3">Promotion</div>
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
