<?php

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

		$sql1 = "SELECT DISTINCT titre_publication, contenu, id_publication FROM publication INNER JOIN contact ON 
		 publication.id_utilisateur = contact.id_utilisateur1 OR publication.id_utilisateur = contact.id_utilisateur2 WHERE contact.id_utilisateur1 = '".$id."' OR contact.id_utilisateur2 = '".$id."'  ORDER BY date_publication DESC";
		$result1 = mysqli_query($db_handle, $sql1);
		
		while ($data1 = mysqli_fetch_row($result1)) 
		{
			echo '<html><div class="col-sm-12 well"></html>';

				echo '<html>
			
        	  	<div class="col-sm-4 well"> 
        	 	Avatar de publication.id_utilisateur
	      		</div>
    	  		<div class="col-sm-8 well">
   	            <p> 
	            </html><h2>';

	            echo "".$data1[0];
  		       	
  	             echo '
           		 </h2><html>
           		 </p>
     			 </div>
      			<div class="col-sm-12 well">
      		  	<p> 

   		     	</html><p>';

				$sqll = "SELECT DISTINCT fichier FROM media INNER JOIN publication ON publication.id_media = media.id_media WHERE publication.id_publication = '".$data1[2]."' ";
				$resultt = mysqli_query($db_handle, $sqll);

				if ($dataa = mysqli_fetch_row($resultt))
				{
					print '<img src="'.$dataa[0].'" height="50" width="50" alt="photo" />';
				}
       		 	

       		 	echo '</p></div>';
	       		 	echo '<div class="col-sm-4 well"> '; 
							
					$sql2 = "SELECT COUNT(aime.id_aime) FROM aime INNER JOIN publication ON publication.id_publication = aime.id_publication WHERE publication.id_publication = '".$data1[2]."' ";
					$result2 = mysqli_query($db_handle, $sql2);

					while ($data2 = mysqli_fetch_row($result2)) 
					{
						echo "".$data2[0];
					}			
					

	       		 	echo '<form action = "ajout_like.php" method = "post">

	       		 	<strong> <input type="submit" name="like" value="like"> <span class="glyphicon glyphicon-thumbs-up"> </button>	</strong> </form>';

	       		 	$sql3 = "SELECT COUNT(commentaire.id_commentaire) FROM commentaire INNER JOIN publication ON publication.id_publication = commentaire.id_publication WHERE publication.id_publication = '".$data1[2]."' ";
					$result3 = mysqli_query($db_handle, $sql3);

					while ($data3 = mysqli_fetch_row($result3)) 
					{
						echo "".$data3[0];
					}


	       		 	echo '&nbsp; <button id = "commentaire"><span class="glyphicon glyphicon-envelope"></span></button> </div>';



	   				$sql4 = "SELECT COUNT(partage.id_partage) FROM partage INNER JOIN publication ON publication.id_publication = partage.id_publication WHERE publication.id_publication = '".$data1[2]."' ";
					$result4 = mysqli_query($db_handle, $sql4);

					while ($data4 = mysqli_fetch_row($result4)) 
					{
						echo "".$data4[0];
					}



	   				echo '&nbsp; <button id = "partage"><span class="glyphicon glyphicon-share"></span></button> </div>';
				echo'
        		<html>
        		</a>
      			</div>

      			</html>';
		}
	}
?>

