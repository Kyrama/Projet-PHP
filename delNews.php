<?php
/**
 * Created by PhpStorm.
 * User: PC_Unite_Baptiste
 * Date: 12/01/2019
 * Time: 15:25
 */

session_start();
if(!isset($_SESSION['login'])){
    require('home.php');
}

require_once("../controller/FrontController.php");
new FrontController("delNews");
