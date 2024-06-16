
<!-- ----- debut ControllerClient -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelBanque.php';

class ControllerClient {

    // --- Liste des vins
    public static function clientReadAllAccounts($id=1001) {
        $results = ModelCompte::getClientCompte($id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewAllID.php';
        require ($vue);
    }

    // Affiche le formulaire de transfert inter-compte si nb_compte > 1
    public static function compteShowTransfertForm($id=1001) {
        $nb_accounts = ModelPersonne::getNbAccounts($id);
        $accounts = ModelCompte::getClientCompte($id);
        include 'config.php';
        if ($nb_accounts < 2) {
            $msg_erreur = "Un nombre de 2 comptes minimum est requis pour effectuer cette opération.";
            require ($vue_erreur);
        } else {
            $vue = $root . '/app/view/compte/viewTransfertForm.php';
            require ($vue);
        }
    }
    
    // Effectue le transfert et affiche une page de confirmation
    public static function compteTransfered() {
        $compte1 = htmlspecialchars($_GET['compte1']);
        $compte2 = htmlspecialchars($_GET['compte2']);
        $montant = htmlspecialchars($_GET['montant']);
        include 'config.php';
        if ($compte1 == $compte2) {
            $msg_erreur = "Vous ne pouvez pas choisir le même compte 2 fois lors d'un virement.";
            require ($vue_erreur);
        } elseif ($montant < 0) {
            $msg_erreur = "Vous ne pouvez pas choisir un montant négatif.";
            require ($vue_erreur);
        // TODO : Faire la condition du montant max
        } else {
            $results = ModelPersonne::transfertInterAccount($compte1, $compte2);
            $vue = $root . '/app/view/compte/viewTransfered.php';
            require ($vue);
        }
        
    }

    // Affiche le formulaire de creation d'un compte
    public static function compteCreate() {
        $results = ModelBanque::getAll();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewInsert.php';
        require ($vue);
    }
    
    // Affiche la page d'info compte créé
    public static function compteCreated() {
        $label = htmlspecialchars($_GET['label']);
        $banque_id = htmlspecialchars($_GET['banque_id']);
        $compte_existe = ModelCompte::checkCompte($label, $banque_id);
        include 'config.php';
        if (count($compte_existe) == 0) {
            $msg_erreur = "Ce compte existe déjà.";
            require ($vue_erreur);
        } else {
            // ----- Construction chemin de la vue
            $vue = $root . '/app/view/compte/viewInserted.php';
            require ($vue);
        }
    }
    
    // Affiche la liste des résidences d'un id particulier
    public static function clientReadAllResidences($id=1001) {
        $results = ModelPersonne::getResidences($id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewAllID.php';
        require ($vue);
    }
    
    // Affiche le patrimoine d'un id particulier
    public static function clientReadPatrimoine($id=1001) {
        $liste_comptes = ModelCompte::getClientCompte($id);
        $liste_residences = ModelPersonne::getResidences($id);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/viewBilanPatrimoine.php';
        require ($vue);
    }
    
    // Affiche le formulaire pour acheter une résidence
    public static function clientBuyResidence() {
        
    }
}
?>
<!-- ----- fin ControllerClient -->