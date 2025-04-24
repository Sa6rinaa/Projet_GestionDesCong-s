<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une commande</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Application Docker</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="client.php">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="commande.php">Commandes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <h1 class="my-4">Modifier une commande</h1>
        
        <!-- Affichage des erreurs -->
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        
        <form method="post" action="commande.php?action=edit&id=<?= $this->commande->id ?>">
            <!-- Sélection du client -->
            <div class="mb-3">
                <label for="client_id" class="form-label">Client</label>
                <select class="form-select" id="client_id" name="client_id" required>
                    <option value="" disabled selected>Choisissez un client</option>
                    <?php foreach ($clients as $client): ?>
                        <option value="<?= $client['id'] ?>" <?= $client['id'] == $this->commande->client_id ? 'selected' : '' ?>>
                            <?= $client['nom'] ?> <?= $client['prenom'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Date de commande -->
            <div class="mb-3">
                <label for="date_commande" class="form-label">Date de commande</label>
                <input type="date" class="form-control" id="date_commande" name="date_commande" value="<?= $this->commande->date_commande ?>" required>
            </div>

            <!-- Montant de la commande -->
            <div class="mb-3">
                <label for="montant" class="form-label">Montant</label>
                <input type="number" class="form-control" id="montant" name="montant" value="<?= $this->commande->montant ?>" required>
            </div>

            <!-- Statut de la commande -->
            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select class="form-select" id="statut" name="statut" required>
                    <option value="En attente" <?= $this->commande->statut == 'En attente' ? 'selected' : '' ?>>En attente</option>
                    <option value="Traitement" <?= $this->commande->statut == 'Traitement' ? 'selected' : '' ?>>En traitement</option>
                    <option value="Livrée" <?= $this->commande->statut == 'Livrée' ? 'selected' : '' ?>>Livrée</option>
                </select>
            </div>

            <!-- Boutons de soumission et annulation -->
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
            <a href="commande.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>
