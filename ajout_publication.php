<?php

session_start();

// les variables pour l'identification
$titre = isset($_POST["titre"]) ? $_POST["titre"] : "";
$contenu = isset($_POST["contenu"]) ? $_POST["contenu"] : "";
$publier = isset($_POST["publier"]) ? $_POST["publier"] : "";
$database = "BDD"; //la base de donnée

$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

$mail = $_SESSION['mail']; 

if($publier)
{ //si bouton clické
	if ($db_found) 
	{
		$sql = "SELECT COUNT(id_publication) FROM publication";
		$result = mysqli_query($db_handle, $sql);

		while ($data = mysqli_fetch_row($result)) 
		{
			//$_SESSION['id_publication'] = $data[0];
			
			$id_publication = (int)$data[0] + 1;
			
		}

		$id = $_SESSION['id'];

		$zone = new DateTimeZone('Europe/Paris');
        $dt = new DateTime();
        $dts = $dt->format('Y-m-d H:i:s');

		$sql2 = "INSERT INTO publication(id_publication,date_publication,contenu, titre_publication, nbreLike,nbreCommentaire,nbrePartage,id_utilisateur,id_media) VALUES('$id_publication','$dts', '$contenu','$titre', 0,0,0, '$id' ,1)";

		$result2 = mysqli_query($db_handle, $sql2);

		if ($result2) 
		{
			header("Location: page_d_accueil.php");
		}

		else
		{
			echo "erreur de publication";
		}

	
		
	}
}
?>