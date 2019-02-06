<?php

if (!(session_status() == PHP_SESSION_ACTIVE)) {
    session_start();
}
require_once("../controller/FrontController.php");

?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Add Commentary</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/signin.css" rel="stylesheet">
    <link href="css/cover.css" rel="stylesheet">
</head>

<body class="text-center">
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
        <div class="inner">
            <h3 class="masthead-brand">BLOG'BUSTER</h3>
            <nav class="nav nav-masthead justify-content-center">
                <?php
                if(isset($_SESSION['login'])){
                    echo '
                            <a class="nav-link active" href="home.php">Home</a>
                            <a class="nav-link" href="logout.php">Sign Out</a>
                            <a class="nav-link" href="addNews.php">Add News</a>';
                }
                else{
                    echo '
                            <a class="nav-link active" href="home.php">Home</a>
                            <a class="nav-link" href="login.php">Log In</a>
                            <a class="nav-link" href="signin.php">Sign In</a>';
                }
                ?>
            </nav>
        </div>
    </header>
    <div class="btn-block">
        <form method="post" class="form-signin">
            <h1 class="h3 mb-3 font-weight-normal">Commentary</h1><br>
            <?php if(isset($_SESSION['login'])){?>
            <input class="form-control" name="pseudo" value="<?php echo $_SESSION['login']?>" required="" type="text" maxlength="50">
            <br/>
            <?php } elseif(isset($_SESSION['loginVisit'])){?>
            <input class="form-control" name="pseudo" value="<?php echo $_SESSION['loginVisit']?>" placeholder="Pseudo" required="" type="text" maxlength="50">
            <br/>
            <?php } else {?>
            <input class="form-control" name="pseudo" placeholder="Pseudo" required="" autofocus="" type="text" maxlength="50">
            <br/>
            <?php }?>
            <textarea id="inputBody" class="form-control" name="body" placeholder="Type your commentary" autofocus="" required=""></textarea>
            <br/><br/>
            <button class="btn btn-lg btn-secondary btn-block" type="submit">Add</button>
        </form>
        <?php
            if(isset($Error)){
                echo $Error;
            }
            if(isset($_POST['pseudo']) && isset($_POST['body'])) {
                new FrontController("addComm");
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
