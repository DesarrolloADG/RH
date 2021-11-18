<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Aniversario{

    public static function getAllXOCHIMILCO(){

	$mysqli = Database::getInstance();
        $query=<<<sql
       SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, l.nombre AS empresa, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando
FROM catalogo_colaboradores AS c
INNER JOIN catalogo_lector AS l ON c.catalogo_lector_id = l.catalogo_lector_id
WHERE MONTH(c.fecha_alta) = MONTH(CURDATE()) AND DAY( c.fecha_alta ) >= DAY(CURDATE()) AND c.STATUS = 1 AND c.identificador_noi = 'XOCHIMILCO' AND c.pago = 'semanal' ORDER BY DAY(c.fecha_alta) ASC

sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllVALLEJO(){

        $mysqli = Database::getInstance();
        $query=<<<sql
       SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, l.nombre AS empresa, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando
FROM catalogo_colaboradores AS c
INNER JOIN catalogo_lector AS l ON c.catalogo_lector_id = l.catalogo_lector_id
WHERE MONTH(c.fecha_alta) = MONTH(CURDATE()) AND DAY( c.fecha_alta ) >= DAY(CURDATE()) AND c.STATUS = 1 AND c.identificador_noi = 'VALLEJO' AND c.pago = 'semanal' ORDER BY DAY(c.fecha_alta) ASC

sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllLIQUIDOS(){

        $mysqli = Database::getInstance();
        $query=<<<sql
       SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, l.nombre AS empresa, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando
FROM catalogo_colaboradores AS c
INNER JOIN catalogo_lector AS l ON c.catalogo_lector_id = l.catalogo_lector_id
WHERE MONTH(c.fecha_alta) = MONTH(CURDATE()) AND DAY( c.fecha_alta ) >= DAY(CURDATE()) AND c.STATUS = 1 AND c.identificador_noi = 'GATSA' AND c.pago = 'semanal' ORDER BY DAY(c.fecha_alta) ASC

sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllDESHIDRATADOS(){

        $mysqli = Database::getInstance();
        $query=<<<sql
 SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, l.nombre AS empresa, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando
FROM catalogo_colaboradores AS c
INNER JOIN catalogo_lector AS l ON c.catalogo_lector_id = l.catalogo_lector_id
WHERE MONTH(c.fecha_alta) = MONTH(CURDATE()) AND DAY( c.fecha_alta ) >= DAY(CURDATE()) AND c.STATUS = 1 AND c.identificador_noi = 'UNIDESH' AND c.pago = 'semanal' ORDER BY DAY(c.fecha_alta) ASC

sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllPRODUCCION(){

        $mysqli = Database::getInstance();
        $query=<<<sql
       SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, l.nombre AS empresa, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando
FROM catalogo_colaboradores AS c
INNER JOIN catalogo_lector AS l ON c.catalogo_lector_id = l.catalogo_lector_id
WHERE MONTH(c.fecha_alta) = MONTH(CURDATE()) AND DAY( c.fecha_alta ) >= DAY(CURDATE()) AND c.STATUS = 1 AND c.pago = 'quincenal' ORDER BY DAY(c.fecha_alta) ASC

sql;
        return $mysqli->queryAll($query);
    }


    public static function getAllEnero(){
      $mysqli = Database::getInstance();
      $query=<<<sql
             SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando, identificador_noi AS empresa
FROM catalogo_colaboradores AS c
WHERE MONTH(fecha_alta) = 1 OR MONTH(fecha_alta) = 1 AND DAY( fecha_alta ) > DAY(CURDATE()) AND c.STATUS = 1 ORDER BY  
identificador_noi, DAY(c.fecha_alta) ASC

sql;

        return $mysqli->queryAll($query);
    }

    public static function getAllFebrero(){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando, identificador_noi AS empresa
FROM catalogo_colaboradores AS c
WHERE MONTH(fecha_alta) = 2 OR MONTH(fecha_alta) = 2 AND DAY( fecha_alta ) > DAY(CURDATE()) AND c.STATUS = 1 ORDER BY  
identificador_noi, DAY(c.fecha_alta) ASC

sql;

        return $mysqli->queryAll($query);
    }

    public static function getAllMarzo(){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando, identificador_noi AS empresa
FROM catalogo_colaboradores AS c
WHERE MONTH(fecha_alta) = 3 OR MONTH(fecha_alta) = 3 AND DAY( fecha_alta ) > DAY(CURDATE()) AND c.STATUS = 1 ORDER BY  
identificador_noi, DAY(c.fecha_alta) ASC

sql;

        return $mysqli->queryAll($query);
    }

    public static function getAllAbril(){
        $mysqli = Database::getInstance();
        $query=<<<sql
                SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando, identificador_noi AS empresa
FROM catalogo_colaboradores AS c
WHERE MONTH(fecha_alta) = 4 OR MONTH(fecha_alta) = 4 AND DAY( fecha_alta ) > DAY(CURDATE()) AND c.STATUS = 1 ORDER BY  
identificador_noi, DAY(c.fecha_alta) ASC

sql;

        return $mysqli->queryAll($query);
    }

    public static function getAllMayo(){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando, identificador_noi AS empresa
FROM catalogo_colaboradores AS c
WHERE MONTH(fecha_alta) = 5 OR MONTH(fecha_alta) = 5 AND DAY( fecha_alta ) > DAY(CURDATE()) AND c.STATUS = 1 ORDER BY  
identificador_noi, DAY(c.fecha_alta) ASC

sql;

        return $mysqli->queryAll($query);
    }

    public static function getAllJunio(){
        $mysqli = Database::getInstance();
        $query=<<<sql
                SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando, identificador_noi AS empresa
FROM catalogo_colaboradores AS c
WHERE MONTH(fecha_alta) = 6 OR MONTH(fecha_alta) = 6 AND DAY( fecha_alta ) > DAY(CURDATE()) AND c.STATUS = 1 ORDER BY  
identificador_noi, DAY(c.fecha_alta) ASC

sql;

        return $mysqli->queryAll($query);
    }

    public static function getAllJulio(){
        $mysqli = Database::getInstance();
        $query=<<<sql
             SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando, identificador_noi AS empresa
FROM catalogo_colaboradores AS c
WHERE MONTH(fecha_alta) = 7 OR MONTH(fecha_alta) = 7 AND DAY( fecha_alta ) > DAY(CURDATE()) AND c.STATUS = 1 ORDER BY  
identificador_noi, DAY(c.fecha_alta) ASC

sql;

        return $mysqli->queryAll($query);
    }

    public static function getAllAgosto(){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando, identificador_noi AS empresa
FROM catalogo_colaboradores AS c
WHERE MONTH(fecha_alta) = 8 OR MONTH(fecha_alta) = 8 AND DAY( fecha_alta ) > DAY(CURDATE()) AND c.STATUS = 1 ORDER BY  
identificador_noi, DAY(c.fecha_alta) ASC

sql;

        return $mysqli->queryAll($query);
    }

    public static function getAllSeptiembre(){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando, identificador_noi AS empresa
FROM catalogo_colaboradores AS c
WHERE MONTH(fecha_alta) = 9 OR MONTH(fecha_alta) = 9 AND DAY( fecha_alta ) > DAY(CURDATE()) AND c.STATUS = 1 ORDER BY  
identificador_noi, DAY(c.fecha_alta) ASC

sql;

        return $mysqli->queryAll($query);
    }

    public static function getAllOctubre(){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando, identificador_noi AS empresa
FROM catalogo_colaboradores AS c
WHERE MONTH(fecha_alta) = 10 OR MONTH(fecha_alta) = 10 AND DAY( fecha_alta ) > DAY(CURDATE()) AND c.STATUS = 1 ORDER BY  
identificador_noi, DAY(c.fecha_alta) ASC

sql;

        return $mysqli->queryAll($query);
    }

    public static function getAllNoviembre(){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando, identificador_noi AS empresa
FROM catalogo_colaboradores AS c
WHERE MONTH(fecha_alta) = 11 OR MONTH(fecha_alta) = 11 AND DAY( fecha_alta ) > DAY(CURDATE()) AND c.STATUS = 1 ORDER BY  
identificador_noi, DAY(c.fecha_alta) ASC

sql;

        return $mysqli->queryAll($query);
    }

    public static function getAllDiciembre(){
        $mysqli = Database::getInstance();
        $query=<<<sql
            SELECT c.catalogo_colaboradores_id, CONCAT(c.nombre," ",c.apellido_paterno," ",c.apellido_materno) AS nombre, c.fecha_alta, CONCAT(YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ), " años") AS tiempo_colaborado, 
CONCAT(IF(DAY(c.fecha_alta ) = DAY(CURDATE()), (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1 , (YEAR(CURDATE())-YEAR(c.fecha_alta) + IF(DATE_FORMAT(CURDATE(),'%m-%d') > DATE_FORMAT(c.fecha_alta,'%m-%d'), 0 , -1 ))+1)," aniversario") AS cumplira,
CONCAT(YEAR(CURDATE()),"-",MONTH(c.fecha_alta), "-",DAY(c.fecha_alta)) AS cuando, identificador_noi AS empresa
FROM catalogo_colaboradores AS c
WHERE MONTH(fecha_alta) = 12 OR MONTH(fecha_alta) = 12 AND DAY( fecha_alta ) > DAY(CURDATE()) AND c.STATUS = 1 ORDER BY  
identificador_noi, DAY(c.fecha_alta) ASC

sql;

        return $mysqli->queryAll($query);
    }

}
