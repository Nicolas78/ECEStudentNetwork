<?php

function gethumeur()
{
	//session_start();

	$database = "BDD"; //la base de donnée

	$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
	$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD


	if ($db_found) 
	{
		$id = $_SESSION['id'];
			
		$sql1 = "SELECT humeur FROM utilisateur WHERE id_utilisateur LIKE  '".$id."' ";

		$result1 = mysqli_query($db_handle, $sql1);

		while ($data = mysqli_fetch_assoc($result1)) 
		{
			echo "".$data["humeur"];
		}

	}
}

?>

