<?php 
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

          $sql = "SELECT photo, nom_conversation, contenu, date_message FROM conversation AS co, message AS me, utilisateur AS ut WHERE me.id_conversation = co.id_conversation AND ut.id_utilisateur = co.id_utilisateur2 AND co.id_utilisateur1 LIKE '".$id."' ";

          $result = mysqli_query($db_handle, $sql);

          while ($data = mysqli_fetch_row($result)) 
          {

          $photo = $data[0];
          $nom_conv = $data[1];
          $contenu = $data[2];
          $date = $data[3];

          print '<img src="'.$photo.'" height="80" width="80" alt="photo_ami" />'; //affiche la photo
          echo "     Titre: ".$nom_conv."     Contenu: ".$contenu."     Date: ".$date;
          echo '<td>'.'<br />';
          echo '<td>'.'<br />';

          }    
          


          }
?>
