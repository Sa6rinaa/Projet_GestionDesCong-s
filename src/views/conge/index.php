<!DOCTYPE html>
<html>
<head>
    <title>Portail RH - Accueil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">Portail RH</a>
                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="client.php">Clients</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="commande.php">Commandes</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="conge.php?action=liste">Congés</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="jumbotron my-4 p-4 bg-light">
            <h1>Bienvenue sur le portail RH</h1>
            <p class="lead">Gérez facilement les clients, les commandes et les demandes de congés de vos employés.</p>
        </div>

        <div class="row">
            <!-- Section Clients -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Clients</h5>
                        <p class="card-text">Consultez, ajoutez ou modifiez les informations des clients.</p>
                        <a href="client.php" class="btn btn-primary">Voir les clients</a>
                    </div>
                </div>
            </div>

            <!-- Section Commandes -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Commandes</h5>
                        <p class="card-text">Gérez les commandes passées par les clients.</p>
                        <a href="commande.php" class="btn btn-primary">Voir les commandes</a>
                    </div>
                </div>
            </div>

            <!-- Section Congés -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Gestion des Congés</h5>
                        <p class="card-text">Consultez, approuvez ou refusez les demandes de congé des employés.</p>
                        <a href="conge.php?action=liste" class="btn btn-primary">Voir les congés</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Architecture du système</h5>
                <p class="card-text">Cette application utilise une architecture multi-conteneurs avec:</p>
                <ul>
                    <li>Un conteneur Apache/PHP pour le serveur web</li>
                    <li>Un conteneur MySQL pour la base de données</li>
                    <li>Docker Compose pour l'orchestration</li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
