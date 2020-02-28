<?php $title = "À propos de LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>

        <h2>À propos</h2>
         <br /><br />
      
				<div class="container">
					
					<h3>Bienvenue sur le site de LeagueOfAuto</h3>
						<p>
							LeagueOfAuto est un blog automobile qui a pour unique ambition de partager une passion pour les belles voitures sur le web. Vous trouverez ici des articles sur l'actualité automobile, les nouveautés ou encore des avis personnels.
						</p>
						<p>
							Il n'est pas question ici de concurrencer les gros sites Internet du secteur automobile, mais plutôt de vous faire découvrir les modèles qui me plaisent et qui risquent de vous plaire aussi.
						</p>
					<h3>Qui est derrière LeagueOfAuto ?</h3>

						<p>
							Je m'appelle Allan Boite et je suis blogueur depuis plusieurs années ce blog auto me permet de partager ma passion du web et de l'automobile. J'habite vers La Rochelle et dans la vraie vie, je travaille dans l'informatique (développeur Web).
						</p>
						<p>
							Au niveau voiture, je m'intéresse beaucoup aux véhicules français et allemands par préférence, mais j'ai également un oeil avisé sur le reste du monde. A titre personnel, je possède une BMW 320DA de 150CV, ma futur voiture seras sûrement une AUDI A4 break (oui je sais j'aime les voitures Allemande).
						</p>
						<p>
							Pour me contacter, je vous invite à utiliser ce <a href="index.php?action=pageContact">formulaire de contact</a>.
						</p>
					<h3>Envie d'écrire ?</h3>

						<p>
							N'hésitez pas à vous inscrire en <a href="index.php?action=pageInscription">cliquant ici</a> ou à vous connecter en <a href="index.php?action=pageConnexion">cliquant ici</a>.
						</p>
					<h3>Réseaux sociaux et abonnements</h3>

						<p>
							Retrouvez LeagueOfAuto sur <a href="https://twitter.com" target="_blank">Twitter</a>, <a href="https://plus.google.com" target="_blank">Google+</a> et <a href="https://www.facebook.com" target="_blank">Facebook</a>.
						</p>
					<h3>Contact</h3>

						<p>
							Pour toute question relative à ce blog ou demande d’informations, vous pouvez utiliser le formulaire de contact en cliquant ici, ou nous écrire directement à l’adresse suivante : <a href="mailto:allan.leagueofauto@gmail.com" target="_blank">allan.leagueofauto@gmail.com</a>.
						</p>
						<p>
							Ces événements sont l'occasion d'effectuer de belles rencontres et surtout, de pouvoir partager et mettre en avant un intérêt commun autour d'un véhicule ou d'une gamme automobile.
						</p>
					<h3>Mentions légales</h3>

					<p>
						Les mentions légales de ce site sont disponibles sur cette page : <a title="Mentions légales" href="index.php?action=pageMentionLegales">Mentions légales</a>.
					</p>
	      		</div>
      
<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>