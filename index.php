 <?php
 session_start();

 	//Récupértion des fichiers nécessaire
 	require_once('controller/frontend.php');
 	require_once('controller/backend.php');

	// Début  des tests	
	try
	{
			if (isset($_GET['action'])){
				if ($_GET['action'] == "pageAccueil"){
					pageAccueil();
				}
			}









			 else{
		 		pageAccueil();
			}

	} 
	// Fin des tests
   	
  	//Gestion des erreurs	
	catch(Exception $e)
	{
	    error($e);
	}