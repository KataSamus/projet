
<!-- ----- début viewBilanPatrimoine -->
<?php

require_once ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col"><strong>Catégorie</strong></th>
          <th scope = "col"><strong>Label</strong></th>
          <th scope = "col"><strong>Valeur</strong></th>
          <th scope = "col"><strong>Capital</strong></th>
        </tr>
      </thead>
      <tbody>
          <?php
          // Affiche la liste des comptes du client
          $capital = 0;
          if ($liste_comptes) {
           foreach ($liste_comptes as $element) {
            $capital += $element['montant'];
            printf("<tr class='table-primary'><td>compte</td><td>%s</td><td>%.02f</td><td>%.02f</td></tr>", $element['banque'], $element['montant'], $capital);
           }
          }
          // Affiche la liste des résidences du client
          if ($liste_residences) {
           foreach ($liste_residences as $element) {
            $capital += $element['prix'];
            printf("<tr class='table-success'><td>résidence</td><td>%s</td><td>%.02f</td><td>%.2f</td></tr>", $element['adresse'], $element['prix'], $capital);
           }
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewBilanPatrimoine -->
  
  
  