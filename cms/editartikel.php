<?php

include_once('../includes/connection.php');

session_start();

$editID = $_GET['editID'];

//Verzamel huidige gegevens van artikel
$stmt = $pdo->prepare("SELECT * FROM nieuws WHERE nieuwsID = ?");
$stmt->execute(array($editID));
$tempArtikel = $stmt->fetch();

//Klik op UPDATE
if (isset($_POST['nw_update'])) {
    $nieuwsTitel = $_POST['nieuwsTitel'];
    $content = nl2br($_POST['content']);

//    var_dump($nieuwsTitel);
//    var_dump($content);

    //Update teamlid
    $query = "UPDATE nieuws SET nieuwsTitel = '$nieuwsTitel', nieuwsContent = '$content' WHERE nieuwsID = $editID";
    $sql = $pdo->prepare($query);
    $sql->execute(array());


    header('Location: nieuws.php');
}
?>

<!--    Page Front-End-->

<?php


if (($_SESSION['logged_in'] == true)) {
    ?>

    <html>
    <head>
        <title>Candy CMS</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
              integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/cms.css">

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
                <li class="nav-item active">
                    <a class="nav-link" href="nieuws.php">Nieuws</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nieuws.php">Voorstellingen</a>
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
            <main class="addContainer">
                <h2>Pas artikel aan</h2>
                <form action="" method="post" autocomplete="off"  enctype = "multipart/form-data">
                    <div class="form-group">
                        <label for="Titel">Titel</label>
                        <input type="text" name="nieuwsTitel" class="form-control" required id="Titel" placeholder="Titel">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Content</label>
                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" required placeholder="Content" rows="3"></textarea>
                    </div>
                    <input type="submit" name="nw_update" value="Update artikel"/>
                </form>
            </main>
    </div>
    </body>
    </html>

    <?php
} else {
    header('Location: inloggen.php');
}
?>
