<?php
	echo '

	<style>

	div{
		font-family: Georgia, serif ;
		font-size: 20px;
		font-weight: bold ;
		color: #007179;
	}
	 </style> ';

      $mail = isset($_POST["mail"]) ? $_POST["mail"] : "";  
      $bouton = isset($_POST["Supprimer"]) ? $_POST["Supprimer"] : ""; 
      $database = "BDD"; //la base de donnée

      $db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
      $db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD
	     
	if($bouton)
	{
	  if ($db_found) 
	  {        
	    	$sql2 = "SELECT photo,nom,prenom,promotion,lastConnexion,mail FROM utilisateur WHERE utilisateur.mail = '".$mail."' ";
			$result2 = mysqli_query($db_handle, $sql2);

			while ($data1 = mysqli_fetch_row($result2)) 
			{
				echo '<div class="col-sm-12 well"> ';

				echo '<div class="col-sm-12"> ';
				echo '  <div class="col-sm-4 "> ';
	     		print '<img src="'.$data1[0].'" height="110" width="110" alt="photo" />'; //affiche photo utilisateur

	 			echo' </div> <div class="col-sm-4 "> ';
	            echo "<br/><br><strong>".$data1[1];
			       	
		        echo ' </strong><br/><br/></div> <div class="col-sm-4 ">';
	   		 	echo "<br/><br><strong>".$data1[2];  

	    		echo ' </strong><br/><br/></div> <div class="col-sm-12 ">';
	  			echo "<br/>Promotion ".$data1[3];

	    		echo ' <br/><br/></div><div class="col-sm-12 ">';
	    		echo "<br/>Dernière connexion: ".$data1[4];
	    		echo'</div> </div>';  

				$sql = "DELETE FROM utilisateur WHERE utilisateur.mail = '".$mail."' ";
				$result = mysqli_query($db_handle, $sql);
				if ($result) 
					{
						echo "Le compte a bien été supprimé !";
					} 
			}  
		}
	}

?>
