<?php
session_start();
require_once "../models/movimientosCaja.modelo.php";

class AjaxMovimientos{
  /*=============================================
  MOSTRAR CLIENTES EN DATATABLE
  =============================================*/
  static public function ajaxMostrarMovimientos($tipo){
    $respuesta = ModeloMovimientos::mdlMostrarMovimientos($tipo);
    if (count($respuesta) == 0) {
        echo '{"data": []}';
        return;
    }
    $datosJson = '{
    "data": [';
    for ($i = 0; $i < count($respuesta); $i++) {
        $botones = "<button type='button' title='editar' style='margin-right:2px' class='waves-effect waves-circle btn btn-circle btn-primary btn-xs mb-5'><i class='mdi mdi-account-edit'></i></button><button type='button' title='eliminar' onclick='eliminar(".$respuesta[$i]["mov_idCaja"].")' id='eliminar' class='waves-effect waves-circle btn btn-circle btn-danger btn-xs mb-5'><i class='mdi mdi-delete'></i></button>";
        $datosJson .= '[
            "' . ($i + 1) . '",
            "' . $respuesta[$i]["mov_valorCaja"]. '",
            "' . $respuesta[$i]["mov_descripcionCaja"]. '",
            "' . $respuesta[$i]["mov_fechaCaja"]. '",
            "' . $respuesta[$i]["usu_nombre"]. '",
            "' . $botones . '"
          ],';
    }
    $datosJson = substr($datosJson, 0, -1);
    $datosJson .= ']}';
    echo ($datosJson);
  }
  // =====================================================================
  // CREAR MOVIMIENTO
  // =====================================================================
  public function ajaxCrearMovimientoCaja(){
    date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $valorF = $fecha . ' ' . $hora;
    $tabla = "movimientos_caja";
    $datos = array(
      "mov_tipoCaja" => $_POST["tipo"],
      "mov_fechaCaja" => $valorF,
      "mov_valorCaja" => $_POST["valor"],
      "mov_descripcionCaja" => $_POST["descripcion"],
      "mov_idUsuarioCaja" => $_SESSION["id"]
    );
    $respuesta = ModeloMovimientos::mdlCrearMovimiento($tabla,$datos);
    if ($respuesta == "ok") {
      echo $respuesta;
    } else {
      echo ("Error al enviar los datos, vuelva a intentarlo");
    }
  }
  // =====================================================================
  // ELIMINAR MOVIMIENTO
  // =====================================================================
  static public function ajaxEliminarMovimiento($id){
    $respuesta = ModeloMovimientos::mdlEliminarMovimiento($id);
    echo json_encode($respuesta);
  }
}
/*=============================================
MOSTRAR INGRESOS EN DATATABLE
=============================================*/
if (isset($_POST["ingresos"])){
  $cargar = new AjaxMovimientos();
  $cargar->ajaxMostrarMovimientos($_POST["ingresos"]);
}
/*=============================================
MOSTRAR EGRESOS EN DATATABLE
=============================================*/
if (isset($_POST["egresos"])){
  $cargar = new AjaxMovimientos();
  $cargar->ajaxMostrarMovimientos($_POST["egresos"]);
}
// =============================================================================
// CREAR MOVIMIENTO
// =============================================================================
if (isset($_POST["valor"])) {
  $crear = new AjaxMovimientos();
  $crear->ajaxCrearMovimientoCaja();
}
// =============================================================================
// ELIMINAR MOVIMIENTO
// =============================================================================
if (isset($_POST["eliminar"])) {
  $crear = new AjaxMovimientos();
  $crear->ajaxEliminarMovimiento($_POST["eliminar"]);
}