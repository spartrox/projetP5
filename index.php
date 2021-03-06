<?php
ob_start();
session_start();

 	//Récupértion des fichiers nécessaire 	
 	require "vendor/autoload.php";

 use controller\Backend;
 use controller\Frontend;

	// Début  des tests
	try
	{
			if (isset($_GET['action'])){
												////////////////// AFFICHAGE DES DIFFÉRENTES PAGES DU SITE /////////////////////////

				if ($_GET['action'] == "pageAccueil") {
					$pageAccueil = new Frontend();

					$pageAccueil->pageAccueil();
				
				} else if ($_GET['action'] == "pageActualites") {
					$pageActualites = new Frontend();

					$pageActualites->pageActualites();					
					
				} else if ($_GET['action'] == "categorieMenu") {
					$categorieMenu = new Frontend();

					$categorieMenu->categorieMenu();									

				} else if ($_GET['action'] == "pageContact") {
					$pageContact = new Frontend();

					$pageContact->pageContact();					

				} else if ($_GET['action'] == "pageInscription") {
					$pageInscription = new Frontend();

					$pageInscription->pageInscription();					
					
				} else if ($_GET['action'] == "pageConnexion") {
					$pageConnexion = new Frontend();

					$pageConnexion->pageConnexion();					
					
				} else if ($_GET['action'] == "pageDeconnexion") {
					$pageDeconnexion = new Frontend();

					$pageDeconnexion->pageDeconnexion();					
					
				} else if ($_GET['action'] == "pageMentionLegales") {
					$pageMentionLegales = new Frontend();

					$pageMentionLegales->pageMentionLegales();					

				} else if ($_GET['action'] == "pageApropos") {
					$pageApropos = new Frontend();

					$pageApropos->pageApropos();					

				} else if ($_GET['action'] == "pageProfil") {
					if (isset($_SESSION['id']) || ($_SESSION['admin'])):
						$pageProfil = new Frontend();

						$pageProfil->pageProfil();
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();						
					endif;

				} else if ($_GET['action'] == "pageAvatar") {
					$pageAvatar = new Frontend();

					$pageAvatar->pageAvatar();					

				} else if ($_GET['action'] == "pageAdmin") {
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):					
					$pageAdmin = new Backend();

					$pageAdmin->pageAdmin();

					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();						
					endif;

				} elseif ($_GET['action'] == "pageMdpOublie") {
					$pageMdpOublie = new Frontend();

					$pageMdpOublie->pageMdpOublie();					

				} else if ($_GET['action'] == "article"){		 	
					if(isset($_GET['id']) && $_GET['id'] > 0):
						$article = new Frontend();

						$article->article();
	 				else:
	                		throw new \Exception('Aucun identifiant de billet envoyé');
	            	endif; 

				} else if ($_GET['action'] == "articleCategorie"){		 	
					if(isset($_GET['id']) && $_GET['id'] > 0):
						$articleCategorie = new Frontend();

						$articleCategorie->articleCategorie();
	 				else:
	                		throw new \Exception('Aucun identifiant de billet envoyé');
	            	endif;

				} elseif ($_GET['action'] == 'pageAllArticles'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$pageAllArticles = new Backend();

						$pageAllArticles->pageAllArticles();
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;

				} elseif ($_GET['action'] == 'pageConnexionSubmit'){
					$pageConnexionSubmit = new Frontend();

					$pageConnexionSubmit->pageConnexionSubmit($_POST['pseudoConnect'], $_POST['mdpConnect']);					

				} elseif ($_GET['action'] == 'pageCommentArticle'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$pageCommentArticle = new Backend();

						$pageCommentArticle->pageCommentArticle($_GET['id']);
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;
					
				} elseif ($_GET['action'] == 'pageCommentaireSignale'){
					$pageCommentaireSignale = new Backend();

					$pageCommentaireSignale->pageCommentaireSignale();
				
				} elseif ($_GET['action'] == 'pageMessage'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$pageMessage = new Backend();

						$pageMessage->pageMessage();
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;				

				} elseif ($_GET['action'] == 'pageMessageEntier'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$pageMessageEntier = new Backend();

						$pageMessageEntier->pageMessageEntier();
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;				

												////////////////// AFFICHAGE DES ACTIONS D'AJOUT /////////////////////////

				} elseif ($_GET['action'] == 'pageAjoutArticle') {
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$pageAjoutArticle = new Frontend();

						$pageAjoutArticle->pageAjoutArticle();

					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;

				} else if ($_GET['action'] == "pageAjoutCategorie") {
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$pageAjoutCategorie = new Frontend();

						$pageAjoutCategorie->pageAjoutCategorie();

					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;

				} elseif ($_GET['action'] == 'addMember'){
						if (!empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']) && !empty($_POST['mail'])):
							if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)):
								if ($_POST['mdp'] == $_POST['mdp2']):

									$addMember = new Frontend();

									$addMember->addMember($_POST['pseudo'], $_POST['mail'], $_POST['mdp']);
								
								else:
									  throw new \Exception('Les deux mots de passe ne correspondent pas.');
								endif;

							else:
									throw new \Exception('Pas d\'adresse mail valide.');
							endif;

						else:
								throw new \Exception('Tous les champs ne sont pas remplis !');
						endif;

	 			} elseif ($_GET['action'] == 'addComment'){
	 					if (isset($_GET['id']) && $_GET['id'] > 0):
	 						if (!empty($_SESSION['pseudo']) && !empty($_POST['commentaire'])):
								$addComment = new Frontend();

								$addComment->addComment($_GET['id'], $_POST['commentaire'], $_SESSION['id']);

	 						else:
	 							   throw new \Exception(" Veuillez entrer un commentaire !");
	 						endif;

	 					else:
	 						   throw new \Exception("Aucun identifiant de billet envoyé");		
	 					endif;
	 									
				} elseif ($_GET['action'] == 'newArticle'){
						if (!empty($_POST['titreArticle']) && !empty($_POST['contenu']) && !empty($_POST['categorie_article']) && !empty($_FILES['image_article']['name'])):
							$newArticle = new Backend();
							
							$newArticle->newArticle($_POST['titreArticle'], $_POST['contenu'], $_POST['categorie_article'], $_FILES['image_article']['name']);

							Header('Location: index.php?action=pageAdmin');
						
						else:
							  throw new \Exception('Veuillez remplir tout les champs !');
						endif;

				} elseif ($_GET['action'] == 'newAvatar'){
						if (!empty($_FILES['inputAvatar']['name'])):
							$newAvatar = new Backend();

							$newAvatar->newAvatar($_FILES['inputAvatar']['name']);
							Header('Location: index.php?action=pageProfil');
						
						else:
							  throw new \Exception('Veuillez ajouter un avatar au format : PNG, JPG ou JPEG !');
						endif;

				} elseif ($_GET['action'] == 'newCategorie'){
						if (!empty($_POST['titreCategorie'])):
							$newCategorie = new Backend();

							$newCategorie->newCategorie($_POST['titreCategorie']);
							Header('Location: index.php?action=pageAjoutCategorie');
						
						else:
							  throw new \Exception('Veuillez entrer le nom d\'une nouvelle categorie !');
						endif;

				} else if ($_GET['action'] == "newMessage") {
						if (!empty($_POST['nom_message']) && !empty($_POST['email_message']) && !empty($_POST['sujet_message']) && !empty($_POST['contenu_message'])):
							$newMessage = new Frontend();

							$newMessage->newMessage($_POST['nom_message'], $_POST['email_message'], $_POST['sujet_message'], $_POST['contenu_message']);
							Header('Location: index.php?action=pageContact');
						
						else:
							  throw new \Exception('Veuillez remplir tout les champs !');
						endif;

												////////////////// AFFICHAGE DES ACTIONS DE SUPPRESSION /////////////////////////

				} elseif ($_GET['action'] == 'deleteArticle'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$deleteArticle = new Backend();

						$deleteArticle->deleteArticle($_GET['id']);
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;

				} elseif ($_GET['action'] == 'deleteCategorie'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$deleteCategorie = new Backend();

						$deleteCategorie->deleteCategorie($_GET['id']);
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;

				} elseif ($_GET['action'] == 'deleteComment'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$deleteComment = new Backend();

						$deleteComment->deleteComment($_GET['id']);
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;

				} elseif ($_GET['action'] == 'deleteCommentSignale'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$deleteCommentSignale = new Backend();

						$deleteCommentSignale->deleteCommentSignale($_GET['id']);
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;	

												////////////////// AFFICHAGE DES ACTIONS DE MODIFICATION /////////////////////////

				} else if ($_GET['action'] == "mdpModif") {
					if (isset($_SESSION['id']) || ($_SESSION['admin'])):
						if (!empty($_POST['newMdp'])):
							$mdpModif = new Frontend();

							$mdpModif->mdpModif($_SESSION['id']);
						else:
							throw new \Exception('Veuillez entrer un nouveau mot de passe !');
						endif;

					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;

				} else if ($_GET['action'] == "mailModif") {
					if (isset($_SESSION['id']) || ($_SESSION['admin'])):
						if (!empty($_POST['newMail'])):
							$mailModif = new Frontend();

							$mailModif->mailModif($_SESSION['id']);
						else:
							throw new \Exception('Veuillez entrer une nouvelle addresse mail !');
						endif;

					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;

				} elseif ($_GET['action'] == 'pageModifArticle'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$pageModifArticle = new Backend();

						$pageModifArticle->pageModifArticle($_GET['id']);
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;

				} elseif ($_GET['action'] == 'pageModifCategorie'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$pageModifCategorie = new Backend();

						$pageModifCategorie->pageModifCategorie($_GET['id']);
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;

				} elseif ($_GET['action'] == 'categorieModif'){
					if (isset($_GET['id']) && $_GET['id'] > 0):
						$categorieModif = new Backend();

						$categorieModif->categorieModif($_GET['id']);
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;

				} elseif ($_GET['action'] == 'articleModif'){
					if (isset($_GET['id']) && $_GET['id'] > 0):
						$articleModif = new Backend();

						$articleModif->articleModif($_GET['id']);
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;										
	
				} elseif ($_GET['action'] == 'reportComment'){
					if (isset($_SESSION['id']) && isset($_GET['idArticle']) && isset($_GET['idComment'])):
						$reportComment = new Frontend();

						$reportComment->reportComment($_GET['idArticle'], $_GET['idComment']);
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;
					
				} elseif ($_GET['action'] == 'notReportComment'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])):
						$notReportComment = new Frontend();

						$notReportComment->notReportComment($_GET['id']);
					else:
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					endif;
				}

			} else{
					$pageAccueil = new Frontend();

					$pageAccueil->pageAccueil();
			}
			
	} 
	// Fin des tests
   	
  	//Gestion des erreurs	
	catch(Exception $e)
	{
		$errorController = new Frontend();

	    $errorController->error($e);
	}