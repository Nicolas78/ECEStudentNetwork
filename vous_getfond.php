<?php 
          session_start();

          $database = "BDD"; //la base de donnée

          $db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
          $db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

          $mail = $_SESSION['mail'];

          if ($db_found) 
          {
          $sql = "SELECT imagefond FROM utilisateur WHERE mail LIKE '".$mail."' ";
          $result = mysqli_query($db_handle, $sql);

          while ($data = mysqli_fetch_row($result)) 
          {

          $image_fond = $data[0];
          //print '<img src="'.$image_fond.'" height="auto" width="auto" alt="image_fond" />'; //affiche la photo
          echo "".$image_fond;
          }
          }
?>