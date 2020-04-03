<?php $title = "Ajout d'un article  de LeagueOfAuto"; ?>
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
    
    	<!-- Création d'un nouvelle article -->
    <?php ob_start(); ?>
    <h2>Publication d'un nouvelle article</h2>
    	<div>
	        <p class="phraseRetourAdmin"><a href="index.php?action=pageAdmin">Retour au panneau administrateur</a></p>
	    </div>
	    <div class="container-fluid" id="ajoutChapitre">
	    	<form action="index.php?action=newArticle" method="post" enctype="multipart/form-data"><br>
		        <div class="container col-md-9">
		            <div class="md-form mb-3">
		                <label id="titreArticle">Titre de l'article : </label>
		                <input type="text" name="titreArticle" placeholder="Titre de l'article" class="form-control">		                            
		            </div>
		        </div>
		        <div class="container col-md-9">
		            <div class="md-form mb-3">
		                <label id="imageArticle">Image de l'article : </label>
		                <input type="file" accept=".png, .jpeg, .jpg" name="image_article" id="image_article" class="form-control">		                            
		            </div>
		        </div>
		        <div class="container  col-md-9 mb-5">
		        	<label for="name_categorie" id="titreArticle">Catégorie de l'article : </label>
		                
		                <select name="categorie_article" id="name_categorie">
	                <?php 
	                            while ($c = $categoriess->fetch()):
	                ?>
	                        <div id="tailleCategorie">
	                            <option value="<?= htmlspecialchars($c['id']); ?>"><?= htmlspecialchars($c['titre_categorie']); ?></option>         
	                        </div> 
	                <?php       
	                             endwhile;   
	                            $categoriess->closeCursor(); 
	                ?>
	                	</select>
		                			        		        		        
			    </div>    
		        <textarea name="contenu" id="myTextarea" placeholder="Écriver votre article"></textarea>
		        <input class="chapitreSubmit btn btn-primary mt-3" type="submit" name="publication" value="Publier l'article" id="publier" />    	
			</form>    
		</div> 		

	<?php $content = ob_get_clean(); ?>
	
<?php require('template.php') ?>