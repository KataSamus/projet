
<!-- ----- debut ModelPersonne -->

<?php
require_once 'Model.php';

class ModelCompte {
    public const ADMINISTRATEUR=0;
    public const CLIENT=1;
    
    private $id, $label, $montant, $banque_id, $personne_id;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL, $montant = NULL, $banque_id = NULL, $personne_id = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->montant = $montant;
   $this->banque_id = $banque_id;
   $this->personne_id = $personne_id;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setCompte($label) {
  $this->label = $label;
 }

 function setMontant($montant) {
  $this->montant = $montant;
 }

 function setBanque_id($banque_id) {
  $this->banque_id = $banque_id;
 }
 
 function setPersonne_id($personne_id) {
  $this->personne_id = $personne_id;
 }

 function getId() {
  return $this->id;
 }

 function getCompte() {
  return $this->label;
 }

 function getMontant() {
  return $this->montant;
 }

 function getBanque_id() {
  return $this->banque_id;
 }

 function getPersonne_id() {
  return $this->personne_id;
 }
 
}
?>

<!-- ------- Fin ModelCompte------>