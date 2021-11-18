<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Economico{

    public static function getAll(){

	$mysqli = Database::getInstance();
        $query=<<<sql
                SELECT
  id_dia_economico,
  CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre,
  a.fecha_solicitud,
  a.fecha_dia_economico,
  cde.nombre AS estatus,
  a.mes_dia_economico
  FROM dias_economicos AS a
  INNER JOIN catalogo_colaboradores c ON a.catalogo_colaboradores_id = c.catalogo_colaboradores_id
  INNER JOIN catalogo_estatus_dia_economico cde ON a.estatus = cde.catalogo_estatus_id
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllDias(){

        $mysqli = Database::getInstance();
        $query=<<<sql

SELECT * FROM dias_economicos_view ORDER BY nombre ASC


sql;
        return $mysqli->queryAll($query);
    }

    public static function update($economico){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE dias_economicos SET fecha_solicitud = :fecha_solicitud WHERE id_dia_economico = :id_dia_economico
sql;
      $parametros = array(
        ':id_dia_economico'=>$economico->_id_dia_economico,
        ':fecha_solicitud'=>$economico->_fecha_solicitud,
      );
      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      $accion->_id = $economico->_id_dia_economico;
      UtileriasLog::addAccion($accion);
      return $mysqli->update($query, $parametros);
    }

    public static function getById($id)
    {
        $mysqli = Database::getInstance();
        $query=<<<sql
 SELECT id_dia_economico,
  c.catalogo_colaboradores_id,
  CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre,
  a.fecha_solicitud,
  a.fecha_dia_economico,
  cde.nombre AS estatus
  FROM dias_economicos AS a
  INNER JOIN catalogo_colaboradores c ON a.catalogo_colaboradores_id = c.catalogo_colaboradores_id
  INNER JOIN catalogo_estatus_dia_economico cde ON a.estatus = cde.catalogo_estatus_id
WHERE id_dia_economico = $id
sql;
        return $mysqli->queryOne($query);
    }

    public static function getColaboradorNombre(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT catalogo_colaboradores_id, CONCAT(nombre, " ", apellido_paterno, " ", apellido_materno) AS nombre FROM catalogo_colaboradores WHERE STATUS = 1  ORDER BY nombre ASC
sql;
        return $mysqli->queryAll($query);
    }

}
