<?php 
     //session_start();

     $database = "BDD"; //la base de donnée

     $db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
     $db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

     $id = $_SESSION['id'];

     if ($db_found)
     {
          $sql = "SELECT CV FROM utilisateur WHERE id_utilisateur LIKE '".$id."' ";
          $result = mysqli_query($db_handle, $sql);

          while ($data = mysqli_fetch_row($result)) 
          {

               $cv = $data[0];
               echo "".$cv;
          }
     }
?>