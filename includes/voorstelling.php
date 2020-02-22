<?php

class Voorstelling {
    public function fetch_all() {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM voorstelling");
        $query->execute();

        return $query->fetchAll();
    }

//    public function fetch_data($candy_id) {
//        global $pdo;
//
//        $query = $pdo->prepare("SELECT * FROM team WHERE candy_id = ?");
//        $query->bindValue(1, $candy_id);
//        $query->execute();
//
//        return $query->fetch();
//    }
}
?>
