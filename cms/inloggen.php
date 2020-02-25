    <?php

    include_once('../includes/connection.php');

    session_start();
    $_SESSION['logged_in'] = false;

    print md5('TEST');


    if (isset($_POST['username'], $_POST['password'])) {
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        var_dump($username);
        var_dump($password);
        var_dump( $_SESSION['logged_in']);

        if (empty($username) or empty($password)) {
            $error = 'All fields must be filled in';
        } else {
            $query = $pdo->prepare("SELECT * FROM users WHERE user_name = ? AND user_password = ?");

            $query->bindValue(1, $username);
            $query->bindValue(2, $password);

            $query->execute();

            $num = $query->rowCount();

            if ($num == 1) {
                // user entered correct details
                $_SESSION['logged_in'] = true;
                header('Location: index.php');
                exit();
            } else {
                // user entered false details
                $error = 'Incorrect details';
            }
        }
    }

    if (($_SESSION['logged_in'] == true)) {
        header('Location: index.php');
    }
        ?>


<html lang="nl">
<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="../css/cms.css">

</head>

<body class="inloggenBody">
<div id="login">
    <h3 class="text-center text-white pt-5">Theathergroep Malbruggen CMS</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="" method="post">
                        <h3 class="text-center text">Inloggen</h3>
                        <div class="form-group">
                            <label for="username" class="text">Gebruikersnaam:</label><br>
                            <input type="text" name="username" id="username" placeholder="Gebruikersnaam" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text">Wachtwoord:</label><br>
                            <input type="text" name="password" id="password" placeholder="Wachtwoord" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-outline-danger btn-md" value="Log in">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
