<?php $title = "Formulaire de contact de LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
	  
		<h2>Nous contacter</h2>
		  	<div id="contact">

				<!--Section: Contact v.2-->
		<section class="container">

		    <!--Section heading-->
		    <h3 class="h1-responsive font-weight-bold text-center my-4">Formulaire de contact</h3>
		    <!--Section description-->
		    <p class="text-center w-responsive mx-auto mb-5">
		    	N'hésitez pas à nous contacter pour toute information. Vous pouvez utiliser le formulaire ci-dessous ou m'envoyer directement un email à cette adresse : <a href="mailto:allan.leagueofauto@gmail.com" target="_blank">allan.leagueofauto@gmail.com</a>.
		    </p>

		    <div class="row">
		        <div class="col-md-9 mb-md-0 mb-5">
		            <form id="contact-form" name="contact-form" action="mail.php" method="POST">

		                <div class="row"> 
		                    <div class="col-md-6">
		                        <div class="md-form mb-0">
		                            <input type="text" id="name" name="name" class="form-control">
		                            <label for="name" class="">Votre Nom</label>
		                        </div>
		                    </div>		         
		                    <div class="col-md-6">
		                        <div class="md-form mb-0">
		                            <input type="text" id="email" name="email" class="form-control">
		                            <label for="email" class="">Votre Email</label>
		                        </div>
		                    </div>
		                </div>
		                <div class="row">
		                    <div class="col-md-12">
		                        <div class="md-form mb-0">
		                            <input type="text" id="subject" name="subject" class="form-control">
		                            <label for="subject" class="">Sujet</label>
		                        </div>
		                    </div>
		                </div>
		                <div class="row">		   
		                    <div class="col-md-12">
		                        <div class="md-form">
		                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
		                            <label for="message">Votre Message</label>
		                        </div>
		                    </div>
		                </div>
		            </form>

		            <div class="text-center text-md-left">
		                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Envoyer</a>
		            </div>
		        </div>
		    </div>

		</section>

	<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>