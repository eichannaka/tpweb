

<?php

    require_once('conf/conf.php');
    require_once('funciones/getMundiales.php');
    require_once('funciones/funciones_paginador.php');

    try{
        $conexion = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
        
/*         $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Conexión realizada Satisfactoriamente"; */
    }catch(PDOException $e){
        //echo 'No se pudo conectar a la base de datos, porque: ' . $e->getMessage();
        //exit;
        header('Location: error.php');
    }
    /* Nuevo */
        {

        }

    $mundiales = getMundial($conexion);

    //List of all mundiales.
    $cantidad = count($mundiales);
    //Página actual.
    $pagina_actual = $_GET['pag'] ?? 1;
    //Cuántos registros por página.
    $cuantos_por_pagina = 5;

    //Enlaces del paginado.
    $paginado_enlaces = paginador_enlaces($cantidad, $pagina_actual, $cuantos_por_pagina);

    $mundiales = paginador_lista($mundiales, $pagina_actual, $cuantos_por_pagina);

?>
<?php

$noticias = array(
    array("titulo"=>"Futbol Clasico desembarca en Japon",
    "fecha"=>"25/02/2020",
    "imagen"=>"noticia.jpg",
    "descripcion"=>"El cortejo fúnebre llegará esta tarde al palacio de Holyroodhouse, residencia real, tras pasar por las localidades de Ballater, Aberdeen y Dundee | El funeral de Estado por la reina se celebrará el 19 de septiembre en Londres | El príncipe Guillermo, sobre la muerte de la monarca: “Estuvo a mi lado durante los días más tristes de mi vida”"),
    array("titulo"=>"Empresa local busca incorporar 50 nuevos empleados",
    "fecha"=>"25/02/2021",
    "imagen"=>"noticia1.jpeg",
    "descripcion"=>"La selección, con Lorenzo Brown al mando, remonta ante Lituania después de una prórroga (102-94) en una demostración de mucha personalidad y alcanza los cuartos de final del Eurobasket"),array(
      "titulo" => "Boom de ventas de pelotas clasicas",
    "fecha"=>"25/02/2022",
    "imagen"=>"noticia2.jpg",
    "descripcion"=>"Boca y River reeditarán una nueva edición del Superclásico del fútbol argentino este domingo, desde las 17, cuando se midan en La Bombonera por la fecha 18 de la Liga Profesional, en un duelo clave para sus aspiraciones de ir por el título. A continuación, todo lo que tenés que saber del partido que será dirigido por Darío Herrera")
)


?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require('maquetado/_css.php') ?>

    <title>Hello, world!</title>
    <?php require('maquetado/_nav.php') ?>
</head>

<body>

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="maquetado/carrousel-1.jpg" class="d-block w-100" alt="..." height="500px">
    </div>
    <div class="carousel-item">
      <img src="maquetado/carrousel-2.jpg" class="d-block w-100" alt="..." height="500px">
    </div>
    <div class="carousel-item">
      <img src="maquetado/carrousel-3.jpg" class="d-block w-100" alt="..." height="500px">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Anterior</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Siguiente</span>
  </button>
</div>

<section class="container mt-4">
    <h1>Lo que hacemos</h1>
    <p>“José Antonini” se caracteriza por la fabricación de pelotas y cámaras de Fútbol desde hace más de 60 años; cuya calidad y diseño ya son reconocidas en el mercado nacional.

Esta empresa comienza en los años ´55 con el señor Blas Angel Antonini con la fabricación de artículos de goma y preparando gomas moldeadas para la fábrica “Superball”.

Luego van a integrar cámaras y algunos diseños de pelotas de fútbol; a la que tiempo más tarde la venden y se dedican únicamente a fabricar cámaras. En 1995 emprenden nuevamente con las pelotas.

Esto les ha permitido producir artículos que satisfacen la más alta exigencia del deporte nacional.</p>
</section>

<section class="container mt-4" id="noticias">
    <h2>Novedades</h2>

    <div class="row justify-center-center align-items-center m-0 p-2">

      <?php foreach ($noticias as $n):?>
          <article class="col-lg-4 p-2">
                      <img src="maquetado/<?php echo $n['imagen'] ?>" class="img-fluid"/>
                      <h3><?php echo $n['titulo']?></h3>
                      <hr className='mx-auto w-75'/>
                      <h4><?php echo $n['fecha']?></h4>
                      <p><?php echo $n['descripcion']?></p>
                      <button  type="button" class="text-center">
                              Ver mas
                          <span class="glyphicon glyphicon-heart"></span>
                      </button>
          </article>
      <?php endforeach?>
    </div>
</section>
        <hr>
    <div class="container">
        
        <h1 class="text-center"> Lista de Mundiales </h1>
        
        <form action="alumnos_success.php" method="get" class="mb-5">
            <div class="mb-3">
                <label for="id_mundial" class="form-label">ID Mundiales </label>
                <input type="number" class="form-control" name="id_mundial" id="id_mundial" placeholder="Ingrese el id del mundial que deasea buscar.">
            </div>
            <button type="submit" class="btn btn-primary"> Buscar </button>
        </form>
        
        <table class="table">
            <thead>
                <tr>
                    <th class="text-center"> ID </th>
                    <th class="text-center"> Nombre del balon </th>
                    <th class="text-center"> Pais Anfitrion </th>
                    <th class="text-center"> Año del mundial </th>
                    <th class="text-center"> Precio </th>
                </tr>
            </thead>
            <tbody>
                
                <?php if (count($mundiales) > 0) : ?>
                    <?php foreach ($mundiales as $mundial) : ?>
                        <tr>
                            <!--<td class="text-center">
                                <img src="img/avatares/
                                <?php echo $mundial['anio_mundial'] ?>" alt="<?php echo $mundial['nombre_balon'] ?>">
                            </td>-->
                            <td class="text-center"> <?php echo $mundial['id_balon'] ?> </td>
                            <td class="text-center"> <?php echo $mundial['nombre_balon'] ?> </td>
                            <td class="text-center"> <?php echo $mundial['pais_anfitrion'] ?> </td>
                            <td class="text-center"> <?php echo $mundial['anio_mundial'] ?> </td>
                            <td class="text-center"> <?php echo $mundial['precio'] ?> </td>
                        </tr>
                        <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                            <td colspan="3" class="text-center"> No hay mundiales para mostrar. </td>
                        </tr>
                        <?php endif ?>
                        
                    </tbody>
                </table>
                
                <nav aria-label=" Page navigation example">
                    <ul class="botones pagination">
                        <?php if($paginado_enlaces['anterior']): ?>
                            <li class="page-item">
                                <a class="page-link" href="?pag=<?php echo $paginado_enlaces['primero'] ?>"> Primero </a>                        
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="?pag=<?php echo $paginado_enlaces['anterior'] ?>"> <?php echo $paginado_enlaces['anterior'] ?> </a>
                            </li>
                            <?php endif ?>
                            <li class="page-item active"> 
                                <span class="page-link">
                                    <?php echo $paginado_enlaces['actual'] ?> 
                                </span>
                            </li>
                            <?php if($paginado_enlaces['siguiente']): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?pag=<?php echo $paginado_enlaces['siguiente'] ?>"> <?php echo $paginado_enlaces['siguiente'] ?> </a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="?pag=<?php echo $paginado_enlaces['ultimo'] ?>"> Último </a>
                                </li>
                                <?php endif ?>
                            </ul>
                        </nav>
                    </div>
    <?php require('maquetado/_footer.php') ?>
    <?php require('maquetado/_js.php') ?>
</body>

</html>