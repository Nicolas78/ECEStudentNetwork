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

if($inscrire)
{ //si bouton clické
	//on vérifie si les champs sont non vides
	if ($Prenom != "" && $Nom != "" &&  $Email != "" && $Motdepasse != "" &&
		( $_FILES['photo_de_profil']['error'] != UPLOAD_ERR_NO_FILE ) &&
		($_FILES['image_de_fond']['error'] != UPLOAD_ERR_NO_FILE) )
	{	//si la bdd est trouvée
		if($db_found)
		{	
			$sql_utilisateur = "SELECT COUNT(utilisateur.id_utilisateur), nom, prenom, mail FROM utilisateur ";

			$result = mysqli_query($db_handle,$sql_utilisateur);

			while($data = mysqli_fetch_row($result))
			{	
				echo " ".$Email." ".$data[3];
				if ((strcmp($Email, $data[3])) == 0)
					{
						echo "Déja inscrit";
						header("Location: page_de_connection.php");
					}
					else {

						$path = $_FILES['photo_de_profil']['name'];
						$ext = pathinfo($path, PATHINFO_EXTENSION);

						$target_dir = "bdd_et_sauvegarde/photo_profil_utilisateurs/";
						$target_file = $target_dir . 'profil' . ((int)$data[0]+1) . '.' . $ext;
						$uploadOk = 1;

						if (move_uploaded_file($_FILES["photo_de_profil"]["tmp_name"], $target_file)) {
						        echo "The file ". $target_file. " has been uploaded.";
						    } else {
						        echo "Erreur lors de l'upload de l'image";
						    }

						$path1 = $_FILES['image_de_fond']['name'];
						$ext1 = pathinfo($path1, PATHINFO_EXTENSION);

						$target_dir1 = "bdd_et_sauvegarde/photo_fond_utilisateurs/";
						$target_file1 = $target_dir1 . 'fond' . ((int)$data[0]+1) . '.' . $ext1;
						$uploadOk1 = 1;

						if (move_uploaded_file($_FILES["image_de_fond"]["tmp_name"], $target_file1)) {
						        echo "The file ". $target_file1. " has been uploaded.";
						    } else {
						        echo "Erreur lors de l'upload du fond";
						    }

				
						$sql = "INSERT INTO utilisateur(id_utilisateur, nom, prenom, mail, motdepasse, photo, imagefond) VALUES(".((int)$data[0]+1).",'$Prenom','$Nom','$Email','$Motdepasse','$target_file', '$target_file1')";
						$requete = mysqli_query($db_handle,$sql);

						if ($requete) 
						{
							echo "Ajout effectué";
							//appel de la page page d'accueil
							header("Location: page_d_accueil.php");
						}
						
						else
						{
							echo "Erreur lors de l'ajout";
							//on retourne à la page de connexion
							header("Location: page_de_connection.php");
						}	
					}							
			}
		}
		else //échec connexion à la BDD
		{
			echo "Database not found";
		}
	}
	else
	{
		echo "Champs vides";
		header("Location: page_de_connection.php");
	}
}

?>