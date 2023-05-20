<?php
require_once("./include/bd.php");
ob_start('ob_gzhandler');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="#">
    <title>Movie</title>
    <!-- CSS -->
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/movie.css">
    <!-- JAVASCRIPT -->
    <script src="./js/search.js" defer></script>
    <script src="./js/movie.js" defer></script>
    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/9a09d189de.js" crossorigin="anonymous"></script>

</head>

<body>
    <?php require_once('./include/header.php') ?>
    <main>
        <div id="container">
            <div id="button"></div>
            <div id="film">
                <h4 id="titleGenres"></h4>
                <div id="filmGenres"></div>
            </div>
            <div id="filmPopular">
                <h4 id="titlePopular"></h4>
                <div id="filmPopularList"></div>
            </div>
            <div id="filmUpcoming">
                <h4 id="titleUpcoming"></h4>
                <div id="filmUpcomingList"></div>
            </div>
            <div id="topRatedFilm">
                <h4 id="titleToprated"></h4>
                <div id="topRatedFilmList"></div>
            </div>
        </div>

    </main>
</body>

</html>