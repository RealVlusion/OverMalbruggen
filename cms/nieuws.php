<?php

include_once('../includes/connection.php');
include_once('../includes/nieuwsartikel.php');

session_start();

$nieuwsartikel = new Nieuwsartikel;

if(isset($_GET['deleteID'])){
    $deleteID = $_GET['deleteID'];

    $query = $pdo->prepare('DELETE FROM nieuws WHERE nieuwsID = ?');
    $query->bindValue(1, $deleteID);
    $query->execute();

    header('Location: nieuws.php');
}

//if(isset($_GET['editID'])){
//    $editID = $_GET['editID'];
//
//    $query = $pdo->prepare('DELETE FROM nieuws WHERE nieuwsID = ?');
//    $query->bindValue(1, $editID);
//    $query->execute();
//
//    header('Location: nieuws.php');
//}

$nieuwsartikels = $nieuwsartikel->fetch_all();

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
            <li class="nav-item">
                <a class="nav-link" href="team.php">Team</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="nieuws.php">Nieuws</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="voorstellingen.php">Voorstellingen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="fotos.php">Foto's</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Uitloggen</a>
            </li>
        </ul>
    </div>
</nav>

<main>
    <section class="cmsContent">
        <h1 class="centerText">Nieuws</h1>
        <p class="centerText">Hier kun je een nieuwsartikel toevoegen of verwijderen.</p>
        <a href="nieuwartikel.php"> <button type="button" class="btn btn-outline-danger">Nieuw artikel</button></a>
        <section class="indexNieuws">
            <section class="flexContainer" >

                <?php $reversednieuwsartikels = array_reverse($nieuwsartikels);?>

                <?php foreach ($reversednieuwsartikels as $nieuwsartikel) { ?>
                    <section class="flexItem">
                        <div class="candy_content">
                        <div class="candyText">
                            <img class="card-img-top" src="<?php echo $nieuwsartikel['imagePath']; ?>" alt="<?php echo $nieuwsartikel['nieuwsTitel']; ?>">
                            <h5><?php echo $nieuwsartikel['nieuwsTitel']; ?></h5>
                            <p><?php echo substr($nieuwsartikel['nieuwsContent'], 0, 170);?> ...</p></a>

                            <!--Verwijder het artikel-->
                            <a href='nieuws.php?deleteID=<?php echo $nieuwsartikel['nieuwsID']; ?>'>Verwijder</a>
                            <a href='editartikel.php?editID=<?php echo $nieuwsartikel['nieuwsID']; ?>'>Pas aan</a>

                        </div>
                        </div>
                    </section>
                <?php } ?>


            </section>
        </section>
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

