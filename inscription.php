<?php 

// les variables pour créer un compte
$Prenom = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";	
$Nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";		
$Email = isset($_POST["Email"]) ? $_POST["Email"] : "";
$Motdepasse = isset($_POST["Motdepasse"]) ? $_POST["Motdepasse"] : "";
$photo_de_profil = isset($_FILES["photo_de_profil"]);
$image_de_fond = isset($_FILES["image_de_fond"]);
$inscrire = isset($_POST["inscrire"]) ? $_POST["inscrire"] : "";

$database = "linkedin"; //la base de donnée

$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

if(inscrire){ //si bouton clické

if ($Prenom != "" && $Nom != "" &&  $Email != "" && $Motdepasse != "" && empty($photo_de_profil) && empty($image_de_fond)) {

	/*if($db_found)
	{
		$sql1 = "SELECT * FROM bestenterprisetbl WHERE bestenterprisetbl.Prenom = '".prenom."' ";
		$result1 = mysqli_query($db_handle,$sql1);
	
	}

	$sql = 	

	$result1 = mysqli_query($db_handle,$sql);

	while($data = mysqli_fetch_row($result1))
	{
		echo "Prenom:" .$data[0] ;echo "<br>";
			
	}

	$result = mysqli_query($db_handle,$sql);*/
	echo "Add successful";
}
	
else //échec connexion à la BDD
{
	echo "Database not found";
}
}

//mysqli_close($db_handle);

 ?>