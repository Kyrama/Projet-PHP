<?php
require_once ('../controller/FrontController.php');

if (!(session_status() == PHP_SESSION_ACTIVE)){
    session_start();
}
if(!isset($action)) {
    new FrontController("RefreshFirstPage");
}
else{
?>


<!DOCTYPE html>

<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Blog</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/perso.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">
</head>

<body>

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">BLOG'BUSTER</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <form method="post">
                        <input class="form-control" name="search" placeholder="search by date..." type="search" maxlength="10">
                    </form>
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
                            <a class="nav-link" href="login.php">Sign In</a>
                            <a class="nav-link" href="signin.php">Sign Up</a>';
                        }
                    ?>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <?php
            if(sizeof($result) == 0) {
                echo "No news";
            }
            else{
                if(isset($_POST['search'])){
                    foreach ($result as $value){
                        if($value->getDate() == $_POST['search']){
                            echo $value;
                            if(isset($_SESSION['login'])){
                                echo '<p class="lead"><a href="delNews.php?param='.$value->getId().'" class="btn btn-lg btn-secondary">Delete</a></p>';
                                echo '<br/>';
                            }
                            echo '<a href="addCommentaire.php?param='.$value->getId().'" class="btn btn-lg btn-secondary">Add Commentary</a>';
                            $listcomm=$value->getListComm();
                            if(sizeof($listcomm)==0){
                                echo'<p class="contenu">No commentaries</p>';
                            }
                            else{
                                foreach($listcomm as $com){
                                    echo $com;
                                    if(isset($_SESSION['login'])){
                                        echo '<a href="delCommentaire.php?param='.$value->getId().'" class="btn btn-lg btn-secondary">Delete Commentary</a><br><br>';
                                    }
                                }
                            }
                            echo '<hr>';
                        }
                    }
                }
                else{
                    foreach ($result as $value){
                        echo $value;
                        if(isset($_SESSION['login'])){
                            echo '<p class="lead"><a href="delNews.php?param='.$value->getId().'" class="btn btn-lg btn-secondary">Delete</a>';
                        }
                        echo '<a href="addCommentaire.php?param='.$value->getId().'" class="btn btn-lg btn-secondary">Add Commentary</a>';
                        $listcomm=$value->getListComm();
                        if(sizeof($listcomm)==0){
                            echo'<p class="contenu">No commentaries</p>';
                        }
                        else{
                            foreach($listcomm as $com){
                                echo $com;
                                if(isset($_SESSION['login'])){
                                    echo '<a href="delCommentaire.php?param='.$com->getId().'" class="btn btn-lg btn-secondary">Delete Commentary</a><br><br>';
                                }
                            }
                        }
                        echo '<hr>';
                    }
                }

            }
            ?>
        </main>
        <footer class="mastfoot mt-auto text-center">
            <div class="inner">
                <?php

                    echo '<p>Nombres de commentaires : '.$nbComm.'</p>';
                    if(isset($_COOKIE['pc'])){
                        echo "<p>Vos commentaires : ".$_COOKIE['pc']."</p>";
                    }
                    else{
                        echo "<p>Vous n'avez pas encore posté de commentaires.</p>";
                    }
                ?>

                <!--<label>test</label>-->
                <p>Made by Alexandre Bouvard & Baptiste Chazeix</p><br>
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
<?php }?>
