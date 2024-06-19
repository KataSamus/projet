
<!-- ----- debut ModelPersonne -->

<?php
require_once 'Model.php';

class ModelPersonne {
    public const ADMINISTRATEUR=0;
    public const CLIENT=1;
    
    private $id, $nom, $prenom, $statut, $login, $password;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $statut = NULL, $login = NULL, $password = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
   $this->statut = $statut;
   $this->login = $login;
   $this->password = $password;
  }
 }

 function setId($id) {
  $this->id = $id;
 }

 function setNom($nom) {
  $this->nom = $nom;
 }

 function setPrenom($prenom) {
  $this->prenom = $prenom;
 }

 function setStatut($statut) {
  $this->statut = $statut;
 }
 
 function setLogin($login) {
  $this->login = $login;
 }
 
 function setPassword($password) {
  $this->password = $password;
 }

 function getId() {
  return $this->id;
 }

 function getNom() {
  return $this->nom;
 }

 function getPrenom() {
  return $this->prenom;
 }

 function getStatut() {
  return $this->statut;
 }

 function getLogin() {
  return $this->login;
 }

 function getPassword() {
  return $this->password;
 }
 
 // retourne une liste des clients
 public static function getAllClient() {
  try {
   $database = Model::getInstance();
   $query = "SELECT * FROM personne WHERE statut=1";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 // retourne une liste des admin
 public static function getAllAdmin() {
  try {
   $database = Model::getInstance();
   $query = "SELECT * FROM personne WHERE statut!=1";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
    
 // retourne le nombre comptes d'un id particulier
 public static function getNbAccounts() {
  try {
   $id = $_SESSION["id"];
   $database = Model::getInstance();
   $query = "SELECT count(*) FROM compte JOIN personne ON compte.personne_id = personne.id WHERE personne.id = :id";
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
 
 // retourne la liste des résidences d'un id particulier
 public static function getResidences() {
  try {
   $id = $_SESSION["id"];
   $database = Model::getInstance();
   $query = "SELECT id, label AS adresse, ville, prix FROM residence WHERE personne_id = :id";
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
 
 // retourne la liste des résidences n'appartenant pas à un id particulier
 public static function getOtherResidences() {
  try {
   $id = $_SESSION["id"];
   $database = Model::getInstance();
   $query = "SELECT id, label AS adresse, ville, prix FROM residence WHERE personne_id != :id";
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

}
?>
<!-- ----- fin ModelPersonne -->
