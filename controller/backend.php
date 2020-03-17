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

	//Ajout d'un article
	function newArticle($titre, $contenu, $image_article){
		$articleManager = new ArticleManager();

		$newArticle = $articleManager-> createArticle($titre, $contenu, $image_article);
		
		if ($newArticle === false){
				throw new Exception('Impossible d\'ajouter un article, veuillez recommencer');
		} else{
				Header('Location: index.php?action=addArticle');
		}
	}

	//Affichage de tout les articles
	function pageAllArticles(){
      $articleManager = new ArticleManager();

      $articles = $articleManager->getArticles();
        if ($articles === false){
                throw new Exception('Impossible d\'afficher la page des articles, veuillez recommencer !');
        } else{
                require('view/backend/affichageAllArticles.php');
        }		
	}

	//Supression d'un article		
	function deleteArticle($articleId){
      $articleManager = new ArticleManager();

      $deleteArticle = $articleManager->deleteArticle($articleId);

        if ($deleteArticle === false){
                throw new Exception('Impossible de supprimer cet article, veuillez recommencer !');
        } else{
                Header('Location: index.php?action=pageAdmin');
        }      		
	}

	//Page gestion article
	function pageModifArticle($articleId){
		$articleManager = new ArticleManager();

		$article =  $articleManager-> getArticle($articleId);

		if ($article  === false){
				throw new Exception('Impossible d\'accéder à la page de modification de l\'article, veuillez recommencer !');
		} else{
				require('view/backend/affichageModifArticle.php');
		}
	}

	//Article modifié
	function articleModif($articleId){
		$articleManager = new ArticleManager();

		$articleModif = $articleManager-> articleModif($articleId);

		if ($articleModif === false){
				throw new Exception('Impossible de modifier cet article, veuillez recommencer !');
		} else{
				Header('Location: index.php?action=pageAdmin');
		}
	}

	//page gestion des commentaires pour chaque chapitre
	function pageCommentArticle($articleId){
		$articleManager = new ArticleManager();
		$commentManager = new CommentManager();
		
		$article =  $articleManager-> getArticle($articleId);
		$comments = $commentManager->articleComments($articleId);

		if ($article  === false){
				throw new Exception('Impossible d\'accéder à la page des commentaires, veuillez recommencer !');
		} else{
				require('view/backend/affichageCommentaireArticle.php');
		}

	}

	//Supression d'un commentaire
	function deleteComment($commentId){
		$commentManager = new CommentManager();

		$deleteComment = $commentManager-> deleteComment($commentId);

		if ($deleteComment === false){
				throw new Exception('Impossible de supprimer ce commentaire, veuillez recommencer !');
		} else{
				Header('Location: index.php?action=pageAllArticles');
		}
	}

	//Supression d'un commentaire signalé
	function deleteCommentSignale($commentId){
		$commentManager = new CommentManager();

		$deleteComment = $commentManager-> deleteComment($commentId);

		if ($deleteComment === false){
				throw new Exception('Impossible de supprimer ce commentaire, veuillez recommencer !');
		} else{
				Header('Location: index.php?action=pageCommentaireSignale');
		}
	}
