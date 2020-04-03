<?php

    namespace controller;
    require "vendor/autoload.php";
    //require "recaptcha/autoload.php";


use model\CommentManager;
use model\ArticleManager;
use model\MessageManager;  
use model\MemberManager;

class Frontend {
                        ////////////////// FONCTION AFFICHAGE /////////////////////////

    	function pageContact(){
        $articleManager = new ArticleManager();
        $categories = $articleManager-> getCategories();
    		  require('view/frontend/affichageContact.php');
    	}
    	
    	function pageInscription(){
        $articleManager = new ArticleManager();
        $categories = $articleManager-> getCategories();
    		  require('view/frontend/affichageInscription.php');
    	}
    	
    	function pageConnexion(){
        $articleManager = new ArticleManager();
        $categories = $articleManager-> getCategories();
    		  require('view/frontend/affichageConnexion.php');
    	}
    	
    	function pageDeconnexion(){
        $articleManager = new ArticleManager();
        $categories = $articleManager-> getCategories();
    		  require('view/frontend/affichageDeconnexion.php');
    	}
    	
    	function pageMentionLegales(){
        $articleManager = new ArticleManager();
        $categories = $articleManager-> getCategories();
    		  require('view/frontend/affichageMentionLegales.php');
    	}

    	function pageApropos(){
        $articleManager = new ArticleManager();
        $categories = $articleManager-> getCategories();
    		  require('view/frontend/affichageApropos.php');
    	}

    	function pageVoitureCategorie(){
        $articleManager = new ArticleManager();
        $categories = $articleManager-> getCategories();
    		  require('view/frontend/affichageVoitureAllemande.php');
    	}

    	function pageAvatar(){
        $articleManager = new ArticleManager();
        $categories = $articleManager-> getCategories();
    		  require('view/frontend/affichageAvatar.php');
    	}

      function pageMdpOublie(){
        $articleManager = new ArticleManager();
        $categories = $articleManager-> getCategories();
          require('view/frontend/affichageMdpOublie.php');
      }

      function pageAjoutArticle(){
        $articleManager = new ArticleManager();
        $categories = $articleManager-> getCategories();
        $categoriess = $articleManager-> getCategoriess();
        
          require('view/backend/affichageAjoutArticle.php');
      }

      function pageAjoutCategorie(){
        $articleManager = new ArticleManager();   
        $categories  =  $articleManager-> getCategories();
        $categoriess  =  $articleManager-> getCategoriess();                
          require('view/backend/affichageAjoutCategorie.php');
      }

      //Affichage  page Accueil
      function pageAccueil(){
        $articleManager = new ArticleManager();
        $articleManager = new ArticleManager();

          $articles = $articleManager->getArticlesAccueil();
          $categories  =  $articleManager-> getCategories();
          $categoriess = $articleManager-> getCategoriess();

            if ($articles === false):
                    throw new \Exception('Impossible d\'afficher la page des articles, veuillez recommencer !');
            else:
                    require('view/frontend/affichageAccueil.php');
            endif;
      }

      //Affichage page Actualités
      function pageActualites(){
        $articleManager = new ArticleManager();

          $articles = $articleManager->getArticles();
          $categories  =  $articleManager-> getCategories();
          $categoriess = $articleManager-> getCategoriess();
                    
            if ($articles === false):
                    throw new \Exception('Impossible d\'afficher la page des articles, veuillez recommencer !');
            else:
                    require('view/frontend/affichageActualites.php');
            endif;
      }

      //Bouton page connexion
      function pageConnexionSubmit($pseudo, $mdp){
        $memberManager = new MemberManager();


        /*  $recaptcha = new \ReCaptcha\ReCaptcha('6Lcv7d4UAAAAAB6SVpcC7Zqw7GRw3rRAx4vo8aho');
          $resp = $recaptcha->setExpectedHostname('recaptcha-demo.appspot.com')
                            ->verify($_POST['g-recaptcha-response']);
          if ($resp->isSuccess()):
              var_dump('Captcha Valide');
          else:
              $errors = $resp->getErrorCodes();
              var_dump('Captcha Invalide');
              var_dump($errors);
          endif; */

          $member = $memberManager->loginMember($pseudo);
          $mdpCorrect = password_verify($_POST['mdpConnect'], $member['motdepasse']);

            if (!isset($member['id'])):
                  throw new \Exception("Mauvais identifiant !");
              
                else:
                    if ($mdpCorrect):
                        if (isset($_POST['rememberme'])):
                            setcookie('pseudo&mdp',$pseudo,time()+365*24*3600,null,null,false,true);
                        else:
                            echo "";
                        endif;

                        $_SESSION['id'] = $member['id'];
                        $_SESSION['pseudo'] = $member['pseudo'];
                        $_SESSION['admin'] = $member['admin'];
                        header('Location: index.php');
                      
                    else:
                        throw new \Exception("Mauvais mot de passe !");
                    endif;

                endif;
                    return $pageConnexionSubmit;
      }

      //Affichage de la page Article et Commentaire
      function article(){
        $articleManager = new ArticleManager();         
        $commentManager = new CommentManager();

          $categories = $articleManager-> getCategories();           
          $article = $articleManager->getArticle($_GET['id']);
          $comments = $commentManager->articleComments($_GET['id']);
          $reportComments = $commentManager->reportComment($_GET['id']);
            
            if ($article && $comments === false):
                    throw new \Exception('Impossible d\'afficher la page de l\'article, veuillez recommencer !');
            else:
                    require('view/frontend/affichageArticle.php');
            endif;
            return $article;
      }

      //Affichage de la page Article et Commentaire
      function articleCategorie(){
        $articleManager = new ArticleManager();         
          
          $categories = $articleManager-> getCategories();
          $categoriess = $articleManager-> getCategoriess();
          $categorie = $articleManager-> getCategorie($_GET['id']);           
          $articles = $articleManager->getArticlesAccueil($_GET['id']);
            
            if ($articles && $categorie === false):
                    throw new \Exception('Impossible d\'afficher la liste des articles, veuillez recommencer !');
            else:
                    require('view/frontend/affichageArticleCategorie.php');
            endif;
      }

      //Affichage de la page profil
      function pageProfil(){
        $articleManager = new ArticleManager();        
        $memberManager = new MemberManager();
            
            $categories = $articleManager-> getCategories();
            $infoMember = $memberManager->getMember($_SESSION['id']);                

              if ($infoMember === false):
                      throw new \Exception('Erreurs lors de la récupération de vos informations, veuillez recommencer !');
              else:
                      require('view/frontend/affichageProfil.php');
              endif;       
      }

      //Affichage de la catégorie dans le menu
      function categorieMenu(){
          $articleManager = new ArticleManager();
          $categories = $articleManager-> getCategories(); 

            if($categories === false):
                    throw new \Exception('erreurs avec les categories pour le menu, veuillez recommencer !');
            else:
                    require('view/frontend/affichageMenu.php');
            endif;
      }

                        ////////////////// FONCTION AJOUT /////////////////////////

    	//Ajout d'un membre
      function addMember($pseudo, $mail, $mdp){
         $memberManager = new MemberManager();
            
          $pseudoExist = $memberManager->checkPseudo($pseudo);
          $mailExist = $memberManager->checkMail($mail);  

              if ($pseudoExist):
                  throw new \Exception('Pseudo déja utilisé, veuillez en trouver un autre !');     
              endif;

              if ($mailExist):
                  throw new \Exception('Adresse mail déja utilisé, veuillez en trouver une autre !');
              endif;
                  
                  if (!($pseudoExist) && !($mailExist)):

                      $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
                      $newMember = $memberManager->createMember($pseudo, $mail, $mdp);

                  	header('Location: index.php?action=pageConnexion');
                  else:
                          throw new \Exception('Erreurs lors de l\'inscription veuillez recommencer !');
         	        endif;

            return $addMember;
      }

      //Ajout commentaire
      function addComment($article, $commentaire, $pseudo){
        $commentManager = new CommentManager();
              
          $addComment = $commentManager->addComment($article, $commentaire, $pseudo);

              if ($addComment === false):
                  throw new \Exception('Impossible d\'ajouter le commentaire !');
              
              else:
                header('Location: index.php?action=article&id=' . $article);
              endif;

              return $addComment;
      }

    //Ajout d'un message
    function newMessage($nom, $email, $sujet, $contenu){
      $messageManager = new MessageManager();

        $newMessage = $messageManager-> createMessage($nom, $email, $sujet, $contenu);
        die(var_dump($newMessage));
        if ($newMessage === false):
            throw new \Exception("Impossible d'envoyer le message, veuillez réessayer");
        else:
            header('Location index.php?action=pageContact');
        endif;

        return $newMessage;
    }      

                        ////////////////// FONCTION MODIFICATION /////////////////////////

      //Modif mail
      function mailModif($mailId){
        $memberManager = new MemberManager();
          
          $mailModif = $memberManager->mailModif($mailId);               
          $mailExist = $memberManager->checkMail($mail); 

            if ($mailModif === $mailExist){
                  throw new \Exception('Adresse mail déja utilisé, veuillez en trouver une autre !');
                  die(var_dump($mailExist));
            }

            if ($mailModif === false):
                    throw new \Exception('Erreurs lors de la modification de votre mail, veuillez recommencer !');
            else:
                    Header('Location: index.php?action=pageProfil');
            endif;  
      }

      //Modif mdp
      function mdpModif($mdpId){
        $memberManager = new MemberManager();
          
          $mdpModif = $memberManager->mdpModif($mdpId);               

            if ($mdpModif === false):
                    throw new \Exception('Erreurs lors de la modification de votre mot de passe, veuillez recommencer !');
            else:
                    Header('Location: index.php?action=pageProfil');
            endif;  
      }

      //Report d'un commentaire
      function reportComment($idArticle, $idComment){
        $commentManager = new CommentManager();

            $repComments = $commentManager->reportComment($idComment);

              if ($repComments === false):
                  throw new \Exception('Impossible de signaler ce commentaire !');
              
              else:
                header('Location: index.php?action=article&id=' . $idArticle);
            endif;

            return $reportComment;
      }

      //Retirer le signalement d'un commentaire
      function notReportComment($reportId){
        $commentManager = new CommentManager();

          $reportComments = $commentManager-> notReportComment($reportId);

          if ($reportComments === false):
              throw new \Exception('Impossible de retirer le signalement, veuillez recommencer !');
          else:
              Header('Location: index.php?action=pageCommentaireSignale');
          endif;

          return $notReportComment;
      }

	//Affichage des erreurs
   	function error($e){
      $articleManager = new ArticleManager(); 
      $categories = $articleManager-> getCategories();
     	  require('view/frontend/affichageMessageErreur.php');
  	}
}