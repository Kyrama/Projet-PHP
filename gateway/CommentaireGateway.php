<?php
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 12/01/2019
 * Time: 18:11
 */
require_once('../entity/Commentaire.php');

class CommentaireGateway
{
    public $conn;

    public function __construct($con)
    {
        $this->conn=$con;
    }

    public function addCommentaire($pseudo,$contenu,$id){
        try{
            $query= 'Insert into commentaire(pseudo,contenu,ddate,idNews) values(:pseudo,:contenu,:ddate,:idNews)';
            $ddate=new DateTime();
            return $this->conn->executeQuery($query,[':pseudo'=>[$pseudo,PDO::PARAM_STR],':contenu'=>[$contenu,PDO::PARAM_STR],':ddate' => [$ddate->format('Y-m-d'),PDO::PARAM_STR],'idNews'=>[$id,PDO::PARAM_INT]]);
        }
        catch (Exception $e){
            return $e;
        }
    }
    public function getCommentaire($idNews){
        $query='Select * from commentaire where idNews=:idNews';

        try{

            $this->conn->executeQuery($query,['idNews'=>[$idNews,PDO::PARAM_INT]]);
            return $this->toEntity();
        }
        catch (Exception $e){
            return $e;
        }
    }
    public function delCommentaire($numComm){
        $query1='Select count(*) from commentaire where numcom=:numComm';
        $query2='Delete from commentaire where numcom=:numComm';
        try{

            $this->conn->executeQuery($query1,['numComm'=>[$numComm,PDO::PARAM_INT]]);
            $resultat=$this->conn->getResults();
            if($resultat[0][0]==1){
                $this->conn->executeQuery($query2,['numComm'=>[$numComm,PDO::PARAM_INT]]);
                return TRUE;
            }
            else {
                return "Pas de commentaire portant cet ID";
            }
        }
        catch (Exception $e){
            return $e;
        }

    }
    public function delAllCommentaireOfANews($idNews){
        $query1='Select count(*) from commentaire where idNews=:idNews';
        $query2='Delete from commentaire where idNews=:idNews';
        try {
            $this->conn->executeQuery($query1, ["idNews" => [$idNews, PDO::PARAM_INT]]);
            $resultat=$this->conn->getResults();
            if($resultat[0][0]==1) {
                $this->conn->executeQuery($query2, ['idNews' => [$idNews, PDO::PARAM_INT]]);
            }
            return TRUE;
        }
        catch (Exception $e){
            return $e;
        }
    }

    public function getNbCommentaire(){
        $query='Select count(*) from commentaire';
        try {
            $this->conn->executeQuery($query);
            $resultat=$this->conn->getResults();
            return $resultat[0][0];
        }
        catch (Exception $e){
            return $e;
        }
    }

    private function toEntity(){
        $result=$this->conn->getResults();
        $resultats=[];
        foreach ($result as $value){
            $resultats[]=new Commentaire($value['numCom'],$value['pseudo'],$value['contenu'],$value['ddate']);
        }
        return $resultats;
    }

}