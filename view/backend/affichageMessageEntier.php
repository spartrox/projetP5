<?php $title = "Affichage des messages LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
    	<h2>Message recus</h2>
        <div>
            <p class="phraseRetourAdmin"><a href="index.php?action=pageMessage">Retour à la liste des messages</a></p>
        </div>
    	<section class="container mt-4">

        		<h4>Message de : <?= htmlspecialchars($message['nom']); ?></h4><br>
            		<div class="container messageRecus">
            			<p><b>Sujet du message :</b><br>
                             <?= htmlspecialchars($message['sujet']); ?>
                        </p>
                        <p><b>Contenu du message :</b><br>
                            <?= htmlspecialchars($message['message']); ?>
                        </p><br>
                        <p><b>Message envoyé le :</b><br>
                            <?= htmlspecialchars($message['date_message']); ?> 
                        </p>
            		</div>
                    <h4 class="mt-4">Répondre par mail :</h4>
                    <p>Adresse mail de <?= htmlspecialchars($message['nom']); ?> :<b> <?= htmlspecialchars($message['email']); ?></b></p>

    	</section>
    <?php $content = ob_get_clean(); ?>
    
<?php require('template.php') ?>