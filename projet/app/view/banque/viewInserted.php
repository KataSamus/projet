
<!-- ----- début viewInserted -->
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
    if ($results!=-1) { //On vérifie que la banque n'est pas déjà dans la base de données
     echo ("<h3>La nouvelle banque a été ajoutée </h3>");
     echo("<ul>");
     echo ("<li>id = " . $results . "</li>");
     echo ("<li>label = " . $_GET['label'] . "</li>");
     echo ("<li>pays = " . $_GET['pays'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Problème d'insertion de la Banque</h3>");
     echo ("Ne peut pas être ajoutée : " . $_GET['label']);
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentPatrimoineFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    