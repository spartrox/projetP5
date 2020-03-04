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

				} else if ($_GET['action'] == "pageVoitureAllemande") {
					pageVoitureAllemande();

				} else if ($_GET['action'] == "pageVoitureAmericaine") {
					pageVoitureAmericaine();
					
				} else if ($_GET['action'] == "pageVoitureFrancaise") {
					pageVoitureFrancaise();

				} else if ($_GET['action'] == "pageVoitureItalienne") {
					pageVoitureItalienne();

				} else if ($_GET['action'] == "pageProfil") {
					pageProfil();

				} else if ($_GET['action'] == "pageGestionProfil") {
					pageGestionProfil();

				} else if ($_GET['action'] == "pageAvatar") {
					pageAvatar();

				} else if ($_GET['action'] == "pageGestionAdmin") {
					pageGestionAdmin();
			
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

				} elseif ($_GET['action'] == 'pageConnexionSubmit'){
					pageConnexionSubmit($_POST['pseudoconnect'], $_POST['mdpConnect']);
				
				} elseif ($_GET['action'] == 'modifMember'){	
						if (!empty($_POST['newMdp']) && !empty($_POST['newMdp2']) || !empty($_POST['newMail']) || !empty($_POST['avatar'])){
							//if (filter_var($_POST['newMail'], FILTER_VALIDATE_EMAIL)){

								if ($_POST['newMdp'] == $_POST['newMdp2']){
										modifMember($_POST['newMdp'], $_POST['newMail'], $_POST['avatar']);		
								}
								else {
									  throw new Exception('Les deux mots de passe ne correspondent pas.');
								}
							//} else {
							//		throw new Exception('Pas d\'adresse mail valide.');
							//	}
						} else {
								throw new Exception('Veuillez modifier au moins un champ !');
						}
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