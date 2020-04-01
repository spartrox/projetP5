<?php
    namespace model;
    require "vendor/autoload.php";

use model\Manager;

	// GESTION DES ARTICLES
class ArticleManager extends Manager{

                        ////////////////// SELECT /////////////////////////

	public function getArticles(){
	
		// Connexion à la base de données
        $bdd = $this->bddConnect();

		// Récupération des articles
		$req = $bdd->query('SELECT id, titre, SUBSTRING(contenu, 1,300) AS contenu, DATE_FORMAT(date_article, \'%d/%m/%Y \') AS date_article_fr, image_article FROM article ORDER BY date_article DESC LIMIT 0,8 ');

		return $req;
	}

	public function getArticlesAccueil(){
	
		// Connexion à la base de données
        $bdd = $this->bddConnect();

		// Récupération des articles
		$req = $bdd->query('SELECT id, titre, SUBSTRING(contenu, 1,300) AS contenu, DATE_FORMAT(date_article, \'%d/%m/%Y \') AS date_article_fr, image_article FROM article ORDER BY date_article DESC LIMIT 0,5');

		return $req;
	}

    public function getArticlePage(){

        // Connexion à la base de données
        $bdd = $this->bddConnect();

        $req = $bdd->query('SELECT id FROM article'); 
        
        return $req;       
    }

	public function getArticle($articleId){

		// Connexion à la base de données
        $bdd = $this->bddConnect();

		// Récupération de l'article
		$req = $bdd->prepare('SELECT id, titre, contenu, id_categorie, DATE_FORMAT(date_article, \'%d/%m/%Y \') AS date_article_fr, image_article FROM article WHERE id = ?');
		$req->execute(array($articleId));
		$article = $req->fetch();

		return $article;
	}

    public function getCategories(){
    
        // Connexion à la base de données
        $bdd = $this->bddConnect();

        // Récupération des categories pour le menu
        $req = $bdd->query('SELECT id, titre_categorie FROM categorie ');

        return $req;
    }

    public function getCategoriess(){
    
        // Connexion à la base de données
        $bdd = $this->bddConnect();

        // Récupération des categories pour les pages principale
        $req = $bdd->query('SELECT id, titre_categorie FROM categorie ');

        return $req;
    }    

    public function getCategorie($categorieId){

        // Connexion à la base de données
        $bdd = $this->bddConnect();

        // Récupération de la categorie
        $req = $bdd->prepare('SELECT id, titre_categorie FROM categorie WHERE id = ? ');
        $req->execute(array($categorieId));
        $categorie = $req->fetch();

        return $categorie;
    }

                        ////////////////// INSERT INTO /////////////////////////

	public function createArticle($titre, $contenu, $categorie_article, $image_article){
    	
    	// Connexion à la base de données
        $bdd = $this->bddConnect();

        // Création d'un nouvelle article
        $req = $bdd->prepare('INSERT INTO article(titre, contenu, id_categorie, date_article, image_article) VALUES (?, ?, 1, NOW(), ?)');
        $newArticle = $req->execute(array($titre, $contenu, $categorie_article, $image_article));

        return $newArticle;
    }

	public function createCategorie($titre){
    	
    	// Connexion à la base de données
        $bdd = $this->bddConnect();

        // Création d'une nouvelle categorie
        $req = $bdd->prepare('INSERT INTO categorie(titre_categorie) VALUES (?)');
        $newCategorie = $req->execute(array($titre));

        return $newCategorie;
    }

                        ////////////////// UPDATE /////////////////////////

    public function categorieModif($categorieId){

        // Connexion à la base de données
        $bdd = $this->bddConnect();

        // Modification d'une categorie
        $req = $bdd->prepare('UPDATE categorie SET titre_categorie = ? WHERE id = ? ');
        $categorieModif = $req->execute(array($_POST['titre_categorie'], $categorieId));

        return $categorieModif;
    }

    public function articleModif($articleId){

        // Connexion à la base de données
        $bdd = $this->bddConnect();

        // Modification d'un article
        $req = $bdd->prepare('UPDATE article SET titre = ? , contenu = ? WHERE id = ? ');
        $articleModif = $req->execute(array($_POST['titre_Article'], $_POST['contenu_article'], $articleId));

        return $articleModif;
    }

                        ////////////////// DELETE FROM /////////////////////////

    public function deleteArticle($articleId){

    	// Connexion à la base de données
        $bdd = $this->bddConnect();  
        
        // Suppression d'un article et de ses commentaires
        $req = $bdd->prepare('DELETE FROM article WHERE id = ?');
        $deleteArticle = $req->execute(array($articleId));
        /*
            ALTER TABLE commentaire ADD CONSTRAINT ik_commentaire FOREIGN KEY commentaire(id_article) REFERENCES article(id) ON DELETE CASCADE        
        */
        return $deleteArticle;  
    }

    public function deleteCategorie($categorieId){

    	// Connexion à la base de données
        $bdd = $this->bddConnect();  
        
        // Suppression d'une catégorie et de ses articles
        $req = $bdd->prepare('DELETE FROM categorie WHERE id = ?');
        $deleteCategorie = $req->execute(array($categorieId));
        /*
            ALTER TABLE commentaire ADD CONSTRAINT ik_commentaire FOREIGN KEY commentaire(id_article) REFERENCES article(id) ON DELETE CASCADE        
        */
        return $deleteCategorie;  
    }
}