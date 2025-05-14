<!DOCTYPE html>
<html>
<head>
    <title>Demande de congé</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">


    <h1 class="my-4">Faire une demande de congé</h1>
    <?php if(isset($message)): ?>
    <div class="alert alert-success"><?= $message ?></div>
<?php endif; ?>

    <?php if(isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
    <?php endif; ?>

    <form method="post" action="index.php?page=demande">


        <div class="mb-3">
            <label for="id_user" class="form-label">ID Employé</label>
            <input type="number" class="form-control" id="id_user" name="id_user" required>
        </div>
        <div class="mb-3">
            <label for="type_conge" class="form-label">Type de congé</label>
            <select class="form-select" id="type_conge" name="type_conge" required>
                <option value="CP">Congés Payés</option>
                <option value="RTT">RTT</option>
                <option value="Sans solde">Sans solde</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="date_debut" class="form-label">Date de début</label>
            <input type="date" class="form-control" id="date_debut" name="date_debut" required>
        </div>
        <div class="mb-3">
            <label for="date_fin" class="form-label">Date de fin</label>
            <input type="date" class="form-control" id="date_fin" name="date_fin" required>
        </div>
        <div class="mb-3">
            <label for="motif" class="form-label">Motif</label>
            <textarea class="form-control" id="motif" name="motif"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer la demande</button>
        <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>
</div>
</body>
</html>
