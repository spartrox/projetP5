<?php

	//chargement des différents classes




	//Création des différentes fonction
	function pageAccueil(){

		require('view/frontend/affichageAccueil.php');
	}























	//Affichage des erreurs
   	function error($e){

     	require('view/frontend/affichageMessageErreur.php');
  	}