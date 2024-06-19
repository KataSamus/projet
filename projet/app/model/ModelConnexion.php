
<!-- ----- debut ModelConnexion -->

<?php
require_once 'Model.php';

class ModelConnexion {
    
    private $id, $nom, $prenom, $login, $password;

 // pas possible d'avoir 2 constructeurs
 public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $login = NULL, $password = NULL) {
  // valeurs nulles si pas de passage de parametres
  if (!is_null($id)) {
   $this->id = $id;
   $this->nom = $nom;
   $this->prenom = $prenom;
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
 
 
 public static function insert($nom, $prenom, $login, $password) {
  try {
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "SELECT MAX(id) FROM personne";
   $statement = $database->query($query);
   $tuple = $statement->fetch();
   $id = $tuple['0'];
   $id++;
   
   // ajout d'un nouveau tuple;
   $query = "INSERT INTO personne VALUE (:id, :nom, :prenom, 1, :login, :password)";
   $statement = $database->prepare($query);
   $statement->execute([
     'id' => $id,
     'nom' => $nom,
     'prenom' => $prenom,
     'login' => $login,
     'password' => $password
   ]);
   return $id;
  } catch (PDOException $e) {
   //printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
   return -1;
  }
 }
 
 // connecte l'utilisateur et définit les variables de session
 public static function connect($login, $password) {
  try {
   session_start();
   $database = Model::getInstance();

   // recherche de la valeur de la clé = max(id) + 1
   $query = "SELECT password,statut,id,nom,prenom FROM personne WHERE login=:login";
   $statement = $database->prepare($query);
   $statement->execute([
     'login' => $login,
   ]);
   
   // Récupération du résultat
   $result = $statement->fetch(PDO::FETCH_ASSOC);
   
   //On vérifie que l'utilisateur est bien dans la base de donnée avant de vérifier que c'est le bon password
   if ($result) {
       if($result['password']==$password){
          $_SESSION['login'] = $login;
          $_SESSION['statut'] = $result['statut'];
          $_SESSION['id'] = $result['id'];
          $_SESSION['nom'] = $result['nom'];
          $_SESSION['prenom'] = $result['prenom'];
          return 1;
       }
   }else{
       return 0;
   }
  } catch (PDOException $e) {
    //printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
    return -1;
  }
 }
 
  public static function disconnect() {
    session_start();
    session_destroy();
 }
 
}
?>
<!-- ----- fin ModelConnexion -->
