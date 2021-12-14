<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \Core\MasterDom;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Vacaciones{

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
SELECT catalogo_colaboradores_id, nombre, fecha_alta, tiempo_colaborado,cumplira, cuando, ultimo_aniversario,
CASE
           WHEN tiempo_colaborado BETWEEN  0 AND 0 THEN '0'
           WHEN tiempo_colaborado BETWEEN  1 AND 1 THEN '6'
	   WHEN tiempo_colaborado BETWEEN  2 AND 2 THEN '8'
	   WHEN tiempo_colaborado BETWEEN  3 AND 3 THEN '10'
           WHEN tiempo_colaborado BETWEEN  4 AND 4 THEN '12'
           WHEN tiempo_colaborado BETWEEN  5 AND 9 THEN '14'
           WHEN tiempo_colaborado BETWEEN 10 AND 14 THEN '16'
           WHEN tiempo_colaborado BETWEEN 15 AND 19 THEN '18'
           WHEN tiempo_colaborado BETWEEN 20 AND 24 THEN '20'
           WHEN tiempo_colaborado BETWEEN 25 AND 29 THEN '22'
           WHEN tiempo_colaborado BETWEEN 30 AND 34 THEN '24'
           WHEN tiempo_colaborado BETWEEN 31 AND 60 THEN '24'
       END AS dias_correspondientes, dias_usados 
FROM vacaciones GROUP BY catalogo_colaboradores_id
sql;
      return $mysqli->queryAll($query);
    }

    public static function getColaborador($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT concat(nombre, " ", apellido_paterno, " ", apellido_materno) as nombre
FROM catalogo_colaboradores where catalogo_colaboradores_id = $id
sql;
        return $mysqli->queryOne($query);
    }

    public static function getById($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
    SELECT cc.catalogo_colaboradores_id, CONCAT(nombre," ", apellido_paterno, " ", apellido_materno) AS nombre, ppc.fecha,
    ppc.prorrateo_periodo_id, CONCAT(ppr.fecha_inicio, " al ", ppr.fecha_fin) AS nomina
    FROM prorrateo_periodo_colaboradores ppc
    INNER JOIN catalogo_colaboradores cc ON cc.catalogo_colaboradores_id =  ppc.catalogo_colaboradores_id
    INNER JOIN prorrateo_periodo ppr ON ppr.prorrateo_periodo_id =  ppc.prorrateo_periodo_id
    WHERE estatus = 19 AND cc.status = 1 AND cc.pago= 'semanal' AND cc.catalogo_colaboradores_id = $id 
    GROUP BY fecha
    ORDER BY ppc.fecha DESC
sql;
      return $mysqli->queryAll($query);
    }

}
