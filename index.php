 <?php
 ob_start();
 session_start();

 	//Récupértion des fichiers nécessaire
 	require_once('controller/frontend.php');
 	require_once('controller/backend.php');

	// Début  des tests
	try
	{
			if (isset($_GET['action'])){
				if ($_GET['action'] == "pageAccueil") {
					pageAccueil();
				
				} else if ($_GET['action'] == "pageActualites") {
					pageActualites();
					
				} else if ($_GET['action'] == "pageContact") {
					pageContact();
					
				} else if ($_GET['action'] == "pageInscription") {
					pageInscription();
					
				} else if ($_GET['action'] == "pageConnexion") {
					pageConnexion();
					
				} else if ($_GET['action'] == "pageDeconnexion") {
					pageDeconnexion();
					
				} else if ($_GET['action'] == "pageMentionLegales") {
					pageMentionLegales();

				} else if ($_GET['action'] == "pageApropos") {
					pageApropos();	

				} elseif ($_GET['action'] == 'pageAjoutArticle'){
					pageAjoutArticle();

				} else if ($_GET['action'] == "pageCategorie") {
					if (isset($_GET['idCategorie'])) {
						pageCategorie();
					}  else{
		 				pageAccueil();
					}
				
				} else if ($_GET['action'] == "pageProfil") {
					pageProfil();

				} else if ($_GET['action'] == "infoProfil") {
					if (isset($_SESSION['id']) || ($_SESSION['admin'])){
						infoProfil();
					} else {
					pageAccueil();
					}

				} else if ($_GET['action'] == "pageGestionProfil") {
					pageGestionProfil();

				} else if ($_GET['action'] == "pageAvatar") {
					pageAvatar();

				} else if ($_GET['action'] == "pageAdmin") {
					pageAdmin();

				} elseif ($_GET['action'] == "pageMdpOublie") {
					pageMdpOublie();

				} else if ($_GET['action'] == "article"){		 	
					if(isset($_GET['id']) && $_GET['id'] > 0){
	 					article();	
	 				} else {
	                		throw new Exception('Aucun identifiant de billet envoyé');
	            	} 
			
				} elseif ($_GET['action'] == 'pageAllArticles'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						pageAllArticles();
					} else {
						pageAccueil();
					}

				} elseif ($_GET['action'] == 'addMember'){
						if (!empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['mdp2']) && !empty($_POST['mail'])){
							if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
								if ($_POST['mdp'] == $_POST['mdp2']){
									addMember($_POST['pseudo'], $_POST['mdp'], $_POST['mail']);
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
	 							addComment($_GET['id'], $_POST['commentaire'], $_SESSION['id']);

	 						} else{
	 							   throw new Exception(" Veuillez entrer un commentaire !");
	 						}

	 					} else{
	 						   throw new Exception("Aucun identifiant de billet envoyé");		
	 					}
	 									
				} elseif ($_GET['action'] == 'addArticle'){
						if (!empty($_POST['titreArticle']) && !empty($_POST['contenu']) && !empty($_POST['image_article'])){
							newArticle($_POST['titreArticle'], $_POST['contenu'], $_POST['image_article']);
							Header('Location: index.php?action=pageAdmin');
						} 
						else {
							  throw new Exception('Veuillez remplir tout les champs !');
						}

				} elseif ($_GET['action'] == 'deleteArticle'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						deleteArticle($_GET['id']);
					} else {
						pageAccueil();
					}

				} elseif ($_GET['action'] == 'pageModifArticle'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						pageModifArticle($_GET['id']);
					} else {
						pageAccueil();
					}

				} elseif ($_GET['action'] == 'articleModif'){
					if (isset($_GET['id']) && $_GET['id'] > 0){
						articleModif($_GET['id']);
					} else {
						pageAccueil();
					}

				} elseif ($_GET['action'] == 'pageConnexionSubmit'){
					pageConnexionSubmit($_POST['pseudoConnect'], $_POST['mdpConnect']);
				
				} elseif ($_GET['action'] == 'modifMember'){	
						if (!empty($_POST['newMdp']) && !empty($_POST['newMdp2']) || !empty($_POST['newMail']) || !empty($_POST['avatar'])){
							if (filter_var($_POST['newMail'], FILTER_VALIDATE_EMAIL)){

								if ($_POST['newMdp'] == $_POST['newMdp2']){
										modifMember($_POST['newMdp'], $_POST['newMail'], $_POST['avatar']);		
								}
								else {
									  throw new Exception('Les deux mots de passe ne correspondent pas.');
								}
							} else {
									throw new Exception('Pas d\'adresse mail valide.');
								}
						} else {
								throw new Exception('Veuillez modifier au moins un champ !');
						}

				} elseif ($_GET['action'] == 'pageCommentArticle'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						pageCommentArticle($_GET['id']);
					} else {
						pageAccueil();
					}						

				} elseif ($_GET['action'] == 'deleteComment'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						deleteComment($_GET['id']);
					} else {
						pageAccueil();
					}

				} elseif ($_GET['action'] == 'deleteCommentSignale'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						deleteCommentSignale($_GET['id']);
					} else {
						pageAccueil();
					}					
	
				} elseif ($_GET['action'] == 'reportComment'){
					if (isset($_SESSION['id']) && isset($_GET['idArticle']) && isset($_GET['idComment'])){
						reportComment($_GET['idArticle'], $_GET['idComment']);
					} else {
						pageAccueil();
					}
					
				} elseif ($_GET['action'] == 'notReportComment'){
					if (isset($_SESSION['id']) && ($_SESSION['admin'])){
						notReportComment($_GET['id']);
					} else {
						pageAccueil();
					}

				} elseif ($_GET['action'] == 'pageCommentaireSignale'){
				 	pageCommentaireSignale();	
				
				}
			} else{
		 		pageAccueil();
			}
			
	} 
	// Fin des tests
   	
  	//Gestion des erreurs	
	catch(Exception $e)
	{
	    error($e);
	}