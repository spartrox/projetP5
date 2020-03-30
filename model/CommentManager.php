<?php 

    namespace model;
    require "vendor/autoload.php";

use model\Manager;

    //GESTION DES COMMENTAIRES
class CommentManager extends Manager{

                        ////////////////// SELECT /////////////////////////

    public function articleComments($articleId){

    	// Connexion à la base de données
        $bdd = $this->bddConnect();
        
        // Récupération des commentaires pour chaque article
        $comments = $bdd->prepare('SELECT visiteurs.pseudo, commentaire.id, commentaire.contenu, commentaire.id_article, DATE_FORMAT(commentaire.date_commentaire, \'%d/%m/%Y \') AS comment_article_fr FROM commentaire INNER JOIN visiteurs ON visiteurs.id = commentaire.id_utilisateur  WHERE commentaire.id_article = ? ORDER BY comment_article_fr ');
        $affectedLines = $comments->execute(array($articleId));

        return $comments;
    }

    public function addReportComments(){

        // Connexion à la base de données
        $bdd = $this->bddConnect();
        
        // Récupération des commentaires signalé
        $reportComments = $bdd->query('SELECT visiteurs.pseudo, commentaire.id, commentaire.contenu, commentaire.id_article, DATE_FORMAT(commentaire.date_commentaire, \'%d/%m/%Y \') AS comment_article_fr FROM commentaire INNER JOIN visiteurs ON visiteurs.id = commentaire.id_utilisateur WHERE commentaire.signalement = 1  ORDER BY comment_article_fr');

        return $reportComments;
    }

                        ////////////////// UPDATE /////////////////////////

    public function reportComment($reportId){
        
        // Connexion à la base de données
        $bdd = $this->bddConnect(); 

        // Ajout d'un commentaire signalé
        $comments = $bdd->prepare('UPDATE commentaire SET signalement = 1 WHERE id = ?');
        $repComments = $comments->execute(array($reportId));

        return $repComments;
    }

    public function notReportComment($reportId){
        
        // Connexion à la base de données
        $bdd = $this->bddConnect(); 

        // Ajout d'un commentaire signalé
        $comments = $bdd->prepare('UPDATE commentaire SET signalement = 0 WHERE id = ?');
        $reportComments = $comments->execute(array($reportId));

        return $reportComments;
    }   

                        ////////////////// DELETE FROM /////////////////////////

    public function deleteComment($commentId){
        
        // Connexion à la base de données
        $bdd = $this->bddConnect();  
        
        // Suppression d'un commentaire
        $req = $bdd->prepare('DELETE FROM commentaire WHERE id = ?');
        $deleteComment = $req->execute(array($commentId));

        return $deleteComment;
    }

                        ////////////////// INSERT INTO /////////////////////////

    public function addComment($article, $commentaire, $pseudo){

        // Connexion à la base de données
        $bdd = $this->bddConnect();

        // Ajout des commentaires
        $comments = $bdd->prepare('INSERT INTO commentaire(id, id_utilisateur, contenu, id_article, date_commentaire) VALUES(?,?,?,?, NOW())');
        $addComment = $comments->execute(array($id, $pseudo, $commentaire, $article));

        return $addComment;
    }       
}