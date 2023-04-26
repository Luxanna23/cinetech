<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="#">
    <title>Cinetech</title>
    <script src="script.js" defer></script>
    <script src="autocompletion.js" defer></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/e1a1b68f9b.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    require_once("config.php");
    require_once('header.php'); ?>
    <main>
        <h3>Commentaires</h3>
        <form method="POST">
            <textarea name="comm" placeholder="Ecrire un commentaires"></textarea><br>
            <input type="submit" name="submitComm" value="Envoyer">
        </form>
        <?php
        if (isset($_POST["submitComm"])) {
            if (!isset($_SESSION['id'])) {
                echo "Vous devez vous connecter pour laisser un commentaire";
            } else {
                $date = date('Y-m-d');
                date_default_timezone_set('Europe/Paris');
                $insertComm = $bdd->prepare("INSERT INTO `commentaires`(`comment`, `id_user`, `date`) VALUES(?,?,?)");
                $insertComm->execute([$_POST["comm"], $_SESSION['id'], $date]);
                header("Location:commentaire.php");
            }
        }
        $afficheComm = $bdd->prepare("SELECT * FROM commentaires INNER JOIN users WHERE commentaires.id_user = users.id");
        $afficheComm->execute();
        ?>
        <?php foreach ($afficheComm as $key => $value) { ?> 
        <div class="pagecomm">
            <i id="pcomm" class="fa-solid fa-user" style="color: #ffffff;"></i><span class='cuser'><?php echo $value['prenom'] ?></span>
            <span class='cdate'><?php $str = explode("-", $value['date']); echo $str[2] . " / " . $str[1] . " / " . $str[0];?></span><br>
            <p class='comm'><?php echo $value['comment']; ?></p>
        </div>
        <?php } ?>
    </main>
</body>

</html>