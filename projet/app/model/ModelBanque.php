
<!-- ----- debut ModelBanque -->

<?php
require_once 'Model.php';

class ModelBanque {

    private $id, $label, $pays;

    // pas possible d'avoir 2 constructeurs
    public function __construct($id = NULL, $label = NULL, $pays = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->label = $label;
            $this->pays = $pays;
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

    function getId() {
        return $this->id;
    }

    function getLabel() {
        return $this->label;
    }

    function getPays() {
        return $this->pays;
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
    
    public static function getComptes($id) {
        try {
            $database = Model::getInstance();
            $query = "SELECT personne.prenom as prenom, personne.nom as nom, banque.label as label, compte.label as cpt, compte.montant as montant "
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
    
    //---------------------------------------------
    
    public static function getOne($id) {
        try {
            $database = Model::getInstance();
            $query = "SELECT * FROM banque WHERE id = :id";
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

    public static function getMany($query) {
        try {
            $database = Model::getInstance();
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVin");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }


    public static function deleteVin($id) {
        try {
            $database = Model::getInstance();
            $query = "select * from recolte where vin_id=:id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id]);
            $results = $statement->fetchAll();
            if (empty($results)) {
                $query = "delete from vin where id=:id";
                $statement = $database->prepare($query);
                $statement->execute(['id' => $id]);
                return $id;
            } else {
                return "Problème de suppresion du vin. Il est dans la table récolte";
            }
        } catch (Exception $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    public static function update() {
        echo ("ModelVin : update() TODO ....");
        return null;
    }

    public static function delete() {
        echo ("ModelVin : delete() TODO ....");
        return null;
    }

}
?>
<!-- ----- fin ModelVin -->
