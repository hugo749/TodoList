<?php
    //---------------------------------------------------\\
    //                                                   \\
    #      Fonction pour ajouter une nouvelle tâche       #
    //                                                   \\
    //---------------------------------------------------\\
    function addTache($dbClient, $tacheNom) {
        $sql = 'INSERT INTO tache (nom, etat) VALUES (:nom, :etat)';
        $stmt = $dbClient->prepare($sql);
        $stmt->execute([
            ':nom' => $tacheNom,
            ':etat' => 0
        ]);
    }
    //---------------------------------------------------\\
    //                                                   \\
    #   Fonction pour mettre à jour l'état d'une tâche    #
    //                                                   \\
    //---------------------------------------------------\\
    function updateTaskState($dbClient, $taskId, $newState) {
        $sql = 'UPDATE tache SET etat = :etat WHERE id = :id';
        $stmt = $dbClient->prepare($sql);
        $stmt->execute([':etat' => $newState, ':id' => $taskId]);
    }
    //---------------------------------------------------\\
    //                                                   \\
    #     Fonction pour récupérer les tâches à faire      #
    //                                                   \\
    //---------------------------------------------------\\
    function getTachesAFaire($dbClient) {
        $sql = 'SELECT * FROM tache WHERE etat = 0';
        $stmt = $dbClient->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //---------------------------------------------------\\
    //                                                   \\
    #    Fonction pour récupérer les tâches terminées     #
    //                                                   \\
    //---------------------------------------------------\\
    function getTachesTerminees($dbClient) {
        $sql = 'SELECT * FROM tache WHERE etat = 1';
        $stmt = $dbClient->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>