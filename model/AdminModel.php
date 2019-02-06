<?php
/**
 * Created by PhpStorm.
 * User: albouvard
 * Date: 08/12/18
 * Time: 10:38
 */

require_once ('../gateway/Connection.php');
require_once ('../gateway/AdminGateway.php');

class AdminModel
{
    private $con;
    private $gateway;
    public function __construct(){
        try {
            $this->con = new Connection('mysql:host=localhost:3306;dbname=dbalbouvard;charset=utf8','albouvard', 'dokkanbaptiste'); //VERSION IUT
            //$this->con = new Connection('mysql:host=localhost:3306;dbname=php;charset=utf8','root', '');
            $this->gateway = new AdminGateway($this->con);
        }
        catch (Exception $e){
            return $e;
        }
    }
    public function connexion($login,$mdp){
        return $this->gateway->connexion($login,$mdp);
    }
    public function inscription($login,$mdp){
        return $this->gateway->inscription($login,$mdp);
    }
}
