<?php 
          //session_start();

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

          $sql = "SELECT logo, nom_entreprise, actions, type_emploi FROM emploi, entreprise WHERE id_auteur LIKE '".$id."' AND emploi.id_entreprise = entreprise.id_entreprise ";
          $result = mysqli_query($db_handle, $sql);

          while ($data = mysqli_fetch_row($result)) 
          {

          $logo = $data[0];
          $nom_entreprise = $data[1];
          $actions = $data[2];
          $type_emploi = $data[3];

          print '<img src="'.$logo.'" height="80" width="80" alt="image_fond" />'; //affiche la photo
          echo "     ".$nom_entreprise."     Poste: ".$actions."     Type d'emploi: ".$type_emploi;
          echo '<td>'.'<br />';
          echo '<td>'.'<br />';

          }
          }
?>