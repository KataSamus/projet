
<!-- ----- début viewBanqueClassement -->
<?php

require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
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
          <th scope = "col">Rang</th>
          <th scope = "col">Banque</th>
          <th scope = "col"><?php
          if ($method == "montant_total") {
            echo ("Montant Total");
          } elseif ($method == "nb_comptes") {
            echo ("Nombre de comptes");
          } elseif ($method == "nb_clients") {
            echo ("Nombre de clients");
          }
          ?></th>
        </tr>
      </thead>
      <tbody>
          <?php
          $count = 0;
          // La liste des banques est dans une variable $results
          foreach ($results as $element) {
           $count += 1;
           printf("<tr><td>%d</td><td>%s</td><td>%d</td></tr>", $count, $element['banque'], $element[$method]);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewBanqueClassement -->
  
  
  