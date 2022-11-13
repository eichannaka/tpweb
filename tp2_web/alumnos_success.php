<?php

require_once('conf/conf.php');
require_once('funciones/getMundiales.php');

try{
    $conexion = new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8', DB_USER, DB_PASSWORD);
}catch(PDOException $e){
 header('Location: error.php');
 }

$id_mundial = $_GET['id_mundial'] ?? null;

$mundial = getMundialByID($conexion, $id_mundial);


?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require('maquetado/_css.php') ?>

    <title>Resultado de busqueda</title>
</head>

<body>

    <div class="container">
        <?php if ($mundial) : ?>
            <div class="card text-center mt-5">
                <div class="card-body">
                    <h1 class="mb-3 text-center">
                        <?php echo $mundial['id_balon'] ?>
                    </h1>
                    <p class="card-text">
                        <li>
                            Balon: <?php echo $mundial['nombre_balon'] ?>
                        </li>
                        <li>
                        Pais Anfitrion: <?php echo $mundial['pais_anfitrion'] ?>
                        </li>
                        <li>
                            Anio: <?php echo $mundial['anio_mundial'] ?>
                        </li>
                        
                    </p>
                </div>
            </div>
        <?php else : ?>
            <h1 class="mb-3 text-center">
                Sin resultados
            </h1>
            <div class="alert alert-danger"> No se ha encontrado el mundial. </div>
        <?php endif ?>
        <hr>
        <a class="btn btn-primary" href="index.php"> Volver </a>
    </div>

    <?php require('maquetado/_js.php') ?>

</body>

</html>