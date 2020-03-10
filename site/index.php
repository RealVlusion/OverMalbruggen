<?php

include_once('../includes/connection.php');
include_once('../includes/nieuwsartikel.php');

$nieuwsartikel = new Nieuwsartikel;

$nieuwsartikels = $nieuwsartikel->fetch_all();

?>

<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OverMalbruggen | Home</title>

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
            <p class="lead">Theatergroep</p>
        </div>
    </div>
</header>

<main>
    <div class="indexContent">
    <section class="indexCarousel">
        <div id="carousel-example-1z" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-1z" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-1z" data-slide-to="1"></li>
                <li data-target="#carousel-example-1z" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">

                <div class="carousel-item item active">
                    <a href="https://www.levelswebdesign.nl/Portfolio/Secu/index.php">
                        <img class="d-block w-100" src="https://via.placeholder.com/150C/O https://placeholder.com/"
                             alt="First slide">
                </div>
                </a>


                <div class="carousel-item item">
                    <a href="https://www.levelswebdesign.nl/Portfolio/JansenExclusive/index.php">
                        <img class="d-block w-100" src="https://via.placeholder.com/150C/O https://placeholder.com/"
                             alt="Second slide">
                </div>
                </a>
                <div class="carousel-item item">
                    <img class="d-block w-100" src="https://via.placeholder.com/150C/O https://placeholder.com/"
                         alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-example-1z" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-example-1z" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </section>

    <section class="indexIntro">
        <h1 class="centerText">Welkom</h1>
        <h6>Welkom op de website van theater OverMalbruggen. Wij zijn de theatergroep in Malburgen te Arnhem die bedoeld is om elkaar te ontmoeten,
            met mensen met verschillende (culturele) achtergronden te verbinden en elkaars verhaal leren kennen en natuurlijk een hoop lol te maken samen!</h6>
    </section>

        <section class="indexNieuws">
            <h1 class="centerText">Nieuws</h1>
            <section class="flexContainer" >


                <?php foreach ($nieuwsartikels as $nieuwsartikel) { ?>
                    <section class="flexItem">
                        <div class="candy_content">
                            <div class="candyText">
                                <img class="card-img-top" src="<?php echo $nieuwsartikel['imagePath']; ?>" alt="<?php echo $nieuwsartikel['nieuwsTitel']; ?>">
                                <h5><?php echo $nieuwsartikel['nieuwsTitel']; ?></h5>
                                <p><?php echo substr($nieuwsartikel['nieuwsContent'], 0, 170);?> ...</p></a>
                                <a href='nieuwsartikel.php?artikelID=<?php echo $nieuwsartikel['nieuwsID']; ?>'>Bekijk</a>
                            </div>
                        </div>
                    </section>
                <?php } ?>


            </section>
        </section>
    </section>

    </div>
</main>

<footer>
    <?php include "footer.php"?>
</footer>

</body>

</html>
