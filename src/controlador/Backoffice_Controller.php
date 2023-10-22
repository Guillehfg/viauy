<?php

use Coderwise\Viauy\libs\Controlador;
use Coderwise\Viauy\Modelo\BackOffice;

class Backoffice_Controller extends Controlador
{
  public function backoffice_editar()
  {
    $this->cargarVista("dashboard_admin/backoffice-editar");
  }

  public function editarLinea()
  {
    header("Content-Type: application/json");
    try {
      $datos = $_POST;
      $errores = array();
      if (!$this->validarValorVacio($datos["id_coche"])) {
        $errores["id_coche"] = "El campo id_coche es obligatorio";
      }

      if ($this->validarValorVacio($datos["id_coche"]) && !$this->validarNumero($datos["id_coche"])) {
        $errores["id_coche_number"] = "El campo id_coche debe ser numerico";
      }

      if (!$this->validarValorVacio($datos["origen"])) {
        $errores["origen"] = "El campo origen es obligatorio";
      }

      if (!$this->validarValorVacio($datos["destino"])) {
        $errores["destino"] = "El campo destino es obligatorio";
      }

      if (!$this->validarValorVacio($datos["hora_salida"])) {
        $errores["hora_salida"] = "El campo hora_salida es obligatorio";
      }

      if (!$this->validarValorVacio($datos["hora_llegada"])) {
        $errores["hora_llegada"] = "El campo hora_llegada es obligatorio";
      }

      if (!$this->validarValorVacio($datos["precio"])) {
        $errores["precio"] = "El campo precio es obligatorio";
      }

      if ($this->validarValorVacio($datos["precio"]) && !$this->validarNumero($datos["precio"])) {
        $errores["precio_number"] = "El campo precio debe ser numerico";
      }

      if (count($errores) > 0) return $this->respuestaError($errores);

      $modelo = BackOffice::editarLinea($datos);

      $this->respuestaSuccess(null, "True");
    } catch (\Exception $e) {
      echo $e;
    }

    // $modelo = BackOffice::editarLinea();
  }

  public function obtenerFiltros()
  {
    header("Content-Type: application/json");
    $filtros = BackOffice::obtenerFiltros();

    return $this->respuestaSuccess($filtros, "Filtros");
  }

  public function backoffice_eliminar()
  {
    $this->cargarVista("dashboard_admin/backoffice-eliminar");
  }

  public function backoffice_estadisticas()
  {
    $this->cargarVista("dashboard_admin/backoffice-estadisticas");
  }

  public function backoffice_gestion()
  {
    $this->cargarVista("dashboard_admin/backoffice-gestion");
  }

  public function backoffice_perfil()
  {
    $this->cargarVista("dashboard_admin/backoffice-perfil");
  }

  public function backoffice_noticias()
  {
    $this->cargarVista("dashboard_admin/backoffice-noticias");
  }
}
