<!-- ----- debut ControllerPatrimoine -->
<?php
require_once '../model/ModelBanque.php';
class ControllerPatrimoine {
    
    // affiche le formulaire pour la méthode de classement des banques
    public static function showMethodForm() {
        $list_methods = array("montant_total" => "Montant Total", "nb_comptes" => "Nombre de comptes ouverts", "nb_clients" => "Nombre de clients");
        include 'config.php';
        $vue = $root . '/app/view/others/viewMethodForm.php';
        require ($vue);
    }
    
    // Affiche le classement des banques selon la méthode proposée
    public static function banqueClassement() {
        $method = htmlspecialchars($_GET['method']);
        if ($method == "montant_total") {
            $results = ModelBanque::getBanquesPerTotalAmount();
        } elseif ($method == "nb_comptes") {
            $results = ModelBanque::getBanquesPerNbComptes();
        } elseif ($method == "nb_clients") {
            $results = ModelBanque::getBanquesPerNbClients();
        } else {
            include 'config.php';
            $msg_erreur = "Nous avons rencontré un problème avec la méthode sélectionnée.";
            require ($vue_erreur);
        }
        include 'config.php';
        $vue = $root . '/app/view/others/viewBanqueClassement.php';
        require ($vue);
    }
    
    public static function patrimoineAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/others/viewPatrimoineAccueil.php';
        if (DEBUG){
            echo ("ControllerPatrimoine : patrimoineAccueil : vue = $vue");
        }
        require ($vue);
    }
    
}
?>
<!-- ----- fin ControllerPatrimoine -->