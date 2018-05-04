<!DOCTYPE html>
<html lang="en">
<head> 
  <title>Réseau</title>
  <link rel="shortcut icon" href="logo3.ico">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css" />
  <link rel="stylesheet" type="text/css" href="reseau.css">

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
        <li class="active"><a href="reseau.php">Réseau</a></li>
        <li><a href="emplois.php">Emplois</a></li>
        <li><a href="messagerie.php">Messagerie</a></li>
        <li><a href="notification.php">Notifications</a></li>
        <li><a href="vous.php">Vous</a></li>
        <li><a href="page_de_connection.php"> <button type="button" name="Se Deconnecter">Se Deconnecter </button></a> </li>
      </ul>
    </div>
  </div> 
</nav>
 
<div class="container text-center" style="margin:110px">    
  <div class="row">
    <div class="col-sm-12 well ">
        <div> Vous avez <?php include("reseau_contenu.php"); getNombreContact(); ?> </div>
    </div>
  </div>
</div>

<footer class="container-fluid text-center">

  <strong> ECE Student Network Copyright © 2018 </strong>
  <p> Poletto Mathieu <br> Remurier Léo <br> Baralle Nicolas </p>

</footer>

</body>
</html>
