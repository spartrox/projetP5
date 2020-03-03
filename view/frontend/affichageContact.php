<?php $title = "Formulaire de contact de LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
	  
		<h2>Nous contacter</h2>
		  	<div id="contact">

				<!--Section: Contact v.2-->
		<section class="container">

		    <!--Section heading-->
		    <h3>Formulaire de contact</h3>
		    <!--Section description-->
		    <p>
		    	N'hésitez pas à nous contacter pour toute information, vous pouvez utiliser le formulaire ci-dessous :
		    </p><br>

		    <div class="container col-md-8">
		        <div>
		            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

		                <div> 
		                    <div class="col-md-6">
		                        <div class="md-form mb-0">
		                            <input type="text" id="name" name="name" class="form-control">
		                            <label for="name" class="">Votre Nom</label>
		                        </div>
		                    </div>		         
		                    <div class="col-md-6">
		                        <div class="md-form">
		                            <input type="text" id="email" name="email" class="form-control">
		                            <label for="email" class="">Votre Email</label>
		                        </div>
		                    </div>
		                </div>
		                <div>
		                    <div class="col-md-6">
		                        <div class="md-form mb-0">
		                            <input type="text" id="subject" name="subject" class="form-control">
		                            <label for="subject">Sujet</label>
		                        </div>
		                    </div>
		                </div>
		                <div>		   
		                    <div class="col-md-12">
		                        <div class="md-form">
		                            <textarea type="text" id="message" name="message" rows="5" class="form-control md-textarea"></textarea>
		                            <label for="message">Votre Message</label>
		                        </div><br>
		                    </div>
		                </div>
		            </form>

		            <div class="boutonEnvoyer">
		                <a class="btn" onclick="document.getElementById('contact-form').submit();">Envoyer</a>
		            </div>
		        </div>
		    </div>

		</section>

	<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>