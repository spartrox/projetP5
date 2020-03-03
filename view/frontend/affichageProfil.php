<?php $title = "Gestion profil de LeagueOfAuto"; ?>
<?php $script=""; ?>
		<?php ob_start(); ?>	

		<section>
			<h2>Gestion du profil</h2>

			<div class="container"><br>
				<p>Vous pouvez gérer les éléments de votre profil en dessous :</p>
			
			<form method="POST">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope" ></i> </span>
                        </div>
                        <input class="form-control" name="mail" placeholder="Nouvelle adresse email" id="mail" type="email" value="<?php if(isset($mail)) { echo $mail; } ?>">
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                        <input class="form-control" placeholder="Nouveau mot de passe" id="mdp" name="mdp" type="password">
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                      </div>
                            <input class="form-control" placeholder="Confirmer votre nouveau mdp" id="mdp2" name="mdp2" type="password">
                      </div>
                          <div class="form-group">
                             <br/>
                             <input type="submit" class="btn btn-primary" name="forminscription" value="Je m'inscris" id="inscription" />
                          </div>
            </form>


			</div>










		</section>
		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>