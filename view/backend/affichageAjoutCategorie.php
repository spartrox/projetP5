<?php $title = "Ajout d'une categorie de LeagueOfAuto"; ?>
<?php $script=""; ?>
      <?php ob_start(); ?>	 

    <h2>Ajout d'une nouvelle catégorie</h2>  
			<div>
	            <p class="phraseRetourAdmin"><a href="index.php?action=pageAdmin">Retour au panneau administrateur</a></p>
	        </div>    
    <section class="container">	
	    	<form action="index.php?action=newCategorie"  method="post"><br>
		        <div class="container col-md-9">
		            <div class="md-form mb-3">
		                <label id="titreArticle">Titre de la nouvelle catégorie : </label>
		                <input type="text" name="titreCategorie" placeholder="Titre de la nouvelle catégorie" class="form-control">		                            
		            </div>
		            <input class="chapitreSubmit btn btn-primary mt-3" type="submit" name="publication" value="Publier la catégorie" id="publier" />
		        </div>
		    </form>

		    <div class="container fond col-md-12 mt-5">
		    	<h4>Catégories déja existante :</h4>
		    	                <?php 
                            while ($c = $categories->fetch()):
                ?>
                        <div>
                            <div class="categoriee container col-md-4">
                                    <p><?php echo ($c['titre_categorie']); ?></p> 
                            </div>      
                        </div> 
                <?php                       
                           	endwhile;
                           	$categories->closeCursor();
                ?> 
		    </div>        
	</section>
	<?php $content = ob_get_clean(); ?>
	
<?php require('template.php') ?>