<?php $title = "Bienvenue sur LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>

      <!-- Accueil -->
    <section>
		    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators">
				    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
				    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
				</ol>

			<div class="carousel-inner">
			    <div class="carousel-item active">
				    <img class="d-block w-40" src="public/image/image1.jpg" alt="Première image du carrousel">
				    <div class="carousel-caption d-none d-md-block">
					  	<h2>...</h2>
					  	<p>...</p>
			  		</div>
			    </div>
			    <div class="carousel-item">
			      	<img class="d-block w-40" src="public/image/image2.jpg" alt="Deuxième image du carrousel">
			      	<div class="carousel-caption d-none d-md-block">
					    <h2>...</h2>
					    <p>...</p>
			 		</div>
			    </div>
			    <div class="carousel-item">
			      	<img class="d-block w-40" src="public/image/image3.jpg" alt="Troisième image du carrousel">
			      	<div class="carousel-caption d-none d-md-block">
					    <h2>...</h2>
					    <p>...</p>
			  		</div>
			    </div>
			    <div class="carousel-item">
			      	<img class="d-block w-40" src="public/image/image3.jpg" alt="Quatrième image du carrousel">
			      	<div class="carousel-caption d-none d-md-block">
					    <h2>...</h2>
					    <p>...</p>
			  		</div>
			    </div>
			</div>
			  	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
				    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    <span class="sr-only">Précédent</span>
			  	</a>
			  	<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    <span class="sr-only">Suivant</span>
			  	</a>
		</div>          
    </section>
      
<?php $content = ob_get_clean(); ?>

<?php require('template.php') ?>