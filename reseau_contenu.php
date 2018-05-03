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

		$sql2 = "SELECT DISTINCT nom,prenom,promotion,lastConnexion FROM utilisateur INNER JOIN contact ON utilisateur.id_utilisateur = contact.id_utilisateur1 OR utilisateur.id_utilisateur = contact.id_utilisateur2 WHERE contact.id_utilisateur1 = '".$id."' OR contact.id_utilisateur2 = '".$id."'  ";
		$result2 = mysqli_query($db_handle, $sql2);
		
		while ($data1 = mysqli_fetch_row($result2)) 
		{
			echo '<html><div class="col-sm-12 well"></html>';


				echo '<html>
			
        	  	<div class="col-sm-2 well">
        	 
	      		</div>
    	  		<div class="col-sm-3 well">
   	            <p> 
	            </html>';

	            echo "".$data1[0];
  		       	
  	             echo '
           		 <html>
           		 </p>
     			 </div>
      			<div class="col-sm-3 well">
      		  	<p> 
   		     	</html>';

       		 	echo "".$data1[1];  

        		echo ';<html>
           		 </p>
     			 </div>
      			<div class="col-sm-2 well">
      			</html>';

      			echo "".$data1[2];

        		echo '
        		<html>
     			 </div>
      			<div class="col-sm-2 well">
        		<a href="">
        		</html>';

        		echo "".$data1[3];

        		echo'
        		<html>
        		</a>
      			</div>      
      			</div>

      			</html>';
		


		}

	}
}

?>

