<?php

class Conge {
    private $conn;
    private $table = "conges";
    public $id;
    public $id_user;
    public $type_conge;
    public $date_debut;
    public $date_fin;
    public $motif;
    public $statut;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY date_debut DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

   
    public function readOne() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = ? LIMIT 0,1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->id_user = $row['id_user'];
            $this->type_conge = $row['type_conge'];
            $this->date_debut = $row['date_debut'];
            $this->date_fin = $row['date_fin'];
            $this->motif = $row['motif'];
            $this->statut = $row['statut'];
            return true;
        }

        return false;
    }
// Récupérer les demandes de congé en attente
public function getDemandesEnAttente() {
    $query = "SELECT * FROM " . $this->table . " WHERE statut = 'en attente' ORDER BY date_debut DESC";
    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    return $stmt; // Renvoie le résultat pour pouvoir l'afficher plus tard
}

    public function create() {
        $query = "INSERT INTO " . $this->table . " 
                  (id_user, type_conge, date_debut, date_fin, motif)
                  VALUES (:id_user, :type_conge, :date_debut, :date_fin, :motif)";
        
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(':id_user', $this->id_user);
        $stmt->bindParam(':type_conge', $this->type_conge);
        $stmt->bindParam(':date_debut', $this->date_debut);
        $stmt->bindParam(':date_fin', $this->date_fin);
        $stmt->bindParam(':motif', $this->motif);
    
        return $stmt->execute();
    }
    

    // Mettre à jour une demande
    public function update() {
        $query = "UPDATE " . $this->table . "
                  SET statut = :statut
                  WHERE id = :id";
        
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':statut', $this->statut);
        $stmt->bindParam(':id', $this->id);

        return $stmt->execute();
    }

    // Supprimer une demande
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);
        return $stmt->execute();
    }
}
