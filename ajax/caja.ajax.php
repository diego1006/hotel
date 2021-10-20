<?php
session_start();
require_once "../models/cajas.modelo.php";

class AjaxCajas{
  /*=============================================
  MOSTRAR CAJA EN DATATABLE
  =============================================*/
  static public function ajaxMostrarCajas(){
    $respuesta = ModeloCajas::mdlMostrarCajas();
    if (count($respuesta) == 0) {
        echo '{"data": []}';
        return;
    }
    $datosJson = '{
    "data": [';
    for ($i = 0; $i < count($respuesta); $i++) {
        if($respuesta[$i]["caj_fechaCierre"] == "0000-00-00 00:00:00"){
          $boton = "<span class='badge badge-pill badge-success'>Abierta</span>";
        }
        // $botones = "<button type='button' title='editar' style='margin-right:2px' class='waves-effect waves-circle btn btn-circle btn-primary btn-xs mb-5'><i class='mdi mdi-account-edit'></i></button><button type='button' title='eliminar' id='eliminar' class='waves-effect waves-circle btn btn-circle btn-danger btn-xs mb-5'><i class='mdi mdi-delete'></i></button>";
        $datosJson .= '[
            "' . ($i + 1) . '",
            "' . $respuesta[$i]["caj_fechaApertura"]. '",
            "' . $respuesta[$i]["caj_fechaCierre"]. '",
            "' . $respuesta[$i]["caj_ventas"]. '",
            "' . $respuesta[$i]["caj_descuadre"]. '",
            "' . $respuesta[$i]["usu_nombre"]. '",
            "' . $boton . '"
          ],';
    }
    $datosJson = substr($datosJson, 0, -1);
    $datosJson .= ']}';
    echo ($datosJson);
  }
  // =====================================================================
  // CREAR PISO
  // =====================================================================
  public function ajaxAbrirCaja(){
    date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $valorF = $fecha . ' ' . $hora;
    $tabla = "caja";
    $datos = array(
      "caj_efectivoApertura" => $_POST["saldo"],
      "caj_observacion" => $_POST["observacion"],
      "caj_idUsuario" => $_SESSION["id"],
      "caj_fechaApertura" => $valorF
    );
    $respuesta= ModeloCajas::mdlAbrirCaja($tabla,$datos);
    if ($respuesta == "ok") {
      echo $respuesta;
    } else {
      echo ("Error al enviar los datos, vuelva a intentarlo");
    }
  }
}
/*=============================================
MOSTRAR PISOS EN DATATABLE
=============================================*/
if (isset($_POST["cajas"])){
  $cargar = new AjaxCajas();
  $cargar->ajaxMostrarCajas();
}
// =============================================================================
// CREAR PISO
// =============================================================================
if (isset($_POST["saldo"])) {
  $crear = new AjaxCajas();
  $crear->ajaxAbrirCaja();
}
