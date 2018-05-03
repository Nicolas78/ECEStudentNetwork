<?php 

          $database = "BDD"; //la base de donnée

          $db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
          $db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

          $mail = $_SESSION['mail'];

          if ($db_found) 
          {
          $sql = "SELECT photo FROM utilisateur WHERE mail LIKE '".$mail."' ";
          $result = mysqli_query($db_handle, $sql);

          while ($data = mysqli_fetch_row($result)) 
          {

          $photo = $data[0];
          print '<img src="'.$photo.'" height="auto" width="auto" alt="photo" />'; //affiche la photo
          }
          }
?>