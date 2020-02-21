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

    <link rel="stylesheet" type="text/css" href="../css/cms.css">

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

<main>
    <!--Voorstellingen-->
    <section class="voorstellingContainer">
        <h3 class="centerText">Voorstellingen <span class="badge badge-danger">Actief</span></h3>
        <h6 class="centerText">Hieronder staan al onze voorstellingen</h6>

        <div class="text-center">
            <h3>Voorstelling 1</h3>
            <a href="voorstelling1.php"><img src="https://via.placeholder.com/800x300"></a>
        </div>

        <div class="text-center">
            <h3>Voorstelling 2</h3>
            <a href="voorstelling1.php"><img src="https://via.placeholder.com/800x300"></a>
        </div>

        <br>
        <h3 class="centerText">Voorstellingen <span class="badge badge-danger">Archief</span></h3>

        <div class="text-center">
            <h3>Voorstelling 1</h3>
            <a href="voorstelling1.php"><img src="https://via.placeholder.com/800x300"></a>
        </div>

        <div class="text-center">
            <h3>Voorstelling 2</h3>
            <a href="voorstelling1.php"><img src="https://via.placeholder.com/800x300"></a>
        </div>
    </section>

</main>

<footer>

</footer>

</body>

</html>