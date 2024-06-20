
<!-- ----- début viewTransfered -->
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

     echo ("<h3>Le virement a bien été effectué</h3>");
     /**echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>cru = " . $_GET['cru'] . "</li>");
     echo ("<li>annee = " . $_GET['annee'] . "</li>");
     echo ("<li>degre = " . $_GET['degre'] . "</li>");
     echo("</ul>");**/

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentPatrimoineFooter.html';
    ?>
    <!-- ----- fin viewTransfered -->    

    
    