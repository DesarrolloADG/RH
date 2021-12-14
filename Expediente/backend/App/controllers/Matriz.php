<?php
namespace App\controllers;
//defined("APPPATH") OR die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\Accidentes AS AccidentesDao;
use \App\models\General AS GeneralDao;

class Matriz extends Controller{

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
        $accidentes = AccidentesDao::getAll();
        $editarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 5)==1)?  "" : "style=\"display:none;\"";
        $eliminarHidden = (Controller::getPermisosUsuario($usuario, "seccion_departamentos", 6)==1)? "" : "style=\"display:none;\"";
        $tabla= '';
        foreach ($accidentes as $key => $value) {
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
                    <td><input type="checkbox" name="borrar[]" value="{$value['id_accidente']}"/></td>
                    <td>{$value['nombre']}</td>
                    <td>{$value['fecha_accidente']}</td>
                    <td>{$value['trimestre']}</td>
                    <td>$estatus</td>
                    <td>{$value['clasificacion_accidente']}</td>
                    <td class="center" >
                        <a href="/Accidentes/Edit/{$value['id_accidente']}" {$editarHidden} type="submit" name="id" class="btn btn-primary"><span class="fa fa-pencil-square-o" style="color:white"></span> </a>
                        <a href="/Accidentes/Show/{$value['id_accidente']}" type="submit" name="id_accidente" class="btn btn-success"><span class="glyphicon glyphicon-eye-open" style="color:white"></span> </a>
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
        View::render("matriz_all");
    }

    public function getColaboradorNombre(){
        $colaborador = '';
        foreach (AccidentesDao::getColaboradorNombre() as $key => $value) {
            $colaborador .=<<<html
        <option value="{$value['catalogo_colaboradores_id']}">{$value['nombre']}</option>
html;
        }
        return $colaborador;
    }

    public function getLugarAccidente(){
        $lugar = '';
        foreach (AccidentesDao::getLugarAccidente() as $key => $value) {
            $lugar .=<<<html
        <option value="{$value['id_lugar_accidente']}">{$value['detalle']}</option>
html;
        }
        return $lugar;
    }

    public function getCalsificacionAccidente(){
        $clasificacion = '';
        foreach (AccidentesDao::getClasificacionrAccidente() as $key => $value) {
            $clasificacion .=<<<html
        <option value="{$value['id_clasificacion_accidente']}">{$value['detalle']}</option>
html;
        }
        return $clasificacion;
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
        View::set('idColaborador',$this->getColaboradorNombre());
        View::set('idLugar',$this->getLugarAccidente());
        View::set('idClasificacion',$this->getCalsificacionAccidente());
        View::render("accidentes_add");
    }

    public function AccidentesAdd(){
        $accidente = new \stdClass();
        $incapacidad = new \stdClass();
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

        $incapacidad1 = MasterDom::getData('incapacidad');


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
        $incapacidad->_catalogo_colaboradores_id = MasterDom::getData('nombre_colaborador');
        if($incapacidad1 == 'on')
        {
            $accidente->_incapacidad_activa = 1;
        }
        else{
            $accidente->_incapacidad_activa = 0;
        }

        $id = AccidentesDao::insert($accidente);

        if($incapacidad1 == 'on')
        {
            AccidentesDao::insert1($incapacidad, $id);
            if($id >= 1 )
            {
                $this->alerta($id,'add');
            }
            else
            {
                $this->alerta($id,'error');
            }
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
        View::render("accidentes_edit");
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
        $regreso = "/Accidentes/";

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
