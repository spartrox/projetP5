<?php $title = "Gestion avatar de LeagueOfAuto"; ?>
<?php $script=""; ?>
		<?php ob_start(); ?>	

		<div>
            <h2>Ajout d'un avatar</h2><br>
		</div>
	    	<div>
		        <p class="phraseRetourAdmin"><a href="index.php?action=pageProfil">Retour à la page du profil</a></p>
		    </div>

		<div class="container-fluid col-md-5" id="infoProfil">
			<div class="container">
				<div>
					<span>Ajouter votre nouvelle avatar : </span><input type="file" name="avatar"><br>
				</div>

				<div class="container">
					<a href="index.php?action=newAvatar" class="btn btn-primary" id="publierAvatar">Publier l'avatar</a>
					<a href="index.php?action=deleteAvatar" class="btn btn-danger" >Supprimer l'avatar</a>
				</div>

			</div>	
		</div>
		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>