<?php 

// les variables pour l'identification
$Coemail = isset($_POST["Coemail"]) ? $_POST["Coemail"] : "";
$Copassword = isset($_POST["Copassword"]) ? $_POST["Copassword"] : "";
$connexion = isset($_POST["connexion"]) ? $_POST["connexion"] : "";

$database = "BDD"; //la base de donnée

$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

if($connexion){ //si bouton clické
echo "echo1";
if ($Coemail != "" && $Copassword != "") {
echo "echo2";
	if($db_found)
	{
		echo "echo3";
		$sql = "SELECT mail, motdepasse FROM utilisateur";
		//$sql_password = "SELECT motdepasse FROM utilisateur WHERE motdepasse = '".Copassword."' ";
		$result = mysqli_query($db_handle,$sql);	

		while($data = mysqli_fetch_assoc($result))
		{
			if (strcmp($Coemail, $data["mail"])==0)
			{
				if (strcmp($Copassword, $data["motdepasse"])==0 ) 
				{
					echo "Trouvé";
				}
			}	
		}
	}

	else
	{
		echo "Database not found";
	}

	}
}
?>