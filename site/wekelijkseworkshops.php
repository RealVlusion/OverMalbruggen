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
                <a class="nav-link" href="overons.php">Over</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nieuws.php">Nieuws</a>
            </li>
            <li class="nav-item active dropdown">
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
            <p class="lead">Wekelijkse workshops.</p>
        </div>
    </div>
</header>

<main class="ticketBody">
    <div class="indexContent">

        <section class="meedoenSection">
            <div class="col">

                <h5>Wat leuk dat je definitief mee wil doen met Theater OverMalbruggen! De wekelijkse workshops zijn weer van start gegaan in september. Je betaald altijd voor 5 maanden workshops (of de resterende maanden tot de uitvoering). Deze reeks duurt t/m januari waarin de voorstelling wordt opgevoerd. Wij kijken er naar uit.</h5>
                <h5>Iedere week op:</h5>
                <h5>-Donderdagavond om 19:30-21:30 (Mocht je echter graag mee willen doen maar kan je niet op donderdag, mail dan naar: info@overmalbruggen.nl, bij genoeg mensen starten we wellicht een nieuwe groep op!)</h5>

                <h5>Locatie: Het Huis voor de Wijk (Eimerssingel Oost 266 in Arnhem)</h5><br>
                <h5>Kosten: 12,50 euro per maand (inclusief btw) of 1,25 euro (inclusief btw) indien in bezit van een GelrePas (over hoe te betalen zullen wij u in de mail die u aan de hand van deze inschrijving ontvangt verder infomeren)</h5>

                <br>
                <h5><strong>LET WEL OP!</strong> Wij willen dat Theater OverMalbruggen voor iedereen toegankelijk is dus kunt u echt niks missen in de maand, laat het ons dan weten in het OPMERKINGEN veld, we zoeken graag een oplossing! Ook als u buiten Arnhem-Zuid woont of net niet in de leeftijdscatagorie valt!<br>
        </section>

        <div class="ticketContainer">
            <section class="ticketForm">
                <form  action="workshopprocess.php" method="POST">
                    <h2 class="formTitel">Inschrijven wekelijkse workshops</h2>
                    <h6>Om contact op te nemen kunt u het contactforumulier hieronder invullen. Wij proberen uw vraag/opmerking binnen 24h te behandelen.</h6>

                    <div class="form-group">
                        <label for="voornaam">Naam*</label>
                        <input type="text" class="form-control" name="naam" id="naam" placeholder="Naam*">
                    </div>
                    <div class="form-group">
                        <label for="email">E-mailadres*</label>
                        <input type="email" class="form-control" name="email" required id="email" placeholder="E-mail*">
                    </div>
                    <div class="form-group">
                        <label for="telefoon">Telefoonnummer</label>
                        <input type="numeric" class="form-control" name="telefoon" required id="telefoon" placeholder="Telefoonnummer">
                    </div>
                    <div class="form-group">
                        <label for="straatPlusHuisnummer">Straat + huisnr</label>
                        <input type="text" class="form-control" required name="straatPlusHuisnummer" id="straatPlusHuisnummer" placeholder="Straat huisnummer">
                    </div>
                    <div class="form-group">
                        <label for="postcode">Postcode</label>
                        <input type="text" class="form-control" required name="postcode" id="postcode" placeholder="Postcode">
                    </div>
                    <div class="form-group">
                        <label for="woonplaats">Woonplaats</label>
                        <input type="text" class="form-control" required name="woonplaats" id="woonplaats" placeholder="Woonplaats">
                    </div>
                    <p>Hoe wil je betalen?</p>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="betaalMethode" id="exampleRadios1" value="Ik betaal 12,50 euro per maand" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Ik betaal 12,50 euro per maand
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="betaalMethode" id="exampleRadios2" value="Ik heb een GelrePas dus betaal 1,25 euro per maand">
                        <label class="form-check-label" for="exampleRadios2">
                            Ik heb een GelrePas dus betaal 1,25 euro per maand
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="betaalMethode" id="exampleRadios2" value="Ik betaal in één keer 62,50 euro (voor 5 maanden workshops)">
                        <label class="form-check-label" for="exampleRadios2">
                            Ik betaal in één keer 62,50 euro (voor 5 maanden workshops)
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="betaalMethode" id="exampleRadios2" value="Ik betaal met mijn GelrePas in één keer 6,25 euro (voor 5 maanden workshops)">
                        <label class="form-check-label" for="exampleRadios2">
                            Ik betaal met mijn GelrePas in één keer 6,25 euro (voor 5 maanden workshops)
                        </label>
                    </div>
                    <div class="form-group">
                        <label for="opmerking">Heb je nog opmerkingen?<br> (graag Gelrepas-nummer invoeren indien van toepassing)
                        </label>
                        <textarea class="form-control" placeholder="Opmerking" name="opmerking" required id="opmerking" rows="3"></textarea>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="privacyVerklaring">
                        <label class="form-check-label" for="privacyVerklaring">
                            Hierbij accepteer ik de algemene voorwaarden en privacyverklaring
                        </label>
                    </div>
                    <br>
                    <button type="submit" value="Send" class="btn btn-outline-light">Verstuur</button>
                </form>
                <hr>

            </section>
        </div>
    </div>
    </div>
    </div>

    </div>
</main>

<footer>
    <?php include "footer.php"?>
</footer>

</body>

</html>
