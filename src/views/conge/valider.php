<?php
// Inclure les modèles nécessaires
require_once 'config/database.php';
require_once 'models/Conge.php';

// Créer une instance de la base de données et de la classe Conge
$database = new Database();
$db = $database->getConnection();
$conge = new Conge($db);

// Récupérer les demandes en attente
$demandes = $conge->getDemandesEnAttente();

// Vérifier si une action (valider/refuser) a été effectuée
$statut = $statut ?? ''; // Si $statut est défini, on l'affiche, sinon on le laisse vide.
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Validation des Congés</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1 class="my-4">Validation des Demandes de Congé</h1>

    <!-- Affichage du message de succès ou d'erreur -->
    <?php if ($statut): ?>
        <div class="alert alert-success my-4">
            La demande a été <strong><?= htmlspecialchars($statut) ?></strong> avec succès.
        </div>
    <?php endif; ?>

    <!-- Affichage des demandes en attente -->
    <?php if ($demandes->rowCount() > 0): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Utilisateur</th>
                    <th>Type de Congé</th>
                    <th>Date de Début</th>
                    <th>Date de Fin</th>
                    <th>Motif</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($demande = $demandes->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?= htmlspecialchars($demande['id_user']) ?></td>
                        <td><?= htmlspecialchars($demande['type_conge']) ?></td>
                        <td><?= htmlspecialchars($demande['date_debut']) ?></td>
                        <td><?= htmlspecialchars($demande['date_fin']) ?></td>
                        <td><?= htmlspecialchars($demande['motif']) ?></td>
                        <td>
                            <!-- Lien pour valider ou refuser la demande -->
                            <a href="valider_conge.php?id=<?= $demande['id'] ?>&action=valider" class="btn btn-success">Valider</a>
                            <a href="valider_conge.php?id=<?= $demande['id'] ?>&action=refuser" class="btn btn-danger">Refuser</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-info">Aucune demande de congé en attente.</div>
    <?php endif; ?>
</div>
</body>
</html>
