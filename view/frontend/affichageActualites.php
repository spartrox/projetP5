<?php $title = "Actualités de LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>


    	<h2>Liste de tout les articles publiés </h2>
      	
      	<section>
		    <div class="container col-md-8">
		        <div class="row" id="fond-chapitre">

		        <?php
					$result = $article->rowCount();					
						if ($result === 0){
							echo "<p class='messageErreur'>Il n'y a actuellement aucun article publié</p>";

						} else {
							while ($article = $articles->fetch()){
				?>         
						<div class="col-md-5 ">
						    <a href="index.php?action=article&amp;id=<?= $article['id']; ?>">
						    	<h3>
						        	<?php echo ($article['titre']); ?>
						    	</h3>
						    </a>
						       <em> Ajouté le <?php echo $article['date_article_fr']; ?></em>
						       
						    <!-- // On affiche le contenu des articles -->
						    	
						    <?php echo nl2br(($article['contenu'])); ?><br/><br/> </span>
						</div>    
				
				<?php						
							}	

						} // Fin de la boucle des articles 
						$article->closeCursor();
				?>
          		</div>
     		</div>
      </section>
      
<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>