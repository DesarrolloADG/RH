<?php
namespace App\controllers;
//defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\RegistroCapacitaciones AS RegistroDao;
use \App\models\General AS GeneralDao;

class RegistroCapacitaciones extends Controller{

  private $_contenedor;

  function __construct(){
    parent::__construct();
    $this->_contenedor = new Contenedor;
    View::set('header',$this->_contenedor->header());
    View::set('footer',$this->_contenedor->footer());
  }

    public function index() {
        $extraFooter =<<<html
      <script>
    
        $(document).ready(function(){
            $("#muestra-cupones").tablesorter();
          var oTable = $('#muestra-cupones').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-cupones input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

            var checkAll = 0;
            $("#checkAll").click(function () {
              if(checkAll==0){
                $("input:checkbox").prop('checked', true);
                checkAll = 1;
              }else{
                $("input:checkbox").prop('checked', false);
                checkAll = 0;
              }

            });

            $("#export_pdf").click(function(){
              $('#all').attr('action', '/Economicos/generarPDF/');
              $('#all').attr('target', '_blank');
              $("#all").submit();
            });

            $("#export_excel").click(function(){
              $('#all').attr('action', '/Economicos/generarExcel/');
              $('#all').attr('target', '_blank');
              $("#all").submit();
            });

       
        });
      </script>
html;
        $usuario = $this->__usuario;
        $registro = RegistroDao::getAll();
        $editarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 5)==1)?  "" : "style=\"display:none;\"";
        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 6)==1)? "" : "style=\"display:none;\"";
        $tabla= '';
        foreach ($registro as $key => $value) {

            $fechamovimiento =  date('Y-m-d');
            $estatus = "";
            if($fechamovimiento >= $value['fecha'])
            {
                $estatus = 'Capacitación Finalizada';
                $asistencia = <<<html
                        <a href="/RegistroCapacitaciones/Asistencia/{$value['id_capacitacion']}" {$editarHidden} type="submit" name="id" class="btn btn-warning"><span class="fa fa-check-circle" style="color:white"></span> </a>
html;
            }
            if($fechamovimiento <= $value['fecha']  )
            {
                $estatus = 'Capacitación Pendiente';
                $asistencia = <<<html
                        <a class="btn btn-warning" disabled><span class="fa fa-check-circle" style="color:white"></span> </a>
html;

            }

            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_capacitacion']}"/></td>
                    <td>{$value['nombre_curso']}</td>
                    <td>{$value['duracion']} hora(s) de capacitación</td>
                    <td>{$value['horas_cubrir']} hora(s) programadas</td>
                    <td>{$value['nombre_expositor']}</td>
                    <td>{$value['fecha']}</td>
                    <td>{$value['planta']}</td>
                    <td>{$value['grupo']}</td>
                    <td>$estatus</td>
                    <td class="center" >
                        <a href="/RegistroCapacitaciones/Edit/{$value['id_capacitacion']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                        <a href="/RegistroCapacitaciones/Show/{$value['id_capacitacion']}" type="submit" name="id_capacitacion" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> </a>
                        <a href="/RegistroCapacitaciones/Asistentes/{$value['id_capacitacion']}" type="submit" name="id_capacitacion" class="btn btn-primary"><span class="glyphicon glyphicon-plus-sign" style="color:white"></span> Asistente</a>
                    </td>
                    <td class="center" >
                        $asistencia;
                    </td>
                </tr>
html;
        }

        $pdfHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 2)==1)?  "" : "style=\"display:none;\"";
        $excelHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 3)==1)? "" : "style=\"display:none;\"";
        $agregarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 4)==1)? "" : "style=\"display:none;\"";
        View::set('pdfHidden',$pdfHidden);
        View::set('excelHidden',$excelHidden);
        View::set('agregarHidden',$agregarHidden);
        View::set('editarHidden',$editarHidden);
        View::set('eliminarHidden',$eliminarHidden);
        View::set('tabla',$tabla);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("registro_all");
    }

    public function getColaboradorNombre(){
        $colaborador = '';
        foreach (RegistroDao::getColaboradorNombre() as $key => $value) {
            $colaborador .=<<<html
        <option value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }
        return $colaborador;
    }

    public function getLugarPlanta(){
        $idLugarPlanta = '';
        foreach (RegistroDao::getLugarPlanta() as $key => $value) {
            $idLugarPlanta .=<<<html
        <option value="{$value['catalogo_planta_id']}">{$value['nombre']}</option>
html;
        }
        return $idLugarPlanta;
    }

    public function getPuesto(){
        $idPuesto = '';
        foreach (RegistroDao::getPuesto() as $key => $value) {
            $idPuesto .=<<<html
        <option value="{$value['id_puesto']}">{$value['descripcion']}</option>
html;
        }
        return $idPuesto;
    }

    public function getCalsificacionAccidente(){
        $clasificacion = '';
        foreach (RegistroDao::getClasificacionrAccidente() as $key => $value) {
            $clasificacion .=<<<html
        <option value="{$value['id_clasificacion_accidente']}">{$value['detalle']}</option>
html;
        }
        return $clasificacion;
    }

    public function Asistentes($id){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){
          $("#add").validate({
            rules:{
              nombre_colaborador:{
                required: true
              }
            },
            messages:{
              nombre_colaborador:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate
       

          $("#btnCancel").click(function(){
            window.location.href = "/RegistroCapacitaciones/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;

        $contador = RegistroDao::getContador($id);
        $personal = RegistroDao::getAllPersonal($id);
        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 6)==1)? "" : "style=\"display:none;\"";
        $tabla= '';
        foreach ($personal as $key => $value) {

            if($value['planta'] == '')
            {
                $planta = 'ADMINISTRATIVOS';
            }
            else{
                $planta = $value['planta'];
            }

            $delete = $value['id_capacitaciones_asistentes'];
            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_capacitaciones_asistentes']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>$planta</td>
                    <td>{$value['puesto']}</td>
                     <td style="text-align:center; vertical-align:middle;">
                            <button class="btn btn-danger" type="button" id="button" onclick="gt_1($delete)"><span class="fa fa-trash" style="color:white"></button>
                      </td>
                </tr>
html;
        }

        $registro = RegistroDao::getAllIDCombos($id);
        $registro_id = RegistroDao::getAllID($id);
        $colaborador_ = '';
        foreach ($registro as $key => $value) {

            if($value['grupo'] == 'ADMINISTRATIVOS')
            {
                foreach (RegistroDao::getColaboradorNombreAdministrativo($id) as $key => $value) {
                    $colaborador_ .=<<<html
        <option value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
                }
            }
            if($value['grupo'] == 'OPERATIVOS')
            {
                foreach (RegistroDao::getColaboradorNombreProduccion($id) as $key => $value) {
                    $colaborador_ .=<<<html
        <option value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
                }
            }
            if($value['grupo'] == 'ADMINISTRATIVOS / OPERATIVOS')
            {
                foreach (RegistroDao::getColaboradorNombre($id) as $key => $value) {
                    $colaborador_ .=<<<html
                <option value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
                }
            }

        }

        $clave = $id;
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::set('idColaborador',$colaborador_);
        View::set('idLugarPlanta',$this->getLugarPlanta());
        View::set('idPuesto',$this->getPuesto());
        View::set('clave',$clave);
        View::set('tabla',$tabla);
        View::set('contador',$contador);
        View::set('registro_id',$registro_id);
        View::set('idClasificacion',$this->getCalsificacionAccidente());
        View::render("registro_participante");
    }

    public function add(){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){
          $("#add").validate({
            rules:{
              nombre_colaborador:{
                required: true
              },
              fecha:{
                required: true
              },
              trimestre:{
                required: true
              },
              lugar:{
                required: true
              },
	           clasificacion:{
                required: true
              },
              detalle:{
                required: true
              },
              causa:{
                required: true
              },
              acto:{
                required: true
              },
              condicion:{
                required: true
              }
            },
            messages:{
              nombre_colaborador:{
                required: "Este campo es requerido"
              },
             fecha:{
                required: "Este campo es requerido"
              },
              trimestre:{
                required: "Este campo es requerido"
              },
               lugar:{
                required: "Este campo es requerido"
              },
              clasificacion:{
                required: "Este campo es requerido"
              },
              detalle:{
                required: "Este campo es requerido"
              },
               causa:{
                required: "Este campo es requerido"
              },
              acto:{
                required: "Este campo es requerido"
              },
	            condicion:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate
       

          $("#btnCancel").click(function(){
            window.location.href = "/RegistroCapacitaciones/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;

        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::set('idColaborador',$this->getColaboradorNombre());
        View::set('idLugarPlanta',$this->getLugarPlanta());
        View::set('idPuesto',$this->getPuesto());
        View::set('idClasificacion',$this->getCalsificacionAccidente());
        View::render("registro_add");
    }

    public function ParticipanteAdd(){
        $participante = new \stdClass();

        $fechamovimiento =  date('Y-m-d H:i:s');

        $participante->_id_capacitacion = MasterDom::getData('id_capacitacion');
        $participante->_id_colaborador = MasterDom::getData('nombre_colaborador');
        $participante->_fecha = $fechamovimiento;

        $id = RegistroDao::insertparticipantes($participante);
        if ($id) {
            echo 'success';

        } else {
            echo 'fail';
        }
    }

    public function ParticipanteAddAsistencia(){
        $participante = MasterDom::getData('nombre_colaborador');

        $id = RegistroDao::AsistenciaParticipantesUpdate($participante);
        if ($id) {
            echo 'fail';

        } else {
            echo 'success';
        }
    }

    public function RegistroAdd(){
        $registro = new \stdClass();
        //$incapacidad = new \stdClass();


        $nombre_curso = MasterDom::getDataAll("nom_cur");
        $nombre_curso = MasterDom::procesoAcentosNormal(("$nombre_curso"));
        $registro->_nombre_curso = $nombre_curso;

        $nombre_expo = MasterDom::getDataAll("nom_exp");
        $nombre_expo = MasterDom::procesoAcentosNormal("$nombre_expo");
        $registro->_nombre_expo = $nombre_expo;

        $registro->_fecha = MasterDom::getData('fecha');
        $registro->_lugar = MasterDom::getData('lugar');
        $registro->_puesto = MasterDom::getData('puesto');
        $registro->_duracion = MasterDom::getData('duracion');
        $registro->_horas = MasterDom::getData('horas');


        $id = RegistroDao::insert($registro);

        if($id >= 1 )
        {
            $this->alerta($id,'add');
        }
        else
        {
            $this->alerta($id,'error');
        }
    }

    public function Delete(){

        $dato = RegistroDao::delete($_POST['a']);
        if($dato == 1){
            echo "true";
        }else{
            echo "false";
        }
    }

    public function DeleteAsistencia(){

        $dato = RegistroDao::deleteAsistencia($_POST['a']);
        if($dato == 1){
            echo "true";
        }else{
            echo "false";
        }
    }

    public function Asistencia($id){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){

          $("#btnCancel").click(function(){
            window.location.href = "/RegistroCapacitaciones/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;

        $sColaboradorAsistencia = "";
        foreach (RegistroDao::getColaboradorAsistecia($id) as $key => $value) {
            $selected = ($value['id_capacitaciones_asistentes']==$value['nombre'])? 'selected' : '';
            $sColaboradorAsistencia .=<<<html
        <option {$selected} value="{$value['id_capacitaciones_asistentes']}">{$value['nombre']}</option>
html;
        }
        $registro_id = RegistroDao::getAllID($id);
        $personal = RegistroDao::getAllPersonalAsistencias($id);
        $contador = RegistroDao::getContador($id);
        $contador_asistentes = RegistroDao::getContadorAsistentes($id);

        $horas_cubiertas = $registro_id['duracion'] * $contador_asistentes['contador'];

        $estatus = "";
        if($horas_cubiertas == $registro_id['horas_cubrir'])
        {
            $estatus .=<<<html

            <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-check-circle-o"></i> Estatus</span>
            <div class="count align-center"><i class="fa fa-check-circle-o " style="color:green"></i></div>
            <span class="count_bottom"><i class="green"> Completa</i></span>
            </div>
            
html;
        }
        else
        {
            if($horas_cubiertas >= $registro_id['horas_cubrir'])
            {
                $estatus .=<<<html

            <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-check-circle-o"></i> Estatus</span>
            <div class="count align-center"><i class="fa fa-check-circle-o " style="color:blue"></i></div>
            <span class="count_bottom"><i class="green"> Sobrepasa</i></span>
            </div>
            
html;
            }
            else
            {
                if($horas_cubiertas <= $registro_id['horas_cubrir'])
                {
                    $estatus .=<<<html

            <div class="col-md-2 col-sm-4  tile_stats_count">
            <span class="count_top"><i class="fa fa-check-circle-o"></i> Estatus</span>
            <div class="count align-center"><i class="fa fa-check-circle-o " style="color:darkred"></i></div>
            <span class="count_bottom"><i class="green"> Incompleto</i></span>
            </div>
            
html;
                }
            }
        }




        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 6)==1)? "" : "style=\"display:none;\"";
        $tabla= '';
        foreach ($personal as $key => $value) {

            if($value['planta'] == '')
            {
                $planta = 'ADMINISTRATIVOS';
            }
            else{
                $planta = $value['planta'];
            }

            $delete = $value['id_capacitaciones_asistentes'];
            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_capacitaciones_asistentes']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>$planta</td>
                    <td>{$value['puesto']}</td>
                     <td style="text-align:center; vertical-align:middle;">
                            <button class="btn btn-danger" type="button" id="button" onclick="gt_1($delete)"><span class="fa fa-trash" style="color:white"></button>
                      </td>
                </tr>
html;
        }

        $clave = $id;
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::set('sColaboradorAsistencia',$sColaboradorAsistencia);
        View::set('tabla',$tabla);
        View::set('clave',$clave);
        View::set('contador',$contador);
        View::set('estatus',$estatus);
        View::set('contador_asistentes',$contador_asistentes);
        View::set('horas_cubiertas',$horas_cubiertas);
        View::set('registro_id',$registro_id);
        View::render("asistencia_all");
    }

    public function edit($id){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){

          $("#edit").validate({
            rules:{
              nombre_colaborador:{
                required: true
              },
              fecha:{
                required: true
              },
              trimestre:{
                required: true
              },
              lugar:{
                required: true
              },
	           clasificacion:{
                required: true
              },
              detalle:{
                required: true
              },
              causa:{
                required: true
              },
              acto:{
                required: true
              },
              condicion:{
                required: true
              }
            },
            messages:{
              nombre_colaborador:{
                required: "Este campo es requerido"
              },
             fecha:{
                required: "Este campo es requerido"
              },
              trimestre:{
                required: "Este campo es requerido"
              },
               lugar:{
                required: "Este campo es requerido"
              },
              clasificacion:{
                required: "Este campo es requerido"
              },
              detalle:{
                required: "Este campo es requerido"
              },
               causa:{
                required: "Este campo es requerido"
              },
              acto:{
                required: "Este campo es requerido"
              },
	            condicion:{
                required: "Este campo es requerido"
              }
            }
          });//fin del jquery validate

          $("#btnCancel").click(function(){
            window.location.href = "/RegistroCapacitaciones/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;
        $registro = RegistroDao::getById($id);


        $sLugarPlanta = "";
        foreach (RegistroDao::getLugarPlanta() as $key => $value) {
            $selected = ($registro['catalogo_planta_id']==$value['catalogo_planta_id'])? 'selected' : '';
            $sLugarPlanta .=<<<html
        <option {$selected} value="{$value['catalogo_planta_id']}">{$value['nombre']}</option>
html;
        }

        $sPuesto = "";
        foreach (RegistroDao::getPuesto() as $key => $value) {
            $selected = ($registro['id_puesto']==$value['id_puesto'])? 'selected' : '';
            $sPuesto .=<<<html
        <option {$selected} value="{$value['id_puesto']}">{$value['descripcion']}</option>
html;
        }


        View::set('registro',$registro);
        View::set('sLugarPlanta',$sLugarPlanta);
        View::set('sPuesto',$sPuesto);
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("registro_edit");
    }

    public function RegistroCapacitacionesEdit(){
        $registro = new \stdClass();

        $registro->_id_capacitacion = MasterDom::getData('id_capacitacion');

        $nombre_curso = MasterDom::getDataAll("nombre_curso");
        $nombre_curso = MasterDom::procesoAcentosNormal(("$nombre_curso"));
        $registro->_nombre_curso = $nombre_curso;


        $nombre_expositor = MasterDom::getDataAll("nombre_expositor");
        $nombre_expositor = MasterDom::procesoAcentosNormal("$nombre_expositor");
        $registro->_nombre_expositor = $nombre_expositor;

        $registro->_fecha = MasterDom::getData('fecha');

        $fecha = MasterDom::getData('fecha');
        $fechaEntera = strtotime($fecha);
        $mes = date("m", $fechaEntera);



        $registro->_lugar = MasterDom::getData('lugar');

        $registro->_persona = MasterDom::getData('persona');

        $id = RegistroDao::update($registro);
        if($id >= 1)
            $this->alerta($id,'edit');
        else
            $this->alerta($id,'nothing');

    }

    public function show($id){
        $extraFooter =<<<html
      <script>
        $(document).ready(function(){
          $("#btnCancel").click(function(){
            window.location.href = "/RegistroCapacitaciones/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;
        $registro = registroDao::getById($id);

        $sColaborador = "";
        foreach (RegisttroDao::getColaboradorNombre() as $key => $value) {
            $selected = ($registro['catalogo_colaboradores_id']==$value['catalogo_colaboradores_id'])? 'selected' : '';
            $sColaborador .=<<<html
        <option {$selected} value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }
        $sClasificacion = "";
        foreach (AccidentesDao::getClasificacionrAccidente() as $key => $value) {
            $selected = ($accidente['id_clasificacion_accidente']==$value['id_clasificacion_accidente'])? 'selected' : '';
            $sClasificacion .=<<<html
        <option {$selected} value="{$value['id_clasificacion_accidente']}">{$value['detalle']}</option>
html;
        }
        $sLugar = "";
        foreach (AccidentesDao::getLugarAccidente() as $key => $value) {
            $selected = ($accidente['id_lugar_accidente']==$value['id_lugar_accidente'])? 'selected' : '';
            $sLugar .=<<<html
        <option {$selected} value="{$value['id_lugar_accidente']}">{$value['detalle']}</option>
html;
        }

        View::set('sColaborador',$sColaborador);
        View::set('sClasificacion',$sClasificacion);
        View::set('sLugar',$sLugar);
        View::set('accidente',$accidente);
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("registro_show");
    }

    public function alerta($id, $parametro){
        $regreso = "/RegistroCapacitaciones/";

        if($parametro == 'add'){
            $mensaje = "Se ha agregado correctamente";
            $class = "success";
        }

        if($parametro == 'edit'){
            $mensaje = "Se ha modificado correctamente";
            $class = "success";
        }

        if($parametro == 'delete'){
            $mensaje = "Se ha eliminado la empresa {$id}, ya que cambiaste el estatus a eliminado";
            $class = "success";
        }

        if($parametro == 'nothing'){
            $mensaje = "Posibles errores: <li>No intentaste actualizar ningún campo</li> <li>Este dato ya esta registrado, comunicate con soporte técnico</li> ";
            $class = "warning";
        }

        if($parametro == 'no_cambios'){
            $mensaje = "No intentaste actualizar ningún campo";
            $class = "warning";
        }

        if($parametro == 'union'){
            $mensaje = "Al parecer este campo de está ha sido enlazada con un campo de Catálogo de Colaboradores, ya que esta usuando esta información";
            $class = "info";
        }

        if($parametro == "error"){
            $mensaje = "Al parecer ha ocurrido un problema";
            $class = "danger";
        }


        View::set('class',$class);
        View::set('regreso',$regreso);
        View::set('mensaje',$mensaje);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("alerta");
    }
}
