<?php
session_start();
require_once "../models/clientes.modelo.php";

class AjaxClientes{
  /*=============================================
  MOSTRAR CLIENTES EN DATATABLE
  =============================================*/
  static public function ajaxMostrarClientes(){
    $respuesta = ModeloClientes::mdlMostrarClientes();
    if (count($respuesta) == 0) {
        echo '{"data": []}';
        return;
    }
    $datosJson = '{
    "data": [';
    for ($i = 0; $i < count($respuesta); $i++) {
        $botones = "<button type='button' title='editar' style='margin-right:2px' class='waves-effect waves-circle btn btn-circle btn-primary btn-xs mb-5'><i class='mdi mdi-account-edit'></i></button><button type='button' onclick='eliminar(".$respuesta[$i]["cli_id"].")' title='eliminar' id='eliminar' class='waves-effect waves-circle btn btn-circle btn-danger btn-xs mb-5'><i class='mdi mdi-delete'></i></button>";
        $datosJson .= '[
            "' . ($i + 1) . '",
            "' . $respuesta[$i]["cli_documento"] . '",
            "' . $respuesta[$i]["cli_nombres"]. '",
            "' . $respuesta[$i]["cli_apellidos"]. '",
            "' . $respuesta[$i]["cli_telefono"]. '",
            "' . $respuesta[$i]["cli_direccion"]. '",
            "' . $respuesta[$i]["cli_correo"]. '",
            "' . $botones . '"
          ],';
    }
    $datosJson = substr($datosJson, 0, -1);
    $datosJson .= ']}';
    echo ($datosJson);
  }
  // =====================================================================
  // CREAR CLIENTE
  // =====================================================================
  static public function ajaxCrearCliente(){
    $tabla = "clientes";
    $datos = array(
      "cli_tipoDocumento" => $_POST["tipoDocumento"],
      "cli_documento" => $_POST["documento"],
      "cli_nombres" => $_POST["nombre"],
      "cli_apellidos" => $_POST["apellido"],
      "cli_genero" => $_POST["genero"],
      "cli_fechaNacimiento" => $_POST["fechaNacimiento"],
      "cli_telefono" => $_POST["telefono"],
      "cli_direccion" => $_POST["direccion"],
      "cli_correo" => $_POST["correo"],
      "cli_tipoSangre" => $_POST["tipoSangre"]
    );
    $respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);
    if ($respuesta == "ok") {
      echo $respuesta;
    } else {
      echo ("Error al enviar los datos, vuelva a intentarlo");
    }
  }
  // =====================================================================
  // ELIMINAR CLIENTE
  // =====================================================================
  static public function ajaxEliminarCliente($id){
    $respuesta = ModeloClientes::mdlEliminarCliente($id);
    echo json_encode($respuesta);
  }
}
/*=============================================
MOSTRAR CLIENTES EN DATATABLE
=============================================*/
if (isset($_POST["clientes"])){
   $cargar = new AjaxClientes();
   $cargar->ajaxMostrarClientes();
}
/*=============================================
CREAR CLIENTE
=============================================*/
if (isset($_POST["nombre"])){
  $cargar = new AjaxClientes();
  $cargar->ajaxCrearCliente();
}
// =============================================================================
// ELIMINAR CLIENTE
// =============================================================================
if (isset($_POST["eliminar"])) {
  $crear = new AjaxClientes();
  $crear->ajaxEliminarCliente($_POST["eliminar"]);
}

