<header>

    <nav>
        <a href="http://localhost/cinetech/index.php"><i id="home" class="fa-solid fa-house fa-beat" style="color: #ffffff;"></i></a>

        <?php if (!isset($_SESSION['id'])) { ?>
            <a class='nava' href="inscription.php">Inscription</a>
            <a class='nava' href="connexion.php">Connexion</a>
        <?php } else { ?>
            <span class="welcome">Welcome <?= $_SESSION['prenom'] ?></span>;
            <a class='nava' href="deconnexion.php">Deconnexion</a>

        <?php } ?>
        <div>
            <form method="GET">
                <input class="searchBar" type="text" id="search-bar" name="search" placeholder="Rechercher...">
            </form>
            <div id="result"></div>
        </div>
    </nav>
</header>