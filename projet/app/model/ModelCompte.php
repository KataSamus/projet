
<!-- ----- debut ModelCompte -->

<?php
session_start();
require_once 'Model.php';
require_once 'ModelPersonne.php';
require_once 'ModelBanque.php';

class ModelCompte {
    
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
 
 // retourne une liste des comptes d'un id particulier
 public static function getClientCompte($id, bool $is_other) {
  try {
   if (!$is_other) {
    $id = $_SESSION["id"];
   }
   $database = Model::getInstance();
   $query = "SELECT compte.id, banque.label as banque, compte.label as label, montant FROM compte JOIN personne ON compte.personne_id = personne.id JOIN banque ON banque.id = compte.banque_id WHERE personne.id = :id";
   $statement = $database->prepare($query);
   $statement->bindParam('id', $id, PDO::PARAM_INT);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 // check si le compte existe
 public static function checkCompte($label, $banque_id) {
  try {
   $database = Model::getInstance();
   $query = "SELECT * FROM compte WHERE label=:label AND banque_id = :banque_id";
   $statement = $database->prepare($query);
   $statement->bindValue('label', $label, PDO::PARAM_STR);
   $statement->bindParam('banque_id', $banque_id, PDO::PARAM_INT);
   $statement->execute();
   $results = $statement->fetchAll();
   if (!$results || empty($results)) {
       return False;
   }
   return True;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 // prend la première id disponible après l'id max pour la création d'un compte
 public static function fetchIdAvailable() {
   try {
    $database = Model::getInstance();
    $query = "SELECT MAX(id) FROM compte";
    $statement = $database->prepare($query);
    $statement->execute();
    $results = $statement->fetchColumn();
    $id = $results + 1;
    return $id;
   } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return NULL;
   }
 }
 
 // crée le compte avec les attributs label et banque_id
 public static function createCompte($label, $banque_id, $montant) {
   try {
    $compte_id = ModelCompte::fetchIdAvailable();
    $personne_id = $_SESSION["id"];
    $database = Model::getInstance();
    $query = "INSERT INTO compte VALUES (:compte_id, :label, :montant, :banque_id, :personne_id)";
    $statement = $database->prepare($query);
    $statement->bindParam('compte_id', $compte_id, PDO::PARAM_INT);
    $statement->bindValue('label', $label, PDO::PARAM_STR);
    $statement->bindParam('montant', $montant, PDO::PARAM_INT);
    $statement->bindParam('banque_id', $banque_id, PDO::PARAM_INT);
    $statement->bindParam('personne_id', $personne_id, PDO::PARAM_INT);
    $statement->execute();
    $results = $statement->fetchAll();
    return 1;
   } catch (PDOException $e) {
    printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return -1;
   }
 }
 
 // retourne le montant max que l'on peut retirer du compte, c'est-à-dire son montant
 public static function checkMontant($compte_id) {
  try {
   $database = Model::getInstance();
   $query = "SELECT montant as montant_max FROM compte WHERE id = :compte_id";
   $statement = $database->prepare($query);
   $statement->bindParam('compte_id', $compte_id, PDO::PARAM_INT);
   $statement->execute();
   $results = $statement->fetchColumn();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 // Transferre un certain montant du compte de retrait au compte de dépôt de la même personne
 public static function transertIntoAccount($montant, $id1, $id2) {
  try {
   $database = Model::getInstance();
   $query = "UPDATE compte SET montant = montant - :montant WHERE id = :id_retrait; UPDATE compte SET montant = montant + :montant WHERE id = :id_depot";
   $statement = $database->prepare($query);
   $statement->bindParam('montant', $montant, PDO::PARAM_INT);
   $statement->bindParam('id_retrait', $id1, PDO::PARAM_INT);
   $statement->bindParam('id_depot', $id2, PDO::PARAM_INT);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
}
?>

<!-- ------- Fin ModelCompte------>