
<!-- ----- début viewAllComptes -->
<?php

require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentPatrimoineMenu0.html';
      include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">prenom</th>
          <th scope = "col">nom</th>
          <th scope = "col">banque</th>
          <th scope = "col">compte</th>
          <th scope = "col">montant</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste des Comptes est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td></tr>", $element->getPrenom(), 
             $element->getNom(), $element->getLabel(), $element->getCompte(), $element->getMontant());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAllComptes -->
  
  
  