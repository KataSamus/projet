
<!-- ----- debut ControllerClient -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelBanque.php';
require_once '../model/ModelResidence.php';

class ControllerClient {

    // --- Liste des vins
    public static function clientReadAllAccounts() {
        $results = ModelCompte::getClientCompte(1, False);
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/compte/viewAllID.php';
        require ($vue);
    }

    // Affiche le formulaire de transfert inter-compte si nb_compte > 1
    public static function compteShowTransfertForm() {
        $nb_accounts = ModelPersonne::getNbAccounts(1, False);
        $accounts = ModelCompte::getClientCompte(1, False);
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
        $montant_max = ModelCompte::checkMontant($compte1);
        include 'config.php';
        if ($compte1 == $compte2) {
            $msg_erreur = "Vous ne pouvez pas choisir le même compte 2 fois lors d'un virement.";
            require ($vue_erreur);
        } elseif ($montant < 0) {
            $msg_erreur = "Vous ne pouvez pas choisir un montant négatif.";
            require ($vue_erreur);
        } elseif ($montant > $montant_max) {
            $msg_erreur = "Vous ne possédez pas cette somme sur le compte de retrait.";
            require ($vue_erreur);
        } else {
            $results = ModelCompte::transertIntoAccount($montant, $compte1, $compte2);
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
        $banque_id = htmlspecialchars($_GET['banque']);
        $montant = htmlspecialchars($_GET['montant']);
        $compte_existe = ModelCompte::checkCompte($label, $banque_id);
        include 'config.php';
        if ($compte_existe) {
            $msg_erreur = "Ce compte existe déjà.";
            require ($vue_erreur);
        } else {
            $results = ModelCompte::createCompte($label, $banque_id, $montant);
            // ----- Construction chemin de la vue
            $vue = $root . '/app/view/compte/viewInserted.php';
            require ($vue);
        }
    }
    
    // Affiche la liste des résidences d'un id particulier
    public static function clientReadAllResidences() {
        $results = ModelPersonne::getResidences();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/residence/viewAllID.php';
        require ($vue);
    }
    
    // Affiche le formulaire pour sélectionner une résidence à acheter
    public static function clientShowResidenceSelect() {
        $liste_residences = ModelPersonne::getOtherResidences();
        include 'config.php';
        if (count($liste_residences) == 0) {
            $msg_erreur = "Vous possédez déjà toutes les résidences listées sur notre site.";
            require ($vue_erreur);
        } else {
            $vue = $root . '/app/view/residence/viewResidenceSelect.php';
            require ($vue);
        }
    }
    
    // Affiche le formulaire pour acheter une résidence
    public static function clientShowBuyingForm() {
        $nb_comptes_acheteur = ModelPersonne::getNbAccounts(1, False);
        $id_residence = htmlspecialchars($_GET['residence']);
        $residence = ModelResidence::getResidence($id_residence);
        $id_vendeur = $residence->getPersonne_id();
        $nb_comptes_vendeur = ModelPersonne::getNbAccounts($id_vendeur, True);
        include 'config.php';
        if ($nb_comptes_acheteur == 0) {
            $msg_erreur = "Vous ne possédez pas de compte pour l'achat de cette propriété. Vous pouvez aller vous en créer un dans la rubrique Mes comptes bancaires puis Ajouter un nouveau compte.";
            require ($vue_erreur);
        } elseif ($nb_comptes_vendeur == 0) {
            $msg_erreur = "Le propriétaire de ce bien immobilier ne possède pas de compte. Vous ne pouvez donc pas acheter cette résidence.";
            require ($vue_erreur);
        } else {
            $comptes_acheteur = ModelCompte::getClientCompte(1, False);
            $comptes_vendeur = ModelCompte::getClientCompte($id_vendeur, True);
            $vue = $root . '/app/view/residence/viewBuyingForm.php';
            require ($vue);
        }
    }
    
    // Affiche le formulaire pour acheter une résidence
    public static function clientBuyingResidence() {
        $compte1 = htmlspecialchars($_GET['compte1']);
        $compte2 = htmlspecialchars($_GET['compte2']);
        $prix = htmlspecialchars($_GET['prix']);
        $id_res = htmlspecialchars($_GET['id_res']);
        $montant_max = ModelCompte::checkMontant($compte1);
        include 'config.php';
        if ($montant_max < $prix) {
            $msg_erreur = "Vous ne possédez pas assez d'argent sur ce compte pour procéder à cet achat.";
            require ($vue_erreur);
        } else {
            $results = ModelResidence::buyResidence($prix, $compte1, $compte2, $id_res);
            $results2 = ModelResidence::transfertResidence($id_res);
            $vue = $root . '/app/view/residence/viewResidenceBought.php';
            require ($vue);
        }
    }
    
    // Affiche le patrimoine d'un id particulier
    public static function clientReadPatrimoine() {
        $liste_comptes = ModelCompte::getClientCompte(1, False);
        $liste_residences = ModelPersonne::getResidences();
        // ----- Construction chemin de la vue
        include 'config.php';
        $vue = $root . '/app/view/client/viewBilanPatrimoine.php';
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerClient -->