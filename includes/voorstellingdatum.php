<?php

class Voorstellingdatum {
    public function fetch_all($voorstellingID) {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM voorstellingdatums where voorstellingID = $voorstellingID");
        $query->execute();

        return $query->fetchAll();
    }

    public function getVoorstellingDates($voorstellingID)
    {
        $voorstellingDatums = $this->fetch_all($voorstellingID);
        $html = "";

        $count = 0;
        foreach ($voorstellingDatums as $datum) {
            $timestamp = strtotime($datum["voorstellingDatum"]);
            $voorstellingTijd = $datum["voorstellingTijd"];
            $jaar = date("Y", $timestamp);
            $maand = date("M", $timestamp);
            $dag = date("d", $timestamp);
            $count++;

            $html .= "      
                    <li>
                        <time datetime=\"2014-07-20\">
                            <span class=\"day\">$dag</span>
                            <span class=\"month\">$maand</span>
                            <span class=\"year\">$jaar</span>
                            <span class=\"time\">ALL DAY</span>
                        </time>
                        <div class=\"info\">
                            <h2 class=\"title\">Opvoering $count</h2>
                            <p class=\"desc\">$voorstellingTijd</p>
                        </div>
                    </li>";

        }
        return $html;
    }
}



?>
