<?php

require_once("../controller/FrontController.php");

session_start();

?>

<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>Signin</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/cover.css" rel="stylesheet">
    </head>

    <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">BLOG'BUSTER</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a class="nav-link" href="home.php">Home</a>
                    <a class="nav-link" href="login.php">Sign In</a>
                    <a class="nav-link active" href="signin.php">Sign Up</a>
                </nav>
            </div>
        </header>
        <div class="btn-block">
            <form method="post" class="form-signin">
                <img class="mb-4" src="../../assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
                <h1 class="h3 mb-3 font-weight-normal">Please sign up</h1><br>
                <input id="inputPseudo" class="form-control" name="login" placeholder="Pseudo" required="" autofocus="" type="text">
                <label class="mastfoot mt-auto">Votre pseudonyme ne doit pas contenir de caractères spéciaux.</label>
                <br/>
                <input id="inputPassword" class="form-control" name="motdepasse" placeholder="Password" required="" type="password">
                <br/><br/>
                <button class="btn btn-lg btn-secondary btn-block" type="submit">Sign up</button>
            </form>
            <?php
                    if(isset($_POST['login']) && isset($_POST['motdepasse'])) {
                        $front = new FrontController("inscription");
                    }
                    if(isset($Error)){
                        echo $Error;
                    }
            ?>
        </div>
        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Made by Alexandre Bouvard & Baptiste Chazeix</p>
            </div>
        </footer>
    </div>


    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    </body>
</html>
