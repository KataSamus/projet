
<!-- ----- début fragmentPatrimoineMenu -->

<nav class="navbar navbar-expand-lg fixed-top" style="background-color:#a1045a;">
  <div class="container-fluid">
    <a class="navbar-brand" href="router1.php?action=patrimoineAccueil">BEAUDOIN-COMBE |administrateur|<?php echo $_SESSION["login"]; ?>|</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" 
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

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

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">Innovations</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="router1.php?action=banqueReadAll">A faire</a></li>
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
