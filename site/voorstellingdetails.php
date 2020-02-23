<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        </div>
    </div>
</header>

<main>
    <div class="indexContent">

        <section class="indexIntro">
            <h3 class="centerText">Voorstelling titel <span class="badge badge-danger">Actief</span></h3>
            <h6>Voorstelling content</h6>

            <a href="voorstellingdetails.php"><img src="https://via.placeholder.com/800x300"></a>

            <div class="container datesContent">
                <h3 class="centerText">Speeltijden</h3>
                <div class="row text-center">
                    <div class="[ col-xs-12 col-sm-offset-2 col-sm-8 ] opvoeringContainer">
                        <ul class="event-list datesContent">
                            <li>
                                <time datetime="2014-07-20">
                                    <span class="day">4</span>
                                    <span class="month">Jul</span>
                                    <span class="year">2014</span>
                                    <span class="time">ALL DAY</span>
                                </time>
                                <div class="info">
                                    <h2 class="title">Opvoering 1</h2>
                                    <p class="desc">12.00</p>
                                </div>
                            </li>

                            <li>
                                <time datetime="2014-07-20 0000">
                                    <span class="day">9</span>
                                    <span class="month">Jul</span>
                                    <span class="year">2014</span>
                                    <span class="time">12:00 AM</span>
                                </time>
                                <div class="info">
                                    <h2 class="title">Opvoering 2</h2>
                                    <p class="desc">18.00</p>
                                </div>

                            </li>


                            <li>
                                <time datetime="2014-07-20">
                                    <span class="day">18</span>
                                    <span class="month">Jul</span>
                                    <span class="year">2014</span>
                                    <span class="time">ALL DAY</span>
                                </time>
                                <div class="info">
                                    <h2 class="title">Opvoering 3</h2>
                                    <p class="desc">12.00</p>
                                </div>
                            </li>

                            <li>
                                <time datetime="2014-07-20 0000">
                                    <span class="day">20</span>
                                    <span class="month">Jul</span>
                                    <span class="year">2014</span>
                                    <span class="time">12:00 AM</span>
                                </time>
                                <div class="info">
                                    <h2 class="title">Opvoering 4</h2>
                                    <p class="desc">18.00</p>
                                </div>

                            </li>
                        </ul>
                    </div>
                </div>
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