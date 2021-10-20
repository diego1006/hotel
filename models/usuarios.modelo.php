<?php
require_once "conexion.php";
class ModeloUsuarios{
	/*=============================================
	MOSTRAR USUARIOS
	=============================================*/
	static public function mdlMostrarUsuarios($item, $valor){
		if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE usu_activo = 1 and $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM usuarios WHERE usu_activo = 1 order by usu_nombre asc");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
	}
	/*=============================================
	ACTUALIZAR USUARIO
	=============================================*/
	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");
		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		if($stmt -> execute()){
			return "ok";
		}else{
			return "error";
		}
	}
	/*=============================================
	CREAR USUARIO
	=============================================*/
	static public function mdlCrearUsuario($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usu_nombre, usu_documento, usu_usuario, usu_correo, usu_password, usu_perfil, usu_estado, usu_fechaIngreso, usu_activo) VALUES (:usu_nombre, :usu_documento, :usu_usuario, :usu_correo, :usu_password, :usu_perfil, 1, :usu_fechaIngreso, 1)");
		$stmt->bindParam(":usu_nombre", $datos["usu_nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usu_documento", $datos["usu_documento"], PDO::PARAM_STR);
		$stmt->bindParam(":usu_usuario", $datos["usu_usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":usu_correo", $datos["usu_correo"], PDO::PARAM_STR);
		$stmt->bindParam(":usu_password", $datos["usu_password"], PDO::PARAM_STR);
		$stmt->bindParam(":usu_perfil", $datos["usu_perfil"], PDO::PARAM_STR);
		$stmt->bindParam(":usu_fechaIngreso", $datos["usu_fechaIngreso"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
	    return $stmt->errorInfo();
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ELIMINAR USUARIO
	=============================================*/
	static public function mdlEliminarUsuario($id){
		$stmt = Conexion::conectar()->prepare("UPDATE usuarios SET usu_activo = 0 WHERE usu_id = $id");
		// $stmt -> bindParam(":id", $id, PDO::PARAM_INT);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
}