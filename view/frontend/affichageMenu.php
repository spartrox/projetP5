<div id="menu">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                  <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>

                  <!-- bloc menu déroulant -->
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                
                <?php /*
                            while ($c = $categories->fetch()){
                ?>
                        <div>
                            <div class="categories">
                                <a href="index.php?action=article&amp;id=<?= $c['id']; ?>">
                                  <p><?php echo ($c['titre_categorie']); ?></p>     
                              </a>
                            </div>      
                        </div> 
                <?php                       
                            } $categories->closeCursor(); */
                ?>
                      <a class="dropdown-item" href="index.php?action=pageVoitureAllemande">Voiture Allemande</a>
                      <a class="dropdown-item" href="index.php?action=pageVoitureAmericaine">Voiture Americaine</a>
                      <a class="dropdown-item" href="index.php?action=pageVoitureFrancaise">Voiture francaise</a>
                      <a class="dropdown-item" href="index.php?action=pageVoitureItalienne">Voiture Italienne</a>
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