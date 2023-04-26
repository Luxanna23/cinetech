<?php
require_once("config.php");
ob_start('ob_gzhandler');

if (isset($_SESSION['id'])) {
    header('Location: index.php');
}

if (isset($_POST['Envoyer'])) {
    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $password2 = $_POST['password2'];
    $insertUser = $bdd->prepare("INSERT INTO `users` (`prenom`, `nom`, `email`, `password`)VALUES(?,?,?,?)");
    $insertUser->execute([$prenom, $nom, $email, $passwordHash]);
    header("Location: connexion.php");
}

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="inscription.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/e1a1b68f9b.js" crossorigin="anonymous"></script>
</head>

<body>
<?php require_once('header.php') ?>

    <main>
        <h1>Inscription</h1>

        <form method="post" id="signup">

            <label for="prenom">Prenom</label><br>
            <input type="text" id="prenom" name="prenom" /><br>

            <label for="nom">Nom</label><br>
            <input type="text" id="nom" name="nom" /><br>

            <label for="email">Email</label><br>
            <input type="email" id="email" name="email" /><br>


            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" /><br>


            <label for="password2">Confirm your password</label><br>
            <input type="password" id="password2" name="password2" /><br>

            <input type="submit" name="Envoyer" id="button">

        </form>
    </main>

</body>

</html>