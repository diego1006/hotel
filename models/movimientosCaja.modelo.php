<?php
require_once "conexion.php";
class ModeloMovimientos{
	/*=============================================
	MOSTRAR MOVIMIENTOS
	=============================================*/
	static public function mdlMostrarMovimientos($tipo){
		$stmt = Conexion::conectar()->prepare("SELECT mov_idCaja, mov_fechaCaja, mov_valorCaja, mov_descripcionCaja, usu_nombre FROM movimientos_caja, usuarios where mov_idUsuarioCaja = usu_id AND mov_tipoCaja = $tipo AND mov_estadoCaja = 1");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	/*=============================================
	CREAR MOVIMIENTO
	=============================================*/
	static public function mdlCrearMovimiento($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(mov_tipoCaja, mov_fechaCaja, mov_valorCaja, mov_descripcionCaja, mov_idUsuarioCaja, mov_estadoCaja) VALUES (:mov_tipoCaja, :mov_fechaCaja, :mov_valorCaja, :mov_descripcionCaja, :mov_idUsuarioCaja, 1)");
		$stmt->bindParam(":mov_tipoCaja", $datos["mov_tipoCaja"], PDO::PARAM_STR);
		$stmt->bindParam(":mov_fechaCaja", $datos["mov_fechaCaja"], PDO::PARAM_STR);
		$stmt->bindParam(":mov_valorCaja", $datos["mov_valorCaja"], PDO::PARAM_STR);
		$stmt->bindParam(":mov_descripcionCaja", $datos["mov_descripcionCaja"], PDO::PARAM_STR);
		$stmt->bindParam(":mov_idUsuarioCaja", $datos["mov_idUsuarioCaja"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
	    return $stmt->errorInfo();
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ELIMINAR MOVIMIENTO
	=============================================*/
	static public function mdlEliminarMovimiento($id){
		$stmt = Conexion::conectar()->prepare("UPDATE movimientos_caja SET mov_estadoCaja = 0 WHERE mov_idCaja = $id");
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