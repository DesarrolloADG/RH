<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class RegistroCapacitaciones implements Crud{

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
        SELECT 
               capacitaciones.id_capacitacion, capacitaciones.nombre_curso, capacitaciones.duracion, capacitaciones.horas_cubrir, capacitaciones.fecha, 
	            catalogo_planta.nombre AS planta,
	            puestos.descripcion AS grupo,
               capacitaciones.calificacion,
               capacitaciones.calificacion_expositor
        FROM capacitaciones, catalogo_planta, puestos
        WHERE capacitaciones.lugar = catalogo_planta.catalogo_planta_id
        AND capacitaciones.persona = puestos.id_puesto
  
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllID($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT 
               capacitaciones.id_capacitacion, capacitaciones.nombre_curso, capacitaciones.duracion, capacitaciones.horas_cubrir, capacitaciones.nombre_expositor, capacitaciones.fecha, 
	            catalogo_planta.nombre AS planta,
	            puestos.descripcion AS grupo,
               capacitaciones.calificacion
        FROM capacitaciones, catalogo_planta, puestos
        WHERE capacitaciones.lugar = catalogo_planta.catalogo_planta_id
        AND capacitaciones.persona = puestos.id_puesto and capacitaciones.id_capacitacion = $id 
  
sql;
        return $mysqli->queryOne($query);
    }

    public static function update_calificacion($calificacion, $idd){
        $mysqli = Database::getInstance();
        $query=<<<sql
      UPDATE capacitaciones SET
        calificacion_expositor = $calificacion
      WHERE id_capacitacion = $idd
sql;
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        UtileriasLog::addAccion($accion);
        return $mysqli->update($query);
    }

    public static function getAllIDNombre($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT 
               capacitaciones.id_capacitacion, capacitaciones.nombre_curso, capacitaciones.duracion, capacitaciones.horas_cubrir, capacitaciones.nombre_expositor, capacitaciones.fecha, 
	            catalogo_planta.nombre AS planta,
	            puestos.descripcion AS grupo,
               	CONCAT(catalogo_colaboradores.nombre," ", catalogo_colaboradores.apellido_paterno, " ", catalogo_colaboradores.apellido_materno) AS nombre
        FROM capacitaciones, catalogo_planta, puestos, catalogo_colaboradores
        WHERE capacitaciones.lugar = catalogo_planta.catalogo_planta_id
       AND catalogo_colaboradores.catalogo_colaboradores_id = capacitaciones.nombre_expositor
        AND capacitaciones.persona = puestos.id_puesto and capacitaciones.id_capacitacion = $id 
  
sql;
        return $mysqli->queryOne($query);
    }

    public static function getAllIDCombos($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT 
               capacitaciones.id_capacitacion, capacitaciones.nombre_curso, capacitaciones.duracion, capacitaciones.horas_cubrir, capacitaciones.nombre_expositor, capacitaciones.fecha, 
	            catalogo_planta.nombre AS planta,
	            puestos.descripcion AS grupo
        FROM capacitaciones, catalogo_planta, puestos
        WHERE capacitaciones.lugar = catalogo_planta.catalogo_planta_id
        AND capacitaciones.persona = puestos.id_puesto and capacitaciones.id_capacitacion = $id 
  
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllPersonal($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
       SELECT id_capacitaciones_asistentes, ca.id_capacitacion, CONCAT(cc.nombre, " ",cc.apellido_paterno, " ", cc.apellido_materno)
AS nombre, ca.fecha_alta, cc.identificador_noi AS planta, cp.nombre AS puesto
FROM capacitaciones_asistentes ca
INNER JOIN catalogo_colaboradores cc ON ca.id_colaborador = cc.catalogo_colaboradores_id
INNER JOIN catalogo_puesto cp ON cp.catalogo_puesto_id = cc.catalogo_puesto_id
WHERE ca.id_capacitacion = $id
    
sql;
        return $mysqli->queryAll($query);
    }


    public static function getAllPersonalAsistencias($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
       SELECT id_capacitaciones_asistentes, ca.id_capacitacion, CONCAT(cc.nombre, " ",cc.apellido_paterno, " ", cc.apellido_materno)
AS nombre, ca.fecha_alta, cc.identificador_noi AS planta, cp.nombre AS puesto, ca.calificacion
FROM capacitaciones_asistentes ca
INNER JOIN catalogo_colaboradores cc ON ca.id_colaborador = cc.catalogo_colaboradores_id
INNER JOIN catalogo_puesto cp ON cp.catalogo_puesto_id = cc.catalogo_puesto_id
WHERE ca.id_capacitacion = $id and ca.asistencia = 1
    
sql;
        return $mysqli->queryAll($query);
    }

    public static function getContador($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT COUNT(*) AS contador FROM capacitaciones_asistentes WHERE id_capacitacion = $id
    
sql;
        return $mysqli->queryOne($query);
    }

    public static function getContadorAsistentes($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT COUNT(*) AS contador FROM capacitaciones_asistentes WHERE id_capacitacion = $id and asistencia = 1
    
sql;
        return $mysqli->queryOne($query);
    }

    public static function insert1($incapacidad, $id){
        $mysqli = Database::getInstance();
        $query=<<<sql
      INSERT INTO incapacidades
      VALUES (NULL, :id_catalogo_colaboradores, :id_accidente, :fecha_inicio, :fecha_fin, :id_catalogo_clasificacion_incapacidades);
sql;
        $parametros = array(
            ':id_catalogo_colaboradores' => $incapacidad->_catalogo_colaboradores_id,
            ':id_accidente' => $id,
            ':fecha_inicio' => '0000-00-00',
            ':fecha_fin' => '0000-00-00',
            ':id_catalogo_clasificacion_incapacidades' => 3
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function insert($registro){
	    $mysqli = Database::getInstance();
      $query=<<<sql
      INSERT INTO capacitaciones
      VALUES (NULL, :nombre_curso,:duracion, :horas_cubrir, :nombre_expositor, :fecha, :lugar, :puesto, :calificacion, null);
sql;
        $parametros = array(
          ':nombre_curso' => $registro->_nombre_curso,
          ':nombre_expositor' => $registro->_nombre_expo,
          ':fecha' => $registro->_fecha,
          ':lugar' => $registro->_lugar,
          ':puesto' => $registro->_puesto,
          ':duracion' => $registro->_duracion,
          ':horas_cubrir' => $registro->_horas,
          ':calificacion' => $registro->_calificacion
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function insertparticipantes($participante){
        $mysqli = Database::getInstance();
        $query=<<<sql
      INSERT INTO capacitaciones_asistentes
      VALUES (NULL, :id_capacitacion,:id_colaborador, :fecha_alta, 0, null);
sql;
        $parametros = array(
            ':id_capacitacion' => $participante->_id_capacitacion,
            ':id_colaborador' => $participante->_id_colaborador,
            ':fecha_alta' => $participante->_fecha
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        //UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function AsistenciaParticipantesUpdate($participante, $calificacion){
        $mysqli = Database::getInstance();
        $query=<<<sql
        UPDATE capacitaciones_asistentes
        SET asistencia = 1,
        calificacion = :calificacion
        WHERE id_capacitaciones_asistentes = :id_capacitacion
sql;
        $parametros = array(
            ':id_capacitacion' => $participante,
            ':calificacion' => $calificacion
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        //UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function update($registro){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE capacitaciones SET
        nombre_curso = :nombre_curso,
        fecha = :fecha,
        lugar = :lugar,
        persona = :persona
      WHERE id_capacitacion = :id_capacitacion
sql;
        $parametros = array(
            ':nombre_curso' => $registro->_nombre_curso,
            ':fecha' => $registro->_fecha,
            ':lugar' => $registro->_lugar,
            ':persona' => $registro->_persona,
            ':id_capacitacion' => $registro->_id_capacitacion
        );

      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      $accion->_id = $registro->_id_capacitacion;
      UtileriasLog::addAccion($accion);
      return $mysqli->update($query, $parametros);
    }

    public static function delete($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
      delete from capacitaciones_asistentes WHERE id_capacitaciones_asistentes = $id
sql;
        return $mysqli->delete($query);
    }

    public static function deleteAsistencia($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
      UPDATE capacitaciones_asistentes
        SET asistencia = 0 WHERE id_capacitaciones_asistentes = $id
sql;
        return $mysqli->update($query);
    }

    public static function getById($id)
    {
        $mysqli = Database::getInstance();
        $query=<<<sql
    SELECT capacitaciones.id_capacitacion,nombre_curso, capacitaciones.nombre_expositor, capacitaciones.fecha, 
	catalogo_planta.nombre,
	puestos.descripcion
FROM capacitaciones, catalogo_planta, puestos
WHERE capacitaciones.lugar = catalogo_planta.catalogo_planta_id
AND capacitaciones.persona = puestos.id_puesto
AND capacitaciones.id_capacitacion= $id
sql;
        return $mysqli->queryOne($query);
    }

    public static function getColaboradorNombreExpositor(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT catalogo_colaboradores_id, CONCAT(nombre, " ", apellido_paterno, " ", apellido_materno) AS nombre FROM catalogo_colaboradores WHERE STATUS = 1  ORDER BY nombre ASC
sql;
        return $mysqli->queryAll($query);
    }

    public static function getColaboradorNombre($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT cc.catalogo_colaboradores_id, CONCAT(cc.nombre, " ", cc.apellido_paterno, " ", cc.apellido_materno) AS nombre 
      FROM catalogo_colaboradores cc
      WHERE cc.catalogo_colaboradores_id NOT IN (SELECT id_colaborador FROM capacitaciones_asistentes WHERE id_capacitacion = $id)
      AND STATUS = 1
      ORDER BY nombre ASC
      
sql;
        return $mysqli->queryAll($query);
    }

    public static function getColaboradorAsistecia($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT ca.id_capacitaciones_asistentes, CONCAT(cc.nombre, ' ', cc.apellido_paterno, ' ', cc.apellido_materno) AS nombre FROM capacitaciones_asistentes ca
INNER JOIN catalogo_colaboradores cc ON cc.catalogo_colaboradores_id = ca.id_colaborador WHERE ca.id_capacitacion =  $id AND ca.asistencia = 0
sql;
        return $mysqli->queryAll($query);
    }

    public static function getColaboradorNombreAdministrativo($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
     SELECT cc.catalogo_colaboradores_id, CONCAT(cc.nombre, " ", cc.apellido_paterno, " ", cc.apellido_materno) AS nombre 
      FROM catalogo_colaboradores cc
      WHERE cc.catalogo_colaboradores_id NOT IN (SELECT id_colaborador FROM capacitaciones_asistentes WHERE id_capacitacion = $id)
      AND STATUS = 1
      AND pago = 'quincenal' 
      ORDER BY nombre ASC
      
sql;
        return $mysqli->queryAll($query);
    }
    public static function getColaboradorNombreProduccion($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
     SELECT cc.catalogo_colaboradores_id, CONCAT(cc.nombre, " ", cc.apellido_paterno, " ", cc.apellido_materno) AS nombre 
      FROM catalogo_colaboradores cc
      WHERE cc.catalogo_colaboradores_id NOT IN (SELECT id_colaborador FROM capacitaciones_asistentes WHERE id_capacitacion = $id)
      AND STATUS = 1
      AND pago = 'semanal' 
      ORDER BY nombre ASC
sql;
        return $mysqli->queryAll($query);
    }

    public static function getLugarPlanta(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT * FROM catalogo_planta ORDER BY nombre ASC
sql;
        return $mysqli->queryAll($query);
    }

    public static function getPuesto(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM puestos;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getColaboradoresExpositor(){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT cc.catalogo_colaboradores_id, CONCAT(cc.nombre, " ", cc.apellido_paterno, " ", cc.apellido_materno) AS nombre 
      FROM catalogo_colaboradores cc
      WHERE STATUS = 1
      ORDER BY nombre ASC
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
