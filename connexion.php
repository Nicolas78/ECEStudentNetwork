<?php 

// les variables pour l'identification
$Coemail = isset($_POST["Coemail"]) ? $_POST["Coemail"] : "";
$Copassword = isset($_POST["Copassword"]) ? $_POST["Copassword"] : "";
$connexion = isset($_POST["connexion"]) ? $_POST["connexion"] : "";

$database = "BDD"; //la base de donnée

$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

if($connexion)
{ //si bouton clické
	if ($Coemail != "" && $Copassword != "")
	{
		if($db_found)
		{
			$sql = "SELECT mail, motdepasse FROM utilisateur";
			//$sql_password = "SELECT motdepasse FROM utilisateur WHERE motdepasse = '".Copassword."' ";
			$result = mysqli_query($db_handle,$sql);	
			$cpt=0;
			while($data = mysqli_fetch_assoc($result))
			{
				if ((strcmp($Coemail, "mathieu.poletto@edu.ece.fr")==0)&&(strcmp($Copassword,"Mathieu")==0 ) )
				{
					header("Location: page_administrateur.php");
				}

				if ((strcmp($Coemail, $data["mail"])==0)&&(strcmp($Copassword, $data["motdepasse"])==0 ) )
					{
						header("Location: page_d_accueil.php");
						$cpt++;
					}
			}
			if($cpt==0) { header("Location: page_de_connection.php"); }

		}
		else
		{
			echo "Database not found";
		}
	}
	else
	{
		header("Location: page_de_connection.php");
	}
}

?>