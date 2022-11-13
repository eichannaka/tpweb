<?php

$productos = array(
    array("nombre" => "Tango",
    "mundial"=>"Argentina 1978",
    "precio"=>780,
"imagen"=>"tango.jpg"),
    array("nombre" => "Jo'bulani",
    "mundial"=>"Sudafrica 2010",
    "precio"=>760,
    "imagen"=>"jabulani.jpg"),
    array("nombre" => "Brazuca",
    "mundial"=>"Brasil 2014",
    "precio"=>600,
    "imagen"=>"brazuca.jpg"),
    array("nombre" => "Telstar 18",
    "mundial"=>"Rusia 2018",
    "precio"=>800,
    "imagen"=>"telstar.jpg"),
    array("nombre" => "Federale 102",
    "mundial"=>"Italia 1934",
    "precio"=>600,
    "imagen"=>"federale.jpg"),
    array("nombre" => "Coupe du Monde",
    "mundial"=>"Francia 1938",
    "precio"=>1000,
    "imagen"=>"coupe.jpg"),

)

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>

    <?php require('maquetado/_css.php') ?>
</head>
<body>
<?php $pagina = "productos";?>
<?php require('maquetado/_nav.php') ?>

    <section class="container p-3" id="productos">
        
        <div>
        <h1>Nuestro catalogo</h1>
        <p class="text-success"><strong>Envios 100% gratuitos a todo el pais por la compra de 2 o mas unidades!</strong></p>
        </div>

        <div class="row mt-2">
            <?php foreach ($productos as $p):?>
                <article class="col-sm-6 p-2 text-center border border-success p-2 m-0.8">
                    <img src="maquetado/<?php echo $p['imagen'] ?>"/>
                    <div class="p-2">
                    <h2><?php echo $p['nombre']?></h2>
                    <h3><?php echo $p['mundial']?></h3>
                    <p><?php echo "$".$p['precio']?></p>
                    <button  type="button">
                            Agregar al carrito
                        <span class="glyphicon glyphicon-heart"></span>
                    </button>
                    </div>
                </article>
            <?php endforeach?>
        </div>
    </section>

<?php require('maquetado/_footer.php') ?>

<?php require('maquetado/_js.php') ?>
</body>
</html>