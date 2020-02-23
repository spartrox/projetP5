 <?php
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
					
				} else if ($_GET['action'] == "pageVoitureAllemande") {
					pageVoitureAllemande();

				} else if ($_GET['action'] == "pageVoitureAmericaine") {
					pageVoitureAmericaine();
					
				} else if ($_GET['action'] == "pageVoitureFrancaise") {
					pageVoitureFrancaise();

				} else if ($_GET['action'] == "pageVoitureItalienne") {
					pageVoitureItalienne();

				} else if ($_GET['action'] == "pageGestionProfil") {
					pageGestionProfil();

				} else if ($_GET['action'] == "pageGestionAdmin") {
					pageGestionAdmin();
			
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