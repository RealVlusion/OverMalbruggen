<?php

class Nieuwsartikel {
    public function fetch_all() {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM nieuws");
        $query->execute();

        return $query->fetchAll();
    }
}
?>
