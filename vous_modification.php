<?php 
session_start();
// les variables pour créer un compte
$Prenom = isset($_POST["Prenom"]) ? $_POST["Prenom"] : "";	
$Nom = isset($_POST["Nom"]) ? $_POST["Nom"] : "";		
$Email = isset($_POST["Email"]) ? $_POST["Email"] : "";
$Motdepasse = isset($_POST["Motdepasse"]) ? $_POST["Motdepasse"] : "";
$Promotion = isset($_POST["Promotion"]) ? $_POST["Promotion"] : "";
$Humeur = isset($_POST["Humeur"]) ? $_POST["Humeur"] : "";
$Specialite = isset($_POST["Specialite"]) ? $_POST["Specialite"] : "";
$photo_de_profil = isset($_FILES["photo_de_profil"]);
$image_de_fond = isset($_FILES["image_de_fond"]);
$CV = isset($_FILES["cv"]);

$modifier = isset($_POST["modifier"]) ? $_POST["modifier"] : "";

$id = $_SESSION['id'];
$database = "BDD"; //la base de donnée

$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

if($modifier)
{ //si bouton clické
	//si la bdd est trouvée
		if($db_found)
		{	

			if($Prenom != '')
			{
				$sql = "UPDATE utilisateur SET prenom = '$Prenom' WHERE id_utilisateur = '".$id."'";
				$requete = mysqli_query($db_handle,$sql);
				if ($requete) { echo "Modification prenom effectué"; }
				else{ echo "Erreur lors de la modification du prenom"; }
			}else{ echo "Champ prenom vide "; }

			if($Nom != '')
			{
				$sql = "UPDATE utilisateur SET nom = '$Nom' WHERE id_utilisateur = '".$id."'";
				$requete = mysqli_query($db_handle,$sql);
				if ($requete) { echo "Modification Nom effectué"; }
				else{ echo "Erreur lors de la modification du Nom"; }
			}else{ echo "Champ Nom vide "; }

			if($Email != '')
			{
				$sql = "UPDATE utilisateur SET mail = '$Email' WHERE id_utilisateur = '".$id."'";
				$requete = mysqli_query($db_handle,$sql);
				if ($requete) { echo "Modification Email effectué"; }
				else{ echo "Erreur lors de la modification du Email"; }
			}else{ echo "Champ Email vide "; }

			if($Motdepasse != '')
			{
				$sql = "UPDATE utilisateur SET motdepasse = '$Motdepasse' WHERE id_utilisateur = '".$id."'";
				$requete = mysqli_query($db_handle,$sql);
				if ($requete) { echo "Modification Motdepasse effectué"; }
				else{ echo "Erreur lors de la modification du Motdepasse"; }
			}else{ echo "Champ Motdepasse vide "; }

			if($Promotion != '')
			{
				$sql = "UPDATE utilisateur SET promotion = '$Promotion' WHERE id_utilisateur = '".$id."'";
				$requete = mysqli_query($db_handle,$sql);
				if ($requete) { echo "Modification Promotion effectué"; }
				else{ echo "Erreur lors de la modification du Promotion"; }
			}else{ echo "Champ Promotion vide "; }

			$sql = "UPDATE utilisateur SET humeur = '$Humeur' WHERE id_utilisateur = '".$id."'";
			$requete = mysqli_query($db_handle,$sql);
			if ($requete) { echo "Modification humeur effectué"; }
				else{ echo "Erreur lors de la modification du humeur"; }

			$sql = "UPDATE utilisateur SET interet = '$Specialite' WHERE id_utilisateur = '".$id."'";
			$requete = mysqli_query($db_handle,$sql);
			if ($requete) { echo "Modification Specialite effectué"; }
				else{ echo "Erreur lors de la modification du Specialite"; }

				/// GESTION DES IMAGES ET CV

			if( isset($_FILES['photo_de_profil']) )
			{
				if(!empty($_FILES['photo_de_profil'])) // si l'image n'est pas vide
				{
					$path = $_FILES['photo_de_profil']['name'];
					$ext = pathinfo($path, PATHINFO_EXTENSION);

					$target_dir = "bdd_et_sauvegarde/photo_profil_utilisateurs/";
					$target_file = $target_dir . 'profil' .$id. '.' . $ext;
					$uploadOk = 1;

					if (move_uploaded_file($_FILES["photo_de_profil"]["tmp_name"], $target_file)) {
					        echo "The file ". $target_file. " has been uploaded.";
					} else {
					        echo "Erreur lors de l'upload de l'image";
					}
					$sql = "UPDATE utilisateur SET photo = '$target_file' WHERE id_utilisateur = '".$id."'";
					$requete = mysqli_query($db_handle,$sql);
					if ($requete) { echo "Modification photo effectué"; }
					else{ echo "Erreur lors de la modification du photo"; }
				}
				else echo "pas d'image";
			}
			else echo "pb d'index";


			if( isset($_FILES['image_de_fond']) )
			{
				if(!empty($_FILES['image_de_fond'])) // si l'image n'est pas vide
				{
					$path1 = $_FILES['image_de_fond']['name'];
					$ext1 = pathinfo($path, PATHINFO_EXTENSION);

					$target_dir1 = "bdd_et_sauvegarde/photo_fond_utilisateurs/";
					$target_file1 = $target_dir1 . 'fond' .$id. '.' . $ext1;
					$uploadOk1 = 1;

					if (move_uploaded_file($_FILES["image_de_fond"]["tmp_name"], $target_file1)) {
					        echo "The file ". $target_file1. " has been uploaded.";
					} else {
					        echo "Erreur lors de l'upload du fond";
					}
					$sql = "UPDATE utilisateur SET photo = '$target_file1' WHERE id_utilisateur = '".$id."'";
					$requete = mysqli_query($db_handle,$sql);
					if ($requete) { echo "Modification fond effectué"; }
					else{ echo "Erreur lors de la modification du fond"; }
				}
				else echo "pas de fond";
			}
			else echo "pb d'index";

			if( isset($_FILES['cv']) )
			{
				if(!empty($_FILES['cv'])) // si l'image n'est pas vide
				{
					$path2 = $_FILES['cv']['name'];
					$ext2 = pathinfo($path, PATHINFO_EXTENSION);

					$target_dir2 = "bdd_et_sauvegarde/fichier_cv/";
					$target_file2 = $target_dir2 . 'cv' .$id. '.' . $ext2;
					$uploadOk2 = 1;

					if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file2)) {
					        echo "The file ". $target_file2. " has been uploaded.";
					} else {
					        echo "Erreur lors de l'upload du cv";
					}
					$sql = "UPDATE utilisateur SET photo = '$target_file2' WHERE id_utilisateur = '".$id."'";
					$requete = mysqli_query($db_handle,$sql);
					if ($requete) { echo "Modification cv effectué"; }
					else{ echo "Erreur lors de la modification du cv"; }
				}
				else echo "pas d'image";
			}
			else echo "pb d'index";

			header("Location: vous.php");

	}
	else //échec connexion à la BDD
	{
		echo "Database not found";
	}

}
	
?>