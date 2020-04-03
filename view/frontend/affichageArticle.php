<?php $title = "Article de LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>

	    <h2>Bonne lecture !</h2>

	        <div class="container fond">
	            <div>
	                <?php 
	                    if (!empty($_SESSION['admin'])):     
	                ?>
	                    <em><p class="phraseRetourAdmin"><a href="index.php?action=pageModifArticle&amp;id=<?= htmlspecialchars($article['id'])?>">Modifier l'article</a></p></em>
	                
	                <?php
	                     else: 
	                        echo "";
	                    endif;
	                ?>
	            </div>
	            <h4>
	                <?= htmlspecialchars($article['titre']); ?>
	            </h4><br>
                            <div class="mt-3 mb-3  block_imageArticle">
                                <img id='imageBlock' src="public/image_article/<?= htmlspecialchars($article['image_article']); ?>">
                            </div>

	               	<div class="contenu">
	                	<?= nl2br($article['contenu']); ?><br><br>
	                </div>
	                <em class="publication">Article publié le <?= htmlspecialchars($article['date_article_fr']) ; ?></em>
	        </div><br><br>
	            
	        <div>
	            <p class="phraseRetourAdmin"><a href="index.php?action=pageActualites">Retour à la liste des articles publiés</a></p>
	        </div>        
		        <div class="trait2"></div>
		            <h3>Espace commentaire</h3><br>
		        <div class="trait2"></div>  
	        <div>
            <?php 
                if (!empty($_SESSION)):
            ?>

            <form action="index.php?action=addComment&amp;id=<?= htmlspecialchars($article['id']) ?>" method="post">
                <label class="commentaire mt-2 mb-2 ml-2" for="commentaire">Commentaire :</label></br>
                <textarea name="commentaire" placeholder="Ajouter votre commentaire"></textarea><br>
                    <input class="btn btn-primary mt-2 ml-2" type="submit" value="Poster mon commentaire" name="submit_commentaire">
            </form>

            <?php 
                else:
                    echo '<div id="laisserCommentaire"> Pour écrire un commentaire, veuillez vous <a href="index.php?action=pageConnexion"><b>Connecter</b></a></div>';
                endif;
            ?>

        	</div><br><br>

            <!-- Affichage des commentaires -->
            <?php 

                $result = $comments->rowCount();        
                    if ($result === 0):
                            echo "<p class='messageErreur ml-2'>Il n'y a aucun commentaire pour cet article, soyez le premier à écrire un commentaire :)</p>";
                    else:
                        while($c = $comments->fetch()):
            ?>
                    <div class="ajoutCommentaire container">    
                        <p><b><?= htmlspecialchars($c['pseudo']) ?></b><i> Ajouté le <?=$c['comment_article_fr'] ?></i></p><hr>
                        <p><?= nl2br(htmlspecialchars($c['contenu'])) ?><br></p>
                    
                    <?php if (!empty($_SESSION)): ?>
                        <p><a class="signaler" href="index.php?action=reportComment&amp;idArticle=<?= $article['id']?>&idComment=<?= $c['id']?>" onclick="return(confirm('Etes vous sur de vouloir signaler ce commentaire ? '))"><i class="fas fa-exclamation-triangle"></i>Signaler</a></p>                
                    <?php else:
                          endif;?>
                    </div>    
            
            <?php
                        endwhile;

                    endif;// Fin de la boucle des autres commentaires
                     $comments->closeCursor();       
            ?>

	<?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>