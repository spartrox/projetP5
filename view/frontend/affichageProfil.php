<?php $title = "Affichage  du profil de LeagueOfAuto"; ?>
<?php $script=""; ?>
		<?php ob_start(); ?>	

		<section>
			<h2>Votre profil</h2>

			<div class="container"><br>
                <h3>Profil de ... </h3><br>
			</div>

            <div class="container-fluid col-md-6" id="infoProfil">
                <p>Information sur le profil :</p>
                <ul>
                    <li>Votre pseudo : </li>
                    <li>Votre mail : </li>
                    <li>Votre compte a été créé le : </li>
                </ul>
                <a href="index.php?action=pageGestionProfil" class="btn btn-primary" id="modifierProfil">Modifier le profil</a>
                <a href="index.php?action=pageAvatar" class="btn btn-primary">Ajouter un avatar</a>
            </div>

            <div class="container-fluid col-md-1 col-sm-5">
                <a href="index.php?action=pageDeconnexion" class="btn btn-danger" id="deconnexion">DECONNEXION</a>
            </div>

		</section>
		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>