<?php
/**
 * Created by PhpStorm.
 * User: PC_Unite_Baptiste
 * Date: 12/01/2019
 * Time: 13:56
 */

require_once('../model/NewsModel.php');
require_once('../class/Check.php');

class NewsController
{
    private $model;
    private $verif;

    public function __construct($action){
        $this->model = new NewsModel();
        switch ($action) {
            case "addNews":
                $this->verif = new Check();
                $result = $this->addNews($_POST['title'], $_POST['body']);

                if ($result== 1) {
                    header('location:../view/home.php');

                } else{
                    require("../view/error.php");
                }
                break;

            case "delNews":
                $this->delNews($_GET['param']);
                header('location:../view/home.php');

                break;
            case "RefreshFirstPage":

                $action="RefreshFirstPage";
                $result=$this->getAllNewsByDate();
                require("../model/CommentaireModel.php");
                $model=new CommentaireModel();
                foreach($result as $news){
                    $news->setListComm($model->getCommentaire($news->getId()));
                }

                $nbComm=$model->getNbCommentaire();
                require("../view/home.php");
        }
    }

    public function addNews($title,$body){
        $title = $this->verif->filtre_titre($title);
        return $this->model->addNews($title,$body);
    }
    public function delNews($id){
        return $this->model->delNews($id);
    }
    public function getNewsByDate($ddate){
        return $this->model->getNewsByDate($ddate);
    }
    public function getAllNewsByDate(){
        return $this->model->getAllNewsByDate();
    }
}