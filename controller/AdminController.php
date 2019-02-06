<?php
/**
 * Created by PhpStorm.
 * User: PC_Unite_Baptiste
 * Date: 11/01/2019
 * Time: 00:00
 */

require_once('../model/AdminModel.php');
require_once('../class/Check.php');

class AdminController
{
    private $model;
    private $verif;
    public function __construct($action)
    {
        switch ($action){
            case "connexion":
                $this->model = new AdminModel();
                $result=$this->connexion($_POST['login'],$_POST['motdepasse']);
                if($result==1) {
                    $_SESSION['login'] = $_POST['login'];
                    header('location:../view/home.php');
                }
                else{
                    $Error=$result;
                    require("../view/error.php");
                }
                    break;
            case "inscription":
                $this->model = new AdminModel();
                $this->verif= new Check();
                $result=$this->inscription($_POST['login'],$_POST['motdepasse']);
                if($result==1) {
                    $_SESSION['login'] = $_POST['login'];
                    header("location:../view/home.php");
                }
                else{
                    $Error=$result;
                    require("../view/error.php");
                }
        }

    }

    private function connexion($login,$motdepasse){
        return $this->model->connexion($login,$motdepasse);
    }

    private function inscription($login,$motdepasse){
        if(!$this->verif->verif_login($login)){
            return false;
        }
        return $this->model->inscription($login,$motdepasse);
    }
}