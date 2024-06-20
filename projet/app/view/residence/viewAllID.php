
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

    <?php if ($results) { ?>
    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">Adresse</th>
          <th scope = "col">Ville</th>
          <th scope = "col">Prix</th>
        </tr>
      </thead>
      <tbody>
          <?php
            foreach ($results as $element) {
             printf("<tr><td>%s</td><td>%s</td><td>%d</td></tr>", $element['adresse'], 
               $element['ville'], $element['prix']);
            }?>
      </tbody>
    </table>
    <?php } else {
        echo("<h3>Vous ne possédez pas de résidence<h3/>");
    }?>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAll -->
  
  
  