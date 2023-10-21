<?php

namespace Coderwise\Viauy\libs;

class Controlador
{
  public $datos;
  public function __construct()
  {
  }

  function cargarVista($vistaRuta, $datos = null, $ext = "php")
  {
    $this->datos = $datos;
    $ruta = "src/vista/{$vistaRuta}.{$ext}";
    require_once $ruta;
  }
}


