<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php if(!Security::sessionAccessVerification()) :?>
            <li class="nav-item">
            <a class="nav-link" href="<?= URL ?>back/login">Login</a>
            </li>
        <?php else : ?>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>back/admin">Accueil</a>
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Familles
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="<?= URL ?>back/familles/visualisation">Visualisation</a></li>
                <li><a class="dropdown-item" href="<?= URL ?>back/familles/creation">Création</a></li>
            </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= URL ?>back/deconnexion">Déconnexion</a>
            </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
