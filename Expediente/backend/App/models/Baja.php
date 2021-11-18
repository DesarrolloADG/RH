<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Baja implements Crud{

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
        SELECT
  id_baja,
  CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre,
  a.fecha_inicio,
  a.fecha_termino,
  a.cuestionario_salida,
  a.check_List AS lista,
  c.pago,
  a.url
  FROM bajas_colaboradores AS a
  INNER JOIN catalogo_colaboradores c ON a.catalogo_colaboradores_id = c.catalogo_colaboradores_id
  WHERE c.pago = 'quincenal';
  
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllSemanal(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT
  id_baja,
  CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre,
  a.fecha_inicio,
  a.fecha_termino,
  a.cuestionario_salida,
  a.check_List AS lista,
  c.pago,
  a.url
  FROM bajas_colaboradores AS a
  INNER JOIN catalogo_colaboradores c ON a.catalogo_colaboradores_id = c.catalogo_colaboradores_id
  WHERE c.pago = 'semanal';
  
sql;
        return $mysqli->queryAll($query);
    }

    public static function insert($baja){
	    $mysqli = Database::getInstance();
      $query=<<<sql
      INSERT INTO bajas_colaboradores
      VALUES (NULL, :catalogo_colaboradores_id, :fecha_inicio, :fecha_termino, :cuestionario_salida, :check_list, :url);
sql;
        $parametros = array(
          ':catalogo_colaboradores_id' => $baja->_catalogo_colaboradores_id,
          ':fecha_inicio' => $baja->_fecha_inicio,
          ':fecha_termino' => $baja->_fecha_termino,
          ':cuestionario_salida' => 0,
          ':check_list' => 0,
          ':url' => NULL
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }


    public static function getOperacionNoi($filtro){

        $mysqli = Database::getInstance();

        $query=<<<sql
SELECT t1.*,cc.catalogo_colaboradores_id FROM operacion_noi t1 
LEFT JOIN bajas_colaboradores_view t2 ON (t2.clave_noi = t1.clave AND t1.identificador = t2.identificador_noi) 
INNER JOIN catalogo_colaboradores cc ON cc.clave_noi = t1.clave
WHERE t1.status = 'B' AND t1.fecha_baja IS NOT NULL AND cc.identificador_noi = t1.identificador
ORDER BY `t1`.`fecha_baja` DESC

sql;
        return $mysqli->queryAll($query);
    }

    public static function getIdentificador(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT
        distinct identificador
      FROM operacion_noi
sql;
        return $mysqli->queryAll($query);
    }

    public static function update($colaborador){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE catalogo_colaboradores SET
	    fecha_baja = :fecha_baja,
	    motivo = :motivo,
        status = :status
      WHERE catalogo_colaboradores_id = :catalogo_colaboradores_id
sql;
        $parametros = array(
            ':fecha_baja' => $colaborador->_fecha_baja,
            ':motivo' => $colaborador->_motivo,
            ':status' => 3,
            ':catalogo_colaboradores_id' => $colaborador->_catalogo_colaboradores_id
        );

      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      $accion->_id = $colaborador->_catalogo_colaboradores_id;
      UtileriasLog::addAccion($accion);
      return $mysqli->update($query, $parametros);
    }

    public static function delete($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
      UPDATE catalogo_colaboradores set status = 2 WHERE catalogo_colaboradores_id = $id
sql;
      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      $accion->_id = $id;
      UtileriasLog::addAccion($accion);
      return $mysqli->update($query);
    }

    public static function getById($id)
    {
        $mysqli = Database::getInstance();
        $query=<<<sql
 SELECT t1.*,cc.catalogo_colaboradores_id FROM operacion_noi t1 
LEFT JOIN bajas_colaboradores_view t2 ON (t2.clave_noi = t1.clave AND t1.identificador = t2.identificador_noi) 
INNER JOIN catalogo_colaboradores cc ON cc.clave_noi = t1.clave
WHERE t1.status = 'B' AND t1.fecha_baja IS NOT NULL AND cc.catalogo_colaboradores_id = $id
ORDER BY `t1`.`fecha_baja` DESC

sql;
        return $mysqli->queryOne($query);
    }

    public static function getColaboradorNombre(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT catalogo_colaboradores_id, CONCAT(nombre, " ", apellido_paterno, " ", apellido_materno) AS nombre FROM catalogo_colaboradores WHERE STATUS = 1 and pago = 'Quincenal'ORDER BY nombre ASC
sql;
        return $mysqli->queryAll($query);
    }

    public static function getColaboradorNombreSemanal($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT catalogo_colaboradores_id, CONCAT(nombre, " ", apellido_paterno, " ", apellido_materno) AS nombre FROM catalogo_colaboradores WHERE pago = 'semanal' AND catalogo_colaboradores_id = $id ORDER BY nombre ASC
sql;
        return $mysqli->queryAll($query);
    }

    public static function getLugarAccidente(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT * FROM catalogo_lugares_accidentes ORDER BY detalle ASC
sql;
        return $mysqli->queryAll($query);
    }

    public static function getClasificacionrAccidente(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT * FROM catalogo_clasificacion_accidente ORDER BY detalle ASC
sql;
        return $mysqli->queryAll($query);
    }

    public static function getIdMotivoBaja(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT * FROM catalogo_motivo_baja WHERE status != 2
sql;
        return $mysqli->queryAll($query);
    }

    public static function update_documento($documento){
        $mysqli = Database::getInstance();
        $query=<<<sql
        UPDATE bajas_colaboradores SET
        check_list = :lista,
        url = :url
      WHERE id_baja = :id_baja
sql;
        $parametros = array(
            'lista' => 1,
            ':url' => $documento->_url,
            ':id_baja' => $documento->_id_c
        );
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $documento->_id_baja;
        UtileriasLog::addAccion($accion);
        return $mysqli->update($query, $parametros);

        UtileriasLog::addAccion($accion);
        return $id;
    }
}
