<?php

try{

    $pdo = new PDO('mysql:host=localhost;dbname=overMalbruggenDb', 'root', '');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e){
    exit('Database error. - ' . $e);
}

?>
