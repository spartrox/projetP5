<?php

	namespace model;
 	require "vendor/autoload.php";

use model\Manager;

	class MemberManager extends Manager{

                        ////////////////// SELECT /////////////////////////

    //Récupération du pseudo
    public function loginMember($pseudo){

    	// Connexion à la base de données
    	$bdd = $this->bddConnect();

        $req = $bdd->prepare('SELECT id, pseudo, motdepasse, admin FROM visiteurs WHERE pseudo = ?');
        $req->execute(array($pseudo));
        $member = $req->fetch();

        return $member;
    }		

    //Vérification si le pseudo existe
    public function checkPseudo($pseudo){

    	// Connexion à la base de données
    	$bdd = $this->bddConnect();

		$req = $bdd->prepare('SELECT pseudo FROM visiteurs WHERE pseudo = ?');
		$req->execute(array($pseudo));
		$pseudoExist = $req->fetch();

		return $pseudoExist;
	}

	//Vérification si le mail existe
	public function checkMail($mail){

		// Connexion à la base de données
		$bdd = $this->bddConnect();

		$req = $bdd->prepare('SELECT mail FROM visiteurs WHERE mail = ?');
		$req->execute(array($mail));
		$mailExist = $req->fetch();

		return $mailExist;
	}

	//Récupération des informations du membre
	public function getMember(){

		// Connexion à la base de données
		$bdd = $this->bddConnect();

		$req = $bdd->query('SELECT id, pseudo, mail, motdepasse, avatar, DATE_FORMAT(date_creation, \'%d/%m/%Y \') AS date_creation FROM visiteurs ');

		return $req;
	}

                        ////////////////// INSERT INTO /////////////////////////

	// Créer le membre
	public function createMember($pseudo, $mail, $mdp){

		// Connexion à la base de données
		$bdd = $this->bddConnect();

        $newMember = $bdd->prepare("INSERT INTO visiteurs(pseudo, mail, motdepasse, date_creation ) VALUES(?, ?, ?, NOW())");
        $newMember->execute(array($pseudo, $mail, $mdp));		

        return $newMember;
	}

                        ////////////////// UPDATE /////////////////////////

	//Modification de l'email
	public function mailModif($mailId){

		// Connexion à la base de données
		$bdd = $this->bddConnect();

		// Modification du membre
		$req = $bdd->prepare('UPDATE visiteurs SET mail = ? WHERE id = ? ');	
		$mailModif = $req->execute(array($_POST['newMail'], $mailId));	

		return $mailModif;
	}

	//Modification du mdp
	public function mdpModif($MdpId){

		// Connexion à la base de données
		$bdd = $this->bddConnect();

		// Modification du membre
		$req = $bdd->prepare('UPDATE visiteurs SET motdepasse = ? WHERE id = ? ');	
		$mdpModif = $req->execute(array($_POST['newMdp'], $MdpId));	

		return $mdpModif;
	}

	public function createAvatar($extensionsUpload, $memberId){

		// Connexion à la base de données
		$bdd = $this->bddConnect();

		//Ajout d'un avatar
		$newAvatar = $bdd->prepare('UPDATE visiteurs SET avatar = ? WHERE id = ?');
		$newAvatar->execute(array($extensionsUpload, $memberId));

		return $newAvatar;
	}

}