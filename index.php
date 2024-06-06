<!DOCTYPE html>
<html class="has-background-info-light" lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.0/css/bulma.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TodooList</title>
</head>
<body>
<?php
include 'connexionServeur.php';
include 'fonctionBdd.php';
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';
$items = [];
if ($filter === 'taches_a_faire') {
    $items = getTachesAFaire($dbClient);
} elseif ($filter === 'taches_terminees') {
    $items = getTachesTerminees($dbClient);
} else {
    $items = getTaches($dbClient);
}
?>
<div class="my-6 mx-6 pgh-large has-text-left">
<div class="columns">
    <div class="column is-one-quarter mt-6">
    <div class="control">
        <br>
        <form action="" method="get">
            <button class="button is-fullwidth" type="submit" name="filter" value="" class="toggle-button <?= $filter === '' ? 'active' : '' ?>">Toutes les tâches</button><br>
            <button class="button is-fullwidth" type="submit" name="filter" value="taches_a_faire" class="toggle-button <?= $filter === 'taches_a_faire' ? 'active' : '' ?>">Tâches à faire</button><br>
            <button class="button is-fullwidth" type="submit" name="filter" value="taches_terminees" class="toggle-button <?= $filter === 'taches_terminees' ? 'active' : '' ?>">Tâches terminées</button>
        </form>
        <form action="formulaire.php" method="post">
            <input class="mt-6 input is-normal" type="text" placeholder="Exemple: faire les courses" name="tache"/> 
            <button type="submit" class=" mt-2 button is-info is-dark button is-fullwidth">Ajouter la tâche</button>
        </form>
    </div>
</div>
<div class="column mt-0 pt-0 pl-6 pr-6">
    <h1 class="title is-3">Voici vos tâches de la semaine</h1>
    <table class="table is-fullwidth">
        <thead class="is-fullwidth">
            <tr>
                <th></th>
                <th>Id de la tâche</th>
                <th>Nom de la tâche</th>
                <th>Etat de la tâche en BDD</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($items as $tache): ?>
                <form action="formulaire.php" method="post" class="is-striped">
                    <tr><label class="checkbox">
                    <td><input type="checkbox" name="is_complete" value="<?= $tache['etat'] ?>" <?= $tache['etat'] == 1 ? 'checked' : '' ?> onchange="this.form.submit()"></td>
                    <td><?= $tache['id'] ?></td>
                    <td><?= $tache['nom'] ?></td>
                    <td><?= $tache['etat'] ?></td>
                    <input type="hidden" name="filter" value="<?= htmlspecialchars($filter) ?>">
                    <input type="hidden" name="taskid" value="<?= $tache['id'] ?>">
                    </label></tr>
                </form>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
</div>
</body>
</html>
