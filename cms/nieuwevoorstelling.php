<?php

include_once('../includes/connection.php');

session_start();

if (isset($_POST['voorstellingNaam'], $_POST['voorstellingContent'])) {
    $voorstellingNaam = $_POST['voorstellingNaam'];
    $voorstellingContent = nl2br($_POST['voorstellingContent']);
    $voorstellingPrijsRegulier = $_POST['voorstellingPrijsRegulier'];
    $voorstellingPrijsCJP = $_POST['voorstellingPrijsCJP'];
    $voorstellingPrijsGelrepas = $_POST['voorstellingPrijsGelrepas'];
    $voorstellingdatums = $_POST['voorstellingdatums'];

    $isActief = 1;

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
//    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
    $tmp           = explode('.',$_FILES['image']['name']);
    $file_ext = end($tmp);

    $extensions= array("jpeg","jpg","png", "PNG");

    if (empty($voorstellingNaam) or empty($voorstellingContent)) {
        $error = "Je moet alle velden invullen.";
    } else {

        if(empty($voorstellingDatum2)){
            $voorstellingDatum2 = NULL;
        }
        if(empty($voorstellingDatum3)){
            $voorstellingDatum3 = NULL;
        }
        if(empty($voorstellingDatum4)){
            $voorstellingDatum4 = NULL;
        }

        if(in_array($file_ext,$extensions)=== false){
            $errors[]="De extentie van deze afbeelding is niet toegestaan. Gebruik een andere extentie.";
        }

        if($file_size > 2097152) {
            $errors[]='Het bestand mag niet groter zijn dan 2MB';

        }

        if(empty($errors)==true) {
            $image_path = "../uploads/".$file_name;
            move_uploaded_file($file_tmp,$image_path);
            echo "Foto met succes geupload";

        }else{
            print_r($errors);
        }

    try{
        $query = $pdo->prepare('INSERT INTO voorstelling (voorstellingNaam, voorstellingContent, voorstellingPrijsRegulier, voorstellingPrijsCJP, voorstellingPrijsGelrepas, imagePath, isActief) VALUES(?, ?, ?, ?, ?, ?, ?)');

        $query->bindValue(1, $voorstellingNaam);
        $query->bindValue(2, $voorstellingContent);
        $query->bindValue(3, $voorstellingPrijsRegulier);
        $query->bindValue(4, $voorstellingPrijsCJP);
        $query->bindValue(5, $voorstellingPrijsGelrepas);
        $query->bindValue(6, $image_path);
        $query->bindValue(7, $isActief);

//        INSERT DE VOORSTELLING
        $query->execute();

        //Nieuwste voorstelling ophalen
        $query2 = "SELECT MAX(voorstellingID) AS voorstellingID FROM voorstelling";
        $sql2 = $pdo->prepare($query2);
        $sql2->execute(array());
        $nieuwstevoorstelling = $sql2->fetch();
        $nieuwstevoorstellingID = $nieuwstevoorstelling['voorstellingID'];


        //INSERT VOOR VOORSTELLING DATUMS
        foreach($voorstellingdatums as $voorstellingdatum) {

            if($voorstellingdatum != NULL) {
                $query3 = $pdo->prepare('INSERT INTO voorstellingdatums (voorstellingID, voorstellingDatum) VALUES (?, ?)');
                $query3->bindValue(1, $nieuwstevoorstellingID);
                $query3->bindValue(2, $voorstellingdatum);
                $query3->execute();

            }
        }


    }

    catch (PDOException $e){
            print $e;
        }


        header('Location: ');
    }
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
            <li class="nav-item">
                <a class="nav-link" href="nieuws.php">Nieuws</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="voorstellingen.php">Voorstellingen</a>
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
            <h2>Voeg een voorstelling toe</h2>
            <form action="" method="post" autocomplete="off"  enctype = "multipart/form-data">
                <div class="form-group">
                    <label for="voorstellingNaam">Naam</label>
                    <input type="text" name="voorstellingNaam" class="form-control" required id="voorstellingNaam" placeholder="Naam">
                </div>
                <div class="form-group">
                    <label for="voorstellingContent">Content</label>
                    <textarea class="form-control" name="voorstellingContent" id="voorstellingContent" required placeholder="Content" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="voorstellingPrijsRegulier">Prijs regulier</label>
                    <input type="number" name="voorstellingPrijsRegulier" class="form-control" required id="voorstellingPrijsRegulier" placeholder="Prijs regulier">
                </div>
                <div class="form-group">
                    <label for="voorstellingPrijsCJP">Prijs CJP</label>
                    <input type="number" name="voorstellingPrijsCJP" class="form-control" required id="voorstellingPrijsCJP" placeholder="Prijs CJP">
                </div>
                <div class="form-group">
                    <label for="voorstellingPrijsCJP">Prijs Gelrepas</label>
                    <input type="number" name="voorstellingPrijsGelrepas" class="form-control" value="<?php echo $tempVoorstelling['voorstellingPrijsGelrepas'];?>" required id="voorstellingPrijsGelrepas" placeholder="Prijs Gelrepas">
                </div>
                <div class="form-group">
                    <input required type = "file" name = "image" />
                </div>
                <div class="form-group row">
                    <label for="voorstellingDatum1" class="col-2 col-form-label">Datum 1</label>
                    <div class="col-10">
                        <input class="form-control" name=voorstellingdatums[] type="date" value="2011-08-19" id="voorstellingDatum1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="voorstellingDatum2" class="col-2 col-form-label">Datum 2</label>
                    <div class="col-10">
                        <input class="form-control" name=voorstellingdatums[] type="date" value="" id="voorstellingDatum2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="voorstellingDatum3" class="col-2 col-form-label">Datum 3</label>
                    <div class="col-10">
                        <input class="form-control" name=voorstellingdatums[] type="date" value="" id="voorstellingDatum3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="voorstellingDatum4" class="col-2 col-form-label">Datum 4</label>
                    <div class="col-10">
                        <input class="form-control" name=voorstellingdatums[] type="date" value="" id="voorstellingDatum4">
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-danger">Voeg toe</button>
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

