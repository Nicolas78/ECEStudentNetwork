<?php

function getNombreContact()
{

	echo '

	<style>

	body{
		font-family: Georgia, serif ;
		font-size: 20px;
	}

	h2{
		font-size: 20px;
		font-weight: bold ;
		color: #007179;
	}
	.col-sm-2 well{
		width: 800px;
	}



	 </style> ';





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
			//echo "".$data['id_utilisateur'];
			$_SESSION['id'] = $data['id_utilisateur'];
		}

		$id = $_SESSION['id'];
			
		$sql1 = "SELECT COUNT(contact.id_utilisateur2) FROM contact WHERE contact.id_utilisateur1 = '".$id."' OR contact.id_utilisateur2 = '".$id."'  ";
		$result1 = mysqli_query($db_handle, $sql1);

		while ($data = mysqli_fetch_row($result1)) 
		{
			echo "".(int)$data[0]. " contact(s)";
			$_SESSION['nbreContact'] = $data[0];
		}

		$sql2 = "SELECT DISTINCT photo,nom,prenom,promotion,lastConnexion FROM utilisateur INNER JOIN contact ON utilisateur.id_utilisateur = contact.id_utilisateur1 OR utilisateur.id_utilisateur = contact.id_utilisateur2 WHERE contact.id_utilisateur1 = '".$id."' OR contact.id_utilisateur2 = '".$id."'  ";
		$result2 = mysqli_query($db_handle, $sql2);
		

	echo '<div class="col-sm-12 "> ';

		echo'<div class="col-sm-2 " style:"font-size: 15px;""><h2>Image</h2></div>
    	  	<div class="col-sm-3 "><h2>Nom</h2></div>
    	  	<div class="col-sm-3 "><h2>Prenom</h2></div>
    	  	<div class="col-sm-1 "><h2>Promotion</h2></div>
    	  	<div class="col-sm-3 "><h2>Date</h2></div>';

		while ($data1 = mysqli_fetch_row($result2)) 
		{
			echo '<div class="col-sm-12 well "> ';
			echo '  <div class="col-sm-2 well"> ';
     		print '<img src="'.$data1[0].'" height="80" width="80" alt="photo" />'; //affiche photo utilisateur

 			echo' </div> <div class="col-sm-3 well"> ';
            echo "<br/>".$data1[1];
		       	
	        echo ' <br/><br/></div> <div class="col-sm-3 well">';
   		 	echo "<br/>".$data1[2];  

    		echo ' <br/><br/></div> <div class="col-sm-1 well">';
  			echo "<br/>".$data1[3];

    		echo ' <br/><br/></div><div class="col-sm-3 well">';
    		echo "<br/>".$data1[4];
    		echo'</div> </div>';
	
		}

		echo '</div>';

	}
}

?>

