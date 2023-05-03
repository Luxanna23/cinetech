<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" href="#">
    <title>Cinetech</title>
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
            <textarea name="comm" placeholder="Ecrire un commentaire..."></textarea><br>
            <input type="hidden" name="id_parent" value="<?php echo $value['id']; ?>">
            <input type="submit" name="submitComm" value="Envoyer">
        </form>
        <?php
        
        //var_dump( $POST['id_parent']);
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
        // $afficheComm = $bdd->prepare("SELECT * FROM commentaires INNER JOIN users WHERE commentaires.id_user = users.id ORDER BY date DESC");
        // $afficheComm->execute();
        
        $afficheComm = $bdd->prepare("SELECT c1.*, u1.prenom AS prenom, (SELECT COUNT(*) FROM commentaires c2 WHERE c2.id_parent = c1.id) AS nb_replies, (SELECT u2.prenom FROM commentaires c3 INNER JOIN users u2 ON c3.id_user = u2.id WHERE c3.id = c1.id_parent) AS reply_to FROM commentaires c1 INNER JOIN users u1 ON c1.id_user = u1.id WHERE c1.id_parent IS NULL ORDER BY c1.date DESC");
        $afficheComm->execute();
        $a=0;
        ?>

        
        <?php foreach ($afficheComm as $key => $value) { ?>
            <div class="pagecomm">
                <i id="pcomm" class="fa-solid fa-user" style="color: #ffffff;"></i><span class='cuser'><?php echo $value['prenom'] ?></span>
                <span class='cdate'><?php $str = explode("-", $value['date']);
                                    echo $str[2] . " / " . $str[1] . " / " . $str[0]; ?></span><br>
                <p class='comm'><?php echo $value['comment']; ?></p>
                <a href="#" class="btn-reply" data-comment-id="<?php echo $value['id']; ?>" id="areply">Répondre</a>
                

                <?php
                $replies = $bdd->prepare("SELECT * FROM commentaires INNER JOIN users WHERE commentaires.id_user = users.id AND id_parent = ?");
                $replies->execute([$value['id']]);
                $a = $value['id'];
                var_dump($a);
                $nb_replies = 0;
                foreach ($replies as $reply) {
                    $nb_replies++;
                ?>
                <span class="reply-count"><?php echo $nb_replies; ?> réponse(s)</span>
                <div id="reply<?php echo $value['id']; ?>" style="display:none"></div>
                    <div class="reply">
                        <i id="pcomm" class="fa-solid fa-user"></i><span class='cuser'><?php echo $reply['prenom']; ?></span>
                        <span class="cdate"><?php echo date_format(date_create($reply['date']), 'd/m/Y'); ?></span><br>
                        <p class="reply-text"><?php echo $reply['comment']; ?></p>
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    </main>
</body>

</html>
<script>
    let reply = document.querySelector(".reply");
    let all = document.querySelectorAll(".btn-reply");
    console.log(all);
    all.forEach(element => {
        element.addEventListener("click", () => {
            const clickedReply = document.getElementById('reply'+element.getAttribute('data-comment-id'));
            console.log(clickedReply)
            if(clickedReply){
                clickedReply.style.display = 'block';
                clickedReply.innerHTML = '<form method="POST"><textarea class="commreply" name="reply" placeholder="Répondre au commentaire..."></textarea><input type="submit" name="submitReply" value="Envoyer"></form><br>';
            }
        });

    })
</script>
<?php
if (isset($_POST["submitReply"])) {
    if (!isset($_SESSION['id'])) {
        echo "Vous devez vous connecter pour répondre à ce commentaire";
    } else {
        $date = date('Y-m-d');
        date_default_timezone_set('Europe/Paris');
        $insertReply = $bdd->prepare("INSERT INTO `commentaires`(`comment`, `id_user`, `date`, `id_parent`, `id_film`) VALUES(?,?,?,?,?)");
        $insertReply->execute([$_POST["reply"], $_SESSION['id'], $date, $value['id'],0]);
        //header("Location:commentaire.php");
    }
}
?>