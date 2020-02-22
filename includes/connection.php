<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=overMalbruggenDb', 'root', 'admin');
} catch (PDOException $e){
    exit('Database error.');
}


?>
