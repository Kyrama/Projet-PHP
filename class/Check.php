<?php

class Check
{
    public function verif_login($login){
		if(strlen($login)>30){
			return false;
		}
		if(preg_match('/[^\w]/',$login)){
			return false;
		}
		return true;
	}
	public function filtre_titre($titre){
		$titre = trim($titre);
		$titre = strtolower($titre);
		$titre = ucfirst($titre);
		return $titre;
	}
}