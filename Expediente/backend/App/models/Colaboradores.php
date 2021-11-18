<?php
namespace App\models;
defined("APPPATH") OR die("Access denied");

use \Core\Database;
use \App\interfaces\Crud;
use \App\controllers\UtileriasLog;

class Colaboradores implements Crud{

    public static function getDocumentos($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT
          * FROM file WHERE user_id = $id;
sql;
        return $mysqli->queryAll($query);
    }

    public static function getPuestosOcupados($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT po.id_puesto_ocupado, cp.nombre AS nombre_puesto, po.fecha_actualizacion FROM puestos_ocupados po
INNER JOIN catalogo_puesto cp ON po.catalogo_puesto_id = cp.catalogo_puesto_id
WHERE po.catalogo_colaboradores_id = $id
ORDER BY fecha_actualizacion ASC;

sql;
        return $mysqli->queryAll($query);
    }

    public static function getAccidentesAll($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM accidentes WHERE catalogo_colaboradores_id = $id ORDER BY fecha_accidente DESC 
sql;
        return $mysqli->queryAll($query);
    }

    public static function getPuestosOcupadosAntiguedad($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT po.id_puesto_ocupado, cp.nombre AS nombre_puesto, po.fecha_actualizacion FROM puestos_ocupados po
INNER JOIN catalogo_puesto cp ON po.catalogo_puesto_id = cp.catalogo_puesto_id
WHERE po.catalogo_colaboradores_id = $id ORDER BY fecha_actualizacion desc LIMIT 1 

sql;
        return $mysqli->queryOne($query);
    }

    public static function getSueldos($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT cc.catalogo_colaboradores_id, cc.clave_noi, sh.sal_diario, sh.fecha_alta, sh.numero FROM sueldos_historico sh
        INNER JOIN catalogo_colaboradores cc ON sh.clave = cc.clave_noi
        WHERE cc.catalogo_colaboradores_id = $id and cc.identificador_noi = sh.identificador
        ORDER BY sh.numero DESC;

sql;
        return $mysqli->queryAll($query);
    }

    public static function getDomicilios($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT id_domicilio,CONCAT(calle, ", ", exterior ,", ", interior, ", ",colonia, ", ", cp, ", ",municipio, ", ", estado) AS direccion FROM domicilios where catalogo_colaboradores_id = $id;

sql;
        return $mysqli->queryAll($query);
    }

    public static function getNumeroHijos($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT  from numero_hijos 
        where catalogo_colaboradores_id = $id;

sql;
        return $mysqli->queryAll($query);
    }

    public static function getRegistroCapacitaciones($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT ca.id_colaborador, c.nombre_curso, c.fecha, ca.asistencia 
        FROM capacitaciones_asistentes ca
        INNER JOIN capacitaciones c ON ca.id_capacitacion = c.id_capacitacion
        WHERE ca.id_colaborador = $id AND c.fecha <= CURDATE() ORDER BY fecha DESC;

sql;
        return $mysqli->queryAll($query);
    }

    public static function getEstudiosAdicionales($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT ea.id_estudio_adicional, ea.descripcion, doo.nombre AS documento_obtenido FROM estudios_adicionales ea
        INNER JOIN documento_obtenido doo ON doo.id_documento_obtenido = ea.documento_obtenido
        WHERE catalogo_colaboradores_id = $id;

sql;
        return $mysqli->queryAll($query);
    }

    public static function getAccidentes($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT COUNT(*) as cuantas FROM accidentes WHERE catalogo_colaboradores_id = $id;
sql;
        return $mysqli->queryOne($query);
    }

    public static function getIncapacidades($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT md.id_catalogo_colaboradores, SUM(DATEDIFF(md.fecha_fin, md.fecha_inicio)) AS days FROM  incapacidades md WHERE id_catalogo_colaboradores = $id AND id_accidente !=0 GROUP BY md.id_catalogo_colaboradores          
sql;
        return $mysqli->queryOne($query);
    }



    public static function getNumero_Identificacion($clave, $id_catalogo_lector){

        $mysqli = Database::getInstance(true);
        $query =<<<sql
        SELECT * FROM catalogo_colaboradores WHERE numero_identificador = '$clave' and catalogo_lector_id = '$id_catalogo_lector';
sql;
        $dato = $mysqli->queryOne($query);
        return ($dato>=1) ;
    }

    public static function getPlantilla($id_catalogo_lector){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT (SELECT plantilla_autorizada FROM catalogo_personal_autorizado WHERE catalogo_lector_id= '$id_catalogo_lector') AS plantilla_autorizada, 
               (SELECT COUNT(*) AS Activos FROM catalogo_colaboradores AS A WHERE STATUS= 1 AND catalogo_lector_id = $id_catalogo_lector) AS activos, 
               (SELECT plantilla_autorizada FROM catalogo_personal_autorizado WHERE catalogo_lector_id= '$id_catalogo_lector') - 
               (SELECT COUNT(*) AS Activos FROM catalogo_colaboradores AS A WHERE STATUS= 1 AND catalogo_lector_id = $id_catalogo_lector)  AS faltantes
sql;
        return $mysqli->queryAll($query);
    }

    public static function getXochimilco(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        Select (SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'Xochimilco') as plantilla_autorizada, 
               (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 1) as activos, 
               (SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'Xochimilco') - 
               (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 1)  as faltantes,
               
                   If((SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'Xochimilco') < (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 1), 
                      
                  if((SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'Xochimilco') > (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 1), 'Incompleta','Sobrepasa'),
                  
                      if((SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'Xochimilco') = (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 1),'Completa','Incompleta'))as color
sql;
        return $mysqli->queryAll($query);
    }

    public static function getVallejo(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        Select (SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'Vallejo') as plantilla_autorizada, 
               (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 2) as activos, 
               (SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'Vallejo') - 
               (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 2)  as faltantes,
               
                   If((SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'Vallejo') < (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 2), 
                      
                  if((SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'Vallejo') > (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 2), 'Incompleta','Sobrepasa'),
                  
                      if((SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'Vallejo') = (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 2),'Completa','Incompleta'))as color
sql;
        return $mysqli->queryAll($query);
    }

    public static function getGATSA(){
        $mysqli = Database::getInstance();
        $query=<<<sql
         Select (SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'GATSA') as plantilla_autorizada, 
               (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 3) as activos, 
               (SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'GATSA') - 
               (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 3)  as faltantes,
               
                   If((SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'GATSA') < (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 3), 
                      
                  if((SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'GATSA') > (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 3), 'Incompleta','Sobrepasa'),
                  
                      if((SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'GATSA') = (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 3),'Completa','Incompleta'))as color
sql;
        return $mysqli->queryAll($query);
    }

    public static function getUNIDESH(){
        $mysqli = Database::getInstance();
        $query=<<<sql
               Select (SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'UNIDESH') as plantilla_autorizada, 
               (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 4) as activos, 
               (SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'UNIDESH') - 
               (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 4)  as faltantes,
               
                   If((SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'UNIDESH') < (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 4), 
                      
                  if((SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'UNIDESH') > (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 4), 'Incompleta','Sobrepasa'),
                  
                      if((SELECT plantilla_autorizada from catalogo_personal_autorizado where unidad= 'UNIDESH') = (SELECT COUNT(*) as Activos FROM catalogo_colaboradores as A where status= 1 and catalogo_lector_id = 4),'Completa','Incompleta'))as color
sql;
        return $mysqli->queryAll($query);
    }

    public static function getProduccionXochimilco(){
        $mysqli = Database::getInstance();
        $query=<<<sql
                  
 SELECT (SELECT plantilla_autorizada FROM catalogo_personal_autorizado WHERE unidad= 'Administrativos') AS plantilla_autorizada, 
               (SELECT COUNT(*) AS Activos FROM catalogo_colaboradores AS A WHERE STATUS= 1 AND catalogo_lector_id = 5) AS activos, 
               (SELECT plantilla_autorizada FROM catalogo_personal_autorizado WHERE unidad= 'Administrativos') - 
               (SELECT COUNT(*) AS Activos FROM catalogo_colaboradores AS A WHERE STATUS= 1 AND catalogo_lector_id = 5)  AS faltantes,
               
                   IF((SELECT plantilla_autorizada FROM catalogo_personal_autorizado WHERE unidad= 'Administrativos') < (SELECT COUNT(*) AS Activos FROM catalogo_colaboradores AS A WHERE STATUS= 1 AND catalogo_lector_id = 5), 
                      
                  IF((SELECT plantilla_autorizada FROM catalogo_personal_autorizado WHERE unidad= 'Administrativos') > (SELECT COUNT(*) AS Activos FROM catalogo_colaboradores AS A WHERE STATUS= 1 AND catalogo_lector_id = 5), 'Incompleta','Sobrepasa'),
                  
                      IF((SELECT plantilla_autorizada FROM catalogo_personal_autorizado WHERE unidad= 'Administrativos') = (SELECT COUNT(*) AS Activos FROM catalogo_colaboradores AS A WHERE STATUS= 1 AND catalogo_lector_id = 5),'Completa','Incompleta'))AS color
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAll(){
      $mysqli = Database::getInstance();
      $query=<<<sql
        SELECT
          c.catalogo_colaboradores_id,
          c.clave_noi,
          c.nombre,
          c.apellido_paterno,
          c.apellido_materno,
          s.nombre AS status,
          c.motivo,
          c.sexo,
          c.numero_identificador,
          c.rfc,
          e.nombre AS catalogo_empresa_id,
          u.nombre AS catalogo_ubicacion_id,
          d.nombre AS catalogo_departamento_id,
          p.nombre AS catalogo_puesto_id,
          h.nombre AS catalogo_horario_id,
          c.fecha_alta,
          c.fecha_baja,
          c.foto,
          c.pago,
          c.opcion,
          c.numero_empleado
        FROM catalogo_colaboradores c
        JOIN catalogo_empresa e ON e.catalogo_empresa_id = c.catalogo_empresa_id
        JOIN catalogo_ubicacion u ON u.catalogo_ubicacion_id = c.catalogo_ubicacion_id
        JOIN catalogo_departamento d ON d.catalogo_departamento_id = c.catalogo_departamento_id
        JOIN catalogo_puesto p ON p.catalogo_puesto_id = c.catalogo_puesto_id
        JOIN catalogo_horario h ON h.catalogo_horario_id = c.catalogo_horario_id
        JOIN catalogo_status s ON s.catalogo_status_id = c.status WHERE c.status !=2
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllColaboradores($perfilId, $plantaId, $departamentoId, $accion, $departamento, $planta, $usuario, $perfil, $propios, $filtro){
      $mysqli = Database::getInstance();
      $query=<<<sql

SELECT c.catalogo_colaboradores_id, c.nombre, c.apellido_paterno, c.apellido_materno, s.nombre AS status, c.motivo, c.sexo, c.numero_identificador, c.rfc, e.nombre AS catalogo_empresa_id, u.nombre AS catalogo_ubicacion_id, d.nombre AS catalogo_departamento_id, p.nombre AS catalogo_puesto_id, h.nombre AS catalogo_horario_id, c.fecha_alta, c.fecha_baja, c.foto, c.pago, c.opcion, c.numero_empleado, p.nombre AS nombre_puesto, e.nombre AS nombre_empresa, d.nombre AS nombre_departamento, cp.catalogo_planta_id, c.identificador_noi
FROM catalogo_colaboradores c
JOIN catalogo_empresa e ON e.catalogo_empresa_id = c.catalogo_empresa_id
JOIN catalogo_departamento d ON d.catalogo_departamento_id = c.catalogo_departamento_id
JOIN catalogo_status s ON s.catalogo_status_id = c.status 
JOIN catalogo_ubicacion u ON u.catalogo_ubicacion_id = c.catalogo_ubicacion_id 
JOIN catalogo_puesto p ON p.catalogo_puesto_id = c.catalogo_puesto_id 
JOIN catalogo_planta cp ON cp.catalogo_planta_id = c.catalogo_ubicacion_id 
JOIN catalogo_horario h ON h.catalogo_horario_id = c.catalogo_horario_id 
sql;


      if($perfilId == 1 || $perfilId == 4 ){

        if($accion == 1){
          $query .=<<<sql
WHERE c.status = 1 AND c.catalogo_departamento_id = "$departamentoId" 
sql;
        }

        if($accion == 2){
          $query .=<<<sql
WHERE c.status = 1 
sql;
        }

      }

      if($perfilId == 6){
        if($accion == 1){
          $query .=<<<sql
WHERE c.status = 1 AND c.catalogo_departamento_id = "$departamentoId"
sql;
        }

        if($accion == 2){
          $query .=<<<sql
WHERE c.status = 1 
sql;
        }

        if($accion == 4){
          $query .=<<<sql
WHERE c.status = 1 AND c.catalogo_departamento_id = "$departamentoId"
sql;
        }


        if($accion == 6){
          $query .=<<<sql
WHERE c.status = 1 AND cp.catalogo_planta_id = "$plantaId"
sql;
        }
      }



      if($perfilId == 5){
        $query .=<<<sql
WHERE c.status = 1 AND c.catalogo_departamento_id = "$departamentoId" 
sql;
      }

      if($filtro == "AND c.identificador_noi = 'vacio' "){
        $filtro = "AND c.identificador_noi = '' ";
      }

        $query .=<<<sql
$filtro ORDER BY c.apellido_paterno ASC 
sql;

      return $mysqli->queryAll($query);

    }

    public static function getAllReporte($filtro){
      $mysqli = Database::getInstance();
      $query=<<<sql
SELECT c.catalogo_colaboradores_id, c.nombre, c.apellido_paterno, c.apellido_materno, s.nombre AS status, c.motivo, c.sexo, c.numero_identificador, c.rfc, e.nombre AS catalogo_empresa_id, u.nombre AS catalogo_ubicacion_id, d.nombre AS catalogo_departamento_id, p.nombre AS catalogo_puesto_id, h.nombre AS catalogo_horario_id, c.fecha_alta, c.fecha_baja, c.foto, c.pago, c.opcion, c.numero_empleado
FROM catalogo_colaboradores c
JOIN catalogo_empresa e ON e.catalogo_empresa_id = c.catalogo_empresa_id
JOIN catalogo_ubicacion u ON u.catalogo_ubicacion_id = c.catalogo_ubicacion_id
JOIN catalogo_departamento d ON d.catalogo_departamento_id = c.catalogo_departamento_id
JOIN catalogo_puesto p ON p.catalogo_puesto_id = c.catalogo_puesto_id
JOIN catalogo_horario h ON h.catalogo_horario_id = c.catalogo_horario_id
JOIN catalogo_status s ON s.catalogo_status_id = c.status WHERE c.status !=2 $filtro 
sql;
      //print_r($query);
      return $mysqli->queryAll($query);
    }

    public static function insert($colaborador){
	    $mysqli = Database::getInstance();
      $query=<<<sql
      INSERT INTO catalogo_colaboradores
      VALUES (NULL, :clave_noi, :identificador, :nombre, :apellido_paterno, :apellido_materno, :status, :motivo,
	:genero, :numero_identificador, :rfc, :catalogo_empresa_id, :catalogo_lector_id, :catalogo_ubicacion_id,1,
	:catalogo_departamento_id, :catalogo_puesto_id, :catalogo_horario_id, :fecha_alta, :fecha_baja, :foto, :pago,
	:opcion, :letra, :privilegiado, :tipo_horario, :catalogo_lector_secundario_id,0);
sql;
        $parametros = array(
          ':nombre' => $colaborador->_nombre,
          ':apellido_paterno' => $colaborador->_apellido_paterno,
          ':apellido_materno' => $colaborador->_apellido_materno,
          ':motivo' => $colaborador->_motivo,
          ':genero' => $colaborador->_genero,
          ':numero_identificador' => $colaborador->_numero_identificacion,
          ':rfc' => $colaborador->_rfc,
          ':catalogo_empresa_id' => $colaborador->_id_catalogo_empresa,
	  ':catalogo_lector_id' => $colaborador->_id_catalogo_lector,
          ':catalogo_ubicacion_id' => $colaborador->_id_catalogo_ubicacion,
          ':catalogo_departamento_id' => $colaborador->_id_catalogo_departamento,
          ':catalogo_puesto_id' => $colaborador->_id_catalogo_puesto,
          ':catalogo_horario_id' => $colaborador->_horario,
          ':fecha_alta' => $colaborador->_fecha_alta,
          ':fecha_baja' => $colaborador->_fecha_baja,
          ':foto' => $colaborador->_foto,
          ':pago' => $colaborador->_pago,
          ':opcion' => $colaborador->_opcion,
          ':status' => $colaborador->_status,
          ':letra' => $colaborador->_letra_ubicacion,
          ':clave_noi' => $colaborador->_clave_noi,
          ':identificador' => $colaborador->_identificador,
	        ':privilegiado' => $colaborador->_privilegiado,
	        ':tipo_horario' => $colaborador->_tipo_horario,
		':catalogo_lector_secundario_id' => $colaborador->_id_catalogo_lector_secundario
        );
        $id = $mysqli->insert($query,$parametros);
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $id;

        UtileriasLog::addAccion($accion);
        return $id;
    }

    public static function updateNumeroEmpleado($id, $numero_identificador){
      $mysqli = Database::getInstance();
      $query=<<<sql
      UPDATE catalogo_colaboradores SET
        numero_empleado = CONCAT(numero_empleado,$numero_identificador)
      WHERE catalogo_colaboradores_id = $id
sql;
      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      UtileriasLog::addAccion($accion);
      return $mysqli->update($query);
    }

    public static function getDepartamentos($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT ad.catalogo_departamento_id, d.nombre AS nombre_departamento FROM utilerias_administradores_departamentos AS ad
INNER JOIN catalogo_departamento AS d ON (d.catalogo_departamento_id = ad.catalogo_departamento_id)
WHERE id_administrador = '$id'
sql;
        return $mysqli->queryAll($query);
    }

    public static function getAllDepartamentos(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM catalogo_departamento WHERE status = 1 ORDER BY catalogo_departamento_id
sql;
        return $mysqli->queryAll($query);
    }

    public static function getDepartamentosRh(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT DISTINCT ad.catalogo_departamento_id, d.nombre AS nombre_departamento 
        FROM utilerias_administradores_departamentos AS ad
        INNER JOIN catalogo_departamento AS d 
        ON (d.catalogo_departamento_id = ad.catalogo_departamento_id)
sql;
        return $mysqli->queryAll($query);
    }

    public static function getDatosUsuarioLogeado($user){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT *, cp.nombre AS nombre_planta FROM 
        utilerias_administradores AS a 
        INNER JOIN catalogo_planta AS cp USING (catalogo_planta_id)
        WHERE usuario LIKE '$user'
sql;
        return $mysqli->queryOne($query);
    }

    public static function update($colaborador){
      $mysqli = Database::getInstance(true);
      $query=<<<sql
      UPDATE catalogo_colaboradores SET
        clave_noi = :clave_noi,
        nombre = :nombre,
        apellido_paterno = :apellido_paterno,
        apellido_materno = :apellido_materno,
        status = :status,
        motivo = :motivo,
        sexo = :sexo,
        numero_identificador = :numero_identificador,
        rfc = :rfc,
        catalogo_empresa_id = :catalogo_empresa_id,
	catalogo_lector_id = :catalogo_lector_id,
	catalogo_lector_secundario_id = :catalogo_lector_secundario_id,
        catalogo_ubicacion_id = :catalogo_ubicacion_id,
        catalogo_departamento_id = :catalogo_departamento_id,
        catalogo_puesto_id = :catalogo_puesto_id,
        catalogo_horario_id = :catalogo_horario_id,
        fecha_alta = :fecha_alta,
        fecha_baja = :fecha_baja,
        foto = :foto,
        pago = :pago,
        opcion = :opcion,
        numero_empleado = :numero_empleado,
	      privilegiado = :privilegiado,
	      horario_tipo = :horario_tipo
      WHERE catalogo_colaboradores_id = :catalogo_colaboradores_id
sql;
      $parametros = array(
        ':catalogo_colaboradores_id' => $colaborador->_catalogo_colaboradores_id,
        ':nombre' => $colaborador->_nombre,
        ':apellido_paterno' => $colaborador->_apellido_paterno,
        ':apellido_materno' => $colaborador->_apellido_materno,
        ':status' => $colaborador->_status,
        ':motivo' => $colaborador->_motivo,
        ':sexo' => $colaborador->_genero,
        ':numero_identificador' => $colaborador->_numero_identificacion,
        ':rfc' => $colaborador->_rfc,
        ':catalogo_empresa_id' => $colaborador->_id_catalogo_empresa,
	':catalogo_lector_id' => $colaborador->_id_catalogo_lector,
	':catalogo_lector_secundario_id' => $colaborador->_id_catalogo_lector_secundario,
        ':catalogo_ubicacion_id' => $colaborador->_id_catalogo_ubicacion,
        ':catalogo_departamento_id' => $colaborador->_id_catalogo_departamento,
        ':catalogo_puesto_id' => $colaborador->_id_catalogo_puesto,
        ':catalogo_horario_id' => $colaborador->_horario,
        ':fecha_alta' => $colaborador->_fecha_alta,
        ':fecha_baja' => $colaborador->_fecha_baja,
        ':foto' => $colaborador->_foto,
        ':pago' => $colaborador->_pago,
        ':opcion' => $colaborador->_opcion,
        ':numero_empleado' => $colaborador->_numero_empleado,
        ':clave_noi' => $colaborador->_clave_noi,
      	':privilegiado' => $colaborador->_privilegiado,
        ':horario_tipo' => $colaborador->_tipo_horario
      );

      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      $accion->_id = $colaborador->_catalogo_colaboradores_id;
      UtileriasLog::addAccion($accion);
      return $mysqli->update($query, $parametros);
    }

    public static function updateIngresoProyecto($ingreso_proyecto){
        $mysqli = Database::getInstance(true);
        $query=<<<sql
      UPDATE ingreso_proyecto SET
        porcentaje_apego = :porcentaje_apego,
        calificacion_proyecto = :calificacion_proyecto,
        nombre_proyecto = :nombre_proyecto
      WHERE id_ingreso = :id_ingreso
sql;
        $parametros = array(
            ':id_ingreso' => $ingreso_proyecto->_id_ingreso_proyecto,
            ':porcentaje_apego' => $ingreso_proyecto->_porcentaje,
            ':calificacion_proyecto' => $ingreso_proyecto->_calificacion,
            ':nombre_proyecto' => $ingreso_proyecto->_nombre,

        );

        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $ingreso_proyecto->_id_ingreso_proyecto;
        UtileriasLog::addAccion($accion);
        return $mysqli->update($query, $parametros);
    }

    public static function updateIncentivo($incentivo){
        $mysqli = Database::getInstance(true);
        $query=<<<sql
      UPDATE incentivo_trimestral SET
        monto = :monto
      WHERE id_incentivo = :id_incentivo
sql;
        $parametros = array(
            ':id_incentivo' => $incentivo->_id_incentivo,
            ':monto' => $incentivo->_monto
        );

        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        $accion->_id = $incentivo->_id_incentivo;
        UtileriasLog::addAccion($accion);
        return $mysqli->update($query, $parametros);
    }

    public static function delete($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
      delete from file WHERE id = $id
sql;
        return $mysqli->delete($query);
    }

    public static function delete_estudios($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
      delete from estudios_adicionales WHERE id_estudio_adicional = $id
sql;
        return $mysqli->delete($query);
    }

    public static function files($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT filename from file where id = $id
sql;
        return $mysqli->queryAll($query);
    }

    public static function getById($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT
        c.*,
        s.nombre AS status
      FROM catalogo_colaboradores c
      JOIN catalogo_status s
      ON c.status = s.catalogo_status_id
      WHERE c.catalogo_colaboradores_id = $id
sql;
      return $mysqli->queryOne($query);
    }

    public static function getByIdReporte($id){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT
        c.catalogo_colaboradores_id,
        c.clave_noi,
        c.nombre,
        c.apellido_paterno,
        c.apellido_materno,
        s.nombre AS status,
        c.motivo,
        c.sexo,
        c.numero_identificador,
        c.rfc,
        e.nombre AS catalogo_empresa_id,
        u.nombre AS catalogo_ubicacion_id,
        d.nombre AS catalogo_departamento_id,
        p.nombre AS catalogo_puesto_id,
        h.nombre AS catalogo_horario_id,
        c.fecha_alta,
        c.fecha_baja,
        c.foto,
        c.pago,
        c.opcion,
        c.numero_empleado
      FROM catalogo_colaboradores c
      JOIN catalogo_empresa e ON e.catalogo_empresa_id = c.catalogo_empresa_id
      JOIN catalogo_ubicacion u ON u.catalogo_ubicacion_id = c.catalogo_ubicacion_id
      JOIN catalogo_departamento d ON d.catalogo_departamento_id = c.catalogo_departamento_id
      JOIN catalogo_puesto p ON p.catalogo_puesto_id = c.catalogo_puesto_id
      JOIN catalogo_horario h ON h.catalogo_horario_id = c.catalogo_horario_id
      JOIN catalogo_status s ON s.catalogo_status_id = c.status WHERE c.status !=2 AND c.catalogo_colaboradores_id = '$id'
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

    public static function getUbicacionId(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM catalogo_ubicacion
sql;
        return $mysqli->queryAll($query);
    }

    public static function getIdLector(){

   	$mysqli = Database::getInstance();
	$query=<<<sql
SELECT * FROM catalogo_lector WHERE status = 1;
sql;

	return $mysqli->queryAll($query);
    }

    public static function getIdEmpresa(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM catalogo_empresa WHERE status != 2 ORDER BY `catalogo_empresa`.`nombre` ASC
sql;
        return $mysqli->queryAll($query);
    }

    public static function getIdUbicacion(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM catalogo_ubicacion WHERE status != 2  ORDER BY `catalogo_ubicacion`.`nombre` ASC
sql;
        return $mysqli->queryAll($query);
    }

    public static function getIdDepartamento(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM catalogo_departamento WHERE status != 2 ORDER BY `catalogo_departamento`.`nombre` ASC
sql;
      return $mysqli->queryAll($query);
    }

    public static function getIdPuesto(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM catalogo_puesto WHERE status != 2 ORDER BY `catalogo_puesto`.`nombre` ASC
sql;
      return $mysqli->queryAll($query);
    }

    public static function getIdHorario(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM catalogo_horario WHERE status != 2
sql;
      return $mysqli->queryAll($query);
    }

    public static function getIdIncentivo(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM catalogo_incentivo WHERE status != 2
sql;
      return $mysqli->queryAll($query);
    }

    public static function getIdMotivoBaja(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT * FROM catalogo_motivo_baja WHERE status != 2
sql;
      return $mysqli->queryAll($query);
    }

    public static function insertExtraEstudios($estudios){

	  $mysqli = Database::getInstance();
      $query=<<<sql
      INSERT INTO estudios_adicionales
      VALUES (null, $estudios->_id_colaborador, '$estudios->_descripcion', $estudios->_doc);
sql;
      $accion = new \stdClass();
      $accion->_sql= $query;
      $accion->_parametros = $parametros;
      UtileriasLog::addAccion($accion);
      return $mysqli->insert($query);
    }

    public static function insertExtraHijos($hijos){

        $mysqli = Database::getInstance();
        $query=<<<sql
      INSERT INTO numero_hijos
      VALUES (null, $hijos->_id_colaborador, $hijos->_ocupacion, $hijos->_nacimiento, $hijos->_genero);
sql;
        $accion = new \stdClass();
        $accion->_sql= $query;
        $accion->_parametros = $parametros;
        UtileriasLog::addAccion($accion);
        return $mysqli->insert($query);
    }

    public static function getIdentificador(){
      $mysqli = Database::getInstance();
      $query=<<<sql
      SELECT
        distinct identificador
      FROM operacion_noi
sql;
      return $mysqli->queryAll($query);
}

    public static function getOperacionNoi($filtro){
// SELECT t1.* FROM operacion_noi t1 LEFT JOIN catalogo_colaboradores t2 ON t2.clave_noi = t1.clave WHERE t2.clave_noi IS NULL
//        SELECT * FROM operacion_noi $filtro
        $mysqli = Database::getInstance();
/*
        $query=<<<sql
SELECT t1.* FROM operacion_noi t1 LEFT JOIN catalogo_colaboradores t2 ON t2.clave_noi = t1.clave WHERE t1.status != 'B' AND t2.clave_noi IS NULL $filtro ORDER BY t1.ap_pat ASC
sql;
*/
	$query=<<<sql
SELECT t1.* FROM operacion_noi t1 LEFT JOIN catalogo_colaboradores t2 ON (t2.clave_noi = t1.clave AND t1.identificador = t2.identificador_noi) WHERE t1.status != 'B' AND catalogo_colaboradores_id IS NULL $filtro GROUP BY operacion_noi_id ORDER BY `t1`.`nombre` ASC
sql;
        return $mysqli->queryAll($query);
      }

    public static function getColaboradorNombre($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
      SELECT CONCAT(nombre, " ", apellido_paterno, " ", apellido_materno) AS nombre FROM catalogo_colaboradores WHERE catalogo_colaboradores_id = $id
sql;
        return $mysqli->queryAll($query);
    }

    public static function getArchivo($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT *
  FROM tipo_archivo
 WHERE id_archivo NOT IN (SELECT id_archivo
                       FROM FILE WHERE user_id = $id)
sql;
        return $mysqli->queryAll($query);
    }

    public static function getDoc(){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT *
  FROM documento_obtenido
sql;
        return $mysqli->queryAll($query);
    }

    public static function getOcupacion(){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT *
  FROM ocupacion
sql;
        return $mysqli->queryAll($query);
    }

    public static function getGenero(){
        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT *
  FROM genero
sql;
        return $mysqli->queryAll($query);
    }

    public static function getByIdArchivo($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
       SELECT * FROM tipo_archivo WHERE id_archivo = $id

sql;
        return $mysqli->queryOne($query);
    }

    public static function getIngresoProyecto($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
       SELECT * FROM ingreso_proyecto WHERE id_colaborador = $id

sql;
        return $mysqli->queryOne($query);
    }

    public static function getOtrosDatosPersonales($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
       SELECT * FROM otros_datos_personales WHERE catalogo_colaboradores_id = $id

sql;
        return $mysqli->queryOne($query);
    }

    public static function getIncentivoTrimestral($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
       SELECT * FROM incentivo_trimestral WHERE id_colaborador = $id

sql;
        return $mysqli->queryOne($query);
    }

    public static function getAllDiasEconomicos($id){

        $mysqli = Database::getInstance();
        $query=<<<sql
SELECT * FROM dias_economicos_view WHERE id_colaborador = $id ORDER BY nombre ASC

sql;
        return $mysqli->queryOne($query);
    }

      public static function getCatalogoEmpresa($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT cc.catalogo_colaboradores_id, cc.catalogo_empresa_id, ce.catalogo_empresa_id, ce.nombre AS nombre_empresa FROM catalogo_colaboradores AS cc INNER JOIN catalogo_empresa AS ce WHERE cc.catalogo_empresa_id = ce.catalogo_empresa_id AND catalogo_colaboradores_id = $id
sql;
        return $mysqli->queryOne($query);
      }

    public static function getIngresoCuestionario($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM cuestionario_colaborador WHERE id_colaborador = $id AND estatus = 1
sql;
        return $mysqli->queryOne($query);
    }

      public static function getCatalogoUbicacion($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT cc.catalogo_colaboradores_id, cc.catalogo_ubicacion_id, cu.catalogo_ubicacion_id, cu.nombre FROM catalogo_colaboradores AS cc INNER JOIN catalogo_ubicacion AS cu WHERE cc.catalogo_colaboradores_id = $id AND cc.catalogo_ubicacion_id = cu.catalogo_ubicacion_id
sql;
        return $mysqli->queryOne($query);
      }

      public static function getCatalogoDepartamento($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT cc.catalogo_colaboradores_id, cc.catalogo_departamento_id, cd.catalogo_departamento_id, cd.nombre FROM catalogo_colaboradores AS cc INNER JOIN catalogo_departamento AS cd WHERE cc.catalogo_colaboradores_id = $id AND cc.catalogo_departamento_id = cd.catalogo_departamento_id
sql;
        return $mysqli->queryOne($query);
      }

      public static function getCatalogoLector($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT cc.catalogo_colaboradores_id, cc.catalogo_lector_id, cd.catalogo_lector_id, cd.nombre FROM catalogo_colaboradores AS cc INNER JOIN catalogo_lector AS cd WHERE cc.catalogo_colaboradores_id = $id AND cc.catalogo_lector_id = cd.catalogo_lector_id
sql;
        return $mysqli->queryOne($query);
      }

      public static function getCatalogoPuesto($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT cc.catalogo_colaboradores_id, cc.catalogo_puesto_id,  cd.catalogo_puesto_id, cd.nombre FROM catalogo_colaboradores AS cc INNER JOIN catalogo_puesto AS cd WHERE cc.catalogo_colaboradores_id = $id AND cc.catalogo_puesto_id = cd.catalogo_puesto_id
sql;
        return $mysqli->queryOne($query);
      }

      public static function getIncentivosColaborador($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT ic.catalogo_colaboradores_id, ic.cantidad, cc.catalogo_colaboradores_id, ci.nombre FROM incentivo_colaborador AS ic INNER JOIN catalogo_colaboradores AS cc ON ic.catalogo_colaboradores_id = cc.catalogo_colaboradores_id INNER JOIN catalogo_incentivo AS ci ON ci.catalogo_incentivo_id = ic.catalogo_incentivo_id WHERE cc.catalogo_colaboradores_id = $id
sql;
        return $mysqli->queryAll($query);
      }

      public static function getStatusColaborador($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT cc.status, cs.nombre FROM catalogo_colaboradores cc JOIN catalogo_status cs WHERE cc.catalogo_colaboradores_id = $id AND cc.status = cs.catalogo_status_id
sql;
        return $mysqli->queryOne($query);
      }

    public static function getStatusUltimoCurso($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT ca.id_colaborador, c.nombre_curso, c.fecha 
        FROM capacitaciones_asistentes ca
        INNER JOIN capacitaciones c ON ca.id_capacitacion = c.id_capacitacion
        WHERE ca.id_colaborador = $id ORDER BY fecha DESC LIMIT 1    
sql;
        return $mysqli->queryOne($query);
    }
    public static function getPorcentajeAsistencia($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
       SELECT (SELECT COUNT(*)
        FROM capacitaciones_asistentes ca
        INNER JOIN capacitaciones c ON ca.id_capacitacion = c.id_capacitacion
        WHERE ca.id_colaborador = $id AND c.fecha <= CURDATE() AND asistencia = 1) AS asistencias,
        
        (SELECT COUNT(*)
        FROM capacitaciones_asistentes ca
        INNER JOIN capacitaciones c ON ca.id_capacitacion = c.id_capacitacion
        WHERE ca.id_colaborador = $id AND c.fecha <= CURDATE() AND asistencia = 0) AS faltas, 
        
        (SELECT COUNT(*)
        FROM capacitaciones_asistentes ca
        INNER JOIN capacitaciones c ON ca.id_capacitacion = c.id_capacitacion
        WHERE ca.id_colaborador = $id AND c.fecha <= CURDATE()) AS total_cursos,
        
        (SELECT COUNT(*)
        FROM capacitaciones_asistentes ca
        INNER JOIN capacitaciones c ON ca.id_capacitacion = c.id_capacitacion
        WHERE ca.id_colaborador = $id AND c.fecha <= CURDATE() AND asistencia = 1)
        
        /(SELECT COUNT(*)
        FROM capacitaciones_asistentes ca
        INNER JOIN capacitaciones c ON ca.id_capacitacion = c.id_capacitacion
        WHERE ca.id_colaborador = $id AND c.fecha <= CURDATE()) * 100 AS porcentaje   
sql;
        return $mysqli->queryOne($query);
    }
      public static function getMotivoById($id){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT * FROM catalogo_motivo_baja where catalogo_motivo_baja_id = $id
sql;
        return $mysqli->queryOne($query);
      }

      public static function getNominaIdentificador(){
        $mysqli = Database::getInstance();
        $query=<<<sql
        SELECT identificador_noi FROM catalogo_colaboradores GROUP BY identificador_noi 
sql;
        return $mysqli->queryAll($query);
      }
    public static function insert_documento($documento){
        $mysqli = Database::getInstance();
        $query=<<<sql
      INSERT INTO file
      VALUES (NULL, :title, :filename, :description, :id_archivo ,:user_id , :fecha);
sql;
        $parametros = array(
            ':title' => $documento->_titulo,
            ':filename' => $documento->_url,
            ':description' => $documento->_descripcion,
            ':id_archivo' => $documento->_id_archivo,
            ':user_id' => $documento->_id_c,
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
