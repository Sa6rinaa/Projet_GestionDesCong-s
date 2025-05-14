<?php
require_once 'models/Database.php';
require_once 'models/Conge.php';

$database = new Database();
$db = $database->getConnection();
$conge = new Conge($db);

// Vérifier si les paramètres id et action sont présents dans l'URL
if (isset($_GET['id']) && isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];

    // Déterminer le statut à appliquer selon l'action
    if ($action === 'valider') {
        $statut = 'validé';
    } elseif ($action === 'refuser') {
        $statut = 'refusé';
    }

    // Charger la demande correspondante et la mettre à jour
    $conge->id = $id;
    if ($conge->readOne()) {
        $conge->statut = $statut;
        if ($conge->update()) {
            $statutMessage = ($statut === 'validé') ? 'validée' : 'refusée';
            $statut = "La demande a été $statutMessage";
        } else {
            $statut = "Une erreur est survenue lors de la mise à jour de la demande.";
        }
    } else {
        $statut = "La demande n'existe pas.";
    }
} else {
    $statut = "Aucune action valide détectée.";
}

// Rediriger vers la page de validation avec le message de statut
header("Location: valider.php?statut=" . urlencode($statut));
exit;
?>
