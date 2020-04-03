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
						<input class="form-control" type="text" name="pseudoConnect" placeholder="Pseudo">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
							<input class="form-control" type="password" name="mdpConnect" placeholder="Mot de passe">
					</div>
					<div class="g-recaptcha" data-sitekey="6Lcv7d4UAAAAAFEvQxHzGycnQ8wwSlZfi3N8esvx"></div>
					<div class="form-group">
						<input type="submit" data-sitekey="6Lcv7d4UAAAAAFEvQxHzGycnQ8wwSlZfi3N8esvx" value="Se connecter" class="btn btn-primary mt-2">
					</div><br>
					<div>
						<label class="checkbox">
							<input type="checkbox" name="rememberme"> Se souvenir de moi
							<span class="checkmark"></span>
						</label>
					</div>
				</form><br>
			</div>

				<div class="container" >
					<p>Vous n'avez pas de compte ?<a href="index.php?action=pageInscription"> Cliquez ici pour vous inscrire !</a></p>
				</div>

		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>