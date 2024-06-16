
<!-- ----- début viewLoged -->
<?php

require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';

      if ($results==1) {
        echo ("<h3>Vous avez été correctement connecté.</h3>");
      } else if($results==0){
        echo ("<h3>Mot de passe ou nom d'utilisateur incorrect</h3>");
      } else{
        echo ("<h3>Erreur lors de la connexion</h3>");
      }
      ?>
    
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  