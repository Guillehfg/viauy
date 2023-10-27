<?php

namespace Coderwise\Viauy\Modelo;

// Dependencias
use PDO;
use Coderwise\Viauy\libs\Conexion;

class BackOffice
{
  public static function agregarLinea($datos)
  {
    $conexion = Conexion::getConexion();

    $pdo = $conexion->getPdo();

    $sql = "INSERT INTO lineas (IdServicio, IDruta, DuracionViaje, Precio) VALUES (:servicio, :ruta, :duracion, :precio)";
    $consulta = $pdo->prepare($sql);

    $consulta->execute($datos);

    return true;
  }

  public static function obtenerFiltros()
  {
    $conexion = Conexion::getConexion();
    $pdo = $conexion->getPdo();

    $sql_rutas = "SELECT IDruta AS id, CONCAT(origen, ' - ', destino) AS nombre FROM rutas";
    $consulta_rutas = $pdo->prepare($sql_rutas);
    $consulta_rutas->execute();

    $sql_servicios = "SELECT IdServicio AS id, CONCAT(HoraSalida, ' - ', HoraLlegada, ' - ', Fecha) AS nombre FROM servicios";
    $consulta_servicios = $pdo->prepare($sql_servicios);
    $consulta_servicios->execute();


    $rutas = $consulta_rutas->fetchAll(\PDO::FETCH_ASSOC);
    $servicios = $consulta_servicios->fetchAll(\PDO::FETCH_ASSOC);

    return [
      "rutas" => $rutas,
      "servicios" => $servicios
    ];
  }
};
