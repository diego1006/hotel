<?php
require_once "controllers/plantilla.controlador.php";
require_once "controllers/usuarios.controlador.php";

require_once "models/usuarios.modelo.php";
require_once "models/clientes.modelo.php";
require_once "models/movimientosCaja.modelo.php";
require_once "models/cajas.modelo.php";

$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();