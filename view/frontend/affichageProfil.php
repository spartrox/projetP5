<?php $title = "Affichage  du profil de LeagueOfAuto"; ?>
<?php $script=""; ?>
		<?php ob_start(); ?>	

			<h2>Votre profil</h2>
            
            <?php 
                   while($p = $infoMember->fetch()){
            ?> 
        <section>            

                <div class="container fond col-md-6" id="infoProfil">
                   
                    <p>Information sur le profil : </p>
                    <ul>
                        <li>Votre pseudo : <?= $p['pseudo'] ?> </li>
                        <li>Votre mail : <?= $p['mail'] ?> <b><a id="texte_droite" href=""> modifier</a></li></b>
                        <li>Votre compte a été créé le : <?= $p['date_creation'] ?> </li>
                        <li>Votre mot de passe : •••••••• <b><a id="texte_droite" href=""> modifier</a></li></b>
                    </ul>
                    <a href="index.php?action=pageGestionProfil" class="btn btn-primary" id="modifierProfil">Modifier le profil</a>
                    <a href="index.php?action=pageAvatar" class="btn btn-primary">Ajouter un avatar</a>
                </div>
                
                <?php
                        }
                         $infoMember->closeCursor();      
                ?>

                <div class="container-fluid col-md-1 col-sm-5">
                    <a href="index.php?action=pageDeconnexion" class="btn btn-danger" id="deconnexion">DECONNEXION</a>
                </div>

		</section>

		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>