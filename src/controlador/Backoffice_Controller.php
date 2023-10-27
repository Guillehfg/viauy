<?php

use Coderwise\Viauy\libs\Controlador;
use Coderwise\Viauy\Modelo\BackOffice;

class Backoffice_Controller extends Controlador
{
  public function backoffice_editar()
  {
    $this->cargarVista("dashboard_admin/backoffice-editar");
  }

  public function agregarLinea()
  {
    header("Content-Type: application/json");
    try {
      $datos = $_POST;
      $errores = array();
      if (!$this->validarValorVacio($datos["servicio"])) {
        $errores["id_coche"] = "El campo servicio es obligatorio";
      }

      if ($this->validarValorVacio($datos["servicio"]) && !$this->validarNumero($datos["servicio"])) {
        $errores["servicio_number"] = "El campo servicio debe ser numerico";
      }

      if (!$this->validarValorVacio($datos["ruta"])) {
        $errores["ruta"] = "El campo ruta es obligatorio";
      }

      if ($this->validarValorVacio($datos["ruta"]) && !$this->validarNumero($datos["ruta"])) {
        $errores["ruta_number"] = "El campo ruta debe ser numerico";
      }

      if (!$this->validarValorVacio($datos["duracion"])) {
        $errores["duracion"] = "El campo duracion es obligatorio";
      }

      if (!$this->validarValorVacio($datos["precio"])) {
        $errores["precio"] = "El campo precio es obligatorio";
      }

      if ($this->validarValorVacio($datos["precio"]) && !$this->validarNumero($datos["precio"])) {
        $errores["precio_number"] = "El campo precio debe ser numerico";
      }

      if (count($errores) > 0) return $this->respuestaError($errores);

      $respuesta = BackOffice::agregarLinea($datos);

      if (!$respuesta) throw new Exception("Error agregando linea");

      $this->respuestaSuccess(null, "True");
    } catch (\Exception $e) {
      echo $e;
      $this->respuestaError("Error al agregar la linea");
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
