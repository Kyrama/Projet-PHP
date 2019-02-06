<?php
/**
 * Created by PhpStorm.
 * User: albouvard
 * Date: 11/12/18
 * Time: 17:19
 */

require_once ('../gateway/NewsGateway.php');

class NewsModel
{
    private $con;
    private $gateway;
    public function __construct(){
        try {
            $this->con = new Connection('mysql:host=localhost:3306;dbname=dbalbouvard;charset=utf8','albouvard', 'dokkanbaptiste');
            //$this->con = new Connection('mysql:host=localhost:3306;dbname=php;charset=utf8','root', '');
            $this->gateway = new NewsGateway($this->con);
        }
        catch (Exception $e){
            return $e;
        }
    }

    public function addNews($titre,$corps)
    {
        return $this->gateway->addNews($titre,$corps);
    }
    public function delNews($id){
        return $this->gateway->delNews($id);
    }
    public function getNewsByDate($ddate){
        return $this->gateway->getNewsByDate($ddate);
    }
    public function getAllNewsByDate(){
        return $this->gateway->getAllNewsByDate();
    }


}
