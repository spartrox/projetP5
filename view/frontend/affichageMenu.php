<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">LeagueOfAuto</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
      <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
              <a class="nav-link" href="#">Accueil</a>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="#">Actualités</a>
          </li>

          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catégories</a>

              <!-- bloc menu déroulant -->
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Voiture sportive</a>
                  <a class="dropdown-item" href="#">Voiture Allemande</a>
                  <a class="dropdown-item" href="#">Voiture francaise</a>
              </div>
          </li>

          <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
          </li>

          <!-- Si une session est ouverte alors on affiche le menu d'un utilisateur -->
          <?php if(isset($_SESSION['id'])) { ?>
        
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Profil</a>

              <!-- bloc menu déroulant -->
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Gestion profil</a>
                  <a class="dropdown-item" href="#">Deconnexion</a>
              </div>
            </li>
        
          <!-- Si une session est ouverte et si c'est un admin on affiche le menu admin -->   
          <?php if (isset($_SESSION['id']) && ($_SESSION['admin'])){ ?>

            <li class="nav-item">
              <a class="nav-link" href="index.php?action=pageAdmin"><b>Gestion admin</b></a>
            </li>
 
        <!-- Sinon on affiche le menu de base -->    
        <?php } }else { ?>

          <li class="nav-item">
              <a class="nav-link" href="#">Inscription</a>
         </li>

         <li class="nav-item">
              <a class="nav-link" href="#">Connexion</a>
          </li>

        <?php } ?>  

      </ul>
  </div>
</nav>