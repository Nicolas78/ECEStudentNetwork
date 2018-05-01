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
    <div class="col-sm-3 well">
      <div class="well">
        <p><a href="vous.php">Mon profil</a></p>
        <!--<img src="photo_profil/profil1.jpg" class="img-circle" height="80" width="80" alt="Avatar">           <!---->
        
      </div>
      <div class="well">
        <p> Dernière connexion:  
        <?php
        $zone = new DateTimeZone('Europe/Paris');
        $dt = new DateTime();

        $dt->setTimezone($zone);
        $date = $dt->format('d/m/Y');

        echo $date;
        ?>

        </p>
        <p> Humeur: <br><br>
          <button id="smiley_content" style="width:35px";> &#128515; </button>
          <button id="smiley_bof" style="width:35px";> &#128528;</button>
          <button id="smiley_pas_content" style="width:35px";>&#128544; </button>     
        </p>

        <p> Promotion:  </p>
        <p><a href="#">Intêrets: </a></p>
        <p>
          <span class="label label-default">News</span>                                        <!---->
          <span class="label label-primary">W3Schools</span>                                   <!---->
          <span class="label label-success">Labels</span>
          <span class="label label-info">Football</span>
          <span class="label label-warning">Gaming</span>
          <span class="label label-danger">Friends</span>
        </p>
        <p> Experiences professionnelles: <p>
        <p> CV:</p>
        <p> Autres:</p>
      </div>
     </div>
    <div class="col-sm-7">
    
      <div class="row">
        <div class="col-sm-12">
          <div class="panel panel-default text-left">
            <div class="panel-body">
              <h2>Partager une photo, un article ou une idée </h2>

                <div class="well">
                  <p> <a href="#">Images</a></p>
                  <p> Nom de l'Evenement </p>
                  <p> Date de l'Evenement</p>
                    <div class="well">
                      <p> Contenu</p>
                    </div>
                  <button type="button"> Poster <span class="glyphicon glyphicon-send"></span></button>
                   </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="row">
        <div class="col-sm-3">
          <div class="well">
           <p>John</p>
           <img src="bird.jpg" class="img-circle" height="55" width="55" alt="Avatar">
          </div>
        </div>
        <div class="col-sm-9">
          <div class="well">
            <p>Contenu de la publication</p>

            <?php include("page_accueil_contenu.php"); noms(); ?>

          </div>
        </div>
      </div>
      <div class="row">
       
      
      </div>     
    </div>
    <div class="col-sm-2 well">
      <h2>Mon réseau</h2>
      <div class="well">
        <p>membre1</p>
      </div>
      <div class="well">
        <p>membre2</p>
      </div>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search.." style="height:40px; width: 120px;">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search" style="height:10px;"></span>
            </button>
          </span>        
        </div>
      </form>



    </div>
  </div>
</div>

<footer class="container-fluid text-center">

  <strong> ECE Student Network Copyright © 2018 </strong>
  <p> Poletto Mathieu <br> Remurier Léo <br> Baralle Nicolas </p>

</footer>

</body>
</html>
