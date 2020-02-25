<?php

try{

    $pdo = new PDO('mysql:host=localhost;dbname=overMalbruggenDb', 'frontend_user', 'UserPassword321');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e){
    exit('Database error.');
}


?>
