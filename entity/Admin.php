<?php
/**
 * Created by PhpStorm.
 * User: albouvard
 * Date: 07/12/18
 * Time: 10:31
 */

class Admin
{
    public $login;
    public $motdepasse;

    public function __construct($login,$mdp){
        $this->login=$login;
        $this->motdepasse=mdp;
    }

}