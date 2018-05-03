<!DOCTYPE html>
<html lang="en">
<head> 
  <title>Page de connexion</title>
  <link rel="shortcut icon" href="Images/logo3.ico">
  <meta http-equiv= "content-type" content= "text/html; charset=UTF-8" >
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/3.3.7/yeti/bootstrap.min.css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" type="text/css" href="page_de_connection.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
      <img src="Images/logo2.png" class="img-rounded" height="140" width="225" alt="Logo du site" style=" margin-left:10px;">
      <img src="Images/logo.png" class="img-rounded" height="90" width="380" alt="Logo ECE " style="position:absolute;top: 30px;right:50px;">
  </div>
</nav>
  
<div class="container text-center" style="padding-top:10px">  

  <div class="row">
    <div class="col-sm-6 well">
      <div class="inscription">
      	<br>
        <h1>Créer un compte </h1>
		<br>
		<form method="POST" action="inscription.php" enctype="multipart/form-data"> 

			<label> Prénom: </label> 
			<input type="text" name="Prenom" id="Prenom"/> <br>

			<label> Nom: </label>
			<input type="text" name="Nom" id="Nom"/> <br>

			<label> E-Mail: </label>
			<input type="email" name="Email" id="Email"/> <br>

			<label> Mot de passe: </label>
			<input type="password" name="Motdepasse" id="Motdepasse"/> <br>

			<label style="text-align :left;	font-size: 20px;font-weight: bold ;color: #007179;"> Images:  </label> <br>

			<label style="width: 300px;"> Importer une photo de profil: <br> </label>
			<input type="file" name="photo_de_profil" id="photo_de_profil" style="padding-left: 80px;" />  <br>

			<label style="width: 300px;">  Importer une image de fond: <br> </label> 
			<input type="file" name="image_de_fond" style="padding-left: 80px;" /> <br>

			<strong> <input type="submit" name="inscrire" value="S'incrire" style="border:none;
	   padding:10px 0 6px 0; border-radius:75%; border-bottom:5px solid #007179; border-top:5px solid #007179; background:transparent;"> </strong>
		
		</form>
      </div>
    </div>

     <div class="col-sm-6 well">
      <div class="identification">
      	<br>
        <h1> S'identifier </h1>
		<br><br>
        <form method="POST" action="connexion.php"> 
		
			<label> E-Mail: </label>
			<input type="email" name="Coemail" id="Coemail"/> <br>

			<label> Mot de passe: </label>
			<input type="password" name="Copassword" id="Copassword"/> <br><br>

			<strong> <input type="submit" name="connexion" value="Connexion" style="border:none;
	   padding:10px 0 6px 0; border-radius:75%; border-bottom:5px solid #007179; border-top:5px solid #007179; background:transparent;"> </strong>
			<br><br><br><br><br><br><br><br><br><br>

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
