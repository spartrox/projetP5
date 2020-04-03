<?php $title = "Affichage  du profil modif mail de LeagueOfAuto"; ?>
<?php $script=""; ?>
		<?php ob_start(); ?>	

			<h2>Votre profil</h2>
            
        <section>            

                <div class="container fond col-md-6" id="infoProfil">
                   
                    <p>Information sur le profil : </p>

                    <div class="container" id="block_avatar">
                        <img id="image_avatar" src="public/membres/avatars/<?= htmlspecialchars($infoMember['avatar']); ?>" alt=' '>
                    </div><br>
                    
                    <ul>
                        <li>Votre pseudo :<b> <?= htmlspecialchars($infoMember['pseudo']) ?> </b></li>
                        <li>Votre mail :<b> <?= htmlspecialchars($infoMember['mail']) ?> <a id="modif_mail" class="texte_droite" > modifier</a></li>
         
                            <form action="index.php?action=mailModif" method="post">                     
                                <div class="form-group input-group mt-2 row col-md-5" id="mail">
                                    <input type="mail" name="newMail" placeholder="Nouvelle adresse email">
                                    <input class="btn-primary" type="submit" value="Valider" id="modifier">
                                </div></b>
                            </form> 

                        <li>Votre mot de passe : •••••••• <b><a id="modif_mdp" class="texte_droite" > modifier</a>
                            
                            <form action="index.php?action=mdpModif" method="post">                     
                                <div class="form-group input-group mt-2 row col-md-5" id="mdp">
                                    <input type="password" name="newMdp" placeholder="Nouveau mot de passe">
                                    <input class="btn-primary" type="submit" value="Valider" id="modifier">
                                </div></b>
                            </form>

                        <li>Votre compte a été créé le :<b> <?= htmlspecialchars($infoMember['date_creation']) ?> </b></li>                      
                    </ul>
                    <a href="index.php?action=pageAvatar" class="btn btn-primary">Ajouter un avatar</a>
                </div>

                <div class="container-fluid col-md-1 col-sm-12">
                    <a href="index.php?action=pageDeconnexion" class="btn btn-danger" id="deconnexion">DECONNEXION</a>
                </div>

		</section>

                  <script src="public/javascript/profil.js"></script>
		<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>