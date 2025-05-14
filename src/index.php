<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Portail RH - Gestion des Congés</title>
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
                            <a class="nav-link <?= !isset($_GET['page']) ? 'active' : '' ?>" href="index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($_GET['page'] ?? '') === 'demande' ? 'active' : '' ?>" href="index.php?page=demande">Faire une demande</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($_GET['page'] ?? '') === 'validation' ? 'active' : '' ?>" href="index.php?page=validation">Validation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($_GET['page'] ?? '') === 'soldes' ? 'active' : '' ?>" href="index.php?page=soldes">Mes soldes</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php
        if (!isset($_GET['page'])):
        ?>
            <div class="jumbotron my-4 p-4 bg-light">
                <h1>Bienvenue sur le Portail RH</h1>
                <p class="lead">Gérez vos congés, vos absences, et consultez vos soldes simplement.</p>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Faire une demande</h5>
                            <p class="card-text">Soumettez une demande de congé ou d'absence.</p>
                            <a href="index.php?page=demande" class="btn btn-primary">Demander</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Validation</h5>
                            <p class="card-text">Validez ou refusez les demandes (manager ou RH).</p>
                            <a href="index.php?page=validation" class="btn btn-primary">Valider</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title">Mes soldes</h5>
                            <p class="card-text">Consultez vos jours de congés restants par type.</p>
                            <a href="index.php?page=soldes" class="btn btn-primary">Voir mes soldes</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">À propos</h5>
                    <p class="card-text">Ce portail utilise Docker avec :</p>
                    <ul>
                        <li>Un conteneur Apache/PHP pour l’application RH</li>
                        <li>Un conteneur MySQL pour stocker les utilisateurs et congés</li>
                        <li>Docker Compose pour l’orchestration</li>
                    </ul>
                </div>
            </div>
        <?php
        else:
            switch ($_GET['page']) {
                case 'demande':
                    require_once 'config/database.php';
                    require_once 'models/Conge.php';

                    $database = new Database();
                    $db = $database->getConnection();

                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $conge = new Conge($db);
                        $conge->id_user = $_POST['id_user'];
                        $conge->type_conge = $_POST['type_conge'];
                        $conge->date_debut = $_POST['date_debut'];
                        $conge->date_fin = $_POST['date_fin'];
                        $conge->motif = $_POST['motif'];
                        $conge->statut = 'en attente';

                        if ($conge->create()) {
                            $message = "La demande a été envoyée avec succès.";
                        } else {
                            $error = "Une erreur est survenue lors de la création de la demande.";
                        }
                    }

                    include 'views/conge/demande.php';
                    break;

                case 'validation':
                    include 'views/conge/valider.php';
                    break;

                case 'soldes':
                    require_once 'controllers/CongeController.php';
                    $controller = new CongeController();
                    $controller->index();
                    break;

                default:
                    echo "<div class='alert alert-danger'>Page introuvable</div>";
            }
        endif;
        ?>
    </div>
</body>
</html>
