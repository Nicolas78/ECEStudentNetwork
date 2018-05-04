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

          $sql = "SELECT promotion, interet FROM utilisateur WHERE id_utilisateur LIKE '".$id."' ";
          $result = mysqli_query($db_handle, $sql);

          while ($data = mysqli_fetch_row($result)) 
          {

          $promo = $data[0];
          $specialite = $data[1];


          echo '<div class="col-sm-12 well" >';

               echo'<div class="col-sm-3 well" >';
               print '<img src="Images/ECEParis.png" height="auto" width="auto" alt="logo_ECE" />'; //affiche le logo

               echo'<div class="col-sm-3 well" ><br><p>Promotion<strong>';
               echo "".$promo;
               echo '</strong></p><br><br></div>';   

               echo'<div class="col-sm-3 well" ><br>Spécialité<p><strong>';
               echo "".$specialite;
               echo '</strong></p><br><br></div>'; 

          echo '</div>'; 



          }
          }
?>