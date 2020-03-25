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
				if ($_GET['action'] == "pageAccueil") {
					$pageAccueil = new Frontend();

					$pageAccueil->pageAccueil();
				
				} else if ($_GET['action'] == "pageActualites") {
					$pageActualites = new Frontend();

					$pageActualites->pageActualites();					
					
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

				} elseif ($_GET['action'] == 'pageAjoutArticle') {
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
					$pageAjoutArticle = new Frontend();

					$pageAjoutArticle->pageAjoutArticle();

					}  else{
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}

				} else if ($_GET['action'] == "pageAjoutCategorie") {
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						$pageAjoutCategorie = new Frontend();

						$pageAjoutCategorie->pageAjoutCategorie();

					}  else{
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}
				
				} else if ($_GET['action'] == "pageProfil") {
					if (isset($_SESSION['id']) || ($_SESSION['admin'])){
						$pageProfil = new Frontend();

						$pageProfil->pageProfil();
					} else{
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();						
					}
					
				} else if ($_GET['action'] == "infoProfil") {
					if (isset($_SESSION['id']) || ($_SESSION['admin'])){
						$infoProfil = new Frontend();

						$infoProfil->infoProfil();					

					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}

				} else if ($_GET['action'] == "pageAvatar") {
					$pageAvatar = new Frontend();

					$pageAvatar->pageAvatar();					

				} else if ($_GET['action'] == "pageAdmin") {
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){					
					$pageAdmin = new Backend();

					$pageAdmin->pageAdmin();

					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();						
					}

				} else if ($_GET['action'] == "categorieMenu") {				
					$categorieMenu = new Backend();

					$categorieMenu->categorieMenu();

				} elseif ($_GET['action'] == "pageMdpOublie") {
					$pageMdpOublie = new Frontend();

					$pageMdpOublie->pageMdpOublie();					

				} else if ($_GET['action'] == "article"){		 	
					if(isset($_GET['id']) && $_GET['id'] > 0){
						$article = new Frontend();

						$article->article();
	 				} else {
	                		throw new Exception('Aucun identifiant de billet envoyé');
	            	} 
			
				} elseif ($_GET['action'] == 'pageAllArticles'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						$pageAllArticles = new Backend();

						$pageAllArticles->pageAllArticles();
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}

				} elseif ($_GET['action'] == 'addMember'){
						if (!empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']) && !empty($_POST['mail'])){
							if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
								if ($_POST['mdp'] == $_POST['mdp2']){
									$addMember = new Frontend();

									$addMember->addMember($_POST['pseudo'], $_POST['mdp'], $_POST['mail']);
								}
								else {
									  throw new Exception('Les deux mots de passe ne correspondent pas.');
								}
							} else {
									throw new Exception('Pas d\'adresse mail valide.');
								}
						} else {
								throw new Exception('Tous les champs ne sont pas remplis !');
						}

	 			} elseif ($_GET['action'] == 'addComment'){
	 					if (isset($_GET['id']) && $_GET['id'] > 0){
	 						if (!empty($_SESSION['pseudo']) && !empty($_POST['commentaire'])){
								$addComment = new Frontend();

								$addComment->addComment($_GET['id'], $_POST['commentaire'], $_SESSION['id']);

	 						} else{
	 							   throw new Exception(" Veuillez entrer un commentaire !");
	 						}

	 					} else{
	 						   throw new Exception("Aucun identifiant de billet envoyé");		
	 					}
	 									
				} elseif ($_GET['action'] == 'newArticle'){
						if (!empty($_POST['titreArticle']) && !empty($_POST['contenu']) && !empty($_POST['image_article'])){
							$newArticle = new Backend();

							$newArticle->newArticle($_POST['titreArticle'], $_POST['contenu'], $_POST['image_article']);
							Header('Location: index.php?action=pageAdmin');
						} 
						else {
							  throw new Exception('Veuillez remplir tout les champs !');
						}

				} elseif ($_GET['action'] == 'newCategorie'){
						if (!empty($_POST['titreCategorie'])){
							$newCategorie = new Backend();

							$newCategorie->newCategorie($_POST['titreCategorie']);
							Header('Location: index.php?action=pageAjoutCategorie');
						} 
						else {
							  throw new Exception('Veuillez entrer le nom d\'une nouvelle categorie !');
						}

				} else if ($_GET['action'] == "newMessage") {
						if (!empty($_POST['nom_message']) && !empty($_POST['email_message']) && !empty($_POST['sujet_message']) && !empty($_POST['contenu_message'])){
							$newMessage = new Backend();

							$newMessage->newMessage($_POST['nom_message'], $_POST['email_message'], $_POST['sujet_message'], $_POST['contenu_message']);
							Header('Location: index.php?action=pageContact');
						}
						else {
							  throw new Exception('Veuillez remplir tout les champs !');
						}

				} elseif ($_GET['action'] == 'deleteArticle'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						$deleteArticle = new Backend();

						$deleteArticle->deleteArticle($_GET['id']);
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}

				} elseif ($_GET['action'] == 'deleteCategorie'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						$deleteCategorie = new Backend();

						$deleteCategorie->deleteCategorie($_GET['id']);
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}

				} else if ($_GET['action'] == "modifMail") {
					if (isset($_SESSION['id']) || ($_SESSION['admin'])){
						if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){						
							if (!empty($_POST['titreArticle'])){
								$modifMail = new Frontend();

								$modifMail->modifMail($_GET['id']);
							} else {
								throw new Exception('Veuillez entrer une nouvelle adresse mail !');
							}
								
						} else {
							throw new Exception('Pas d\'adresse mail valide.');
							}
					
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}

				} else if ($_GET['action'] == "modifMdp") {
					if (isset($_SESSION['id']) || ($_SESSION['admin'])){
						if (!empty($_POST['newMdp'])){
							$modifMdp = new Frontend();

							$modifMdp->modifMdp($_GET['id']);
						} else {
							throw new Exception('Veuillez entrer un nouveau mot de passe !');
						}

					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}

				} elseif ($_GET['action'] == 'pageModifArticle'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						$pageModifArticle = new Backend();

						$pageModifArticle->pageModifArticle($_GET['id']);
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}

				} elseif ($_GET['action'] == 'pageModifCategorie'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						$pageModifCategorie = new Backend();

						$pageModifCategorie->pageModifCategorie($_GET['id']);
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}

				} elseif ($_GET['action'] == 'articleModif'){
					if (isset($_GET['id']) && $_GET['id'] > 0){
						$articleModif = new Backend();

						$articleModif->articleModif($_GET['id']);
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}

				} elseif ($_GET['action'] == 'pageConnexionSubmit'){
					$pageConnexionSubmit = new Frontend();

					$pageConnexionSubmit->pageConnexionSubmit($_POST['pseudoConnect'], $_POST['mdpConnect']);					

				} elseif ($_GET['action'] == 'pageCommentArticle'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						$pageCommentArticle = new Backend();

						$pageCommentArticle->pageCommentArticle($_GET['id']);
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}						

				} elseif ($_GET['action'] == 'deleteComment'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						$deleteComment = new Backend();

						$deleteComment->deleteComment($_GET['id']);
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}

				} elseif ($_GET['action'] == 'deleteCommentSignale'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						$deleteCommentSignale = new Backend();

						$deleteCommentSignale->deleteCommentSignale($_GET['id']);
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}					
	
				} elseif ($_GET['action'] == 'reportComment'){
					if (isset($_SESSION['id']) && isset($_GET['idArticle']) && isset($_GET['idComment'])){
						$reportComment = new Frontend();

						$reportComment->reportComment($_GET['idArticle'], $_GET['idComment']);
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}
					
				} elseif ($_GET['action'] == 'notReportComment'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						$notReportComment = new Frontend();

						$notReportComment->notReportComment($_GET['id']);
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}

				} elseif ($_GET['action'] == 'pageCommentaireSignale'){
					$pageCommentaireSignale = new Backend();

					$pageCommentaireSignale->pageCommentaireSignale();
				
				} elseif ($_GET['action'] == 'pageMessage'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						$pageMessage = new Backend();

						$pageMessage->pageMessage();
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}				

				} elseif ($_GET['action'] == 'pageMessageEntier'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						$pageMessageEntier = new Backend();

						$pageMessageEntier->pageMessageEntier();
					} else {
						$pageAccueil = new Frontend();

						$pageAccueil->pageAccueil();
					}				
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
	    error($e);
	}