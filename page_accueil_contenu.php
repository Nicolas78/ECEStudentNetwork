<?php
	
	function noms (){

	$database = "BDD"; //la base de donnée

	$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
	$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

	if($db_found)
		{
			$sql1 = "SELECT nom FROM utilisateur";
			$result = mysqli_query($db_handle,$sql1);


			while($data = mysqli_fetch_assoc($result))
			{
				echo "Nom : " .$data["nom"] ;echo "<br>";


			}
		}

	else //échec connexion à la BDD
	{
		echo "Database not found";
	}
	}

	function getphoto_profil (){

	$database = "BDD"; //la base de donnée

	$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
	$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

	if($db_found)
		{
			$sql1 = "SELECT nom FROM utilisateur";
			$result = mysqli_query($db_handle,$sql1);


			while($data = mysqli_fetch_assoc($result))
			{
				echo "Nom : " .$data["nom"] ;echo "<br>";


			}
		}

	else //échec connexion à la BDD
	{
		echo "Database not found";
	}
	}


?>