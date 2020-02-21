<?php

try{
    $pdo = new PDO('mysql:host=localhost;dbname=overMalbruggenDb', 'root', '');
} catch (PDOException $e){
    exit('Database error.');
}


?>
