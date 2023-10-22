<?php

use Coderwise\Viauy\libs\Controlador;
use Coderwise\Viauy\Modelo\Reserva;

class Reserva_Controller extends Controlador
{
    public function reserva()
    {
        header('Content-Type: application/json');

        try {
            $nombre_user = $_POST['nombre_user'];
            $id_servicio = $_POST['id_servicio'];
            $fecha_reserva = $_POST['fecha_reserva'];

            $resp = Reserva::reserva_pasaje($nombre_user, $id_servicio, $fecha_reserva);

            if ($resp) {
                $respuesta = ["mensaje" => "exito"];
            } else {
                $respuesta = ["error" => "error"];
            }
            echo json_encode($respuesta);
        } catch (\Throwable $th) {
            return "error";
        }
    }
}
