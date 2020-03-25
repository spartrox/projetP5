<?php

	//chargement des différentes classes
 	namespace controller;
 	require "vendor/autoload.php";

use model\CommentManager;
use model\ArticleManager;
use model\MessageManager;	

class Backend {

	//Affichage de la page Admin
	function pageAdmin(){
		$articleManager = new ArticleManager();		

		$categories =  $articleManager-> getCategories();

		if ($categories === false){
			throw new \Exception('Impossible d\'accéder à cette page');
		} else{
      			require('view/backend/affichageAdministrateur.php');
      	}
    }

    //Page gestion des commentaires signalé
	function pageCommentaireSignale(){
		$commentManager = new CommentManager();

		$reportComments = $commentManager-> addReportComments();

		if ($reportComments === false){
				throw new \Exception('Impossible d\'accéder à la page des commentaires signalé, veuillez recommencer !');
		} else{
				require('view/backend/affichageCommentaireSignale.php');
		}
	}

	//Ajout d'un article
	function newArticle($titre, $contenu, $image_article){
		$articleManager = new ArticleManager();

		$newArticle = $articleManager-> createArticle($titre, $contenu, $image_article);
		
		if ($newArticle === false){
				throw new \Exception('Impossible d\'ajouter un article, veuillez recommencer');
		} else{
				Header('Location: index.php?action=addArticle');
		}
	}

	//Ajout d'une nouvelle categorie
	function newCategorie($titre){
		$articleManager = new ArticleManager();

		$newCategorie = $articleManager-> createCategorie($titre);
		
		if ($newCategorie === false){
				throw new \Exception('Impossible d\'ajouter une nouvelle categorie, veuillez recommencer');
		} else{
				Header('Location: index.php?action=pageAjoutCategorie');
		}
	}

  	//Ajout d'un message
    function newMessage($nom, $email, $sujet, $contenu){
    	$messageManager = new MessageManager();

    	$newMessage = $messageManager-> createMessage($nom, $email, $sujet, $contenu);
			//die(var_dump($newMessage));
    	if ($newMessage === false){
    			throw new \Exception("Impossible d'envoyer le message, veuillez réessayer");
    	} else{
    			header('Location index.php?action=pageContact');
    	}
    }

	//Affichage de tout les articles
	function pageAllArticles(){
      $articleManager = new ArticleManager();

      $articles = $articleManager->getArticles();
        if ($articles === false){
                throw new \Exception('Impossible d\'afficher la page des articles, veuillez recommencer !');
        } else{
                require('view/backend/affichageAllArticles.php');
        }		
	}

	//Page gestion article
	function pageModifArticle($articleId){
		$articleManager = new ArticleManager();

		$article =  $articleManager-> getArticle($articleId);

		if ($article  === false){
				throw new \Exception('Impossible d\'accéder à la page de modification de l\'article, veuillez recommencer !');
		} else{
				require('view/backend/affichageModifArticle.php');
		}
	}

	//Page gestion categorie
	function pageModifCategorie($categorieId){
		$articleManager = new ArticleManager();

		$categorie =  $articleManager-> getCategorie($categorieId);

		if ($categorie  === false){
				throw new \Exception('Impossible d\'accéder à la page de modification de categorie, veuillez recommencer !');
		} else{
				require('view/backend/affichageModifCategorie.php');
		}
	}

	//Article modifié
	function articleModif($articleId){
		$articleManager = new ArticleManager();

		$articleModif = $articleManager-> articleModif($articleId);

		if ($articleModif === false){
				throw new \Exception('Impossible de modifier cet article, veuillez recommencer !');
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
				throw new \Exception('Impossible d\'accéder à la page des commentaires, veuillez recommencer !');
		} else{
				require('view/backend/affichageCommentaireArticle.php');
		}
	}

	//Supression d'un commentaire
	function deleteComment($commentId){
		$commentManager = new CommentManager();

		$deleteComment = $commentManager-> deleteComment($commentId);

		if ($deleteComment === false){
				throw new \Exception('Impossible de supprimer ce commentaire, veuillez recommencer !');
		} else{
				Header('Location: index.php?action=pageAllArticles');
		}
	}

	//Supression d'un commentaire signalé
	function deleteCommentSignale($commentId){
		$commentManager = new CommentManager();

		$deleteComment = $commentManager-> deleteComment($commentId);

		if ($deleteComment === false){
				throw new \Exception('Impossible de supprimer ce commentaire, veuillez recommencer !');
		} else{
				Header('Location: index.php?action=pageCommentaireSignale');
		}
	}

	//Supression d'un article		
	function deleteArticle($articleId){
      $articleManager = new ArticleManager();

      $deleteArticle = $articleManager->deleteArticle($articleId);
      //die(var_dump($articleId));
        if ($deleteArticle === false){
                throw new \Exception('Impossible de supprimer cet article, veuillez recommencer !');
        } else{
                Header('Location: index.php?action=pageAllArticles');
        }      		
	}

	//Supression d'une catégorie		
	function deleteCategorie($categorieId){
      $articleManager = new ArticleManager();

      $deleteCategorie = $articleManager->deleteCategorie($categorieId);
      //die(var_dump($articleId));
        if ($deleteCategorie === false){
                throw new \Exception('Impossible de supprimer la catégorie, veuillez recommencer !');
        } else{
                Header('Location: index.php?action=pageAdmin');
        }      		
	}

	//Affichage de la page Admin
	function categorieMenu(){
		$articleManager = new ArticleManager();		

		$categories =  $articleManager-> getCategories();

		if ($categories === false){
			throw new \Exception('Aucune catégories disponible');
		} else{
      			require('view/frontend/affichageMenu.php');
      	}
    }

	//Affichage de tout les messages
	function pageMessage(){
		$messageManager = new MessageManager();

		$messages = $messageManager-> getMessages();
		
        if ($messages === false){
                throw new \Exception('Impossible d\'afficher la page des messages !');
        } else{
      			require('view/backend/affichageMessageRecus.php');
      	}
    }

	//Affichage de la page Message
	function pageMessageEntier(){
		$messageManager = new MessageManager();

		$messages = $messageManager-> getMessages();
		
        if ($messages === false){
                throw new \Exception('Impossible d\'afficher la page des messages !');
        } else{
      			require('view/backend/affichageMessageEntier.php');
      	}
    }
}