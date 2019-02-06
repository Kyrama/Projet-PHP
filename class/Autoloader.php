<?php
/**
 * Created by PhpStorm.
 * User: PC_Unite_Baptiste
 * Date: 15/01/2019
 * Time: 11:10
 */

class Autoloader
{
    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }
    static function autoload($name){
        require('../controller/'.$name.'.php');
    }
}