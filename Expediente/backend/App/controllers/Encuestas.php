<?php
namespace App\controllers;
//defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\EncuestasRH AS EncuestasDao;

class Encuestas extends Controller{

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
            
            $("#muestra-cupones-ingreso").tablesorter();
          var oTable = $('#muestra-cupones-ingreso').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-cupones-ingreso input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

            var checkAll = 0;
            $("#checkAllIngreso").click(function () {
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
        $encuestas = EncuestasDao::getAll();
        $tabla= '';
        foreach ($encuestas as $key => $value) {
            $estatus = $value['activo_incapacidad'];
            if($estatus == 0)
            {
                $estatus = "SIN INCAPACIDAD";
            }
            if($estatus == 1)
            {
                $estatus = "INCAPACIDAD ACTIVA";
            }
            $tabla.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_cuestionario_activo']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_inicio']}</td>
                    <td>{$value['fecha_fin']}</td>
                    <td>{$value['fecha_activacion']}</td>
                    <td>{$value['trimestre']}</td>
                    <td>{$value['estatus']}</td>
                    <td class="center" >
                        <a href="/Encuestas/Edit/{$value['id_cuestionario_activo']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                        <a href="/Encuestas/EvaluadosComunicacionOrganizacional/{$value['id_cuestionario_activo']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-user" style="color:white"></span> </a>
                    </td>
                </tr>
html;
        }

        $encuestas_comunicacion_organizacional = EncuestasDao::getAllComunicacionOrganizacional();
        $tabla_comunicacion_organizacional= '';
        foreach ($encuestas_comunicacion_organizacional as $key => $value) {
            $estatus = $value['activo_incapacidad'];
            if($estatus == 0)
            {
                $estatus = "SIN INCAPACIDAD";
            }
            if($estatus == 1)
            {
                $estatus = "INCAPACIDAD ACTIVA";
            }
            $tabla_comunicacion_organizacional.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_cuestionario_activo']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_inicio']}</td>
                    <td>{$value['fecha_fin']}</td>
                    <td>{$value['fecha_activacion']}</td>
                    <td>{$value['trimestre']}</td>
                    <td>{$value['estatus']}</td>
                    <td class="center" >
                        <a href="/Encuestas/Edit/{$value['id_cuestionario_activo']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                        <a href="/Encuestas/EvaluadosComunicacionOrganizacional/{$value['id_cuestionario_activo']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-user" style="color:white"></span> </a>
                    </td>
                </tr>
html;
        }

        $encuestas_comunicacion = EncuestasDao::getAllComunicacion();
        $tabla_comunicacion= '';
        foreach ($encuestas_comunicacion as $key => $value) {
            $estatus = $value['activo_incapacidad'];
            if($estatus == 0)
            {
                $estatus = "SIN INCAPACIDAD";
            }
            if($estatus == 1)
            {
                $estatus = "INCAPACIDAD ACTIVA";
            }
            $tabla_comunicacion.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_cuestionario_activo']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_inicio']}</td>
                    <td>{$value['fecha_fin']}</td>
                    <td>{$value['fecha_activacion']}</td>
                    <td>{$value['trimestre']}</td>
                    <td>{$value['estatus']}</td>
                    <td class="center" >
                        <a href="/Encuestas/Edit/{$value['id_cuestionario_activo']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                        <a href="/Encuestas/EvaluadosComunicacionOrganizacional/{$value['id_cuestionario_activo']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-user" style="color:white"></span> </a>
                    </td>
                </tr>
html;
        }

        $encuestas_clima_laboral = EncuestasDao::getAllClimaLaboral();
        $tabla_clima_laboral= '';
        foreach ($encuestas_clima_laboral as $key => $value) {
            $estatus = $value['activo_incapacidad'];
            if($estatus == 0)
            {
                $estatus = "SIN INCAPACIDAD";
            }
            if($estatus == 1)
            {
                $estatus = "INCAPACIDAD ACTIVA";
            }
            $tabla_clima_laboral.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_cuestionario_activo']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_inicio']}</td>
                    <td>{$value['fecha_fin']}</td>
                    <td>{$value['fecha_activacion']}</td>
                    <td>{$value['trimestre']}</td>
                    <td>{$value['estatus']}</td>
                    <td class="center" >
                        <a href="/Encuestas/Edit/{$value['id_cuestionario_activo']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                        <a href="/Encuestas/Evaluados/{$value['id_cuestionario_activo']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-user" style="color:white"></span> </a>
                    </td>
                </tr>
html;
        }

        $encuestas_comunicacion_organizacional = EncuestasDao::getAllComunicacionOrganizacional();
        $tabla_comunicacion_organizacional= '';
        foreach ($encuestas_comunicacion_organizacional as $key => $value) {
            $estatus = $value['activo_incapacidad'];
            if($estatus == 0)
            {
                $estatus = "SIN INCAPACIDAD";
            }
            if($estatus == 1)
            {
                $estatus = "INCAPACIDAD ACTIVA";
            }
            $tabla_comunicacion_organizacional.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_cuestionario_activo']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_inicio']}</td>
                    <td>{$value['fecha_fin']}</td>
                    <td>{$value['fecha_activacion']}</td>
                    <td>{$value['trimestre']}</td>
                    <td>{$value['estatus']}</td>
                    <td class="center" >
                        <a href="/Encuestas/Edit/{$value['id_cuestionario_activo']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                        <a href="/Encuestas/Evaluados/{$value['id_cuestionario_activo']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-user" style="color:white"></span> </a>
                    </td>
                </tr>
html;
        }

        $encuestas_ingreso = EncuestasDao::getAllIngreso();
        $tablaIngreso= '';
        foreach ($encuestas_ingreso as $key => $value) {
            $estatus = $value['resuelto'];
            $acc = "";
            if($estatus == 0)
            {
                $estatus = "SIN RESPONDER";
                $acc = <<<html
                        <a href="/Encuestas/Ingreso/{$value['id_cuestionario_activo']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> *RH </a>
html;
            }
            if($estatus == 1)
            {
                $estatus = "REGISTRO EXITOSO";
                $acc = <<<html
                        <a href="/Encuestas/Show/{$value['id_accidente']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> VER </a>
html;
            }
            $tablaIngreso.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_cuestionario_colaborador']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_alta']}</td>
                    <td>$estatus</td>
                    <td class="center" >
                    $acc
                    </td>
                </tr>
html;
        }

        $encuestas_salida = EncuestasDao::getAllSalida();
        $tablaSalida= '';
        foreach ($encuestas_salida as $key => $value) {
            $estatus = $value['resuelto'];
            $acc = "";
            if($estatus == 0)
            {
                $estatus = "SIN RESPONDER";
                $acc = <<<html
                        <a href="/Encuestas/Salida/{$value['id_cuestionario_activo']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> *RH </a>
html;
            }
            if($estatus == 1)
            {
                $estatus = "REGISTRO EXITOSO";
                $acc = <<<html
                        <a href="/Encuestas/Show/{$value['id_accidente']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> VER </a>
html;
            }
            $tablaSalida.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_cuestionario_colaborador']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_baja']}</td>
                    <td>$estatus</td>
                    <td class="center" >
                    $acc
                    </td>
                </tr>
html;
        }

        $encuestas_induccion = EncuestasDao::getAllInduccion();
        $tablaInduccion= '';
        foreach ($encuestas_induccion as $key => $value) {
            $estatus = $value['resuelto'];
            $acc = "";
            if($estatus == 0)
            {
                $estatus = "SIN RESPONDER";
                $acc = <<<html
                        <a href="/Encuestas/Induccion/{$value['id_cuestionario_activo']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> *RH </a>
html;
            }
            if($estatus == 1)
            {
                $estatus = "REGISTRO EXITOSO";
                $acc = <<<html
                        <a href="/Encuestas/Show/{$value['id_accidente']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> VER </a>
html;
            }
            $tablaInduccion.=<<<html
                <tr>
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_cuestionario_colaborador']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_baja']}</td>
                    <td>$estatus</td>
                    <td class="center" >
                    $acc
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
        View::set('tabla_comunicacion_organizacional',$tabla_comunicacion_organizacional);
        View::set('tablaIngreso',$tablaIngreso);
        View::set('tabla_comunicacion',$tabla_comunicacion);
        View::set('tabla_clima_laboral',$tabla_clima_laboral);
        View::set('tablaSalida',$tablaSalida);
        View::set('tablaInduccion',$tablaInduccion);
        View::set('header',$this->_contenedor->header($extraHeader));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("encuestas_all");
    }

    public function getEncuesta(){
        $tipo_encuesta = '';
        foreach (EncuestasDao::getTipoEncuesta() as $key => $value) {
            $tipo_encuesta .=<<<html
        <option value="{$value['id_cuestionario']}">{$value['nombre']}</option>
html;
        }
        return $tipo_encuesta;
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
            window.location.href = "/Accidentes/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;

        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::set('idEncuesta',$this->getEncuesta());
        View::render("encuestas_add");
    }

    public function EncuestasAdd(){
        $encuestas = new \stdClass();

        $fechamovimiento =  date('Y-m-d H:i:s');
        $fechaEntera = strtotime($fechamovimiento);
        $mes = date("m", $fechaEntera);

        if($mes == '1')
        {
            $encuestas->_trimestre = 1;
        }
        if($mes == '2')
        {
            $encuestas->_trimestre = 1;
        }
        if($mes == '3')
        {
            $encuestas->_trimestre = 1;
        }
        if($mes == '4')
        {
            $encuestas->_trimestre = 2;
        }
        if($mes == '5')
        {
            $encuestas->_trimestre = 2;
        }
        if($mes == '6')
        {
            $encuestas->_trimestre = 2;
        }
        if($mes == '7')
        {
            $encuestas->_trimestre = 3;
        }
        if($mes == '8')
        {
            $encuestas->_trimestre = 3;
        }
        if($mes == '9')
        {
            $encuestas->_trimestre = 3;
        }
        if($mes == '10')
        {
            $encuestas->_trimestre = 4;
        }
        if($mes == '11')
        {
            $encuestas->_trimestre = 4;
        }
        if($mes == '12')
        {
            $encuestas->_trimestre = 4;
        }
        $encuestas->_tipo_encuesta = MasterDom::getData('tipo_encuesta');
        $encuestas->_fecha_inicio = MasterDom::getData('fecha_inicio');
        $encuestas->_fecha_final = MasterDom::getData('fecha_final');
        $encuestas->_fecha_activacion = $fechamovimiento;

            $id = EncuestasDao::insertEncuestas($encuestas);
            if($id >= 1 )
            {
                $this->alerta($id,'add');
            }
            else
            {
                $this->alerta($id,'error');
            }


    }

    public function EncuestasComunicacionOrganizacionalAdd(){
        $encuestas = new \stdClass();

        $encuestas->_nombre_colaborador = MasterDom::getData('nombre_colaborador');
        $encuestas->_id_encuesta = MasterDom::getData('id_encuesta');

        $id = EncuestasDao::insertEncuestasComunicacionOrganizacional($encuestas);
        if ($id) {
            echo 'fail';

        } else {
            echo 'success';
        }
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
            window.location.href = "/Encuestas/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;
        $encuestas_1 = EncuestasDao::getById($id);

        $sTipoEncuesta = "";
        foreach (EncuestasDao::getTipoEncuesta() as $key => $value) {
            $selected = ($encuestas_1['id_cuestionario']==$value['id_cuestionario'])? 'selected' : '';
            $sTipoEncuesta .=<<<html
        <option {$selected} value="{$value['id_cuestionario']}">{$value['nombre']}</option>
html;
        }

        View::set('sTipoEncuesta',$sTipoEncuesta);
        View::set('$encuestas_1',$encuestas_1);
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::render("encuestas_edit");
    }

    public function Ingreso($id){
        $extraFooter =<<<html

html;
        $encuesta = $id;
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::set('encuesta', $encuesta);
        View::render("ingreso_add");
    }

    public function EvaluadosComunicacionOrganizacional($id){
        $extraFooter =<<<html

html;
        $id_encuesta = $id;
        $colaborador_ = '';
        foreach (EncuestasDao::getColaboradorNombre($id) as $key => $value) {
            $colaborador_ .=<<<html
                <option value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }

        $encuesta = $id;
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::set('encuesta', $encuesta);
        View::set('id_encuesta', $id_encuesta);
        View::set('idColaborador',$colaborador_);
        View::render("registro_evaluados_comunicacion_organizacional");
    }

    public function Induccion($id){
        $extraFooter =<<<html

html;
        $encuesta = $id;
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::set('encuesta', $encuesta);
        View::render("induccion_add");
    }

    public function IngresoAdd(){
        $ingreso = new \stdClass();
        $ingreso->_id = MasterDom::getData('id');
        $ingreso->_uno = MasterDom::getData('uno');
        $ingreso->_dos = MasterDom::getData('dos');
        $ingreso->_tres = MasterDom::getData('tres');
        $ingreso->_cuatro = MasterDom::getData('cuatro');
        $ingreso->_cinco = MasterDom::getData('cinco');
        $ingreso->_seis = MasterDom::getData('seis');
        $ingreso->_siete = MasterDom::getData('siete');
        $ingreso->_ocho = MasterDom::getData('ocho');
        $ingreso->_nueve = MasterDom::getData('nueve');
        $ingreso->_diez = MasterDom::getData('diez');
        $ingreso->_once = MasterDom::getData('once');
        $ingreso->_nombre = MasterDom::getData('nombre');
        $ingreso->_numero = MasterDom::getData('numero');

        $id = EncuestasDao::insertIngreso($ingreso);
        EncuestasDao::update($ingreso);
        if($id >= 1 )
        {
            $this->alerta($id,'add');
        }
        else
        {
            $this->alerta($id,'error');
        }

    }

    public function Salida($id){
        $extraFooter =<<<html

html;
        $encuesta = $id;
        View::set('header',$this->_contenedor->header(''));
        View::set('footer',$this->_contenedor->footer($extraFooter));
        View::set('encuesta', $encuesta);
        View::render("salida_add");
    }

    public function AccidentesEdit(){
        $accidente = new \stdClass();
        $accidente->_id_accidente = MasterDom::getData('id_accidente');
        $accidente->_catalogo_colaboradores_id = MasterDom::getData('nombre_colaborador');

        $accidente->_fecha_accidente = MasterDom::getData('fecha');
        $fecha = MasterDom::getData('fecha');
        $fechaEntera = strtotime($fecha);
        $mes = date("m", $fechaEntera);

        if($mes == '1')
        {
            $accidente->_trimestre = 1;
        }
        if($mes == '2')
        {
            $accidente->_trimestre = 1;
        }
        if($mes == '3')
        {
            $accidente->_trimestre = 1;
        }
        if($mes == '4')
        {
            $accidente->_trimestre = 2;
        }
        if($mes == '5')
        {
            $accidente->_trimestre = 2;
        }
        if($mes == '6')
        {
            $accidente->_trimestre = 2;
        }
        if($mes == '7')
        {
            $accidente->_trimestre = 3;
        }
        if($mes == '8')
        {
            $accidente->_trimestre = 3;
        }
        if($mes == '9')
        {
            $accidente->_trimestre = 3;
        }
        if($mes == '10')
        {
            $accidente->_trimestre = 4;
        }
        if($mes == '11')
        {
            $accidente->_trimestre = 4;
        }
        if($mes == '12')
        {
            $accidente->_trimestre = 4;
        }

        $accidente->_id_lugar_accidente = MasterDom::getData('lugar');

        $detalle_accidente = MasterDom::getDataAll('detalle');
        $detalle_accidente = MasterDom::procesoAcentosNormal($detalle_accidente);
        $accidente->_detalle_accidente = $detalle_accidente;


        $causa = MasterDom::getDataAll('causa');
        $causa = MasterDom::procesoAcentosNormal($causa);
        $accidente->_causa = $causa;

        $accidente->_id_clasificacion_accidente = MasterDom::getData('clasificacion');
        $acto_inseguro = MasterDom::getDataAll('acto');
        $acto_inseguro = MasterDom::procesoAcentosNormal($acto_inseguro);
        $accidente->_acto_inseguro = $acto_inseguro;
        $condicion_insegura = MasterDom::getDataAll('condicion');
        $condicion_insegura = MasterDom::procesoAcentosNormal($condicion_insegura);
        $accidente->_condicion_insegura = $condicion_insegura;

        $id = AccidentesDao::update($accidente);
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
            window.location.href = "/Accidentes/";
          });//fin del btnAdd

        });//fin del document.ready
      </script>
html;
        $accidente = AccidentesDao::getById($id);

        $sColaborador = "";
        foreach (AccidentesDao::getColaboradorNombre() as $key => $value) {
            $selected = ($accidente['catalogo_colaboradores_id']==$value['catalogo_colaboradores_id'])? 'selected' : '';
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
        View::render("accidentes_view");
    }

    public function alerta($id, $parametro){
        $regreso = "/Encuestas/";

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
