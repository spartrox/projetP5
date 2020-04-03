<?php $title = "Administration de LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>

    <section>
    	<h2>Panneau d'administration</h2>  	

    	<div class="gestionAdmin">
    		<h4>Gestion d'un nouvelle article :</h4><br>
			<a href="index.php?action=pageAjoutArticle" class="btn btn-primary">Ecrire un nouvelle article</a>
    	</div>
    		<br><div class="trait2"></div>  	 

    	<div class="gestionAdmin">
    		<h4>Gestion d'une nouvelle catégorie :</h4><br>
			<a href="index.php?action=pageAjoutCategorie" class="btn btn-primary">Ajouter une nouvelle catégorie</a>
    	</div>
    		<br><div class="trait2"></div>  

    	<div class="gestionAdmin">
    		<h4>Gestion de tout les articles publiés :</h4><br>
    		<a href="index.php?action=pageAllArticles" class="btn btn-primary">Accéder à la liste de tout les articles</a> 
    	</div>
    	   	<br><div class="trait2"></div> 

    	<div class="gestionAdmin">
    		<h4>Gestion des articles par catégories :</h4><br>
                
                <?php 
                            while ($c = $categoriess->fetch()):
                ?>
                        <div>
                            <div class="categorie container col-md-4">
                                <a href="index.php?action=articleCategorie&amp;id=<?= htmlspecialchars($c['id']); ?>">
                                    <p><?= htmlspecialchars($c['titre_categorie']); ?></p> 
                                    <a class="modif" href="index.php?action=pageModifCategorie&amp;&id=<?= htmlspecialchars($c['id']); ?>"><i class="fas fa-user-edit"> modifier</i></a>                                     
                                    <a class="modif" href="index.php?action=deleteCategorie&amp;&id=<?= htmlspecialchars($c['id']); ?>" onclick="return(confirm('Voulez-vous supprimer la catégorie ? cela va aussi supprimer tout les articles de la catégorie ! '))"><i class="fas fa-trash-alt"> supprimer</i></a>                                  
                                </a>
                                <div class="trait2 mt-2"></div> 
                            </div>      
                        </div> 
                <?php                       
                            endwhile;
                            $categoriess->closeCursor();
                ?>          
    	</div>
    	   	<br><div class="trait2"></div>  	

    	<div class="gestionAdmin">
    		<h4>Gestion des commentaires signalé :</h4><br>
    		<a href="index.php?action=pageCommentaireSignale" class="btn btn-primary">Accéder à la liste de tout les commentaires signalé</a> 
    	</div>
    </section>
    
    <?php $content = ob_get_clean(); ?>
    
<?php require('template.php') ?>