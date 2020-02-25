<?php

	//chargement des différents classes


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
























	//Affichage des erreurs
   	function error($e){

     	require('view/frontend/affichageMessageErreur.php');
  	}