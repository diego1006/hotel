<?php
require_once "conexion.php";
class ModeloPisos{
	/*=============================================
	MOSTRAR PISOS
	=============================================*/
	static public function mdlMostrarPisos(){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM pisos where pis_estado = 1");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	/*=============================================
	CREAR PISO
	=============================================*/
	static public function mdlCrearPiso($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(pis_nombre, pis_estado) VALUES (:pis_nombre, 1)");
		$stmt->bindParam(":pis_nombre", $datos["pis_nombre"], PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
	    return $stmt->errorInfo();
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ELIMINAR PISO
	=============================================*/
	static public function mdlEliminarPiso($id){
		$stmt = Conexion::conectar()->prepare("UPDATE pisos SET pis_estado = 0 WHERE pis_id = $id");
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
}