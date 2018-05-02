<?php 

// les variables pour créer un compte
$Prenom = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";	
$Nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";		
$Email = isset($_POST["Email"]) ? $_POST["Email"] : "";
$Motdepasse = isset($_POST["Motdepasse"]) ? $_POST["Motdepasse"] : "";
$photo_de_profil = isset($_FILES["photo_de_profil"]);
$image_de_fond = isset($_FILES["image_de_fond"]);
$inscrire = isset($_POST["inscrire"]) ? $_POST["inscrire"] : "";

$database = "BDD"; //la base de donnée

$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

if($inscrire){ //si bouton clické

if ($Prenom != "" && $Nom != "" &&  $Email != "" && $Motdepasse != "" )
{

	if($db_found)
	{
		echo "echo3";

		$sql = "INSERT INTO utilisateur(nom, prenom, mail, motdepasse) VALUES('$Prenom','$Nom','$Email','$Motdepasse')";

		$requete = mysqli_query($db_handle,$sql);

		echo "echo4";

		if ($requete) 
		{
			echo "Add successful";
		}

		else
		{
			echo "Add failed";
		}
}
	
	else //échec connexion à la BDD
	{
		echo "Database not found";
	}
}

}

?>