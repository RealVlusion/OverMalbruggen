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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
    <link rel="stylesheet" type="text/css" href="../css/voorstelling.css">



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
            <h1 class="display-4">OverMalbruggen</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>
</header>

<main>

        <section class="voorstellingContainer">
            <?php
                $voorstellingNaam = $tempVoorstelling['voorstellingNaam'];
                if ($tempVoorstelling['isActief'] == 1) {
                    echo "<h3 class='centerText'> $voorstellingNaam <span class='badge badge-danger'>Actief</span></h3>";
                }
                else {
                echo "<h3 class='centerText'> $voorstellingNaam <span class='badge badge-danger'>Archief</span></h3>";
            }
            ?>

            <section class="voorstellingContainer">
                <div class="text-center">
                    <img src="<?php echo $tempVoorstelling['imagePath']?>">
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
                </div>
            </section>
        </section>

</main>

<footer>
    <?php include "footer.php" ?>
</footer>

</body>

</html>
