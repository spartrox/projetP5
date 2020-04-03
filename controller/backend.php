<?php

 	namespace controller;
 	require "vendor/autoload.php";

use model\CommentManager;
use model\ArticleManager;
use model\MessageManager;
use model\MemberManager;	

class Backend {
                        ////////////////// FONCTION AFFICHAGE /////////////////////////

	//Affichage de la page Admin
	function pageAdmin(){
		$articleManager = new ArticleManager();		

			$categories =  $articleManager-> getCategories();
			$categoriess =  $articleManager-> getCategoriess();

			if ($categories === false):
				throw new \Exception('Impossible d\'accéder à cette page');
			else:
	      			require('view/backend/affichageAdministrateur.php');
	      	endif;
    }

    //Page gestion des commentaires signalé
	function pageCommentaireSignale(){
		$articleManager = new ArticleManager();
		$commentManager = new CommentManager();

			$reportComments = $commentManager-> addReportComments();
			$categories =  $articleManager-> getCategories();

			if ($reportComments === false):
					throw new \Exception('Impossible d\'accéder à la page des commentaires signalé, veuillez recommencer !');
			else:
					require('view/backend/affichageCommentaireSignale.php');
			endif;
	}

	//Page gestion article
	function pageModifArticle($articleId){
		$articleManager = new ArticleManager();

			$article =  $articleManager-> getArticle($articleId);
			$categories =  $articleManager-> getCategories();

			if ($article  === false):
					throw new \Exception('Impossible d\'accéder à la page de modification de l\'article, veuillez recommencer !');
			else:
					require('view/backend/affichageModifArticle.php');
			endif;
	}

	//Page gestion categorie
	function pageModifCategorie($categorieId){
		$articleManager = new ArticleManager();

			$categorie =  $articleManager-> getCategorie($categorieId);
			$categories =  $articleManager-> getCategories();

			if ($categorie  === false):
					throw new \Exception('Impossible d\'accéder à la page de modification de categorie, veuillez recommencer !');
			else:
					require('view/backend/affichageModifCategorie.php');
			endif;
	}

	//Affichage de tout les articles
	function pageAllArticles(){
      	$articleManager = new ArticleManager();
		$articleManager = new ArticleManager();

      		$articles = $articleManager->getArticles();
          	$categories = $articleManager-> getCategories();

	        if ($articles === false):
	                throw new \Exception('Impossible d\'afficher la page des articles, veuillez recommencer !');
	        else:
	                require('view/backend/affichageAllArticles.php');
	        endif;		
	}

	//page gestion des commentaires pour chaque chapitre
	function pageCommentArticle($articleId){
		$articleManager = new ArticleManager();
		$commentManager = new CommentManager();
		
			$article =  $articleManager-> getArticle($articleId);
			$comments = $commentManager->articleComments($articleId);
			$categories  =  $articleManager-> getCategories();
			
			if ($article  === false):
					throw new \Exception('Impossible d\'accéder à la page des commentaires, veuillez recommencer !');
			else:
					require('view/backend/affichageCommentaireArticle.php');
			endif;
	}

	//Affichage de tout les messages
	function pageMessage(){
		$articleManager = new ArticleManager();
		$messageManager = new MessageManager();

			$messages = $messageManager-> getMessages();
          	$categories = $articleManager-> getCategories();

	        if ($messages === false):
	                throw new \Exception('Impossible d\'afficher la page des messages !');
	        else:
	      			require('view/backend/affichageMessageRecus.php');
	      	endif;
    }

	//Affichage de la page Message
	function pageMessageEntier(){
		$messageManager = new MessageManager();
		$articleManager = new ArticleManager();

          	$message = $messageManager-> getMessage($_GET['id']);
          	$categories = $articleManager-> getCategories();

	        if ($message === false):
	                throw new \Exception('Impossible d\'afficher la page des messages !');
	        else:
	      			require('view/backend/affichageMessageEntier.php');
	      	endif;
    }

                        ////////////////// FONCTION AJOUT /////////////////////////

	//Ajout d'un article
	function newArticle($titre, $contenu, $categorie_article, $image_article){

		if (!empty($_FILES['image_article']['name']) AND !empty($_FILES['image_article']['name'])):

				$tailleMax = 4194304;
				$extensionsValides = array('jpg', 'jpeg', 'png');
					
					if ($_FILES['image_article']['size'] <=$tailleMax):
								
						$extensionsUpload = strtolower(substr(strrchr($_FILES['image_article']['name'], '.'), 1));

							if (in_array($extensionsUpload, $extensionsValides)):
								
								$categorieId = $categorie_article;
								$chemin = "public/image_article/" . $categorieId . "." . $extensionsUpload;
								$resultat = move_uploaded_file($_FILES['image_article']['tmp_name'], $chemin);
								$nomBdd = $categorieId . "." . $extensionsUpload;

									if ($resultat):
										$articleManager = new ArticleManager();
										
										$newArticle = $articleManager-> createArticle($titre, $contenu, $categorie_article, $nomBdd);

										Header('Location: index.php?action=addArticle');

									else:
											throw new \Exception("Impossible d\'ajouter un article, veuillez recommencer");								
									endif;

							else:
									throw new \Exception('Veuillez ajouter un avatar au format : PNG, JPG ou JPEG !');
							endif;

					else:
							throw new \Exception("Votre photo de profil ne doit pas dépasser 4mo");			
					endif;	

			else:
					throw new \Exception("Impossible d'ajouter un avatar, veuillez recommencer");
			endif;
	}

	//Ajout d'un avatar
	function newAvatar(){
			
			if (!empty($_FILES['inputAvatar']['name']) AND !empty($_FILES['inputAvatar']['name'])):

				$tailleMax = 4194304;
				$extensionsValides = array('jpg', 'jpeg', 'png');
					
					if ($_FILES['inputAvatar']['size'] <=$tailleMax):
								
						$extensionsUpload = strtolower(substr(strrchr($_FILES['inputAvatar']['name'], '.'), 1));

							if (in_array($extensionsUpload, $extensionsValides)):

								$memberId = $_SESSION['id'];		
								$chemin = "public/membres/avatars/" . $memberId . "." . $extensionsUpload;
								$resultat = move_uploaded_file($_FILES['inputAvatar']['tmp_name'], $chemin);
								$nomBdd = $memberId . "." . $extensionsUpload;

									if ($resultat):
										$memberManager = new MemberManager();
										
										$newAvatar = $memberManager-> createAvatar($nomBdd);

										header('Location: index.php?action=pageProfil');

									else:
											throw new \Exception("Erreur durant l'importation de votre avatar");								
									endif;

							else:
									throw new \Exception('Veuillez ajouter un avatar au format : PNG, JPG ou JPEG !');
							endif;

					else:
							throw new \Exception("Votre photo de profil ne doit pas dépasser 4mo");			
					endif;	

			else:
					throw new \Exception("Impossible d'ajouter un avatar, veuillez recommencer");
			endif;			
	}

	//Ajout d'un avatar
	function newImageArticle($image_avatar){
			
			if (!empty($_FILES['inputAvatar']['name']) AND !empty($_FILES['inputAvatar']['name'])):

				$tailleMax = 2097152;
				$extensionsValides = array('jpg', 'jpeg', 'png');
					
					if ($_FILES['inputAvatar']['size'] <=$tailleMax):
								
						$extensionsUpload = strtolower(substr(strrchr($_FILES['inputAvatar']['name'], '.'), 1));

							if (in_array($extensionsUpload, $extensionsValides)):
										
								$chemin = "public/image_article/" . $_SESSION['id']. "." .$extensionsUpload;
								$resultat = move_uploaded_file($_FILES['inputAvatar']['tmp_name'], $chemin);

									if ($resultat):
										$memberManager = new MemberManager();
										
										$newAvatar = $memberManager-> createImageArticle($image_avatar);

										header('Location: index.php?action=pageProfil');

									else:
										throw new \Exception("Erreur durant l'importation de votre image");
									endif;	
									
							else:
									throw new \Exception('Veuillez ajouter une image au format : PNG, JPG ou JPEG !');
							endif;

					else:
							throw new \Exception("Votre image ne doit pas dépasser 2mo");			
					endif;	

			else:
					throw new \Exception("Impossible d'ajouter l'image, veuillez recommencer");	
			endif;
	}	


	//Ajout d'une nouvelle categorie
	function newCategorie($titre){
		$articleManager = new ArticleManager();

			$newCategorie = $articleManager-> createCategorie($titre);
			
			if ($newCategorie === false):
					throw new \Exception('Impossible d\'ajouter une nouvelle categorie, veuillez recommencer');
			else:
					Header('Location: index.php?action=pageAjoutCategorie');
			endif;
	}

                        ////////////////// FONCTION MODIFICATION /////////////////////////

	//categorie modifié
	function categorieModif($categorieId){
		$categorieManager = new ArticleManager();

			$categorieModif = $categorieManager-> categorieModif($categorieId);

			if ($categorieModif === false):
					throw new \Exception('Impossible de modifier cet categorie, veuillez recommencer !');
			else:
					Header('Location: index.php?action=pageAdmin');
			endif;
	}

	//Article modifié
	function articleModif($articleId){
		$articleManager = new ArticleManager();

			$articleModif = $articleManager-> articleModif($articleId);

			if ($articleModif === false):
					throw new \Exception('Impossible de modifier cet article, veuillez recommencer !');
			else:
					Header('Location: index.php?action=pageAllArticles');
			endif;
	}

                        ////////////////// FONCTION SUPPRESSION /////////////////////////

	//Supression d'un commentaire
	function deleteComment($commentId){
		$commentManager = new CommentManager();

			$deleteComment = $commentManager-> deleteComment($commentId);

			if ($deleteComment === false):
					throw new \Exception('Impossible de supprimer ce commentaire, veuillez recommencer !');
			else:
					Header('Location: index.php?action=pageAllArticles');
			endif;
	}

	//Supression d'un commentaire signalé
	function deleteCommentSignale($commentId){
		$commentManager = new CommentManager();

			$deleteComment = $commentManager-> deleteComment($commentId);

			if ($deleteComment === false):
					throw new \Exception('Impossible de supprimer ce commentaire, veuillez recommencer !');
			else:
					Header('Location: index.php?action=pageCommentaireSignale');
			endif;
	}

	//Supression d'un article		
	function deleteArticle($articleId){
      	$articleManager = new ArticleManager();

      		$deleteArticle = $articleManager->deleteArticle($articleId);

	        if ($deleteArticle === false):
	                throw new \Exception('Impossible de supprimer cet article, veuillez recommencer !');
	        else:
	                Header('Location: index.php?action=pageAllArticles');
	        endif;      		
	}

	//Supression d'une catégorie		
	function deleteCategorie($categorieId){
      	$articleManager = new ArticleManager();

	      	$deleteCategorie = $articleManager->deleteCategorie($categorieId);
	      	//die(var_dump($articleId));
	        if ($deleteCategorie === false):
	                throw new \Exception('Impossible de supprimer la catégorie, veuillez recommencer !');
	        else:
	                Header('Location: index.php?action=pageAdmin');
	        endif;      		
	}
}