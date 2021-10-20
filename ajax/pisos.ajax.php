<?php
session_start();
require_once "../models/pisos.modelo.php";

class AjaxPisos{
  /*=============================================
  MOSTRAR CLIENTES EN DATATABLE
  =============================================*/
  static public function ajaxMostrarPisos(){
    $respuesta = ModeloPisos::mdlMostrarPisos();
    if (count($respuesta) == 0) {
        echo '{"data": []}';
        return;
    }
    $datosJson = '{
    "data": [';
    for ($i = 0; $i < count($respuesta); $i++) {
        $botones = "<button type='button' title='editar' style='margin-right:2px' class='waves-effect waves-circle btn btn-circle btn-primary btn-xs mb-5'><i class='mdi mdi-account-edit'></i></button><button type='button' title='eliminar' onclick='eliminar(".$respuesta[$i]["pis_id"].")' id='eliminar' class='waves-effect waves-circle btn btn-circle btn-danger btn-xs mb-5'><i class='mdi mdi-delete'></i></button>";
        $datosJson .= '[
            "' . ($i + 1) . '",
            "' . $respuesta[$i]["pis_nombre"]. '",
            "' . $botones . '"
          ],';
    }
    $datosJson = substr($datosJson, 0, -1);
    $datosJson .= ']}';
    echo ($datosJson);
  }
  // =====================================================================
  // CREAR PISO
  // =====================================================================
  public function ajaxCrearPiso(){
    $tabla = "pisos";
    $datos = array(
      "pis_nombre" => strtoLower($_POST["nombre"])
    );
    $respuesta= ModeloPisos::mdlCrearPiso($tabla,$datos);
    if ($respuesta == "ok") {
      echo $respuesta;
    } else {
      echo ("Error al enviar los datos, vuelva a intentarlo");
    }
  }
  // =====================================================================
  // ELIMINAR PISO
  // =====================================================================
  static public function ajaxEliminarPiso($id){
    $respuesta = ModeloPisos::mdlEliminarPiso($id);
    echo json_encode($respuesta);
  }
}
/*=============================================
MOSTRAR PISOS EN DATATABLE
=============================================*/
if (isset($_POST["pisos"])){
  $cargar = new AjaxPisos();
  $cargar->ajaxMostrarPisos();
}
// =============================================================================
// CREAR PISO
// =============================================================================
if (isset($_POST["nombre"])) {
  $crear = new AjaxPisos();
  $crear->ajaxCrearPiso();
}
// =============================================================================
// ELIMINAR PISO
// =============================================================================
if (isset($_POST["eliminar"])) {
  $crear = new AjaxPisos();
  $crear->ajaxEliminarPiso($_POST["eliminar"]);
}
