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
    <title>OverMalbruggen | Over ons</title>

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

            <h2 class="centerText">De kracht van theater</h2>
            <p>Culturele activiteiten kunnen uitkomst bieden bij deze problemen omdat zij ”de ander” op een niet bedreigende manier kunnen tonen. Theater kan de mens achter een ogenschijnlijk
                vreemd of soms ”eng” masker laten zien en doordat mensen elkaars verhaal zo kunnen horen kunnen nieuwe perspectieven en meer begrip voor mensen met
                een andere (migratie) achtergrond ontstaan waardoor nieuwe verbindingen tot stand kunnen komen tussen mensen als ook meer zelfvertrouwen en eigenwaarde.
                Zo kan theater uitdragen, veranderde invalshoeken bieden, mensen bij elkaar brengen, tegenstellingen laten zien maar  tegelijk een verbindende factor vormen door stereotypen te
                doorbreken en zo meer begrip kweken. Ook muziek en dans kunnen communicatie bewerkstelligen zonder taalbarrières tussen mensen met verschillende culturele achtergronden.</p>
            <hr>

            <h2 class="centerText">Wat doet theater OverMalbruggen</h2>
            <p>Theater OverMalbruggen wil deze kracht van theater om ontmoetingen en verbindingen tussen mensen te bewerkstelligen en meer begrip voor elkaar te krijgen, gebruiken.
                In vijf maanden werken deelnemers uit Arnhem-Zuid van 16-80 jaar en van verscheidene afkomsten, genders, seksuele oriëntaties, sociaaleconomische afkomsten etc in wekelijkse workshops samen om een toneelvoorstelling te realiseren. Wekelijks leren zij elkaar kennen, ontmoeten ze elkaar en tonen in hun voorstelling de rijkdom aan verhalen van de wijk, Arnhem en omstreken om zo meer begrip te kweken onder het publiek.
                Zoals in de naam van deze theatergroep gevangen zit; het is theater over Malburgen maar ook een project dat verschillen tussen wijkbewoners moet overbruggen.</p>
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
                            <img data-aos="fade-left" data-aos-anchor=".list-group" src="<?php echo $team['imagePath']; ?>">

                        </div>

                    <?php } ?>
                </div>
        </section>
        <h2 class="centerText">Onze Sponsors</h2>
        <div class="row text-center text-lg-left">

            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-20">
                    <img class="img-fluid" src="https://overmalbruggen.nl/wp-content/uploads/2020/02/leefbaarheid-gelderland-logo.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid" src="https://overmalbruggen.nl/wp-content/uploads/2020/02/73504677_586161155456564_4124457532435464192_o.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid" src="https://overmalbruggen.nl/wp-content/uploads/2020/02/vsb4-1024x810.jpg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid" src="https://overmalbruggen.nl/wp-content/uploads/2020/02/Logo-Wijkplatform-Malburgen-e1581951909906-226x300.jpg" alt=""><figcaption class="figure-caption text-right">Malburgen Oost</figcaption>
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid" src="https://overmalbruggen.nl/wp-content/uploads/2020/02/uitnacht-arnhem.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid" src="https://overmalbruggen.nl/wp-content/uploads/2020/02/logo-bruishuis.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid" src="http://overmalbruggen.nl/wp-content/uploads/2020/02/Ruimtekoers-e1581952276925.png" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid" src="../img/sponsors/huis.jpg" alt=""><figcaption class="figure-caption text-right">Huis voor de Wijk</figcaption>
                </a>
            </div>
        </div>

    </div>


</main>

<footer>
    <?php include "footer.php"?>
</footer>

</body>

</html>
