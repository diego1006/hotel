<?php
session_start();
require_once "../models/habitaciones.modelo.php";

class AjaxHabitaciones{
	/*=============================================
  MOSTRAR CLIENTES EN DATATABLE
  =============================================*/
  static public function ajaxMostrarHabitaciones(){
    $respuesta = ModeloHabitaciones::mdlMostrarHabitaciones();
    if (count($respuesta) == 0) {
        echo '{"data": []}';
        return;
    }
    $datosJson = '{
    "data": [';
    for ($i = 0; $i < count($respuesta); $i++) {
        $botones = "<button type='button' title='editar' style='margin-right:2px' class='waves-effect waves-circle btn btn-circle btn-primary btn-xs mb-5'><i class='mdi mdi-account-edit'></i></button><button type='button' title='eliminar' onclick='eliminar(".$respuesta[$i]["hab_id"].")' id='eliminar' class='waves-effect waves-circle btn btn-circle btn-danger btn-xs mb-5'><i class='mdi mdi-delete'></i></button>";
        $datosJson .= '[
            "' . ($i + 1) . '",
            "' . $respuesta[$i]["hab_nombre"]. '",
            "' . $respuesta[$i]["pis_nombre"]. '",
            "' . $respuesta[$i]["hab_tipo"]. '",
            "' . $respuesta[$i]["hab_precio"]. '",
            "' . $botones . '"
          ],';
    }
    $datosJson = substr($datosJson, 0, -1);
    $datosJson .= ']}';
    echo ($datosJson);
  }
  // =====================================================================
  // CREAR HABITACION
  // =====================================================================
  public function ajaxCrearHabitacion(){
    $tabla = "habitaciones";
    $datos = array(
      "hab_nombre" => strtoLower($_POST["nombre"]),
      "hab_idPiso" => $_POST["piso"],
      "hab_tipo" => $_POST["tipo"],
      "hab_aire" => $_POST["aire"]??0,
      "hab_ventilador" => $_POST["ventilador"]??0,
     	"hab_camaDoble" => $_POST["camasDobles"],
     	"hab_camaSencilla" => $_POST["camasSencillas"],
     	"hab_tv" => $_POST["tv"]??0,
     	"hab_nevera" => $_POST["nevera"]??0,
     	"hab_precio" => $_POST["precio"],
     	"hab_capacidad" => $_POST["capacidad"],
    );
    $respuesta = ModeloHabitaciones::mdlCrearHabitacion($tabla,$datos);
    if ($respuesta == "ok") {
      echo $respuesta;
    } else {
      echo ("Error al enviar los datos, vuelva a intentarlo");
    }
  }
	// =====================================================================
  // MOSTRAR PISOS EN SELECT
  // =====================================================================
  static public function ajaxMostrarPisos(){
    $respuesta = ModeloHabitaciones::mdlMostrarPisos();
    echo json_encode($respuesta);
  }
  // =====================================================================
  // ELIMINAR HABITACION
  // =====================================================================
  static public function ajaxEliminarHabitacion($id){
    $respuesta = ModeloHabitaciones::mdlEliminarHabitacion($id);
    echo json_encode($respuesta);
  }
}
/*=============================================
MOSTRAR HABITACIONES EN DATATABLE
=============================================*/
if (isset($_POST["habitaciones"])){
  $cargar = new AjaxHabitaciones();
  $cargar->ajaxMostrarHabitaciones();
}
// =============================================================================
// CREAR HABITACION
// =============================================================================
if (isset($_POST["nombre"])) {
  $crear = new AjaxHabitaciones();
  $crear->ajaxCrearHabitacion();
}
/*=============================================
MOSTRAR PISOS EN SELECT CREAR HABITACION
=============================================*/
if (isset($_POST["pisos"])){
  $cargar = new AjaxHabitaciones();
  $cargar->ajaxMostrarPisos();
}
// =============================================================================
// ELIMINAR HABITACION
// =============================================================================
if (isset($_POST["eliminar"])) {
  $crear = new AjaxHabitaciones();
  $crear->ajaxEliminarHabitacion($_POST["eliminar"]);
}