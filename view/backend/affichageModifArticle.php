<?php $title = "Modifier un article LeagueOfAuto"; ?>
		<!-- SCRIPT -->
      <?php ob_start(); ?>	 
      	<script src="public/jquery/jquery-3.4.1.js"></script>
      	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
      	<script src="https://cdn.tiny.cloud/1/7m0zznhb6kk4zat2boj6jsfp5od1h88q7ox95195xlzx1t5e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      	<script src="public/tinyMCE/langFR.js"></script>
		<script>
			  tinymce.init({
			    selector: '#myTextarea',
			   	language: "fr_FR"
			  });
  		</script>
	<?php $script = ob_get_clean(); ?> 
    
    	<!-- Modification de l'article -->
    <?php ob_start(); ?>
    	<h2>Modification d'un article</h2>
    	    <div>
            	<p class="phraseRetourAdmin"><a href="index.php?action=pageAllArticles">Retour à la liste des articles</a></p>
        	</div>
		<h4 class="phraseRetourAdmin">Vous allez modifier l'article : <em><?= $article['titre'] ?></em></h4>		
	    
	    <div class="container-fluid" id="ajoutChapitre">
	    	<form action="index.php?action=articleModif&amp;id=<?=$article['id'] ?>" method="post"><br>
		        <div class="container  col-md-9">
		            <div class="md-form mb-3">
		                <label id="titreArticle">Titre de l'article : </label>
		                <input type="text" name="titre_Article" placeholder="Titre de l'article" value="<?= $article['titre'] ?>" class="form-control">		                            
		            </div>
		        </div>
		        <div class="container col-md-9">
		            <div class="md-form mb-3">
		                <label id="imageArticle">Image de l'article : </label>
		                <input type="file" name="image_article" class="form-control" value="">		                            
		            </div>
		        </div>
		        <div class="container col-md-9 mb-5">
		        	<label for="name" id="titreArticle">Catégorie de l'article : </label>
		            <li class="nav-item dropdown" id="categoriesArticle" name="categoriesArticle">
		                <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLinkk" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>
		                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLinkk">
		                    <a class="dropdown-item" href="index.php?action=pageVoitureAllemande">Voiture Allemande</a>
		                    <a class="dropdown-item" href="index.php?action=pageVoitureAmericaine">Voiture Americaine</a>
		                    <a class="dropdown-item" href="index.php?action=pageVoitureFrancaise">Voiture francaise</a>
		                    <a class="dropdown-item" href="index.php?action=pageVoitureItalienne">Voiture Italienne</a>
		                </div>
		            </li> 			        		        		        
			    </div>    
		        <textarea name="contenu_article" id="myTextarea" placeholder="Écriver votre chapitre"><?= htmlspecialchars($article['contenu']) ?></textarea>
		        <input class="chapitreSubmit btn btn-primary mt-3" type="submit" name="publication" value="Modifier l'article" id="publier" />    	
			</form>    
		</div> 		

	<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>