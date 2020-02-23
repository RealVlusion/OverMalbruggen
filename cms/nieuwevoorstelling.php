<?php

include_once('../includes/connection.php');

if (isset($_POST['voorstellingNaam'], $_POST['voorstellingContent'])) {
    $voorstellingNaam = $_POST['voorstellingNaam'];
    $voorstellingContent = nl2br($_POST['voorstellingContent']);
    $voorstellingPrijsRegulier = $_POST['voorstellingPrijsRegulier'];
    $voorstellingPrijsCJP = $_POST['voorstellingPrijsCJP'];
    $voorstellingDatum1 = $_POST['voorstellingDatum1'];
    $voorstellingDatum2 = $_POST['voorstellingDatum2'];
    $voorstellingDatum3 = $_POST['voorstellingDatum3'];
    $voorstellingDatum4 = $_POST['voorstellingDatum4'];
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
        $query = $pdo->prepare('INSERT INTO voorstelling (voorstellingNaam, voorstellingContent, voorstellingPrijsRegulier, voorstellingPrijsCJP, imagePath, voorstellingDatum1, voorstellingDatum2, voorstellingDatum3, voorstellingDatum4, isActief) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');

        $query->bindValue(1, $voorstellingNaam);
        $query->bindValue(2, $voorstellingContent);
        $query->bindValue(3, $voorstellingPrijsRegulier);
        $query->bindValue(4, $voorstellingPrijsCJP);
        $query->bindValue(5, $image_path);
        $query->bindValue(6, $voorstellingDatum1);
        $query->bindValue(7, $voorstellingDatum2);
        $query->bindValue(8, $voorstellingDatum3);
        $query->bindValue(9, $voorstellingDatum4);
        $query->bindValue(10, $isActief);



        $query->execute();
    }

    catch (PDOException $e){
            print $e;
        }


        header('Location: voorstellingen.php');
    }
}
?>
<!--    Page Front-End-->

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
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Uitloggen</button>
        </form>
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
                    <input required type = "file" name = "image" />
                </div>
                <div class="form-group row">
                    <label for="voorstellingDatum1" class="col-2 col-form-label">Datum 1</label>
                    <div class="col-10">
                        <input class="form-control" name="voorstellingDatum1" type="date" value="2011-08-19" id="voorstellingDatum1">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="voorstellingDatum2" class="col-2 col-form-label">Datum 2</label>
                    <div class="col-10">
                        <input class="form-control" name="voorstellingDatum2" type="date" value="" id="voorstellingDatum2">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="voorstellingDatum3" class="col-2 col-form-label">Datum 3</label>
                    <div class="col-10">
                        <input class="form-control" name="voorstellingDatum3" type="date" value="" id="voorstellingDatum3">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="voorstellingDatum4" class="col-2 col-form-label">Datum 4</label>
                    <div class="col-10">
                        <input class="form-control" name="voorstellingDatum4" type="date" value="" id="voorstellingDatum4">
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-danger">Voeg toe</button>
            </form>
        </main>
</div>

<a href="../index.php" class="backToIndex"><button type="button" class="btn btn-secondary"><< Back to Index</button></a>
</body>
</html>
