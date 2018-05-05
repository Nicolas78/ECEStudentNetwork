<?php

// les variables pour l'identification

$like = isset($_POST["like"]) ? $_POST["like"] : "";
$database = "BDD"; //la base de donnée

$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

	if ($db_found) 
	{
		$sql = "SELECT id_aime, date_aime, aime.id_utilisateur, aime.id_publication FROM aime INNER JOIN publication ON publication.id_publication = aime.id_publication WHERE publication.id_publication = 1";
		$result = mysqli_query($db_handle, $sql);	

		while ($data = mysqli_fetch_row($result))
		{

			$sql1 = "INSERT INTO aime(id_aime, date_aime, id_utilisateur, id_publication) 
			VALUES(".((int)$data[0]+1).",'$data[1]', '$data[2]', '$data[3]') ";
			$result1 = mysqli_query($db_handle, $sql1);	

			if ($result1) 
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