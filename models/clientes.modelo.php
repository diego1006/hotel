<?php
require_once "conexion.php";
class ModeloClientes{
	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/
	static public function mdlMostrarClientes(){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM clientes where cli_estado = 1");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	/*=============================================
	CREAR CLIENTE
	=============================================*/
	static public function mdlCrearCliente($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(cli_tipoDocumento, cli_documento, cli_nombres, cli_apellidos, cli_genero, cli_fechaNacimiento, cli_telefono, cli_direccion, cli_correo, cli_tipoSangre, cli_estado) VALUES (:cli_tipoDocumento, :cli_documento, :cli_nombres, :cli_apellidos, :cli_genero, :cli_fechaNacimiento, :cli_telefono, :cli_direccion, :cli_correo, :cli_tipoSangre, 1)");

		$stmt->bindParam(":cli_tipoDocumento", $datos["cli_tipoDocumento"], PDO::PARAM_STR);
		$stmt->bindParam(":cli_nombres", $datos["cli_nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":cli_genero", $datos["cli_genero"], PDO::PARAM_STR);
		$stmt->bindParam(":cli_telefono", $datos["cli_telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":cli_correo", $datos["cli_correo"], PDO::PARAM_STR);
		$stmt->bindParam(":cli_documento", $datos["cli_documento"], PDO::PARAM_STR);
		$stmt->bindParam(":cli_apellidos", $datos["cli_apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":cli_fechaNacimiento", $datos["cli_fechaNacimiento"], PDO::PARAM_STR);
		$stmt->bindParam(":cli_direccion", $datos["cli_direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":cli_tipoSangre", $datos["cli_tipoSangre"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return $stmt->errorInfo();
		}
	}
	/*=============================================
	ELIMINAR CLIENTE
	=============================================*/
	static public function mdlEliminarCliente($id){
		$stmt = Conexion::conectar()->prepare("UPDATE clientes SET cli_estado = 0 WHERE cli_id = $id");
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
}