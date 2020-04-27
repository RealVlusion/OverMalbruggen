<?php

class Image {
    public function fetch_all() {
        global $pdo;

        $query = $pdo->prepare("SELECT * FROM galleryimage");
        $query->execute();

        return $query->fetchAll();
    }

    public function getHtml()
    {
        $fotos = $this->fetch_all();
        $reversedfotos = array_reverse($fotos);
        $html = "";
        foreach ($reversedfotos as $foto) {
            $html .= "<div class=\"gallery\">
                    <a target=\"_blank\" href=\"{$foto['galleryPath']}\">
                        <img src=\"{$foto['galleryPath']}\" alt=\"Cinque Terre\" width=\"600\" height=\"400\">
                    </a>
                </div>";

        }
        return $html;
    }

    public function getHtmlCMS()
    {
        $fotos = $this->fetch_all();
        $reversedfotos = array_reverse($fotos);
        $html = "";
        foreach ($reversedfotos as $foto) {
            $realImagePath = '../'.$foto['galleryPath'];

            $html .= "<div class=\"gallery\">
                    <a target=\"_blank\" href=\"$realImagePath\">
                        <img src=\"$realImagePath\" alt=\"Cinque Terre\" width=\"600\" height=\"400\">
                    </a>
                    <a href='fotos.php?id={$foto['galleryID']}'>Verwijder</a>
                </div>";

        }
        return $html;
    }
}
?>
