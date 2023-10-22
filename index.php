<?php
header("Access-Control-Allow-Origin: http://127.0.0.1:8000");
header('Access-Control-Allow-Credentials: true');
header('Access-Control-Max-Age: 86400');
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
  if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
    header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
  exit(0);
}

use Coderwise\Viauy\libs\App;

require_once 'vendor/autoload.php';
require_once 'config/config.php';

App::iniciar();
