<?php
/**
 * Created by PhpStorm.
 * User: PC_Unite_Baptiste
 * Date: 13/01/2019
 * Time: 19:39
 */

require_once('../class/Autoloader.php');
Autoloader::register();

class FrontController
{
    public function __construct($action)
    {

        if(in_array($action , ["connexion","inscription"],TRUE)){
            new AdminController($action);
        }
        elseif(in_array($action , ["addNews","delNews","RefreshFirstPage"],TRUE)) {
            new NewsController($action);
        }
        elseif(in_array($action , ["addComm","delComm"],TRUE)){
            new CommentaireController($action);
        }
        else{
            require("../view/home.php");
        }
    }


}

