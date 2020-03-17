<?php

	//chargement des différents classes
   	require_once('model/articleManager.php');
  	require_once('model/commentManager.php');
    require_once('model/memberManager.php');

	//Création des différentes fonction
	function pageContact(){

		require('view/frontend/affichageContact.php');
	}
	
	function pageInscription(){

		require('view/frontend/affichageInscription.php');
	}
	
	function pageConnexion(){

		require('view/frontend/affichageConnexion.php');
	}
	
	function pageDeconnexion(){

		require('view/frontend/affichageDeconnexion.php');
	}
	
	function pageMentionLegales(){

		require('view/frontend/affichageMentionLegales.php');
	}

	function pageApropos(){

		require('view/frontend/affichageApropos.php');
	}

	function pageVoitureCategorie(){

		require('view/frontend/affichageVoitureAllemande.php');
	}

	function pageProfil(){

		require('view/frontend/affichageProfil.php');
	}

	function pageGestionProfil(){

		require('view/frontend/affichageGestionProfil.php');
	}

	function pageAvatar(){

		require('view/frontend/affichageAvatar.php');
	}

  function pageMdpOublie(){

    require('view/frontend/affichageMdpOublie.php');
  }

  function pageAjoutArticle(){

    require('view/backend/affichageAjoutArticle.php');
  }
  
  function pageAccueil(){
      $articleManager = new ArticleManager();

      $articles = $articleManager->getArticlesAccueil();

        if ($articles === false){
                throw new Exception('Impossible d\'afficher la page des articles, veuillez recommencer !');
        } else{
                require('view/frontend/affichageAccueil.php');
        }
  }
  
  function pageActualites(){
      $articleManager = new ArticleManager();

      $articles = $articleManager->getArticles();
        if ($articles === false){
                throw new Exception('Impossible d\'afficher la page des articles, veuillez recommencer !');
        } else{
                require('view/frontend/affichageActualites.php');
        }
  }

		//Ajout d'un membre
   	function addMember($pseudo, $mdp, $mail){
     	$memberManager = new MemberManager();
        
        $pseudoExist = $memberManager->checkPseudo($pseudo);
        $mailExist = $memberManager->checkMail($mail);  
          if ($pseudoExist){
              throw new Exception('Pseudo déja utilisé, veuillez en trouver un autre !');
          }

          if ($mailExist){
              throw new Exception('Adresse mail déja utilisé, veuillez en trouver une autre !');
          }

            if (!($pseudoExist) && !($mailExist)){

                $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                $newMember = $memberManager->createMember($pseudo, $mail, $mdp,);
            	header('Location: index.php?action=pageConnexion');
            } else {
                    throw new Exception('Erreurs lors de l\'inscription veuillez recommencer !');
   	        }
    }

        //Bouton page connexion
    function pageConnexionSubmit($pseudo, $mdp){
        $memberManager = new MemberManager();

        $member = $memberManager->loginMember($pseudo);
        $mdpCorrect = password_verify($_POST['mdpConnect'], $member['motdepasse']);

        if (!isset($member['id'])){
              throw new Exception("Mauvais identifiant !");
          }
            else {
                if ($mdpCorrect){
                  if (isset($_POST['rememberme'])){
                      setcookie('pseudo&mdp',$pseudo,time()+365*24*3600,null,null,false,true);
                  }
                  $_SESSION['id'] = $member['id'];
                  $_SESSION['pseudo'] = $member['pseudo'];
                  $_SESSION['admin'] = $member['admin'];
                  header('Location: index.php');
                }
                  else {
                    throw new Exception("Mauvais mot de passe !");
                  }
                }
    }

    	//Affichage de la page Article et Commentaire
    function article(){
    	$articleManager = new ArticleManager();
      $commentManager = new CommentManager();
    	
      $article = $articleManager->getArticle($_GET['id']);
      $comments = $commentManager->articleComments($_GET['id']);
      $reportComments = $commentManager->reportComment($_GET['id']);
        
        if ($article && $comments === false){
                throw new Exception('Impossible d\'afficher la page de l\'article, veuillez recommencer !');
        } else{
     		        require('view/frontend/affichageArticle.php');
     	  }
    }

    //Ajout commentaire
    function addComment($article, $commentaire, $pseudo){
          $commentManager = new CommentManager();
          
          $addComment = $commentManager->addComment($article, $commentaire, $pseudo);

          if ($addComment === false) {
              throw new Exception('Impossible d\'ajouter le commentaire !');
          
          } else {
            header('Location: index.php?action=article&id=' . $article);
        }
    }
      //Récupération d'éléments pour la pageProfil
    function infoProfil(){
        $memberManager = new MemberManager();

        $infoMember = $memberManager->getMember($_GET['id']); 
            

        if ($infoMember === false){
                throw new Exception('Erreurs lors de la récupération de vos informations, veuillez recommencer !');
        } else{
                require('view/frontend/affichageProfil.php');
        }
    }

    	//Bouton modification d'un membre
    function modifMember($memberId){
    	$memberManager = new MemberManager();

    	$modifMember = $memberManager->modifMember($memberId);

   		if (isset($_FILES['avatar']) AND !empty($_FILES['avatar']['name'])) {
   			$tailleMax = 2097152;
   			$extensionsValides = array('jpg', 'jpeg', 'gif', 'png');
   		
   			if($_FILES['avatar']['size'] <= $tailleMax) {
   				$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));
   				
   				if (in_array($extensionUpload, $extensionsValides)) {
					$chemin = "publics/members/".$_SESSION['id'] . "." . $extensionUpload;
         			$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);   					
   					
   					if($resultat) {

            			$updateavatar = $memberManager->updateavatar();
            			$updateavatar->execute(array(
               				'avatar' => $_SESSION['id'] . "." . $extensionUpload,
               				'id' => $_SESSION['id']
               			));
            			header('Location: index.php');
			        
			        } else {
			            throw new Exception("Erreur durant l'importation de votre photo de profil");
			        }
   				
   				} else{
   					throw new Exception("Votre photo de profil doit être au format jpg, jpeg, gif ou png");	
   				}
   			
   			} else {
				throw new Exception("Votre photo de profil ne doit pas dépasser 2Mo");
			}
		}


		if ($modifMember === false){
				throw new Exception('Impossible de modifier votre profil, veuillez recommencer !');
		} else{
				Header('Location: index.php');
		}    	
    }

    //Report d'un commentaire
    function reportComment($idArticle, $idComment){
        $commentManager = new CommentManager();

        $repComments = $commentManager->reportComment($idComment);

          if ($repComments === false) {
              throw new Exception('Impossible de signaler ce commentaire !');
          
          } else {
            header('Location: index.php?action=article&id=' . $idArticle);
        }
    }

    //Retirer le signalement d'un commentaire
    function notReportComment($reportId){
      $commentManager = new CommentManager();

      $reportComments = $commentManager-> notReportComment($reportId);

      if ($reportComments === false){
          throw new Exception('Impossible de retirer le signalement, veuillez recommencer !');
      } else{
          Header('Location: index.php?action=pageCommentaireSignale');
      }

  }



























	//Affichage des erreurs
   	function error($e){

     	require('view/frontend/affichageMessageErreur.php');
  	}