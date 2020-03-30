<?php $title = "Modifier un article LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
    
    	<!-- Modification de l'article -->
    <?php ob_start(); ?>
    	<h2>Modification d'une categorie</h2>
    	    <div>
            	<p class="phraseRetourAdmin"><a href="index.php?action=pageAdmin">Retour au panneau administrateur</a></p>
        	</div>
		<h4 class="phraseRetourAdmin">Vous allez modifier la categorie : <em><?= $categorie['titre_categorie'] ?></em></h4>		
	    
	    <div class="container-fluid" id="ajoutChapitre">
	    	<form action="index.php?action=categorieModif&amp;id=<?=$categorie['id'] ?>" method="post"><br>
		        <div class="container  col-md-9">
		            <div class="md-form mb-3">
		                <label id="titreArticle">Titre de la categorie : </label>
		                <input type="text" name="titre_categorie" placeholder="Titre de l'article" value="<?= $categorie['titre_categorie'] ?>" class="form-control">		                            
		            </div>
		            	<input class="chapitreSubmit btn btn-primary mt-3" type="submit" name="publication" value="Modifier la catégorie" id="publier" />  
		        </div>   
			</form>    
		</div>

 		

	<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>