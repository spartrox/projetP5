<?php $title = "Article et commentaires de LeagueOfAuto "; ?>
<?php $script=""; ?>
    <?php ob_start(); ?>
    <h2>Bonne lecture !</h2>

        <div class="container">
            <div>
                <?php 
                    if (!empty($_SESSION['admin'])):   
                ?>
                    <em><p class="phraseRetourArticle"><a href="index.php?action=pageModifChapitre&amp;id=<?= $article['id']?>">Modifier ce chapitre</a></p></em>
                
                <?php
                    else:
                        echo "";
                    endif;
                ?>
            </div>
            <h3>
                <?= htmlspecialchars($article['titre']); ?>
            </h3><br>

                <?= nl2br($article['contenu']); ?>
           
                <em>publié le <?= $article['date_creation_fr']; ?></em>
        </div><br><br>
            
        <div>
            <div>
               <p class="phraseRetourArticle"><a href="index.php?action=listeChapitres">Retour à la liste des chapitres</a></p>
            </div>        
            <hr>
                <h4>Espace commentaire</h4>
            <hr>
            
            

    <?php $content = ob_get_clean(); ?>
<?php require('template.php') ?>