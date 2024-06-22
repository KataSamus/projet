<!-- ----- début fragmentPatrimoineMenu -->

<?php
    // Démarrer la session si elle n'est pas déjà démarrée
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    
    // Vérifiez si la variable de session 'login' existe
    if (!isset($_SESSION['login']) || empty($_SESSION['login'])) {
        $_SESSION['login'] = '';
        $_SESSION['nom'] = '';
        $_SESSION['prenom'] = '';
    }
    
    // Vérifiez si le statut de l'utilisateur est défini dans la session
    $user_statut = isset($_SESSION['statut']) ? $_SESSION['statut'] : 'indéfini';

    // Déterminez le texte à afficher en fonction du statut
    switch ($user_statut) {
        case 0:
            $statut_text = "Administrateur";
            break;
        case 1:
            $statut_text = "Client";
            break;
        default:
            $statut_text = "";
            break;
    }
?>
<nav class="navbar navbar-expand-lg fixed-top" style="background-color:#a1045a;">
  <div class="container-fluid">
    <a class="navbar-brand" href="router1.php?action=patrimoineAccueil">BEAUDOIN-COMBE |<?php echo(" " . htmlspecialchars($statut_text) . " "); ?>|<?php echo(" " . $_SESSION["nom"] . " " . $_SESSION["prenom"] . " ");?>|</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          
        <?php if ($user_statut==0){ ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Banques</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=banqueReadAll">Liste des banques</a></li>
            <li><a class="dropdown-item" href="router1.php?action=banqueCreate">Ajout d'une banque</a></li>
            <li><a class="dropdown-item" href="router1.php?action=banqueReadId">Liste des comptes d'une banque</a></li> 
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Clients</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=clientReadAll">Liste des clients</a></li>
            <li><a class="dropdown-item" href="router1.php?action=adminReadAll">Liste des administrateurs</a></li>
            <li><a class="dropdown-item" href="router1.php?action=compteReadAll">Liste des comptes</a></li>
            <li><a class="dropdown-item" href="router1.php?action=residenceReadAll">Liste des résidences</a></li>
          </ul>
        </li>
        <?php } else if ($user_statut==1){ ?>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes comptes bancaires</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=clientReadAllAccounts">Liste de mes comptes</a></li>
            <li><a class="dropdown-item" href="router1.php?action=compteCreate">Ajouter un nouveau compte</a></li>
            <li><a class="dropdown-item" href="router1.php?action=compteShowTransfertForm">Transfert inter-comptes</a></li> 
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mes résidences</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=clientReadAllResidences">Liste de mes résidences</a></li>
            <li><a class="dropdown-item" href="router1.php?action=clientShowResidenceSelect">Achat d'une nouvelle résidence</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Mon patrimoine</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=clientReadPatrimoine">Bilan de mon patrimoine</a></li>
          </ul>
        </li>
        
        <?php } ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=showMethodForm">Classement des banques</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Se connecter</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=Login">Login</a></li>
            <li><a class="dropdown-item" href="router1.php?action=AccountCreate">S'inscrire</a></li>
            <li><a class="dropdown-item" href="router1.php?action=Logout">Déconnexion</a></li> 
          </ul>
        </li>
        
      </ul>
    </div>
  </div>
</nav>

<!-- ----- fin fragmentPatrimoineMenu -->

