<?php
/**
 * Created by PhpStorm.
 * User: albouvard
 * Date: 07/12/18
 * Time: 10:24
 */

class News
{
    private $id;
    private $titre;
    private $corps;
    private $date;
    private $listComm;

    public function __construct($id,$titre,$corps,$date,$listComm){
        $this->id=$id;
        $this->titre=$titre;
        $this->corps=$corps;
        $this->date=$date;
        $this->listComm=$listComm;
    }
    public function getId(){
        return $this->id;
    }
    public function getDate(){
        return $this->date;
    }
    public function getListComm(){
        return $this->listComm;
    }
    public function setListComm($lcomm){
        $this->listComm=$lcomm;
}
    public function __toString()
    {
        return "<div class='date-news'><p class='lead'>$this->date</p></div><h1 class='cover-heading'>$this->titre</h1><p class='lead'>$this->corps</p>";
    }


}