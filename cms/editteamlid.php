<?php

include_once('../includes/connection.php');

session_start();

$editID = $_GET['editID'];

//Verzamel huidige gegevens van teamlid
$stmt = $pdo->prepare("SELECT * FROM team WHERE teamlidID = ?");
$stmt->execute(array($editID));
$tempTeamlid = $stmt->fetch();


//Klik op UPDATE
if (isset($_POST['nw_update'])) {
    $title = $_POST['title'];
    $content = nl2br($_POST['content']);
    $rol = $_POST['teamlidRol'];

    var_dump($title);
    var_dump($content);
    var_dump($rol);

    //Update teamlid
    $query = "UPDATE team SET teamlidNaam = '$title', teamlidOmschrijving = '$content', teamlidRol = '$rol' WHERE teamlidID = $editID";
    $sql = $pdo->prepare($query);
    $sql->execute(array());


    header('Location: team.php');
}
?>

<?php


if (($_SESSION['logged_in'] == true)) {
?>

<html>
<head>
    <title>Candy CMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cms.css">

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
                <a class="nav-link" href="nieuws.php">Voorstellingen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Uitloggen</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">


    <?php if (isset($error)) { ?>
    <small style="color:#aa0000"><?php echo $error; ?>
        <br /><br />
        <?php } ?>
        <main class="addContainer">
            <h2>Pas teamlid aan</h2>
            <form action="" method="post" autocomplete="off"  enctype = "multipart/form-data">
                <div class="form-group">
                    <label for="Titel">Naam</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $tempTeamlid['teamlidNaam'];?>" required id="Titel" placeholder="Naam">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Omschrijving</label>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" required placeholder="Omschrijving" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="teamlidRol">Rol</label>
                    <input type="text" name="teamlidRol" class="form-control" value="<?php echo $tempTeamlid['teamlidRol'];?>" required id="teamlidRol" placeholder="Rol">
                </div>
                <input type="submit" name="nw_update" value="Update teamlid"/>
            </form>
        </main>
</div>

<a href="../index.php" class="backToIndex"><button type="button" class="btn btn-secondary"><< Back to Index</button></a>
</body>
</html>

    <?php
} else {
    header('Location: inloggen.php');
}
?>

