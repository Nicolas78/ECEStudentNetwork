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
		$sql_mail = "SELECT mail FROM utilisateur";
		//$sql_password = "SELECT motdepasse FROM utilisateur WHERE motdepasse = '".Copassword."' ";
		$result_mail = mysqli_query($db_handle,$sql_mail);	

	while($data = mysqli_fetch_assoc($result_mail))
	{
		//echo "Prenom:" .$data[0] ;echo "<br>";
		if (strcmp($Coemail, $data["mail"])==0)
		{
			echo "trouve";
		}
	}		
	}

	else echo "non trouve";


	//$result = mysqli_query($db_handle,$sql);
	//echo "Add successful";
}
	
else //échec connexion à la BDD
{
	echo "remplir les champs !!";
}
}

//mysqli_close($db_handle);

 ?>