<?php
session_start();
require_once "../models/usuarios.modelo.php";

class AjaxUsuarios{
  /*=============================================
  MOSTRAR USUARIOS EN DATATABLE
  =============================================*/
  static public function ajaxMostrarUsuarios(){
    $respuesta = ModeloUsuarios::mdlMostrarUsuarios(null,null);
    if (count($respuesta) == 0) {
        echo '{"data": []}';
        return;
    }
    $datosJson = '{
    "data": [';
    for ($i = 0; $i < count($respuesta); $i++) {
        $botones = "<button type='button' usuario='".$respuesta[$i]["usu_id"]."' title='editar' style='margin-right:2px' class='waves-effect waves-circle btn btn-circle btn-primary btn-xs mb-5' data-toggle='modal' data-target='#modalEditarUsuario'><i class='mdi mdi-account-edit'></i></button><button type='button' title='eliminar' onclick='eliminar(".$respuesta[$i]["usu_id"].")' class='waves-effect waves-circle btn btn-circle btn-danger btn-xs mb-5'><i class='mdi mdi-delete'></i></button>";
        if($respuesta[$i]["usu_estado"] == 1){
          $estado = "<span class='badge badge-pill badge-primary'>Activo</span>";
        }else if($respuesta[$i]["usu_estado"] == 0){
          $estado = "<span class='badge badge-pill badge-danger'>Desactivado</span>";
        }
        $datosJson .= '[
            "' . ($i + 1) . '",
            "' . $respuesta[$i]["usu_documento"] . '",
            "' . $respuesta[$i]["usu_nombre"]. '",
            "' . $respuesta[$i]["usu_correo"]. '",
            "' . $respuesta[$i]["usu_perfil"]. '",
            "' . $estado . '",
            "' . $respuesta[$i]["usu_ultimoLogin"]. '",
            "' . $botones . '"
          ],';
    }
    $datosJson = substr($datosJson, 0, -1);
    $datosJson .= ']}';
    echo ($datosJson);
  }
  // =====================================================================
  // CREAR USUARIO
  // =====================================================================
  public function ajaxCrearUsuario(){
    date_default_timezone_set('America/Bogota');
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $valorF = $fecha . ' ' . $hora;
    $tabla = "usuarios";
    $encriptar = crypt($_POST["pass"], '$2a$07$usesomesillystringforsalt$');
    $datos = array(
      "usu_nombre" => $_POST["nombre"],
      "usu_documento" => $_POST["documento"],
      "usu_usuario" => $_POST["usuario"],
      "usu_password" => $encriptar,
      "usu_perfil" => $_POST["perfil"],
      "usu_correo" => $_POST["correo"],
      "usu_fechaIngreso" => $valorF
    );
    $respuesta= ModeloUsuarios::mdlCrearUsuario($tabla, $datos);
    if ($respuesta == "ok") {
      echo $respuesta;
    } else {
      echo ("Error al enviar los datos, vuelva a intentarlo");
    }
  }
  // =====================================================================
  // ELIMINAR USUARIO
  // =====================================================================
  static public function ajaxEliminarUsuario($id){
    $respuesta = ModeloUsuarios::mdlEliminarUsuario($id);
    echo json_encode($respuesta);
  }
}
/*=============================================
MOSTRAR CLIENTES EN DATATABLE
=============================================*/
if (isset($_POST["usuarios"])){
   $cargar = new AjaxUsuarios();
   $cargar->ajaxMostrarUsuarios();
}
// =============================================================================
// CREAR USUARIO
// =============================================================================
if (isset($_POST["nombre"])) {
  $crear = new AjaxUsuarios();
  $crear->ajaxCrearUsuario();
}
// =============================================================================
// ELIMINAR USUARIO
// =============================================================================
if (isset($_POST["eliminar"])) {
  $crear = new AjaxUsuarios();
  $crear->ajaxEliminarUsuario($_POST["eliminar"]);
}
