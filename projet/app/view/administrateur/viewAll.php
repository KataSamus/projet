
<!-- ----- début viewAll -->
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
          <th scope = "col">nom</th>
          <th scope = "col">prénom</th>
          <th scope = "col">login</th>
          <th scope = "col">mot de passe</th>
        </tr>
      </thead>
      <tbody>
          <?php           
          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td></tr>", $element->getNom(), 
             $element->getPrenom(), $element->getLogin(), $element->getPassword());
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  