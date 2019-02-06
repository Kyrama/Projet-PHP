<?php
/**
 * Created by PhpStorm.
 * User: PC_Unite_Baptiste
 * Date: 12/01/2019
 * Time: 15:25
 */

require_once("../controller/FrontController.php");

if(!isset($_SESSION['login'])){
    require('home.php');
}

new FrontController("delComm");


