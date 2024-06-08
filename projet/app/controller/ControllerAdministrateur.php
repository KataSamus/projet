
<!-- ----- debut ControllerProducteur -->
<?php
require_once '../model/ModelPersonne.php';
require_once '../model/ModelBanque.php';

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
 
 //----------------------------------------------------------------------

 
 
 
 // Affiche un formulaire pour sélectionner un id qui existe
 public static function producteurReadId() {
  $results = ModelProducteur::getAllId();

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewId.php';
  require ($vue);
 }

 // Affiche un vin particulier (id)
 public static function producteurReadOne() {
  $producteur_id = $_GET['id'];
  $results = ModelProducteur::getOne($producteur_id);

  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewAll.php';
  require ($vue);
 }

 
 // --- Affichage sans doublons des régions
 public static function regionReadAll(){
  $results = ModelProducteur::getAllRegion();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewAllRegion.php';
  require ($vue);
 }
    
 // --- Affichage producteur par région
 public static function producteurReadNbByRegion(){
  $results = ModelProducteur::getNbProdByRegion();
  // ----- Construction chemin de la vue
  include 'config.php';
  $vue = $root . '/app/view/producteur/viewAllProdByRegion.php';
  require ($vue);
 }
 
}
?>
<!-- ----- fin ControllerProducteur -->


