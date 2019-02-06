<?php
/**
 * Created by PhpStorm.
 * User: albouvard
 * Date: 07/12/18
 * Time: 10:39
 */
require_once ('../entity/News.php');
require_once ('../gateway/Connection.php');

class NewsGateway
{
    public $conn;

    public function __construct($con)
    {
        $this->conn=$con;
    }

    public function addNews($titre,$corps)
    {
        $query = 'Insert into News(titre,corps,ddate) values (:titre,:corps,:ddate)';
        try {
            $ddate = new DateTime();
            $this->conn->executeQuery($query, [':titre' => [$titre, PDO::PARAM_STR], ':corps' => [$corps, PDO::PARAM_STR], ':ddate' => [$ddate->format('Y-m-d'), PDO::PARAM_STR]]);
            return true;
        }
        catch (Exception $e){
            return $e;
        }

    }
    public function delNews($id){
        $query = 'Delete from News where id=:id';
        $query2 = 'Select count(*) from News where id=:id';
        try{
            $this->conn->executeQuery($query2,[':id'=>[$id ,PDO::PARAM_INT]]);
            $result=$this->conn->getResults();
            if($result[0][0] == 0){
                return "Pas de news correspondante";
            }
            //return $r2[0][0];
            /*if(($r2 = $this->conn->executeQuery($query2,[':titre'=>[$titre ,PDO::PARAM_STR]]) )== 0)
                echo $r2;*/
            $this->conn->executeQuery($query,[':id'=>[$id ,PDO::PARAM_INT]]);
            return true;
            /*$r = $this->conn->executeQuery($query,[':titre'=>[$titre ,PDO::PARAM_STR]]);
            echo $r;*/
        }
        catch (Exception $e){
            return $e;
        }

    }
    public function getNewsByDate($ddate){
        $query ='Select * from News where ddate=:ddate order by titre';
        try{
            $this->conn->executeQuery($query,[':titre'=>[$ddate,PDO::PARAM_STR]]);
        }
        catch (Exception $e){
            return "Pas de News à ce jour";
        }
        return $this->conn->getResults();
    }
    public function getAllNewsByDate(){
        $query='Select * from News order by ddate';
        try{
            $this->conn->executeQuery($query);
        }
        catch (Exception $e){
            return $e;
        }
        return $this->toEntity();
    }
    private function toEntity(){
        $result=$this->conn->getResults();
        $resultats=[];
        foreach ($result as $value){
            $resultats[]=new News($value['id'],$value['titre'],$value['corps'],$value['ddate'],[]);
        }
        return $resultats;
    }


}