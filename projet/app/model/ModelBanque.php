
<!-- ----- debut ModelBanque -->

<?php
require_once 'Model.php';

class ModelBanque {

    private $id, $label, $pays, $prenom, $nom, $compte, $montant;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $pays = NULL, $prenom = NULL, $nom = NULL, $compte = NULL, $montant = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->pays = $pays;
            $this->prenom = $prenom;
            $this->nom = $nom;
            $this->compte = $compte;
            $this->montant = $montant;
        }
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLabel($label) {
        $this->label = $label;
    }

    function setPays($pays) {
        $this->annee = $pays;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setCompte($compte) {
        $this->compte = $compte;
    }

    function setMontant($montant) {
        $this->montant = $montant;
    }

    function getId() {
        return $this->id;
    }

    function getLabel() {
        return $this->label;
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

    function getCompte() {
        return $this->compte;
    }

    function getMontant() {
        return $this->montant;
    }
    
    // retourne une liste des id
    public static function getAllId() {
        try {
            $database = Model::getInstance();
            $query = "SELECT id FROM banque";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_COLUMN, 0);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // retourne une liste des banques
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM banque";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelBanque");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // ajoute une banque
    public static function insert($label, $pays) {
        try {
            $database = Model::getInstance();

            // recherche de la valeur de la clé = max(id) + 1
            $query = "SELECT MAX(id) FROM banque";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;

            // ajout d'un nouveau tuple;
            $query = "INSERT INTO banque VALUE (:id, :label, :pays)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'label' => $label,
                'pays' => $pays
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    // retourne une liste des comptes d'une banque
    public static function getComptes($id) {
        try {
            $database = Model::getInstance();
            $query = "SELECT personne.prenom as prenom, personne.nom as nom, banque.label as label, compte.label as compte, compte.montant as montant "
                    . "FROM compte "
                    . "JOIN banque ON compte.banque_id = banque.id "
                    . "JOIN personne ON compte.personne_id = personne.id "
                    . "WHERE banque_id = :id ";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelBanque");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // retourne une liste des banques dans l'ordre descendant selon le montant total stocké par la banque
    public static function getBanquesPerTotalAmount() {
        try {
            $database = Model::getInstance();
            $query = "SELECT banque.label as banque, compte.montant AS montant_total FROM compte JOIN banque ON compte.banque_id = banque.id GROUP BY banque.id ORDER BY compte.montant DESC";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // retourne une liste des banques dans l'ordre descendant selon le nombre de comptes ouverts dans chaque banque
    public static function getBanquesPerNbComptes() {
        try {
            $database = Model::getInstance();
            $query = "SELECT banque.label as banque, COUNT(compte.banque_id) as nb_comptes FROM compte JOIN banque ON banque.id = compte.banque_id GROUP BY compte.banque_id ORDER BY COUNT(compte.banque_id) DESC";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll();
            return $results;
        } catch (PDOException $e) {
            printf("Y'a un blème niveau connection\n");
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // retourne une liste des banques dans l'ordre descendant selon le nombre de clients de chaque banque
    public static function getBanquesPerNbClients() {
        try {
            $database = Model::getInstance();
            $query = "SELECT banque.label as banque, COUNT(DISTINCT compte.personne_id) as nb_clients FROM compte JOIN banque ON banque.id = compte.banque_id GROUP BY compte.banque_id ORDER BY nb_clients DESC";
            $statement = $database->prepare($query);
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
<!-- ----- fin ModelBanque -->
