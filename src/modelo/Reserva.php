<?php

namespace Coderwise\Viauy\Modelo;

use stdClass;
use PDO;
use PDOException;
use Coderwise\Viauy\libs\Conexion;

class Reserva
{
    public function __construct()
    {
    }


    public static function reserva_pasaje($nombre_user, $id_servicio, $fecha_reserva)
    {
        try {
            $conexion = Conexion::getConexion();
            $pdo = $conexion->getPdo();

            // Obtener IDUsuario en base a su email
            $sql = "SELECT IDUsuario FROM usuarios WHERE Email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':email', $nombre_user, PDO::PARAM_STR);
            $stmt->execute();

            $id_usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Obtener IdOmnibus
            $sql = "SELECT IdOmnibus FROM servicios WHERE IdServicio = :servicio_ido";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':servicio_ido', $id_servicio, PDO::PARAM_STR);
            $stmt->execute();

            $id_omnibus = $stmt->fetch(PDO::FETCH_ASSOC);

            // Fuerza el código de asiento a 1 (no hay interfaz para seleccionar asiento de momento)
            $cod_asiento = 1;

            // Realizar insert en la tabla reserva
            $sql = "INSERT INTO reserva (CodAsiento, IdOmnibus, IdServicio, IDUsuario, Fecha_Reserva) VALUES (:ca, :ido, :ids, :idu, :fr)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':ca', $cod_asiento);
            $stmt->bindParam(':ido', $id_omnibus['IdOmnibus']); // Obtener el valor de $id_omnibus
            $stmt->bindParam(':ids', $id_servicio);
            $stmt->bindParam(':idu', $id_usuario['IDUsuario']); // Obtener el valor de $id_usuario
            $stmt->bindParam(':fr', $fecha_reserva);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
