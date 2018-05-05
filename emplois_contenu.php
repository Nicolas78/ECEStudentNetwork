<?php
      session_start();

      $rechercher = isset($_POST["rechercher"]) ? $_POST["rechercher"] : "";
      $poste = isset($_POST["poste"]) ? $_POST["poste"] : "";  
      $bouton = isset($_POST["search"]) ? $_POST["search"] : "";  

      $database = "BDD"; //la base de donnée

      $db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
      $db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD
     

     $sql="SELECT entreprise.nom_entreprise, emploi.type_emploi, emploi.actions, entreprise.logo FROM emploi INNER JOIN entreprise ON entreprise.id_entreprise = emploi.id_entreprise";

if($bouton)
{
      if ($db_found) 
      {

            if(!empty($rechercher))
            {
              $sql = "SELECT entreprise.nom_entreprise, emploi.type_emploi, emploi.actions,entreprise.logo FROM emploi INNER JOIN entreprise ON entreprise.id_entreprise = emploi.id_entreprise WHERE entreprise.nom_entreprise = '".$rechercher."' OR emploi.type_emploi = '".$rechercher."' OR emploi.actions = '".$rechercher."' ";
            }
            

            if(!empty($poste))
            {
             $sql = "SELECT entreprise.nom_entreprise, emploi.type_emploi, emploi.actions,entreprise.logo FROM emploi INNER JOIN entreprise ON entreprise.id_entreprise = emploi.id_entreprise WHERE  emploi.type_emploi = '".$poste."' ";
            }
            
            $result = mysqli_query($db_handle, $sql);


            while ($data = mysqli_fetch_row($result)) 
            {
                  echo '<div class="well" style="height: 200px;">';

                  echo' <div class="col-sm-2"> ';

                  print '<img src = "'.$data[3].'" height="80" width="80" alt="photo" />'; //affiche la photo

                  echo' </div> <div class="col-sm-3"> Nom entreprise : <strong> ';
                  echo "".$data[0];

                  echo'</strong></div> <div class="col-sm-3"> Type de poste : <strong>';
                  echo "".$data[1];

                  echo'</strong></div>  <div class="col-sm-2"> Actions : <strong>';

                  echo "".$data[2];

                  echo ' </strong></div> <div class="col-sm-2"> 
                  <a href="mailto:encom@gmail.com"?subject= Candidature" class="btn btn-default style:"> Envoyer candidature </a>
                  </div>

                  </div>';

            }
      }
}

?>
