<?php
require_once("config.php");
ob_start('ob_gzhandler');

if (isset($_SESSION['id'])) {
    header('Location: index.php');
}

?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="connexion.js" defer></script>
    <title>Connexion</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/e1a1b68f9b.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once('header.php') ?>
    <main>
        <h1>Connexion</h1>

        <form id="login" method="post">

            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" /><br>

            <label class="form-label" for="password">Mot de passe</label><br>
            <input type="password" id="password" name="password" /><br>

            <p id="message"></p>

            <input type="submit" name="Envoyer">


        </form>
        <?php
        if (isset($_POST['Envoyer'])) {
            $email = htmlspecialchars($_POST['email']);
            $password = $_POST['password'];

            $recupUser = $bdd->prepare("SELECT * FROM users WHERE email = ?");
            $recupUser->execute([$email]);
            $result = $recupUser->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                $passwordHash = $result['password'];
                if ($recupUser->rowCount() > 0 && password_verify($password, $passwordHash)) {
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION = $result;
                    header("Location: index.php");
                }
            }
        }
        ?>

    </main>
</body>

</html>