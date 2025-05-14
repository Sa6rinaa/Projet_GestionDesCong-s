<!DOCTYPE html>
<html>
<head>
    <title>Liste des congés</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    

    <h1 class="my-4">Liste des demandes de congés</h1>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Employé</th>
                <th>Type</th>
                <th>Début</th>
                <th>Fin</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($demandes as $conge): ?>

                <tr>
                    <td><?= $conge['id'] ?></td>
                    <td><?= $conge['id_user'] ?></td>
                    <td><?= $conge['type_conge'] ?></td>
                    <td><?= $conge['date_debut'] ?></td>
                    <td><?= $conge['date_fin'] ?></td>
                    <td><?= $conge['statut'] ?></td>
                    <td>
                        <a href="conge.php?action=valider&id=<?= $conge['id'] ?>&statut=accepté" class="btn btn-success btn-sm">Valider</a>
                        <a href="conge.php?action=valider&id=<?= $conge['id'] ?>&statut=refusé" class="btn btn-danger btn-sm">Refuser</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
