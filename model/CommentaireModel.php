<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 12/01/2019
 * Time: 19:17
 */

require_once ('../gateway/Connection.php');
require_once ('../gateway/CommentaireGateway.php');

class CommentaireModel{
    private $con;
    private $gateway;
    public function __construct()
    {
        try {
            $this->con = new Connection('mysql:host=localhost:3306;dbname=dbalbouvard;charset=utf8','albouvard', 'dokkanbaptiste'); //VERSION IUT
            //$this->con = new Connection('mysql:host=localhost:3306;dbname=php;charset=utf8', 'root', '');
            $this->gateway = new CommentaireGateway($this->con);
        } catch (Exception $e) {
            return $e;
        }
    }
    public function addCommentaire($pseudo,$contenu,$id){
        return $this->gateway->addCommentaire($pseudo,$contenu,$id);
    }

    public function getCommentaire($idNews){
        return $this->gateway->getCommentaire($idNews);
    }
    public function delCommentaire($idComm){
        return $this->gateway->delCommentaire($idComm);
    }
    public function delAllCommentaireOfANews($idNews)
    {
        return $this->gateway->delAllCommentaireOfANews($idNews);
    }
    public function getNbCommentaire(){
        return $this->gateway->getNbCommentaire();
    }
}
