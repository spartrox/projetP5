<?php $title = "Affichage  du profil modif mail de LeagueOfAuto"; ?>
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
                        <li>Votre pseudo :<b> <?= $p['pseudo'] ?> </b></li>
                        <li>Votre mail :<b> <?= $p['mail'] ?> <a id="modif_mail" class="texte_droite" > modifier</a></li>
                                <div class="form-group mail input-group row col-md-5">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fa fa-envelope" ></i> </span>
                                    </div>
                                    <input class="form-control" name="newMail" placeholder="Nouvelle adresse email" id="mail" type="email"><a class="valider mt-2 ml-2" href="index.php?action=modifMail"> Valider</a>
                                </div></b>

                        <li>Votre compte a été créé le :<b> <?= $p['date_creation'] ?> </b></li>
                        <li>Votre mot de passe : •••••••• <b><a id="modif_mdp" class="texte_droite" > modifier</a>                     
                                <div class="form-group mdp input-group mt-2 row col-md-5 ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                        <input class="form-control" placeholder="Nouveau mot de passe" id="mdp" name="newMdp" type="password"><a class="valider mt-2 ml-2" href="index.php?action=modifMdp"> Valider</a>
                                </div></b>              
                    </ul>
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