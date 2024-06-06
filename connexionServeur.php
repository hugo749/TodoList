<?php
    //---------------------------------------------------\\
    //                                                   \\
    #            Connexion à la base de donnée            #
    //                                                   \\
    //---------------------------------------------------\\
    try {
        $dbClient = new PDO("mysql:host=localhost;dbname=todolist", 'root', 'root');
    }
    catch (Exception $e) {  
        echo''. $e->getMessage() .'';
        die();
    }
    //---------------------------------------------------\\
    //                                                   \\
    #            Selectionner tout les tâches             #
    //                                                   \\
    //---------------------------------------------------\\
    function getTaches($dbClient) {
        $sql = 'SELECT * FROM tache';
        $stdh = $dbClient->prepare($sql);
        $stdh->execute([
        ]);
        return $stdh->fetchAll(PDO::FETCH_ASSOC);
    }
    //---------------------------------------------------\\
    //                                                   \\
    #           Autres exercice / aide pour moi           #
    //                                                   \\
    //---------------------------------------------------\\
    /*function getProductsWithCategories($dbClient) {
        $sql = 'SELECT product.name as "product_name",price, category.name as "category_name" FROM product JOIN category on product.category_id = category.id';
        $stdh = $dbClient->prepare($sql);
        $stdh->execute([
        ]);
        return $stdh->fetchAll(PDO::FETCH_ASSOC);
    }*/
?>  