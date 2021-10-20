<?php
require_once "conexion.php";
class ModeloCajas{
	/*=============================================
	MOSTRAR CLIENTES
	=============================================*/
	static public function mdlMostrarCajas(){
		$stmt = Conexion::conectar()->prepare("SELECT usu_nombre, caj_fechaApertura, caj_fechaCierre, caj_ingresos, caj_egresos, caj_ventas, caj_efectivoCierre, caj_efectivoApertura, caj_descuadre, caj_observacion FROM caja, usuarios where caj_idUsuario = usu_id");
		$stmt->execute();
		return $stmt->fetchAll();
	}
	/*=============================================
	CREAR PISO
	=============================================*/
	static public function mdlAbrirCaja($tabla, $datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(caj_idUsuario, caj_fechaApertura, caj_efectivoApertura, caj_observacion, caj_estado) VALUES (:caj_idUsuario, :caj_fechaApertura, :caj_efectivoApertura, :caj_observacion, 1)");
		$stmt->bindParam(":caj_idUsuario", $datos["caj_idUsuario"], PDO::PARAM_STR);
		$stmt->bindParam(":caj_fechaApertura", $datos["caj_fechaApertura"], PDO::PARAM_STR);
		$stmt->bindParam(":caj_efectivoApertura", $datos["caj_efectivoApertura"], PDO::PARAM_STR);
		$stmt->bindParam(":caj_observacion", $datos["caj_observacion"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
	    return $stmt->errorInfo();
		}
		$stmt->close();
		$stmt = null;
	}
}