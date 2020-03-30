<?php $title = "Gestion message reçus LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
    	<h2>Gestion de tout les messages reçus</h2>

    	<section class="mt-5">
    		<h4>Liste de tout les messages reçus depuis le formulaire de contact :</h4><br>
    		<div class="container messageRecus">
    				
    				<?php 
						$result = $messages->rowCount();
							if ($result === 0):
									echo "<p class='messageErreur'>Vous n'avez reçus aucun message</p>";

							else:			
								while ($msg = $messages->fetch()):
					?>
			    			<p><b>Message de :</b> <?php echo ($msg['nom']); ?></p>
			    			<p><b>Sujet du message :</b> <?php echo ($msg['sujet']); ?></p>
			    			<p><b>Reçus le :</b> <?php echo ($msg['date_message']); ?></p>
			    			<a href="index.php?action=pageMessageEntier" class="btn btn-primary">Accéder au message</a>
					<?php	
								endwhile;

							endif;// Fin de la boucle des chapitres 	
						$messages->closeCursor();		
				    ?>    		
    		</div>
    	</section>
    <?php $content = ob_get_clean(); ?>
    
<?php require('template.php') ?>