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
	<section class="container">
		<div class="row">
			<div class="col-md-8">
				<h3>Derniers articles publiés</h3>
				<div class="trait"></div>
				
<!--			<?php /*
					$result = $articles->rowCount();					
						if ($result === 0){
							echo "<p class='messageErreur'>Il n'y a actuellement pas d'articles publié</p>";

						} else {
							while ($article = $articles->fetch()){
				?>
						<div class=" ">
						    <a href="index.php?action=article&amp;id=<?= $article['id']; ?>">
						    	<h4>
						        	<?php echo ($article['titre']); ?>
						    	</h4>
						    </a>
						       <em> Ajouté le <?php echo $article['date_creation_fr']; ?></em>
						       
-->						    <!-- // On affiche le contenu des articles -->
						    	
<!--						    <?php echo nl2br(($article['contenu'])); ?><br/><br/> </span>
						   	
						</div> 	
						
				<?php						
							}	

						} // Fin de la boucle des articles 
						$articles->closeCursor();
*/				?>
-->			
			</div>
			<div class="col-md-4">
				<h3>Catégories</h3>
				<div class="trait"></div>
					<div class="categorieSlide">
						<a class="dropdown-item" href="index.php?action=pageVoitureAllemande">Voiture Allemande</a>
		                <a class="dropdown-item" href="index.php?action=pageVoitureAmericaine">Voiture Americaine</a>
		                <a class="dropdown-item" href="index.php?action=pageVoitureFrancaise">Voiture francaise</a>
		                <a class="dropdown-item" href="index.php?action=pageVoitureItalienne">Voiture Italienne</a>
					</div>
				<h3>Réseaux sociaux</h3>
				<div class="trait"></div>
				<div class="icone"><br>
					<a href="https://www.facebook.com/" target = "_blank"><i class="fab fa-facebook-square"> Facebook</i></a><br>
					<a href="https://twitter.com/" target = "_blank"><i class="fab fa-twitter">  Twitter</i></a><br>
					<a href="https://www.instagram.com/" target = "_blank"><i class="fab fa-instagram-square"> Instagram</i></a><br>
					<a href="https://www.youtube.com/" target = "_blank"><i class="fab fa-youtube"> Youtube</i></a><br>
					<a href="https://github.com/" target = "_blank"><i class="fab fa-github-square"> GitHub</i></a>
				</div><br>
				
				<h3> Météo du jour</h3>
				<div class="trait"></div>
				<div class="container mt-4">
					<form id="weather" class="mb-5" >
						<div class="row">
							<div>
								<div class="form-group">
									<label for="city" class="sr-only">Renseigner une ville</label>
									<input type="text" class="form-control" id="city" placeholder="Renseigner une ville">
								</div>
							</div>
							<div>
								<button type="submit" class="btn btn-primary">Rechercher</button>
							</div>
						</div>
					</form>
				</div>
			
			</div>
		</div>
	</section>   
      
<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>