<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class EncuestasRH implements Crud{

    public static function getLista($id){

        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT cc.id_cuestionario_colaborador, ca.id_cuestionario, c.nombre, cc.id_colaborador, ca.fecha_inicio, ca.fecha_fin, cc.estatus FROM cuestionario_colaborador AS cc
  INNER JOIN cuestionarios_activos ca ON cc.id_cuestionario_activo = ca.id_cuestionario_activo
  INNER JOIN cuestionario c ON ca.id_cuestionario = c.id_cuestionario WHERE cc.id_colaborador = $id
  
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
     SELECT ca.id_cuestionario_activo, c.nombre, ca.fecha_inicio, ca.fecha_fin, ca.fecha_activacion, ca.trimestre, ca.comentario, ca.estatus
FROM cuestionarios_activos ca
INNER JOIN cuestionario c ON c.id_cuestionario = ca.id_cuestionario where c.id_cuestionario <> 1 and  c.id_cuestionario <> 5 and  c.id_cuestionario <> 6  order by fecha_inicio
  
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllComunicacionOrganizacional(){
        $mysqli = Database::getInstance();
        $query=<<<sql
     SELECT ca.id_cuestionario_activo, c.nombre, ca.fecha_inicio, ca.fecha_fin, ca.fecha_activacion, ca.trimestre, ca.comentario, ca.estatus
FROM cuestionarios_activos ca
INNER JOIN cuestionario c ON c.id_cuestionario = ca.id_cuestionario where c.id_cuestionario = 2 order by fecha_inicio desc
  
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllComunicacion(){
        $mysqli = Database::getInstance();
        $query=<<<sql
     SELECT ca.id_cuestionario_activo, c.nombre, ca.fecha_inicio, ca.fecha_fin, ca.fecha_activacion, ca.trimestre, ca.comentario, ca.estatus
FROM cuestionarios_activos ca
INNER JOIN cuestionario c ON c.id_cuestionario = ca.id_cuestionario where c.id_cuestionario = 3 order by fecha_inicio desc
  
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllClimaLaboral(){
        $mysqli = Database::getInstance();
        $query=<<<sql
     SELECT ca.id_cuestionario_activo, c.nombre, ca.fecha_inicio, ca.fecha_fin, ca.fecha_activacion, ca.trimestre, ca.comentario, ca.estatus
FROM cuestionarios_activos ca
INNER JOIN cuestionario c ON c.id_cuestionario = ca.id_cuestionario where c.id_cuestionario = 4 order by fecha_inicio desc
  
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllIngreso(){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT ca.id_cuestionario_colaborador, ca.id_colaborador, CONCAT(ccc.nombre, " ", ccc.apellido_paterno, " ", ccc.apellido_materno) AS nombre, ccc.fecha_alta, 1 AS resuelto
FROM cuestionario_colaborador ca
INNER JOIN cuestionario c ON c.id_cuestionario = ca.id_cuestionario_activo
INNER JOIN cuestionario_ingreso_adg cia ON cia.id_cuestionario_colaborador = ca.id_cuestionario_colaborador
INNER JOIN catalogo_colaboradores ccc ON ccc.catalogo_colaboradores_id = ca.id_colaborador
WHERE c.id_cuestionario = 1
UNION
SELECT ca.id_cuestionario_colaborador, ca.id_colaborador, CONCAT(ccc.nombre, " ", ccc.apellido_paterno, " ", ccc.apellido_materno) AS nombre, ccc.fecha_alta, 0 AS resuelto
FROM cuestionario_colaborador ca, catalogo_colaboradores ccc
WHERE NOT EXISTS (SELECT NULL 
			FROM cuestionario_ingreso_adg cia, cuestionario c
			WHERE cia.id_cuestionario_colaborador = ca.id_cuestionario_colaborador
			AND c.id_cuestionario = ca.id_cuestionario_activo
			AND c.id_cuestionario = 1
			)		AND ca.id_colaborador = ccc.catalogo_colaboradores_id
			
			

  
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllSalida(){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT ca.id_cuestionario_colaborador, ca.id_colaborador, CONCAT(ccc.nombre, " ", ccc.apellido_paterno, " ", ccc.apellido_materno) AS nombre, ccc.fecha_baja, 1 AS resuelto, ccc.status
FROM cuestionario_colaborador ca
INNER JOIN cuestionario c ON c.id_cuestionario = ca.id_cuestionario_activo
INNER JOIN cuestionario_salida_adg cia ON cia.id_cuestionario_colaborador = ca.id_cuestionario_colaborador
INNER JOIN catalogo_colaboradores ccc ON ccc.catalogo_colaboradores_id = ca.id_colaborador
WHERE c.id_cuestionario = 5 AND ccc.status = 3
UNION
SELECT ca.id_cuestionario_colaborador, ca.id_colaborador, CONCAT(ccc.nombre, " ", ccc.apellido_paterno, " ", ccc.apellido_materno) AS nombre, ccc.fecha_baja, 0 AS resuelto,  ccc.status
FROM cuestionario_colaborador ca, catalogo_colaboradores ccc
WHERE NOT EXISTS (SELECT NULL 
			FROM cuestionario_salida_adg cia, cuestionario c
			WHERE cia.id_cuestionario_colaborador = ca.id_cuestionario_colaborador
			AND c.id_cuestionario = ca.id_cuestionario_activo
			AND c.id_cuestionario = 5 AND ccc.status = 3
			) AND ca.id_colaborador = ccc.catalogo_colaboradores_id 
  AND ccc.status = 3 AND ccc.fecha_baja != '0000-00-00'

sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllInduccion(){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT ca.id_cuestionario_colaborador, ca.id_colaborador, CONCAT(ccc.nombre, " ", ccc.apellido_paterno, " ", ccc.apellido_materno) AS nombre, ccc.fecha_alta, 1 AS resuelto, ccc.status
FROM cuestionario_colaborador ca
INNER JOIN cuestionario c ON c.id_cuestionario = ca.id_cuestionario_activo
INNER JOIN induccion_adg cia ON cia.id_cuestionario_colaborador = ca.id_cuestionario_colaborador
INNER JOIN catalogo_colaboradores ccc ON ccc.catalogo_colaboradores_id = ca.id_colaborador
WHERE c.id_cuestionario = 6
UNION
SELECT ca.id_cuestionario_colaborador, ca.id_colaborador, CONCAT(ccc.nombre, " ", ccc.apellido_paterno, " ", ccc.apellido_materno) AS nombre, ccc.fecha_alta, 0 AS resuelto,  ccc.status
FROM cuestionario_colaborador ca, catalogo_colaboradores ccc
WHERE NOT EXISTS (SELECT NULL 
			FROM induccion_adg cia, cuestionario c
			WHERE cia.id_cuestionario_colaborador = ca.id_cuestionario_colaborador
			AND c.id_cuestionario = ca.id_cuestionario_activo
			AND c.id_cuestionario = 6
			)		AND ca.id_colaborador = ccc.catalogo_colaboradores_id

sql;
        return $mysqli->queryAll($query);
    }

    public static function insert($ingreso){
        $mysqli = Database::getInstance();
        $query=<<<sql
      INSERT INTO cuestionario_ingreso_adg
      VALUES (NULL, :id_cuestionario_colaborador, :uno, :dos, :tres, :cuatro, :cinco, :seis, :siete, :ocho, :nueve, :diez, :once, :nombre, :numero);
sql;
        $parametros = array(
            ':id_cuestionario_colaborador' => 1,
            ':uno' => $ingreso->_uno,
            ':dos' => $ingreso->_dos,
            ':tres' => $ingreso->_tres,
            ':cuatro' => $ingreso->_cuatro,
            ':cinco' => $ingreso->_cinco,
            ':seis' => $ingreso->_seis,
            ':siete' => $ingreso->_siete,
            ':ocho' => $ingreso->_ocho,
            ':nueve' => $ingreso->_nueve,
            ':diez' => $ingreso->_diez,
            ':once' => $ingreso->_once,
            ':nombre' => $ingreso->_nombre,
            ':numero' => $ingreso->_numero,
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        //UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function insertEncuestas($encuestas){
	    $mysqli = Database::getInstance();
      $query=<<<sql
      INSERT INTO cuestionarios_activos
      VALUES (NULL, :id_cuestionario, :fecha_inicio, :fecha_fin, :fecha_activacion, :trimestre, :comentario, 1);
sql;
        $parametros = array(
          ':id_cuestionario' => $encuestas->_tipo_encuesta,
          ':fecha_inicio' => $encuestas->_fecha_inicio,
          ':fecha_fin' => $encuestas->_fecha_final,
          ':fecha_activacion' => $encuestas->_fecha_activacion,
          ':trimestre' => $encuestas->_trimestre,
          ':comentario' => $encuestas->_comentario
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function insertEncuestasComunicacionOrganizacional($encuestas){
        $mysqli = Database::getInstance();
        $query=<<<sql
      INSERT INTO cuestionario_colaborador
      VALUES (NULL, :id_cuestionario_activo, :id_colaborador, 0);
sql;
        $parametros = array(
            ':id_cuestionario_activo' => $encuestas->_id_encuesta,
            ':id_colaborador' => $encuestas->_nombre_colaborador
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
    SELECT * FROM cuestionarios_activos where id_cuestionario_activo = $id
sql;
        return $mysqli->queryOne($query);
    }

    public static function getTipoEncuesta(){
        $mysqli = Database::getInstance();
        $query=<<<sql
    SELECT * FROM cuestionario WHERE id_cuestionario <> 1 AND id_cuestionario <> 5 and id_cuestionario <> 6 
sql;
        return $mysqli->queryAll($query);
    }

    public static function getColaboradorNombre($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT cc.catalogo_colaboradores_id, CONCAT(cc.nombre, " ", cc.apellido_paterno, " ", cc.apellido_materno) AS nombre 
      FROM catalogo_colaboradores cc
      WHERE cc.catalogo_colaboradores_id NOT IN (
      
      SELECT co.id_cuestionario_colaborador FROM comunicacion_organizacional co
      INNER JOIN cuestionario_colaborador cco ON cco.id_cuestionario_colaborador = co.id_cuestionario_colaborador
      WHERE co.id_cuestionario_colaborador  = $id)
      AND STATUS = 1
      ORDER BY nombre ASC
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
}
