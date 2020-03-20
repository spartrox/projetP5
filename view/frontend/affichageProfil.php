<?php $title = "Affichage  du profil de LeagueOfAuto"; ?>
<?php $script=""; ?>
		<?php ob_start(); ?>	

			<h2>Votre profil</h2>
            
            <?php 
                   //while($p = $infoMember->fetch()){
            ?> 
        <section class="container affichageProfil">            
			<div><br>
                <?= htmlspecialchars($article['titre']); ?>
                <h3>Profil de <?= htmlspecialchars($p['pseudo']) ?> </h3><br>
			</div>

            <div class="container-fluid col-md-6" id="infoProfil">
               
                <p>Information sur le profil : </p>
                <ul>
                    <li>Votre pseudo : <?= htmlspecialchars($p['pseudo']) ?> </li>
                    <li>Votre mail : <?= htmlspecialchars($p['mail']) ?></li>
                    <li>Votre compte a été créé le : <?= htmlspecialchars($p['date_creation']) ?> </li>
                </ul>
                <a href="index.php?action=pageGestionProfil" class="btn btn-primary" id="modifierProfil">Modifier le profil</a>
                <a href="index.php?action=pageAvatar" class="btn btn-primary">Ajouter un avatar</a>
            </div>
            
            <?php
                    //}
                     //$infoMember->closeCursor();       
            ?>

            <div class="container-fluid col-md-1 col-sm-5">
                <a href="index.php?action=pageDeconnexion" class="btn btn-danger" id="deconnexion">DECONNEXION</a>
            </div>

		</section>
		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>