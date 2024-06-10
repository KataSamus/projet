
<!-- ----- debut ModelCompte -->

<?php
require_once 'Model.php';
require_once 'ModelPersonne.php';
require_once 'ModelBanque.php';

class ModelResidence {
    
    private $id, $label, $ville, $prix, $personne_id, $nom, $prenom;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $label = NULL, $ville = NULL, $prix = NULL, 
         $personne_id = NULL, $prenom = NULL, $nom = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->label = $label;
   $this->ville = $ville;
   $this->prix = $prix;
   $this->personne_id = $personne_id;
   $this->prenom = $prenom;
   $this->nom = $nom;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setResidence($label) {
  $this->label = $label;
 }

 function setVille($ville) {
  $this->ville = $ville;
 }

 function setPrix($prix) {
  $this->prix = $prix;
 }
 
 function setPersonne_id($personne_id) {
  $this->personne_id = $personne_id;
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

 function getResidence() {
  return $this->label;
 }

 function getVille() {
  return $this->ville;
 }

 function getPrix() {
  return $this->prix;
 }

 function getPersonne_id() {
  return $this->personne_id;
 }

 function getPrenom() {
  return $this->prenom;
 }

 function getNom() {
  return $this->nom;
 }
 
 // retourne une liste des résidences avec nom et prénom du propriétaire
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "SELECT personne.nom, personne.prenom, residence.label, residence.ville, residence.prix"
           . " FROM residence JOIN personne ON residence.personne_id=personne.id ORDER BY residence.prix";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelResidence");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
}
?>

<!-- ------- Fin ModelCompte------>