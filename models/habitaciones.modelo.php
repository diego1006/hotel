<?php
require_once "conexion.php";

class ModeloHabitaciones{
	/*=============================================
	MOSTRAR HABITACIONES
	=============================================*/
	static public function mdlMostrarHabitaciones(){
		$stmt = Conexion::conectar()->prepare("SELECT hab_id, hab_nombre, hab_tipo, hab_precio, pis_nombre FROM habitaciones, pisos where hab_idPiso = pis_id AND hab_estado = 1");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	/*=============================================
	MOSTRAR PISOS
	=============================================*/
	static public function mdlMostrarPisos(){
		$stmt = Conexion::conectar()->prepare("SELECT * FROM pisos where pis_estado = 1");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	/*=============================================
	CREAR HABITACION
	=============================================*/
	static public function mdlCrearHabitacion($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(hab_nombre, hab_idPiso, hab_tipo, hab_aire, hab_ventilador, hab_camaDoble, hab_camaSencilla, hab_tv, hab_nevera, hab_precio, hab_capacidad, hab_estado) VALUES (:hab_nombre, :hab_idPiso, :hab_tipo, :hab_aire, :hab_ventilador, :hab_camaDoble, :hab_camaSencilla, :hab_tv, :hab_nevera, :hab_precio, :hab_capacidad, 1)");

		$stmt->bindParam(":hab_nombre", $datos["hab_nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":hab_idPiso", $datos["hab_idPiso"], PDO::PARAM_STR);
		$stmt->bindParam(":hab_tipo", $datos["hab_tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":hab_aire", $datos["hab_aire"], PDO::PARAM_STR);
		$stmt->bindParam(":hab_ventilador", $datos["hab_ventilador"], PDO::PARAM_STR);
		$stmt->bindParam(":hab_camaDoble", $datos["hab_camaDoble"], PDO::PARAM_STR);
		$stmt->bindParam(":hab_camaSencilla", $datos["hab_camaSencilla"], PDO::PARAM_STR);
		$stmt->bindParam(":hab_tv", $datos["hab_tv"], PDO::PARAM_STR);
		$stmt->bindParam(":hab_nevera", $datos["hab_nevera"], PDO::PARAM_STR);
		$stmt->bindParam(":hab_precio", $datos["hab_precio"], PDO::PARAM_STR);
		$stmt->bindParam(":hab_capacidad", $datos["hab_capacidad"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
	    return $stmt->errorInfo();
		}
		$stmt->close();
		$stmt = null;
	}
	/*=============================================
	ELIMINAR HABITACION
	=============================================*/
	static public function mdlEliminarHabitacion($id){
		$stmt = Conexion::conectar()->prepare("UPDATE habitaciones SET hab_estado = 0 WHERE hab_id = $id");
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt = null;
	}
}