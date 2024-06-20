
<!-- ----- début viewAllID -->
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
          <th scope = "col">Banque</th>
          <th scope = "col">Label</th>
          <th scope = "col">Montant</th>
        </tr>
      </thead>
      <tbody>
          <?php
            foreach ($results as $element) {
             printf("<tr><td>%s</td><td>%s</td><td>%d</td></tr>", $element['banque'], 
               $element['label'], $element['montant']);
            }?>
      </tbody>
    </table>
    <?php } else {
        echo("<h3>Vous ne possédez pas de compte<h3/>");
    }?>
  </div>
  <?php include $root . '/app/view/fragment/fragmentPatrimoineFooter.html'; ?>

  <!-- ----- fin viewAllID -->
  
  