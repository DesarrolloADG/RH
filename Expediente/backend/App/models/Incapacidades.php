<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Incapacidades implements Crud{

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
        SELECT
  id_incapacidad,
  CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre,
  a.fecha_inicio,
  a.fecha_fin,
  ci.detalle AS clasificacion_incapacidad
  FROM incapacidades AS a
  INNER JOIN catalogo_colaboradores c ON a.id_catalogo_colaboradores = c.catalogo_colaboradores_id
  INNER JOIN catalogo_clasificacion_incapacidades ci ON a.id_catalogo_clasificacion_incapacidades = ci.id_catalogo_clasificacion_incapacidades
  
sql;
        return $mysqli->queryAll($query);
    }

    public static function getDocumentos($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT
          * FROM file_incapacidades WHERE id_incapacidad = $id;
sql;
        return $mysqli->queryAll($query);
    }


    public static function insert($incapacidad){
	    $mysqli = Database::getInstance();
      $query=<<<sql
      INSERT INTO incapacidades
      VALUES (NULL, :id_catalogo_colaboradores, :id_accidente, :fecha_inicio, :fecha_fin, :id_catalogo_clasificacion_incapacidades, :subsecuente);
sql;
        $parametros = array(
          ':id_catalogo_colaboradores' => $incapacidad->_catalogo_colaboradores_id,
          ':id_accidente' => 0,
          ':fecha_inicio' => $incapacidad->_fecha_inicio,
          ':fecha_fin' => $incapacidad->_fecha_fin,
          ':id_catalogo_clasificacion_incapacidades' => $incapacidad->_clasificacion,
          ':subsecuente' => 0
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function update($incapacidad){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE incapacidades SET
        fecha_inicio = :fecha_inicio,
        fecha_fin = :fecha_fin,
        id_catalogo_clasificacion_incapacidades = :id_catalogo_clasificacion_incapacidades
      WHERE id_incapacidad = :id_incapacidad
sql;
      $parametros = array(
        ':id_incapacidad' => $incapacidad->_id_incapacidad,
        ':fecha_inicio' => $incapacidad->_fecha_inicio,
        ':fecha_fin' => $incapacidad->_fecha_fin,
        ':id_catalogo_clasificacion_incapacidades' => $incapacidad->_clasificacion
      );

      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      $accion->_id = $incapacidad->_id_incapacidad;
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
   SELECT a.id_incapacidad,
  a.id_catalogo_colaboradores,
  CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre,
  a.fecha_inicio,
  a.fecha_fin,
  cl.id_catalogo_clasificacion_incapacidades,
  cl.detalle AS clasificacion_incapacidades
  FROM incapacidades AS a
  INNER JOIN catalogo_clasificacion_incapacidades cl ON a.id_catalogo_clasificacion_incapacidades = cl.id_catalogo_clasificacion_incapacidades
  INNER JOIN catalogo_colaboradores c ON a.id_catalogo_colaboradores = c.catalogo_colaboradores_id
WHERE a.id_incapacidad = $id
sql;
        return $mysqli->queryOne($query);
    }

    public static function getColaboradorNombre(){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre FROM catalogo_colaboradores AS c WHERE c.status = 1
sql;
        return $mysqli->queryAll($query);
    }

    public static function getArchivo(){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT * FROM catalogo_clasificacion_incapacidades
sql;
        return $mysqli->queryAll($query);
    }


    public static function getColaboradorNombre1($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre 
FROM incapacidades AS a INNER JOIN catalogo_colaboradores c ON a.id_catalogo_colaboradores = c.catalogo_colaboradores_id 
WHERE a.id_incapacidad = $id
sql;
        return $mysqli->queryAll($query);
    }

    public static function getDescripcionIncapacidad($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT c.detalle FROM incapacidades AS a INNER JOIN catalogo_clasificacion_incapacidades c ON a.id_catalogo_clasificacion_incapacidades = c.id_catalogo_clasificacion_incapacidades WHERE a.id_incapacidad = $id
sql;
        return $mysqli->queryAll($query);
    }

    public static function getClasificacionIncapacidades(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT * FROM catalogo_clasificacion_incapacidades where detalle != 'RIESGO DE TRABAJO' ORDER BY detalle ASC
sql;
        return $mysqli->queryAll($query);
    }

    public static function getTipoArchivo(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT * FROM tipo_archivo_incapacidades
sql;
        return $mysqli->queryAll($query);
    }

    public static function insert_documento_incapacidades($documento){
        $mysqli = Database::getInstance();
        $query=<<<sql
      INSERT INTO file_incapacidades
      VALUES (NULL, :title, :filename, :description, :id_archivo ,:id_incapacidad , :fecha);
sql;
        $parametros = array(
            ':title' => $documento->_titulo,
            ':filename' => $documento->_url,
            ':description' => $documento->_descripcion,
            ':id_archivo' => $documento->_id_archivo,
            ':id_incapacidad' => $documento->_id_c,
            ':fecha' => $documento->_fecha
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

}
