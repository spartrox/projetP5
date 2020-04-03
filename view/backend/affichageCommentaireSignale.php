<?php $title = "Blog de Jean Forteroche"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>

    <!-- Création d'un nouveau chapitre -->
    <section>
        <h2>Gestion des commentaires signalé</h2>
    	<div>
            <p class="phraseRetourAdmin"><a href="index.php?action=pageAdmin">Retour au panneau administrateur</a></p>
        </div>
   		    <!-- Affichage des commentaires signalé -->
		<div class="gestionAdmin">
			<p>Listes de tout les commentaires signalé :</p>
		</div>
		<div class="container fond"> 	
			<?php
				$result = $reportComments->rowCount();
					if ($result === 0): 
							echo "<p class='messageErreur'>Il n'y a aucun commentaire signalé !</p>";

					else:
						while($r = $reportComments->fetch()):
			?>
						<article class="ajoutCommentaire container">    
			                <p><b><?= htmlspecialchars($r['pseudo']) ?></b><i> Ajouté le <?= htmlspecialchars($r['comment_article_fr']) ?></i></p><hr>
			                <p><?= nl2br(htmlspecialchars($r['contenu'])) ?><br></p> 

			                <!-- Suppression du commentaire signalé -->
			           		<p><a class="signaler" href="index.php?action=deleteCommentSignale&amp;id=<?= htmlspecialchars($r['id']); ?>" onclick="return(confirm('Voulez-vous supprimer ce commentaire ? '))">
			                	<i class="fas fa-exclamation-triangle"></i>Supprimer</a>
			            	
			                <!-- Suppression du commentaire signalé -->
			            	<a class="signaler" href="index.php?action=notReportComment&amp;id=<?= htmlspecialchars($r['id']); ?>" onclick="return(confirm('Voulez-vous annuler le signalement ? '))">
			                	<i class="fas fa-exclamation-triangle"></i>Retirer le signalement</a>
			            	</p>
			            </article> 
			<?php
					endwhile;

				endif; // Fin de la boucle des commentaires signalé
				$reportComments->closeCursor();		
	    	
	    	?>
	    </div>	  
    </section>

<?php $content = ob_get_clean(); ?>
    
<?php require('template.php') ?>