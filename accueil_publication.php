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

		$sql1 = "SELECT DISTINCT titre_publication, contenu, id_publication, id_utilisateur FROM publication INNER JOIN contact ON 
		 publication.id_utilisateur = contact.id_utilisateur1 OR publication.id_utilisateur = contact.id_utilisateur2 WHERE contact.id_utilisateur1 = '".$id."' OR contact.id_utilisateur2 = '".$id."'  ORDER BY date_publication DESC";
		$result1 = mysqli_query($db_handle, $sql1);
		
		while ($data1 = mysqli_fetch_row($result1)) 
		{
			echo '<div class="col-sm-12 well " style="background-color:  #006687; ">';

				echo '<div class="col-sm-4 well" style="height: 95px;"> <br>';
        	  	$sqln =" SELECT nom, prenom FROM utilisateur WHERE id_utilisateur = '".$data1[3]."' ";
        	  	$resultn = mysqli_query($db_handle, $sqln);
        	  	if ($datan = mysqli_fetch_row($resultn))
        	  	echo "publiée par <strong>".$datan[1]." ".$datan[0]; //affiche le nom , prenom dupublicateur

        	 	echo '</strong></div><div class="col-sm-8 well" style="height: 95px;"> <h2>';
	            echo "".$data1[0]; //affiche le titre de la publication
  	             echo '</h2> </div> <div class="col-sm-12 well">';

				$sqll = "SELECT DISTINCT fichier FROM media INNER JOIN publication ON publication.id_media = media.id_media WHERE publication.id_publication = '".$data1[2]."' ";
				$resultt = mysqli_query($db_handle, $sqll);

				if ($dataa = mysqli_fetch_row($resultt))
				{
					print '<img src="'.$dataa[0].'" height="100" width=100" alt="photo" />';
				}//affiche l'image de la publication
				echo ' &nbsp &nbsp &nbsp &nbsp &nbsp ';
				echo "".$data1[1]; //affiche le contenu de la publication

       		 	echo '</div>

       		 	</div>';

       			echo '<div class="col-sm-2" >
       			<form action = "ajout_like.php" method = "post">
	       		 <strong>';
							
				$sql2 = "SELECT COUNT(aime.id_aime) FROM aime INNER JOIN publication ON publication.id_publication = aime.id_publication WHERE publication.id_publication = '".$data1[2]."' ";
				$result2 = mysqli_query($db_handle, $sql2);

				while ($data2 = mysqli_fetch_row($result2)) 
				{
					echo "".$data2[0]; //affiche le nombre de j'aime
				}
	       		
	       	
	       		echo'	<input type="submit" name="like" value="Like"> <span class="glyphicon glyphicon-thumbs-up"> </span>
	       		 		</strong>
	       		 </form>';
				echo '</div>';

				echo '<div class="col-sm-3" ><strong>';
	       		 	$sql3 = "SELECT COUNT(commentaire.id_commentaire) FROM commentaire INNER JOIN publication ON publication.id_publication = commentaire.id_publication WHERE publication.id_publication = '".$data1[2]."' ";
					$result3 = mysqli_query($db_handle, $sql3);

					while ($data3 = mysqli_fetch_row($result3)) 
					{
						echo "".$data3[0];
					}

	       		 	echo '<button id = "commentaire"> Commenter <span class="glyphicon glyphicon-envelope"></span></button></strong></div>';


					echo '<div class="col-sm-3" ><strong>';
	       		 	$sql3 = "SELECT COUNT(commentaire.id_commentaire) FROM commentaire INNER JOIN publication ON publication.id_publication = commentaire.id_publication WHERE publication.id_publication = '".$data1[2]."' ";
					$result3 = mysqli_query($db_handle, $sql3);

					while ($data3 = mysqli_fetch_row($result3)) 
					{
						echo "".$data3[0];
					}

	       		 	echo '<button id = "partager"> Partager <span class="glyphicon glyphicon-share"></span></button></strong> <br><br><br><br></div>';
		}
	}
?>

