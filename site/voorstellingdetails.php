<?php

include_once('../includes/connection.php');
include_once('../includes/voorstellingdatum.php');

$Voorstellingdatum = new Voorstellingdatum();

//Get voorstelling ID
$voorstellingID = $_GET['id'];

//Haal actuele voorstelling data op
$stmt = $pdo->prepare("SELECT * FROM voorstelling WHERE voorstellingID = ?");
$stmt->execute([$voorstellingID]);
$tempVoorstelling = $stmt->fetch();

//Haal actuele voorstellingdatums data op

$stmt2 = $pdo->prepare("SELECT * FROM voorstellingdatums WHERE voorstellingID = ?");
$stmt2->execute([$voorstellingID]);
$teampVoorstellingdatums = $stmt2->fetch();

?>

<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OverMalbruggen | Voorstellingdetails</title>

    <!--imports-->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/voorstelling.css">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">



    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!------ Include the above in your HEAD tag ---------->

</head>

<body>

<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <a class="navbar-brand" href="index.php"><img src="../img/NavbarLogoWhite.png">OverMalbruggen</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="overons.php">Over</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nieuws.php">Nieuws</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Meedoen?
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="gratisproefles.php">Gratis proefles</a>
                    <a class="dropdown-item" href="wekelijkseworkshops.php">Wekelijkse workshops</a>
                    <a class="dropdown-item" href="vrijwilligerofstagewerk.php">Vrijwillger of werk/stage</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="voorstellingen.php">Voorstellingen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li>
            <a href=""><button type="button" class="btn btn-outline-light">Inschrijven nieuwsbrief</button></a>
        </li>
    </ul>
</nav>

<header>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4 headerTitel">OverMalbruggen</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>
</header>

<main>

    <div class="voorstellingContent">
        <section class="voorstellingContainer">
            <?php
                $voorstellingNaam = $tempVoorstelling['voorstellingNaam'];
                if ($tempVoorstelling['isActief'] == 1) {
                    echo "<h3 class='centerText'> $voorstellingNaam <span class='badge badge-success'>Actief</span></h3>";
                }
                else {
                echo "<h3 class='centerText'> $voorstellingNaam <span class='badge badge-danger'>Archief</span></h3>";
            }
            ?>

            <section class="voorstellingContainer">
                <div class="text-center">
                    <img class="img-fluid" src="<?php echo $tempVoorstelling['imagePath']?>">
                    <h6><?php echo $tempVoorstelling['voorstellingContent']?></h6>
                </div>

                <div class="container datesContent">
                    <a href="tickets.php"><button type="button" class="btn btn-danger">Tickets</button></a>
                    <h3 class="centerText">Speeltijden</h3>
                    <div class="row text-center">
                        <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ] opvoeringContainer">
                            <ul class="event-list datesContent">

                                <?=$Voorstellingdatum->getVoorstellingDates($voorstellingID)?>

                            </ul>
                        </div>
                    </div>
                    <h3 class="centerText">Prijzen</h3>
                    <h4>Regulier €<?php echo $tempVoorstelling['voorstellingPrijsRegulier']?></h4>

                    <?php if ($tempVoorstelling['voorstellingPrijsCJP'] > 0){
                        echo "<h4>CJP €"; echo $tempVoorstelling['voorstellingPrijsCJP']; echo"</h4>";
                    }
                    ?>

                    <?php if ($tempVoorstelling['voorstellingPrijsGelrepas'] > 0){
                        echo "<h4>Gelrepas €"; echo $tempVoorstelling['voorstellingPrijsGelrepas']; echo"</h4>";
                    }
                    ?>

                </div>
            </section>
        </section>
    </div>

</main>

<footer>
    <?php include "footer.php" ?>
</footer>

</body>

</html>
