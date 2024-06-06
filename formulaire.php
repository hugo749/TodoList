<?php
    // Va chercher les pages "connexionServeur.php" et "fonctionBdd.php".
    require_once 'connexionServeur.php';
    include 'fonctionBdd.php';
    //---------------------------------------------------\\
    //                                                   \\
    #      Traitement de l'ajout de nouvelle tâche        #
    //                                                   \\
    //---------------------------------------------------\\
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['tache']) && !empty($_POST['tache'])) {
        $tacheNom = $_POST['tache'];
        addTache($dbClient, $tacheNom);
        header('Location: index.php');
        exit;
    }
    //---------------------------------------------------\\
    //                                                   \\
    #                 Nouveau - Qui marche                #
    #  Traitement de la mise à jour de l'état des tâches  #
    //                                                   \\
    //---------------------------------------------------\\
    if (isset($_POST["is_complete"]) && isset($_POST["taskid"])) {
        updateTaskState($dbClient, $_POST["taskid"], 1);
        header('Location: index.php');
    }
    elseif(!isset($_POST["is_complete"])){
        updateTaskState($dbClient, $_POST["taskid"], 0);
        header('Location: index.php');
    }
    //---------------------------------------------------\\
    //                                                   \\
    #               Ancien - Qui marche pas               #
    #  Traitement de la mise à jour de l'état des tâches  #
    //                                                   \\
    //---------------------------------------------------\\
    // Traitement de la mise à jour de l'état des tâches
    /*if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['current_state']) && is_array($_POST['current_state'])) {
    foreach ($_POST['current_state'] as $taskId => $state) {
        // Vérifiez si la case est cochée ou non et mettez à jour l'état en conséquence
        $newState = ($state == 1) ? 0 : 1;
        updateTaskState($dbClient, $taskId, $newState);
    }
    header('Location: index.php');
    }*/
?>
