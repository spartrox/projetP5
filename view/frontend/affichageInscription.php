<?php $title = "inscription à LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
    
        <h2>Inscription</h2>
        <br /><br />
            <div class="container">
                <form class="col-md-5 container"  action="index.php?action=addMember" method="post">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                            <input class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo" type="text" value="<?php if(isset($pseudo)) { echo $pseudo; } ?>">
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-envelope" ></i> </span>
                        </div>
                        <input class="form-control" name="mail" placeholder="Votre email" id="mailI" type="email" value="<?php if(isset($mail)) { echo $mail; } ?>">
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                    </div>
                        <input class="form-control" placeholder="Votre mot de passe" id="mdpI" name="mdp" type="password">
                    </div>
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                      </div>
                            <input class="form-control" placeholder="Confirmer votre mdp" id="mdp2" name="mdp2" type="password">
                      </div>
                          <div class="form-group">
                             <br/>
                             <input type="submit" class="btn btn-primary" name="forminscription" value="Je m'inscris" id="inscription"/>
                          </div>
                 </form> <br>

              <p>Déja un compte ? <a href="index.php?action=pageConnexion">Connectez-vous!</a></p>
           </div>         
    <?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>