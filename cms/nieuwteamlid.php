<?php

include_once('../includes/connection.php');

session_start();

if (isset($_POST['title'], $_POST['content'])) {
    $teamlidNaam = $_POST['title'];
    $teamlidOmschrijving = nl2br($_POST['content']);
    $teamlidRol = $_POST['teamlidRol'];

    //Image processing

    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));

    $extensions= array("jpeg","jpg","png");

    if (empty($teamlidNaam) or empty($teamlidOmschrijving) or empty($teamlidRol)) {
        $error = "Je moet alle velden invullen.";
    } else {

        if(in_array($file_ext,$extensions)=== false){
            $errors[]="extension not allowed, please choose a JPEG or PNG file.";
        }

        if($file_size > 2097152) {
            $errors[]='Het bestand mag niet groter zijn dan 2MB';
        }

        if(empty($errors)==true) {
            $image_path = "../uploads/".$file_name;
            move_uploaded_file($file_tmp,$image_path);
            echo "Success";
        }else{
            print_r($errors);
        }


        $query = $pdo->prepare('INSERT INTO team (teamlidNaam, teamlidOmschrijving, teamlidRol, imagePath) VALUES(?, ?, ?, ?)');

        $query->bindValue(1, $teamlidNaam);
        $query->bindValue(2, $teamlidOmschrijving);
        $query->bindValue(3, $teamlidRol);
        $query->bindValue(4, $image_path);

        $query->execute();

        header('Location: team.php');
    }
}
?>

<!--    Page Front-End-->

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
                <a class="nav-link" href="fotos.php">Foto's</a>
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
            <h2>Voeg teamlid toe</h2>
            <form action="" method="post" autocomplete="off"  enctype = "multipart/form-data">
                <div class="form-group">
                    <label for="Titel">Naam</label>
                    <input type="text" name="title" class="form-control" required id="Titel" placeholder="Naam">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Omschrijving</label>
                    <textarea class="form-control" name="content" id="exampleFormControlTextarea1" required placeholder="Omschrijving" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="teamlidRol">Rol</label>
                    <input type="text" name="teamlidRol" class="form-control" required id="teamlidRol" placeholder="Rol">
                </div>
                <div class="form-group">
                    <input required type = "file" name = "image" />
                </div>

                <button type="submit" class="btn btn-outline-danger">Voeg toe</button>
            </form>
        </main>
</div>
</body>
</html>

    <?php
} else {
    header('Location: inloggen.php');
}
?>

