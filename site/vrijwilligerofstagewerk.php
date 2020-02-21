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
            <li class="nav-item dropdown">
                <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
            <p class="lead">Vrijwilliger of werk/stage.</p>
        </div>
    </div>
</header>

<main class="ticketBody">
    <div class="indexContent">

        <section class="meedoenSection">
            <div class="col">
                <h2 class="centerText">Als vrijwilliger of stage/werk?</h2>
                <h6>Wil je helpen met het productie proces, les komen geven in een kunstzinnige disipline zoals dans of muziek, tijdens de voorstellingen achter de bar staan? Voor de spelers koken? Helpen met licht en geluid? Kostuums? En ga zo maar door…!?</h6>

                <h6>Theater OverMalbruggen heeft altijd mensen nodig die het leuk vinden een steentje bij te dragen en achter onze Missie en Visie staan. Dus ben je op zoek naar vrijwilligerswerk, een stage of werkervaringsplek mail dan vooral even naar: info@overmalbruggen.nl<br>
        </section>

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