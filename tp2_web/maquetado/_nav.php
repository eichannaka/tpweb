<?php $pagina = ""?>
<div class="jumbotron p-2">
  <div class="container text-center">
    <h1>Futbol clasico</h1>      
    <p>Empresa lider en fabricacion y venta de pelotas de futbol</p>
  </div>
</div>

<nav class="navbar navbar-expand-lg  m-0 sticky-top">

  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="maquetado/logo.png" alt=""></a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav container-fluid text-center">
            <li <?php if($pagina == "index"): ?> class="active pr-2" <?php endif?>> <a href="index.php">Home</a></li>
            <li <?php if($pagina == "productos"): ?> class="active" <?php endif?>><a href="productos.php">Productos</a></li>
              <li <?php if($pagina == "contacto"): ?> class="active" <?php endif?>><a href="_contactForm.php">Contacto</a></li>
      </ul>
    </div>

  </div>
</nav>





