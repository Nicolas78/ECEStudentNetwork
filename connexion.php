<?php 

// les variables pour l'identification
$Coemail = isset($_POST["Coemail"]) ? $_POST["Coemail"] : "";
$Copassword = isset($_POST["Copassword"]) ? $_POST["Copassword"] : "";
$connexion = isset($_POST["connexion"]) ? $_POST["connexion"] : "";

$database = "linkedin"; //la base de donnée

$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

if ($Coemail != "" && $Copassword != "") {

	if($db_found)
	{
		$sql1 = "SELECT * FROM bestenterprisetbl WHERE bestenterprisetbl.Prenom = '".prenom."' ";
		$result1 = mysqli_query($db_handle,$sql1);
	
	}

	$sql = 	

	$result1 = mysqli_query($db_handle,$sql);

	while($data = mysqli_fetch_row($result1))
	{
		echo "Prenom:" .$data[0] ;echo "<br>";
			
	}

	$result = mysqli_query($db_handle,$sql);
	echo "Add successful";
}
	
else //échec connexion à la BDD
{
	echo "Database not found";
}

//mysqli_close($db_handle);

 ?>