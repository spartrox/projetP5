<?php $title = "Bienvenue sur LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>

      <!-- Accueil -->
    <section class="container">
    	<h1 class="container">Bienvenue sur LeagueOfAuto</h1>
								
		<!-- SLIDER -->					
			<div id="block-slider" class="container">
				<div id="slider">
					<img id="imagediapo" src="public/image/image4.jpg" alt="article numéros 1">
					<p id="texte"></p>
					<div id="flechegauche">
						<i class="fas fa-chevron-circle-left fa-3x" aria-hidden="true"></i>
					</div>
					<div id="flechedroite">
						<i class="fas fa-chevron-circle-right fa-3x" aria-hidden="true"></i>
					</div>
				</div>
			</div>
	</section>
	<section class="col-md-6">
			<div class="">
				<h3>Derniers articles publiés</h3>
								
			</div>
	</section> 
	<section class="col-md-12">
		<div>
			<h3>Réseaux sociaux</h3>
		</div>
		<div>
			<h3>Météo France</h3>
		</div>
		
	</section>   
      
<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>