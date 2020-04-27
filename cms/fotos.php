<?php

include_once('../includes/connection.php');
include_once('../includes/image.php');

session_start();

$image = new Image();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = $pdo->prepare('DELETE FROM galleryImage WHERE galleryID = ?');
    $query->bindValue(1, $id);
    $query->execute();

    header('Location: fotos.php');
}

//Klik op UPDATE
if (isset($_POST['nw_update'])) {
    $title = $_POST['title'];
    $content = nl2br($_POST['content']);
    $rol = $_POST['teamlidRol'];

    //Update teamlid
    $query = "UPDATE team SET teamlidNaam = '$title', teamlidOmschrijving = '$content', teamlidRol = '$rol' WHERE teamlidID = $editID";
    $sql = $pdo->prepare($query);
    $sql->execute(array());

    header('Location: team.php');
}
?>

<?php


if (($_SESSION['logged_in'] == true)) {
    ?>

    <html>
    <head>
        <title>Candy CMS</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/cms.css">
        <link rel="stylesheet" type="text/css" href="../css/gallery.css">

    </head>

    <body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="index.php"><img src="../img/NavbarLogoWhite.png">OverMalbruggen CMS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="team.php">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nieuws.php">Nieuws</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nieuws.php">Voorstellingen</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="fotos.php">Foto's</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Uitloggen</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">


        <?php if (isset($error)) { ?>
        <small style="color:#aa0000"><?php echo $error; ?>
            <br /><br />
            <?php } ?>
            <main>
                <h1 class="centerText">Foto's</h1>
                <p class="centerText">Hier kun je foto's toevoegen of verwijderen.</p>
                <a href="nieuwefoto.php"><button type="button" class="btn btn-outline-danger">Nieuwe foto</button></a>
                <section class="imageGallery">

                    <?=$image->getHtmlCMS()?>

                </section>
            </main>
    </div>

    <a href="../site/index.php" class="backToIndex"><button type="button" class="btn btn-secondary"><< Back to Index</button></a>
    </body>
    </html>

    <?php
} else {
    header('Location: inloggen.php');
}
?>

