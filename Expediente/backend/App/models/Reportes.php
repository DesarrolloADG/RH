<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Reportes implements Crud{

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
  SELECT
  a.id_reporte,
  CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre,
  a.fecha_alta,
  a.turno,
  a.check_l,
  a.url
  FROM reportes AS a
  INNER JOIN catalogo_colaboradores c ON a.catalogo_colaboradores_id_reportado = c.catalogo_colaboradores_id
sql;
        return $mysqli->queryAll($query);
    }

    public static function insert1($incapacidad, $id, $subsecuente){
        $mysqli = Database::getInstance();
        $query=<<<sql
      INSERT INTO incapacidades
      VALUES (NULL, :id_catalogo_colaboradores, :id_accidente, :fecha_inicio, :fecha_fin, :id_catalogo_clasificacion_incapacidades, :subsecuente);
sql;
        $parametros = array(
            ':id_catalogo_colaboradores' => $incapacidad->_catalogo_colaboradores_id,
            ':id_accidente' => $id,
            ':fecha_inicio' => '0000-00-00',
            ':fecha_fin' => '0000-00-00',
            ':id_catalogo_clasificacion_incapacidades' => 3,
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

    public static function insert($reporte_personal){
	    $mysqli = Database::getInstance();
      $query=<<<sql
      INSERT INTO reportes
      VALUES (NULL, :catalogo_colaboradores_id, 2, :fecha_alta, :catalogo_colaboradores_id_reporta, 
              :turno, :catalogo_colaboradores_id_jefe_inmediato, 
              :catalogo_colaboradores_id_supervisor_turno,
	          null, :detalle, :reincidencia, null, null, null, null, null );
sql;
        $parametros = array(
          ':catalogo_colaboradores_id' => $reporte_personal->_catalogo_colaboradores_id,
          ':fecha_alta' => $reporte_personal->_fecha,
          ':catalogo_colaboradores_id_reporta' => $reporte_personal->_reporta,
          ':turno' => $reporte_personal->_turno,
          ':catalogo_colaboradores_id_jefe_inmediato' => $reporte_personal->_jefe,
          ':catalogo_colaboradores_id_supervisor_turno' => $reporte_personal->_supervisor,
          ':detalle' => $reporte_personal->_detalle,
          ':reincidencia' => $reporte_personal->_check
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function update($accidente){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE accidentes SET
        fecha_accidente = :fecha_accidente,
        trimestre = :trimestre,
        id_lugar_accidente = :id_lugar_accidente,
        detalle_accidente = :detalle_accidente,
        causa = :causa,
        id_clasificacion_accidente = :id_clasificacion_accidente,
	    acto_inseguro = :acto_inseguro,
	    condicion_insegura = :condicion_insegura
      WHERE id_accidente = :id_accidente
sql;
        $parametros = array(
            ':fecha_accidente' => $accidente->_fecha_accidente,
            ':trimestre' => $accidente->_trimestre,
            ':id_lugar_accidente' => $accidente->_id_lugar_accidente,
            ':detalle_accidente' => $accidente->_detalle_accidente,
            ':causa' => $accidente->_causa,
            ':id_clasificacion_accidente' => $accidente->_id_clasificacion_accidente,
            ':acto_inseguro' => $accidente->_acto_inseguro,
            ':condicion_insegura' => $accidente->_condicion_insegura,
            ':id_accidente' => $accidente->_id_accidente
        );

      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      $accion->_id = $accidente->_id_accidente;
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
        SELECT
        a.id_reporte,
        CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre,
        a.fecha_alta,
        a.turno
        FROM reportes AS a
        INNER JOIN catalogo_colaboradores c ON a.catalogo_colaboradores_id_reportado = c.catalogo_colaboradores_id
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

    public static function verificarRelacion($id){
        $mysqli = Database::getInstance();
        $select = <<<sql
      SELECT cd.catalogo_departamento_id FROM catalogo_departamento cd JOIN catalogo_colaboradores c ON cd.catalogo_departamento_id = c.catalogo_departamento_id WHERE cd.catalogo_departamento_id = $id
sql;
        $sqlSelect = $mysqli->queryAll($select);
        if(count($sqlSelect) >= 1)
            return array('seccion'=>2, 'id'=>$id); // NO elimina
        else
            return array('seccion'=>1, 'id'=>$id); // Cambia el status a eliminado

    }
    public static function update_documento($documento){
        $mysqli = Database::getInstance();
        $query=<<<sql
        UPDATE reportes SET
        check_l = :lista,
        url = :url
      WHERE id_reporte = :id_reporte
sql;
        $parametros = array(
            'lista' => 1,
            ':url' => $documento->_url,
            ':id_reporte' => $documento->_id_c
        );
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $documento->_id_reporte;
        UtileriasLog::addAccion($accion);
        return $mysqli->update($query, $parametros);

        UtileriasLog::addAccion($accion);
        return $id;
    }
}
