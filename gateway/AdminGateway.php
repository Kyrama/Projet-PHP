<?php
/**
 * Created by PhpStorm.
 * User: albouvard
 * Date: 07/12/18
 * Time: 12:04
 */

class AdminGateway
{
    public $conn;

    public function  __construct($con){
        $this->conn=$con;
    }
    public function inscription($login,$mdp){
        $query='Insert into admin values(:login,:mdp)';
        $query2='Select count(*) from admin where login=:login';
        try {
            $this->conn->ExecuteQuery($query2, [':login' => [$login, PDO::PARAM_STR]]);
            $result=$this->conn->GetResults();
            if($result[0][0]>= 1){
                return "Administrator's pseudo already exist";
            }
            $mdp = password_hash($mdp,PASSWORD_BCRYPT);
            $this->conn->ExecuteQuery($query, [':login' => [$login, PDO::PARAM_STR], ':mdp' => [$mdp, PDO::PARAM_STR]]);
            return true;
        }
        catch(PDOException $e){
            return $e;
        }
    }

    public function connexion($login,$mdp){
        $query='Select count(*) from admin where login=:login';
        try{
            $this->conn->ExecuteQuery($query, [':login' => [$login, PDO::PARAM_STR]]);
            $result=$this->conn->GetResults();
            if($result[0][0]==0){
                return "Invalid Login";
            }
            else{
                $query='Select motdepasse from admin where login=:login';
                $this->conn->ExecuteQuery($query, [':login' => [$login, PDO::PARAM_STR]]);
                $result=$this->conn->GetResults();
                if (password_verify($mdp,$result[0]['motdepasse'])){
                    return true;
                }
                else {
                    return 'Invalid Password';
                }
            }
        }
        catch (Exception $e){
            return $e;
        }


    }
}