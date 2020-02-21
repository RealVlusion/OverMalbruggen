<?php

include_once('../includes/connection.php');

if (isset($_POST['title'], $_POST['content'])) {
    $teamlidNaam = $_POST['title'];
    $teamlidOmschrijving = nl2br($_POST['content']);
    $teamlidRol = $_POST['teamlidRol'];

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
            $errors[]='File size must be excately 2 MB';
        }

        if(empty($errors)==true) {
            $image_path = "uploads/".$file_name;
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

<html>
<head>
    <title>Candy CMS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cms.css">

</head>

<body>

<!--Navbar-->
<nav class="navbar navbar-expand-sm bg-success navbar-dark">
    <a class="navbar-brand" href="cmsindex.php">Candy CMS</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="add.php">Add Candy</a>
            <a class="nav-item nav-link" href="delete.php">Delete Candy</a>
            <a class="nav-item nav-link" href="logout.php">Logout</a>
        </div>
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

<a href="../index.php" class="backToIndex"><button type="button" class="btn btn-secondary"><< Back to Index</button></a>
</body>
</html>
