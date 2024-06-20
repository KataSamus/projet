
<!-- ----- début viewResidenceBought -->
<?php
require ($root . '/app/view/fragment/fragmentPatrimoineHeader.html');
?>

<body>
  <div class="container">
    <?php
    include $root . '/app/view/fragment/fragmentPatrimoineMenu.php';
    include $root . '/app/view/fragment/fragmentPatrimoineJumbotron.html';
    ?>
    <!-- ===================================================== -->
    <?php
     echo ("<h3>La résidence a été achetée avec succès !</h3>");

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentPatrimoineFooter.html';
    ?>
    <!-- ----- fin viewResidenceBought -->    

    
    