<?php

	session_start();

	$database = "BDD"; //la base de donnée

	$db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
	$db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

	if ($db_found) 
	{
		$sql = "SELECT entreprise.nom_entreprise, emploi.type_emploi, emploi.actions, entreprise.logo FROM emploi INNER JOIN entreprise ON entreprise.id_entreprise = emploi.id_entreprise ";
		$result = mysqli_query($db_handle, $sql);

		echo '
			<html>
			<div class="well">
        	<h1>Dernières offres d emplois</h1>
			</html>';

		while ($data = mysqli_fetch_row($result)) 
		{
			echo '
			<html>
			<div class="well" style="height: 200px;">
            <div class="col-sm-2"> 
            </html>';

            print '<img src="'.$data[3].'" height="100" width="100" alt="photo" />'; //affiche le logo

            echo'
            <html>
            </div>
            
            <div class="col-sm-2"> Nom entreprise : <strong>
            </html>';
            
            echo "".$data[0];

            echo'
            <html>
             </strong></div>
            <div class="col-sm-3"> Type de poste : <strong>
            </html>';

            echo "".$data[1];

            echo' 
            <html>
            </strong></div>
            <div class="col-sm-2"> Actions : <strong>
            </html>';

            echo "".$data[2];

            echo '
            <html>
            </strong></div>        
            
            <div class="col-sm-2"> <button type="button" name="" > Envoyer candidature</button></div>
            </div>
            </html>';
 
			
		}
}

?>