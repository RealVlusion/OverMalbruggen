<?php

include_once('../includes/connection.php');

session_start();

$editID = $_GET['editID'];

//Haal actuele voorstelling data op
$stmt = $pdo->prepare("SELECT * FROM voorstelling WHERE voorstellingID = ?");
$stmt->execute(array($editID));
$tempVoorstelling = $stmt->fetch();

//Update de acuele data
    if (isset($_POST['nw_update'])) {
        $voorstellingNaam = $_POST['voorstellingNaam'];
        $voorstellingContent = nl2br($_POST['voorstellingContent']);
        $voorstellingPrijsRegulier = $_POST['voorstellingPrijsRegulier'];
        $voorstellingPrijsCJP = $_POST['voorstellingPrijsCJP'];
        $voorstellingPrijsGelrepas = $_POST['voorstellingPrijsGelrepas'];
        $voorstellingdatums = $_POST['voorstellingdatums'];
        $isActief = $_POST['isActief'];

        if(empty($voorstellingDatum2)){
            $voorstellingDatum2 = NULL;
        }
        if(empty($voorstellingDatum3)){
            $voorstellingDatum3 = NULL;
        }
        if(empty($voorstellingDatum4)){
            $voorstellingDatum4 = NULL;
        }

        //DELETE ALLE BESTAANDE DATUMS
        $query4 = "DELETE FROM voorstellingDatums WHERE voorstellingID = $editID";
        $sql4 = $pdo->prepare($query4);
        $sql4->execute(array());

        //Update voorstelling
        $query = "UPDATE voorstelling SET voorstellingNaam = '$voorstellingNaam', voorstellingContent = '$voorstellingContent', voorstellingPrijsRegulier = '$voorstellingPrijsRegulier',
        voorstellingPrijsCJP = '$voorstellingPrijsCJP', voorstellingPrijsGelrepas = '$voorstellingPrijsGelrepas', isActief = $isActief  WHERE voorstellingID = $editID";
        $sql = $pdo->prepare($query);
        $sql->execute(array());

        //Update voorstellingdatums
        $query2 = "UPDATE voorstellingdatums SET voorstellingID =  , voorstellingDatum = ";


        //INSERT VOOR VOORSTELLING DATUMS
        foreach($voorstellingdatums as $voorstellingdatum) {

            if($voorstellingdatum != NULL) {
                $query3 = $pdo->prepare('INSERT INTO voorstellingdatums (voorstellingID, voorstellingDatum) VALUES (?, ?)');
                $query3->bindValue(1, $editID);
                $query3->bindValue(2, $voorstellingdatum);
                $query3->execute();

            }
        }
        header('Location: voorstellingen.php');
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
            <li class="nav-item active">
                <a class="nav-link" href="team.php">Team</a>
            </li>
            <li class="nav-item">
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
            <h2>Pas een voorstelling aan</h2>
            <form action="" method="post" autocomplete="off"  enctype = "multipart/form-data">
                <div class="form-group">
                    <label for="voorstellingNaam">Naam</label>
                    <input type="text" name="voorstellingNaam" class="form-control" value="<?php echo $tempVoorstelling['voorstellingNaam'];?>" required id="voorstellingNaam" placeholder="Naam">
                </div>
                <div class="form-group">
                    <label for="voorstellingContent">Content</label>
                    <textarea class="form-control" name="voorstellingContent" id="voorstellingContent"  required placeholder="Content" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="voorstellingPrijsRegulier">Prijs regulier</label>
                    <input type="number" name="voorstellingPrijsRegulier" class="form-control" value="<?php echo $tempVoorstelling['voorstellingPrijsRegulier'];?>" required id="voorstellingPrijsRegulier" placeholder="Prijs regulier">
                </div>
                <div class="form-group">
                    <label for="voorstellingPrijsCJP">Prijs CJP</label>
                    <input type="number" name="voorstellingPrijsCJP" class="form-control" value="<?php echo $tempVoorstelling['voorstellingPrijsCJP'];?>" required id="voorstellingPrijsCJP" placeholder="Prijs CJP">
                </div>
                <div class="form-group">
                    <label for="voorstellingPrijsCJP">Prijs Gelrepas</label>
                    <input type="number" name="voorstellingPrijsGelrepas" class="form-control" value="<?php echo $tempVoorstelling['voorstellingPrijsGelrepas'];?>" required id="voorstellingPrijsGelrepas" placeholder="Prijs Gelrepas">
                </div>
                <div class="form-group row">
                    <label for="voorstellingDatum1" class="col-2 col-form-label">Datum 1</label>
                    <div class="col-10">
                        <input class="form-control" name="voorstellingdatums[]" type="date" value="" id="voorstellingDatum1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="voorstellingDatum2" class="col-2 col-form-label">Datum 2</label>
                    <div class="col-10">
                        <input class="form-control" name="voorstellingdatums[]" type="date" value= id="voorstellingDatum2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="voorstellingDatum3" class="col-2 col-form-label">Datum 3</label>
                    <div class="col-10">
                        <input class="form-control" name="voorstellingdatums[]" type="date" value="" id="voorstellingDatum3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="voorstellingDatum4" class="col-2 col-form-label">Datum 4</label>
                    <div class="col-10">
                        <input class="form-control" name="voorstellingdatums[]" type="date" value="" id="voorstellingDatum4">
                    </div>
                </div>
                <div class="form-group">
                    <label for="isActief">Status:</label>
                    <select class="form-control" name="isActief" id="isActief">
                        <option value="1">Actief</option>
                        <option value="0">Archief</option>
                    </select>
                </div>
                <input type="submit" name="nw_update" value="Pas aan"/>
            </form>
        </main>
</div>

<a href="../index.php" class="backToIndex"><button type="button" class="btn btn-secondary"><< Back to Index</button></a>
</body>
</html>

    <?php
} else {
    header('Location: inloggen.php');
}
?>


