<?php
/**
 * Created by PhpStorm.
 * User: albouvard
 * Date: 07/12/18
 * Time: 10:34
 */

class Commentaire
{
    public $id;
    public $pseudo;
    public $corps;
    public $date;

    public function __construct($id,$pseudo,$corps,$date)
    {
        $this->id=$id;
        $this->pseudo=$pseudo;
        $this->corps=$corps;
        $this->date=$date;
    }
    public function __toString()
    {
        return "<div class='date-news'><p class='lead'>$this->date</p></div><h1 class='pseudo'>$this->pseudo</h1><p class='contenu'>$this->corps</p>";
    }
    public function getId(){
        return $this->id;
    }
}