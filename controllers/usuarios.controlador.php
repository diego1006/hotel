<?php
class ControladorUsuarios{
	// =====================================================================
  // INGRESO DE USUARIOS
  // =====================================================================
	static public function ctrIngresoUsuario(){
   	if (isset($_POST["ingUsuario"])) {
      $encriptar = crypt($_POST["ingPassword"], '$2a$07$usesomesillystringforsalt$');
			$usuario = $_POST["ingUsuario"];
			$respuesta = ModeloUsuarios::MdlMostrarUsuarios('usu_usuario', $usuario);
      if (isset($respuesta["usu_password"]) && $respuesta["usu_password"] == $encriptar) {
        if ($respuesta["usu_estado"] == 1) {
          $_SESSION["iniciarSesion"] = "ok";
          $_SESSION["id"] = $respuesta["usu_id"];
          $_SESSION["documento"] = $respuesta["usu_documento"];
          $_SESSION["nombre"] = $respuesta["usu_nombre"];
          $_SESSION["usuario"] = $respuesta["usu_usuario"];
          $_SESSION["perfil"] = $respuesta["usu_perfil"];
          /*=============================================
					REGISTRAR FECHA PARA SABER EL ÚLTIMO LOGIN
					=============================================*/
          date_default_timezone_set('America/Bogota');
          $fecha = date('Y-m-d');
          $hora = date('H:i:s');
          $fechaActual = $fecha . ' ' . $hora;
          $item1 = "usu_ultimoLogin";
          $valor1 = $fechaActual;
          $item2 = "usu_id";
          $valor2 = $respuesta["usu_id"];
					$ultimoLogin = ModeloUsuarios::mdlActualizarUsuario('usuarios', $item1, $valor1, $item2, $valor2);
          if ($ultimoLogin == "ok") {
            if($_SESSION["perfil"] == "Administrador"){
                echo '<script>
                    window.location = "inicio";
                </script>';
            }else{
                echo '<script>
                    window.location = "ordenes";
                </script>';
            }
          }
        }else{
          echo '<script>$.notify("El usuario aun no esta activado!",{type: "danger", placement: {from: "top", align: "center"}});</script>';
        }
      } else {
        echo '<script>$.notify("Usuario ó contraseña incorrectos!",{type: "danger", placement: {from: "top", align: "center"}});</script>';
      }
    }
  }
}
