
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
    if ($results!=-1) {
     echo ("<h3>Votre compte a bien été créé. Vous pouvez maintenant vous connecter</h3>");
     echo("<ul>");
     echo ("<li>Nom = " . $_GET['nom'] . "</li>");
     echo ("<li>Prenom = " . $_GET['prenom'] . "</li>");
     echo ("<li>Login = " . $_GET['login'] . "</li>");
     echo ("<li>Password = " . $_GET['password'] . "</li>");
     echo("</ul>");
    } else {
     echo ("<h3>Création de l'utilisateur impossible.</h3>");
    }

    echo("</div>");
    
    include $root . '/app/view/fragment/fragmentPatrimoineFooter.html';
    ?>
    <!-- ----- fin viewInserted -->    

    
    