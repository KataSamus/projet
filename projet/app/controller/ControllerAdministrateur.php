
<!-- ----- debut ControllerAdministrateur -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelBanque.php';
require_once '../model/ModelCompte.php';
require_once '../model/ModelResidence.php';

class ControllerAdministrateur {

 // --- Liste des banques
 public static function banqueReadAll() {
  $results = ModelBanque::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewAll.php';
  if (DEBUG){
    echo ("ControllerAdministrateur : banqueReadAll : vue = $vue");
  }
  require ($vue);
 }

// Affiche le formulaire de creation d'un producteur
 public static function banqueCreate() {
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewInsert.php';
  require ($vue);
 }
 
 // Affiche un formulaire pour récupérer les informations de la nouvelle banque
 // La clé est gérée par le systeme et pas par l'internaute
 public static function banqueCreated() {
  // ajouter une validation des informations du formulaire
  $results = ModelBanque::insert(htmlspecialchars($_GET['label']), htmlspecialchars($_GET['pays']));
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewInserted.php';
  require ($vue);
 }
 
 // Affiche un formulaire pour sélectionner une banque qui existe
 public static function banqueReadId() {
  $results = ModelBanque::getAll();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewId.php';
  require ($vue);
 }
 
 // Affiche les comptes d'une banque en particulier (id)
 public static function banqueReadComptes() {
  $banque_id = $_GET['id'];
  $results = ModelBanque::getComptes($banque_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewAllComptes.php';
  require ($vue);
 }
 
 // --- Liste des clients
 public static function clientReadAll() {
  $results = ModelPersonne::getAllClient();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewAll.php';
  if (DEBUG){
    echo ("ControllerAdministrateur : clientReadAll : vue = $vue");
  }
  require ($vue);
 }
 
 // --- Liste des administrateurs
 // Ici on poourrait simplifier le code en mettant un argument sur la fonction précédente
 public static function adminReadAll() {
  $results = ModelPersonne::getAllAdmin();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/administrateur/viewAll.php';
  if (DEBUG){
    echo ("ControllerAdministrateur : adminReadAll : vue = $vue");
  }
  require ($vue);
 }
 
 // --- Liste des comptes
 public static function compteReadAll() {
  $results = ModelCompte::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/compte/viewAll.php';
  if (DEBUG){
    echo ("ControllerAdministrateur : compteReadAll : vue = $vue");
  }
  require ($vue);
  
 } // --- Liste des residences avec nom et prenom du propriétaire
 public static function residenceReadAll() {
  $results = ModelResidence::getAll();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/residence/viewAll.php';
  if (DEBUG){
    echo ("ControllerAdministrateur : residenceReadAll : vue = $vue");
  }
  require ($vue);
 }
 
 //----------------------------------------------------------------------

 
 // Affiche les comptes d'une banque en particulier (id)
 public static function banqueReadOne() {
  $banque_id = $_GET['id'];
  $results = ModelBanque::getOne($banque_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/banque/viewAll.php';
  require ($vue);
 }
}
?>
<!-- ----- fin ControllerAdministrateur -->


