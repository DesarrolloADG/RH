<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class ProyectosMejora implements Crud{

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
  SELECT
  a.id_proyecto_mejora,
  a.nombrep,
  CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre,
  a.fecha,
  a.descripcion, 
  a.implementacion,
  a.resultados
  FROM proyectos_mejora AS a
  INNER JOIN catalogo_colaboradores c ON a.catalogo_colaboradores_id = c.catalogo_colaboradores_id
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
      INSERT INTO proyectos_mejora
      VALUES (NULL, :nombrep, :catalogo_colaboradores_id, :fecha, :descripcion,
              :implementacion,:resultados);
sql;
        $parametros = array(
          ':catalogo_colaboradores_id' => $reporte_personal->_catalogo_colaboradores_id,
          ':fecha' => $reporte_personal->_fecha,
          ':descripcion' => $reporte_personal->_detalle,
          ':implementacion' => $reporte_personal->_check,
          ':resultados' => $reporte_personal->_detalle1,
          ':nombrep' => $reporte_personal->_nombrep
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function update($reporte_personal){
        $mysqli = Database::getInstance();
        $query=<<<sql
      UPDATE proyectos_mejora
      SET nombrep = :nombrep, 
      catalogo_colaboradores_id = :catalogo_colaboradores_id, 
      fecha = :fecha, 
      descripcion = :descripcion,
      implementacion = :implementacion, 
      resultados = :resultados 
      WHERE id_proyecto_mejora = :proyectos_mejora_id;
sql;
        $parametros = array(
            ':catalogo_colaboradores_id' => $reporte_personal->_catalogo_colaboradores_id,
            ':fecha' => $reporte_personal->_fecha,
            ':descripcion' => $reporte_personal->_detalle,
            ':implementacion' => $reporte_personal->_check,
            ':resultados' => $reporte_personal->_detalle1,
            ':nombrep' => $reporte_personal->_nombrep,
            ':proyectos_mejora_id' => $reporte_personal->_id_proyecto_mejora
        );
        $id = $mysqli->update($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
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
        a.id_proyecto_mejora,
        a.nombrep,
        CONCAT(c.nombre, " ", c.apellido_paterno, " ",c.apellido_materno) AS nombre,
        a.fecha,
        a.descripcion,
        a.implementacion,
        a.resultados,
        c.catalogo_colaboradores_id
        FROM proyectos_mejora AS a
        INNER JOIN catalogo_colaboradores c ON a.catalogo_colaboradores_id = c.catalogo_colaboradores_id
        where  a.id_proyecto_mejora = $id
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
