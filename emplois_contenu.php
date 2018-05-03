<?php
      session_start();

      $rechercher = isset($_POST["rechercher"]) ? $_POST["rechercher"] : "";  
      $bouton = isset($_POST["search"]) ? $_POST["search"] : "";  

      $database = "BDD"; //la base de donnée

      $db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
      $db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD
     

     $sql="SELECT entreprise.nom_entreprise, emploi.type_emploi, emploi.actions FROM emploi INNER JOIN entreprise ON entreprise.id_entreprise = emploi.id_entreprise";

if($bouton)
{
      if ($db_found) 
      {

            if(!empty($rechercher))
            {
              $sql = "SELECT entreprise.nom_entreprise, emploi.type_emploi, emploi.actions FROM emploi INNER JOIN entreprise ON entreprise.id_entreprise = emploi.id_entreprise WHERE entreprise.nom_entreprise = '".$rechercher."' OR emploi.type_emploi = '".$rechercher."' OR emploi.actions = '".$rechercher."' ";
            }
            
            $result = mysqli_query($db_handle, $sql);


            while ($data = mysqli_fetch_row($result)) 
            {
                  echo '
                  <html>
                  <div class="well" style="height: 200px;">
            <div class="col-sm-2"> Logo Entreprise</div>
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
}

?>