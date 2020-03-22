<?php $title = "Formulaire de contact de LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
	  
		<h2>Nous contacter</h2>
		  	<div id="contact">

		<section class="container contact">

		    <h3>Formulaire de contact</h3>
			    <p>
			    	N'hésitez pas à nous contacter pour toute question ou renseignement, vous pouvez utiliser le formulaire ci-dessous : <br>
			    	Nous vous répondrons dans les plus brefs délais.
			    </p><br>

		    <div class="container col-md-8">
		        <div>
		            <form id="contact-form" name="contact-form" action="index.php?action=newMessage" method="POST">

		                <div> 
		                    <div class="container  col-md-9">
		                        <div class="md-form mb-0">
		                            <input type="text" id="name" name="nom_message" class="form-control">
		                            <label for="name">Votre Nom</label>
		                        </div>
		                    </div>		         
		                    <div class="container  col-md-9">
		                        <div class="md-form">
		                            <input type="text" id="email" name="email_message" class="form-control">
		                            <label for="email">Votre Email</label>
		                        </div>
		                    </div>
		                </div>
		                <div>
		                    <div class="container  col-md-9">
		                        <div class="md-form mb-0">
		                            <input type="text" id="subject" name="sujet_message" class="form-control">
		                            <label for="subject">Sujet</label>
		                        </div>
		                    </div>
		                </div>
		                <div>		   
		                    <div class="col-md-12">
		                        <div class="md-form">
		                            <textarea type="text" id="message" name="contenu_message" rows="5" class="form-control md-textarea"></textarea>
		                            <label for="message">Votre Message</label>
		                        </div><br>
		                    </div>
		                </div>
		                <div>
		                	<input type="submit" id="boutonEnvoyer" class="btn btn-primary" value="Envoyer" />
		            	</div>
		            </form>
		        </div>
		    </div>

		</section>

	<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>