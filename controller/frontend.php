<?php

	//chargement des différents classes
   	require_once('model/postManager.php');
  	require_once('model/commentManager.php');
    require_once('model/memberManager.php');

	//Création des différentes fonction
	function pageAccueil(){

		require('view/frontend/affichageAccueil.php');
	}
	
	function pageActualites(){

		require('view/frontend/affichageActualites.php');
	}
	
	function pageContact(){

		require('view/frontend/affichageContact.php');
	}
	
	function pageInscription(){

		require('view/frontend/affichageInscription.php');
	}
	
	function pageConnexion(){

		require('view/frontend/affichageConnexion.php');
	}
	
	function pageDeconnexion(){

		require('view/frontend/affichageDeconnexion.php');
	}
	
	function pageMentionLegales(){

		require('view/frontend/affichageMentionLegales.php');
	}

	function pageApropos(){

		require('view/frontend/affichageApropos.php');
	}

	function pageVoitureAllemande(){

		require('view/frontend/affichageVoitureAllemande.php');
	}
	
	function pageVoitureSportive(){

		require('view/frontend/affichageVoitureAmericaine.php');
	}

	function pageVoitureFrancaise(){

		require('view/frontend/affichageVoitureFrancaise.php');
	}
	function pageVoitureItalienne(){

		require('view/frontend/affichageVoitureItalienne.php');
	}

	function pageGestionProfil(){

		require('view/frontend/affichageProfil.php');
	}

	function pageGestionAdmin(){

		require('view/frontend/affichageAdmin.php');
	}

		//Ajout d'un membre
   	function addMember($pseudo, $mdp, $mail){
     	$memberManager = new MemberManager();
        
        $pseudoExist = $memberManager->checkPseudo($pseudo);
        $mailExist = $memberManager->checkMail($mail);  
          if ($pseudoExist){
              throw new Exception('Pseudo déja utilisé, veuillez en trouver un autre !');
          }

          if ($mailExist){
              throw new Exception('Adresse mail déja utilisé, veuillez en trouver une autre !');
          }

            if (!($pseudoExist) && !($mailExist)){

                $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                $newMember = $memberManager->createMember($pseudo, $mail, $mdp);
            	header('Location: index.php?action=pageConnexion');
            } else {
                    throw new Exception('Erreurs lors de l\'inscription veuillez recommencer !');
   	        }
    }

        //Bouton page connexion
    function pageConnexionSubmit($pseudo, $mdp){
        $memberManager = new MemberManager();

        $member = $memberManager->loginMember($pseudo);
        $mdpCorrect = password_verify($_POST['mdpConnect'], $member['motdepasse']);

        if (!isset($member['id'])){
              throw new Exception("Mauvais identifiant !");
          }
            else {
                if ($mdpCorrect){
                  $_SESSION['id'] = $member['id'];
                  $_SESSION['pseudo'] = $member['pseudo'];
                  $_SESSION['admin'] = $member['admin'];
                  header('Location: index.php');
                }
                  else {
                    throw new Exception("Mauvais mot de passe !");
                  }
                }
    }

    	//Bouton modification d'un membre
    function modifMember($memberId){
    	$memberManager = new MemberManager();

    	$modifMember = $memberManager->modifMember($memberId);

		if ($modifMember === false){
				throw new Exception('Impossible de modifier votre profil, veuillez recommencer !');
		} else{
				Header('Location: index.php');
		}    	
    }
























	//Affichage des erreurs
   	function error($e){

     	require('view/frontend/affichageMessageErreur.php');
  	}