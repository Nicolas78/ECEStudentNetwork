<?php 

          $database = "BDD"; //la base de donnée

          $db_handle = mysqli_connect('localhost','root'); //identifiants de la BDD
          $db_found = mysqli_select_db($db_handle,$database); //connexion à la BDD

          $mail = $_SESSION['mail'];

          if ($db_found) 
          {
          $sql = "SELECT prenom, nom, promotion FROM utilisateur WHERE mail LIKE '".$mail."' ";
          $result = mysqli_query($db_handle, $sql);

          while ($data = mysqli_fetch_row($result)) 
          {

          $prenom = $data[0];
          $nom = $data[1];
          $promo = $data[2];

          echo "".$prenom;
          echo '<td>'.'<br />'; //saut de ligne
          echo"".$nom;
          echo '<td>'.'<br />';
          echo"".$promo;
          echo '<td>'.'<br />';
          
          }
          }
?>