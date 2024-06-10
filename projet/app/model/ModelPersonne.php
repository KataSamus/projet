
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
 

 
    
//---------------------


 
 
  // retourne une liste de tous les comptes
 public static function getAll() {
  try {
   $database = Model::getInstance();
   $query = "SELECT * FROM personne";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelPersonne");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }
 
 
 public static function getMany($query) {
  try {
   $database = Model::getInstance();
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }


 public static function getOne($id) {
  try {
   $database = Model::getInstance();
   $query = "select * from producteur where id = :id";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id
   ]);
   $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
   return $results;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return NULL;
  }
 }

 public static function insert($nom, $prenom, $region) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "select max(id) from producteur";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;

   // ajout d'un nouveau tuple;
   $query = "insert into producteur value (:id, :nom, :prenom, :region)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'nom' => $nom,
     'prenom' => $prenom,
     'region' => $region
   ]);
   return $id;
  } catch (PDOException $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 
 public static function getAllRegion() {
  try {
  $database = Model::getInstance();

  $query = "select distinct region from producteur";
  $statement = $database->prepare($query);
  $statement->execute();
  $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelProducteur");
  return $results;
  } catch (Exception $e) {
  printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
  return -1;
  }
 }

 public static function getNbProdByRegion() {
  try {
   $database = Model::getInstance();

   $query = "select region,count(*) from producteur group by region";
   $statement = $database->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   return $results;
  } catch (Exception $e) {
   printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }

 public static function update() {
  echo ("ModelProducteur : update() TODO ....");
  return null;
 }

 public static function delete() {
  echo ("ModelProducteur : delete() TODO ....");
  return null;
 }

}
?>
<!-- ----- fin ModelProducteur -->
