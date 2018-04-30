<?php 

$prenom = isset($_POST["prenom"]) ? $_POST["prenom"] : "";	
$nom = isset($_POST["nom"]) ? $_POST["nom"] : "";	
$dateEmbauche = isset($_POST["dateEmbauche"]) ? $_POST["dateEmbauche"] : "";
$salaire = isset($_POST["salaire"]) ? $_POST["salaire"] : "";	

$database = "tpnote2";

$db_handle = mysqli_connect('localhost','root');
$db_found = mysqli_select_db($db_handle,$database);

if ($prenom != "" && $nom != "" &&  $dateEmbauche != "" && $salaire != "") {
if($db_found)
{
	$sql1 = "SELECT * FROM bestenterprisetbl WHERE bestenterprisetbl.Prenom = '".prenom."' ";
	$result1 = mysqli_query($db_handle,$sql1);
	$sql2 = "SELECT * FROM bestenterprisetbl WHERE bestenterprisetbl.Prenom = '".prenom."' ";
	$result2 = mysqli_query($db_handle,$sql2);
	}

	$sql = "INSERT INTO bestentreprisetbl(Id,Prenom,DateEmbauche,IdTravail,salaire,IdPatron,IdDept) VALUES('101','$prenom','$nom',$dateEmbauche', --- ,'$salaire','0','0')";	

	$result1 = mysqli_query($db_handle,$sql);

	while($data = mysqli_fetch_row($result1))
	{
		echo "Prenom:" .$data[0] ;echo "<br>";
		echo "Nom:".$data[1];echo "<br>";
		echo "Date d'Embauche:".$data[2];echo "<br>";
		echo "Salaire:".$data[3];echo "<br>";
		echo "<br>";	
	}

	$result = mysqli_query($db_handle,$sql);
	echo "Add successful";
}
	
else
{
	echo "Database not found";
}

mysqli_close($db_handle);

 ?>