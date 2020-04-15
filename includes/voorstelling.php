<?php

class Voorstelling {
    public function fetch_all($isActief) {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM voorstelling where isActief = $isActief");
        $query->execute();

        return $query->fetchAll();
    }

    public function getHtml($isActief = 0)
    {
        $voorstellingen = $this->fetch_all($isActief);
        $html = "";
        foreach ($voorstellingen as $voorstelling) {
            $html .= "<div class=\"text-center\">
                        <h3>{$voorstelling['voorstellingNaam']}</h3>
                       <a href='voorstellingdetails.php?id={$voorstelling['voorstellingID']}'><img class=\"img-fluid\" src=\"{$voorstelling['imagePath']}\"></a>
                    </div>";

        }
        return $html;
    }

    public function getHtmlCMS($isActief = 0)
    {
        $voorstellingen = $this->fetch_all($isActief);
        $html = "";
        foreach ($voorstellingen as $voorstelling) {
            $html .= "<div class=\"text-center\">
                        <h3>{$voorstelling['voorstellingNaam']}</h3>
                       <img class=\"img-fluid\" src=\"{$voorstelling['imagePath']}\">
                    </div>
                    <a href='voorstellingen.php?id={$voorstelling['voorstellingID']}'>Verwijder</a>
                    <a href='editvoorstelling.php?editID={$voorstelling['voorstellingID']}'>Pas aan</a>";

        }
        return $html;
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
