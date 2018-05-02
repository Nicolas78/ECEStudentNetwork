<?php

function getNombreContact()
{
	session_start();

	$database = "BDD"; //la base de donnée

	$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
	$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

	$mail = $_SESSION['mail'];

	if ($db_found) 
	{
		$sql = "SELECT id_utilisateur FROM utilisateur WHERE mail LIKE '".$mail."' ";
		$result = mysqli_query($db_handle, $sql);

		while ($data = mysqli_fetch_assoc($result)) 
		{
			echo "".$data['id_utilisateur'];
			$_SESSION["id"] = $data['id_utilisateur'];
		}
			
		/*$sql = "SELECT COUNT(contact.id_utilisateur2) FROM contact,utilisateur WHERE utilsateurcontact.id_utilisateur1 = utilisateur.id_utilisateur OR contact.id_utilisateur2 = utilisateur.id_utilisateur";
		$result = mysqli_query($db_handle, $sql);

		while ($data = mysqli_fetch_row($result)) 
		{
			echo "".(int)$data[0];
		}*/

	}
}

?>

