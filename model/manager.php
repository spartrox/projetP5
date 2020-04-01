<?php
namespace model;

class Manager{

	protected function bddConnect(){
		
		// Connexion à la base de données
			$bdd = new \PDO('mysql:host=localhost;dbname=projet_p5;charset=utf8', 'root', '');
			//$bdd = new \PDO('mysql:host=db5000342585.hosting-data.io;dbname=dbs333062;charset=utf8', 'dbu607504', 'Spartrox117*');
			return $bdd;
	}
}