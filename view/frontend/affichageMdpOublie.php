<?php $title = "Mot de passe oublié de LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>

    	<h2>Vous avez oublié votre mot de passe ?</h2><br>  
	
        <form class="col-md-3 container"  action="index.php?action=addMember" method="post">
        	<h4>Veuillez entrer votre addresse mail !</h4><br>
            <?php
                if (isset($er_mail)):
            ?>
                <div><?= $er_mail ?></div>
            <?php   
                endif;
            ?>
                <div class="form-group input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-envelope" ></i> </span>
                    </div>
                        <input class="form-control" name="mail" placeholder="Votre email" id="mail" type="email" >
                </div>
                <div class="form-group"><br>        
                    <input type="submit" class="btn btn-primary" name="forminscription" value="Confirmer" id="inscription"/>
                </div>
        </form>


<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>