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


		$sql2 = "SELECT titre_publication, contenu, nbreLike, nbreCommentaire, nbrePartage FROM publication INNER JOIN contact ON 
		 publication.id_utilisateur = contact.id_utilisateur1 OR publication.id_utilisateur = contact.id_utilisateur2 WHERE contact.id_utilisateur1 = '".$id."' OR contact.id_utilisateur2 = '".$id."' ";
		$result2 = mysqli_query($db_handle, $sql2);
		
		while ($data1 = mysqli_fetch_row($result2)) 
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

				$sqll = "SELECT DISTINCT fichier FROM media INNER JOIN publication ON publication.id_media = media.id_media";
				$resultt = mysqli_query($db_handle, $sqll);

				if ($dataa = mysqli_fetch_row($resultt))
				{
				print '<img src="'.$dataa[0].'" height="50" width="50" alt="photo" />';
				}
       		 	echo "".$data1[1];


       		 	echo '</p></div>';
	       		 	echo '<div class="col-sm-4 well"> '; echo "".$data1[2];
	       		 	echo '&nbsp; <span class="glyphicon glyphicon-thumbs-up"></span> </div>';
	       		 	echo '<div class="col-sm-4 well"> '; echo "".$data1[3];
	       		 	echo '&nbsp; <span class="glyphicon glyphicon-envelope"></span> </div>';
	   				echo '<div class="col-sm-4 well"> '; echo "".$data1[4];
	   				echo '&nbsp; <span class="glyphicon glyphicon-share"></span> </div>';
				echo'
        		<html>
        		</a>
      			</div>

      			</html>';
		}
	}
?>

