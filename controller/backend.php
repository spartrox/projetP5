<?php

	//chargement des différentes classes
	require_once('model/commentManager.php');
	require_once('model/articleManager.php');

		//Affichage de la page Admin
	function pageAdmin(){
		$articleManager = new ArticleManager();

		$articles =  $articleManager-> getArticles();

		if ($articles === false){
			throw new Exception('Impossible d\'accéder à cette page');
		} else{
      			require('view/backend/affichageAdministrateur.php');
      	}
    }

    	//Page gestion des commentaires signalé
	function pageCommentaireSignale(){
		$commentManager = new CommentManager();

		$reportComments = $commentManager-> addReportComments();

		if ($reportComments === false){
				throw new Exception('Impossible d\'accéder à la page des commentaires signalé, veuillez recommencer !');
		} else{
				require('view/backend/affichageCommentaireSignale.php');
		}
	}

	function newArticle(){
		$articleManager = new ArticleManager();

		$articles =  $articleManager-> newArticle();

	}

	function pageAllArticles(){
      $articleManager = new ArticleManager();

      $articles = $articleManager->getArticles();
        if ($articles === false){
                throw new Exception('Impossible d\'afficher la page des articles, veuillez recommencer !');
        } else{
                require('view/backend/affichageAllArticles.php');
        }		
	}