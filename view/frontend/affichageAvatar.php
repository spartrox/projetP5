<?php $title = "Gestion avatar de LeagueOfAuto"; ?>
<?php $script=""; ?>
		<?php ob_start(); ?>	

		<div>
            <h2>Ajout d'un avatar</h2><br>
		</div>
	    	<div>
		        <p class="phraseRetourAdmin"><a href="index.php?action=pageProfil">Retour à la page du profil</a></p>
		    </div>

		<form action="index.php?action=newAvatar"  method="post" enctype="multipart/form-data"><br>
			<div class="container-fluid col-md-5" id="infoProfil">
				<div class="container">
					<div>
						<span>Ajouter votre nouvelle avatar : </span><input id="inputAvatar" type="file" accept=".png, .jpeg, .jpg" name="inputAvatar"><br>
					</div>

					<div class="container">
						<input class="chapitreSubmit btn btn-primary mt-3" type="submit" name="publication" value="Publier l'avatar" id="publier" />
					</div>
				</div>	
			</div>
		</form>	
		
		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>