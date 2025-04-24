<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la commande</title>
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
        
        <h1 class="my-4">Détails de la commande</h1>
        
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Commande #<?= $this->commande->id ?></h5>
                
                <p class="card-text"><strong>Client:</strong> <?= $this->client->prenom ?> <?= $this->client->nom ?></p>
                <p class="card-text"><strong>Email:</strong> <?= $this->client->email ?></p>
                <p class="card-text"><strong>Date de commande:</strong> <?= $this->commande->date_commande ?></p>
                <p class="card-text"><strong>Montant:</strong> <?= number_format($this->commande->montant, 2, ',', ' ') ?> €</p>
                <p class="card-text"><strong>Statut:</strong> <?= $this->commande->statut ?></p>
                
                <a href="commande.php" class="btn btn-primary">Retour à la liste</a>
                <a href="commande.php?action=edit&id=<?= $this->commande->id ?>" class="btn btn-warning">Modifier</a>
                <a href="commande.php?action=delete&id=<?= $this->commande->id ?>" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?')">Supprimer</a>
            </div>
        </div>
    </div>
</body>
</html>
