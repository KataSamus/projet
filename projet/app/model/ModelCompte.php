
<!-- ----- debut ModelCompte -->

<?php
require_once 'Model.php';
require_once 'ModelPersonne.php';
require_once 'ModelBanque.php';

class ModelCompte {
    public const ADMINISTRATEUR=0;
    public const CLIENT=1;
    
    private $id, $label, $montant, $banque_id, $personne_id, $banque, $pays, $prenom, $nom;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL, $montant = NULL, $banque_id = NULL, 
         $personne_id = NULL, $banque = NULL, $pays = NULL, $prenom = NULL, $nom = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->montant = $montant;
   $this->banque_id = $banque_id;
   $this->personne_id = $personne_id;
   $this->banque = $banque;
   $this->pays = $pays;
   $this->prenom = $prenom;
   $this->nom = $nom;
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
 
 function setBanque($banque) {
  $this->banque = $banque;
 }
 
 function setPays($pays) {
  $this->pays = $pays;
 }
 
 function setPrenom($prenom) {
  $this->prenom = $prenom;
 }
 function setNom($nom) {
  $this->nom = $nom;
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

 function getBanque() {
  return $this->banque;
 }

 function getPays() {
  return $this->pays;
 }

 function getPrenom() {
  return $this->prenom;
 }

 function getNom() {
  return $this->nom;
 }
 
 // retourne une liste des comptes
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "SELECT compte.label, compte.montant, banque.label, banque.pays, personne.prenom, personne.nom"
           . " FROM compte JOIN banque ON banque.id=compte.banque_id JOIN personne ON personne.id=compte.personne_id";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelCompte");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
}
?>

<!-- ------- Fin ModelCompte------>