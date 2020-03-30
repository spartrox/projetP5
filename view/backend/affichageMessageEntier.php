<?php $title = "Affichage des messages LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
    	<h2>Message recus</h2>
        <div>
            <p class="phraseRetourAdmin"><a href="index.php?action=pageMessage">Retour à la liste des messages</a></p>
        </div>
    	<section class="container mt-4">
            <?php
                while ($msg = $messages->fetch()):
            ?>
        		<h4>Message de : <?php echo ($msg['nom']); ?></h4><br>
            		<div class="container messageRecus">
            			<p><b>Sujet du message :</b><br>
                             <?php echo ($msg['sujet']); ?>
                        </p>
                        <p><b>Contenu du message :</b><br>
                            <?php echo ($msg['message']); ?>
                        </p><br>
                        <p><b>Message envoyé le :</b><br>
                            <?php echo ($msg['date_message']); ?> 
                        </p>
            		</div>
                    <h4 class="mt-4">Répondre par mail :</h4>
                    <p>Adresse mail de <?php echo ($msg['nom']); ?> :<b> <?php echo ($msg['email']); ?></b></p>
            <?php        
                endwhile;// Fin de la boucle des chapitres  
                $messages->closeCursor();       
            ?>             
    	</section>
    <?php $content = ob_get_clean(); ?>
    
<?php require('template.php') ?>