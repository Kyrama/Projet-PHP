<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 12/01/2019
 * Time: 19:17
 */
require_once('../model/CommentaireModel.php');
require_once('../class/Check.php');

class CommentaireController
{
    private $model;
    private $verif;

    public function __construct($action){

        $this->model = new CommentaireModel();
        switch($action){
            case "addComm":
                $this->verif = new Check();
                $result=$this->addCommentaire($_POST['pseudo'],$_POST['body'],$_GET['param']);
                if($result==1){
                    if((!isset($_SESSION['login']) && !isset($_SESSION['loginVisit'])) || $_SESSION['loginVisit'] != $_POST['pseudo']){
                    $_SESSION['loginVisit'] = $_POST['pseudo'];
                    }
                    if(!isset($_COOKIE['pc'])){
                        setcookie('pc',1,time()+365*24*3600);
                    }
                    else{
                        setcookie('pc',$_COOKIE['pc']+1,time()+365*24*3600);
                    }
                    header('location:../view/home.php');
                }
                else {
                    $Error=$result;
                    require("../view/error.php");
                }

            case "delComm":
                $this->delCommentaire($_GET['param']);
                header('location:../view/home.php');


        }
    }
    public function addCommentaire($pseudo,$contenu,$id){
        if(!$this->verif->verif_login($pseudo)){
            return false;
        }
        return $this->model->addCommentaire($pseudo,$contenu,$id);
    }
    public function getCommentaire($idNews){
        return $this->model->getCommentaire($idNews);
    }
    public function delCommentaire($idComm){
        return $this->model->delCommentaire($idComm);
    }
    public function delAllCommentaireOfANews($idNews)
    {
        return $this->model->delAllCommentaireOfANews($idNews);
    }
    public function getNbCommentaire(){
        return $this->model->getNbCommentaire();
    }
}