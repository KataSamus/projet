
<!-- ----- début viewAllProdByRegion -->
<?php

require ($root . '/app/view/fragment/fragmentCaveHeader.html');
?>

<body>
  <div class="container">
      <?php
      include $root . '/app/view/fragment/fragmentCaveMenu.html';
      include $root . '/app/view/fragment/fragmentCaveJumbotron.html';
      ?>

    <table class = "table table-striped table-bordered">
      <thead>
        <tr>
          <th scope = "col">region</th>
          <th scope = "col">nombre</th>
        </tr>
      </thead>
      <tbody>
          <?php
          // La liste est dans une variable $results             
          foreach ($results as $element) {
           printf("<tr><td>%s</td><td>%d</td></tr>", $element['region'],$element[1]);
          }
          ?>
      </tbody>
    </table>
  </div>
  <?php include $root . '/app/view/fragment/fragmentCaveFooter.html'; ?>

  <!-- ----- fin viewAllProdByRegion -->
  
  
  