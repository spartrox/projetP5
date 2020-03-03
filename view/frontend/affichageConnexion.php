<?php $title = "Connexion à LeagueOfAuto"; ?>
<?php $script=""; ?>
		<?php ob_start(); ?>	
				<h2>Connexion</h2>	
				<br><br>
	        <div class="container">
				<form class="container col-md-5 formulaire"  action="index.php?action=pageConnexionSubmit" method="post">			
					
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input class="form-control" type="text" name="pseudoconnect" placeholder="Pseudo">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
							<input class="form-control" type="password" name="mdpConnect" placeholder="Mot de passe">
					</div>
					<div class="form-group">
						<input type="submit" value="Se connecter" class="btn btn-primary">
					</div><br>
					<div>
						<label class="checkbox">
							<input type="checkbox"> Se souvenir de moi
							<span class="checkmark"></span>
						</label>
					</div>
				</form><br>
			</div>

				<div class="d-flex justify-content-center links">
					<p>Vous n'avez pas de compte ?<a href="index.php?action=pageInscription"> Cliquez ici pour vous inscrire !</a></p>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#"><p>Mot de passe oublié ?</p></a>
				</div>

		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>