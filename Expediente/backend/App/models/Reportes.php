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
  where id_tipo_reporte = 2
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllBPM(){
        $mysqli = Database::getInstance();
        $query=<<<sql
    SELECT
  a.id_reporte,
  CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre,
  a.id_tipo_reporte,
  ci.detalle,
  a.fecha_alta,
  a.hora,
  a.descripcion,
  a.comentario_empleado,
  a.url
  FROM reportes AS a
  INNER JOIN catalogo_colaboradores c ON a.catalogo_colaboradores_id_reportado = c.catalogo_colaboradores_id
  INNER JOIN catalogo_incumplimiento ci ON a.id_incumplimiento = ci.id_catalogo_incumplimiento
  where id_tipo_reporte = 3
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllActa(){
        $mysqli = Database::getInstance();
        $query=<<<sql
  SELECT
  a.id_reporte,
  CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre,
  a.id_tipo_reporte,
  ci.descripcion,
  a.fecha_alta,
  a.descripcion as descc,
  a.url
  FROM reportes AS a
  INNER JOIN catalogo_colaboradores c ON a.catalogo_colaboradores_id_reportado = c.catalogo_colaboradores_id
  INNER JOIN catalogo_motivo ci ON a.id_motivo = ci.id_catatalogo_motivo
  WHERE id_tipo_reporte = 1
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
      VALUES (NULL, :catalogo_colaboradores_id, 2, :fecha_alta, null, :catalogo_colaboradores_id_reporta, 
              :turno, :catalogo_colaboradores_id_jefe_inmediato, 
              :catalogo_colaboradores_id_supervisor_turno,
	          null, null, :detalle, :reincidencia, null, null, null, null, null, null, null, null,null, :grave);
sql;
        $parametros = array(
          ':catalogo_colaboradores_id' => $reporte_personal->_catalogo_colaboradores_id,
          ':fecha_alta' => $reporte_personal->_fecha,
          ':catalogo_colaboradores_id_reporta' => $reporte_personal->_reporta,
          ':turno' => $reporte_personal->_turno,
          ':catalogo_colaboradores_id_jefe_inmediato' => $reporte_personal->_jefe,
          ':catalogo_colaboradores_id_supervisor_turno' => $reporte_personal->_supervisor,
          ':detalle' => $reporte_personal->_detalle,
          ':reincidencia' => $reporte_personal->_check,
          ':grave' => $reporte_personal->_check_grave
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function insertReporteBPM($reporte_personal){
        $mysqli = Database::getInstance();
        $query=<<<sql
      INSERT INTO reportes
      VALUES (NULL, :catalogo_colaboradores_id_reportado, 3, :fecha_alta, :hora, :catalogo_colaboradores_id_reporta, 
              null, null, null, null, :id_incumplimiento, :descripcion,
	          null, null, :comentario_empleado, null, null, null, null, 1, null, :url, null);
sql;
        $parametros = array(
            ':catalogo_colaboradores_id_reportado' => $reporte_personal->_nombre_colaborador_reportado,
            ':fecha_alta' => $reporte_personal->_fecha,
            ':hora' => $reporte_personal->_hora,
            ':catalogo_colaboradores_id_reporta' => $reporte_personal->_nombre_colaborador_reporte,
            ':id_incumplimiento' => $reporte_personal->_motivo,
            ':descripcion' => $reporte_personal->_observaciones,
            ':comentario_empleado' => $reporte_personal->_otro,
            ':url' => $reporte_personal->_url
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function insertReporteActa($reporte_personal){
        $mysqli = Database::getInstance();
        $query=<<<sql
      INSERT INTO reportes
      VALUES (NULL, :catalogo_colaboradores_id_reportado, 1, :fecha_alta, null, 
              null, 
              null, null, null, :id_motivo, null, :descripcion,
	          null, null, null, null, null, null, null, 1, null, :url, null);
sql;
        $parametros = array(
            ':catalogo_colaboradores_id_reportado' => $reporte_personal->_nombre_colaborador_reportado,
            ':fecha_alta' => $reporte_personal->_fecha,
            ':id_motivo' => $reporte_personal->_motivo,
            ':descripcion' => $reporte_personal->_observaciones,
            ':url' => $reporte_personal->_url
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

    public static function getColaboradorNombreJefes(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT cc.catalogo_colaboradores_id, CONCAT(cc.nombre, " ", cc.apellido_paterno, " ", cc.apellido_materno) AS nombre 
      FROM catalogo_colaboradores cc
      INNER JOIN catalogo_puesto cp ON cc.catalogo_puesto_id = cp.catalogo_puesto_id
      WHERE cc.STATUS = 1 
      AND cp.catalogo_puesto_id = 1 
      OR cp.catalogo_puesto_id = 4
      OR cp.catalogo_puesto_id = 6
      OR cp.catalogo_puesto_id = 7
      OR cp.catalogo_puesto_id = 33
      OR cp.catalogo_puesto_id = 35
      OR cp.catalogo_puesto_id = 36
      OR cp.catalogo_puesto_id = 37
      OR cp.catalogo_puesto_id = 38
      OR cp.catalogo_puesto_id = 41
      OR cp.catalogo_puesto_id = 42
      OR cp.catalogo_puesto_id = 43
      OR cp.catalogo_puesto_id = 44
      OR cp.catalogo_puesto_id = 45
      OR cp.catalogo_puesto_id = 46
      OR cp.catalogo_puesto_id = 47
      OR cp.catalogo_puesto_id = 48
      OR cp.catalogo_puesto_id = 49
      OR cp.catalogo_puesto_id = 50
      OR cp.catalogo_puesto_id = 51
      OR cp.catalogo_puesto_id = 52
      OR cp.catalogo_puesto_id = 53
      OR cp.catalogo_puesto_id = 54
      OR cp.catalogo_puesto_id = 56
      OR cp.catalogo_puesto_id = 63
      OR cp.catalogo_puesto_id = 66
      OR cp.catalogo_puesto_id = 68
      OR cp.catalogo_puesto_id = 69
      OR cp.catalogo_puesto_id = 70
      OR cp.catalogo_puesto_id = 71
      OR cp.catalogo_puesto_id = 72
      OR cp.catalogo_puesto_id = 75
      OR cp.catalogo_puesto_id = 76
      OR cp.catalogo_puesto_id = 77
      OR cp.catalogo_puesto_id = 79
      OR cp.catalogo_puesto_id = 80
      OR cp.catalogo_puesto_id = 81
      OR cp.catalogo_puesto_id = 82
      OR cp.catalogo_puesto_id = 84
      OR cp.catalogo_puesto_id = 88
      ORDER BY nombre ASC
sql;
        return $mysqli->queryAll($query);
    }

    public static function getMotivo(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT * FROM catalogo_incumplimiento
sql;
        return $mysqli->queryAll($query);
    }

    public static function getMotivoActa(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT * FROM catalogo_motivo
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
