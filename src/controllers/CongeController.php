<?php
include_once 'config/database.php';
include_once 'models/Conge.php';

class CongeController {
    private $conge;
    private $db;
    
    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->conge = new Conge($this->db);
    }

    // Liste des demandes de congé
    public function index() {
        $stmt = $this->conge->read();
        $demandes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        include_once 'views/conge/liste.php';
    }

    // Créer une nouvelle demande
    public function create() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->conge->id_user = $_POST['id_user'];
            $this->conge->type_conge = $_POST['type_conge'];
            $this->conge->date_debut = $_POST['date_debut'];
            $this->conge->date_fin = $_POST['date_fin'];
            $this->conge->motif = $_POST['motif'];
            $this->conge->statut = 'en attente';

            if ($this->conge->create()) {
                header('Location: index.php?page=demande');
                exit;
            } else {
                $error = "Erreur lors de la soumission.";
            }
        }

        include_once 'views/conge/demande.php';
    }

    // Affichage d'une demande
    public function show($id) {
        $this->conge->id = $id;
        if ($this->conge->readOne()) {
            include_once 'views/conge/detail.php';
        } else {
            echo "Demande non trouvée.";
        }
    }

    // Modifier une demande (RH ou manager)
    public function edit($id) {
        $this->conge->id = $id;

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->conge->statut = $_POST['statut'];

            if ($this->conge->update()) {
                header('Location: index.php?page=validation');
                exit;
            } else {
                $error = "Erreur lors de la mise à jour.";
            }
        } else {
            if (!$this->conge->readOne()) {
                echo "Demande non trouvée.";
                return;
            }
        }

        include_once 'views/conge/valider.php';
    }

    // Supprimer une demande (facultatif)
    public function delete($id) {
        $this->conge->id = $id;
        if ($this->conge->delete()) {
            header('Location: index.php?page=demande');
            exit;
        } else {
            echo "Erreur lors de la suppression.";
        }
    }
}
