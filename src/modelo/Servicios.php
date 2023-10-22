<?php

namespace Coderwise\Viauy\Modelo;

use stdClass;
use PDO;
use PDOException;
use Coderwise\Viauy\libs\Conexion;

class Servicios
{
    public function __construct()
    {
    }


    public static function busqueda_travel($origen, $destino)
    {
        try {
            $conexion = Conexion::getConexion();
            $pdo = $conexion->getPdo();

            $sql = "SELECT IDruta FROM rutas WHERE Origen = :origen AND Destino = :destino";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':origen', $origen, PDO::PARAM_STR);
            $stmt->bindParam(':destino', $destino, PDO::PARAM_STR);
            $stmt->execute();

            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);


            if ($resultado) {
                $id_ruta = $resultado['IDruta'];

                $sql = "SELECT IDlinea, IdServicio, DuracionViaje, Precio FROM lineas WHERE IDruta = :idRuta";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':idRuta', $id_ruta, PDO::PARAM_INT);
                $stmt->execute();

                $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

                return json_encode($resultados);
            } else {
                return "No se encontró ninguna ruta que tenga el origen y destino indicados.";
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
