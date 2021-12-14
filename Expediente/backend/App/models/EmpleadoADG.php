<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class EmpleadoADG{

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
        SELECT id_empleado_adg, ano_registro, descripcion_premio,
QUARTER(fecha_registro) AS trimestre, fecha_registro, cantidad_premio, estatus FROM empleado_adg
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllPersonal($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
     SELECT id_candidato_adg,  
       CONCAT(cc.nombre, " ",cc.apellido_paterno, " ", cc.apellido_materno)
AS nombre
FROM candidatos_adg ca
INNER JOIN catalogo_colaboradores cc ON ca.catalogo_colaboradores_id = cc.catalogo_colaboradores_id
WHERE ca.id_empleado_adg = $id
    
sql;
        return $mysqli->queryAll($query);
    }



    public static function insert($accidente){
	    $mysqli = Database::getInstance();
      $query=<<<sql
      INSERT INTO accidentes
      VALUES (NULL, :catalogo_colaboradores_id, :fecha_accidente, :trimestre, :activo_incapacidad, :id_lugar_accidente, :detalle_accidente, :causa,
	:id_clasificacion_accidente, :acto_inseguro, :condicion_insegura);
sql;
        $parametros = array(
          ':catalogo_colaboradores_id' => $accidente->_catalogo_colaboradores_id,
          ':fecha_accidente' => $accidente->_fecha_accidente,
          ':trimestre' => $accidente->_trimestre,
          ':activo_incapacidad' => $accidente->_incapacidad_activa,
          ':id_lugar_accidente' => $accidente->_id_lugar_accidente,
          ':detalle_accidente' => $accidente->_detalle_accidente,
          ':causa' => $accidente->_causa,
          ':id_clasificacion_accidente' => $accidente->_id_clasificacion_accidente,
	      ':acto_inseguro' => $accidente->_acto_inseguro,
          ':condicion_insegura' => $accidente->_condicion_insegura
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function getColaboradorAsistecia($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT cc.catalogo_colaboradores_id, CONCAT(cc.nombre, " ", cc.apellido_paterno, " ", cc.apellido_materno) AS nombre 
      FROM catalogo_colaboradores cc
      WHERE cc.catalogo_colaboradores_id NOT IN (SELECT catalogo_colaboradores_id FROM candidatos_adg WHERE id_empleado_adg = $id)
      AND STATUS = 1
      ORDER BY nombre ASC
sql;
        return $mysqli->queryAll($query);
    }

    public static function insertparticipantes($participante){
        $mysqli = Database::getInstance();
        $query=<<<sql
      INSERT INTO candidatos_adg
      VALUES (NULL, :id_empleado_adg,:catalogo_colaboradores_id, 0);
sql;
        $parametros = array(
            ':id_empleado_adg' => $participante->_id_candidato,
            ':catalogo_colaboradores_id' => $participante->_id_colaborador
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        //UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function update($empleados){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE empleado_adg SET
        descripcion_premio = :descripcion_premio,
        fecha_registro = :fecha_registro,
        cantidad_premio = :cantidad_premio
      WHERE id_empleado_adg = :id_empleado_adg
sql;
        $parametros = array(
            ':descripcion_premio' => $empleados->_detalle,
            ':fecha_registro' => $empleados->_fecha,
            ':cantidad_premio' => $empleados->_cantidad,
            ':id_empleado_adg' => $empleados->_id_empleado_adg
        );

      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      $accion->_id = $empleados->_id_empleado_adg;
      UtileriasLog::addAccion($accion);
      return $mysqli->update($query, $parametros);
    }



    public static function getById($id)
    {
        $mysqli = Database::getInstance();
        $query=<<<sql
   SELECT * from empleado_adg
WHERE id_empleado_adg = $id
sql;
        return $mysqli->queryOne($query);
    }

    public static function delete($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
      delete from candidatos_adg WHERE id_candidato_adg = $id
sql;
        return $mysqli->delete($query);
    }

}
