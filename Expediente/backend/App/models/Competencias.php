<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \Core\MasterDom;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Competencias implements Crud{

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
        SELECT e.catalogo_competencia_id, e.nombre, e.descripcion, s.nombre as status FROM catalogo_competencias e JOIN catalogo_status s ON s.catalogo_status_id = e.status WHERE s.catalogo_status_id != 2 ORDER BY e.catalogo_competencia_id ASC 
sql;
      return $mysqli->queryAll($query);
    }

    public static function insert($empresa){
	    $mysqli = Database::getInstance(1);
      $query=<<<sql
        INSERT INTO catalogo_competencias VALUES(null, :nombre, :descripcion, :status)
sql;
        $parametros = array(
          ':nombre'=>$empresa->_nombre,
          ':descripcion'=>$empresa->_descripcion,
          ':status'=>1
        );

        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }


    public static function update($empresa){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE catalogo_competencias SET nombre = :nombre, descripcion = :descripcion WHERE catalogo_competencia_id = :id
sql;
      $parametros = array(
        ':id'=>$empresa->_catalogo_competencia_id,
        ':nombre'=>$empresa->_nombre,
        ':descripcion'=>$empresa->_descripcion
      );
      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      $accion->_id = $empresa->_catalogo_competencia_id;
      UtileriasLog::addAccion($accion);
        return $mysqli->update($query, $parametros);
    }

    public static function delete($id){
    $mysqli = Database::getInstance();
    $query=<<<sql
     delete FROM catalogo_competencias 
      WHERE catalogo_competencia_id = $id
sql;
    return $mysqli->delete($query);
}

    public static function verificarRelacion($id){
      $mysqli = Database::getInstance();
      $select = <<<sql
      SELECT e.catalogo_competencia_id FROM catalogo_competencias e 
      WHERE e.catalogo_competencia_id = $id
sql;
      $sqlSelect = $mysqli->queryAll($select);
      if(count($sqlSelect) >= 1)
        return array('seccion'=>2, 'id'=>$id); // NO elimina
      else
        return array('seccion'=>1, 'id'=>$id); // Cambia el status a eliminado
      
    }

    public static function getById($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT ce.catalogo_competencia_id, ce.nombre, ce.descripcion, ce.status, cs.nombre AS nombre_status, cs.catalogo_status_id FROM catalogo_competencias AS ce INNER JOIN catalogo_status AS cs WHERE catalogo_competencia_id = $id AND ce.status = cs.catalogo_status_id 
sql;
      return $mysqli->queryOne($query);
    }

    public static function getStatus(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM catalogo_status
sql;
      return $mysqli->queryAll($query);
    }

    public static function getNombreEmpresa($nombre_empresa){
      $mysqli = Database::getInstance();
      $query =<<<sql
      SELECT * FROM `catalogo_competencias` WHERE `nombre` LIKE '$nombre_empresa' 
sql;
      $dato = $mysqli->queryOne($query);
      return ($dato>=1) ? 1 : 2 ;
    }

    public static function getIdComparacion($id, $nombre){
      $mysqli = Database::getInstance();
      $query =<<<sql
      SELECT * FROM catalogo_competencias WHERE catalogo_competencia_id = '$id' AND nombre Like '$nombre' 
sql;
      $dato = $mysqli->queryOne($query);
      // 0

      if($dato>=1){
        return 1;
      }else{
        return 2;
      }
    }
}
