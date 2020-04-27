<?php

include_once('../includes/connection.php');

session_start();

if (isset($_POST['submit'])) {
    echo 'test';

// Aantal foto's in de upload array
        $total = count($_FILES['upload']['name']);
        var_dump($total);

// Loop door elke file heen
        for( $i=0 ; $i < $total ; $i++ ) {

            //Get the temp file path
            $tmpFilePath = $_FILES['upload']['tmp_name'][$i];

            //Make sure we have a file path
            if ($tmpFilePath != ""){
                //Setup our new file path
                $newFilePath = "../uploads/" . $_FILES['upload']['name'][$i];

                //Upload the file into the temp dir
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {

                    try{
                        //Handle other code here
                        $query = $pdo->prepare('INSERT INTO galleryimage (galleryPath) VALUES(?)');

                        $query->bindValue(1, $newFilePath);


//        INSERT DE FOTO'S
                        $query->execute();
                    }

                    catch (PDOException $e){
                        print $e;
                    }
                }
            }
        }

        header('Location: fotos.php');

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
                <li class="nav-item">
                    <a class="nav-link" href="team.php">Team</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="nieuws.php">Nieuws</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="voorstellingen.php">Voorstellingen</a>
                </li>
                <li class="nav-item active">
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
                <h2>Voeg een foto toe</h2>
                <form action="" method="post" autocomplete="off"  enctype = "multipart/form-data">
                    <div class="form-group">
                        <label for="files">Select files:</label>
                        <input name="upload[]" type="file" multiple="multiple" />
                    </div>

                    <button type="submit"  name="submit" class="btn btn-outline-danger">Voeg toe</button>
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

