
<!-- ----- debut ModelResidence -->

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

 function setLabel($label) {
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

 function getLabel() {
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
 
 // retourne le rpix de la résidence à l'id = id_res
 public static function getPrice($id_res) {
  try {
   $database = Model::getInstance();
   $query = "SELECT prix FROM residence WHERE id=:id_res";
   $statement = $database->prepare($query);
   $statement->bindParam('id_res', $id_res, PDO::PARAM_INT);
   $statement->execute();
   $results = $statement->fetchColumn();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 // retourne l'id de la personne possédant la résidence à l'id = id_res
 public static function getResidence($id_res) {
  try {
   $database = Model::getInstance();
   $query = "SELECT * FROM residence WHERE id=:id_res";
   $statement = $database->prepare($query);
   $statement->bindParam('id_res', $id_res, PDO::PARAM_INT);
   $statement->setFetchMode(PDO::FETCH_CLASS, 'ModelResidence');
   $statement->execute();
   $results = $statement->fetch();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 // Procède au transfert d'argent lors de l'achat d'une résidence
 public static function buyResidence($prix, $id_acheteur, $id_vendeur) {
  try {
   $database = Model::getInstance();
   $query_transfert_argent = "UPDATE compte SET montant = montant - :prix WHERE id = :id_acheteur; UPDATE compte SET montant = montant + :prix WHERE id = :id_vendeur";
   $statement = $database->prepare($query_transfert_argent);
   $statement->bindParam('prix', $prix, PDO::PARAM_INT);
   $statement->bindParam('id_acheteur', $id_acheteur, PDO::PARAM_INT);
   $statement->bindParam('id_vendeur', $id_vendeur, PDO::PARAM_INT);
   $statement->execute();
   return 1;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 
 // Procède à l'achat d'une résidence
 public static function transfertResidence($id_res) {
  try {
   $id_acheteur = $_SESSION['id'];
   $database = Model::getInstance();
   $query_transfert_residence = "UPDATE residence SET personne_id = :id_acheteur WHERE id = :id_res";
   $statement = $database->prepare($query_transfert_residence);
   $statement->bindParam('id_acheteur', $id_acheteur, PDO::PARAM_INT);
   $statement->bindParam('id_res', $id_res, PDO::PARAM_INT);
   $statement->execute();
   return 1;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
}
?>

<!-- ------- Fin ModelResidence ------>