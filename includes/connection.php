<?php

try{

    $pdo = new PDO('mysql:host=rdbms.strato.de;dbname=DB4127373;charset=utf8', 'U4127373', 'Db@Malbruggen88');
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e){
    exit('Database error. - ' . $e);
}

?>
