<?php $title = "Gestion articles de LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>

    <h2>Liste de tout les articles publiés</h2>  
    <section class="container">	
			<div>
	            <p class="phraseRetourArticle"><a href="index.php?action=pageAdmin">Retour au panneau administrateur</a></p>
	        </div>				
				<?php 
					$result = $articles->rowCount();					
						if ($result === 0):
							echo "<p class='messageErreur'>Il n'y a actuellement pas d'articles publié</p>";

						else:
							while ($article = $articles->fetch()):
				?>
						<div class="row fond">
							<div class="col-md-4 mt-3 mb-2 block_image">
								<a href="index.php?action=article&amp;id=<?= $article['id']; ?>"><img src="public/image_article/<?php echo ($article['image_article']); ?>"><a>
							</div>
						    <div class="col-md-8 mt-3">
						    	<a href="index.php?action=article&amp;id=<?= $article['id']; ?>">
						    	<h4>
						        	<?php echo ($article['titre']); ?>
						    	</h4>
						    </a>
								<p class="mt-3">
									<a class="modif" href="index.php?action=article&amp;id=<?= $article['id']; ?>"><i class="fas fa-eye"> voir</i></a>									
									<a class="modif" href="index.php?action=pageModifArticle&amp;id=<?= $article['id']?>"><i class="fas fa-user-edit"> modifier</i></a>										
									<a class="modif" href="index.php?action=deleteArticle&amp;id=<?= $article['id']?>" onclick="return(confirm('Voulez-vous supprimer l\'article ainsi que tout ses commentaires ? '))"><i class="fas fa-trash-alt"> supprimer</i></a>	
									<a class="modif" href="index.php?action=pageCommentArticle&amp;id=<?= $article['id']?>"><i class="fas fa-comments"> Commentaires</i></a>		
								</p>					
							</div>   	
						</div> 	
						<div class="trait2"></div>				        
 						
						
				<?php						
							endwhile;	

						endif; // Fin de la boucle des articles 
						$articles->closeCursor();
				?>
	</section>
<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>