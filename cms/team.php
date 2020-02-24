<?php

include_once('../includes/connection.php');
include_once('../includes/team.php');

session_start();

$team = new Team;

if(isset($_GET['deleteID'])){
    $deleteID = $_GET['deleteID'];

    $query = $pdo->prepare('DELETE FROM team WHERE teamlidID = ?');
    $query->bindValue(1, $deleteID);
    $query->execute();

    header('Location: team.php');
}

$teammember = $team->fetch_all();


?>

<?php

if (($_SESSION['logged_in'] == true)) {
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
            <li class="nav-item active">
                <a class="nav-link" href="team.php">Team</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="nieuws.php">Nieuws</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="voorstellingen.php">Voorstellingen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Uitloggen</a>
            </li>
        </ul>
    </div>
</nav>

<main>
    <section class="cmsContent">
        <h1 class="centerText">Teamleden</h1>
        <p class="centerText">Hier kun je teamleden toevoegen of verwijderen.</p>
        <a href="nieuwteamlid.php"><button type="button" class="btn btn-outline-danger">Nieuw teamlid</button></a>

        <?php foreach ($teammember as $team) { ?>
            <div class="flex-container" id="product1">
                <a class="list-group-item list-group-item-action" data-aos="fade-right" data-aos-anchor=".list-group"><h3><?php echo $team['teamlidNaam']; ?><small> - <?php echo $team['teamlidRol']; ?></small></h3>
                    <p><?php echo $team['teamlidOmschrijving']; ?></p></a>
                <img data-aos="fade-left" data-aos-anchor=".list-group" src="<?php echo $team['imagePath']; ?>">

            </div>
            <a href='team.php?deleteID=<?php echo $team['teamlidID']; ?>'>Verwijder</a>
            <a href='editteamlid.php?editID=<?php echo $team['teamlidID']; ?>'>Pas aan</a>
        <?php } ?>


    </section>

</main>

<footer>

</footer>

</body>

</html>

    <?php
} else {
    header('Location: inloggen.php');
}
?>

