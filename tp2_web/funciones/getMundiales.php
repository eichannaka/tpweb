<?php

function getMundial(PDO $conexion)
{

    $consulta = $conexion->prepare('
        SELECT id_balon,nombre_balon,pais_anfitrion,anio_mundial,precio,imagen
        FROM db_balon
    ');

    $consulta->execute();

    $mundial = $consulta->fetchAll(PDO::FETCH_ASSOC);

    return $mundial;

}

function getMundialByID(PDO $conexion, $id_balon)
{

    $consulta = $conexion->prepare('
        SELECT id_balon,nombre_balon,pais_anfitrion, anio_mundial, precio, imagen
        FROM db_balon
        WHERE id_balon = :id_balon
    ');

    $consulta->bindValue(':id_balon', $id_balon);

    $consulta->execute();

    $mundial = $consulta->fetch(PDO::FETCH_ASSOC);

    return $mundial;

}