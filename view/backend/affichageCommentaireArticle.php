<?php $title = "Commentaire du chapitre LeagueOfAuto"; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>

    <!-- Création d'un nouveau chapitre -->
    <section>
        <h2>Gestion commentaire </h2>
            <div>
                <p class="phraseRetourAdmin"><a href="index.php?action=pageAdmin">Retour au panneau administrateur</a></p>
            </div>
            <!-- Affichage des commentaires du chapitre -->
        <div class="gestionAdmin">
            <p>Listes des commentaires de l'article : <em><?= $article['titre'] ?></em></p>
        </div>            
        <div class="container fond">
        <?php 
            $result = $comments->rowCount();        

                if ($result === 0):
                        echo "<p class='messageErreur'>Il n'y a aucun commentaire pour cet article !</p>";
                
                else:  
                    while($c = $comments->fetch()): 
        ?>
                    <article class="ajoutCommentaire container">    
                        <p><b><?= htmlspecialchars($c['pseudo']) ?></b><i> Ajouté le <?=$c['comment_article_fr'] ?></i></p><hr>
                        <p><?= nl2br(htmlspecialchars($c['contenu'])) ?><br></p>

                        <!-- Suppression du commentaire -->
                        <p><a class="signaler" href="index.php?action=deleteComment&amp;id=<?= $c['id'] ?>" onclick="return(confirm('Voulez-vous supprimer ce commentaire ? '))">
                        <i class="fas fa-exclamation-triangle"></i>Supprimer</a>
                        
                    </article>      
        <?php
                    endwhile;

                endif;// Fin de la boucle des autres commentaires
                $comments->closeCursor();       
        ?>           
        </div>

    </section>

<?php $content = ob_get_clean(); ?>
    
<?php require('template.php') ?>