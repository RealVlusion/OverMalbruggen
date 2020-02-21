<?php

include_once('../includes/connection.php');
include_once('../includes/team.php');

$team = new Team;
$teammember = $team->fetch_all();

?>

<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--imports-->
    <script type="text/javascript" src="//code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/styles.css">

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
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="overons.php">Over</a>
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
                    <a class="dropdown-item" href="#">Wekelijkse workshops</a>
                    <a class="dropdown-item" href="#">Vrijwillger of stage/werk</a>
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
</nav>

<header>
    <div class="jumbotron jumbotron-fluid text-center">
        <div class="container">
            <h1 class="display-4">OverMalbruggen</h1>
            <p class="lead">Theatergroep</p>
        </div>
    </div>
</header>

<main>
    <div class="indexContent">

        <section class="overOnsContainer">
            <h2 class="centerText">Over ons</h2>

            <hr>

            <h2 class="centerText">Missie & Visie</h2>
            <p>In de huidige samenleving trekken veel mensen zich terug in hun eigen huis of eigen (culturele) groep; ze kennen hun buren niet of zijn zelfs bang voor mensen met een
                andere culturele achtergrond. Ook in Malburgen, de wijk waarin mensen van de grootste
                verscheidenheid aan culturen van alle wijken in Arnhem wonen, ontbreekt een sterke sociale cohesie en er veel eenzaamheid, voornamelijk onder ouderen.</p>
            <hr>
        </section>

        <section class="teamContainer">
            <div class="voorWieContent">
                <h2 class="centerText">Ons Team</h2>

                <div class="list-group left">

                    <?php foreach ($teammember as $team) { ?>
                        <div class="flex-container" id="product1">
                            <a class="list-group-item list-group-item-action" data-aos="fade-right" data-aos-anchor=".list-group"><h3><?php echo $team['teamlidNaam']; ?><small> - <?php echo $team['teamlidRol']; ?></small></h3>
                                <p><?php echo $team['teamlidOmschrijving']; ?></p></a>
                            <img data-aos="fade-left" data-aos-anchor=".list-group" src="https://via.placeholder.com/150">

                        </div>

                    <?php } ?>
                </div>
        </section>

        <section class="sponsorContainer">
            <h2 class="centerText">Onze Sponsors</h2>
            <div class="sponsorsFlexBox">
                <img class="sponsorItem" src="../img/sponsors/geniet.png" alt="Example image">
                <img class="sponsorItem" src="../img/sponsors/huisvoordewijk.jpg" alt="Example image">
                <img class="sponsorItem" src="../img/sponsors/leefbaarheid-gelderland-logo.jpg" alt="Example image">
                <img class="sponsorItem" src="../img/sponsors/ruimtekoers.png" alt="Example image">
                <img class="sponsorItem" src="../img/sponsors/uitnacht.png" alt="Example image">
                <img class="sponsorItem" src="../img/sponsors/vsbfonds.jpg" alt="Example image">
                <img class="sponsorItem" src="../img/sponsors/wijkplatform.jpg" alt="Example image">
                <img class="sponsorItem" src="../img/sponsors/zfonds.jpg" alt="Example image">
            </div>
        </section>

    </div>


</main>

<footer>
    <?php include "footer.php"?>
</footer>

</body>

</html>