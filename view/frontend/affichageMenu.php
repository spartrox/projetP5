<div id="menu">
    <nav class="navbar navbar-expand-lg navbar-light" id="fondMenu">
        <a class="navbar-brand titreMenu" href="index.php" id="titre">LeagueOfAuto</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
          <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                  <a class="nav-link" href="index.php">Accueil</a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="index.php?action=pageActualites">Actualités</a>
              </li>

              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="index.php?action=categorieMenu" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>

                  <!-- bloc menu déroulant -->
                  <div class="dropdown-menu" id="tailleMenu" aria-labelledby="navbarDropdownMenuLink">
                
                <?php 
                            while ($c = $categories->fetch()):
                ?>
                        <div>
                            <div class="categories" id="categoriesMenu">
                                <a href="index.php?action=articleCategorie&amp;id=<?= htmlspecialchars($c['id']); ?>">
                                  <p><?= htmlspecialchars($c['titre_categorie']); ?></p>     
                              </a>
                            </div>      
                        </div> 
                <?php        
                            endwhile;               
                            $categories->closeCursor(); 
                ?>
                  </div>
              </li>

             <li class="nav-item">
                  <a class="nav-link" href="index.php?action=pageApropos">À propos</a>
              </li>

              <li class="nav-item">
                  <a class="nav-link" href="index.php?action=pageContact">Contact</a>
              </li>
              
              <!-- Si une session est ouverte alors on affiche le menu d'un utilisateur -->
              <?php if(isset($_SESSION['id'])) { ?>
            
              <li class="nav-item">
                  <a class="nav-link" href="index.php?action=pageProfil">Mon profil</a>
              </li>
            
              <!-- Si une session est ouverte et si c'est un admin on affiche le menu admin -->   
              <?php if (isset($_SESSION['id']) && ($_SESSION['admin'])){ ?>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=pageAdmin"><b>Gestion Administrateur</b></a>
                </li> 

                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=pageMessage"><b>Gestion message reçus</b></a>
                </li>     
            <!-- Sinon on affiche le menu de base -->    
            <?php } }else { ?>

              <li class="nav-item">
                  <a class="nav-link" href="index.php?action=pageInscription">Inscription</a>
             </li>

             <li class="nav-item">
                  <a class="nav-link" href="index.php?action=pageConnexion">Connexion</a>
              </li>

            <?php } ?>  

          </ul>
      </div>
    </nav>
</div>