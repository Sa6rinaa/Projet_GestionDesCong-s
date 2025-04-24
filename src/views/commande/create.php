<!DOCTYPE html>
<html>
<head>
    <title>Ajouter une commande</title>
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
        
        <h1 class="my-4">Ajouter une commande</h1>
        
        <?php if(isset($error)): ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>
        
        <form method="post" action="commande.php?action=create">
            <div class="mb-3">
                <label for="client_id" class="form-label">Client</label>
                <select class="form-select" id="client_id" name="client_id" required>
                    <option value="" disabled selected>Choisir un client</option>
                    <?php foreach ($clients as $client): ?>
                        <option value="<?= $client['id'] ?>"><?= $client['nom'] . ' ' . $client['prenom'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="date_commande" class="form-label">Date de la commande</label>
                <input type="date" class="form-control" id="date_commande" name="date_commande" required>
            </div>

            <div class="mb-3">
                <label for="montant" class="form-label">Montant</label>
                <input type="number" class="form-control" id="montant" name="montant" required>
            </div>

            <div class="mb-3">
                <label for="statut" class="form-label">Statut</label>
                <select class="form-select" id="statut" name="statut" required>
                    <option value="en cours">En cours</option>
                    <option value="terminée">Terminée</option>
                    <option value="annulée">Annulée</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Enregistrer</button>
            <a href="commande.php" class="btn btn-secondary">Annuler</a>
        </form>
    </div>
</body>
</html>
