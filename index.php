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
				
				} else if ($_GET['action'] == "pageAcualites") {
					
				} else if ($_GET['action'] == "pageContact") {
					
				} else if ($_GET['action'] == "pageInscription") {
					
				} else if ($_GET['action'] == "pageConnexion") {
					
				} else if ($_GET['action'] == "pageDeconnexion") {
					
				} else if ($_GET['action'] == "pageMentionLegales") {
					
				} else if ($_GET['action'] == "pageVoitureAllemande") {
					
				} else if ($_GET['action'] == "pageVoitureFrancaise") {

				} else if ($_GET['action'] == "pageVoitureItalienne") {

				} else if ($_GET['action'] == "pageVoitureSpartive") {

				} else if ($_GET['action'] == "pageVoitureGestionProfil") {

				} else if ($_GET['action'] == "pageVoitureGestionAdmin") {
			









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