<?php

      $rechercher = isset($_POST["rechercher1"]) ? $_POST["rechercher1"] : "";  
      $bouton = isset($_POST["Search"]) ? $_POST["Search"] : "";  

      $database = "BDD"; //la base de donnée

      $db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
      $db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD
     

if($bouton)
{
      if ($db_found) 
      {           
            $sql2 = "SELECT photo,nom,prenom,promotion,lastConnexion FROM utilisateur WHERE utilisateur.nom = '".$rechercher."' OR utilisateur.prenom = '".$rechercher."' ";
			$result2 = mysqli_query($db_handle, $sql2);

			while ($data1 = mysqli_fetch_row($result2)) 
			{
				echo '<div class="col-sm-12 "> ';

				echo'<div class="col-sm-2 " style:"font-size: 15px;""><h2>Image</h2></div>
    	  		<div class="col-sm-3 "><h2>Nom</h2></div>
    	  		<div class="col-sm-3 "><h2>Prenom</h2></div>
    	  		<div class="col-sm-1 "><h2>Promotion</h2></div>
    	  		<div class="col-sm-3 "><h2>Date</h2></div>';

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
        }
}

?>
